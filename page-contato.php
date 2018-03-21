<?php
if (isset($_GET['send'])) {
    $nome = isset($_GET['nome']) ? $_GET['nome'] : 'Teste';
    $email = isset($_GET['email']) ? $_GET['email'] : 'Teste';
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : 'Teste';
    $mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : 'Teste';
    store_mensage($nome, $email, $titulo, $mensagem);
}
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
</style>
<main class="row col-lg-12 pl-lg-5 pr-lg-5 p-sm-0 p-md-0 justify-content-center ml-auto mr-auto">
    <?php
        if (isset($_GET['show']) && ($current_user->roles[0] == 'administrator' || $current_user->roles[0] == 'cms')) {
            require('includes/contato.mensages.php');
        } else {
            require('includes/contato.form.php');
        }
    ?>
</main>
<?php get_footer() ?>