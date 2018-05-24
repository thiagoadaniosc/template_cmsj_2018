<section class="home-news d-xl-inline-block col-xl-12 col-lg-12 d-lg-none d-md-none d-sm-none">
    <header class="home-news-header text-white p-1 border-top">
        <h3><a href="/noticias" class="text-white"><i class="home-news-header-title fa fa-newspaper-o"></i> Notícias</a> </h3>
    </header>
    
    <div class="mt-2">
        
        <?php 
        $noticias_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4));
        $noticias_post = $noticias_query->get_posts();
        foreach ($noticias_post as $post):
        ?>
        <article class="list-group mb-2 home-news-article">
            <a href="<?= get_permalink($post->ID); ?>" class="list-group-item-hover list-group-item list-group-item-action flex-column align-items-start rounded-0">
                
                <?php 
                
                if (has_post_thumbnail($post->ID) == 1):
                ?>
                <img class="home-news-article-img img-rounded col-lg-4 float-left m-0 pl-0 rounded " width="200px" height="200px" src="<?=  the_post_thumbnail_url($post->ID,'medium'); ?>" alt="">
                <?php
                else:
                ?>
                <img class="home-news-article-img col-lg-4 float-left m-0 pl-0 rounded " width="200px" height="200px" src="<?= TEMPLATE_URI ?>/imgs/back.jpg" alt="">
                <?php endif;  ?>
                
                <div class="d-flex w-100 justify-content-between pl-0 col-lg-8">
                    <h5 class="mb-1 ml-0 pl-0 home-news-article-title col-lg-7 text-justify"><?= $post->post_title; ?></h5>
                    <div class="col-lg-4 m-0 p-0 ">
                        <small class="float-right badge badge-secondary">
                            <i class="fa fa-clock-o"></i> <?= get_the_date("d F Y", $post->ID);?>
                        </small>
                    </div>
                    
                </div>
                <p class="mb-1 col-lg-8 pl-0 float-left text-justify"><?= get_the_excerpt();?></p>
            </a>
            
        </article>
        <hr>
        <?php endforeach;?>
        
    </div>
    
</section>