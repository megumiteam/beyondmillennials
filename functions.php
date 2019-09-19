<?php
/**
 * MASHING UP functions and definitions
 *
 * @package WordPress
 * @subpackage MASHING UP
 * @since 0.7.1
 */

// Function reading file
get_template_part( 'functions/index' );

add_filter( 'show_admin_bar', '__return_false' );


// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

function my_admin_style(){
	wp_enqueue_style( 'my_admin_style', get_template_directory_uri().'/admin-mod.css' );
}
add_action( 'admin_enqueue_scripts', 'my_admin_style' );
