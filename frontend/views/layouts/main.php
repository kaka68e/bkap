<?php
/**
* Main có cả cái category bên trái nữa
*/
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use frontend\widgets\SideNavCategory;
use frontend\widgets\Footer;
use frontend\widgets\Header;
use frontend\widgets\Search;
use frontend\widgets\NewsIndex;
use frontend\widgets\Mobile;

AppAsset::register($this);
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

	<?= Header::widget() ?>	



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

  	<section class="main-container col2-left-layout bounceInUp animated" style ="margin-bottom:10px">
    <div class="container">
	<div class="row">
		<div class="col-sm-9 col-sm-push-3">
			<?= $content ?>
        </div>

        <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <aside class="col-left sidebar">

          	<!-- Cái SideNavCategory -->
			     <?= SideNavCategory::widget() ?>	
            <!-- Cái SideNavCategory -->



            <!-- <div class="hot-banner"><img alt="banner" src="images/HOTLINE.jpg"></div> -->


            <?= Search::widget() ?>  


            <!-- 
            <div class="block block-cart">
              <div class="block-title ">My Cart</div>
              <div class="block-content">
                <div class="summary">
                  <p class="amount">There are <a href="shopping_cart.html">2 items</a> in your cart.</p>
                  <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$27.99</span> </p>
                </div>
                <div class="ajax-checkout">
                  <button class="button button-checkout" title="Submit" type="submit"><span>Checkout</span></button>
                </div>
                <p class="block-subtitle">Recently added item(s) </p>
                <ul>
                  <li class="item"> <a href="shopping_cart.html" title="Fisher-Price Bubble Mower" class="product-image"><img src="products-images/product10.jpg" alt="Fisher-Price Bubble Mower"></a>
                    <div class="product-details">
                      <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
                      <strong>1</strong> x <span class="price">$19.99</span>
                      <p class="product-name"> <a href="shopping_cart.html">Skater Dress In Leaf Print Grouped Product</a> </p>
                    </div>
                  </li>
                  <li class="item last"> <a href="shopping_cart.html" title="Prince Lionheart Jumbo Toy Hammock" class="product-image"><img src="products-images/product1.jpg" alt="Prince Lionheart Jumbo Toy Hammock"></a>
                    <div class="product-details">
                      <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
                      <strong>1</strong> x <span class="price">$8.00</span>
                      <p class="product-name"> <a href="shopping_cart.html"> Sample Fashion Product Prince Lionheart </a> </p>
                      
                      
                    </div>
                  </li>
                </ul>
              </div>
            </div> -->






           <!--  <div class="block block-compare">
              <div class="block-title ">Compare Products (2)</div>
              <div class="block-content">
                <ol id="compare-items">
                  <li class="item odd">
                    <input type="hidden" value="2173" class="compare-item-id">
                    <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> Sofa with Box-Edge Polyester Wrapped Cushions</a> </li>
                  <li class="item last even">
                    <input type="hidden" value="2174" class="compare-item-id">
                    <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> Sofa with Box-Edge Down-Blend Wrapped Cushions</a> </li>
                </ol>
                <div class="ajax-checkout">
                  <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
                  <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
                </div>
              </div>
            </div> -->


            <!-- <div class="custom-slider">
              <div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active"><img src="images/slide3.jpg" alt="slide3">
                      <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="#">50% OFF</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a class="link" href="#">Buy Now</a></div>
                    </div>
                    <div class="item"><img src="images/slide1.jpg" alt="slide1">
                      <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="#">Hot collection</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                    <div class="item"><img src="images/slide2.jpg" alt="slide2">
                      <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="#">Summer collection</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                  </div>
                  <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">Next</span> </a></div>
              </div>
            </div> -->



            <?= NewsIndex::widget() ?>
            

            <div class="block block-list block-viewed">
            <div class="block-title"> Tư vấn bán hàng</div>
              <div class="block-content">
                <p style="color:#27ae60;font-weight:bold;font-size:18px">HOTLINE: 0166.3525.555</p>
              </div>
            </div>

            <!-- <div class="hot-banner"><img alt="banner" src="<?php echo Yii::$app->homeUrl ?>images/2362344.png"></div> -->

            <div class="block block-poll">
              <div class="block-title">Thăm dò cộng đồng</div>
              <form id="pollForm" action="#" method="post" onSubmit="return validatePollAnswerIsSelected();">
                <div class="block-content">
                  <p class="block-subtitle">Điều gì làm bạn thích với hệ thống bán hàng E-Shopper</p>
                  <ul id="poll-answers">
                    <li class="odd">
                      <input type="radio" name="vote" class="radio poll_vote" id="vote_5" value="5">
                      <span class="label">
                      <label for="vote_5">Giao diện trực quan</label>
                      </span> </li>
                    <li class="even">
                      <input type="radio" name="vote" class="radio poll_vote" id="vote_6" value="6">
                      <span class="label">
                      <label for="vote_6">Giá cả hợp lí</label>
                      </span> </li>
                    <li class="odd">
                      <input type="radio" name="vote" class="radio poll_vote" id="vote_7" value="7">
                      <span class="label">
                      <label for="vote_7">Danh mục rõ ràng</label>
                      </span> </li>
                    <li class="last even">
                      <input type="radio" name="vote" class="radio poll_vote" id="vote_8" value="8">
                      <span class="label">
                      <label for="vote_8">So sánh sản phẩm</label>
                      </span> </li>
                  </ul>
                  <div class="actions">
                    <button type="submit" title="Vote" class="button button-vote"><span>Đánh giá</span></button>
                  </div>
                </div>
              </form>
            </div>

            <!-- <div class="block block-tags">
              <div class="block-title"> TAG phổ biến</div>
              <div class="block-content">
                <ul class="tags-list">
                  <li><a href="#" style="font-size:98.3333333333%;">Rau</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">Hoa quả</a></li>
                  <li><a href="#" style="font-size:145%;">TRÁI CÂY</a></li>
                  <li><a href="#" style="font-size:75%;">Tag</a></li>
                  <li><a href="#" style="font-size:110%;">Test</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">Thực phẩm</a></li>
                  <li><a href="#" style="font-size:110%;">cool</a></li>
                  <li><a href="#" style="font-size:145%;">Thịt</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">crap</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">good</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">green</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">hip</a></li>
                  <li><a href="#" style="font-size:75%;">E-Shopper</a></li>
                  <li><a href="#" style="font-size:75%;">Bổ dưỡng</a></li>
                  <li><a href="#" style="font-size:75%;">nice</a></li>
                  <li><a href="#" style="font-size:145%;">Gia vị</a></li>
                  <li><a href="#" style="font-size:98.3333333333%;">red</a></li>
                  <li><a href="#" style="font-size:86.6666666667%;">tight</a></li>
                  <li><a href="#" style="font-size:75%;">Đồ uống</a></li>
                  <li><a href="#" style="font-size:145%;">Đồ ăn vặt</a></li>
                </ul>
                <div class="actions"> <a href="#" class="view-all">View All Tags</a> </div>
              </div>
            </div> -->

            
          </aside>
        </div>


	

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
