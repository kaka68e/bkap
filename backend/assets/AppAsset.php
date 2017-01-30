<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
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

        // Model Class
        'assets/global/plugins/select2/css/select2.min.css',
        'assets/global/plugins/select2/css/select2-bootstrap.min.css',
        //Hết

        'assets/global/css/components.min.css',
        'assets/global/css/plugins.min.css',

        'assets/layouts/layout3/css/layout.min.css',
        'assets/layouts/layout3/css/themes/default.min.css',
        'assets/layouts/layout3/css/custom.min.css',
        
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css',
        'css/site.css',
        'css/site2.css',
        'css/jquery-ui.css'
    ];
    public $js = [

        'assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'assets/global/plugins/js.cookie.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

        'assets/global/scripts/app.min.js',


        'assets/layouts/layout3/scripts/layout.min.js',
        'assets/layouts/layout3/scripts/demo.min.js',
        'assets/layouts/global/scripts/quick-sidebar.min.js',
        'assets/layouts/global/scripts/quick-nav.min.js',

        // Cho cái trạng thái
        'assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
        'assets/pages/scripts/components-bootstrap-select.min.js',

        //Tiny

        'tinymce/tinymce.min.js',

        'js/jquery-ui.js',
        'js/canvasjs.min.js',
        'js/main.js',    
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
