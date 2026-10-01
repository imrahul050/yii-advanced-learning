<?php

namespace api\controllers;

use yii\rest\ActiveController;

class StudentController extends ActiveController
{
    public $modelClass = 'common\models\Student';
}