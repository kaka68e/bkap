<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliver */

$this->title = $model->deliver_id;
$this->params['breadcrumbs'][] = ['label' => 'Phương Thức Vận Chuyển', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->deliver_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->deliver_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa không ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'deliver_id',
            'deliver_name',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
