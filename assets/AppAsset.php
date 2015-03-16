<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\helpers\ArrayHelper;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        $this->jsOptions = ['position' => \yii\web\View::POS_HEAD];
        $this->css = ArrayHelper::merge($this->css, [
            YII_DEBUG ? 'js/jquery-ui/jquery-ui.css' : 'js/jquery-ui/jquery-ui.min.css'
        ]);
        $this->js = ArrayHelper::merge($this->js, [
            YII_DEBUG ? 'js/jquery-ui/jquery-ui.js' : 'js/jquery-ui/jquery-ui.min.js'
        ]);

        parent::init();
    }
}
