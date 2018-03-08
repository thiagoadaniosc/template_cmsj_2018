
<section class="col-lg-12 row p-0 m-0 home-ferramentas">
    <header class="home-ferramentas-header col-lg-12 mb-3">
        <h4 class="col-lg-12 mt-2 text-center">FERRAMENTAS</h4>
    </header>
    
    <article class="col-lg-4 mb-2 home-ferramentas-article">
        <a class="text" href="<?= SUPORTE_URI ?>" target="_blank">
            <div class="card col-lg-12 justify-content-center rounded-0 p-3 bg-primary">
                <i class="fa fa-question-circle m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white">GLPI</h4>
                
                <small class="text-center text-white">(Sistema de Suporte)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 home-ferramentas-article">
        <a class="text" href="<?= COMUNICADOS_URI ?>" target="_blank">
            <div class="card col-lg-12 justify-content-center rounded-0 p-3 bg-danger">
                <i class="fa fa-bullhorn m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white ">Comunicados</h4>
                <small class="text-center text-white">(Comunicados Internos)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 home-ferramentas-article">
        <a class="text" href="<?= FOLHAWEB_URI ?>" target="_blank">
            <div class="card col-lg-12 justify-content-center rounded-0 p-3 bg-white">                    
                <img class="m-auto" width="80" src="<?= TEMPLATE_URI ?>/imgs/folha-web.png" alt="">
                <h4 class="text-center" style="color:#24609F">Folha Web</h4>
                <small class="text-center" style="color:#24609F">(Folha de Pagamento Digital)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 justify-content-center home-ferramentas-article">
        <a class="text" href="<?= RAMAIS_URI ?>" target="_blank">
            <div class="card col-lg-12 rounded-0 p-3" style="background-color: #3648ab">
                <i class="fa fa-phone m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white">Ramais</h4>
                <small class="text-center text-white">(Ramais - Setores e Gabinetes)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 justify-content-center home-ferramentas-article">
        <a class="text" href="" data-toggle="modal" data-target="#modalCalendario">
            <div class="card col-lg-12 rounded-0 p-3" style="background-color:#563d7c">
                <i class="fa fa-calendar m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white">Calendário</h4>
                <small class="text-center text-white">(Feriados e pontos facultativos)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 justify-content-center home-ferramentas-article">
        <a class="text" href="" data-toggle="modal" data-target="#modalAniversariantes">
            <div class="card col-lg-12 rounded-0 p-3" style="background-color:#d62a67	">
                <i class="fa fa-birthday-cake m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white">Aniversariantes</h4>
                <small class="text-center text-white">(Aniversariantes do dia)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 justify-content-center home-ferramentas-article">
        <a class="text" href="<?= DOM_URI ?>" target="_blank">
            <div class="card col-lg-12 rounded-0 justify-content-center p-3">
                <img class="m-auto" src="<?= TEMPLATE_URI ?>/imgs/dom-logo.png" width="102" alt="">
                <h4 class="text-center text-danger">DOM</h4>
                <small class="text-center text-danger">(Diário Official dos Municípios)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 justify-content-center home-ferramentas-article">
        <a class="text" href="<?= CLIPAGEMDIGITAL_URI ?>" target="_blank">
            <div class="card col-lg-12 rounded-0 justify-content-center p-3" style="background-color: #6666FF">
                <i class="fa fa-paperclip m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white">Clipagem Digital</h4>
                <small class="text-center text-white">(Configurações do Usuário)</small>
            </div>
        </a>
    </article>
    
    <article class="col-lg-4 mb-2 justify-content-center home-ferramentas-article">
        <a class="text" href="<?= CONFIGURACOES_URI ?>" target="_blank">
            <div class="card col-lg-12 rounded-0 justify-content-center p-3" style="background-color: #0d1235">
                <i class="fa fa-cogs m-auto text-white" style="font-size:80px"></i>
                <h4 class="text-center text-white">Configurações</h4>
                <small class="text-center text-white">(Configurações do Usuário)</small>
            </div>
        </a>
    </article>
    
    <div class="modal fade" id="modalCalendario" tabindex="-1" role="dialog" aria-labelledby="modalCalendario" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Calendário </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body col-lg-12 justify-content-center">
                    <?php echo do_shortcode('[thc-calendar title="Upcoming Events" showholidays="yes" country="br" displaymode="calendar" firstday="su" numberofholidays="3"]'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalAniversariantes" tabindex="-1" role="dialog" aria-labelledby="modalAniversariantes" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Aniversariantes de <?=  get_month(date('m')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
      
                <?= do_shortcode('[birthdays class="your_class" img_width="desired_width" template="upcoming"]') ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
        if (isset($_GET['thc-month'])):
    ?>

    <script type="text/javascript">
        $(window).on('load',function(){
            $('#modalCalendario').modal('show');
        });
    </script>
    <?php endif;?>

    
    
    
</section>