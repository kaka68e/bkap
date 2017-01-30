<?php 
// use Yii;
use backend\models\Product;
use yii\helpers\Html;
$this->title = 'Danh sách yêu thích';
$pro = new Product();
$n=1;
?>

<div class="col-main" style="width: 100%;">
	<div class="my-account">
		<div class="page-title" style="margin-bottom:10px">
			<h2>Chi tiết đơn hàng số: # <?php echo $id_order ?></h2>
			<span><?= Html::a('Quay về đơn hàng',['/client/order']) ?></span>
		</div>
		<div class="my-wishlist" >
			<div class="table-responsive">
				<table id="wishlist-table" class="clean-table linearize-table data-table" >
					<thead>
						<tr class="first last">
							<th class="customer-wishlist-item-image">STT</th>
							<th class="customer-wishlist-item-image">Hình ảnh</th>
							<th class="customer-wishlist-item-info">Tên sản phẩm</th>
							<th class="customer-wishlist-item-price">Giá bán</th>
							<th class="customer-wishlist-item-cart">Số lượng</th>
							<th class="customer-wishlist-item-remove">Thành tiền</th>
							<th class="customer-wishlist-item-remove">Trạng thái</th>
							<!-- <th class="customer-wishlist-item-remove">Hành động</th> -->
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($data as $key => $value) :
						$product = Product::find()->where(['product_id'=>$value['id_product']])->asArray()->one();

					 ?>
						<tr id="item_31" class="first odd">
							<td class="wishlist-cell0 customer-wishlist-item-image" style="vertical-align:middle">
								<?php echo $n++; ?>
							</td>
							<td class="wishlist-cell0 customer-wishlist-item-image" style="vertical-align:middle">
								<a title="Softwear Women's Designer" href="#/" class="product-image">
								 	<img width="100" alt="" src="<?= Yii::$app->homeUrl.$product['image']  ?>">
								</a>
							</td>

							<td class="wishlist-cell1 customer-wishlist-item-info" style="vertical-align:middle">
							<h3 class="product-name">
							<a title="Softwear Women's Designer" href="#"><?= $product['product_name'] ?></a></h3>
							</td>
		
							<td data-rwd-label="Price" class="wishlist-cell3 customer-wishlist-item-price" style="vertical-align:middle">
								<div class="cart-cell">
									<div class="price-box"> 
										<span id="product-price-39" class="regular-price"> 
											<span class="price"><?= number_format($product['price_real']) ?> Đ</span>
										</span>
									</div>
								</div>
							</td>
							<td class="wishlist-cell4 customer-wishlist-item-cart" style="vertical-align:middle">
								<div class="cart-cell">
									<?php echo $value['product_quantity'] ?>
								</div>
							</td>
							<td class="wishlist-cell5 customer-wishlist-item-remove last" style="vertical-align:middle">
								<strong><?php echo number_format($value['product_total'])  ?></strong>	
							</td>
							<td class="wishlist-cell5 customer-wishlist-item-remove last" style="vertical-align:middle">
								<em>
									<?php 
										if ($value['status'] == 1) {
											echo '<span style="color:#3498db">OK</span>';
										} else if ($value['status'] == 0) {
											echo '<span>Hủy</span>';
										}

									 ?>
								</em>
							</td>
						</tr>

					<?php endforeach ?>
					</tbody>
				</table>
		
			</div>
			
			<div class="buttons-set buttons-set2">
					<!-- <button class="button btn-add" onclick="addAllWItemsToCart()" title="Add All to Cart" type="button"><span>Add All to Cart</span></button> -->
				<strong>* Yêu cầu đặc biệt: </strong><span><?php echo $request  ?></span>
				</div>
		</div>
	</div>
</div>