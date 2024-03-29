<?php
add_action( 'wp_enqueue_scripts', 'mashing_up_enqueue_scripts', 99999 );
function mashing_up_enqueue_scripts() {
	wp_enqueue_style( 'mashing-up', get_stylesheet_uri(), array(), filemtime( get_theme_file_path( 'style.css' ) ) );

	if ( is_front_page() ) {
		wp_enqueue_script( 'swiper', get_theme_file_uri( 'js/swiper.min.js' ), array( 'jquery' ), filemtime( get_theme_file_path( 'js/swiper.min.js' ) ), true );
		wp_enqueue_style( 'mashing-up-swiper', get_theme_file_uri( 'swiper.min.css' ), array(), filemtime( get_theme_file_path( 'swiper.min.css' ) ) );
	}

	wp_enqueue_script( 'general', get_theme_file_uri( 'js/functions.js' ), array( 'jquery' ), filemtime( get_theme_file_path( 'js/functions.js' ) ), true );

	if ( is_page( 'about' ) ) {
		wp_enqueue_style( 'mashing-up-about', get_theme_file_uri( 'about.css' ), array(), filemtime( get_theme_file_path( 'about.css' ) ) );
	}

}
