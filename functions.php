<?php
// Theme Supports

is_explorer();
global $current_user; get_currentuserinfo();

define('TEMPLATE_URI', get_template_directory_uri());
define('AD_USER', base64_decode("c3Vwb3J0ZTE="));
define('AD_PASS', base64_decode("c3Vwb3J0QDgxMDI="));
define('SUPORTE_URI', 'http://suporte.cmsj.info');
define('COMUNICADOS_URI', '/comunicados');
define('NOTICIAS_URI', '/comunicados');
define('FOLHAWEB_URI', 'http://192.168.4.23:8080');	
define('RAMAIS_URI', '/ramais');
define('DOM_URI', 'https://www.diariomunicipal.sc.gov.br/site/');
define('CLIPAGEMDIGITAL_URI', 'http://clipagem.cmsj.info/visitante?username=' . $current_user->user_login  );
define('CONFIGURACOES_URI', '/wp-admin/profile.php');
define('AD_FILTER', '(&(objectCategory=person)(objectClass=user)(samaccountname=*)(!(UserAccountControl:1.2.840.113556.1.4.803:=2))(!(cn=*Admin*))(!(cn=*teste*))(!(cn=*VM*))(!(cn=*Suporte*)))');
//define('AD_FILTER_RAMAIS', '(groupOfUniqueNames=*)');
//define('AD_FILTER_RAMAIS', '(&(objectClass=organizationalUnit)((ou:dn:=Evil))');
//define('AD_FILTER_RAMAIS', '(&(objectCategory=organizationalUnit)(description=123))');
//define('AD_FILTER_RAMAIS', '(&(objectCategory=group)(description=*))');
//define('AD_FILTER_RAMAIS', '(&(objectCategory=group)(member=CN=Admin Lancer,OU=Empresas,OU=Colaboradores,OU=CMSJ,DC=ad,DC=cmsj,DC=sc,DC=gov,DC=br))');
//define('AD_FILTER_RAMAIS', '(&(objectClass=group)(&(ou:dn:=Colaboradores)))');
define('AD_FILTER_RAMAIS', '(&(objectCategory=group)(CN=*))');
add_post_type_support( 'page', 'excerpt' );

//  Registando Menus
register_nav_menus(
	array(
		'menu_topo' => 'Menu de Cabeçalho',
		'menu_aside' => 'Menu de Lateral',
	)
);

// Registrando Sidebar
/*
register_sidebar( array(
	'name'          => 'home_sidebar',
	'description'   => 'Home Sidebar',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h4 class="widgettitle text-center">',
	'after_title'   => "</h4>\n", )
);
*/
//----------------------

function is_explorer(){
	$user_agent =  $_SERVER['HTTP_USER_AGENT'];
	if (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) {
		//echo 'Internet Explorer';
		echo'
		<h1 style="text-align:center; color:#FFF; width:500px; height:auto; border-radius:10px 10px 10px 10px; padding:5px 5px 5px 5px; background-color:#045CAA; margin:0 auto; margin-top:150px;">Esse navegador está bloqueado para acessar esse sistema.<br/></h1>';
		echo '<p style="text-align:center; color:#ba0707"> Por favor utilize um navegador atualizado. </p>';
		echo '<p style="text-align:center"> <a href="https://www.google.com.br/chrome/index.html">Baixar Google Chrome</a> </p>';
		echo '<p style="text-align:center"> <a href="https://www.google.com.br">< Voltar</a> </p>';
		exit;
	}
}


function post_type_comunicados(){
	$labels = array(
		'name' => 'Comunicados',
		'singular_name' => 'Comunicado',
		'add_new_item' => 'Adicionar novo Comunicado',
		'add_new' => 'Novo Comunicado'
	);
	register_post_type( 'comunicados', 
		array(
			'labels' => $labels, 
			'public' => true,
			'has_archive' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
			'taxonomies' => array('post_tag'),
			'capabilities' => array(
				'edit_post'          => 'edit_comunicado', 
				'read_post'          => 'read_comunicado', 
				'delete_post'        => 'delete_comunicado', 
				'edit_posts'         => 'edit_comunicados', 
				'edit_others_posts'  => 'edit_others_comunicados', 
				'publish_posts'      => 'publish_comunicado',       
				'read_private_posts' => 'read_private_comunicado', 
				'create_posts'       => 'create_comunicados', 
			),
			//'capability_type' => array('noticias', 'noticia')
		)

	);
}

