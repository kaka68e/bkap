<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
if (!isset($model->image)) {
    $model->image = "uploads/images/default/a1.jpg";
}

$category = new Category();
?>

<div class="category-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'category_name')->textInput(['maxlength' => true,'id' => 'name']) ?>

            <?= $form->field($model, 'category_slug')->textInput(['maxlength' => true,'id' => 'slug']) ?>

            <?= $form->field($model, 'parent_id')->dropDownList(
                $category->getCategoryParent1()
                 // ['class'=>'bs-select form-control']
            )?>

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

            <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'rows' => 6]) ?>

            <?= $form->field($model, 'order_by')->textInput() ?>

            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>