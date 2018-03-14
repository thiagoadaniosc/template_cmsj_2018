<?php get_header(); ?>
<main class="row col-lg-11 col-xl-11 pt-md-2 pt-sm-2 col-md-11 pt-lg-5 pt-xl-4 pl-lg-3 pr-lg-3 p-sm-0 p-md-0 ml-auto mr-auto rounded bg-white justify-content-center">
<style>
		body{
			/* background-color: #EEEEEE; */
          
            background-image: url('<?= 'http://'. $_SERVER['HTTP_HOST'] ?>/wp-content/uploads/2017/09/cmsj.png');
            background-repeat: repeat-y;
            background-attachment: fixed;
            background-size: cover;
		
        }
</style>
    
    <aside class="col-lg-3 bg-white home-asidel">

         <section class="home-asidel-suporte mb-2">
            <header class="home-asidel-header text-center mb-2">Meus Chamados</header>
            <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tickets = get_last_tickets();
                    while($ticket = $tickets->fetch_assoc()):
 
                     ?>
                      <tr>
                        <td><?= $ticket['name']; ?></td>
                        <td><?= get_glpi_status($ticket['status']); ?></td>
                        <td><a class="badge badge-dark" alt="Vizualizar" title="Visualizar Chamado" href="http://suporte.cmsj.info/front/ticket.form.php?id=<?= $ticket['id'];?>" target="_blank"><i class="fa fa-eye" style="font-size:14px"></i></a></td>
                      </tr>
                    <?php endwhile; ?>
                    <tr> 
                        <td colspan="3" class="col-lg-12">
                        <a href="http://suporte.cmsj.info/front/ticket.php" class="col-lg-5 btn btn-dark rounded-0" target="_blank"><i class="fa fa-eye" style="font-size:15px"></i> VER TODOS</a>
                        <a href="http://suporte.cmsj.info/front/helpdesk.public.php?create_ticket=1" class="col-lg-5 btn btn-primary float-right rounded-0" target="_blank" title="Novo Chamado">NOVO <i class="fa fa-plus" style="font-size:15px"></i></a>
                        </td>

                    </tr>
                    </tbody>
                  </table>
        </section>

        <section class="home-asidel-menu mb-2">
            <header class="home-asidel-header text-center mb-2"><i class="fa fa-bars"></i> Menu</header>
            <nav class="nav nav-pills flex-column justify-content-center home-asidel-menu">
                 
               <?php 
               $menu_name = 'menu_aside';
               $locations = get_nav_menu_locations();
               $menu = wp_get_nav_menu_object( $locations[$menu_name] );
               $menuitems = wp_get_nav_menu_items($menu->term_id);
               foreach ($menuitems as $item):
                ?>

               <li class="nav-item btn btn-dark mb-1 justify-content-center text-left rounded-0 ">
                   <a href="<?= $item->url ?>" class="nav-link text-white"><?= $item->title ?></a>
               </li> 
               <?php endforeach; ?>

            </nav>
        </section>
        <section class="home-asidel-clima ">
            <header class="home-asidel-header text-center mb-2"><i class="fa fa-snowflake-o"></i>
 Clima</header>
 <div id="cont_843f6808bbb2d4f5f32d422047c54d18"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/843f6808bbb2d4f5f32d422047c54d18"></script></div>

 
        
    </aside>
    
    <div class="col-lg-6 bg-white mb-5 pb-5 home-content-main">

        <?php require('includes/ferramentas.php');?>
        
        <section class="home-news">
            <header class="home-news-header text-white p-1 border-top">
                <h3><a href="/noticias" class="text-white"><i class="home-news-header-title fa fa-newspaper-o"></i> Notícias</a> </h3>
            </header>
            
            <div class="mt-2">
                
                <?php 
                $noticias_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3));
                $noticias_post = $noticias_query->get_posts();
                foreach ($noticias_post as $post):
                ?>
                <article class="list-group mb-2 home-news-article">
                    <a href="<?= get_permalink($post->ID); ?>" class="list-group-item-hover list-group-item list-group-item-action flex-column align-items-start">
                    <?php 
                     
                     if (has_post_thumbnail($post->ID) == 1):
                        ?>
                        <img class="home-news-article-img col-lg-4 float-left m-0 pl-0" width="auto" height="200" src="<?=  the_post_thumbnail_url($post->ID,'medium'); ?>" alt="">
                     <?php
                     else:
                     ?>
                     <img class="home-news-article-img col-lg-4 float-left m-0 pl-0" width="auto" height="200" src="<?= TEMPLATE_URI ?>/imgs/suporte_background.jpg" alt="">
                     <?php endif;  ?>
                    
                        <div class="d-flex w-100 justify-content-between pl-0 col-lg-8">
                            <h5 class="mb-1 ml-0 pl-0"><?= $post->post_title; ?></h5>
                            <small> <i class="fa fa-clock-o"></i> <?= get_the_date("d F Y", $post->ID);?></small>
                            
                        </div>
                        <p class="mb-1"><?= $post->post_excerpt;?></p>
                    </a>
                    
                </article>
                <?php endforeach;?>
                
            </div>
            
        </section>
     
        
    </div>
    
    <?php require('includes/componentes.php'); ?>
    
</main>
<?php get_footer(); ?>