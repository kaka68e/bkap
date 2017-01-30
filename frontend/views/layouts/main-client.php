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


    <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
    	<div class="block block-account">
    	<div class="block-title">Tài khoản của tôi</div>
    		<div class="block-content">
    			<ul>
    				<li <?php if (Yii::$app->controller->route == 'client/index') {
    					echo 'class="current"';
    				} ?>>
    				<?php echo Html::a('Bảng điều khiển',['/client']) ?>
    				</li>
    				<li <?php if (Yii::$app->controller->route == 'client/info') {
    					echo 'class="current"';
    				} ?>>
    					<?php echo Html::a('Thông tin tài khoản',['/client/info']) ?>
    				</li>
    				<li <?php if (Yii::$app->controller->route == 'client/order') {
    					echo 'class="current"';
    				} ?>>
    				<?php echo Html::a('Đơn hàng của tôi',['/client/order']) ?>
    				</li>
    				<li <?php if (Yii::$app->controller->route == 'client/wishlist') {
    					echo 'class="current"';
    				} ?>>
    				<?php echo Html::a('Danh sách yêu thích',['/client/wishlist']) ?>
    				</li>

    				<li>
    				<?php echo Html::a('Thoát',['/site/logout'],['data-method'=>'post','id'=>'thoat-client']) ?>
    				</li>
    			
    			</ul>
    		</div>
    	</div>
    </aside>

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
