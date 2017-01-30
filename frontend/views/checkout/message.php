<?php 
use yii\helpers\Html;
use backend\models\Order;
$this->title = "Đặt hàng thành công";

 ?>
<?php 
if (isset($giohang)) :
?>

<section class="main-container col1-layout">
	<div class="main container">
		<div class="col-main">
			<div class="cart wow bounceInUp animated">
			<h2>Cảm ơn bạn đã đặt hàng của công ty chúng tôi</h2>
				<div class="page-title">
					<h4 style="padding-top:10px">Đơn hàng của bạn</h4>
				</div>
				<div class="table-responsive">
					<!-- <form method="post" action="#updatePost/"> -->
						<input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
						<fieldset>

							<table class="data-table cart-table" id="shopping-cart-table">
								<colgroup>
								<col width="1">
								<col>
								<!-- <col width="1">
								<col width="1">
								<col width="1">
								<col width="1">
								<col width="1"> -->
							</colgroup>
							<thead>
								<tr class="first last">
									<th rowspan="1">Hình ảnh</th>
									<th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
									<th rowspan="1"></th>
									<th colspan="1" class="a-center"><span class="nobr">Giá tiền</span></th>
									<th class="a-center" rowspan="1">Số lượng</th>
									<th colspan="1" class="a-center">Thành tiền</th>
									<th class="a-center" rowspan="1">&nbsp;</th>
								</tr>
							</thead>
								<tbody>
									<?php 
									foreach ($giohang as $item) :
									 ?>
									<tr class="first odd">

										<td class="image"><a class="product-image" title="Sample Product" href="#/women-s-crepe-printed-black/"><img width="75" alt="Sample Product" src="<?php echo Yii::$app->homeUrl.$item->image ?>"></a></td>

										<td><h2 class="product-name"> <a href="#/women-s-crepe-printed-black/"><?php echo $item->product_name;  ?></a> </h2></td>

										<td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#configure/id/15945/"></a></td>

										<td class="a-right"><span class="cart-price"> <span class="price"><?php echo number_format($item->price_real) ?> Đ</span> </span></td>

										<td class="a-center movewishlist">

											<input maxlength="12" class="input-text qty" title="Số lượng" size="4" value="<?php echo $item->quantity_user;  ?>" name="quantity_user" readonly>
	
										</td>

										<td class="a-right movewishlist"><span class="cart-price"> <span class="price"><?php echo number_format($item->price_real *  $item->quantity_user) ?> Đ</span> </span></td>

										<td class="a-center last">
										
		
										</td>
									</tr>
									<?php 
									endforeach;
									 ?>
								</tbody>
							</table>

						</fieldset>
					<!-- </form> -->
				</div>
				<!-- BEGIN CART COLLATERALS -->
				<div class="cart-collaterals row">

					<div class="totals col-sm-4">

						<div class="inner">
							<table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
								<colgroup>
								<col>
								<col width="1">
							</colgroup>
							<tfoot>
								<tr>
									<td colspan="1" class="a-left" style="font-family: Open Sans;"><strong>Tổng tiền thanh toán</strong></td>
									<?php 
										$totalCost = Order::findOne(['order_id'=>$lastInsertID]);
										$totalCost1 = $totalCost->total;

									 ?>
									<td class="a-right" style=""><strong><span class="price"><?php echo number_format($totalCost1) ?> Đ</span></strong></td>
								</tr>
							</tfoot>
							<tbody>
	
							</tbody>
						</table>
						<!-- <ul class="checkout">
							<li>
								<button class="button btn-proceed-checkout" title="Thanh toán hóa đơn" type="button"><span>Thanh Toán Hóa Đơn</span></button>
							</li>
						</ul> -->
					</div>
					<!--inner--> 

				</div>
			</div>

			<!--cart-collaterals--> 
	<p>
		
		<strong>Người đặt: </strong> <?php echo $totalCost->customer_name ?><br>
		<strong>Địa chỉ: </strong> <?php echo $totalCost->address ?><br>
		<strong>Số điện thoại: </strong> <?php echo $totalCost->mobile ?><br>
		<br>
		<strong>Người nhận: </strong> <?php echo $totalCost->customer_ship ?><br>
		<strong>Địa chỉ nhận: </strong><?php echo $totalCost->address_ship ?><br>
		<strong>Số điện thoại nhận: </strong><?php echo $totalCost->mobile_ship ?><br>

		Nếu có bất kì thắc mắc, vui lòng liên hệ : 043.6822.888
		<?php echo Html::a('Quay lại trang chủ',['/']) ?>
	</p>
		</div>

	</div>

	</div>
</section>

<?php 
else :
?>
<section class="main-container col1-layout">
	<div class="main container">
		<div class="col-main">
			<div class="cart wow bounceInUp animated">
				<div class="page-title">
					<h2 style="margin-bottom:35px">Không Có Sản Phẩm Nào ...</h2>
					<?php 
						echo Html::a('<button class="button btn-continue" title="Quay lại mua hàng" type="button"><span>Quay lại mua hàng</span></button>',['/']) 
					?>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<?php 
endif;
?>