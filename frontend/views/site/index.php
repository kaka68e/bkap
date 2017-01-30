<?php
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'E-Shopper';
?>
<!-- <div class="category-description std">
	<div class="slider-items-products">
		<div id="category-desc-slider" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col1 owl-carousel owl-theme" > 


				<div class="item" > <a href="#"><img alt="" src="<?php echo Yii::$app->homeUrl ?>images/category1.png"></a>
					<div class="cat-img-title cat-bg cat-box">
					</div>
				</div>

              <div class="item"> <a href="#"><img alt="" src="<?php echo Yii::$app->homeUrl ?>images/categoty2.jpg"></a>
              	<div class="cat-img-title cat-bg cat-box">

                  </div>
     

              </div>
          </div>
      </div>
  </div>
</div> -->

<div class="category-description std">
	<div class="slider-items-products">
		<div id="category-desc-slider" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col1 owl-carousel owl-theme" > 


				<div class="item" > <a href="#"><img alt="" src="<?php echo Yii::$app->homeUrl ?>images/category1.png"></a>
					<div class="cat-img-title cat-bg cat-box">
					</div>
				</div>

              <div class="item"> <a href="#"><img alt="" src="<?php echo Yii::$app->homeUrl ?>images/categoty2.jpg"></a>
              	<div class="cat-img-title cat-bg cat-box">

                  </div>
     

              </div>
          </div>
      </div>
  </div>
</div>

<article class="col-main" style="width: 100%;">

	<h2 class="page-heading" style="font-weight: 600"> <span class="page-heading-title">Trang chủ</span> </h2>
	<div class="display-product-option">
		<!-- <div class="pager hidden-xs">
			<div class="pages">
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
		</div> -->
		<!-- <div class="sorter">
			<div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span><a href="list.html" title="List" class="button-list">&nbsp;</a> </div>
		</div> -->
	</div>

	<div class="category-products">
		<ul class="products-grid">
		<?php 
			foreach ($data as $key => $value) :
				
		?>
			<li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
				<div class="item-inner">
					<div class="item-img" style="border:1px solid #dde2e4;border-bottom:none">
						<div class="item-img-info" >


						<!-- <a href="<?php echo Yii::$app->homeUrl?>product/detail?slug=<?php echo $value['product_slug'] ?>" title="<?php echo $value['product_name'] ?>" class="product-image">
							<img src="<?php echo Yii::$app->homeUrl. $value['image'] ?>" alt="<?php echo $value['product_name'] ?>">
						</a> -->

						<?php 

						echo Html::a(
							'<img src="'.Yii::$app->homeUrl.$value['image'].'"" alt="'.$value['product_name'].'"">',
							['product/detail','slug'=>$value['product_slug']],
							['class'=>'product-image']
						);

						 ?>

							<!-- <div class="new-label new-top-right" style="background:#27ae60">mới</div> -->

							<div class="box-hover">
								<ul class="add-to-links">

									<li>
										<?= Html::a('Xem chi tiết',
											['product/detail','slug'=>$value['product_slug']],
											['class'=>'link-quickview']
										) ?>
									</li>


									 <?php if (!Yii::$app->user->isGuest) : ?>
									<li>
									<a class="link-wishlist" product-name1 = '<?= $value['product_name']?>' data-dar ="<?= $value['product_id'] ?>" data-href="<?php echo Yii::$app->homeUrl ?>wishlist/add">Yêu thích</a>

									<?php //echo Html::a('Yêu thích',['/wishlish/add'],['class'=>'link-wishlist','onclick'=>'addWishlist('.$value['product_id'].')'] ) ?>
									</li>
									<?php endif ?>
									<!-- <li><a class="link-compare" href="compare.html">So sánh</a> </li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class="item-info">
						<div class="info-inner" style="border:1px solid #dde2e4;">
							<div class="item-title">
								<?= Html::a($value['product_name'],
									['product/detail','slug'=>$value['product_slug']],
									['class'=>'link-quickview','title'=>$value['product_name']]
								) ?>

							</div>
							<div class="item-content">
								<div class="rating">
									<div class="ratings">
										<div class="rating-box">
											<div class="rating" style="width:80%"></div>
										</div>
										<p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
									</div>
								</div>
								<div class="item-price">
									<div class="price-box">
									<span class="regular-price">
										<span class="price">Đ <?php echo number_format($value['price_real']) ?></span> 
										<p class="old-price">
										<span class="price"> <?php echo number_format($value['price_push_up']) ?> Đ  </span> 
										</p>
									</span>
									 </div>
								</div>
								<div class="action">
									<?php echo Html::a('<button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Thêm vào giỏ hàng</span></button>',
									['/cart/add-cart','id' => $value['product_id']],
									[
									'class' => 'add-cart1',
									'product_name' => $value['product_name'],
									'product_image' => $value['image']
									]

									) ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>

		<?php 

		endforeach; ?>
		</ul>

	</div>



</article>

	<div class="">
		<?php 
			echo LinkPager::widget([
			'pagination' => $page,
			]);
		?>
	</div>




	<div class="modal fade" id="modal-add-cart">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Thêm sản phẩm thành công</h4>
				</div>
				<div class="modal-body" id='alert_product_name1'>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Vào giỏ hàng</button> -->
					<?php echo Html::a('<button type="button" class="btn btn-primary">Vào giỏ hàng</button>',
						['/cart']
					) ?>
				</div>
			</div>
		</div>
	</div>