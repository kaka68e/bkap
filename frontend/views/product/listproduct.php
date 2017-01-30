
<?php 
use yii\helpers\Html;

$this->title = $category_name;
$this->params['breadcrumbs'][] = $this->title;



 ?>



<article class="col-main" style="width: 100%;">

	<h2 class="page-heading" style="font-weight: 600;color:#3498db"> <span class="page-heading-title"><?php echo $category_name ?></span> </h2>
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
		</div>
		<div class="sorter">
			<div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span><a href="list.html" title="List" class="button-list">&nbsp;</a> </div>
		</div> -->
	</div>
	<?php 
		if (!$productByIdCategory) : 
	?>

	<div class="isa_warning">
		<i class="fa fa-warning"></i>
		Không có sản phẩm nào trong danh mục này !!!
	</div>

	<?php endif; ?>

	<div class="category-products">
		<ul class="products-grid">
		<?php 
			foreach ($productByIdCategory as $key => $value) :
				
		?>
			<li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
				<div class="item-inner">
					<div class="item-img" style="border:1px solid #dde2e4">
						<div class="item-img-info">
						<?php 
							echo Html::a(
								'<img src="'.Yii::$app->homeUrl.$value['image'].'"" alt="'.$value['product_name'].'"">',
								['product/detail','slug'=>$value['product_slug']],
								['class'=>'product-image']
							);
						 ?>
						 	<!-- <div class="new-label new-top-left" style="background:#27ae60">mới</div> -->
							<div class="box-hover">
								<ul class="add-to-links">
									<li>
										<!-- <a class="link-quickview" href="quick_view.html">Xem chi tiết</a> -->
										<?= Html::a('Xem chi tiết',
											['product/detail','slug'=>$value['product_slug']],
											['class'=>'link-quickview']
										) ?>
									</li>
									<?php if (!Yii::$app->user->isGuest) : ?>
									<li>
									<a class="link-wishlist" product-name1 = '<?= $value['product_name']?>' data-dar ="<?= $value['product_id'] ?>" data-href="<?php echo Yii::$app->homeUrl ?>wishlist/add">Yêu thích</a> 
									</li>
									<?php endif ?>
									<!-- <li><a class="link-compare" href="compare.html">So sánh</a> </li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class="item-info">
						<div class="info-inner" style="border:1px solid #dde2e4">
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
									<?php //echo Html::a('<button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Thêm vào giỏ hàng</span></button>',['/cart/add-cart','id' => $value['product_id']]) ?>

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
		endforeach; 
		?>
		</ul>
	</div>
<!-- 	<div class="toolbar">
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div id="sort-by">
					<label class="left">Sort By: </label>
					<ul>
						<li><a href="#">Position<span class="right-arrow"></span></a>
							<ul>
								<li><a href="#">Name</a></li>
								<li><a href="#">Price</a></li>
								<li><a href="#">Position</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-sm-7 col-md-5">
				<div class="pager">
					<div class="pages">
						<label>Page:</label>
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
				</div>
			</div>
			<div class="col-lg-3 col-sm-12 col-md-3">
				<div id="limiter">
					<label>View: </label>
					<ul>
						<li><a href="#">09<span class="right-arrow"></span></a>
							<ul>
								<li><a href="#">15</a></li>
								<li><a href="#">20</a></li>
								<li><a href="#">30</a></li>
								<li><a href="#">35</a></li>
							</ul>
						</li>
					</ul>
					<a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> </div>
				</div>
			</div>
		</div> -->
	</article>



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