<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = 'Tạo mới Đơn hàng';
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
