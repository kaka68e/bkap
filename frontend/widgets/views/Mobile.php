<?php 
use yii\helpers\Html;


?>
<div id="mobile-menu">
	<ul>
		<li>
			<div class="mm-search">
				<form id="search1" name="search">
					<div class="input-group">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
						</div>
						<input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
					</div>
				</form>
			</div>
		</li>
		<li><a href="<?php echo Yii::$app->homeUrl ?>">Home</a>
		</li>


	</ul>
	<div class="top-links">
		<ul class="links">
			<li><a title="My Account" href="<?php echo Yii::$app->homeUrl ?>client">My Account</a> </li>
			<li><a title="Wishlist" href="<?php echo Yii::$app->homeUrl ?>client/wishlist">Wishlist</a> </li>
			<li><a title="Checkout" href="<?php echo Yii::$app->homeUrl ?>client/order">Checkout</a> </li>
			<li class="last">
			<?php echo Html::a('<span>Thoát</span>',['site/logout'],['data-method'=>'post']) ?> 
			</li>
		</ul>
	</div>
</div>