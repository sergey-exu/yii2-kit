<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'backend\modules\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'baseUrl' => ''
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'suffix' => '/',
            'rules' => [
                '' => 'page/index',
                'news/' => 'news/index',
                'news/<alias:[\w\-]+>' => 'news/view',
                '<alias:[\w\-]+>' => 'page/view',
            ],
        ],
    ],
    'params' => $params,
    //'catchAll' => ['site/offline'], // если нужно вывести сайт в оффлайн
];
