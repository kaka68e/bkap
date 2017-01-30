<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'Giở hàng';
// echo '<pre>';
// var_dump($cart);
// echo '</pre>';
?>
<?php 
if ($cart) :
?>

<section class="main-container col1-layout">
	<div class="main container">
		<div class="col-main">
			<div class="cart wow bounceInUp animated">
				<div class="page-title">
					<h2>Giỏ Hàng</h2>
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
									foreach ($cart as $item) :
									 ?>
									<tr class="first odd">

										<td class="image"><a class="product-image" title="Sample Product" href="#/women-s-crepe-printed-black/"><img width="75" alt="Sample Product" src="<?php echo $item->image ?>"></a></td>

										<td><h2 class="product-name"> <a href="#/women-s-crepe-printed-black/"><?php echo $item->product_name;  ?></a> </h2></td>

										<td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#configure/id/15945/"></a></td>

										<td class="a-right"><span class="cart-price"> <span class="price"><?php echo number_format($item->price_real) ?> Đ</span> </span></td>

										<td class="a-center movewishlist">
		
										<?php $form = ActiveForm::begin([
											'action' => Url::to(['update-cart'])
										]) ?>
											<input maxlength="12" class="input-text qty" title="Số lượng" size="4" value="<?php echo $item->quantity_user;  ?>" name="quantity_user">
											<input type="hidden" name="id" value="<?php echo $item->product_id ?>">	
											<button type="submit" name="update" id="update" class="gio-hang"><i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i></button>

										<?php ActiveForm::end(); ?>
										</td>

										<td class="a-right movewishlist"><span class="cart-price"> <span class="price"><?php echo number_format($item->price_real *  $item->quantity_user) ?> Đ</span> </span></td>

										<td class="a-center last">
										<?php echo Html::a('',['/cart/remove-cart','id'=>$item->product_id],['class'=>'button remove-item','title'=>'Xóa']) ?>
										<!-- <a class="button remove-item" title="Xóa đơn hàng" href="#"><span><span>Remove item</span></span></a> -->
										</td>
									</tr>
									<?php 
									endforeach;
									 ?>
								</tbody>

													<tfoot>
								<tr class="first last">
									<td class="a-right last" colspan="50">
										<?php echo Html::a('<button class="button btn-continue" title="Tiếp tục mua hàng" type="button"><span>Tiếp tục mua hàng</span></button>',['/']) ?>
										<?php echo Html::a('<button id="empty_cart_button" class="button btn-empty" title="Xóa tất cả" value="" name="update_cart_action" type="button"><span>Xóa tất cả</span></button>',
										['/cart/remove-all'],
										['id'=>'update_cart_action1']
										) ?>
										
										</td>
									</tr>
								</tfoot>
							</table>

						</fieldset>
					<!-- </form> -->
				</div>
				<!-- BEGIN CART COLLATERALS -->
				<div class="cart-collaterals row">
					<div class="col-sm-4">

					</div>
					<div class="col-sm-4">
						<!-- <div class="discount">
							<h3>Mã Giảm Giá</h3>
							<form method="post" action="#couponPost/" id="discount-coupon-form">
								<label for="coupon_code">Nhập mã phiếu của bạn vào đây</label>
								<input type="hidden" value="0" id="remove-coupone" name="remove">
								<input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
								<button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Áp dụng mã giảm giá</span></button>
							</form>
						</div> -->
					</div>
					<div class="totals col-sm-4">
						<h3>Tổng giá trị đơn hàng</h3>
						<div class="inner">
							<table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
								<colgroup>
								<col>
								<col width="1">
							</colgroup>
							<tfoot>
								<tr>
									<td colspan="1" class="a-left" style="font-family: Open Sans;"><strong>Tổng tiền thanh toán</strong></td>
									<td class="a-right" style=""><strong><span class="price"><?php echo number_format($totalCost) ?> Đ</span></strong></td>
								</tr>
							</tfoot>
							<tbody>
								<tr>
									<td colspan="1" class="a-left" style=""> Tổng : </td>
									<td class="a-right" style=""><span class="price"><?php echo number_format($totalCost) ?> Đ</span></td>
								</tr>
							</tbody>
						</table>
						<ul class="checkout">
							<li>
								<?php echo Html::a('<button class="button btn-proceed-checkout" title="Thanh toán hóa đơn" type="button"><span>Thanh Toán Hóa Đơn</span></button>',['/checkout']) ?>
								
							</li>
						</ul>
					</div>
					<!--inner--> 

				</div>
			</div>

			<!--cart-collaterals--> 

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