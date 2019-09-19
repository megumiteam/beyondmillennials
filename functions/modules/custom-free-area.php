<?php

function mashing_up_custom_free_area() {
	echo get_mashing_up_custom_free_area();
}
function get_mashing_up_custom_free_area() {
	$html    = '';
	$content = get_theme_mod( 'free_area' );

	if ( true === empty( $content ) )
		return;

	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$html    = sprintf(
		'<div id="custom-free-area" class="custom-free-area">%s</div>',
		$content
	);

	return $html;
}
