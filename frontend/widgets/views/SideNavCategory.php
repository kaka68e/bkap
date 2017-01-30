<?php
use backend\models\Category;
use yii\helpers\Html;
$cate = new Category();
$data = $cate->getAllCategoryArray();
?>



<div class="side-nav-categories">
	<div class="block-title"> DANH MỤC </div>
	<!--block-title--> 
	<!-- BEGIN BOX-CATEGORY -->
	<div class="box-content box-category">
		<ul>
			<?php 
			foreach ($data as $item) :
			?>
			<li>
			 <?php echo Html::a(
				 $item['category_name'],
				 ['/product/listproduct','slug'=>$item['category_slug']],
				 ['class'=>'a-side-nav']
			 ); ?>
				<?php 
					$cate1 = new Category();
					$data1 = $cate1->getAllCategoryArray($item['category_id']);	
				?>
				<?php 
					if ($data1) {
				?>
				<span class="subDropdown plus"></span>
				<?php } ?>
				<ul class="level0_455" style="display:none">
					<?php 
					
					foreach ($data1 as $item2) :
					?>
					<li> 
					<?php echo Html::a($item2['category_name'],['/product/listproduct','slug'=>$item2['category_slug']]); ?>
					</li>
					<?php 
					endforeach;
					?>
				</ul>
			</li>
			<?php 
			endforeach;
			?>
		</ul>
	</div>
	<!--box-content box-category--> 
</div>