<?php 
// use Yii;
use backend\models\Product;
use yii\helpers\Html;
$this->title = 'Danh sách yêu thích';
$pro = new Product();
?>

<div class="col-main" style="width: 100%;">
	<div class="my-account">
		<div class="page-title">
			<h2>Danh sách yêu thích của tôi</h2>
		</div>
		<div class="my-wishlist">
			<div class="table-responsive">
				<table id="wishlist-table" class="clean-table linearize-table data-table">
					<thead>
						<tr class="first last">
							<th class="customer-wishlist-item-image">Hình ảnh</th>
							<th class="customer-wishlist-item-info">Tên sản phẩm</th>
							<th class="customer-wishlist-item-price">Giá bán</th>
							<th class="customer-wishlist-item-cart">Thêm vào giỏ</th>
							<th class="customer-wishlist-item-remove">Hành động</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($data as $key => $value) :
						$product = Product::find()->where(['product_id'=>$value['id_product']])->asArray()->one();

					 ?>
						<tr id="item_31" class="first odd">
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
									<!-- <button class="button btn-cart" onclick="addWItemToCart(31);" title="Add to Cart" type="button">
									Add to Cart
									</button> -->

									<?php echo Html::a('<button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Thêm vào giỏ hàng</span></button>',
									['/cart/add-cart','id' => $value['id_product']],
									[
									'class' => 'add-cart1',
									'product_name' => $product['product_name'],
									'product_image' => $product['image']
									]

									) ?>
								</div>
							</td>
							<td class="wishlist-cell5 customer-wishlist-item-remove last" style="vertical-align:middle">

							<!-- <a class="remove-item" title="Clear Cart"  href="#"><span><span></span></span></a> -->
							<?= Html::a('',
							[
								'/wishlist/delete',
								'id_customer'=> Yii::$app->user->identity->customer_id,
								'id_product' => $value['id_product']
							],
							['class' => 'remove-item','data-method'=>'post']

							) ?>

							</td>
						</tr>

					<?php endforeach ?>
					</tbody>
				</table>

				
			</div>
			<div class="buttons-set buttons-set2">
					<!-- <button class="button btn-add" onclick="addAllWItemsToCart()" title="Add All to Cart" type="button"><span>Add All to Cart</span></button> -->
				</div>
		</div>
	</div>
</div>