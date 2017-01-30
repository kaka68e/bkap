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
        'css/site.css',

        // <!-- Favicons Icon -->
        // 'http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico',
        // 'http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico',

        // <!-- CSS Style -->
        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/simple-line-icons.css',


        
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/jquery.bxslider.css',
        'css/jquery.mobile-menu.css',
        'css/style.css',
        'css/revslider.css',

        // 'css/blogmate.css',
       
        // 'css/flexslider.css',

        // <!-- Google Fonts -->
        'http://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400',
        'https://fonts.googleapis.com/css?family=Raleway:400,300,600,500,700,800',
        'css/components.min.css',


        'css/sweetalert.min.css',
        'css/site2.css',

    ];
    
    public $js = [
        // 'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/common.js',
         
        'js/owl.carousel.min.js',
        'js/jquery.mobile-menu.min.js',
        'js/main.js',
        'js/sweetalert.min.js',
        'js/jquery.form.js'


    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