function post_type_ramais(){
	$labels = array(
		'name' => 'Ramais',
		'singular_name' => 'Ramal',
		'add_new_item' => 'Adicionar novo Ramal',
		'add_new' => 'Novo Ramal'
	);
	register_post_type('ramais', 
		array(
			'labels' => $labels, 
			'public' => true,
			'has_archive' => true,
			'supports' => [''],
			//'capability_type' => ['ramais', 'ramal'],
			
			//'taxonomies' => array('post_tag'),
			'capabilities' => array(
				'edit_post'          => 'edit_ramal', 
				'read_post'          => 'read_ramal', 
				'delete_post'        => 'delete_ramal', 
				'edit_posts'         => 'edit_ramais', 
				'edit_others_posts'  => 'edit_others_ramais', 
				'publish_posts'      => 'publish_ramais',       
				'read_private_posts' => 'read_private_ramais', 
				'create_posts'       => 'create_ramais', 
			)
			//'capability_type' => array('ramal', 'ramais'),
		)

	);
}


function post_type_informatica(){
	$labels = array(
		'name' => 'Informática',
		'singular_name' => 'Informática',
		'add_new_item' => 'Adicionar novo informativo - Informática',
		'add_new' => 'Adicionar - Informática'
	);
	register_post_type( 'informatica', 
		array(
			'labels' => $labels, 
			'public' => true,
			'menu_icon' => 'dashicons-laptop',
			'has_archive' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
			'capabilities' => array(
				'edit_post'          => 'edit_informatica', 
				'read_post'          => 'read_informatica', 
				'delete_post'        => 'delete_informatica', 
				'edit_posts'         => 'edit_informatica', 
				'edit_others_posts'  => 'edit_others_informatica', 
				'publish_posts'      => 'publish_informatica',       
				'read_private_posts' => 'read_private_informatica', 
				'create_posts'       => 'edit_informatica', 
			),
			//'capability_type' => array('informatica', 'informatica') 
		) 

	);
}
/*

function post_type_adm(){
	$labels = array(
		'name' => 'Administração',
		'singular_name' => 'Administração',
		'add_new_item' => 'Adicionar novo informativo - Administração',
		'add_new' => 'Adicionar - Administração'
	);
	register_post_type( 'administracao', 
		array(
			'labels' => $labels, 
			'public' => true,
			'menu_icon' => 'dashicons-groups',
			'has_archive' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
			'capabilities' => array(
				'edit_post'          => 'edit_administracao', 
				'read_post'          => 'read_administracao', 
				'delete_post'        => 'delete_administracao', 
				'edit_posts'         => 'edit_administracao', 
				'edit_others_posts'  => 'edit_others_administracao', 
				'publish_posts'      => 'publish_administracao',       
				'read_private_posts' => 'read_private_administracao', 
				'create_posts'       => 'edit_administracao', 
			),

			//'capability_type' => array('administracao', 'administracao') 
		) 

	);
}

function post_type_rh(){
	$labels = array(
		'name' => 'Recursos Humanos',
		'singular_name' => 'Recursos Humanos',
		'add_new_item' => 'Adicionar novo informativo - Recursos Humanos',
		'add_new' => 'Adicionar - RH'
	);
	register_post_type( 'rh', 
		array(
			'labels' => $labels, 
			'public' => true,
			'menu_icon' => 'dashicons-universal-access-alt',
			'has_archive' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
			'capabilities' => array(
				'edit_post'          => 'edit_rh', 
				'read_post'          => 'read_rh', 
				'delete_post'        => 'delete_rh', 
				'edit_posts'         => 'edit_rh', 
				'edit_others_posts'  => 'edit_others_rh', 
				'publish_posts'      => 'publish_rh',       
				'read_private_posts' => 'read_private_rh', 
				'create_posts'       => 'edit_rh', 
			),
			//'capability_type' => array('rh', 'rh')
		)

	);
}
*/
function post_type_galeria(){
	$labels = array(
		'name' => 'Galeria de Imagens',
		'singular_name' => 'Galeria de Imagens',
		'add_new_item' => 'Adicionar nova galeria de imagens',
		'add_new' => 'Adicionar nova galeria de imagens'
	);
	register_post_type( 'galeria', 
		array(
			'labels' => $labels, 
			'public' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'has_archive' => true,
			'supports' => ['title', 'thumbnail', 'excerpt'],
			'capabilities' => array(
				'edit_post'          => 'edit_galeria', 
				'read_post'          => 'read_galeria', 
				'delete_post'        => 'delete_galeria', 
				'edit_posts'         => 'edit_galeria', 
				'edit_others_posts'  => 'edit_others_galeria', 
				'publish_posts'      => 'publish_galeria',       
				'read_private_posts' => 'read_private_galeria', 
				'create_posts'       => 'edit_galeria', 
			)
			//'capability_type' => array('galeria', 'galeria') 
		) 

	);
}

