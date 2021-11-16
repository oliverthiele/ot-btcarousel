<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

call_user_func(
    function () {
        ExtensionManagementUtility::addLLrefForTCAdescr(
            'tt_content.pi_flexform.ot_btcarousel',
            'EXT:ot_btcarousel/Resources/Private/Language/locallang_csh_flexform.xlf',
        );
    }
);
