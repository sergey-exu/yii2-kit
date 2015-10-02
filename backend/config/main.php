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
    'modules' => [
        'auth' => ['class' => 'backend\modules\auth\Module'],
        'user' => ['class' => 'backend\modules\user\Module'],
        'log' => ['class' => 'backend\modules\log\Module'],
        'news' => ['class' => 'backend\modules\news\Module'],
        'page' => ['class' => 'backend\modules\page\Module'],
        'banner' => ['class' => 'backend\modules\banner\Module'],
        'dashboard' => ['class' => 'backend\modules\dashboard\Module'],
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
            'baseUrl' => '/backend'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
                //'<_c:[\w\-]+>' => '<_c>/index',
                //'<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
                
                '<_m:[\w\-]+>/' => '<_m>/default/index',
                '<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/default/<_a>',
                
            ],
        ],
    ],
    'params' => $params,
];
