<?php

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
    require dirname(__DIR__, 2) . '/common/config/main.php',
    [
        'id' => 'api',

        'basePath' => dirname(__DIR__),

        'controllerNamespace' => 'api\controllers',

        'components' => [
            'request' => [
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
        ],
    ]
);