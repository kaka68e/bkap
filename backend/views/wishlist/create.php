<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Wishlist */

$this->title = 'Tạo mới Danh sách Yêu Thích';
$this->params['breadcrumbs'][] = ['label' => 'Danh Sách Yêu Thích', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
