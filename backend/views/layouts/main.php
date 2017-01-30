<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://localhost/yii/bkap/backend/web/favicon.ico">
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
<body class="page-container-bg-solid">
<?php $this->beginBody() ?>
<div class="page-wrapper">


<!-- Cả phần menu phía trên -->
<div class="page-wrapper-row ">
<div class="page-wrapper-top">
    <!-- BEGIN HEADER -->
    <div class="page-header">
        <!-- BEGIN HEADER TOP -->
        <div class="page-header-top">
            <div class="container">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index-2.html">
                        <img src="../assets/layouts/layout3/img/eshopper.png" alt="logo" class="logo-default img-fix">
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler"></a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN TODO DROPDOWN -->
                        <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default">3</span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>Bạn có
                                        <strong>12 việc</strong> cần xử lý</h3>
                                    <a href="app_todo_2.html">Xem tất cả</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Công việc 1</span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Công việc 2</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Công việc 3</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Công việc 4</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Công việc 5</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                                <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END TODO DROPDOWN -->
                        <li class="droddown dropdown-separator">
                            <span class="separator"></span>
                        </li>
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown dropdown-user dropdown-light">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar10.jpg">
                                <span class="username username-hide-mobile">Ngô Nguyễn Thức <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i>Thông tin cá nhân</a>
                                </li>
                                <li>
                                    <a href="app_calendar.html">
                                        <i class="fa fa-unlock"></i>Đổi mật khẩu</a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="page_user_lock_1.html">
                                        <i class="icon-lock"></i>Khóa màn hình</a>
                                </li>
                                <li>
                                    <!-- <a href="page_user_login_1.html">
                                        <i class="icon-key"></i>Thoát tài khoản
                                    </a> -->
                                    <?php echo Html::a('<i class="icon-key"></i>Thoát tài khoản',['/site/logout'],['data-method' => 'post']) ?>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- END HEADER TOP -->
        <div class="page-header-menu">
            <div class="container ">
                <!-- BEGIN HEADER SEARCH BOX -->
                <form class="search-form" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control input-search" placeholder="Tìm kiếm" name="query" style="background-color: #fff;">
                        <span class="input-group-btn" style="background-color: #fff;">
                            <a href="javascript:;" class="btn submit" style="top:8px">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END HEADER SEARCH BOX -->
                <!-- BEGIN MEGA MENU -->
                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                <div class="hor-menu hor-menu-light ">
                    <ul class="nav navbar-nav">
                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                            <?php echo Html::a('Trang chú',['site/index'],['class'=>'']) ?>
                        </li>

                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                            <a href="javascript:;">QL Sản Phẩm
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Nhà Cung Cấp',['/supplier'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Danh Mục SP',['/category'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Sản Phẩm',['/product'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Đánh Giá SP',['/reviewproduct'],['class'=>'nav-link']) ?>
                                </li>
                            </ul>
                        </li>

                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                            <a href="javascript:;">QL Đơn Hàng
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-user-secret" aria-hidden="true"></i> QL Đơn Hàng',['/order'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-user-secret" aria-hidden="true"></i> QL CT Đơn Hàng',['/orderitem'],['class'=>'nav-link']) ?>
                                </li>
                            </ul>
                        </li>

                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                            <a href="javascript:;">QL Khách Hàng
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-user-secret" aria-hidden="true"></i> QL TT Khách Hàng',['/customer'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-user-secret" aria-hidden="true"></i> QL DS Yêu Thích',['/wishlist'],['class'=>'nav-link']) ?>
                                </li>
                            </ul>
                        </li>

                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                            <a href="javascript:;">QL Danh Mục
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Tỉnh thành',['/province'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL PT Thanh Toán',['/payment'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL PT Vận Chuyển',['/deliver'],['class'=>'nav-link']) ?>
                                </li>
                            </ul>
                        </li>

                         <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                            <a href="javascript:;">QL Tin Tức
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Thể loại',['/categorypost'],['class'=>'nav-link']) ?>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-database" aria-hidden="true"></i> QL Bài viết',['/post'],['class'=>'nav-link']) ?>
                                </li>
                            </ul>
                        </li>

                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                            <a href="javascript:;">Mở Rộng
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li aria-haspopup="true" class=" ">
                                    <?php echo Html::a('<i class="fa fa-picture-o" aria-hidden="true"></i> QL Hình Ảnh',['/file'],['class'=>'nav-link']) ?>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- END MEGA MENU -->
            </div>
        </div>
    </div>
    <!-- END HEADER -->
</div>
</div>
<!-- Kết thúc menu phía trên -->


<!-- Phần giữa -->
<div class="page-wrapper-row full-height">
<div class="page-wrapper-middle">
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <?= Breadcrumbs::widget([
                            'homeLink' => [ 
                            'label' => Yii::t('yii', 'Trang chủ'),
                            'url' => Yii::$app->homeUrl,
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= Alert::widget() ?>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container">
                     <?= $content ?>
                </div>
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
</div>
</div>  
<!-- Hết phần giữa -->


<!-- Footer -->
<div class="page-wrapper-row">
<div class="page-wrapper-bottom">
    <!-- BEGIN FOOTER -->
    <!-- BEGIN PRE-FOOTER -->
    <div class="page-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>Thông tin</h2>
                    <p><strong>Hệ thống bán hàng trực tuyến thực phẩm sạch E-Shopper</strong></p>
                    <p><strong>Địa chỉ: </strong>Cửu Việt, tt. Trâu Quỳ, Gia Lâm, Hà Nội</p>
                    <p><strong>Điện thoại: </strong>04 3676 2301</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                    <h2>Theo dõi qua Email</h2>
                    <div class="subscribe-form">
                        <form action="javascript:;">
                            <div class="input-group">
                                <input type="text" placeholder="mail@email.com" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn red-mint" type="submit" style="background-color:#27ae60">Theo dõi</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>Theo dõi chúng tôi</h2>
                    <ul class="social-icons">
                        <li>
                            <a href="javascript:;" data-original-title="rss" class="rss"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>Liên hệ trợ giúp</h2>
                    <address class="margin-bottom-40"> Điện thoại: 0166 3525 113
                        <br> Email:
                        <a href="mailto:info@metronic.com">support@gmail.com</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <!-- END PRE-FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <div class="page-footer">
        <div class="container"> 2016 &copy; Hệ thống bán hàng trực tuyến thực phẩm sạch E-Shopper. Thiết kế bởi:
            <a target="_blank" href="http://keenthemes.com/">Ngô Nguyễn Thức K57-THB</a> &nbsp;|&nbsp;
        </div>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    <!-- END INNER FOOTER -->
    <!-- END FOOTER -->
</div>
</div>
<!-- Hết footer -->

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Chọn hình ảnh</h4>
                </div>
                <div class="modal-body">
                    <iframe src="<?php echo $homeUrl ?>/file/dialog.php?field_id=image" style="width:100%;height:450px;border:none"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>