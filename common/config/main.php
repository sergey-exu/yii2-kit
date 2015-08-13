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
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common'=>'common.php',
                        'backend' => 'backend.php',
                        'frontend'=>'frontend.php',
                    ],
                ],
            ],
        ],
    ],
];
