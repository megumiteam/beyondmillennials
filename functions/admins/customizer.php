<?php
add_action( 'customize_register', 'mashing_up_customize_register' );
function mashing_up_customize_register( $wp_customize ) {
	//色
	$wp_customize->remove_section('colors');
	//固定フロントページ
	$wp_customize->remove_section('static_front_page');
	//追加CSS
	$wp_customize->remove_section('custom_css');
}
