<?php
// Theme Supports

define('TEMPLATE_URI', get_template_directory_uri());

define('SUPORTE_URI', 'http://suporte.cmsj.info');
define('COMUNICADOS_URI', '/comunicados');
define('NOTICIAS_URI', '/comunicados');
define('FOLHAWEB_URI', 'http://192.168.4.10/folhaweb');	
define('RAMAIS_URI', '/servidores');
define('DOM_URI', 'https://www.diariomunicipal.sc.gov.br/site/');
define('CLIPAGEMDIGITAL_URI', 'http://clipagem.cmsj.info');
define('CONFIGURACOES_URI', '/wp-admin/profile.php');
define('AD_FILTER', '(&(objectCategory=person)(objectClass=user)(samaccountname=*)(!(UserAccountControl:1.2.840.113556.1.4.803:=2))(!(cn=*Admin*))(!(cn=*teste*))(!(cn=*VM*))(!(cn=*Suporte*)))');


add_post_type_support( 'page', 'excerpt' );

//  Registando Menus
register_nav_menus(
	array(
		'menu_topo' => 'Menu de Cabeçalho',
		'menu_aside' => 'Menu de Lateral',
	)
);

// Registrando Sidebar

register_sidebar( array(
	'name'          => 'home_sidebar',
	'description'   => 'Home Sidebar',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h4 class="widgettitle text-center">',
	'after_title'   => "</h4>\n", )
);

//----------------------



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

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text' => __('«'),
		'next_text' => __('»'),
		'total' => $wp_query->max_num_pages
	) );
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
		return "Outros";
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
		if ( in_array( $_GET['action'], array('lostpassword', 'retrievepassword') ) ) {
        /*echo "
		<h2 style='text-align:center'>Esqueceu a Senha ?</h2>
        <p style='text-align: center'> Entre em contato com o setor de Tecnologia da informação pelo E-mail: <b>suporte@cmsj.sc.gov.br</b>, informando seu usuário e o problema. 
        </br>
        <a href='intranet.cmsj.sc.gov.br'> Voltar para Página Principal</a>		
        </p>		
        ";*/
        include 'lost-pw.php';
        exit;
        //wp_redirect( '/wp-login.php' ); exit;
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

function add_new_roles(){
	add_role( 'rh', 'Recursos Humanos', array( 'read' => true, 'level_0' => true ));
	add_role( 'cms', 'Comunicação Social', array( 'read' => true, 'level_0' => true ));
	//remove_role('cms');
	//remove_role('rh');
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

	$role = get_role( 'cms' );

	$role->add_cap('edit_posts');
	$role->add_cap('read_posts');
	$role->add_cap('delete_posts');
	$role->add_cap('publish_posts');
	$role->add_cap('create_posts');
	$role->add_cap('edit_published_posts');
	$role->add_cap('delete_published_posts');

	$role = get_role( 'rh' );

	$role->add_cap( 'edit_comunicado' ); 
	$role->add_cap( 'read_comunicado' ); 
	$role->add_cap( 'delete_comunicado' ); 
	$role->add_cap( 'edit_comunicados' ); 
	$role->add_cap( 'edit_others_comunicados' ); 
	$role->add_cap( 'publish_comunicados' ); 
	$role->add_cap( 'read_private_comunicados' ); 
	$role->add_cap( 'create_comunicados' );
}

function get_last_clipagens() {
	$servidor = 'localhost';
    $usuario = 'root';
    $senha = 'root';
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
add_theme_support( 'post-thumbnails', array('post'));
add_action('init','possibly_redirect'); 
//add_action('admin_head', 'my_custom_fonts');
