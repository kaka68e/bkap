<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliver */

$this->title = 'Cập nhật Phương Thức Vận Chuyển: ' . $model->deliver_id;
$this->params['breadcrumbs'][] = ['label' => 'Phương Thức Vận Chuyển', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->deliver_id, 'url' => ['view', 'id' => $model->deliver_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="deliver-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
