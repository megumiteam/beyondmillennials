<?php

function mashing_up_custom_event_summary() {
	echo get_mashing_up_custom_event_summary();
}
function get_mashing_up_custom_event_summary() {
	$html       = '';
	$data       = [];
	$data = ( false === empty( $title = esc_html( get_theme_mod( 'event_summary_title' ) ) ) ) ? array_merge( $data, array( 'title' => $title ) ) : '';
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
	echo '<pre>';
	var_dump($title);
	echo '</pre>';
	$subheading = esc_html( get_theme_mod( 'event_summary_subheading' ) );
	$content    = get_theme_mod( 'free_area' );
	$subheading = esc_html( get_theme_mod( 'event_summary_button_text' ) );
	$subheading = esc_url( get_theme_mod( 'event_summary_button_url' ) );

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
