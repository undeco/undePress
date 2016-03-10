<?php
/**
 * Funções e definições do tema.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UndeTheme
 */


/*
 * Define funções básicas do tema.
 ................................................. */

if ( ! function_exists( 'undepress_setup' ) ) :

function undepress_setup() {

	load_theme_textdomain( 'undepress', get_template_directory() . '/source/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );

	register_nav_menus( array(
		'principal' => esc_html__( 'Menu Principal', 'undepress' ),
	) );
}
endif; // undepress_setup
add_action( 'after_setup_theme', 'undepress_setup' );



/*
 * Define largura máxima de embeds.
 ................................................. */

function undepress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'undepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'undepress_content_width', 0 );



/*
 * Define áreas padrão de Widgets.
 ................................................. */

function undepress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'undepress' ),
		'id'            => 'main-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'undepress_widgets_init' );
 
// test agora

/*
 * Carrega os estilos e scripts padrão do tema.
 ................................................. */

function undepress_scripts() {

	// Carrega o CSS e JS (minificado) com dependências declaradas pelo Bower através do Grunt
	wp_enqueue_style( 'undepress-style', get_stylesheet_uri() );
	wp_enqueue_script( 'undepress-default', get_template_directory_uri() . '/dist/js/undepress.min.js', array('jquery'), '1.11.2', true );

	// Alguém ainda usa comentários em páginas?
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'undepress_scripts' );



/*
 * Carrega arquivos a serem incorporados.
 * Útil para deixar o código enxuto.
 ................................................. */

require get_template_directory() . '/includes/navigation.php';
require get_template_directory() . '/includes/post-types.php';
require get_template_directory() . '/includes/taxonomies.php';
require get_template_directory() . '/includes/template-tags.php';
require get_template_directory() . '/includes/acf-call.php';