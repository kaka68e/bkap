<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */

$this->title = 'Cập nhật Phương Thức Thanh Toán: ' . $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Phương Thức Thanh Toán', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_id, 'url' => ['view', 'id' => $model->payment_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
