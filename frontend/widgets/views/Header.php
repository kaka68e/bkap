<?php 
use yii\helpers\Html;
use frontend\widgets\MenuBarProduct;
use frontend\widgets\GlobalSearch;
use frontend\components\Cart;

$cart1 = new Cart();

 ?>

  	<header>
	    <div class="header-container">
	      <div class="header-top">
	        <div class="container">
	          <div class="row"> 
	            <!-- Header Language -->
	            <div class="col-xs-12 col-sm-6">
	              <div class="dropdown block-language-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> <img src="<?php echo Yii::$app->homeUrl ?>frontend/web/images/english.png" alt="language"> Tiếng Việt <span class="caret"></span> </a>
	                <ul class="dropdown-menu" role="menu">
	                  <li role="presentation"> <a href="#"><img src="images/english.png" alt="language"> English </a> </li>
	                  <li role="presentation"> <a href="#"><img src="images/francais.png" alt="language"> French </a> </li>
	                  <li role="presentation"> <a href="#"><img src="images/german.png" alt="language"> German </a> </li>
	                </ul>
	              </div>
	              <!-- End Header Language --> 
	              
	              <div class="welcome-msg"> Khách hàng là thượng đế </div>
	            </div>
	            <div class="col-xs-6 hidden-xs"> 
	              <!-- Header Top Links -->
	              <div class="toplinks">
	                <div class="links">
	                  <!-- <div class="myaccount"><a title="My Account" href="login.html"><span class="hidden-xs">My Account</span></a> </div> -->
	                  <div class="check">
	                  	<a title="Checkout" href="<?php echo Yii::$app->homeUrl ?>cart"><span class="hidden-xs">Giỏ hàng</span>
	                  	</a>
	                  	<a title="Checkout" href="<?php echo Yii::$app->homeUrl ?>checkout"><span class="hidden-xs">Thanh toán</span>
	                  	</a>
	                  </div>
	                  <!-- <div class="demo"><a title="Blog" href="blog.html"><span class="hidden-xs">Blog</span></a> </div> -->


	                  <!-- Header Company -->
	                  <!-- <div class="dropdown block-company-wrapper hidden-xs"> <a role="button" data-toggle="dropdown" data-target="#" class="block-company dropdown-toggle" href="#"> Company <span class="caret"></span></a>
	                    <ul class="dropdown-menu">
	                      <li role="presentation"><a href="about_us.html"> About Us </a> </li>
	                      <li role="presentation"><a href="#"> Customer Service </a> </li>
	                      <li role="presentation"><a href="#"> Privacy Policy </a> </li>
	                      <li role="presentation"><a href="sitemap.html">Site Map </a> </li>
	                      <li role="presentation"><a href="#">Search Terms </a> </li>
	                      <li role="presentation"><a href="#">Advanced Search </a> </li>
	                    </ul>
	                  </div> -->
	                  <!-- End Header Company -->
	                  
	                  <div class="login">
	                  <?php if (!Yii::$app->user->isGuest) : ?>
	        
	                  		<div class="dropdown block-company-wrapper hidden-xs"> <a role="button" data-toggle="dropdown" data-target="#" class="block-company dropdown-toggle" href="#">Xin chào: <?php echo Yii::$app->user->identity->customer_username ?><span class="caret"></span></a>
	                  			<ul class="dropdown-menu">
	                  				<li role="presentation">
	                  					<?php echo Html::a('Bảng điều khiển',['client/']) ?>
	                  				</li>
	                  				<li role="presentation">
	                  					<?php echo Html::a('Thông tin tài khoản',['/client/info']) ?>
	                  				</li>
	                  				<li role="presentation">
	                  					<?php echo Html::a('Đơn hàng của tôi',['/client/order']) ?>
	                  				</li>
	                  				<li role="presentation">
	                  					<?php echo Html::a('Danh sách yêu thích',['/client/wishlist']) ?>
	                  				</li>
	                  				<li role="presentation">
	                  					<?php echo Html::a('<span class="hidden-xs">Thoát</span>',['/site/logout'],['data-method' => 'post']) ?>		
	                  				</li>
	                  			</ul>
	                  			<?php echo Html::a('<span class="hidden-xs">Thoát tài khoản</span>',['/site/logout'],['data-method' => 'post','id'=>'thoat-client']) ?>		
	                  		</div>

	                  <?php else : ?>
	                  		<?php echo Html::a('<span class="hidden-xs">Đăng nhập</span>',['/site/login']) ?>
	                  		<?php echo Html::a('<span class="hidden-xs">Đăng ký</span>',['/site/signup']) ?>
	                  <?php endif ?>
	                  </div>
	                </div>
	              </div>
	              <!-- End Header Top Links --> 
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="container">
	        <div class="row">
	          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 hidden-xs">
	            <div class="search-box">
	            
				 <!-- Ô Tìm kiếm để đây -->
	             <?= GlobalSearch::widget() ?>	
	            <!-- Ô Tìm kiếm để đây -->

	            </div>
	          </div>
	          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 logo-block"> 
	            <!-- Header Logo -->
	            <div class="logo"> <a title="Shop" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>"><img alt="E-Shopper" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/images/eshopper.png"> </a> </div>
	            <!-- End Header Logo --> 
	          </div>
	          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	            <div class="top-cart-contain pull-right"> 
	              <!-- Top Cart -->

	              
	              <div class="mini-cart">
	              	<div class="basket dropdown-toggle">
	              		<a href="<?php echo Yii::$app->homeUrl ?>cart"> 
	              			<!-- <span class="cart_count">2</span> -->
	              			<span class="price">&nbsp;giỏ hàng: 
	              			<span id="count_item">
	              				<?php
	              					if ($cart1->getTotalItem()) {
	              						echo $cart1->getTotalItem();
	              					} else {
	              						echo 0;
	              					}
	              				 ?>
	              			</span>
	              			<span style="text-transform: lowercase"> (sp)</span></span>
	              		</a> 
	              	</div>
	            <!--     <div>

	                  <div class="top-cart-content"> 
	                    
	       
	                    <ul class="mini-products-list" id="cart-sidebar" style="visibility: hidden;">
	                      <li class="item first">
	      
	                      </li>
	                    </ul>
	                    

	                    <div class="actions">
	                      <button class="btn-checkout" title="Checkout" type="button"onclick="window.location.href='<?php echo Yii::$app->homeUrl ?>checkout'"><span>Thanh toán</span> </button>
	                      <a href="<?php echo Yii::$app->homeUrl ?>cart" class="view-cart"><span>Xem giỏ hàng</span></a>
	                       </div>
	                  </div>

	                </div> -->

	              </div>
	              <!-- Top Cart -->
	              <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
	                <input value="" type="hidden">
	                <input id="enable_module" value="1" type="hidden">
	                <input class="effect_to_cart" value="1" type="hidden">
	                <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
  	</header>


  	<nav>
	    <div class="container">
	      <div class="mm-toggle-wrap">
	        <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span> </div>
	      </div>
	      <div class="nav-inner"> 
	        <!-- BEGIN NAV -->
	        <ul id="nav" class="hidden-xs">
	          <li class="level0 nav-6 level-top drop-menu"> <a class="level-top" href="<?= Yii::$app->homeUrl ?>"> <span>Trang chủ</span> </a>
	            <!-- <ul class="level1">
	              <li class="level2 first"><a href="grid.html"><span>Grid</span></a> </li>
	              <li class="level2 nav-10-2"> <a href="list.html"> <span>List</span> </a> </li>
	              <li class="level2 nav-10-3"> <a href="product_detail.html"> <span>Product Detail</span> </a> </li>
	              <li class="level2 nav-10-4"> <a href="shopping_cart.html"> <span>Shopping Cart</span> </a> </li>
	              <li class="level2 parent"><a href="checkout.html"><span>Checkout</span></a> </li>
	              <li class="level1 nav-10-4"> <a href="wishlist.html"> <span>Wishlist</span> </a> </li>
	              <li class="level1"> <a href="dashboard.html"> <span>Dashboard</span> </a> </li>
	              <li class="level1"> <a href="multiple_addresses.html"> <span>Multiple Addresses</span> </a> </li>
	              <li class="level1"><a href="compare.html"><span>Compare</span></a> </li>
	              <li class="level1"><a href="quick_view.html"><span>Quick View</span></a> </li>
	              <li class="level1"><a href="newsletter.html"><span>Newsletter</span></a> </li>
	              <li class="level1"><a href="404error.html"><span>404 Error Page</span></a> </li>
	            </ul> -->
	          </li>
	          <li class="mega-menu">
	          <a class="level-top " href="javacrip:void(0)"><span>Sản phẩm</span></a>

	          <!-- Cái MenuBarProduct -->
			<?= MenuBarProduct::widget() ?>	
            <!-- Cái MenuBarProduct -->

	      
	          </li>
	          <li class="mega-menu"> 
	          	<?php echo Html::a(
		          	'<span>Giới thiệu</span>',
		          	['site/about'],
		          	['class'=>'level-top']
	          	) ?>
	      
	          </li>
	          <li class="mega-menu"> 

	          <?php echo Html::a(
		          	'<span>Tin tức</span>',
		          	['post/index'],
		          	['class'=>'level-top']
	          	) ?>

	          </li>
	          <li class="mega-menu">
	          	<!-- <a class="level-top" href="grid.html"><span>Liên Hệ</span></a> -->
	          	<?php echo Html::a(
		          	'<span>Liên hệ</span>',
		          	['site/contact'],
		          	['class'=>'level-top']
	          	) ?>
	          </li>

	          <li class="mega-menu"> 
	          <?php echo Html::a(
		          	'<span>FAQs</span>',
		          	['site/faq'],
		          	['class'=>'level-top']
	          	) ?>
	          </li>

	          <li class="nav-custom-link mega-menu drop-menu">
	          	<a href="<?= Yii::$app->homeUrl ?>client" class="level-top"> <span>Tài khoản của tôi</span> </a>

	          	<ul class="level1">
	          		
					<?php if(!Yii::$app->user->isGuest): ?>


					<li class="level2 first">
	          		<?php echo Html::a('Bảng điều khiển',['client/']) ?>
	          		</li>

	          		<li class="level2 nav-10-2">
	          		<?php echo Html::a('Thông tin tài khoản',['/client/info']) ?>
	          		</li>

	          		<li class="level2 nav-10-3"> 
	          		<?php echo Html::a('Đơn hàng của tôi',['/client/order']) ?>
	          		</li>

	          		<li class="level2 nav-10-4">
	          		<?php echo Html::a('Danh sách yêu thích',['/client/wishlist']) ?>
	          		</li>




	          		<li class="level2 parent">
	          		<?php echo Html::a('Thoát',['/site/logout'],['data-method'=>'post','id'=>'thoat-client']) ?>
	          		</li>



	          		<?php endif; ?>
	          	</ul>

	          </li>

	        </ul>
	        <!--nav--> 
	      </div>
	    </div>
 	</nav>