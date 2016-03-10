<?php
/**
 * Template principal do tema.
 *
 * Arquivo mais genérico de um tema do WordPress.
 * É um dos dois arquivos obrigatórios de um tema (o outro sendo o style.css).
 * É o template utilizado se nenhuma página mais específica for encontrada.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UndePress
 */

get_header(); ?>

	<div id="primary" class="container">
		<main id="main" class="row" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', get_post_format() );	?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
