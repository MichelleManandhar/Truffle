<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'timeZone' => 'Asia/Kathmandu',
    'name' => 'Truffle Pan',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'YrlQrwYohg4yct57csEe3nY9chQVUWqc',
            'class' => 'app\components\Request',
            'web'=> '/web'
            // 'enableCsrfValidation' => true,
        ],
        'session' => [
            'name' => '_fjdfpa7BwndVHPr7NLXq5HzaXaZsUGx',
        ],
        'user' => [
              'identityClass' => 'app\models\User',
              'enableAutoLogin' => false, // disable all cookie based authentication
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        
        'db' => require(__DIR__ . '/db.php'),
        // require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class' => 'yii\web\UrlManager',

            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                // custom url routes
                'menu-item/update/<id:[a-zA-Z0-9-_]+>/'=>'menu-item/update',
                'menu-item/view-stock/<id:[a-zA-Z0-9-_]+>/'=>'menu-item/view-stock',
                'menu-item/edit-stock/<id:[a-zA-Z0-9-_]+>/'=>'menu-item/edit-stock',
                'menu-item/sorting-by-category/<slug:[a-zA-Z0-9-_]+>/'=>'menu-item/sorting-by-category',
                'reports/invoice-page/<invoice:[1-9]+[0-9]*>/'=>'reports/invoice-page',
                'utensils-manager/view/<id:[1-9]+[0-9]*>/'=>'utensils-manager/view',
                'member/view/<id:[1-9]+[0-9]*>/'=>'member/view',
                'member/edit/<id:[1-9]+[0-9]*>/'=>'member/edit',
                'member/report/<id:[1-9]+[0-9]*>/'=>'member/report',
                'member/threshold-history/<id:[1-9]+[0-9]*>/'=>'member/threshold-history',
                'member/claim-threshold/<id:[1-9]+[0-9]*>/'=>'member/claim-threshold',
                'member/claim-threshold-end/<id:[1-9]+[0-9]*>/'=>'member/claim-threshold-end',
                // default routes
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ]
    ],
    'params' => $params,
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