function wordpress_pagination() {
	global $wp_query;

	$big = 999999999;
	if ($wp_query->max_num_pages > 1) {
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'prev_text' => __('Anterior'),
			'next_text' => __('Próxima'),
			'total' => $wp_query->max_num_pages,
			'type' => 'array'
		) );

		foreach ( $paginate_links as $pgl ) {
			echo "<li  class='page-item'> $pgl </li>";
		}
	}
}


function my_forcelogin_redirect() {
	return site_url( '/' );
}

function get_type($post_type){
	if ($post_type == "page"){
		return "Página";
	} elseif ($post_type == "post"){
		return "Notícias";
	} elseif ($post_type == "comunicados") {
		return "Comunicados";
	} else {
		return "Notícias";
	}

}

function get_month(int $numberMonth) {
	switch ($numberMonth) {
		case 1:
			return 'Janeiro';
		break;

		case 2:
			return 'Fevereiro';
		break;

		case 3 :
			return 'Março';
		break;

		case 4 :
			return 'Abril';
		break;

		case 5 :
			return 'Maio';
		break;

		case 6 :
			return 'Junho';
		break;

		case 7 :
			return 'Julho';
		break;

		case 8 :
			return 'Agosto';
		break;

		case 9 :
			return 'Setembro';
		break;

		case 10 :
			return 'Outubro';
		break;

		case 11 :
			return 'Novembro';
		break;
		
		case 12 :
			return 'Outubro';
		break;


	}
}

function possibly_redirect(){ 
	if (isset( $_GET['action'] )){  
		if ( in_array( $_GET['action'], array('lostpassword', 'retrievepassword', 'register') ) ) {
        /*echo "
		<h2 style='text-align:center'>Esqueceu a Senha ?</h2>
        <p style='text-align: center'> Entre em contato com o setor de Tecnologia da informação pelo E-mail: <b>suporte@cmsj.sc.gov.br</b>, informando seu usuário e o problema. 
        </br>
        <a href='intranet.cmsj.sc.gov.br'> Voltar para Página Principal</a>		
        </p>		
        ";*/
        //echo "Não é possível fazer esta ação !";
        
        wp_redirect( '/' );
    }
}
}


function my_custom_fonts() {
	echo '<style>
    #wp-admin-bar-wp-logo{
		display: none !important;
	}
	#wp-admin-bar-new-post {
		display: none !important;
	}
	#wp-admin-bar-new-thc-events  {
		display: none !important;
	}
} 
</style>';
}
/*
function metabox_ramais( $meta_boxes ) {
	$prefix = 'prefix-ramais';

	$meta_boxes[] = array(
		'id' => 'metabox-ramais',
		'title' => esc_html__( 'Ramais', 'metabox-ramais' ),
		'post_types' => array( 'ramais' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'ramais_setor',
				'type' => 'text',
				'name' => esc_html__( 'Setor', 'metabox-ramais' ),
				'placeholder' => esc_html__( 'Setor', 'metabox-ramais' ),
			),
			array(
				'id' => $prefix . 'ramais_servidor',
				'type' => 'text',
				'name' => esc_html__( 'Ramal', 'metabox-ramais' ),
				'placeholder' => esc_html__( 'Ramal', 'metabox-ramais' ),
			),
		),
	);

	return $meta_boxes;
}
*/

function ad_get_group_users($cn){
	setlocale(LC_ALL, 'pt_BR');
	$ldap_server = 'ad.cmsj.sc.gov.br';
	$ldapport = 389;
	$dn="DC=ad,DC=cmsj,DC=sc,DC=gov,DC=br";
	 $user= base64_decode("c3Vwb3J0ZTE=");
	$pass= base64_decode("c3Vwb3J0QDgxMDI=");
	$connect = ldap_connect($ldap_server, $ldapport) or die('erro');
	ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
    if($connect != null) {
    	if ($result = ldap_bind($connect, 'AD-CMSJ\\' . $user, $pass)) {      
    		$filter = "(&(objectClass=user)(sAMAccountName=*)(memberof=$cn))";
    	    $res = ldap_search($connect, $dn, $filter);       
			$entries = ldap_get_entries($connect, $res);
			return $entries;
		
		}
	}
}

