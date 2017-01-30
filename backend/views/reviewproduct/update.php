<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reviewproduct */

$this->title = 'Cập nhật Đánh giá Sản Phẩm: ' . $model->reviewproduct_id;
$this->params['breadcrumbs'][] = ['label' => 'Reviewproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reviewproduct_id, 'url' => ['view', 'id' => $model->reviewproduct_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="reviewproduct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
