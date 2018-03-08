<?php get_header() ?>
<main class="row col-lg-12 pl-lg-5 pr-lg-5 p-sm-0 p-md-0 justify-content-center ml-auto mr-auto ">
    <style>
		body{
            background-image: url('http://clipagem.cmsj.info/img/laptop_macbook_iphone_apple_journal_glasses_113949_3840x2160.jpg');
            background-repeat: repeat-y;
            background-attachment: fixed;
            background-size: cover;
		}
	</style>
    <?php 
    $search_value = $_GET['s'];
    $search_query = new WP_Query(array('post_type' => array('page', 'post',  'comunicados'),'s' => $search_value));
    $search_post = $search_query->get_posts();
    
    // var_dump($search_post);
    ?>
    
    <div class="post-content col-lg-8 justify-content-center bg-white  pt-2  m-auto" style="box-shadow:rgba(0,0,0,.2) 0 4px 16px; border-left: 8px solid rgb(73, 128, 209)">
        
        <form class="d-none d-md-none d-sm-none d-lg-inline-flex d-xl-inline-flex p-0 form-inline search-form col-xl-12 col-lg-12 col-md-12 col-sm-12"action="">
            <input type="text" name="s" class="form-control search-form-input col-lg-11 col-xl-11" placeholder="Pesquisar...">

            <button class="form-control btn btn-dark col-xl-1 col-lg-1" type="submit" style="padding-top: 14px !important;
            padding-bottom: 14px !important;"> <i class="fa fa-x fa-search"></i></button>
        </form>

        <h5 class="text-center">Pesquisa: "<?= $_GET['s'] ?>"</h5>

        <?php if (!empty($search_value) && !empty($search_post)): ?>
        <?php foreach ($search_post as $post): ?>
        
        <article class="list-group mb-2">
            <a href="<?= get_post_permalink($post->ID); ?>" class="list-group-item list-group-item-action flex-column align-items-start rounded-0">                       
                <div class="d-flex w-100 justify-content-between pl-0 col-lg-12">
                    <h4 class="mb-1 ml-0 pl-0  text-dark"><?= $post->post_title ?></h4>      
                    <small class="p-1"> <i class="fa fa-clock-o"></i> <?= get_the_date()?></small>                  
                </div>
                <p class="mb-1"><?= $post->post_title?></p>
                <small class="text-white bg-primary float-right pl-2 pr-2"> Categoria: <?= get_type($post->post_type); ?> </small>
            </a>
        </article>
        <?php endforeach; ?>
        <?php else : 
        echo "Nenhum resultado encontrado para a sua busca \"$search_value\".  ";
        endif;
        ?>
        
    </div>
    
</main>

<?php get_footer() ?>