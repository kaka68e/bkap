<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;

/* @var $this yii\web\View */
/* @var $model backend\models\Province */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$time = time();
$model->created_at = $time;
$model->updated_at = $time;
?>

<div class="province-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
                // 'validationUrl' => 'validate',
            ]); ?>

            <?= $form->field($model, 'province_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'province_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <?php echo $form->field($model, 'created_at')->hiddenInput()->label(false); ?>
            <?php echo $form->field($model, 'updated_at')->hiddenInput()->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

