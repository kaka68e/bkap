<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all',
        'assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/global/plugins/simple-line-icons/simple-line-icons.min.css',

        'assets/global/plugins/bootstrap/css/bootstrap.min.css',

        //'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
       // 'assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css',

        // Model Class
        //'assets/global/plugins/select2/css/select2.min.css',
        //'assets/global/plugins/select2/css/select2-bootstrap.min.css',
        //Hết

        'assets/global/css/components.min.css',
        //'assets/global/css/plugins.min.css',

        'assets/pages/css/login-2.min.css',
        'css/site3.css'
    ];
    public $js = [

        'assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'assets/global/plugins/js.cookie.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

        'assets/global/scripts/app.min.js',
        
        //'assets/pages/scripts/login.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
