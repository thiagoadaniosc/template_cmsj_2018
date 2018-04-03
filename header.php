<html lang="pt-br">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Thiago Scheidt">
    <meta name="author" content="Marcelo Macagnan">
    <meta name="author" content="Câmara Municipal de São José">
    <link rel="icon" href="imgs/sao-jose-icon.png" sizes="192x192">

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <link href="<?= TEMPLATE_URI ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet"
    type="text/css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css'/>
    
    <link rel="stylesheet" href="<?= TEMPLATE_URI ?>/css/template.css">
    <link rel="stylesheet" href="<?= TEMPLATE_URI ?>/style.css">
    
    <title>Intranet CMSJ</title>

</head>
<!--
<div class="row justify-content-center p-0 m-0 loader"  style="width: 100%; height: 100%; z-index:99; position:absolute; top:0;">
    <div class="row col-lg-12 m-auto justify-content-center">
        <img src="<?= TEMPLATE_URI ?>/imgs/sao-jose-logo_black.png" class="m-auto mt-0" alt="">
    </div>
    <div>
        <img src="<?= TEMPLATE_URI ?>/imgs/Preloader_5.gif" class="mt-0 m-auto " alt="">
        <p style="position: relative; left:0 " class="text-dark"><b><i>Carregando...</i></b></p>   
    </div>
