

<section class="home-asidel-menu mb-2">
  <header class=" home-asidel-menu-header text-center mb-2">
    <!-- img src="<?= TEMPLATE_URI ?>/imgs/17.png" class="home-asidel-menu-header-icon" alt="">  -->
    <i class="fa fa-bars float-left" style="position: relative; top: 5px; left: 20px; font-size: 20px;"><a></i> Menu </a>
  </header>

  
  <nav class="nav nav-pills flex-column justify-content-center home-asidel-menu">
    <!-- 
      <?php 
      /*  $menu_name = 'menu_aside';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object( $locations[$menu_name] );
      $menuitems = wp_get_nav_menu_items($menu->term_id);
      foreach ($menuitems as $item):
      */ ?>
      
      <li class="nav-item btn btn-dark mb-1 justify-content-center text-left rounded-0 ">
        <a href="<?= $item->url ?>" class="nav-link text-white"><?= $item->title ?></a>
      </li> 
      <?php //endforeach; ?>
      
      <li class="nav-item btn btn-dark mb-1 justify-content-center text-left rounded-0 ">
        <a href="https://correio.sc.gov.br/" target="_blank" class="nav-link text-white"><i class="fa fa-envelope"></i> Correio Expresso</a>
      </li> 
      
    -->
    
    <?php  wp_nav_menu( array( 'theme_location' => 'menu_aside', 'menu_class' => 'menu_aside'
    ) ); ?>
    
  </nav>
</section>

<section class="home-asidel-clima ">
  <header class="home-asidel-header text-center mb-2"><i class="fa fa-snowflake-o"></i>
    Clima</header>
    <div id="cont_843f6808bbb2d4f5f32d422047c54d18"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/843f6808bbb2d4f5f32d422047c54d18"></script></div>
</section>
    
    <section class="home-asidel-suporte mb-2" style="overflow: auto">
      <header class="home-asidel-header text-center mb-2">Meus Chamados</header>
      <table class="table table-striped tickets-table-size" style="">
        <thead>
          <tr>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
            <th scope="col" class="d-xl-table-cell d-lg-none d-md-table-cell d-sm-none">Ações</th>
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
            <td class="d-xl-table-cell d-lg-none d-sm-none d-md-table-cell"><a class="badge badge-dark" alt="Vizualizar" title="Visualizar Chamado" href="http://suporte.cmsj.info/front/ticket.form.php?id=<?= $ticket['id'];?>" target="_blank"><i class="fa fa-eye" style="font-size:14px"></i></a></td>
          </tr>
          <?php endwhile; ?>
          <tr> 
            <td colspan="3" class="col-lg-12">
              <a href="http://suporte.cmsj.info/front/ticket.php" class="col-lg-5 col-md-5 col-sm-5 btn btn-dark rounded-0" target="_blank" style="font-size:1em; height: auto !important;"><i class="fa fa-eye"></i> VER TODOS</a>
              <a href="http://suporte.cmsj.info/front/helpdesk.public.php?create_ticket=1" class="col-lg-5 col-md-5 col-sm-5 btn btn-primary float-right rounded-0 p-auto" target="_blank" title="Novo Chamado" style="font-size:1em; height: auto !important;">NOVO <i class="fa fa-plus"></i></a>
            </td>
            
          </tr>
        </tbody>
      </table>
    </section>
    