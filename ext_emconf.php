<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Show info about "Hide default language"',
    'description' => 'Display information about activated "Hide default language" in TYPO3 page module',
    'category' => 'be',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Chris Müller',
    'author_email' => 'typo3@krue.ml',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.3.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\InfoHideDefaultLang\\' => 'Classes']
    ],
];
