<?php

/***
 *
 * This file is part of the "headless_backendlayouts" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *
 ***/

declare(strict_types=1);

namespace FriendsOfTYPO3Headless\HeadlessBackendlayouts\DataProcessing;

use FriendsOfTYPO3Headless\HeadlessBackendlayouts\Serializer\BackendLayoutSerializer;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;



/**
 *
 * Example TypoScript configuration:
 *
 * 10 = FriendsOfTYPO3Headless\HeadlessBackendlayouts\DataProcessing\BackendLayoutProcessor
 * 10 {
 *   as = backendLayout
 * }
 *
 * @codeCoverageIgnore
 */
class BackendLayoutProcessor implements DataProcessorInterface {

    protected ?TypoScriptFrontendController $tsfe;

    public function __construct(TypoScriptFrontendController $tsfe = null)
    {
        $this->tsfe = $tsfe ?? $GLOBALS['TSFE'] ?? null;
    }


    /**
     * @inheritDoc
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $backendLayoutSerializer = new BackendLayoutSerializer();
        $processedData['backendLayout'] = $backendLayoutSerializer->serialize($this->tsfe);

        return $processedData;
    }
}
