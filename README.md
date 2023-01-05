![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2.svg)

[![Latest Stable Version](http://poser.pugx.org/friendsoftypo3headless/headless-backendlayouts/v)](https://packagist.org/packages/friendsoftypo3headless/headless-backendlayouts) [![Total Downloads](http://poser.pugx.org/friendsoftypo3headless/headless-backendlayouts/downloads)](https://packagist.org/packages/friendsoftypo3headless/headless-backendlayouts) [![Latest Unstable Version](http://poser.pugx.org/friendsoftypo3headless/headless-backendlayouts/v/unstable)](https://packagist.org/packages/friendsoftypo3headless/headless-backendlayouts) [![License](http://poser.pugx.org/friendsoftypo3headless/headless-backendlayouts/license)](https://packagist.org/packages/friendsoftypo3headless/headless-backendlayouts) [![PHP Version Require](http://poser.pugx.org/friendsoftypo3headless/headless-backendlayouts/require/php)](https://packagist.org/packages/friendsoftypo3headless/headless-backendlayouts)

# TYPO3 Extension "headless_backendlayouts"
Adds a serialized JSON of the TYPO3 backend layout to the "[EXT:headless](https://github.com/TYPO3-Initiatives/headless)" extension appearance key

## Requirements
Extension requires TYPO3 in version at least 11.5 and "[EXT:headless](https://github.com/TYPO3-Initiatives/headless)" ^3.0

## TYPO3 Installation
Install extension using composer\
``composer require friendsoftypo3headless/headless-backendlayouts``

and then, include TypoScript template, and you are ready to go.

## Example output:
```
{
  ...
  appearance: {
    ...
    pageContentRows": [
    {
      "type": "row",
      "tag": "header",
      "children": [
        {
          "type": "col",
          "name": "Header Content",
          "contentColPos": "colPos3",
          "colPos": "3",
          "colspan": 12,
          "tag": null
        }
      ]
    },
    {
      "type": "row",
      "tag": null,
      "children": [
        {
          "type": "col",
          "name": "Example Content Column",
          "contentColPos": "colPos8",
          "colPos": "8",
          "colspan": 12,
          "tag": null
        }
      ]
    },
    {
      "type": "row",
      "tag": null,
      "children": [
        {
          "type": "col",
          "name": "Example Content Column",
          "contentColPos": "",
          "colPos": "0",
          "colspan": 12,
          "tag": null
        }
      ]
    },
    {
      "type": "row",
      "tag": "aside",
      "children": [
        {
          "type": "col",
          "name": "Example Content Column",
          "contentColPos": "colPos9",
          "colPos": "9",
          "colspan": 12,
          "tag": null
        }
      ]
    },
    {
      "type": "row",
      "tag": "footer",
      "children": [
        {
          "type": "col",
          "name": "Footer Content Left",
          "contentColPos": "colPos10",
          "colPos": "10",
          "colspan": 4,
          "tag": null
        },
        {
          "type": "col",
          "name": "Footer Content Middle",
          "contentColPos": "colPos11",
          "colPos": "11",
          "colspan": 4,
          "tag": null
        },
        {
          "type": "col",
          "name": "Footer Content Right",
          "contentColPos": "colPos12",
          "colPos": "12",
          "colspan": 4,
          "tag": "div"
        }
      ]
    }
  ]
  ...
}
```


### Developers involved in the project

- [Sven Petersen](https://github.com/svenpet90) ([DAUSKONZEPT GmbH](https:///www.dauskonzept.de) && [HardAnders GbR](https://www.hardanders.de))
- [Niels Seelhöfer](https://github.com/derseeli) ([TRIXIE Heimtierbedarf GmbH & Co. KG](https://www.trixie.de) && [Datenanker](https://www.datenanker.com))
