<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Deliver */

$this->title = 'Tạo mới Phương Thức Vận Chuyển';
$this->params['breadcrumbs'][] = ['label' => 'Phương Thức Vận Chuyển', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliver-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
