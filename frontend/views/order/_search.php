<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'customer_ship') ?>

    <?php // echo $form->field($model, 'mobile_ship') ?>

    <?php // echo $form->field($model, 'address_ship') ?>

    <?php // echo $form->field($model, 'email_ship') ?>

    <?php // echo $form->field($model, 'request') ?>

    <?php // echo $form->field($model, 'id_payment') ?>

    <?php // echo $form->field($model, 'id_deliver') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
