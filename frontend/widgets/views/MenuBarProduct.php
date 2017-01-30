<?php
use yii\helpers\Html;
use backend\models\Category;

$cate = new Category();
$data = $cate->getAllCategoryArray();
?>

<div class="level0-wrapper dropdown-6col">
	<div class="container">
		<div class="level0-wrapper2">
			<div class="nav-block nav-block-center"> 
				<!--mega menu-->

				<ul class="level0">
					<?php 
					foreach ($data as $item) :
					?>
					<?php 
						$cate1 = new Category();
						$data1 = $cate1->getAllCategoryArray($item['category_id']);	
						//if ($data1) :
							
						
					?>
					<li class="level3 nav-6-1 parent item">
					 	<?php echo Html::a(
						 	$item['category_name'],
						 	['/product/listproduct','slug'=>$item['category_slug']],
						 	['style'=>'color:#3498db']
					 	); ?>
					<?php 
					//endif;
					 ?>
					<?php 
						foreach ($data1 as $item2) :
						?>
						<ul class="level1">
							<li class="level2 nav-6-1-1">
								<?php echo Html::a($item2['category_name'],['/product/listproduct','slug'=>$item2['category_slug']]); ?>
							</li>
						</ul>
						<?php 
						endforeach;
						?>
					</li>

					<?php 
					endforeach;
					?>
					
				</ul>
				<!--level0--> 
			</div>
			<!--nav-block nav-block-center--> 
		</div>
		<!--level0-wrapper2--> 
	</div>
	<!--container--> 
</div>

