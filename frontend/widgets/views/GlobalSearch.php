<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<!-- Gốc -->
<!-- <form action="#" method="POST" id="search_mini_form" name="Categories">
	<input type="text" placeholder="Tìm kiếm hàng hóa" value="" maxlength="70" name="search" id="search">
	<button type="button" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
</form> -->
<!-- Hết -->

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['/search/index'],
        'method' => 'get',
        'id' => 'search_mini_form'
    ]); ?>


        <input type="text" id="search" name="string" placeholder="Tìm kiếm hàng hóa">



        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>&nbsp;', ['class' => 'search-btn-bg']) ?>


    <?php ActiveForm::end(); ?>

</div>