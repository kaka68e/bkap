<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */

$this->title = 'Cập nhật Nhà Cung Cấp: ' . $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Nhà Cung Cấp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_id, 'url' => ['view', 'id' => $model->supplier_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="supplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
