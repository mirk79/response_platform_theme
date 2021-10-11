<?php
defined('TYPO3_MODE') || die();

/**
 * add additional fields for image galleries config:
 * image_gallery
 * image_caption_position
 */
$additionalGallerySettings = array(
    'image_gallery' => [
        'label' => 'LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_gallery.type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            // 'fieldWizard' => [
            //     'selectIcons' => [
            //         'disabled' => false,
            //     ],
            // ],
            'items' => [
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_gallery.standard', 0],
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_gallery.slider', 1],
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_gallery.stack', '--div--'],
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_gallery.stack.horizontal', 8],
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_gallery.stack.vertical', 9]
            ],
            'default' => 0,
        ]
    ],
    'image_caption_position' => [
        'label' => 'LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_caption_position',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_caption_position.below', 0],
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_caption_position.right', 1],
                ['LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.image_caption_position.left', 2]
            ],
            'default' => 0,
        ]
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns( 'tt_content', $additionalGallerySettings );
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_content", "image_gallery", "", "after:imagecols");
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_content", "image_caption_position", "", "after:image_gallery");
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette("tt_content", "gallerySettings", "image_gallery", "after:imagecols");
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette("tt_content", "gallerySettings", "image_caption_position", "after:image_gallery");
/**
 * add additional_settings flexform to content elements
 * https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ApiOverview/FlexForms/Index.html
 * https://api.typo3.org/master/class_t_y_p_o3_1_1_c_m_s_1_1_core_1_1_utility_1_1_extension_management_utility.html#a383f8c657bbfae0575dfcd3cdce5c24a
 * 
 * oder, als extra Feld in der tt_content Tabelle: 
 * https://docs.typo3.org/m/typo3/reference-tca/9.5/en-us/ColumnsConfig/Type/Flex.html
 */

$additionalContentFields = array(
    'additional_settings' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.additional_settings',
        'config' => [
            'type' => 'flex',
            'ds' => [
                'default' => 'FILE:EXT:response_platform_theme/Configuration/FlexForms/ContentElements.xml',
            ],
        ],
    ],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns( 'tt_content', $additionalContentFields );
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_content", "--div--;LLL:EXT:response_platform_theme/Resources/Private/Language/locallang_be.xlf:contentelements.additional_settings, additional_settings");


// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
//     // 'list_type' does not apply here
//     '*',
//     // Flexform configuration schema file
//     'FILE:EXT:response_platform_theme/Configuration/FlexForms/ContentElements.xml',
//     // ctype
//     '*'
// );

// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_content", "--div--;neue palette, pi_flexform");


// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_content", "pi_flexform", "", "after:layout");

// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns( 'tt_address', $additionalTTAddressFields );
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_address", "--div--;LLL:EXT:theme_hsmv/Resources/Private/Language/locallang.xlf:tt_address.personpage_palette, personpage_uid, personpage_img, personpage_link");
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette("tt_address", "organization", "personpage_company_en", "after:company");
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette("tt_address", "organization", "personpage_position_en", "after:position");

