<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i',
        'css/bootstrap.css',
        'css/style.css',
        'css/swiper.css',
        'css/dark.css',
        'css/font-icons.css',
        'css/animate.css',
        'css/magnific-popup.css',
        'css/responsive.css',
        'css/custom.css'
    ];
    public $js = [
        //'js/jquery.js',
        'js/plugins.js',
        'js/functions.js',
        'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
