<?php 
use yii\helpers\Html;
use backend\models\Post;

$data = Post::find()->where(['status'=>1])->orderBy(['(post_id)' => SORT_DESC])->asArray()->limit(4)->all();

?>
<h3 class="widget-title"><span>Bài đăng gần đây</span></h3>

<div class="widget-content">
	<ul class="posts-list unstyled clearfix">
		<?php 
		foreach ($data as $item) :
		 ?>

		<li> 
			<figure class="featured-thumb">
				<!-- <a href="#"> 
					<img width="80" height="53" alt="blog image" src="images/blog-img1.jpg">
				</a>  -->
	
				<?php 
					echo Html::a(
						'<img width="80" height="53" src="'.Yii::$app->homeUrl.$item['image'].'"" alt="'.$item['post_name'].'"">',
						['/post/detail','slug'=>$item['post_slug']]
				);?>
			</figure>
			<h4>
				<?php echo Html::a(
					$item['post_name'],
					['/post/detail','slug'=>$item['post_slug']],
					['style'=>'color:#2980b9']
				) ?>
			</h4>
			<p class="post-meta" style="margin:0px">
			<i class="icon-calendar"></i>
				<time datetime="2014-07-10T07:09:31+00:00" class="entry-date"><?php echo $item['date_created_at'] ?></time>
			</p>
		</li>

		<?php endforeach; ?>
	</ul>
</div>
