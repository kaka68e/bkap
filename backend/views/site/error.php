<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="row">
    <div class="col-md-12 page-404">
        <div class="number font-red"> 404 </div>
        <div class="details">
            <h3>Rất tiếc ! Đã xảy ra lỗi !!!</h3>
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <p> Chúng tôi không thể tìm thấy trang bạn tìm kiếm
                <br/>
                <a href="<?php echo Yii::$app->homeUrl ?>"> Quay lại trang chủ </a> hoặc tìm kiếm trong ô dưới đây 
            </p>
            <form action="#">
                <div class="input-group input-medium">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa ...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn red">Tìm kiếm
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
