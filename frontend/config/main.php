<?php
use \yii\web\Request;
$request = new Request();
$baseUrl = str_replace('/frontend/web', '', $request->baseUrl);

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\Customer',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'request'=>[
            'baseUrl' =>$baseUrl
        ],

        
        'urlManager' => [
            'baseUrl' =>$baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'gioi-thieu' =>'site/about',
                'lien-he' =>'site/contact',
                'cau-hoi-thuong-gap' =>'site/faq',
                'dang-nhap' =>'site/login',
                'dang-ky' =>'site/signup',
                'chinh-sach-thanh-toan' =>'site/payment',
                'chinh-sach-doi-tra' =>'site/return',
                'tin-tuc' =>'post/index',
                'danhmuc/<slug>' =>'product/listproduct',
                'sanpham/<slug>' =>'product/detail',
                'bai-viet/chi-tiet/<slug>' =>'post/detail'
            ],
        ],
        
    ],
    'params' => $params,
];
