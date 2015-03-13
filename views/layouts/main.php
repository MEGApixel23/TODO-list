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
<html lang="<?= Yii::$app->language ?>" ng-app>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Roboto&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.6/angular.min.js"></script>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="background"></div>
<div class="content">

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

    <?=$content?>

    <footer>Ruby garage</footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
