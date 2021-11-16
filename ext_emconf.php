<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CE Bootstrap Carousel',
    'description' => 'Standard Bootstrap Carousel. See https://getbootstrap.com/docs/5.1/components/carousel/ for more information.',
    'category' => 'frontend',
    'state' => 'stable',
    'uploadfolder' => false,
    'clearCacheOnLoad' => false,
    'author' => 'Oliver Thiele',
    'author_company' => 'Web Development Oliver Thiele',
    'author_email' => 'mail@oliver-thiele.de',
    'version' => '1.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'OliverThiele\\OtBtcarousel\\' => 'Classes'
        ]
    ]
];
