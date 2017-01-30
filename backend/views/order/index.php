<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Customer;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
date_default_timezone_set('Asia/Vientiane');
//echo date('d-m-Y H:i',time());
$this->title = 'Đơn Hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>
    </p>

    <?php 
$gridColumns = [
    'order_id',
    'id_customer',
    'customer_name',
    'mobile',
    'address',
    'email',
    'customer_ship',
    'mobile_ship',
    'address_ship',
    'email_ship',
    'request',
    'id_payment',
    'id_deliver',
    'total',
    'status',
    'created_at',
    'date_buy_created',
    'date_buy_updated'

];

echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);


 ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn',
            //     'header'=>'STT',
            //     'headerOptions' =>[
            //         'style'=>'color:#337db9;text-align:center;vertical-align: middle;'
            //     ],
            //     'contentOptions' => [
            //         'style' => 'text-align:center;vertical-align: middle;',
            //     ],
            // ],
            
            //'order_id',
            [
                'attribute'=> 'order_id',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            //'id_customer',
            [
                'attribute'=> 'id_customer',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model)
                {
                    $block_name = Customer::find()->where(['customer_id' => $model->id_customer])->one();
                    if ($block_name) {
                        return $block_name->customer_username;
                    } else {
                        return 'Không rõ';
                    }
                }
            ],
           // 'customer_name',
            [
                'attribute'=> 'customer_name',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            //'mobile',
            //'address',
            // 'email:email',
            // 'customer_ship',
             [
                'attribute'=> 'customer_ship',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            // 'mobile_ship',
            // 'address_ship',
            // 'email_ship:email',
            // 'request',
            // 'id_payment',
            // 'id_deliver',
            // 'total',
            // 'status',
            [
                'attribute'=> 'status',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->status == 1) {
                        return '<span class = "" style="color:#c0392b">Mới đặt hàng</span>';
                    }elseif($ketqua->status == 2) {
                        return '<span class = "" style="color:#2ecc71">Đang giao hàng</span>';
                    } elseif ($ketqua->status == 3) {
                        return '<span class = "" style="color:#3498db">Hoàn thành</span>';
                    } else {
                        return '<span class = "color:#7f8c8d">Hủy</span>';
                    }
                },
                'filter' => [
                    '1' => 'Mới đặt',
                    '2' => 'Đang giao hàng',
                    '3' => 'Hoàn thành',
                    '0' => 'Hủy',
                ]
            ],
            // 'created_at',
            [
                'attribute' => 'created_at',
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return date('h:i ::: d/m/Y',$ketqua->created_at);
                },
                'filter' =>false
            ],
            //'date_buy_created',
            [
                'attribute' => 'date_buy_created',
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                // 'content' => function($ketqua){
                //     return Yii::$app->formatter->asDate($ketqua->birthday,'dd/MM/yyyy');
                // },
                'content' => function($ketqua){
                    return Yii::$app->formatter->asDate($ketqua->date_buy_created,'dd/MM/yyyy');
                },
               
                'filter' => Html::input('text',
                    'OrderSearch[date_buy_created]','',['class'=>'form-control a1']
                ),


            ],
            // 'date_buy_updated',
            [
                'attribute' => 'date_buy_updated',
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                // 'content' => function($ketqua){
                //     return Yii::$app->formatter->asDate($ketqua->birthday,'dd/MM/yyyy');
                // },
                'content' => function($ketqua){
                    return Yii::$app->formatter->asDate($ketqua->date_buy_updated,'dd/MM/yyyy');
                },
               
                'filter' => Html::input('text',
                    'OrderSearch[date_buy_updated]','',['class'=>'form-control a1']
                ),


            ],


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Hành động',
                'headerOptions' =>[
                    'style'=>'color:#337db9;text-align:center;vertical-align: middle;'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'buttons'=>[
                    'view' => function($url,$model){
                        return Html::a('<i class="fa fa-search"></i> Xem',$url,['class'=>'btn btn-circle btn-xs btn-primary','title' => 'Xem chi ti']);
                    },

                    'update' => function($url,$model){
                        return Html::a('<i class="fa fa-edit"></i> Sửa',$url,['class'=>'btn btn-circle btn-xs green-meadow','title' => 'Sửa']);
                    },

                    'delete' => function($url,$model){
                        return Html::a('<i class="fa fa-times"></i> Xóa',$url,
                            [
                                'class'=>'btn btn-circle btn-xs red',
                                'title' => 'Xóa',
                                'data-confirm' =>'Bạn có chắc muốn xóa không ?',
                                'data-method'=>'post'
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>
</div>
