
<?php 
use yii\helpers\Html;
use backend\models\Post;

$data = Post::find()->where(['status'=>1])->orderBy(['(post_id)' => SORT_DESC])->asArray()->limit(4)->all();

?>

<div class="block block-list block-viewed">
	<div class="block-title"> Tin tức gần đây </div>
	<div class="block-content">
		<ol id="recently-viewed-items">
			<?php 
			foreach ($data as $item) :

			 ?>
			<li class="item even" style="   margin-bottom: 10px;">
				<p class="product-name">
				<?php echo Html::a(
				$item['post_name'],
				['/post/detail','slug'=>$item['post_slug']],
				['style'=>'color:#2980b9']
				) ?>
				</p>
			</li>
		<?php endforeach; ?>

		</ol>
	</div>
</div>