<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categorypost;


/* @var $this yii\web\View */
/* @var $model backend\models\Categorypost */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$category_post = new Categorypost();
?>

<div class="categorypost-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'categorypost_name')->textInput(['maxlength' => true,'id' => 'name']) ?>

            <?= $form->field($model, 'categorypost_slug')->textInput(['maxlength' => true,'id' => 'slug']) ?>

            <?= $form->field($model, 'parent_id')->dropDownList(
                $category_post->getCategoryPostParent1()
                 // ['class'=>'bs-select form-control']
            )?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textArea(['maxlength' => true,'rows'=>6]) ?>

            <?= $form->field($model, 'order_by')->textInput() ?>

            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>