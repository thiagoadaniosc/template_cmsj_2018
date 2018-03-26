<div class="bg-white col-lg-5 pt-4 pb-4 mt-4 justify-content-center" style="border-left: 6px solid rgb(66, 107, 194); border-right: 6px solid rgb(66, 107, 194);">
        <h4 class="text-center col-lg-12 text-dark text-uppercase">Críticas e Sugestões</h4>
        <hr class="col-lg-2 col-xl-2 col-md-5 col-sm-5 bg-primary">
        <p class="text-center"> Preencha os campos abaixo para entrar em contato.<br>
            <small>
                Envie sua Crítica ou Sugestões
            </small>
        </p>        
        <form class="form-group col-lg-10 m-auto" action="">
            <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
                <p>Agradecemos sua mensagem, entraremos em contato o mais breve possível.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <div class="row mt-2 mb-2 p-0 m-0">
                <div class="col-lg-6 p-0 m-0 pr-lg-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user-circle"></i></div>
                        </div>
                        <input class="form-control col-lg-12 col-xl-12 float-left" type="text" name="nome" placeholder="Nome..." value="<?= $current_user->user_firstname;  ?> <?= $current_user->user_lastname ;  ?>">
                    </div>
                    
          
                </div>
                <div class="col-lg-6 p-0 m-0 pl-lg-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input class="form-control col-lg-12 float-right" type="text" name="email" placeholder="E-mail" value="<?= $current_user->user_email;?> "> 
                    </div>
                </div>
            </div>
            <input class="form-control mt-2 mb-2" type="text" name="titulo" placeholder="Título...">
            <textarea name="mensagem" placeholder="Mensagem..." class="form-control" id="" cols="30" rows="10"></textarea>
            <input type="hidden" name="send">
            <div class="mt-2">
                <button type="reset" class="btn btn-danger float-left col-lg-5 col-sm-5 col-md-5">Limpar</button>
                <button type="submit" class="btn btn-primary float-right col-lg-5 col-sm-5 col-md-5">Enviar</button>
                
            </div>
        </form>
    </div>