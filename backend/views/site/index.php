<?php

/* @var $this yii\web\View */

$this->title = 'E-shopper';

$this->registerJs('
	window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Doanh số đơn hàng đã bán trong năm '.$now.'"
				},
				data: [{
					type: "column",
					dataPoints: [
						{ y: '.$count1.', label: "Tháng 1" },
						{ y: '.$count2.', label: "Tháng 2" },
						{ y: '.$count3.', label: "Tháng 3" },
						{ y: '.$count4.', label: "Tháng 4" },
						{ y: '.$count5.', label: "Tháng 5" },
						{ y: '.$count6.', label: "Tháng 6" },
						{ y: '.$count7.', label: "Tháng 7" },
						{ y: '.$count8.', label: "Tháng 8" },
						{ y: '.$count9.', label: "Tháng 9" },
						{ y: '.$count10.', label: "Tháng 10" },
						{ y: '.$count11.', label: "Tháng 11" },
						{ y: '.$count12.', label: "Tháng 12" },
					]
				}]
			});
			chart.render();
		}
');
?>
<div class="site-index">
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
</div>
