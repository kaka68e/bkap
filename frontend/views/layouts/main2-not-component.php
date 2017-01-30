<?php
/**
* Main là chỉ có header  và footer. Nội dung ở giữa
*/
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\NotComponentAppAsset;
use common\widgets\Alert;

use frontend\widgets\SideNavCategory;
use frontend\widgets\Footer;
use frontend\widgets\Mobile;

NotComponentAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://localhost/yii/bkap/frontend/web/favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
     <?php
        $host = 'http://'.$_SERVER['HTTP_HOST'];
        $homeUrl = Yii::$app->urlManager->baseUrl;
        $homeUrl =  str_replace('backend/web', '', $homeUrl);
    ?>
    <script type="text/javascript">
        function homeUrl(){
            return '<?php echo $host.$homeUrl; ?>';
        }
    </script>
</head>
<body class="category-page">
<?php $this->beginBody() ?>
<div id="page">

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
	                  <div class="check"><a title="Checkout" href="<?php echo Yii::$app->homeUrl ?>cart"><span class="hidden-xs">Đơn hàng</span></a></div>
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
									<?= Html::a('Tài khoản của tôi',['/client']) ?>
									 </li>
	                  				<li role="presentation">
	                  					<?php echo Html::a('<span class="hidden-xs">Thoát</span>',['/site/logout'],['data-method' => 'post']) ?>		
	                  				</li>
	                  			</ul>
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
	              <form action="#" method="POST" id="search_mini_form" name="Categories">
	                <input type="text" placeholder="Tìm kiếm hàng hóa" value="" maxlength="70" name="search" id="search">
	                <button type="button" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
	              </form>
	            </div>
	          </div>
	          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 logo-block"> 
	            <!-- Header Logo -->
	            <div class="logo"> <a title="Magento Commerce" href="<?php echo Yii::$app->homeUrl ?>"><img alt="E-shopper" src="http://localhost/yii/bkap/frontend/web/images/eshopper.png"> </a> </div>
	            <!-- End Header Logo --> 
	          </div>
	          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	            <div class="top-cart-contain pull-right"> 
	              <!-- Top Cart -->


	              <div class="mini-cart">
	                <div class="basket dropdown-toggle">
	              		<a href="<?php echo Yii::$app->homeUrl ?>cart"> 
	              			<!-- <span class="cart_count">2</span> -->
	              			<span class="price">&nbsp;Giỏ hàng của tôi</span>
	              		</a> 
	              	<!-- </div>
	                  <div class="top-cart-content"> 
	                    

	                    <ul class="mini-products-list" id="cart-sidebar" style="visibility: hidden;">
	                      <li class="item first">
	      
	                      </li>
	                    </ul>
	                    
	      
	                    <div class="actions">
	                      <button class="btn-checkout" title="Checkout" type="button"><span>Thanh toán</span> </button>
	                      <a href="<?php echo Yii::$app->homeUrl ?>cart" class="view-cart"><span>Xem giỏ hàng</span></a> </div>
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
	          </li>
	          <li class="mega-menu"> <a class="level-top " href="grid.html"><span>Sản phẩm</span></a>
	      
	          </li>
	          <li class="mega-menu"> <a class="level-top" href="grid.html"><span>Giới thiệu</span></a>
	      
	          </li>
	          <li class="mega-menu"> <a class="level-top" href="grid.html"><span>Tin tức</span></a>

	          </li>
	          <li class="mega-menu"> <a class="level-top" href="grid.html"><span>Liên Hệ</span></a>
	          </li>

	          <li class="nav-custom-link mega-menu"> <a href="<?= Yii::$app->homeUrl ?>client" class="level-top"> <span>Tài khoản của tôi</span> </a>
	          </li>

	        </ul>
	        <!--nav--> 
	      </div>
	    </div>
 	</nav>

  	<div class="our-features-box">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-3 col-xs-12 col-sm-6">
	          <div class="feature-box first"> <span class="fa fa-truck"></span>
	            <div class="content">
	              <h3>Giao Hàng Toàn Quốc</h3>
	              <h5 style="color:#27ae60">Vận chuyển nhanh chóng</h5>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-xs-12 col-sm-6">
	          <div class="feature-box"> <span class="fa fa-headphones"></span>
	            <div class="content">
	              <h3>Cam Kết</h3>
	              <h5 style="color:#27ae60">Giá tốt nhất thị trường</h5>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-xs-12 col-sm-6">
	          <div class="feature-box"> <span class="fa fa-share"></span>
	            <div class="content">
	              <h3>Đổi Trả Hàng Hóa</h3>
	              <h5 style="color:#27ae60">Cam kết chất lượng</h5>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-xs-12 col-sm-6">
	          <div class="feature-box last"> <span class="fa fa-phone"></span>
	            <div class="content">
	              <h3>Hotline +(04) 3566 888</h3>
	              <h5 style="color:#27ae60">Hỗ trợ khách hàng 24/7</h5>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
  	</div>

  	<section class="main-container col2-left-layout bounceInUp animated">
    <div class="container">
	<div class="row">

	<?= $content ?>

	</div>
	</div>
	</section>

	<!-- Footer -->
	<?= Footer::widget() ?>
</div>
	<?= Mobile::widget() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
