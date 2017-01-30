<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Province */

$this->title = 'Tạo mới Tỉnh Thành';
$this->params['breadcrumbs'][] = ['label' => 'Tỉnh Thành', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>