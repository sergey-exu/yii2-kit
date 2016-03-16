<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => 'dashboard/default/index',
    'modules' => [
        'auth' => ['class' => 'backend\modules\auth\Module'],
        'user' => ['class' => 'backend\modules\user\Module'],
        'log' => ['class' => 'backend\modules\log\Module'],
        'news' => ['class' => 'backend\modules\news\Module'],
        'page' => ['class' => 'backend\modules\page\Module'],
        'banner' => ['class' => 'backend\modules\banner\Module'],
        'dashboard' => ['class' => 'backend\modules\dashboard\Module'],
        'settings' => ['class' => 'backend\modules\settings\Module'],
        'menu' => ['class' => 'backend\modules\menu\Module'],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'backend\modules\auth\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'baseUrl' => '/backend',
            'enableCsrfValidation' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'<_c:[\w\-]+>/<_a:[\w\-]+>' => '<_c>/<_a>',
                //'file-manager' => 'file-manager/index',
                //'<_m:[\w\-]+>/' => '<_m>/default/index',
                //'<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',
                //'<_m:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/default/<_a>',
            ],
        ],
    ],
    'controllerMap'=>[
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['admin'],
            //'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@storageUrl',
                    'basePath' => '@storage',
                    'path' => '/',
                    'name' => 'Storage'
                    //'access' => ['read' => 'admin', 'write' => 'admin']
                ]
            ]
        ]
    ],
    'params' => $params,
];
