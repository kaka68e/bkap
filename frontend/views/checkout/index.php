<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use backend\models\Payment;
/* @var $this yii\web\View */
$this->title = "Thanh toán hóa đơn";
$payment = new Payment();

$model->id_payment = 'TM';
if (!Yii::$app->user->isGuest) {
	$id_customer = Yii::$app->user->identity->customer_id;
} else {
	$id_customer = '22';
}

$deliver = 'MoTo';
?>
<?php 
if ($cart) :
?>

<section class="main-container col1-layout">
	<div class="main container">
		<div class="col-main">
			<div class="cart wow bounceInUp animated">
				<div class="page-title">
					<h2>Thanh Toán Đơn hàng của bạn</h2>
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
									<td class="a-right" style=""><strong><span class="price"><?php echo number_format($totalCost) ?> Đ</span></strong></td>
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

		</div>
	</div>
	</div>
</section>

<section class="main-container col1-layout">
	<div class="main container">
		<div class="col-main">
			<div class="cart wow bounceInUp animated">
				<div class="page-title">
					<h2 style="margin-bottom:35px">Thông tin khách hàng :</h2>
					<?php $form = ActiveForm::begin([
					 	'action' => 'checkout/create',
					]); ?>
	                    <div class="form-body">
	  
	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<!-- <h4 class="form-section">Thông tin khách <span style="font-weight:bold">ĐẶT :</span></h4> -->
	                    		</div>
	                    		<!--/span-->
	                    		<div class="col-md-6">
	                    			<!-- <h4 class="form-section">Thông tin khách <span style="font-weight:bold">NHẬN :</span>

	                    			</h4> -->
	                    			<label class="mt-checkbox">
	                    				<input type="checkbox" id="check" value="option1"> Người nhận cùng địa chỉ
	                    					<span></span>
	                    				</label>
	                    		</div>
	                    		<!--/span-->
	                    	</div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Họ và tên:</label>
	                            		<?php 
		                            		if (!Yii::$app->user->isGuest) {
		                            			$a = Yii::$app->user->identity->fullname;
		                            			$model->customer_name = $a;
		                            		}
	                            		?>
	                            		<?php echo $form->field($model, 'customer_name')->textInput([
	                            			'placeholder'=> '',
	                            			'class' => 'form-control',
	    
	                            		])->label(false) ?>
	                            	</div>
	                            </div>
	                            <!--/span-->
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Họ tên người nhận:</label>
	                            		<?php echo $form->field($model, 'customer_ship')->textInput(['placeholder'=> '','class' => 'form-control'])->label(false) ?>
	                            	</div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                        <!--/row-->
	                        <div class="row">
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Điện thoại:</label>
	                            		<?php 
		                            		if (!Yii::$app->user->isGuest) {
		                            			$model->mobile = Yii::$app->user->identity->mobile;
		                            		}
	                            		?>
	                            		<?php echo $form->field($model, 'mobile')->textInput([
		                            		'placeholder'=> '',
		                            		'class' => 'form-control',
		                            		'type' => 'number',
	                            		])->label(false) ?>
	                            	</div>
	                            </div>
	                            <!--/span-->
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Điện thoại người nhận:</label>
	                                    <?php echo $form->field($model, 'mobile_ship')->textInput(['placeholder'=> '','class' => 'form-control','type' => 'number'])->label(false) ?>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Địa chỉ:</label>
	                            		<?php 
		                            		if (!Yii::$app->user->isGuest) {
		                            			$model->address = Yii::$app->user->identity->address;
		                            		}
	                            		?>
	                            		<?php echo $form->field($model, 'address')->textInput([
		                            		'placeholder'=> '',
		                            		'class' => 'form-control',
	                            		])->label(false) ?>
	                            	</div>
	                            </div>
	                            <!--/span-->
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Địa chỉ người nhận:</label>
	                                    <?php echo $form->field($model, 'address_ship')->textInput(['placeholder'=> '','class' => 'form-control'])->label(false) ?>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Email:</label>
	                            		<?php 
		                            		if (!Yii::$app->user->isGuest) {
		                            			$model->email = Yii::$app->user->identity->email;
		                            		}
	                            		?>
	                            		<?php echo $form->field($model, 'email')->textInput([
	                            			'placeholder'=> '',
	                            			'class' => 'form-control',
	                            		])->label(false) ?>
	                            	</div>
	                            </div>
	                            <!--/span-->
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Email người nhận:</label>
	                                    <?php echo $form->field($model, 'email_ship')->textInput(['placeholder'=> '','class' => 'form-control'])->label(false) ?>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Phương thức thanh toán :</label>
	                            		 <?= $form->field($model, 'id_payment')->dropDownList(
									    	$payment->getAllPayment(),
									    	['class'=>'form-control']
								   		 )->label(false) ?>
	                            	</div>
	                            </div>
	                            <!--/span-->
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Ghi chú về đơn hàng :</label>
	                                    <?php echo $form->field($model, 'request')->textInput(['placeholder'=> 'Các yêu cầu về vận chuyển, thời gian nhận hàng ...','class' => 'form-control','rows'=>3])->label(false) ?>
	                                    <?php echo $form->field($model, 'id_customer')->hiddenInput(['value' => $id_customer])->label(false) ?>
	                                    <?php echo $form->field($model, 'id_deliver')->hiddenInput(['value' => $deliver])->label(false) ?>
	                                    <?php echo $form->field($model, 'total')->hiddenInput(['value' => $totalCost])->label(false) ?>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>


	                        <div class="row">
	                            <div class="col-md-9">
	                            	<div class="form-group">
	                            		
	                            	</div>
	                            </div>
	                            <!--/span-->
	                            <div class="col-md-3">
	                                <div class="form-group">
	                                    <?= Html::submitButton('Chấp nhận thanh toán', ['class' =>'button btn-proceed-checkout thanh-toan']) ?>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                    </div>

					<?php ActiveForm::end(); ?>
				</div>
			</div>
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