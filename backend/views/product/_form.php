<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;
use backend\models\Supplier;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
if (!isset($model->image)) {
    $model->image = "uploads/images/default/a1.jpg";
}

$category = new Category();
$supplier = new Supplier();
?>

<div class="product-form">
    <div class="row">

        <?php $form = ActiveForm::begin(); ?>
    
        <div class="col-md-5 col-sm-8">


            <?= $form->field($model, 'id_category')->dropDownList(
                $category->getCategoryParent2(),
                ['prompt'=>'--- Chọn nhà danh mục sản phẩm ---']
            )?>

            <?= $form->field($model, 'product_name')->textInput(['maxlength' => true,'id' => 'name']) ?>

            <?= $form->field($model, 'product_slug')->textInput(['maxlength' => true,'id' => 'slug']) ?>

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

            <?= $form->field($model, 'id_supplier')->dropDownList(
                $supplier->getAllSupplier(),
                ['prompt'=>'--- Chọn nhà cung cấp ---']
            )?>
            <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-5 col-sm-8">

            <?= $form->field($model, 'price_real')->textInput() ?>

            <?= $form->field($model, 'price_push_up')->textInput() ?>

            <?= $form->field($model, 'quantity')->textInput() ?>

            <?= $form->field($model, 'start_sale')->textInput(['class'=>'form-control a1','readonly'=>false]) ?>

            <?= $form->field($model, 'end_sale')->textInput(['class'=>'form-control a1','readonly'=>false]) ?>

            <?= $form->field($model, 'meta_keyword')->textArea(['maxlength' => true,'rows'=>6]) ?>

        </div>
        <div class="col-md-10 col-sm-10">

            <?= $form->field($model, 'meta_description')->textArea(['maxlength' => true,'id'=>'content']) ?>

            <?= $form->field($model, 'status')->checkBox() ?>
            
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
