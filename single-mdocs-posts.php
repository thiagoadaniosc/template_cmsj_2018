<?php get_header(); ?>
<main class="conteudo col-lg-12">
	<style>
		body{
			background-color: #EEEEEE;

		}

        #mdocs-navbar .navbar-brand {
           float:left !important;
            text-align:left !important;
            display: none;
			
        }

		.btn {
			height:40px !important;
		}
		input {
			height:40px !important;
		}

        .mdocs-social-container  {
            height: auto !important;
        }
	</style>
	<section class="post-panel col-lg-12 justify-content-center row">
		<header class="post-bg"> 
			<div class="post-title col-lg-12">
				
				<?php the_post(); ?>
				
				<p><i class="fa fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); ?></p>
				<h1><?php the_title(); ?></h1>
				<h3 style="font-size: 20px;text-align: center;letter-spacing: -.80px;"><?php the_excerpt(); ?></h3>
			</div>
		</header>

		<div class="post-main row justify-content-center m-0 mt-0 p-0 col-lg-9 rounded-0">		
		
		<div class="post-content col-lg-12 mt-1 ">
			<div class="pl-4 pt-4 pr-4 border  border-light bg-white rounded-0" style="box-shadow:rgba(0,0,0,.2) 0 4px 16px;">
			<!-- <?php// the_post_thumbnail('large'); ?>-->
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
    </div>
	</div>
	
	</section>


</main> 

<?php get_footer(); ?>