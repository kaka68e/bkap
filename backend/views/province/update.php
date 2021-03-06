<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Province */

$this->title = 'Cập nhật Tỉnh Thành: ' . $model->province_id;
$this->params['breadcrumbs'][] = ['label' => 'Tỉnh Thành', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->province_id, 'url' => ['view', 'id' => $model->province_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="province-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
