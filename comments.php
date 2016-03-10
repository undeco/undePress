<?php
/**
 * Template para exibir comentários.
 *
 * Este template contém a área onde os comentários serão exibidos e o formulário de comentários.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UndePress
 */

/*
 * Se o post é protegido por senha e o usuário
 * não estiver entrado com a senha
 * retornar antes sem carregar os comentários.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // Comece a editar daqui pra baixo! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'undepress' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Existe uma navegação para os comentários?  ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'undepress' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'undepress' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'undepress' ) ); ?></div>

			</div>
		</nav>
		<?php endif; // Verifica a navegação dos comentários.. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Existe uma navegação para os comentários? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'undepress' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentários antigos', 'undepress' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Novos comentários', 'undepress' ) ); ?></div>

			</div>
		</nav>
		<?php endif; // Verifica a navegação dos comentários. ?>

	<?php endif; // Verifica se have_comments(). ?>

	<?php
		// Se existirem comentários e os mesmos agora estão desativados, exiba uma mensagem.
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Os comentários estão desativados.', 'undepress' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
