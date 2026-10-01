<?php

return [
    'id' => 'api',

    'basePath' => dirname(__DIR__),

    'controllerNamespace' => 'api\controllers',

    'bootstrap' => [
        'log',
    ],

    'components' => [

        'request' => [
            'cookieValidationKey' => 'your-secret-key',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],

        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,

            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['student'],
                    'pluralize' => true,
                ],
            ],
        ],

        'db' => require dirname(__DIR__, 2) . '/common/config/main-local.php',
    ],
];