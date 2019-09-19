<?php
add_action( 'wp_enqueue_scripts', 'mashing_up_fonts', 1 );
function mashing_up_fonts() {
	wp_enqueue_style( 'mashing-up-fonts', mashing_up_roboto_fonts_url(), array(), null );
}

function mashing_up_roboto_fonts_url() {
	$fonts_url       = '';
	$font_families   = array();
	$font_families[] = 'Arvo';
	$font_families[] = 'Heebo:300,500,700';
	$font_families[] = 'Roboto:700';

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'display' => 'swap',
		'subset'  => 'latin',
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return esc_url_raw( $fonts_url );
}
