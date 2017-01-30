<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */

$this->title = 'Tạo mới Nhà Cung Cấp';
$this->params['breadcrumbs'][] = ['label' => 'Nhà Cung Cấp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
