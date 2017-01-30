$(document).ready(function() {

	$('#check').click(function(event) {
		if($('#check').prop('checked')) {
		    $('#order-customer_ship').val($('#order-customer_name').val());
		    $('#order-mobile_ship').val($('#order-mobile').val());
		    $('#order-address_ship').val($('#order-address').val());
		    $('#order-email_ship').val($('#order-email').val());
		} else {
		    $('#order-customer_ship').val('');
		    $('#order-mobile_ship').val('');
		    $('#order-address_ship').val('');
		    $('#order-email_ship').val('');	
		}
	});

	$('a.add-cart1').click(function(event) {
		event.preventDefault();
		var href = $(this).attr('href');
		var product_name = $(this).attr('product_name');
		var product_image = $(this).attr('product_image');
		$.ajax({
			url: href,
			type: 'GET',
			data: {},
			success:function(res){
				res1 = res.split("-");
				$('#count_item').text(res1[1]);

				if (res1[0] == 'ok') {
					$('#count_item').text()
					var btn = "button";
					swal({
			        title: 'Đã thêm vào giỏ hàng<br>'+'<img src="'+homeUrl()+'/'+product_image+'" alt="Smiley face" height="120" width="120">'+'<small style="text-transform: capitalize;">'+product_name+'</small>',
				    text: '<button type="' + btn + '" id="btnA" >Vào giỏ hàng</button> ' +
				      '<button type="' + btn + '" id="btnB" >Đóng</button> ',
				    html: true,
				    showConfirmButton: false

			       });
				} else {
					sweetAlert("Rất tiếc ...", "Sản phẩm này đang hết hàng!", "error");
					// sweetAlert("Rất tiếc ...", res1[0], "error");
				}
			}
		})

		
	});

	$(document).on('click', "#btnA", function() {
	  	window.location.href = homeUrl() +"/cart";
	});


	$('button.gio-hang').click(function(event) {
       $('form').ajaxForm(function(data) {
	          	if (data == -1) {
	                // location.reload();
	                sweetAlert("Xin lỗi ...", "Số lượng không thể nhập bằng chữ!", "error"); 
	                $('button.confirm').click(function(event) {
	                	location.reload();
	                });

	          	}else if (data == 0) {
	          		sweetAlert("Xin lỗi ...", "Số lượng bạn chỉnh đang nhỏ hơn hoặc bằng 0!", "error"); 
	                $('button.confirm').click(function(event) {
	                	location.reload();
	                });
	          	}else if(data == 2){
					sweetAlert("Rất tiếc ...", "Số lượng bạn mua đang vượt quá số hàng còn trong kho!", "error"); 
	                $('button.confirm').click(function(event) {
	                	location.reload();
	                });
	          	}else if(data == 1) {
					swal("Thành công!","Cập nhật số lượng thành công", "success");
					$('button.confirm').click(function(event) {
	                	location.reload();
	                });
	          	};
            }); 
	});

	// Thêm yêu thích
	$('a.link-wishlist').click(function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var id1 = $(this).attr('data-dar');
		var product_name1 = $(this).attr('product-name1');
		$.ajax({
			url: href,
			type: 'GET',
			data: {'id': id1},
			success:function(res){
				if (res == 'tontai') {
					sweetAlert("Đã có", 'Sản phẩm '+product_name1+' đã có trong DSYT của bạn!', "error");
				} else if(res == 'ok') {
					swal(" Thêm danh sách yêu thích!", 'Đã thêm '+product_name1+' vào DSYT', "success")
				} else {
					sweetAlert("Thất bại", 'Vui lòng liên hệ chúng tôi để khắc phục sự cố', "error");
				}
			}
		})
		
	});




	// Kiểm tra nút xóa trong danh sachs yêu thích của khách hàng
	$('a.remove-item').click(function(event) {
		
		if (confirm("Xóa sản phẩm này không ?")) {
        return true;
	    }
	    return false;
	});
	// Kiểm tra nút cập nhật đơn hàng của khách hàng
	$('a.update-order-client').click(function(event) {
		
		if (confirm("Bạn có chắc muốn hủy đơn hàng này không. Bạn sẽ không thể hoàn tác lại thao thác này ?")) {
        return true;
	    }
	    return false;
	});
	
	$('a#update_cart_action1').click(function(event) {
		

		if (confirm("Bạn có chắc muốn xóa toàn bộ đơn hàng này không. Bạn sẽ không thể hoàn tác lại thao thác này ?")) {
        return true;
	    }
	    return false;
	});

	$('a#thoat-client').click(function(event) {

		if (confirm("Bạn có muốn thoát tài khoản không?")) {
        return true;
	    }
	    return false;
	});





});
