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
use frontend\assets\PostAppAsset;
use common\widgets\Alert;

use frontend\widgets\SideNavCategory;
use frontend\widgets\Footer;
use frontend\widgets\Header;
use frontend\widgets\Post;
use frontend\widgets\Mobile;

PostAppAsset::register($this);
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
<?php
 //echo $route = Yii::$app->controller->route;
 ?>

	<?= Header::widget() ?>	


  	<section class="main-container col2-left-layout bounceInUp animated">
    <div class="container">
	<div class="row">


    <section class="col-sm-9 wow bounceInUp animated" style ="margin-bottom:10px">
    	<?= $content ?>
    </section>

    <div class="col-right sidebar col-sm-3 bounceInUp animated">
    	<div role="complementary" class="widget_wrapper13" id="secondary">
    		<div class="popular-posts widget widget__sidebar wow bounceInUp animated" id="recent-posts-4">
    			

    			<?= Post::widget() ?> 

            </div>
            
            <div class="popular-posts widget widget_categories wow bounceInUp animated" id="categories-2">
                <h3 class="widget-title"><span>Thể loại</span></h3>
                <ul>
                   <li class="cat-item cat-item-19599"><a href="#/first-category">Thể loại 1</a></li>
                   <ul>
                   </ul>
                   <li class="cat-item cat-item-19599"><a href="#/second-category">Thể loại 2</a></li>
                   <ul>
                   </ul>
               </ul>
           </div>
           <!-- Banner Ad Block -->
           <div class="ad-spots widget widget__sidebar bounceInUp animated">
                <h3 class="widget-title"><span>Quảng cáo</span></h3>
                <div class="widget-content"><a target="_self" href="#" title="">
                   <img alt="offer banner" src="<?php echo Yii::$app->homeUrl ?>images/HOTLINE.jpg"></a>
               </div>
            </div>

             <!--  <div class="text-widget widget widget__sidebar">
                <h3 class="widget-title"><span>Text Widget</span></h3>
                <div class="widget-content">Mauris at blandit erat. Nam vel tortor non quam scelerisque cursus. Praesent nunc vitae magna pellentesque auctor. Quisque id lectus.<br>
                  <br>
                  Massa, eget eleifend tellus. Proin nec ante leo ssim nunc sit amet velit malesuada pharetra. Nulla neque sapien, sollicitudin non ornare quis, malesuada.</div>
              </div>
               -->
        </div>
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
