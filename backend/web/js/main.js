$(document).ready(function() {

	// Chọn ngày tháng trong form Product

	$('.a1').datepicker({ 
		dateFormat: 'yy-mm-dd',
		showButtonPanel: true,
		changeMonth: true,
		changeYear: true,
	});

	$('.a1').datepicker( "option", "showAnim",'drop');
	$('.a1').datepicker( "option", "yearRange", "1960:2040" );

	// Hết chọn ngày tháng trong form Product



	// Phần chọn ảnh trong From
	$('a#select-img').click(function(event) {
		$('#modal-image').modal('show');

		$('#modal-image').on('hide.bs.modal', function(event) {
			var Url = $('input#image').val();
			$('img#show-img').attr({
				'src': Url,
				'width': '150px',
				'height': '150px',
			});
		});		
	});

	$('a#delete-img').click(function(event) {
		$('input#image').val('');
		$('img#show-img').attr('src','');
	});
	// Kết thúc phần chọn ảnh trong Form
	

	// Tạo slug
	function ChangeToSlug(str)
	{
	    // Chuyển hết sang chữ thường
	    str = str.toLowerCase();     
	 
	    // xóa dấu
	    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
	    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
	    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
	    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
	    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
	    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
	    str = str.replace(/(đ)/g, 'd');
	 
	    // Xóa ký tự đặc biệt
	    str = str.replace(/([^0-9a-z-\s])/g, '');
	 
	    // Xóa khoảng trắng thay bằng ký tự -
	    str = str.replace(/(\s+)/g, '-');
	 
	    // xóa phần dự - ở đầu
	    str = str.replace(/^-+/g, '');
	 
	    // xóa phần dư - ở cuối
	    str = str.replace(/-+$/g, '');

	    return str;

	}
	$('input#name').keyup(function(event) {
		$('input#slug').val(ChangeToSlug($('input#name').val()));
	});

	$('input#name').blur(function(event) {
		$('input#slug').val(ChangeToSlug($('input#name').val()));
	});
	// Hết Slug

	// So sảnh ngày bắt đầu giảm giá với kết thúc
	function parseDate(str) {
		var mdy = str.split('-');
		return new Date(mdy[2], mdy[1], mdy[0]);
	}

	$("#product-end_sale").change(function(){
		$product_start_sale = $("#product-start_sale").val();
		$product_end_sale = $("#product-end_sale").val();

		var startDate = parseDate($product_start_sale).getTime();
		var endDate = parseDate($product_end_sale).getTime();
		 
		  if (startDate > endDate) {
		    alert("Ngày bắt đầu giảm giá không thể sau ngày kết thúc");
		    $("#product-end_sale").val('');
		  }
    });

    $("#product-start_sale").change(function(){
		$product_start_sale = $("#product-start_sale").val();
		$product_end_sale = $("#product-end_sale").val();

		var startDate = parseDate($product_start_sale).getTime();
		var endDate = parseDate($product_end_sale).getTime();
		 
		  if (startDate > endDate) {
		    alert("Ngày bắt đầu giảm giá không thể sau ngày kết thúc");
		    $("#product-start_sale").val('');
		  }
    });
	// Hết so sánh


	// Kiểm tra giá thực không được lớn hơn giá bị đẩy lên

	// $("#product-price_real").change(function(){
	// 	$product_price_push_up = $("#product-price_push_up").val();
	// 	$product_price_real = $("#product-price_real").val();

	// 	var product_price_push_up = parseInt($product_price_push_up);
	// 	var product_price_real = parseInt($product_price_real);

	//   	if ($product_price_push_up < $product_price_real) {
	//     	alert("Giá thực sự của sản phẩm đang lớn hơn giá bị đẩy lên");
	//     	$("#product-price_real").val('');
	//   	}
 //    });

    $("#product-price_push_up").change(function(){
		$product_price_push_up = $("#product-price_push_up").val();
		$product_price_real = $("#product-price_real").val();

		var product_price_push_up = Number($product_price_push_up);
		var product_price_real = Number($product_price_real);

	  	if (product_price_push_up < product_price_real) {
	    	alert("Giá trị đẩy lên đang nhỏ hơn giá trị thực sự");
	    	$("#product-price_push_up").val('');
	  	}
    });

    // Hết

    // Kiểm tra số lượng trong form tạo mới product phải lớn hơn hoặc = 0
    $("#product-quantity").blur(function(event) {
    	if (Number($("#product-quantity").val()) < 0) {
    		alert('Số lượng sản phẩm không thể nhỏ hơn 0');
    		$("#product-quantity").val('');
    	};
	});



	// Chỉnh cho cái Export Excel có thể đổ menu xuống
	$(".dropdown-toggle").dropdown();



	tinymce.init({
	  selector: 'textarea#content',
	  height: 450,
	  plugins: [
	    // 'advlist autolink lists link image charmap print preview anchor',
	    // 'searchreplace visualblocks code fullscreen',
	    // 'insertdatetime media table contextmenu paste code'
	    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars fullscreen",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
	  ],
	  // toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  toolbar1: "undo redo bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote link unlink anchor image media | preview | forecolor backcolor fullscreen code",
	  // content_css: '//www.tinymce.com/css/codepen.min.css',

	      relative_urls: true,
	        remove_script_host : true,


	    external_filemanager_path: homeUrl() + "/file/",
	    external_plugins: { 
	      "filemanager" : homeUrl() + "/file/plugin.min.js",
	      // "codemirror": "http://localhost/PHPYii/advanced2/backend/web/tinymce/plugins/codemirror/plugin.js"
	    },
	});;


});

