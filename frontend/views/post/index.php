<?php 
use yii\helpers\Html;
$this->title = "Bài viết";



 ?>


<div class="col-main">
	<div class="page-title">
		<h2 style="font-weight:600">Bài viết</h2>
	</div>
	<div class="blog-wrapper" id="main">
		<div class="site-content" id="primary">
			<div role="main" id="content">
				
				<?php 
				foreach ($data as $item) :

				 ?>
				<article class="blog_entry clearfix wow bounceInUp animated" id="post-29">
					<header class="blog_entry-header clearfix">
						<div class="blog_entry-header-inner">
							<h2 class="blog_entry-title" style="font-family: Open Sans;">
								<?php echo Html::a(
									$item['post_name'],
									['/post/detail','slug'=>$item['post_slug']],
									['style'=>'color:#333']
								) ?>
							</h2>
						</div>

					</header>
					<div class="entry-content">
						<div class="featured-thumb">

							<!-- <a href="blog_single_post.html">
								<img height="100px" alt="blog-img3" src="<?php echo $item['image'] ?>">
							</a> -->

							<?php 
							echo Html::a(
								'<img height="100px" src="'.Yii::$app->homeUrl.$item['image'].'"" alt="'.$item['post_name'].'"">',
								['/post/detail','slug'=>$item['post_slug']]
							);


							 ?>

						</div>
						<div class="entry-content">
						<?php echo $item['description'] ?>
						</div>
						<p>
							<!-- <a class="btn" href="blog_single_post.html">Đọc tiếp</a> -->
							<?php echo Html::a('Đọc tiếp',['/post/detail','slug'=>$item['post_slug']],['class'=>'btn']) ?>
						</p>
					</div>
					<footer class="entry-meta" style="padding-top:0px">Bài viết đã được đăng trong danh mục: 
						<a rel="category tag" title="View all posts in First Category" href="#/first-category">First Category</a> vào lúc :
						<time datetime="2014-07-10T06:59:14+00:00" class="entry-date"><?php echo $item['date_created_at'] ?></time>
					</footer>
				</article>
			<?php endforeach; ?>

			</div>
		</div>

				<!-- <div class="pager">
					<p class="amount"> <strong>4 Item(s)</strong> </p>
					<div class="limiter">
						<label>Show</label>
						<select onchange="setLocation(this.value)">
							<option selected="selected" value="#/blog/?limit=5"> 5 </option>
							<option value="#/blog/?limit=10"> 10 </option>
							<option value="#/blog/?limit=15"> 15 </option>
							<option value="#/blog/?limit=20"> 20 </option>
							<option value="#/blog/?limit=all"> All </option>
						</select>
						per page 
					</div>
				</div> -->
		</div>
	</div>