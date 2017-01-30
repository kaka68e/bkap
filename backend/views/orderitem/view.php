<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderitem */

$this->title = $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Đơn Hàng', 'url' => ['/order']];
$this->params['breadcrumbs'][] = ['label' => 'Chi tiết Đơn Hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderitem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id_order' => $model->id_order, 'id_product' => $model->id_product], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id_order' => $model->id_order, 'id_product' => $model->id_product], [
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
            'id_order',
            'id_product',
            'product_price',
            'product_quantity',
            'product_total',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
