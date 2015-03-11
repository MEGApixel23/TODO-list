<?php

namespace app\controllers;

use app\models\Project;
use yii\rest\ActiveController;

class ProjectController extends ActiveController
{
    public $modelClass;

    public function init()
    {
        $this->modelClass = Project::className();
    }
}