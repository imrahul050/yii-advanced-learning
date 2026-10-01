<?php

declare(strict_types=1);

namespace backend\controllers;

use yii\web\Response;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;


/**
 * Site controller
 */
class ApiController extends Controller
{

  /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            
        ];
    }
    public function actionIndex(){
        return ['message' => 'Message from Api','data'=>[['id' => 1,'name' => 'Rahul']] ];
    }
}
 