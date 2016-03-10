<?php
/**
 * Miolo para exibir os resultados nas páginas de busca.
 * Nota: Requisitado pelo template search.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UndePress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php undepress_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php undepress_entry_footer(); ?>
	</footer>
</article>

