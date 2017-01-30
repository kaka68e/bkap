<?php 
use yii\helpers\Html;
use frontend\models\Order;
use yii\data\Pagination;
use yii\widgets\LinkPager;
$this->title = 'Đơn hàng của bạn'


?>

<div class="recent-orders">
	<div class="title-buttons">
	<strong>Đơn hàng của tôi</strong> 
	<span style="visibility: hidden">.</span>
	</div>
	<div class="table-responsive">
		<table class="data-table" id="my-orders-table" style="margin-bottom:50px">
			<thead>
				<tr class="first last">
					<th>Mã đơn hàng</th>
					<th>Ngày</th>
					<th>Tên người nhận</th>
					<th>Địa chỉ</th>
					<th><span class="nobr">Tổng tiền</span></th>
					<th>Trạng thái</th>
					<th>Hành động</th>
				</tr>
			
			</thead>
			<tbody>
			<?php 
				foreach ($order as $key => $value) :
			 ?>
				<tr class="first odd">
					<td><strong># <?= $value['order_id'] ?></strong></td>
					<td><?= date('d/m/Y',$value['created_at']) ?></td>
					<td><?= $value['customer_ship'] ?></td>
					<td><?= $value['address_ship'] ?></td>
					<td><span class="price"><strong><?= number_format($value['total']) ?></strong> </span></td>
					<td>
					<em>
						<?php 
							if ($value['status'] == 1) {
								echo '<span style="color:#e74c3c">Mới đặt</span>';
							} else if ($value['status'] == 2) {
								echo '<span style="color:#2ecc71">Đang giao</span>';
							} else if ($value['status'] == 3) {
								echo '<span style="color:#3498db">Hoàn thành</span>';
							} else if ($value['status'] == 0) {
								echo '<span>Hủy</span>';
							}

						 ?>
					</em>
					</td>
					<td class="a-center last">
					<span class="nobr"> 
						<?= Html::a('Chi tiết',['client/detail','order_id'=>$value['order_id']]) ?>
						<span class="separator">|</span>
						<?php 
							if ($value['status'] == 1) :?>
								<?= Html::a('Hủy',[
								'order/update',
								'id'=>$value['order_id']
							],['class'=>'update-order-client','data-method'=>'post']) ?>
						<?php endif ?>
					</span>
					</td>
				</tr>

			<?php endforeach ?>
			</tbody>
		</table>


	</div>
</div>

<?php 

echo LinkPager::widget([
    'pagination' => $page,
]);


 ?>