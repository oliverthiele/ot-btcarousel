<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die();

call_user_func(
    function () {
        $iconRegistry = GeneralUtility::makeInstance(
            IconRegistry::class
        );
        $iconRegistry->registerIcon(
            'ot-btcarousel',
            FontawesomeIconProvider::class,
            [
                'name' => 'exchange'
            ]
        );
        ExtensionManagementUtility::addPageTSConfig(
            '@import "EXT:ot_btcarousel/Configuration/TSconfig/Page/NewContentElementWizard.tsconfig"'
        );
    }
);
