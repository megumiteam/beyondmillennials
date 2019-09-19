<?php
add_action( 'customize_register', 'mashing_up_customize_free_area' );
function mashing_up_customize_free_area( $wp_customize ) {

		$wp_customize->add_section('free_area', array(
			'title'    => __( '自由入力欄', 'mashing_up' ),
			'priority' => 120,
		));

		$wp_customize->add_setting(
			'free_area'
		);

		$wp_customize->add_control(
			'free_area',
			array(
				'label'    => __( '自由入力欄', 'mashing_up' ),
				'section'  => 'free_area',
				'type'     => 'textarea',
				'settings' => 'free_area',
			)
		);
}
