<?php
defined('TYPO3_MODE') || die();

/***************
 * Add RTE configurations ...
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:response_platform_theme/Configuration/RTE/Default.yaml';
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['responseStd'] = 'EXT:response_platform_theme/Configuration/RTE/Response_Standard.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:response_platform_theme/Configuration/TSConfig/Page/All.tsconfig">');

/***************
 * UserTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:response_platform_theme/Configuration/TSConfig/User/All.tsconfig">');

/**
 * Add rootline fields ...
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',pagecolor';
