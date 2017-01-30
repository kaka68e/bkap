<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Province;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$province = new Province();
?>

<div class="customer-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'customer_username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_province')->dropDownList(
                $province->getAllProvince()
                // ['prompt'=>'--- Chọn tỉnh thành ---']
            ) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
            
             <?= $form->field($model, 'image')->textInput(['maxlength' => true,'id' => 'image','readonly'=>true]) ?>

            <div class="row">
                <div class="col-md-7">
                    <a href="#" id="select-img" class="btn btn-sm btn-success">Chọn ảnh</a>
                    <a href="#" id="delete-img" class="btn btn-sm btn-danger">Xóa ảnh</a>
                </div>
                <div class="col-md-5">
                    <img src="<?php if(!$model->image){echo '../../uploads/images/default/a1.jpg';} else{ echo '../../'.$model->image;} ?>" alt="" id = "show-img" style = "float:right;border:1px solid black;width:150px;height:150px">
                </div>
            </div>


            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
