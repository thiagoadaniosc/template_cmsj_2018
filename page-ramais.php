<?php get_header(); ?>
<div class="row justify-content-center p-0 m-0 loader"  style="width: 100%; height: 100%; z-index:99; position:absolute; top:0;">
    <div class="row col-lg-12 m-auto justify-content-center">
        <img src="<?= TEMPLATE_URI ?>/imgs/sao-jose-logo_black.png" class="m-auto mt-0" alt="">
    </div>
    <div>
        <img src="<?= TEMPLATE_URI ?>/imgs/Preloader_6.gif" class="mt-0 m-auto " alt="">
        <p style="position: relative; left:0 " class="text-dark"><b><i>Carregando...</i></b></p>   
    </div>
</div>
<main class="row col-lg-12 pl-lg-5 pr-lg-5 p-sm-0 p-md-0 justify-content-center ml-auto mr-auto"  ng-app="ramais" ng-controller="ramaisCtrl">
    <style>
		body{
			/* background-color: #EEEEEE; */
            
            background-image: url('<?= TEMPLATE_URI ?>/imgs/cmsj.png');
            background-repeat: repeat-y;
            background-attachment: fixed;
            background-size: cover;
        }
        
        h1 {
            display: none;
        }
    </style>
    
    <div class="bg-white pb-4 p-0 col-lg-12 row pl-0 pr-0 mr-0 ml-0 pt-3" style="box-shadow:rgba(0,0,0,.2) 0 4px 16px; overflow: auto"> 
        <div class="col-lg-12">
            <nav class="breadcrumb rounded-0">
                <a class="breadcrumb-item" href="/">Home</a>
                <span class="breadcrumb-item active"><?php the_title(); ?></span>
            </nav>
            <h4 class="text-center col-lg-12 bg-dark text-white p-2">Ramais</h4>
            <?php 
            $order = isset($_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 0;   ?>
            
            <table id="servidores-table" data-order='[[ <?= $order ?>, "asc" ]]' class="table table-bordered justify-content-center m-auto table-hover bg-white table-sm" cellspacing="0" width="100%">
                
                
                <thead>
                    <tr>
                        <th style="width:200px">Setor</th>
                        <th>Servidor (Nome)</th>
                        <th style="width:200px">Ramal</th>
                        <?php if($current_user->roles[0] == 'telefonistas' || $current_user->roles[0] == 'administrator'): ?>
                        <th style="width:100px">Opções</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    
                    <!-- LDAP -->
                    <?php 
                    setlocale(LC_ALL, 'pt_BR');
                    $ldap_server = 'ad.cmsj.sc.gov.br';
                    $ldapport = 389;
                    $dn="DC=ad,DC=cmsj,DC=sc,DC=gov,DC=br";
                    $user= AD_USER;
                    $pass= AD_PASS;
                    
                    // Tenta se conectar com o servidor
                    //try {
                        $connect = ldap_connect($ldap_server, $ldapport) or die('erro');
                        ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
                        ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
                        
                        
                        if($connect != null) {
                            
                            if ($result = ldap_bind($connect, 'AD-CMSJ\\' . $user, $pass)) {

                                $filter = AD_FILTER_RAMAIS;
                                
                                $res = ldap_search($connect, $dn, $filter);
                                
                                $entries = ldap_get_entries($connect, $res);
                                //var_dump($entries);
                                // var_dump($entries);
                                
                                foreach ($entries as $user) {
                                    if ($user['cn'][0] == null || $user['telephonenumber'][0] == null){
                                        continue;
                                    }
                                    ?>
                                    <!-- LDAP -->
                                        <tr class="<?=$user['samaccountname'][0];?>_tr">
                                      
                                            <td><?= $user['department'][0]; ?></td>
                                            <td align="left">
                                                
                                                <?= $user['cn'][0]; ?>
                                            </td>
                                            
                                            <?php if($current_user->roles[0] == 'telefonistas' || $current_user->roles[0] == 'administrator'): ?>
                                            <td> 
                                                <input type="text" ng-change="inputChange('telefone_<?=  $user['samaccountname'][0]; ?>', telefone_<?= $user['samaccountname'][0];?>)" ng-init="telefone_<?= $user['samaccountname'][0];?> = '<?=$user['telephonenumber'][0];?>'" ng-model="telefone_<?= $user['samaccountname'][0];?>" class="bg-transparent border" style="height:30px">
                                                <span ng-show="false" id="telefone_<?=  $user['samaccountname'][0]; ?>_span"><?= $user['telephonenumber'][0]; ?></span>
                                            </td>
                                            
                                            <td align="center"> 
                                               <!-- <a href="?username=<?= $user['samaccountname'][0];?>&telephonenumber={{telefone_<?= $user['samaccountname'][0];?>}}" name="<?= $user['samaccountname'][0]; ?>_link" class="badge badge-primary text-center m-auto"> <i class="fa fa-edit"></i>Editar</a> -->

                                                <a href ng-click="editar('<?= $user['samaccountname'][0]; ?>',telefone_<?= $user['samaccountname'][0];?>)" name="<?= $user['samaccountname'][0]; ?>_link" class="badge badge-primary text-center m-auto"> <i class="fa fa-edit"></i> Editar</a>

                                             </td>
                                            
                                            <?php else : ?>
                                            <td><?= $user['telephonenumber'][0]; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        
                                        <?php 

                                    }
                                    
                                    
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script>
           
            $(document).ready(function() {
                var table = $('#servidores-table').DataTable( {
                    <?php if($current_user->roles[0] == 'telefonistas' || $current_user->roles[0] == 'administrator'): ?>
                    lengthChange: false,
                    "lengthMenu": [[-1], [ "Todos"]],
                    <?php else: ?>
                    lengthChange: true,
                    "lengthMenu": [[20,50,100,-1], ["20","50","100", "Todos"]],
                    <?php endif; ?>
                    buttons: [
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    },
                    {
                        extend:    'excel',
                        text:      '<i class="fa fa-file-text-o"></i>',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-file-pdf-o"></i>',
                        titleAttr: 'PDF',
                        messageTop: '<h2 class="text-center bg-white">LISTA DE RAMAL</h2>',
                        autoPrint: true,
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    }
                    ],
                    "oLanguage": { 
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar Ramais: ",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                } );
   
                table.buttons().container()
                .appendTo( '#servidores-table_wrapper .col-md-6:eq(0)' );
                $('#servidores-table_filter input').addClass('col-lg-12 col-xl-12');
                $('#servidores-table_filter input').attr('placeholder', 'Nome, Ramal ou Setor...');

            } );

        </script> 

        <?php get_footer(); ?>