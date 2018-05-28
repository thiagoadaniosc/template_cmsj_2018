<?php get_header(); ?>
<main class="row col-lg-12 col-xl-11 pt-md-2 pt-sm-2 col-md-11 pt-lg-5 pt-xl-4 pl-lg-3 pr-lg-3 p-sm-0 p-md-0 ml-auto mr-auto rounded bg-white justify-content-center">
<style>
		body{
			/* background-color: #EEEEEE; */
          
            background-image: url('<?= TEMPLATE_URI ?>/imgs/cmsj.png');
            background-repeat: repeat-y;
            background-attachment: fixed;
            background-size: cover;
		
        }
</style>
    
    <aside class="col-xl-3 col-lg-3 col-md-12 bg-white home-asidel">

         <?php require_once('includes/aside.php'); ?>
        
    </aside>
    
    <div class="col-lg-6 col-xl-6 bg-white mb-5 pb-5 home-content-main">

        <?php require('includes/ferramentas.php');?>
        <!-- <?php var_dump(current_user_can('edit_comunicados')) ?> -->
        <?php require('includes/home.news.php');?>
        <?php require('includes/home.news.mobile.php');?>
        
    </div>
    
    <?php require('includes/componentes.php'); ?>
    
</main>
<?php get_footer(); ?>