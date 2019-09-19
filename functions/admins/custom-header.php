<?php
add_action( 'after_setup_theme', 'mashing_up_custom_header_setup' );
function mashing_up_custom_header_setup() {
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1366,
			'height'      => 768,
			'header-text' => false,
			'video'       => true,
		)
	);
}

add_action( 'customize_register', 'mashing_up_custom_header_mobile' );
function mashing_up_custom_header_mobile( $wp_customize ) {

		$wp_customize->add_setting(
			'mobile_header_image'
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'mobile_header_image',
				array(
					'label'       => __( 'モバイルヘッダー画像', 'mashing_up' ),
					'section'     => 'header_image',
					'settings'    => 'mobile_header_image',
					'description' => __( 'モバイルヘッダー画像を設定してください。', 'mashing_up' ),
				)
			)
		);
}
