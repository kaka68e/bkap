<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Wishlist */

$this->title = 'Update Wishlist: ' . $model->id_customer;
$this->params['breadcrumbs'][] = ['label' => 'Wishlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_customer, 'url' => ['view', 'id_customer' => $model->id_customer, 'id_product' => $model->id_product]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wishlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
