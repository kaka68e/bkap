<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error" style="background:#9b59b6">

    <section class="content-wrapper" style="padding-top:0px">

      <div class="std">
        <div class="page-not-found wow bounceInRight animated">
          <h2>404</h2>
          <h3><img src="images/signal.png">Có lỗi:
         <?= Html::encode($this->title) ?> <?= nl2br(Html::encode($message)) ?></h3>
          <div>
            <!-- <a href="index-2.html" type="button" class="btn-home"><span>Về trang</span></a> -->
            <?php echo Html::a('<span>Về trang chủ</span>',['/'],['class'=>'btn-home']); ?>
          </div>
        </div>
      </div>

  </section>

</div>
