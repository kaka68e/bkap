<?php 
use yii\helpers\Html;


?>

<footer>
	<div class="footer-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-lg-8">
					<div class="footer-column pull-left">
						<h4 style="padding-top:3px">Tài khoản của bạn</h4>
						<ul class="links">
							<?php 
								if (Yii::$app->user->isGuest) :
							 ?>							
							<li class="first">
								<a title="Login" href="<?= Yii::$app->homeUrl ?>site/login">Đăng nhập</a>
							</li>
							<?php else: ?>
								<li class="first">
									<?php echo Html::a('Thoát',['site/logout'],['data-method'=>'post']) ?>
								</li>
							<?php endif; ?>
							<li><a title="About us" href="<?= Yii::$app->homeUrl ?>client/info">Tài khoản của bạn</a> </li>
							<li><a title="Wishlist" href="<?= Yii::$app->homeUrl ?>client/wishlist">Danh sách yêu thích</a> </li>
							<li><a title="Checkout" href="<?= Yii::$app->homeUrl ?>client/order">Đơn hàng của bạn</a> </li>
						</ul>
					</div>
					<div class="footer-column pull-left">
						<h4 style="padding-top:3px">Về chúng tôi</h4>
						<ul class="links">
							<li class="first">
								<?= Html::a('Giới thiệu',['site/about'],['title'=>'Giới thiệu']) ?>
							</li>
								<!-- <li>
									<a title="Information" href="#">Tuyển dụng</a>
								</li> -->
								<li>
									<?= Html::a('Liên hệ',['site/contact'],['title'=>'Liên hệ']) ?>
								</li>
								<li>
									<?= Html::a('Chính sách thanh toán',['site/payment'],['title'=>'Chính sách thanh toán']) ?>
								</li>
								<li>
									<?= Html::a('Chính sách đổi trả',['site/return'],['title'=>'Chính sách đổi trả']) ?>
								</li>
								<li class="last"><a title=" Additional Information" href="#">FAQs</a> </li>
							</ul>
						</div>
						<div class="footer-column pull-left">
							<h4 style="padding-top:3px">uy tín - trách nhiệm</h4>


							<ul class="links">
								<li class="first"><a title="Your Account" href="javacript:void(0)">Địa chỉ 1 : Phố Ngô Xuân Quảng, thị trấn Trâu Quỳ, Gia Lâm Hà Nội, Việt Nam</a> </li>
								<li><a title="Information" href="#">Địa chỉ 2 : 34Q Đường 43B, Phường 10, Quận 6, Tp. Hồ Chí Minh</a> </li>
								<li><a title="Addresses" href="#">Địa chỉ 3 : Khu ĐTM Nam Cường, P. Cổ Nhuế 1, Quận Bắc Từ Liêm</a> </li>
							</ul>
							<!-- <span style="color:#717171">Địa chỉ 1 : Phố Ngô Xuân Quảng, thị trấn Trâu Quỳ, Gia Lâm Hà Nội, Việt Nam</span>
							<br>
							<br>
							<span style="color:#717171">Địa chỉ 2 : 34Q Đường 43B, Phường 10, Quận 6, Tp. Hồ Chí Minh</span>
							<br>
							<br>
							<span style="color:#717171">Địa chỉ 3 : Khu ĐTM Nam Cường, P. Cổ Nhuế 1, Quận Bắc Từ Liêm</span> -->
						</div>
					</div>
					<div class="col-xs-12 col-lg-4">
						<div class="footer-column-last">
							<div class="newsletter-wrap">
								<h4>Đăng kí qua Email</h4>
								<form id="newsletter-validate-detail" method="post" action="#">
									<div id="container_form_news">
										<div id="container_form_news2">
											<input type="text" class="input-text required-entry validate-email" value="Nhập địa chỉ Email của bạn" onFocus=" this.value='' " title="Sign up for our newsletter" id="newsletter" name="email">
											<button class="button subscribe" title="Subscribe" type="submit"><span>Đăng Kí</span> </button>
										</div>
									</div>
								</form>
							</div>
							<div class="social">
								<h4>Theo dõi chúng tôi</h4>
								<ul class="link">
									<li class="fb pull-left"> <a href="#"></a> </li>
									<li class="tw pull-left"> <a href="#"></a> </li>
									<li class="googleplus pull-left"> <a href="#"></a> </li>
									<li class="rss pull-left"> <a href="#"></a> </li>
									<li class="pintrest pull-left"> <a href="#"></a> </li>
									<li class="linkedin pull-left"> <a href="#"></a> </li>
									<li class="youtube pull-left"> <a href="#"></a> </li>
								</ul>
							</div>
							<div class="payment-accept">
								<!-- <div>
									<img src="<?php echo Yii::$app->homeUrl ?>images/payment-1.png" alt="payment1">
									<img src="<?php echo Yii::$app->homeUrl ?>images/payment-2.png" alt="payment2">
									<img src="<?php echo Yii::$app->homeUrl ?>images/payment-3.png" alt="payment3">
									<img src="<?php echo Yii::$app->homeUrl ?>images/payment-4.png" alt="payment4">
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>