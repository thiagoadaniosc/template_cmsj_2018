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
                <th scope="col text-center">Status</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php while($mensage = $mensages->fetch_assoc()) : ?>
            <tr>
                <form action="/?action=edit_contato" method="POST">
                    <input type="hidden" name="id" value="<?= $mensage['id'] ?>">
                    <th class="d-none" scope="row"><?=$mensage['id']?></th>
                    <td><?=$mensage['user_name']?></td>
                    <td><?=$mensage['email']?></td>
                    <td><?=$mensage['titulo']?></td>
                    <td><?=$mensage['mensagem']?></td>
                    <td class="">
                        <?php $status = $mensage['status']; ?>
                        <?php if($status == "Novo"): ?>
                        <span class="badge badge-secondary"><?=$status?></span>
                        <?php elseif ($status == "Processando"): ?>
                        <span class="badge badge-primary"><?= $status ?></span>
                        <?php elseif($status == "Concluido") : ?>
                        <span class="badge badge-success"><?= $status ?></span>
                        <?php else : ?>
                        <span class="badge badge-danger"><?= $status?></span>
                        <?php endif; ?>

                    </td>
                    <td scope="col">
                    <select name="status">
                    <?php if($status == "Novo"): ?>
                        <option selected value="Novo">Novo</option>
                        <option value="Processando">Processando</option>
                        <option value="Concluido">Concluido</option>
                        <option value="Descartado">Descartado</option>
                        <?php elseif ($status == "Processando"): ?>
                        <option value="Novo">Novo</option>
                        <option selected value="Processando">Processando</option>
                        <option value="Concluido">Concluido</option>
                        <option value="Descartado">Descartado</option>
                        <?php elseif($status == "Concluido") : ?>
                        <option value="Novo">Novo</option>
                        <option value="Processando">Processando</option>
                        <option selected value="Concluido">Concluido</option>
                        <option value="Descartado">Descartado</option>
                        <?php else : ?>
                        <option value="Novo">Novo</option>
                        <option value="Processando">Processando</option>
                        <option value="Concluido">Concluido</option>
                        <option selected value="Descartado">Descartado</option>
                    <?php endif; ?>
                    </select>      
                    <button type="submit" style="height: 23px" class="badge-primary badge border-0 p-1 m-0"> <i class="fa fa-edit"></i> Alterar</button>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>