<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ReviewproductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviewproduct-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'reviewproduct_id') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_product') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'customer_email') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'parent_review_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
