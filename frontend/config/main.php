<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                '/' => 'site/index',
                '<_a:(about|contact)>' => 'site/<_a>',
                '<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset)>' => 'user/<_a>',

                'gii'=>'gii/default/index',
                
                
                //API rules
                'api'=>'api/default/index',
                'api/<apikey:\w+>/<token:\w+>/png'=>'api/request/png',
                'api/<apikey:\w+>/<token:\w+>/jpg'=>'api/request/jpg',
                'api/<apikey:\w+>/<token:\w+>'=>'api/request/create',

                //Admin rules
                'admin'=>'admin/screenshot/index',

                
                //
                'order/check/'=>'/admin/transaction/check',
                'order/payment-aviso/'=>'/admin/transaction/payment-aviso',
                'order/success'=>'/admin/transaction/success',
                'order/fail'=>'/admin/transaction/fail',

                '<controller:\w+>/view/<alias:\w+>/'=>'<controller>/view',
                '<controller:\w+>/'=>'<controller>/index',
                '<controller:\w+>/<action:\w+>/'=>'<controller>/<action>',
            ]
        ]
    ],
    'params' => $params,
];
