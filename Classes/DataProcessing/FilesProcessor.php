<?php

/*
 * This file is part of the "headless" Extension for TYPO3 CMS.
 * 
 * edited for response_platform_theme
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *
 * (c) 2021
 */

declare(strict_types=1);

namespace Response\ResponsePlatformTheme\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class FilesProcessor
 */
class FilesProcessor extends \FriendsOfTYPO3\Headless\DataProcessing\FilesProcessor
// class FilesProcessor implements DataProcessorInterface
{
    
    /**
     * Process data for a gallery, for instance the CType "textmedia"
     *
     * @param ContentObjectRenderer $cObj The content object renderer, which contains data of the content element
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        if (isset($processorConfiguration['if.']) && !$cObj->checkIf($processorConfiguration['if.'])) {
            return $processedData;
        }
        
        /* calculating target width ... */
        $maxWidth = $processorConfiguration['processingConfiguration.']['maxWidth'] ?? null;
        $imagecols = $processedData['data']['imagecols'] ?? null;
        $columnSpacing = $processorConfiguration['processingConfiguration.']['columnSpacing'] ?? 0;
        $tWidth = null;
        if ($maxWidth) {
            if ($imagecols && intval($imagecols) > 1) {
                $tWidth = intval( ( $maxWidth - $columnSpacing * ($imagecols - 1) ) / $imagecols );
            } else {
                $tWidth = intval($maxWidth);
            }
        }

        $dimensions = [];

        if (isset($processorConfiguration['processingConfiguration.'])) {
            $dimensions = [
                'maxWidth' => $tWidth,
            ];
        }

        $this->contentObjectRenderer = $cObj;
        $this->processorConfiguration = $processorConfiguration;

        $targetFieldName = (string)$cObj->stdWrapValue(
            'as',
            $this->processorConfiguration,
            $this->defaults['as']
        );

        $this->fileObjects = $this->fetchData();
        $processedData[$targetFieldName] = $this->processFiles($dimensions);

        return $this->removeDataIfnotAppendInConfiguration($processorConfiguration, $processedData);
    }

}
