<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = $model->category_id;
$this->params['breadcrumbs'][] = ['label' => 'Danh Mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->category_id], [
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
            'category_id',
            'category_name',
            'category_slug',
            'parent_id',
            [
                'attribute'=>'image',
                'format' => ['image',['width'=>'120','height'=>'120']],
                //'value'=>'../../'.$model->image,
                'value' => empty($model->image) ? '../../uploads/images/default/a1.jpg' : '../../'.$model->image
            ],
            'description',
            'order_by',
            'meta_keyword',
            'meta_description',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
