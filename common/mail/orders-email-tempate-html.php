<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */


?>

<h2>Thông tin đơn hàng:</h2>
	<table class="table" style="border=1">
		<thead>
			<tr>
				<th>Tên</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($giohang as $item) { ?>
			<tr>
				<td><?php echo $item->product_name ?>&nbsp;&nbsp;&nbsp;</td>
				<td><?php echo $item->price_real ?>&nbsp;&nbsp;</td>
				<td><?php echo $item->quantity_user ?>&nbsp;</td>
				<td><?php echo number_format($item->quantity_user*$item->price_real) ?>&nbsp;</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<h3>Tổng tiền: <?php echo number_format($model->total) ?></h3>
<h3>Thông tin khách hàng đặt:</h3>
<p>Người đặt: <?php echo $model->customer_name ?></p>
<p>Địa chỉ: <?php echo $model->address ?></p>
<p>Số điện thoại: <?php echo $model->mobile ?></p>
<h3>Thông tin khách hàng nhận:</h3>
<p>Người đặt: <?php echo $model->customer_ship ?></p>
<p>Địa chỉ: <?php echo $model->address_ship ?></p>
<p>Số điện thoại: <?php echo $model->mobile_ship ?></p>
<h3>Yêu cầu:</h3>
<p><?php echo $model->request ?></p>