<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'ResponsePlatformTheme',
    'description' => 'Provides site package for response-platform',
    'state' => 'stable',
    'author' => 'Mirko Leyh',
    'author_email' => 'mail@mirkoleyh.de',
    'category' => 'fe',
    'internal' => '',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
            'mask' => ''
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