</div>
-->
<div class="header row bg-header pl-lg-5 pr-lg-5 p-sm-0 p-md-0 position-fixed col-lg-12 mt-0 " style="margin: 0px; z-index:10; height:80px; top:0">
    <header class="navbar site-header col-lg-7 col-xl-9 col-sm-12 col-md-12 navbar-dark bg-header justify-content-between"> 
        <a href="/" class="navbar-brand col-xl-auto col-lg-6 p-0 m-0 col-md-4 col-sm-8"><img class="img-fluid col-lg-12 col-md-8 col-sm-8" src="<?= TEMPLATE_URI ?>/imgs/sao-jose-logo-md.png" alt=""></a>
        
        <form class="d-none d-md-none d-sm-none d-lg-inline-flex d-xl-inline-flex form-inline search-form col-xl-auto col-xl-auto col-lg-6 col-md-12 col-sm-12"action="">
            <input type="text" style="border-radius: 0; border:0" name="s" class="form-control search-form-input col-lg-8 col-xl-10" placeholder="Pesquisar...">
            <button class="form-control btn btn-light col-xl-2 col-lg-4" type="submit" style="padding-top: 14px !important;
            padding-bottom: 14px !important; border:0px"> <i class="fa fa-x fa-search"></i></button>
        </form>

        <div class="nav-mobile btn-group d-lg-none d-xl-none d-sm-inline-flex d-md-inline-flex justify-content-center col-md-3 col-sm-2">
            <button type="button" class="btn btn-secondary col-lg-12" style="border-radius: 0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" style="font-size:24px"></i></button>
            
            <div class="dropdown-menu bg-dark" style="border-radius: 0; right:15px;left:auto; top: 50px;" >
                <a class="dropdown-item text-light" href="/"> <i class="fa fa-home"></i> Início</a>
                <a class="dropdown-item text-light" href="/noticias"> <i class="fa fa-newspaper-o"></i> Notícias</a>
                <a class="dropdown-item text-light" href="<?= SUPORTE_URI ?>"><i class="fa fa-question-circle"></i> GLPI </a>
                
                <?php 
                $menu_name = 'menu_topo';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[$menu_name] );
                $menuitems = wp_get_nav_menu_items($menu->term_id);
                foreach ($menuitems as $item):
                ?>
                
                <a class="dropdown-item text-light" href="<?= $item->url?>"><i class="fa fa-question-circle"></i> <?= $item->title?></a>
                
                
                <?php endforeach; ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-light" href="/wp-admin"> Painel Administrativo</a>
                <a class="dropdown-item text-light" href="<?= wp_logout_url()?>"> <i class="fa fa fa-sign-out"></i> Sair</a>
                
                
            </div>
            
        </div>
        
        
    </header>
    
    <div class=" d-sm-none d-md-none d-none d-lg-inline-flex col-lg-5 col-xl-3 col-md-12 col-sm-12 navbar navbar-dark bg-header row" style="height: 80px;"> 
        <?php global $current_user; get_currentuserinfo();?>
        
        <div class="d-md-none d-sm-none d-xl-block col-lg-2 col-md-12 col-sm-12 text-center" style=" padding: 2px;">
                
            <img class="img-thumbnail img-fluid rounded-circle" width="96" style="border-radius:0;" width="" src="<?php echo get_wp_user_avatar_src($current_user->ID, 'thumbnail'); ?>" alt="">         
            
        </div>
        
        <div class="btn-group d-lg-inline-flex d-xl-inline-flex d-md-none d-sm-none justify-content-center col-xl-7 col-lg-7 col-md-8 col-sm-8">
            
            
            <button type="button" class="btn btn-secondary dropdown-toggle col-lg-12 col-md-12 col-sm-12" style="border-radius: 0; overflow: none; word-wrap: break-word; font-size:1.8vh; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small style="font-size:1.8vh; word-wrap: break-word;">
                <?php $complete_name = $current_user->user_firstname . ' ' .  substr($current_user->user_lastname,0,1) . '.'; ?>
                <?= trim($complete_name) ?>
                </small>
                
            </button>
            
            <div class="dropdown-menu" id="user-menu" style="border-radius: 0; right:0;  top: 50px; left:0" >
                <?php if ($current_user->roles[0] !== 'subscriber') :  ?>
                <li class="dropdown-item">
                <a class="text-dark dropdown-link d-block" href="/wp-admin"><i class="fa fa-dashboard"></i> Painel Administrativo</a>
                </li>
                <?php else : ?>
                <li class="dropdown-item">
                <a class="text-dark dropdown-link d-block" href="/wp-admin/profile.php"><i class="fa fa-user-circle"></i> Perfil </a>
                </li>
                <?php endif; ?>
                <?php if ($current_user->roles[0] == 'cms' || $current_user->roles[0] == 'administrator') : ?>

                <li class="dropdown-item dropdown-item-has-children">
                <a class="text-dark dropdown-link d-block" ><i class="fa fa-newspaper-o"></i> Notícia </a>
                    <ul class="p-1 dropdown-submenu">
                        <li class="dropdown-subitem">
                            <a class="d-block dropdown-link" href="/wp-admin/post-new.php"><i class="fa fa-plus"></i> Adcionar notícia</a>
                        </li>
                        <li class="dropdown-subitem">
                            <a class="d-block dropdown-link" href="/wp-admin/edit.php"><i class="fa fa-list"></i> Notícias</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-item">
                <a class="text-dark dropdown-link d-block" href="/contato/?show"><i class="fa fa-envelope"></i> Mensagens e Sugestões </a>
                </li>
                <?php endif; ?>

                <?php if ($current_user->roles[0] == 'rh' || $current_user->roles[0] == 'administrator') : ?>
                <li class="dropdown-item dropdown-item-has-children">
                <a class="text-dark dropdown-link d-block" href="/wp-admin/post-new.php?post_type=comunicados"><i class="fa fa-bullhorn"></i> Comunicado </a>
                <ul class="p-1 dropdown-submenu">
                        <li class="dropdown-subitem">
                            <a class="d-block dropdown-link" href="/wp-admin/post-new.php"><i class="fa fa-plus"></i> Adcionar comunicado</a>
                        </li>
                        <li class="dropdown-subitem">
                            <a class="d-block dropdown-link" href="/wp-admin/edit.php"><i class="fa fa-list"></i> Comunicados</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-item">
                <a class="text-dark dropdown-link d-block" href="/wp-admin/edit.php?post_type=thc-events"><i class="fa fa-calendar"></i> Calendário </a>
                </li>
                <?php endif; ?>

                <?php if ($current_user->roles[0] == 'telefonistas' || $current_user->roles[0] == 'administrator') : ?>
                <li class="dropdown-item">
                <a class="text-dark dropdown-link d-block" href="/ramais"><i class="fa fa-phone"></i> Editar Ramais </a>
                </li>
                <?php endif; ?>
                
                <div class="dropdown-divider"></div>
                <li class="dropdown-item active">
                <a class="text-white dropdown-link d-block" href="<?= wp_logout_url()?>"> <i class="fa fa fa-sign-out"></i> Sair</a>
                </li>
            </div>
        </div>
        <!-- Menu -->
        
        <div class="btn-group d-md-none d-sm-none d-lg-inline-flex d-xl-inline-flex justify-content-center col-xl-3 col-lg-3 col-md-4 col-sm-4">
            <button type="button" class="btn btn-secondary col-lg-12 m-auto" style="border-radius: 0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars m-autto" style="font-size: 2.5vh;"></i></button>
            
            <div class="dropdown-menu bg-dark" style="border-radius: 0; right:15px;left:auto; top: 50px;" >
                <a class="dropdown-item text-light" href=""> <i class="fa fa-home"></i> Início</a>
                <a class="dropdown-item text-light" href="/noticias"> <i class="fa fa-newspaper-o"></i> Notícias</a>
                <a class="dropdown-item text-light" href="<?= SUPORTE_URI ?>"><i class="fa fa-question-circle"></i> Suporte</a>
                
                <?php 
                $menu_name = 'menu_topo';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[$menu_name] );
                $menuitems = wp_get_nav_menu_items($menu->term_id);
                foreach ($menuitems as $item):
                ?>
                <a class="dropdown-item text-light" href="<?= $item->url?>"><?= $item->title?></a>
                <?php endforeach; ?>

            </div>
            
        </div>

    </div>
</div>
