<?php

// Itera e imprime campo repeater do ACF
function undepress_print_info( $field_acf, $subfield_acf, $wrapper ) {

	$undepress_field 	= get_field( $field_acf );
	$undepress_subfield  = '';

    if( $undepress_field ): while( have_rows( $field_acf ) ): the_row();

		$undepress_subfield = get_sub_field( $subfield_acf );

	if( isset($wrapper) ) {
		echo '<' . $wrapper . '>' . $undepress_subfield . '</' . $wrapper . '>';
	}

	endwhile; endif;
}

// Itera sobre campo padrão
function undepress_print_text( $field_acf ) {
	echo get_field( $field_acf );
}