<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container col1-layout">
	<div class="main container">
		<div class="account-login">
			<div class="page-title">
				<h2 class="fix_h2">Đăng nhập hệ thống E-Shopper</h2>
			</div>

			<fieldset class="col2-set">
				
				<div class="col-1 new-users">
				<!-- <strong>Khách Hàng Đã Có Tài Khoản</strong> -->
					<div class="content">

					<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
						<p>Nếu bạn đã có tài khoản với chúng tôi, vui lòng đăng nhập</p>
						<ul class="form-list">
							<li>
								<label for="email">Tên đăng nhập<span class="required">*</span></label>
								<br>
								<!-- <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="login[username]"> -->
								<?= $form->field($model, 'username')->textInput([
									'autofocus' => false,
									'class' => 'input-text a1 required-entry'
								])->label(false) ?>
							</li>
							<li>
								<label for="pass">Mật khẩu<span class="required">*</span></label>
								<br>
								<!-- <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login[password]"> -->
								<?= $form->field($model, 'password')->passwordInput([
									'autofocus' => false,
									'class' => 'input-text a1 required-entry'
								])->label(false) ?>
							</li>
							<li>
								<?= $form->field($model, 'rememberMe')->checkbox(['class' => 'checkbox_remember','value'=>'0'])->label('Ghi nhớ tôi') ?>
							</li>
						</ul>
					

						<!-- <p class="required">* Trường bắt buộc</p> -->
						<div class="buttons-set">
							<!-- <button id="send2" name="send" class="button login"><span>Đăng Nhập</span></button> -->

							<?= Html::submitButton('<span>Đăng Nhập</span>', ['name' => 'login-button','class'=>'button login']) ?>
						<?php ActiveForm::end(); ?>

							
							<a class="forgot-word" href="http://demo.magentomagik.com/computerstore/customer/account/forgotpassword/">Bạn quên mật khẩu ?</a>
						</div>
					</div>
				</div>

				<div class="col-2 registered-users"><strong>Khách hàng mới</strong>
					<div class="content">
						<p style="line-height: 2.0;">Bằng cách tạo một tài khoản với hệ thống của chúng tôi, bạn sẽ có thể thao tác thực hiện quá trình mua hàng nhanh hơn, lưu trữ nhiều địa chỉ gửi hàng hơn, xem và theo dõi đơn đặt hàng của bạn trong tài khoản của bạn và nhiều hơn nữa..</p>
						<div class="buttons-set">
							<!-- <button class="button create-account" type="button"><span>Tạo mới tài khoản</span></button> -->
							<?php echo Html::a('<button class="button create-account" type="button"><span>Tạo mới tài khoản</span></button>',['site/signup']) ?>
						</div>
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

