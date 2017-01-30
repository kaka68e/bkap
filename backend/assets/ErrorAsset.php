<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ErrorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all',
        'assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/global/plugins/simple-line-icons/simple-line-icons.min.css',

        'assets/global/plugins/bootstrap/css/bootstrap.min.css',

        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css',


        'assets/global/css/components.min.css',
        'assets/global/css/plugins.min.css',
        'assets/pages/css/error.min.css'
    ];
    public $js = [

        'assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'assets/global/plugins/js.cookie.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

        'assets/global/scripts/app.min.js',
        // Cho cái trạng thái
        'assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
        'assets/pages/scripts/components-bootstrap-select.min.js',   
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
