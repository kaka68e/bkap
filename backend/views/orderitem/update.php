<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderitem */

$this->title = 'Cập nhật chi tiết Đơn Hàng: ' . $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Đơn Hàng', 'url' => ['/order']];
$this->params['breadcrumbs'][] = ['label' => 'Chi tiết Đơn Hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_order, 'url' => ['view', 'id_order' => $model->id_order, 'id_product' => $model->id_product]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="orderitem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