function ad_modify_entries($cn, $telephonenumber){
	setlocale(LC_ALL, 'pt_BR');
    $ldap_server = 'ad.cmsj.sc.gov.br';
 	$ldapport = 389;
    $dn="DC=ad,DC=cmsj,DC=sc,DC=gov,DC=br";
    $user= base64_decode("c3Vwb3J0ZTE=");
    $pass= base64_decode("c3Vwb3J0QDgxMDI=");
    $connect = ldap_connect($ldap_server, $ldapport) or die('erro');
    ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
    if($connect != null) {
		if ($result = ldap_bind($connect, 'AD-CMSJ\\' . $user, $pass)) {
			/*$username = 'thiagoas';
			$filter = "(samaccountname={$username})";
			echo $filter;
			$res = ldap_search($connect, $dn, $filter);
			$entries = ldap_get_entries($connect, $res);*/
			$entry['info'] = $telephonenumber;
			//ldap_modify($connect, "uid=thiagoas, cn=user,  DC=ad,DC=cmsj,DC=sc,DC=gov,DC=br", $entry);
			ldap_modify($connect, "$cn", $entry);
			//ldap_modify($connect, $dn, $entry);
			//var_dump($entries);
		}
	}

}

function add_new_roles(){
	//remove_role('rh');
	//remove_role('cms');
	add_role( 'rh', 'Recursos Humanos', array( 'read' => true, 'level_0' => true ));
	add_role( 'cms', 'Comunicação Social', array( 'read' => true, 'level_0' => true ));
	add_role( 'telefonistas', 'Telefonistas', array( 'read' => true, 'level_0' => true ));
}


//add_filter( 'rwmb_meta_boxes', 'metabox_ramais' );


function add_event_caps() {
	
	// Administrador Permissões

	$role = get_role( 'administrator' );
	// Ramais
/*	$role->add_cap( 'edit_ramal' ); 
	$role->add_cap( 'read_ramal' ); 
	$role->add_cap( 'delete_ramal' ); 
	$role->add_cap( 'edit_ramais' ); 
	$role->add_cap( 'edit_others_ramais' ); 
	$role->add_cap( 'publish_ramais' ); 
	$role->add_cap( 'read_private_ramais' ); 
	$role->add_cap( 'create_ramais' ); 
	*/
	// Comunicados
	$role->add_cap( 'edit_comunicado' ); 
	$role->add_cap( 'read_comunicado' ); 
	$role->add_cap( 'delete_comunicado' ); 
	$role->add_cap( 'edit_comunicados' ); 
	$role->add_cap( 'edit_others_comunicados' ); 
	$role->add_cap( 'publish_comunicados' ); 
	$role->add_cap( 'read_private_comunicados' ); 
	$role->add_cap( 'create_comunicados' ); 
	$role->add_cap( 'birthdays_list' );
	$role->add_cap('events');
	$role->add_cap('news');
	
	$role = get_role( 'cms' );

	$role->add_cap('news');
	$role->add_cap('edit_posts');
	$role->add_cap('read_posts');
	$role->add_cap('delete_posts');
	$role->add_cap('publish_posts');
	$role->add_cap('create_posts');
	$role->add_cap('edit_published_posts');
	$role->add_cap('delete_published_posts');
	$role->add_cap('read');
	// $role->remove_cap('events');
	
	
	$role = get_role( 'rh' );
	
	$role->add_cap( 'edit_posts' ); 
	$role->add_cap('read_posts');
	$role->add_cap( 'edit_comunicado' ); 
	$role->add_cap( 'read_comunicado' ); 
	$role->add_cap( 'delete_comunicado' ); 
	$role->add_cap( 'edit_comunicados' ); 
	$role->add_cap( 'edit_others_comunicados' ); 
	$role->add_cap( 'publish_comunicados' ); 
	$role->add_cap( 'read_private_comunicados' ); 
	$role->add_cap( 'create_comunicados' );
	$role->add_cap('birthdays_list');
	$role->add_cap('events');
	$role->add_cap('read');

	$role->add_cap('read_posts');
	$role->add_cap('delete_posts');
	$role->add_cap('publish_posts');
	$role->add_cap('create_posts');
	$role->add_cap('edit_published_posts');
	$role->add_cap('delete_published_posts');
	$role->add_cap('read');
	
	
	$role = get_role('subscriber');

	$role->remove_cap('edit_posts');
	$role->remove_cap('events');
	$role->remove_cap( 'birthdays_list' );
	$role->add_cap('read');
}

