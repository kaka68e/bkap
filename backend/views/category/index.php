<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh Mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

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
                    'style'=>'color:#337db9;text-align:center;vertical-align: middle;'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
            ],
            //'image',
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

            //'category_id',
            [
                'attribute'=> 'category_id',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            //'category_name',
            [
                'attribute'=> 'category_name',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:left;vertical-align: middle;',
                ],
            ],

            [
                'attribute'=> 'order_by',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->order_by == NULL) {
                        return 'NULL';
                    } else {
                        return $ketqua->order_by;
                    }
                }
                
            ],
            //'category_slug',
            // [
            //     'attribute'=> 'category_slug',
            //     'headerOptions' => [
            //         'style'=>'text-align:center;vertical-align: middle;',
            //     ],
            //     'contentOptions' => [
            //         'style'=>'text-align:left;vertical-align: middle;',
            //     ],
            // ],
            //'parent_id',
            [
                'attribute' => 'parent_id',
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->parent_id == 0) {
                        return 'Root';
                    } else {
                        $parent_name = Category::find()->where(['category_id' => $ketqua->parent_id,'status' => '1'])->one();
                        if ($parent_name) {
                            return $parent_name->category_name;
                        } else {
                            return 'Không rõ';
                        }
                    }
                },
                'filter' => ArrayHelper::map(Category::find()->where(['status'=>1,'parent_id'=>0])->all(),'category_id','category_name')
            ],
            
            // 'description',
            // 'order_by',
            // 'meta_keyword',
            // 'meta_description',
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
            [
                'attribute' => 'updated_at',
                'headerOptions' => [
                    'style' => 'text-align:center',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return date('d-m-Y',$ketqua->updated_at);
                },
                'filter' => false
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
