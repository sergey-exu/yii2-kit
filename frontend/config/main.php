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
    'modules' => [
        'news' => [
            'class' => 'frontend\modules\news\Module',
        ],
    ],
    'components' => [
        
        'user' => [
            'identityClass' => 'backend\modules\user\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
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
            'rules' => [
                
                '' => 'site/index',
                
                'news/' => 'news/default/index',
                'news/<alias:[\w\-]+>' => 'news/default/view',
                
                '<action:sections>/<id:\d+>' => 'site/<action>',
                
                'partners/' => 'partners/index',
                
                '<alias:[\w\-]+>' => 'page/view',
                
                
                
                
                //'<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                //'<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                //'<_m:[\w\-]+>' => '<_m>/default/index',
                //'<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                
                //'<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',

            ],
        ],
    ],
    'params' => $params,
];
