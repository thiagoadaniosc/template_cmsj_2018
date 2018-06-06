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
    <div class="col-lg-8 justify-content-center m-auto bg-white p-1 archive-noticias-content">
        <h4 class="text-center text-white bg-dark"> <i class="home-news-header-title m-0 fa fa-newspaper-o"></i> <?=  get_type(get_post_type()) ?> </h4>

        <section>
            
            <?php
            ?>
            <div class="mt-2">
                <?php while (have_posts()): the_post() ?>
                <article class="list-group mb-2">
                    <a href="<?= get_permalink()?>" class="list-group-item list-group-item-action flex-column align-items-start rounded-0">
                    <?php 
                     
                     if (has_post_thumbnail() == 1):
                     ?>
                      <img class="home-news-article-img col-lg-3 float-left m-0 pl-0" width="auto" height="200" src="<?=  the_post_thumbnail_url('medium'); ?>" alt="">
                     <?php
                     else:
                     ?>
                     <img class="home-news-article-img col-lg-3 float-left m-0 pl-0" width="auto" height="200" src="<?= TEMPLATE_URI ?>/imgs/suporte_background.jpg" alt="">
                     <?php endif;  ?>
                     <div class="d-flex w-100 justify-content-between pl-0 col-lg-9">
                            <div class="col-lg-10 p-0">
                                <h5 class="mb-1 ml-0 pl-0 col-lg-12"><?= the_title() ?></h5>   
                            </div>   
                            <div class="col-lg-2">
                                <small class="badge badge-dark float-right"> <i class="fa fa-clock-o"></i> <?= get_the_date()?></small>
                            </div>                  
                        </div>
                        <p class="mb-1 text-justify"><?= the_excerpt()?></p>
                    </a>
                    
                </article>
                <?php endwhile;?>
                <?php require('includes/pagination.php'); ?>
            </div>
            
        </section>
        

    </div>
</main>
<?php get_footer(); ?>