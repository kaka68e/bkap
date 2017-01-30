<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản Phẩm';
$this->params['breadcrumbs'][] = $this->title;
$category = new Category();
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>
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

            //'product_id',
            //'product_name',

            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Hình ảnh',
                'value' => function ($data) {
                    if (!$data['image']) {
                        return Html::img('../../uploads/images/default/a1.jpg' ,['width' => '50px','class' => 'img-circle','height'=> '50px']);
                    } else {
                       return Html::img('../../' . $data['image'],['width' => '50px','class' => 'img-circle','height'=> '50px']); 
                    }  
                },
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;padding-top: 3px;padding-bottom: 3px;',
                ],
                'filter' => false
            ],

            [
                'attribute'=> 'product_id',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            [
                'attribute'=> 'product_name',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:left;vertical-align: middle;',
                ],
            ],

            [
                'attribute' => 'id_category',
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                // 'content' => function($ketqua){
                //     $category_name = Category::find()->where(['category_id' => $ketqua->id_category,'status' => '1'])->one();

                //     return $category_name->category_name;
                // }
                'value'=>'idCategory.category_name',
                'filter'=> $category->getCategoryParent2(),
            ],
            //'product_slug',
            //'image',
            
            //'price_push_up',
           // 'price_real',
            [
                'attribute'=> 'price_push_up',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return number_format($ketqua->price_push_up).' Đ';   
                }
            ],

            [
                'attribute'=> 'price_real',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return number_format($ketqua->price_real).' Đ';   
                }
            ],
            // 'quantity',
             [
                'attribute'=> 'quantity',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            // 'start_sale',
            // 'end_sale',
            // 'id_category',
            // 'id_supplier',
            // 'meta_keyword',
            // 'meta_description',
            // 'tags',
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
                    if ($ketqua->status == 0) {
                        return '<span class = "glyphicon glyphicon-remove fix-icon2" style="color:#c0392b"></span>';
                    }else {
                        return '<span class = "glyphicon glyphicon-ok fix-icon" style="color:#2ecc71"></span>';
                    }
                },
                'filter' => ['1'=>'Kích hoạt','0'=>'Không kích hoạt']
            ],
            // 'created_at',
            // 'updated_at',

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
