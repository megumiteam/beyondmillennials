<?php
/**
 * MASHING UP setup theme
 *
 * @package MASHING UP
 * @since 0.7.1
 * @version 0.7.1
 */

add_action( 'after_setup_theme', 'mashing_up_setup_theme' );
function mashing_up_setup_theme() {
	load_theme_textdomain( 'mashing-up', get_theme_file_path( 'languages' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );

	add_editor_style();

}
