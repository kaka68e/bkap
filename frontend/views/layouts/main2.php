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
use frontend\assets\AppAsset;
use common\widgets\Alert;

use frontend\widgets\SideNavCategory;
use frontend\widgets\Footer;
use frontend\widgets\Header;
use frontend\widgets\Search;
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
