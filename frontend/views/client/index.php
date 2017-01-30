<?php 
use yii\helpers\Html;
$this->title = 'Bảng điều khiển';

?>

<div class="col-main">
	<div class="my-account">
		<div class="page-title">
			<h2>Bảng điều khiển của bạn</h2>
		</div>
		<div class="dashboard">
			<div class="welcome-msg"> <strong>Xin chào, <?php echo Yii::$app->user->identity->fullname ?></strong>
				<p>Từ Bảng điều khiển tài khoản bạn có khả năng để xem nhanh của hoạt động tài khoản gần đây của bạn và cập nhật thông tin tài khoản của bạn. Chọn một liên kết dưới đây để xem hoặc chỉnh sửa thông tin.</p>
			</div>
			<div class="box-account">
				<div class="recent-orders">
					<div class="title-buttons">
						<strong>Đơn hàng gần đây nhất</strong> 
						<?php echo Html::a('Xem tất cả',['/client/order']) ?>
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
											<!-- <a href="#">Chi tiết</a> -->
											<!-- <span class="separator">|</span> -->
											<?php 
											if ($value['status'] == 1) :?>
											<?= Html::a('Hủy',[
												'order/update',
												'id'=>$value['order_id']
												],['class'=>'update-order-client','data-method'=>'post']) ?>
											<?php endif ?>
											<!-- <a href="#">Hủy</a>  -->
										</span>
									</td>
								</tr>

							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>



			<div class="page-title">
				<h2>Thông tin tài khoản</h2>
			</div>
			<div class="col2-set">
				<div class="col-1">
					<p> 
						<strong>Username: </strong><?php echo Yii::$app->user->identity->customer_username  ?>.<br>
						<strong>Email: </strong><?php echo Yii::$app->user->identity->email  ?>.<br>
						<strong>Ngày tạo tài khoản: </strong><?php echo date('d/m/Y',Yii::$app->user->identity->created_at)  ?>.<br>
						<!-- <a href="#">Đổi mật khẩu</a>  -->
					</p>
				</div>
			</div>
		</div>
	</div>
</div> 
</div>