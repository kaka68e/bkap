<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Sản Phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa không ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'product_name',
            'product_slug',
            [
                'attribute'=>'image',
                'format' => ['image',['width'=>'120','height'=>'120']],
                //'value'=>'../../'.$model->image,
                'value' => empty($model->image) ? '../../uploads/images/default/a1.jpg' : '../../'.$model->image
            ],
            'price_push_up',
            'price_real',
            'quantity',
            'start_sale',
            'end_sale',
            'id_category',
            'id_supplier',
            'meta_keyword',
            'meta_description',
            'tags',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
