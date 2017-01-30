<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orderitem */

$this->title = 'Tạo mới chi tiết Đơn Hàng';
$this->params['breadcrumbs'][] = ['label' => 'Chi tiết Đơn Hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderitem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
