<aside class="col-lg-3 bg-white">
    
    <section class="home-asider-comunicados">
        <header class="home-aside-comunicados-header text-center text-white"> <a class="text-white" href="<?= COMUNICADOS_URI ?>"> <i class="fa fa-bullhorn m-auto text-white" style="position: absolute; left:35px; top: 15px"></i> Comunicados </a></header>
        <?php
        $comunicados_query = new WP_Query(array('post_type' => 'comunicados', 'posts_per_page' => 3));
        $comunicados_post = $comunicados_query->get_posts();
        ?>
        <div class="mt-2">
            <?php foreach ($comunicados_post as $post): ?>
            <article class="list-group mb-2">
                <a href="<?=  get_permalink($post->ID); ?>" class="list-group-item list-group-item-action flex-column align-items-start home-comunicados-card">
                    <div class="d-flex w-100 justify-content-between pl-0">
                        <h5 class="mb-1 ml-0 pl-0" style="font-size: 16px;"><?= $post->post_title ?></h5>      
                        <small class="d-xl-inline float-right m-0 d-lg-none d-md-none d-sm-inline badge badge-light"><i class="fa fa-clock-o"></i> <?= get_the_date("d F Y", $post->ID);?></small>                  
                    </div>
                    <p class="mb-1"><?= $post->post_excerpt?></p>
                </a>
                
            </article>
            <?php endforeach;?>
            
        </div>
        
    </section>
    
    <section class="home-asider-clipagem">
        <header class="home-aside-clipagem-header text-center"> <a href="<?= CLIPAGEMDIGITAL_URI ?>" class="text-white"> <i class="fa fa-paperclip m-auto text-white float-left" style="position: relative; left:20px; top:8px"></i> CMSJ na Mídia </a></header>
        <?php 
        
       $clipagens = get_last_clipagens(); 

        
        ?>
        <div class="mt-2">
            <?php while($clipagem = $clipagens->fetch_assoc()) : ?>
            <article class="list-group mb-2">
                <a href="http://clipagem.cmsj.info/uploads/<?= $clipagem['nome'] ?>" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start home-clipagem-card">                        
                    <div class="d-flex w-100 justify-content-between pl-0 col-lg-12">
                        <h5 class="mb-1 ml-0 pl-0 col-lg-12" style="font-size: 16px;"><?= $clipagem['titulo'] ?></h5>  
                        
                    </div>
                    <small class="d-xl-inline m-0 d-lg-none d-md-none d-sm-inline badge badge-secondary col-lg-12"> <i class="fa fa-clock-o"></i> <?= $clipagem['data'] ?></small>     
                    <p class="mb-1" style="word-break: break-all;"><i class="fa fa-newspaper-o"></i> <?= $clipagem['veiculo'] ?></p>
                    <p class="mb-1" style="word-break: break-all;"><i class="fa fa-user-circle"></i> <?= $clipagem['autor'] ?></p>
                </a>
                
            </article>
            <?php endwhile;?>
            
        </div>
    </section>
    
</aside>