function get_last_clipagens() {
	$servidor = 'localhost';
    $usuario = base64_decode('cm9vdA==');
    $senha = base64_decode('cm9vdA==');
    $banco = 'clipagem_digital';
    
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($mysqli, "utf8");
    
    if(mysqli_connect_errno()) {
        echo ("Erro ao Conectar ao Banco de Dados");
        exit;
	}

	$query = "SELECT a.id_clipagem, c.titulo, c.veiculo, c.editoria, c.autor, c.data, c.pagina, c.tipo, c.tags, a.nome, a.ID FROM clipagens c, arquivos a where a.id_clipagem = c.ID order by a.id_clipagem DESC LIMIT 0,4";

	$results = $mysqli->query($query);
	
	return 	$results;
}

function get_last_tickets() {
	$servidor = 'localhost';
    $usuario = base64_decode('cm9vdA==');
    $senha = base64_decode('cm9vdA==');
    $banco = 'glpi';
    
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($mysqli, "utf8");
    
    if(mysqli_connect_errno()) {
        echo ("Erro ao Conectar ao Banco de Dados");
        exit;
	}

	$userid = get_glpi_id();

	$query = "SELECT id, users_id_recipient, name, status FROM glpi_tickets where users_id_recipient = '$userid' order by id DESC LIMIT 0,4";

	$results = $mysqli->query($query);	
	return 	$results;
}

function get_glpi_id(){
	$servidor = 'localhost';
    $usuario = base64_decode('cm9vdA==');
    $senha = base64_decode('cm9vdA==');
    $banco = 'glpi';
    
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($mysqli, "utf8");
    
    if(mysqli_connect_errno()) {
        echo ("Erro ao Conectar ao Banco de Dados");
        exit;
	}

	$current_user = wp_get_current_user();
	$username = $current_user->user_login;

	$query = "SELECT id, name FROM glpi_users where name = '$username'";

	$results = $mysqli->query($query);
	$userid;
	foreach($results as $user){
		$userid = $user['id'];
		continue;
	}
	return 	$userid;
}

function get_glpi_status($statusID) {
	if ($statusID == 1) {
		return '<span class="badge badge-danger">Novo</span>';
	} else if ($statusID == 2 || $statusID == 3){
		return '<span class="badge badge-secondary">Processando</span>';
	} else if ($statusID == 4){
		return '<span class="badge badge-warning">Pendente</span>';
	} else if ($statusID == 5){
		return '<span class="badge badge-success">Solucionado</span>';
	} else {
		return '<span class="badge badge-dark">Fechado</span>';
	}
}

function store_mensage($nome, $email, $titulo, $mensagem){
	/*
	use wordpress;
	CREATE TABLE wp_mensagens (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    titulo varchar(255) NOT NULL,
    mensagem TEXT NOT NULL
)
	*/
	$servidor = 'localhost';
    $usuario = base64_decode('cm9vdA==');
    $senha = base64_decode('cm9vdA==');
    $banco = 'wordpress';
    
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($mysqli, "utf8");
    
    if(mysqli_connect_errno()) {
        echo ("Erro ao Conectar ao Banco de Dados");
        exit;
	}

	$query = "INSERT INTO wp_mensagens (user_name, email, titulo, mensagem) VALUES ('$nome','$email','$titulo','$mensagem')";
	echo $query;
	if($mysqli->query($query) == true){
		header('Location: /contato?success');
	} else {
		header('Location: /contato?fail');
	}

	exit;
}

function show_mensages(){
	$servidor = 'localhost';
    $usuario = base64_decode('cm9vdA==');
    $senha = base64_decode('cm9vdA==');
    $banco = 'wordpress';
    
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($mysqli, "utf8");
    
    if(mysqli_connect_errno()) {
        echo ("Erro ao Conectar ao Banco de Dados");
        exit;
	}

	$query = "SELECT * FROM wp_mensagens";

	$results = $mysqli->query($query);
	
	return 	$results;
}

add_action( 'admin_init', 'add_event_caps');

add_action( 'init', 'add_new_roles');

add_filter('v_forcelogin_redirect', 'my_forcelogin_redirect', 10, 1);

add_filter('login_redirect', 'my_forcelogin_redirect', 10, 1);

add_action( 'init', 'post_type_comunicados');

//add_action( 'init', 'post_type_informatica');
//add_action( 'init', 'post_type_adm');
//add_action( 'init', 'post_type_rh');

//add_action( 'init', 'post_type_galeria');
//add_action( 'init', 'post_type_ramais');
add_theme_support( 'post-thumbnails', array('post', 'page', 'comunicados'));
add_action('init','possibly_redirect'); 
//add_action('admin_head', 'my_custom_fonts');

/*
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	add_menu_page( 'Sugestões', 'Sugestões', 'manage_options', 'myplugin/myplugin-admin-page.php', 'myplguin_admin_page', 'dashicons-tickets', 6  );
*/