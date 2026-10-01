<?php

namespace backend\controllers;

use yii\rest\ActiveController;

class StudentApiController extends ActiveController
{
    public $modelClass = 'common\models\Student';
}