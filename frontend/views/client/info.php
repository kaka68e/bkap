<?php 
$this->title = 'Thông tin cá nhân';


?>
<div class="col-main" style="width:100%">
	<div class="box-account">
		<div class="page-title">
			<h2>Thông tin cá nhân</h2>
		</div>
		<div class="col2-set">
			<div class="col-1">
				<h4><strong>Tài khoản:</strong></h4>
				<!-- <a href="#">Chỉnh sửa</a> -->
				<p> <strong>Tên đăng nhập: </strong> <?php echo Yii::$app->user->identity->customer_username  ?> <br>
					<strong>Email: </strong> <?php echo Yii::$app->user->identity->email  ?> <br>
					<!-- <a href="#">Đổi mật khẩu</a> </p> -->
				</div>
				<div class="col-2">
                   <!--  <h5>Newsletters</h5>
                    <a href="#">Edit</a>
                    <p> You are currently not subscribed to any newsletter. </p> -->
                </div>
            </div>
            <div class="col2-set">
            	<h4><strong>Địa chỉ nhận hàng:</strong></h4>
            	<!-- <div class="manage_add"><a href="#">Manage Addresses</a> </div> -->
            	<div class="col-1">
            		<h5>Thông tin địa chỉ:</h5>
            		<address>
            			<strong>Họ và tên: </strong> <?php echo Yii::$app->user->identity->fullname  ?><br>
            			<strong>Địa chỉ: </strong> <?php echo Yii::$app->user->identity->address  ?><br>
            			<strong>Số điện thoại: </strong> <?php echo Yii::$app->user->identity->mobile  ?><br>
            			<strong>Email: </strong> <?php echo Yii::$app->user->identity->email  ?><br>
            			<!-- <a href="#">Thay đổi địa chỉ</a> -->
            		</address>
            	</div>
            	<div class="col-2">
            		<h5>Thông tin khác:</h5>
            		<address>
            			<strong>Tỉnh thành: </strong> <?php echo Yii::$app->user->identity->id_province  ?><br>
            			<strong>Ngày tạo tài khoản: </strong><?php echo date('d/m/Y',Yii::$app->user->identity->created_at)  ?>.<br>
            			<strong>Trạng thái: </strong> <?php echo Yii::$app->user->identity->status  ?><br>
            			<br>
            			<br>
            		</address>
            	</div>
            </div>
        </div>
    </div>