<?php
defined('TYPO3_MODE') || die();

/**
 * TCA Settings:
 * Add "pagecolor" field to page records
 */

$additionalPageFields = array(
'pagecolor' => [
    'exclude' => 1,
    'label' => 'LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:pages.pagecolor',

        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
        ],
    ],
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $additionalPageFields, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("pages", "pagecolor", "", "after:backend_layout_next_level");

/**
 * Register PageTSConfig 
 */

call_user_func(
    function ($extensionKey) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
            $extensionKey,
            'Configuration/TSConfig/Page/All.tsconfig',
            'ResponsePlatformTheme :: Content Elements'
        );

    },
    'response_platform'
);
