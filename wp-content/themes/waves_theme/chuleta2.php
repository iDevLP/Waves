<!-- Revisión de codex -->
https://codex.wordpress.org/es:The_Loop_in_Action

<!-- LLAMADO A TITULO DEL SITIO ++++++++++++ -->
<title><?php bloginfo('name'); ?></title>

<!-- LLAMADO A HOJA DE ESTILOS CSS ++++++++++++ -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
<!-- LLAMADO A HOJA DE ESTILOS CSS ++++++++++++ -->
<link rel="stylesheet" href="<?php echo get_theme_file_uri( 'style.css' ); ?>">

<!-- HOOK PLUGINS ++++++++++++++++++++++++++++++++++ -->
<?php wp_head(); ?>
<?php wp_footer(); ?>

<!-- BARRA DE NAVEGACIÓN WORDPRESS -->
<ul>
	<li>
		<?php wp_list_pages( 'title_li=&depth=1' ); ?>
	</li>
</ul>

<!-- BARRA DE NAVEGACIÓN WORDPRESS BOOTSTRAP ++++++++++++++++++++++++++++++++  -->
<?php $custom_logo = wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'medium' ); ?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-la">
<a href="<?php echo home_url(); ?>"><?php echo $custom_logo ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<?php
	wp_nav_menu( array(
	'theme_location'  => 'menu',
	'depth'           => 2,
	'container'       => 'div',
	'container_id'    => 'navbarSupportedContent',
	'container_class' => 'collapse navbar-collapse',
	'menu_class'      => 'nav navbar-nav ml-auto',
	'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	'walker'          => new WP_Bootstrap_Navwalker()
	) );
?>
</nav>


<!--LLAMADO DE HEADER, SIDEBAR Y FOOTER EN PAGINAS ++++++++++++++++++++++++++++++++  -->
<?php get_header(); ?>
<?php get_sidebar();?>
<?php get_footer(); ?>


<!-- LLAMADO DE LOOP DE ENTRADA O PAGINA  ++++++++++++++++++++++++++ -->

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?> 
			
<?php endwhile; ?>	
<?php else : ?>  
<?php endif; ?>
<?php wp_reset_query(); ?>

<!-- ELEMENTOS DEL LOOP +++++++++++++++++++++++++++ -->
<?php the_title(); ?> <!-- llamado de titulo -->
<?php the_content(); ?> <!-- llamado de contenido -->
<?php the_time('F jS, Y'); ?> <!-- llamado de fecha -->
<?php the_excerpt(); ?> <!-- llamado de resumen -->
<?php the_category(); ?> <!-- llamado de categoria -->
<?php the_author(); ?> <!-- llamado de autor -->
<a href="<?php the_permalink() ?>"> <!-- mostrar contenido de la entrada en single page -->
<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?> <!-- mostarar imagen miniatura -->


<!-- CREAR UN FILTRO A LA ENTRADA MEDIANTE Query posts del loop de wordpress +++++++++++++++++++++++++++ -->
<?php query_posts(""); ?>

<!-- Valores del Query ... se separan los datos mediante símbolo &-->
showposts=3 <!-- cantidad de entradas -->
category_name=noticias <!-- filtro de categorias a mostrar -->
offset=1 <!-- saltar entrada de categoría -->
cat=13 <!-- ID de categoría -->
tag=apples+oranges <!-- mostrar entradas con tags -->
paged=$paged <!-- mostrar y hacer funcionar plugin paginación -->

<!-- LLAMANDO ARCHIVOS DE IMAGEN O VIDEO DEL TEMPLATE -->
<?php bloginfo('template_url'); ?>

<!-- LLAMANDO ARCHIVOS PHP DEL TEMPLATE -->
<?php bloginfo('url'); ?>


<!-- NAVEGACIÓN ENTRE POST-->
<?php endwhile; ?>

<!-- PAGINACIÓN 01 -->
<h5 class="text-left"><?php previous_post_link(' %link','&laquo Anterior','1') ?></h5>								
<h5 class="text-left"><a href="<?php the_permalink(); ?>/noticias">info</a></h5>
<h5 class="text-left"><?php next_post_link('%link ','Siguiente &raquo','1') ?></h5>

<!-- PAGINACIÓN 02 -->
<?php wp_pagenavi(); ?>

	
<?php else : ?>
<!-- sino encuentro -->
<h5>UPS!... lo buscas no se encuentra disponible</h5>

<?php endif; ?>


<!-- Conectar pagina de wordpress con una pagina template de php ++++++++++++++++++ -->
<?php
/*
Template Name: Nombre de la pagina a mostrar cuando se crea la pagina en wordpress
*/
?>

<!-- CSS ++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

/* 
Theme Name: Nombre Tema
Theme URI: www.misite.cl
Description: descripcion del tema
Version: 1
Author: auto
Author URI: direccion web autor
*/



