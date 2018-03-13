<div class=" bg-white justify-content-center row p-0 m-0 loader"  style="width: 100%; height: 100%; z-index:99; position:absolute; top:0;">
        <img src="<?= TEMPLATE_URI ?>/imgs/Preloader_2.gif" class="m-auto mt-0" alt="">
</div>
<?php get_header(); ?>
<main class="row col-lg-12 pl-lg-5 pr-lg-5 p-sm-0 p-md-0 justify-content-center ml-auto mr-auto ">
    <style>
		body{
			/* background-color: #EEEEEE; */
            
            background-image: url('http://127.0.0.1/wp-content/uploads/2017/09/cmsj.png');
            background-repeat: repeat-y;
            background-attachment: fixed;
            background-size: cover;
            
        }
	</style>
    <div class="bg-white pb-4" style="box-shadow:rgba(0,0,0,.2) 0 4px 16px; overflow: auto">    
        <h4 class="text-center col-lg-12 bg-dark text-white p-2">Lista de Servidores</h4>
        <?php 
        $order = isset($_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 0;   ?>
        
        <table id="servidores-table" data-order='[[ <?= $order ?>, "asc" ]]' class="table table-striped table-bordered justify-content-center m-auto" cellspacing="0" width="100%">
            
            
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Local</th>
                    <th>Email</th>
                    <th>Departamento</th>
                    <th>Ramal</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                
                <!-- LDAP -->
                <?php 
                setlocale(LC_ALL, 'pr_BR');
                $ldap_server = 'ad.cmsj.sc.gov.br';
                $ldapport = 389;
                $dn="DC=ad,DC=cmsj,DC=sc,DC=gov,DC=br";
                $user= base64_decode("c3Vwb3J0ZTE=");
                $pass= base64_decode("c3Vwb3J0QDgxMDI=");
                
                // Tenta se conectar com o servidor
                //try {
                    $connect = ldap_connect($ldap_server, $ldapport) or die('erro');
                    ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
                    ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
                    
                    
                    if($connect != null) {
                        
                        if ($result = ldap_bind($connect, 'AD-CMSJ\\' . $user, $pass)) {
                            
                            
                            
                            
                            $filter = AD_FILTER;
                            
                            $res = ldap_search($connect, $dn, $filter);
                            
                            $entries = ldap_get_entries($connect, $res);
                            // var_dump($entries);
                            
                            foreach ($entries as $users) {
                                if ($users['cn'][0] == null){
                                    continue;
                                }                                         
                                ?>
                                <!-- LDAP -->
                                
                                <tr>
                                    <td><?= $users['cn'][0]; ?></td>
                                    <td><?= $users['description'][0];  ?></td>
                                    <td><?= $users['mail'][0]; ?></td>
                                    <td><?= $users['department'][0];  ?></td>
                                    <td><?= $users['telephonenumber'][0]; ?></td>
                                    <td><?=  iconv('UTF-8','ISO-8859-1', $users['title'][0]); ?></td>
                                </tr>
                                
                                <?php 
                                
                                
                                
                                
                            }
                            
                            
                        }
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            var table = $('#servidores-table').DataTable( {
                lengthChange: true,
                buttons: [
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
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
                    "sSearch": "Pesquisar",
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
        } );
    </script> 
    
    <?php get_footer(); ?>