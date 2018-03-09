<?php get_header(); ?>
<main class="conteudo col-lg-12">
	<style>
		body{
			background-color: #EEEEEE;
        }
        .thc-calendar {
            margin:auto;
            font-size:30px;
        }

        .thc-calendar table th {
            padding:20px;
            padding-top:50px;
            padding-bottom: 50px;
        }

        .thc-calendar-day {
            padding:15px;
        }

        .thc-calendar table thead tr{
            margin-left: -20px;
        }

        .thc-highlight {
            background-color: mediumslateblue;
            color: white;
            padding:5px;
            position: relative;
            left:-8px;
            border: 2px solid mediumslateblue;
        }

        .thc-highlight:hover {
            background-color: transparent;
            color: mediumslateblue;
        }

        .thc-calendar-navigation {
            text-align: center;
        }

        .widget_calendar {
            border: 1px solid  rgb(86, 86, 86);
            padding: 10px;
            
        }

        .thc-calendar caption {
            background-color: mediumslateblue;
            text-transform: uppercase;
            text-align: center;
            margin-top:20px;
            color:white;
            border: 2px solid mediumslateblue;
        }

        .thc-calendar caption:hover {
            background-color: transparent;
            color: mediumslateblue;
        }

        .thc-calendar-navigation td {
            text-transform: uppercase;
            padding-top: 10px;
            padding-bottom: 10px;
            color: white !important;
        
        }

        .thc-calendar-navigation td a{
            color: white;
            padding-top:10px;
            padding-bottom:10px;
            padding-left: 50px;
            padding-right: 50px;
        }


        .thc-calendar-navigation td:nth-child(1){
            background-color: rgb(68, 68, 68);
            border: 2px solid rgb(68, 68, 68);
        }

        .thc-calendar-navigation td:nth-child(1):hover{
            background-color:transparent;
            color: rgb(68, 68, 68);
        }

        .thc-calendar-navigation td:nth-child(1):hover a {
            color: rgb(68, 68, 68);
        }

        .thc-calendar-navigation td:nth-child(3){
            background-color: rgb(110, 87, 236);
            border: 2px solid  rgb(110, 87, 236);
        }

        .thc-calendar-navigation td:nth-child(3):hover{
            background-color:transparent;
            color: rgb(68, 68, 68);
        }

        .thc-calendar-navigation td:nth-child(3):hover a {
            color: rgb(68, 68, 68);
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
					<!-- <?php the_post_thumbnail('large'); ?>-->
					<div class="">
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