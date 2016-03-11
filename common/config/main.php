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
                        //'common'=>'common.php',
                        'backend' => 'backend.php',
                        //'frontend'=>'frontend.php',
                    ],
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'db'=>[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    //'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars'=>[],
                    'logTable'=>'{{%system_log}}'
                ]
            ],
        ],
        'settings' => ['class' => 'backend\modules\settings\components\Settings'],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin', 'user'],
            'itemFile' => '@common/components/rbac/items.php',
            'assignmentFile' => '@common/components/rbac/assignments.php',
            'ruleFile' => '@common/components/rbac/rules.php'
        ],
    ],
];
