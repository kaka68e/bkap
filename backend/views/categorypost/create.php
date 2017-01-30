<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Categorypost */

$this->title = 'Tạo mới thể loại tin tức';
$this->params['breadcrumbs'][] = ['label' => 'Thể loại tin tức', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorypost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
