<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="logo">
    <span style="font-size:45px;color:#fff"><span>E</span>-Shopper</span> 
</div>

<div class="content">
     <!-- BEGIN LOGIN FORM -->
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-title">
            <span class="form-title">Chào mừng.</span>
            <span class="form-subtitle">Hãy đăng nhập.</span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Tên đăng nhập</label>
            <!-- <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Tên đăng nhập" name="username" /> </div> -->

            <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Tên đăng nhập'])->label(false) ?>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
            <!-- <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password" /> </div> -->

            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Mật khẩu'])->label(false) ?>
        <div class="form-actions">
            <!-- <button type="submit" class="btn red btn-block uppercase">Đăng nhập</button> -->

            <?= Html::submitButton('Đăng nhập', ['class' => 'btn red btn-block uppercase', 'name' => 'login-button']) ?>
        </div>
        <div class="form-actions">
            <div class="pull-left">
               <!-- <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" /> Ghi nhớ tôi
                    <span></span>
                </label> -->

                <label class="rememberme mt-checkbox mt-checkbox-outline">
                     <?= $form->field($model, 'rememberMe')->checkbox(['value' => '0'])->label('Ghi nhớ tôi') ?>
                </label>
<?php ActiveForm::end(); ?>
            </div>
            <div class="pull-right forget-password-block">
                <a href="javascript:;" id="forget-password" class="forget-password">Quên mật khẩu?</a>
            </div>
        </div>
    
    <!-- END LOGIN FORM -->

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="" method="post">
        <div class="form-title">
            <span class="form-title">Forget Password ?</span>
            <span class="form-subtitle">Enter your e-mail to reset it.</span>
        </div>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Back</button>
            <button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>