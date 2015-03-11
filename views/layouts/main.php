<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Roboto&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="background"></div>
<div class="content ">

    <header>
        <div class="title">Simple TODO list</div>
    </header>

    <div class="menu">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">Profile</a></li>
            <li role="presentation"><a href="#">Messages</a></li>
        </ul>
    </div>

    <? for ($i=0; $i<5; $i++) : ?>
        <div class="row">
            <div class="project col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <div class="project-header bg-primary">
                    <div class="glyphicon glyphicon-list-alt project-icon"></div>
                    <div class="project-title">Название проекта</div>
                    <div class="project-controls pull-right">
                        <a href="#">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> |
                        <a href="#">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </div>
                </div>
                <div class="project-creator">
                    <div class="add-task">
                        <a href="#">
                            <span class="glyphicon glyphicon-plus add-task-icon"></span>
                        </a>
                    </div>
                    <div class="task-input">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Add Task</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tasks">
                    <div class="fields"></div>
                    <table class="tasks-table table">
                        <? for ($j=0; $j<2; $j++) : ?>
                            <tr class="task">
                                <td class="checkbox-container">
                                    <input type="checkbox">
                                </td>
                                <td>
                                    To do TODO list
                                </td>
                                <td class="task-controls">
                                    <a href="#">
                                        <span class="glyphicon
                                         glyphicon-resize-vertical"></span>
                                    </a> |
                                    <a href="#">
                                        <span class="glyphicon
                                        glyphicon-pencil"></span>
                                    </a> |
                                    <a href="#">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?  endfor ?>
                    </table>
                </div>
            </div>
        </div>
    <? endfor ?>

    <div class="row">
        <div class="add-project-container">
            <button class="add-project btn btn-primary">Add TODO list</button>
        </div>
    </div>

    <footer>Ruby garage</footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
