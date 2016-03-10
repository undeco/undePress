<?php
/**
 * Cabeçalho do tema.
 *
 * Além do previsto a ser carregado em um arquivo header, carrega a <div> principal (wrapper) de todo o site.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UndePress
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="navigation" role="banner">
	<div class="brand">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	</div>

	<nav role="navigation" class="fluid">
		
	<?php wp_nav_menu( array( 
		'container' 	 => '', 
		'theme_location' =ß> 'principal', 
		'menu_id' 		 => 'principal'
	) ); ?>

	</nav>
</header>

<?php if( is_front_page() ): ?>
<?php else: ?>
	<h1 class="internal-title"><?php echo get_the_title(); ?></h1>
<?php endif; ?>

<div id="init" class="fluid">