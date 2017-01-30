<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

$this->title = 'Đăng kí';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	
</head>

<section class="main-container col1-layout">
	<div class="main container">
		<div class="account-login">
			<div class="page-title">
				<h2 class="fix_h2" style="font-family: 'Open Sans', sans-serif;">Tạo tài khoản E-Shopper của bạn</h2>
			</div>
			<fieldset class="col2-set">
				<div class="col-1 new-users">
				<p style="font-size:22px;text-align:center">Bạn chỉ cần có một tài khoản</p>
				<p style="font-size:15px;text-align:center">Một tài khoản miễn phí giúp bạn truy cập mọi dịch vụ của E-shopper</p>
					<div class="content">
						<p style="line-height: 2.0;"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>&nbsp;Thao tác thực hiện quá trình mua hàng nhanh hơn</p>
						<p style="line-height: 2.0;"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;Lưu trữ nhiều địa chỉ gửi hàng hơn</p>
						<p style="line-height: 2.0;"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp; Theo dõi đơn đặt hàng của bạn trong tài khoản</p>
						<div class="buttons-set">
							
						</div>
					</div>
				</div>
				<div class="col-2 registered-users">
				<!-- <strong>Khách Hàng Đăng Nhập</strong> -->
					<div class="content">
						<!-- <p>Nếu bạn đã có tài khoản với chúng tôi, vui lòng đăng nhập</p> -->
						<?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'id' => 'form-signup']); ?>
						<ul class="form-list">
							<li>
								<label for="email">Tên đăng nhập: <span class="required">*</span></label>
								<!-- <br> -->
								<!-- <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="login[username]"> -->
								<?= $form->field($model, 'customer_username')->textInput([
									'autofocus' => false,
									'class' => 'input-text a1 required-entry'
								])->label(false) ?>
							</li>
							<li>
								<label for="pass">Mật khẩu: <span class="required">*</span></label>
								<!-- <br> -->
								<!-- <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login[password]"> -->
								<?= $form->field($model, 'password')->passwordInput([
									'autofocus' => false,
									'class' => 'input-text a1 required-entry'
								])->label(false) ?>

							</li>
							<li>
								<label for="pass">Email: <span class="required">*</span></label>
								<br>
								<!-- <input type="text" title="Email" id="pass" class="input-text required-entry validate-password" name="login[password]"> -->
								<?= $form->field($model, 'email')->textInput([
									'autofocus' => false,
									'class' => 'input-text a1 required-entry'
								])->label(false) ?>
							</li>

						</ul>
						<div class="buttons-set">
							<!-- <button id="send2" name="send" type="submit" class="button login"><span>Xác nhận</span></button> -->
							 <?= Html::submitButton('<span>Xác nhận</span>', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
						</div>
						<?php ActiveForm::end(); ?>
					</div>
				</div>
			</fieldset>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
	</div>
</section>