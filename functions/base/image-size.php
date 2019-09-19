<?php
/**
 * add_image_size
 */
add_action( 'after_setup_theme', 'mashing_up_image_size' );
function mashing_up_image_size() {

	if ( ! isset( $content_width ) )
		$content_width = 1080;

	add_theme_support( 'post-thumbnails' );
	update_option( 'thumbnail_size_w', 318 );
	update_option( 'thumbnail_size_h', 318 );
	update_option( 'thumbnail_crop', true );
	update_option( 'medium_size_w', 484 );
	update_option( 'medium_size_h', 484 );
	//update_option( 'medium_large_size_h', 968 );
	//update_option( 'medium_large_size_w', 968 );
	update_option( 'large_size_w', 1080 );
	update_option( 'large_size_h', 1080 );
	add_image_size( 'speakers_type_2_pc', '252', '252', true );
	add_image_size( 'speakers_type_1_sp', '190', '190', true );
	add_image_size( 'speakers_type_2_sp', '120', '120', true );
	/*
	add_image_size( 'speakers-type-1-pc-@1', '318', '318', true );
	add_image_size( 'speakers-type-2-pc-@2', '504', '504', true );
	add_image_size( 'speakers-type-2-pc-@1', '252', '252', true );
	add_image_size( 'speakers-sp-type-1-@3', '570', '570', true );
	add_image_size( 'speakers-sp-type-1-@2', '380', '380', true );
	add_image_size( 'speakers-sp-type-2-@3', '360', '360', true );
	add_image_size( 'speakers-sp-type-2-@2', '240', '240', true );
	*/
}
