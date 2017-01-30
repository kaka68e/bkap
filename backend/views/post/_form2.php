<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categorypost;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$categorypost = new Categorypost();
?>

<div class="post-form">

    <div class="row">

        <?php $form = ActiveForm::begin(); ?>
    
        <div class="col-md-5 col-sm-8">

            <?= $form->field($model, 'id_categorypost')->dropDownList(
                $categorypost->getCategoryPostParent2(),
                ['prompt'=>'--- Chọn thể loại bài viết ---']
            )?>



            <?= $form->field($model, 'image')->textInput(['maxlength' => true,'id' => 'image','readonly'=>true]) ?>
             <div class="row">
                <div class="col-md-7">
                    <a href="#" id="select-img" class="btn btn-sm btn-success">Chọn ảnh</a>
                    <a href="#" id="delete-img" class="btn btn-sm btn-danger">Xóa ảnh</a>
                </div>
                <div class="col-md-5">
                    <img src="<?php if(!$model->image){echo '../../uploads/images/default/a1.jpg';} else{ echo '../../'.$model->image;} ?>" alt="" id = "show-img" style = "float:right;border:1px solid #bdc3c7;width:150px;height:150px">
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-8">
            <?= $form->field($model, 'post_name')->textInput(['maxlength' => true,'id' => 'name']) ?>

            <?= $form->field($model, 'post_slug')->textInput(['maxlength' => true,'id' => 'slug']) ?>
            
            <?= $form->field($model, 'description')->textArea(['maxlength' => true,'rows'=>6]) ?>


            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?> 
        </div>

        <div class="col-md-10 col-sm-10">

            <?= $form->field($model, 'content')->textarea(['rows' => 6,'id'=>'content']) ?>


            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
