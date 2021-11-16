<?php

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

(function () {
    $slider = GeneralUtility::makeInstance(
        ExtensionConfiguration::class
    )->get('ot_btcarousel', 'slider');

    // division != 0
    if ($slider['height'] === 0) {
        $slider['height'] = 1;
    }

    /**
     * Add Content Element
     */
    if (!is_array($GLOBALS['TCA']['tt_content']['types']['ot_btcarousel'])) {
        $GLOBALS['TCA']['tt_content']['types']['ot_btcarousel'] = [];
    }

    /**
     * Add the CType "ot_btcarousel"
     */
    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:ot_btcarousel/Resources/Private/Language/locallang_be.xlf:extension.title',
            'ot_btcarousel',
            'ot-btcarousel'
        ],
        'html',
        'after'
    );

    /**
     * Assign Icon
     */
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['ot_btcarousel'] = 'ot-btcarousel';

    /**
     * Register Flexform
     */
    ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:ot_btcarousel/Configuration/FlexForms/FlexFormCeConfig.xml',
        'ot_btcarousel'
    );

    /**
     * Configure element type
     */
    $GLOBALS['TCA']['tt_content']['types']['ot_btcarousel'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['ot_btcarousel'],
        [
            'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,pi_flexform,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.imagelinks;imagelinks,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            --div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended
         ',
            'columnsOverrides' => [
                'assets' => [
                    'config' => [
                        'overrideChildTca' => [
                            'columns' => [
                                'link' => [
                                    'description' => 'LLL:EXT:ot_btcarousel/Resources/Private/Language/locallang_be.xlf:sys_file_reference.link.description'
                                ],
                                'crop' => [
                                    'config' => [
                                        'cropVariants' => [
                                            '1:1' => [
                                                'title' => 'Square (1:1)',
                                                'allowedAspectRatios' => [
                                                    '1:1' => [
                                                        'title' => '1:1',
                                                        'value' => 1 / 1
                                                    ],
                                                ],
                                            ],
                                            '4:3' => [
                                                'title' => '4:3',
                                                'allowedAspectRatios' => [
                                                    '1:1' => [
                                                        'title' => '4:3',
                                                        'value' => 4 / 3
                                                    ],
                                                ],
                                            ],
                                            '16:9' => [
                                                'title' => '16:9',
                                                'allowedAspectRatios' => [
                                                    '1:1' => [
                                                        'title' => '16:9',
                                                        'value' => 16 / 9
                                                    ],
                                                ],
                                            ],
                                            'slider' => [
                                                'title' => 'LLL:EXT:ot_btcarousel/Resources/Private/Language/locallang_be.xlf:cropVariant.slider',
                                                'cropArea' => [
                                                    'x' => 0.1,
                                                    'y' => 0.1,
                                                    'width' => 0.8,
                                                    'height' => 0.8,
                                                ],
                                                'allowedAspectRatios' => [
                                                    $slider['width'].'x'.$slider['height'] => [
                                                        'title' => $slider['width'].'x'.$slider['height'],
                                                        'value' => $slider['width'] / $slider['height']
                                                    ],
                                                    'NaN' => [
                                                        'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                                                        'value' => 0.0
                                                    ]
                                                ]
                                            ]
                                        ],
                                        'maxitems' => 10,
                                    ]
                                ],
                                'uid_local' => [
                                    'config' => [
                                        'appearance' => [
                                            'elementBrowserType' => 'file',
                                            'elementBrowserAllowed' => 'gif,jpg,png,svg'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    );
})();
