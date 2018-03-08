<?php get_header(); ?>
<main class="conteudo col-lg-12">
	<style>
		body{
			background-color: #EEEEEE;
		}
	</style>
	<section class="post-panel col-lg-12 justify-content-center row">
		<header class="post-bg"> 
			<div class="post-title col-lg-12">
				
				<?php the_post(); ?>
				<h1><?php the_title(); ?></h1>
				
			</div>
		</header>
		
		<div class="post-main row justify-content-center m-0 col-lg-8 rounded-0">		
			
			<div class="post-content col-lg-12 mt-4 ">
				<div class="pr-5 pl-5 pt-4 border  border-light bg-white rounded-0" style="box-shadow:rgba(0,0,0,.2) 0 4px 16px; font-size: 1.25rem;">
					<small><i class="fa text-dark fa fa-user-circle"></i> <?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')?> </small>
					<small class="float-right"><i class="text-dark fa fa-clock-o"></i> <?= get_the_date("d F Y", $post->ID);?> </small>
					<small><br><i class="fa text-dark fa fa-tag"></i> - <?= get_type($post_type)?> </small>
					<h3 style="font-size: 20px;text-align: center;letter-spacing: -.80px;"><?php the_excerpt(); ?></h3>
					<hr>
					<!-- <?php the_post_thumbnail('large'); ?>-->
					<div class="post-content-text">
						<?php the_content(); ?>
						<!--
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							<br>
							<br>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						-->
					</div>
					<small class="mb-2"><i class="fa text-dark fa fa-tags"></i> <?= the_tags();?></small>
					
				</div>
			</div>
			<!--
			
			<div class="mt-2 col-lg-12 border border-light bg-white p-2 mt-4" style="box-shadow:rgba(0,0,0,.2) 0 4px 16px;">
				<?php
				$noticias_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3));
				$noticias_post = $noticias_query->get_posts();
				
				?>
				<div class="card-deck">
				<?php  foreach ($noticias_post as $post): ?>
				
					<div class="card col-lg-4" style="height: auto;">
						<img class="card-img-top" height="250" src="<?= TEMPLATE_URI ?>/imgs/back.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
				
				
				<?php endforeach; ?>
			</div>
				
			</div>

		-->
			
			
		</div>
		
		
	</section>
	
	
</main> 

<?php get_footer(); ?>