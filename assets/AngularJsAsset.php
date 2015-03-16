<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\helpers\ArrayHelper;
use yii\web\AssetBundle;
use yii\web\View;

class AngularJsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [];

    public function init()
    {
        $this->js = ArrayHelper::merge($this->js, [
            YII_DEBUG ? 'js/angular/angular.js' : 'js/angular/angular.min.js',
            YII_DEBUG ? 'js/angular/angular-route.js' : 'js/angular/angular-route.min.js',
            YII_DEBUG ? 'js/angular/sortable.js' : 'js/angular/sortable.js',
        ]);
        $this->jsOptions = ['position' => View::POS_HEAD];

        $this->depends = [
            AppAsset::className()
        ];

        parent::init();
    }
}
