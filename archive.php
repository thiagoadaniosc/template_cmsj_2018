<?php get_header(); ?>
<main class="row col-lg-12 bg-transparent ml-auto mr-auto justify-content-center">
    <style>
		body{
			background-color: #EEEEEE;
		}
	</style>
    <div class="col-lg-8 justify-content-center m-auto bg-white p-5 archive-noticias-content">
        <h4 class="text-center text-white bg-dark"> <i class="home-news-header-title m-0 fa fa-newspaper-o"></i> Posts </h4>

        <section>
            
            <?php
            ?>
            <div class="mt-2">
                <?php while (have_posts()): the_post() ?>
                <article class="list-group mb-2">
                    <a href="<?= get_permalink()?>" class="list-group-item list-group-item-action flex-column align-items-start rounded-0">
                    <img class="home-news-article-img img-fluid col-lg-4 float-left m-0 pl-0" src="<?= TEMPLATE_URI ?>/imgs/suporte_background.jpg" alt="">
                        <div class="d-flex w-100 justify-content-between pl-0 col-lg-8">
                            <h5 class="mb-1 ml-0 pl-0"><?= the_title() ?></h5>      
                            <small class="p-1"> <i class="fa fa-clock-o"></i> <?= get_the_date()?></small>                  
                        </div>
                        <p class="mb-1"><?= the_excerpt()?></p>
                    </a>
                    
                </article>
                <?php endwhile;?>
                
            </div>
            
        </section>
        

    </div>
</main>
<?php get_footer(); ?>