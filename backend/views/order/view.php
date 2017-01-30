<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use backend\models\Customer;
use backend\models\Product;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Hóa đơn: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->order_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa không ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header'=>'STT',
                'headerOptions' =>[
                    'style'=>'color:#337db9;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
            ],

            //'id_order',
            [
                'attribute'=> 'id_order',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            //'id_product',
            [
                'attribute'=> 'id_product',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:left;vertical-align: middle;',
                ],
                'content' => function($model)
                {
                    $block_name = Product::find()->where(['product_id' => $model->id_product])->one();
                    if ($block_name) {
                        return $block_name->product_name;
                    } else {
                        return 'Không rõ';
                    }
                }
            ],
            //'product_price',
            [
                'attribute'=> 'product_price',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
           // 'product_quantity',
            [
                'attribute'=> 'product_quantity',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            //'product_total',
            [
                'attribute'=> 'product_total',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content'=>function($model){
                    return number_format($model->product_total);
                }
            ],
            //'status',
            [
                'attribute'=> 'status',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->status == 0) {
                        return '<span class = "" style="color:#7f8c8d">Hủy</span>';
                    } else {
                        return '<span class = "" style="color:#3498db">OK</span>';
                    }
                }
            ],
            // 'created_at',
            // 'updated_at',
            // [
            //     'attribute' => 'created_at',
            //     'headerOptions' => [
            //         'style' => 'text-align:center',
            //     ],
            //     'contentOptions' => [
            //         'style' => 'text-align:center;vertical-align: middle;',
            //     ],
            //     'content' => function($ketqua){
            //         return date('h:i ::: d/m/Y',$ketqua->created_at);
            //     }
            // ],
            // 'updated_at',
            // [
            //     'attribute' => 'updated_at',
            //     'headerOptions' => [
            //         'style' => 'text-align:center',
            //     ],
            //     'contentOptions' => [
            //         'style' => 'text-align:center;vertical-align: middle;',
            //     ],
            //     'content' => function($ketqua){
            //         return date('h:i ::: d/m/Y',$ketqua->updated_at);
            //     }
            // ],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Hành động',
                'headerOptions' =>[
                    'style'=>'color:#337db9;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'buttons'=>[
                    'view' => function($url,$model){
                        $url = str_replace('r=order', 'r=orderitem', $url);
                        return Html::a('<i class="fa fa-search"></i> Xem',$url,['class'=>'btn btn-circle btn-xs btn-primary','title' => 'Xem chi ti']);
                    },

                    'update' => function($url,$model){
                        $url = str_replace('r=order', 'r=orderitem', $url);
                        return Html::a('<i class="fa fa-edit"></i> Sửa',$url,['class'=>'btn btn-circle btn-xs green-meadow','title' => 'Sửa']);
                    },

                    'delete' => function($url,$model){
                        $url = str_replace('r=order', 'r=orderitem', $url);
                        return Html::a('',$url,
                            [
                                // 'class'=>'btn btn-circle btn-xs red',
                                // 'title' => 'Xóa',
                                // 'data-confirm' =>'Bạn có chắc muốn xóa không ?',
                                // 'data-method'=>'post'
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'status',
            [
             'attribute' => 'status',
             'value' => (($model->status ==0) ? "Hủy": (($model->status ==1)? "Mới đặt hàng" : (($model->status ==2)? "Đang giao hàng" : "Hoàn thành"))),
            ],
            //'total',
             [
             'attribute' => 'total',
             'value' => number_format($model->total),
            ],
            'order_id',
            'id_customer',
            'customer_name',
            'mobile',
            'address',
            'email:email',
            'customer_ship',
            'mobile_ship',
            'address_ship',
            'email_ship:email',
            'request',
            'id_payment',
            'id_deliver',

            'created_at',
            'date_buy_created',
            'date_buy_updated'
        ],
    ]) ?>




</div>
