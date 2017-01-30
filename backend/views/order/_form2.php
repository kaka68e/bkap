<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

             <?= $form->field($model, 'status')->dropDownList(
                [
                    '1' => 'Mới đặt hàng',
                    '2' => 'Đang giao hàng',
                    '3' => 'Hoàn thành',
                    '0' => 'Hủy',
                ],
                ['class'=>'bs-select form-control']
            ); ?>

            <?= $form->field($model, 'id_customer')->textInput() ?>

            <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'customer_ship')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mobile_ship')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address_ship')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email_ship')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'request')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_payment')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_deliver')->textInput(['maxlength' => true]) ?>


           

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
