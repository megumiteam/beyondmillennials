<?php
/**
 * MASHING UP setup nav menus
 * This theme uses wp_nav_menu() in two locations.
 *
 * @package MASHING UP
 * @since 0.7.1
 * @version 0.7.1
 */

add_action( 'after_setup_theme', 'mashing_up_nav_menus' );
function mashing_up_nav_menus() {

	register_nav_menus( array(
		'primary'    => __( 'メインメニュー', 'mashing-up' ),
		'secondary'   => __( 'フッターメニュー', 'mashing-up' ),
	) );

}
