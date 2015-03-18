<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\AngularJsAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
AngularJsAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="garage">
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
<div class="content">

    <header>
        <div class="title">Simple TODO list</div>
    </header>

    <?=$content?>

    <footer>Ruby garage</footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
