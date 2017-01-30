<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderitem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderitem-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_order')->textInput() ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <?= $form->field($model, 'product_price')->textInput() ?>

    <?= $form->field($model, 'product_quantity')->textInput() ?>

    <?= $form->field($model, 'product_total')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            '1' => 'OK',
            '0' => 'Hủy',
        ],
        ['class'=>'bs-select form-control']
    ); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

