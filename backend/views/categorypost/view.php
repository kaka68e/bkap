<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Categorypost */

$this->title = $model->categorypost_id;
$this->params['breadcrumbs'][] = ['label' => 'Categoryposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorypost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->categorypost_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->categorypost_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'categorypost_id',
            'categorypost_name',
            'categorypost_slug',
            'parent_id',
            'image',
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
