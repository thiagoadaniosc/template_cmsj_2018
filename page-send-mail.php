<?php

if ($current_user->roles[0] !== 'administrator') {
    header('Location: /');
}
/*
if (isset($_GET['send'])) {
    $nome = isset($_GET['nome']) ? $_GET['nome'] : 'Teste';
    $email = isset($_GET['email']) ? $_GET['email'] : 'Teste';
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : 'Teste';
    $mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : 'Teste';
    store_mensage($nome, $email, $titulo, $mensagem);
}*/
?>
<?php get_header() ?>
<style>
    body{
        /* background-color: #EEEEEE; */
        
        background-image: url('<?= TEMPLATE_URI ?>/imgs/cmsj.png');
        background-repeat: repeat-y;
        background-attachment: fixed;
        background-size: cover;
    }
    .ms-search input{
        height:30px !important;
    }
</style>
<main class="row col-lg-12 pl-lg-5 pr-lg-5 p-sm-0 p-md-0 justify-content-center ml-auto mr-auto">
<script src="<?= TEMPLATE_URI ?>/js/tinymce/tinymce.min.js"></script>
<script src="<?= TEMPLATE_URI ?>/js/tinymce/langs/pt_BR.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="col-lg-12 p-0">
        <nav class="breadcrumb rounded-0 col-xl-5 col-lg-8 m-auto bg-white" style="border-left: 6px solid rgb(66, 107, 194); border-right: 6px solid rgb(66, 107, 194);">
            <a class="breadcrumb-item" href="/">Home</a>
            <span class="breadcrumb-item active"><?php the_title(); ?></span>
        </nav>
    </div>
<div class="bg-white col-xl-5 col-lg-8 pt-4 pb-4 mt-4 justify-content-center" style="border-left: 6px solid rgb(66, 107, 194); border-right: 6px solid rgb(66, 107, 194);">
    
        <h4 class="text-center col-lg-12 text-dark text-uppercase"><?php the_title(); ?></h4>
        <hr class="col-lg-2 col-xl-2 col-md-5 col-sm-5 bg-primary">
        <p class="text-center"> Preencha os campos abaixo para enviar uma mensagem para todos os usuários.<br>
           <!-- <small>
                Envie sua Crítica ou Sugestões
            </small>
            -->
        </p>        
        <form class="form-group col-xl-10 col-lg-12 m-auto" action="/?action=email" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Enviar E-mails ?')">
        <?php if(isset($_GET['success'])) : ?>
            <div class="alert alert-primary alert-dismissible fade show  col-lg-12 m-auto" role="alert">
                <small>Mensagem enviada para: <b><?= $_GET['success']; ?>  E-mail's </b></small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php 
            $users = get_users();
            //var_dump(get_user_meta($users[0]->ID));
        ?>
        <select multiple placeholder="E-mails" name="mails[]">
        <?php
        foreach ($users as $user) : 
            $user_id = $user->ID;
            $user_login = $user->user_login;
            $user_mail = $user->user_email;
            $user_meta = get_user_meta($user->ID);
            $user_name = $user_meta['adi_displayname'][0];
            $user_first_name = $user_meta['first_name'][0];
            $user_departament = $user_meta['adi_department'][0];
            if (empty($user_mail) || $user_meta['adi_user_disabled'][0] == 1) {
                continue;
            }
        ?>
        <!-- <optgroup label="TI">  </optgroup> -->
            <?php if (empty($user_name)):  ?>
                <option value="<?= $user_id; ?>"><?= $user->display_name; ?> - Outros</option>
            <?php else: ?>
                <option value="<?= $user_id; ?>"><?= $user_name; ?> - <?= $user_departament; ?></option>
        <?php endif; ?>
       
            
        <?php endforeach; ?>
        
        </select>
        <script src="<?= TEMPLATE_URI ?>/js/multiple-select.js"></script>
        <script>
             $("select").multipleSelect({
            width: '100%',

            filter: true,
            placeholder: "Selecione os e-mails."
        });
        </script>
        <input type="hidden" name="action" value="email">
            <input class="form-control mt-2 mb-2" type="text" name="subject" placeholder="Assunto" required>
            <textarea name="body" placeholder="Mensagem..." class="form-control" id="" cols="30" rows="10"></textarea>
            <input type="file" name="file">
            <br>
            <small>
                Variaveis diponíveis:
                <ul>
                    <li>{$user_mail}</li>
                    <li>{$user_login}</li>
                    <li>{$user_name}</li>
                    <li>{$user_first_name}</li>
                </ul>
                
            </small>
            <div class="mt-2">
                <button type="reset" class="btn btn-danger float-left col-lg-5 col-sm-5 col-md-5">Limpar</button>
                <button type="submit" class="btn btn-primary float-right col-lg-5 col-sm-5 col-md-5">Enviar</button>
                
            </div>
            
        </form>
    </div>
</main>
<?php get_footer() ?>