<!--MULTIPLES SINGLE PAGE ++++++++++++++++++++++++++++++++++++++++++ -->

<?php
$post = $wp_query->post;
if ( in_category('noticias') ) {
include(TEMPLATEPATH . '/single_notcias.php'); } 
elseif ( in_category('productos') ) {
include(TEMPLATEPATH . '/single_productos.php'); }
elseif ( in_category('servicios') ) {
include(TEMPLATEPATH . '/single_servicios.php'); }
else {
include(TEMPLATEPATH . '/single_default.php');
}
?>



<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ARCHIVO FUNCTIONS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php


// ===========
// = CONEXIÓN A ESTILOS GRÁFICOS CSS =
// ===========
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,'1.1','all');

// ===========
// = LOGO DESDE WORDPRESS =
// ===========
add_theme_support( 'custom-logo', array(
	'height'      => 300,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

// ===========
// = MENU =
// ===========

// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

add_theme_support( 'nav-menus' );
register_nav_menus(array('menu' => __('menu')));
register_nav_menus(array('menu-footer' => __('menu-footer')));

/* FIN MENU */





// ===================
// = Post-thumbnails =
// ===================

add_theme_support( 'post-thumbnails' );

the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
the_post_thumbnail( 'large' ); // Large resolution (default 1024px x 1024px max)
the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
the_post_thumbnail( array( 100, 100 ) ); // Other resolutions (height, width)

?>





<!-- SEARCH +++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<!-- mostrar titulo de resultado - en caso de que no se encuentre nada --> 
<?php $s=get_search_query(); $args = array( 's' =>$s );					
	// The Query
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) { _e("<h2 style='font-weight:bold;color:#000'>Los resultados para: ".get_query_var('s')."</h2>");
	while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
<?php } }else{ ?>
	<h2 style='font-weight:bold;color:#000'>No encontramos nada</h2>
	<div class="alert alert-info">
		<p>lo sentimos, no encontramos nada con ese criterio... busca otas palabras</p>
	</div>
<?php } ?>

<!-- Buscador formulario -->
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" placeholder="Buscar…" value="<?php the_search_query(); ?>" name="s" id="s" />
	<button type="submit" class="icon-only" id="searchsubmit"><i class="fa fa-search"></i></button>		
</form>


<!-- SIDEBAR ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- Colocar esto en Function -->
<?php
	
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'			=> 'sidebar', // Nombre que se verá en Wordpress
		'id' 			=> 'sidebar', // nombre para llamarlo
		'before_widget' => '<div class="side-nav aside_offscreen">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class="widgettitle">',
		'after_title' 	=> '</h2>',
	))};
?>

<!-- Colocar esto donde se quiere mostrar -->
<?php dynamic_sidebar( '' ); ?> <!-- nombre ID entre comillas simples -->

<!-- Colocar sidebar si esta disponible-->
<?php if ( is_active_sidebar( '' ) ) { ?>
	<?php dynamic_sidebar( '' ); ?>
	<?php }
?>


<!-- MOSTRAR CATEGORIAS +++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- MOSTRAR CATEGORÍAS DE ENTRADAS -->
<?php the_category(); ?>

<!-- MOSTRAR LA CATEGORÍA QUE SE MUESTRA EN LA PAGINA CON CATEGORÍA -->
<?php printf( __( 'Categoría: %s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );?>


<!-- MOSTRAR TAGS ++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- MOSTRAR TAGS DE ENTRADAS -->
<?php the_tags(); ?>

<!-- MOSTRAR EL TAG QUE SE MUESTRA EN LA PAGINA CON TAG -->
<?php printf( __( 'Tag: %s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );?>


<!-- COMENTARIOS ++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<!-- Agregar en el head -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!-- EDITAR ESTETICA DE COMENTARIOS EN FUNCTIONS.PHP -->
<?php	
//Modificar los campos Autor, Email y Sitio web del formulario de comentarios
function apk_modify_comment_fields( $fields ) {
	
	//Variables necesarias para que esto funcione
    $commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(

	  'author' =>
	    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30"' . $aria_req . ' placeholder="' . __('Tu nombre', 'apk') . '" />', //Editamos el campo autor
	
	  'email' =>
	    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"' . $aria_req . ' placeholder="' . __('Tu email', 'apk') . '" />', //Editamos el campo email
	
	  'url' =>
	    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	    '" size="30" placeholder="' . __('Tu sitio web', 'apk') . '"  />', //Editamos el campo sitio web
	); 
	return $fields;	
}
add_filter('comment_form_default_fields', 'apk_modify_comment_fields');
?>

<!-- MOSTRAR EL FORMULARIO DE COMENTARIOS -->
<?php comments_template(); ?>

<!-- MOSTRAR EL LISTADO DE COMENTARIOS -->
<?php wp_list_comments(); ?>



