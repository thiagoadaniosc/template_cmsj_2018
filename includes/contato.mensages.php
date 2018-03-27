<div class="col-lg-11 p-0">
        <nav class="breadcrumb rounded-0 col-lg-12 m-auto bg-white" style="border-left: 6px solid rgb(66, 107, 194); border-right: 6px solid rgb(66, 107, 194);">
            <a class="breadcrumb-item" href="/">Home</a>
            <span class="breadcrumb-item active"><?php the_title(); ?></span>
        </nav>
</div>
<div class="bg-white col-lg-11 pt-4 pb-4 mt-4 justify-content-center" style="border-left: 6px solid rgb(66, 107, 194); border-right: 6px solid rgb(66, 107, 194);">
    <?php 
        $mensages = show_mensages();
    ?>
    <h4 class="text-left col-lg-12 text-dark text-uppercase">Mensagens e Sugestões</h4>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col" class="d-none">#</th>
                <th scope="col">Autor</th>
                <th scope="col">E-mail</th>
                <th scope="col">Titulo</th>
                <th scope="col">Mensagem</th>
            </tr>
        </thead>
        <tbody>
            <?php while($mensage = $mensages->fetch_assoc()) : ?>
            <tr>
                <th class="d-none" scope="row"><?=$mensage['id']?></th>
                <td><?=$mensage['user_name']?></td>
                <td><?=$mensage['email']?></td>
                <td><?=$mensage['titulo']?></td>
                <td><?=$mensage['mensagem']?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>