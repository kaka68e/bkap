<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Wishlist */

$this->title = $model->id_customer;
$this->params['breadcrumbs'][] = ['label' => 'Wishlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_customer' => $model->id_customer, 'id_product' => $model->id_product], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_customer' => $model->id_customer, 'id_product' => $model->id_product], [
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
            'id_customer',
            'id_product',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
