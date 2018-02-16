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
        //'css/site.css',
        'css/bootstrap.css',
        'css/style.css',
        'css/component.css',
        'fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700',
        'fonts.googleapis.com/css?family=Dorsa',
        'css/megamenu.css',
        'css/flexslider.css',





    ];
    public $js = [
    'js/jquery-1.11.1.min.js',
    'js/megamenu.js',
    'js/jquery.easydropdown.js',
    'js/simpleCart.min.js',
    'js/easyResponsiveTabs.js',
    'js/classie1.js',
    'js/uisearch.js',
    'js/cbpViewModeSwitch.js',
    'js/classie.js',




    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
