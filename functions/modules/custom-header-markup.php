<?php

function mashing_up_custom_header_markup() {
	echo get_mashing_up_custom_header_markup();
}
function get_mashing_up_custom_header_markup() {
	$html = '';
	$url  = get_theme_mod( 'mobile_header_image' );

	if ( true === empty( $url ) )
		return;

	$attachment_id = attachment_url_to_postid( $url );

	if ( true === empty( $attachment_id ) )
		return;

	$image = wp_get_attachment_image( $attachment_id, 'full' );
	$html  = sprintf(
		'<div id="wp-custom-mobile-header" class="wp-custom-mobile-header">%s</div>',
		$image
	);

	return $html;
}
