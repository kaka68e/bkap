<?php
/* @var $this yii\web\View */
$this->title = 'Quản lí hình ảnh';
$baseUrl = Yii::$app->urlManager->baseUrl;
$baseUrl =  str_replace('backend/web', '', $baseUrl);

?>
<div>
	<iframe src="<?php echo $baseUrl; ?>file/dialog.php" style="width:100%;height:600px;border:none"></iframe>
</div>
