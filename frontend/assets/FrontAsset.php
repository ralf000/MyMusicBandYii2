<?php

namespace frontend\assets;

use yii\base\View;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900',
        'fonts/font-awesome.min.css',
        'css/style.css',

    ];
    public $js = [
        'js/plugins.js',
        'js/app.js'
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        $manager = $view->getAssetManager();
        $view->registerJsFile($manager->getAssetUrl($this, 'js/ie-support/html5.js'), ['condition' => 'lt IE9', 'position' => \yii\web\View::POS_HEAD]);
        $view->registerJsFile($manager->getAssetUrl($this, 'js/ie-support/respond.js'), ['condition' => 'lt IE9', 'position' => \yii\web\View::POS_HEAD]);
    }


}
