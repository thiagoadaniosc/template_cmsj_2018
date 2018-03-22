<section class="home-news-mobile d-xl-none d-md-block d-lg-block d-sm-block">
    <header class="home-news-mobile-header text-white p-1 border-top">
        <h3><a href="/noticias" class="text-white"><i class="home-news-mobile-header-title fa fa-newspaper-o"></i> Notícias</a> </h3>
    </header>
    
    <div class="mt-2 row p-0 m-0">
        
        <?php 
        $noticias_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6));
        $noticias_post = $noticias_query->get_posts();
        foreach ($noticias_post as $post):
        ?>
        <article class="list-group col-lg-12 col-xl-6 col-md-12 col-sm-12 mb-2 home-news-mobile-article pr-1 pl-1">
            <a href="<?= get_permalink($post->ID); ?>" class="list-group-item-hover rounded-0 list-group-item list-group-item-action flex-column align-items-start pt-0 p pl-0 pr-0">
                <?php 
                
                if (has_post_thumbnail($post->ID) == 1):
                ?>
                <figure>
                    <img class="home-news-mobile-article-img pt-2 p-2 col-lg-12" src="<?=  the_post_thumbnail_url($post->ID,'medium'); ?>" alt="">
                    <small class="badge badge-primary rounded-0" style="position: absolute; top:15; right:20px; background-color: rgba(33, 128, 206, 0.5)"><i class="fa fa-clock-o"></i> <?= get_the_date("d F Y", $post->ID);?></small>
                </figure>
                <?php
                else:
                ?>
                <figure>
                    <img class="home-news-mobile-article-img col-lg-12 pt-2 p-2" width="auto" height="180"  src="<?= TEMPLATE_URI ?>/imgs/suporte_background.jpg" alt="">
                    <small class="badge badge-primary rounded-0" style="position: absolute; top:15; right:20px; background-color: rgba(33, 128, 206, 0.5)"><i class="fa fa-clock-o"></i> <?= get_the_date("d F Y", $post->ID);?></small>
                </figure>
                <?php endif;  ?>
                <div class="d-flex w-100 justify-content-center col-lg-12 home-news-mobile-article-title">
                    <h5 class="mb-1 ml-0 pl-0 text-center"><?= $post->post_title; ?></h5>
                </div>
                <!-- <p class="mb-1"><?= $post->post_excerpt;?></p> -->
            </a>
            
        </article>
        <?php endforeach;?>
        
    </div>
    
</section>
