<?php

/*
 * This file is part of the "headless_backendlayouts" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FriendsOfTYPO3Headless\HeadlessBackendlayouts\Serializer;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\Page\PageLayoutResolver;
use function strlen;

class BackendLayoutSerializer
{
    public function serialize($tsfe): array
    {
        $rootline = $tsfe->rootLine;
        $page = $tsfe->page ?? [];

        $pagelayout = GeneralUtility::makeInstance(PageLayoutResolver::class)->getLayoutForPage($page, $rootline);
        $pageTsLayoutPrefix = 'pagets__';

        if (0 !== strpos($pagelayout, $pageTsLayoutPrefix)) {
            return ['error' => 'BackendLayout config not found.'];
        }

        $layoutName = substr($pagelayout, strlen($pageTsLayoutPrefix));
        $pageTsConfig = BackendUtility::getPagesTSconfig($tsfe->page['uid']);
        $backendLayoutTsConfig = $pageTsConfig['mod.']['web_layout.']['BackendLayouts.'][$layoutName . '.']['config.']['backend_layout.'];

        $return = [];

        foreach ($backendLayoutTsConfig['rows.'] as $row) {
            $rowConfig = [];

            foreach ($row['columns.'] as $col) {
                $name = substr($col['name'], 0, 4) === 'LLL:' ? LocalizationUtility::translate($col['name']) : $col['name'];

                $rowConfig[] = [
                    'type'          => 'col',
                    'name'          => $name,
                    'contentColPos' => $col['colPos'] !== null ? 'colPos' . $col['colPos'] : '',
                    'colPos'        => $col['colPos'] ?? '',
                    'colspan'       => $col['colspan'] ?? '',
                    'tag'           => $col['tag'] ?? null,
                ];
            }

            $return[] = [
                'type'     => 'row',
                'tag'      => $row['tag'] ?? null,
                'children' => $rowConfig,
            ];
        }
        return $return;
    }
}
