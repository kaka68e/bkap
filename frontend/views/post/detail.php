<?php 
use yii\helpers\Html;
$this->title = $postDetail[0]['post_name'];
?>

<div class="col-main">
	<div class="page-title">
		<!-- <h2 style="font-weight:600">Bài viết</h2> -->
	</div>
	<div class="blog-wrapper" id="main">
		<div class="site-content" id="primary">
			<div role="main" id="content">
				

				<article class="blog_entry clearfix wow bounceInUp animated" id="post-29">
					<header class="blog_entry-header clearfix">
						<p>
							<!-- <a class="btn" href="blog_single_post.html">Về trang tin tức</a> -->
							<?php echo Html::a('Về trang tin tức',['post/index'],['class'=>'btn']) ?>
						</p>

						<div class="blog_entry-header-inner">
							<h2 class="blog_entry-title" style="font-family: Open Sans">
								<?php echo $postDetail[0]['post_name'] ?>
							</h2>
						</div>

					</header>
					<div class="entry-content">
						<div class="entry-content">
							<?php echo $postDetail[0]['content'] ?>
						</div>
					</div>
					<footer class="entry-meta" style="padding-top:0px">Bài viết đã được đăng trong danh mục: 
						<a rel="category tag" title="View all posts in First Category" href="#/first-category">First Category</a> vào lúc :
						<time datetime="2014-07-10T06:59:14+00:00" class="entry-date"><?php echo $postDetail[0]['date_created_at'] ?></time>
					</footer>
				</article>


			</div>
		</div>
	</div>
</div>