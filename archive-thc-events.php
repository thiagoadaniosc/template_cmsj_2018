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
            <a class="breadcrumb-item active" href="/events">Eventos</a>
        </nav>
        <h4 class="text-center text-white bg-dark mt-0"> Eventos</h4>
        
        <section>
            <?php if(isset($_GET['date'])) : ?>
            <div class="mt-2">
                <?php while (have_posts()): the_post(); ?>
                <?php  $meta = get_post_meta($post->ID); ?>
                <article class="list-group mb-2">
                    <a href="<?= get_permalink()?>" class="list-group-item list-group-item-action flex-column align-items-start rounded-0">
                        <div class="d-flex w-100 justify-content-between pl-0 col-lg-12">
                            <h5 class="mb-1 ml-0 pl-0"><?= $post->post_title; ?></h5>                                      
                            <!-- <small class="p-1"> <i class="fa fa-clock-o"></i> <?= get_the_date()?></small>                   -->
                        </div>
                        <p class="mb-1 ml-0 rounded-0 badge badge-secondary"><strong> <i class="fa fa-clock-o"></i> Data do Evento: </strong> <?= date("d/m/Y", strtotime($meta['eventDate'][0])); ?></p> <?php if(strlen($post->post_content) >= 255 ): ?> 
                        <p class="mb-1"><strong>Descrição:</strong> <?= substr($post->post_content, 0, 255)?>...</p>
                        <?php else : ?>
                        <p class="mb-1"><strong>Descrição:</strong> <?= substr($post->post_content, 0, 255)?></p>
                        <?php endif; ?>
                    </a>
                    
                </article>
                <?php endwhile;?>
                <?php require('includes/pagination.php'); ?>
            </div>
            <?php else: ?>
            <?php
            $args= [
                'orderby' => 'eventDate'
            ];

            $noticias_query = new WP_Query(array('post_type' => 'thc-events', 'meta_key' => 'eventDate', 'orderby' => 'meta_value', 'order' => 'DESC', 'posts_per_page' => -1));
            $noticias_post = $noticias_query->get_posts();
            
            ?>
            <div class="mt-2">
                <?php foreach ($noticias_post as $post): ?>
                <?php  $meta = get_post_meta($post->ID); ?>
                <article class="list-group mb-2">
                    <a href="<?= get_permalink()?>" class="list-group-item list-group-item-action flex-column align-items-start rounded-0">
                        <div class="d-flex w-100 justify-content-between pl-0 col-lg-12">
                            <h5 class="mb-1 ml-0 pl-0"><?= $post->post_title; ?></h5>                                      
                            <!-- <small class="p-1"> <i class="fa fa-clock-o"></i> <?= get_the_date()?></small>                   -->
                        </div>
                        <p class="mb-1 ml-0 rounded-0 badge badge-secondary"><strong> <i class="fa fa-clock-o"></i> Data do Evento: </strong> <?= date("d/m/Y", strtotime($meta['eventDate'][0])); ?></p> <?php if(strlen($post->post_content) >= 255 ): ?> 
                        <p class="mb-1"><strong>Descrição:</strong> <?= substr($post->post_content, 0, 255)?>...</p>
                        <?php else : ?>
                        <p class="mb-1"><strong>Descrição:</strong> <?= substr($post->post_content, 0, 255)?></p>
                        <?php endif; ?>
                    </a>
                    
                </article>
                <?php endforeach;?>
                <!-- <?php require('includes/pagination.php'); ?> -->
            </div>
            <?php endif; ?>
            
        </section>
        
        
    </div>
</main>
<?php get_footer(); ?>