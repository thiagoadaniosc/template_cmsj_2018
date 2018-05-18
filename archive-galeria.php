<?php get_header(); ?>
<main class="row col-lg-12 bg-transparent ml-auto mr-auto justify-content-center">
    <style>
		body{
            background-image: url('http://clipagem.cmsj.info/img/laptop_macbook_iphone_apple_journal_glasses_113949_3840x2160.jpg');
            background-repeat: repeat-y;
            background-attachment: fixed;
            background-size: cover;
		}
	</style>
    <div class="col-xl-8 col-lg-10 justify-content-center pt-2 m-auto bg-white archive-noticias-content">
        <nav class="breadcrumb rounded-0">
            <a class="breadcrumb-item" href="/">Home</a>
            <a class="breadcrumb-item active" href="<?= get_post_type_archive_link(get_post_type())  ?>"><?= get_type($post_type) ?></a>
        </nav>
        <h4 class="text-center text-white bg-dark mt-0"> <i class="fa fa-image home-news-header-title"></i> Galeria de Imagens</h4>
        
        <section>
            <div class="mt-2 row p-0 m-0 p-auto mt-4">
                <?php while (have_posts()): the_post() ?>
                <article class="list-group mb-2 col-xl-3 pl-2">
                    <a href="<?= get_permalink()?>" class="list-group-item list-group-item-action flex-column align-items-start rounded p-0 m-0 archive-gallery-article-link">
                        <?php 
                        
                        if (has_post_thumbnail() == 1):
                        ?>
                        <img class="archive-gallery-article-img col-lg-12 float-left m-0 p-0 rounded" src="<?=  the_post_thumbnail_url('full'); ?>" alt="">
                        <?php
                        else:
                        ?>
                        <img class="archive-gallery-article-img col-lg-12 float-left m-auto p-0 rounded" src="<?= TEMPLATE_URI ?>/imgs/back.jpg" alt="">
                        <?php endif;  ?>
                        
                        <div class="d-flex w-100 justify-content-between pl-0 pt-2 pb-2 col-lg-12 col-xl-12 rounded gallery-img-title" style="position:absolute; bottom:0; background-color:rgba(5, 5, 5,.6)">
                            <h5 class="mb-1 ml-0 pl-0 m-auto text-white rounded"><?= the_title() ?></h5>      
                            <!--<small class="p-1"> <i class="fa fa-clock-o"></i> <?= get_the_date()?></small>-->                  
                        </div>
                      
                    </a>
                    
                </article>
                <?php endwhile;?>

                <?php require('includes/pagination.php'); ?>
        
            </div>
            
        </section>
        
        
    </div>
</main>
<?php get_footer(); ?>