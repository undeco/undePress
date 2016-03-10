<?php
/**
 * Template padrão apra todas as páginas.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UndePress
 */

get_header(); ?>

	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; ?>

		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
