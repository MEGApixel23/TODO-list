<?php

namespace app\controllers;

use app\models\Task;
use yii\rest\ActiveController;

class TaskController extends ActiveController
{
    public $modelClass;

    public function init()
    {
        $this->modelClass = Task::className();
    }
}