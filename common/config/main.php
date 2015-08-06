<?php
return [
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
