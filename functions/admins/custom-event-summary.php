<?php
add_action( 'customize_register', 'mashing_up_customize_event_summary' );
function mashing_up_customize_event_summary( $wp_customize ) {

		$wp_customize->add_section('event_summary', array(
			'title'    => __( 'イベント概要', 'mashing_up' ),
			'priority' => 120,
		));

		$wp_customize->add_setting(
			'event_summary_title'
		);

		$wp_customize->add_control(
			'event_summary_title',
			array(
				'label'    => __( 'タイトル', 'mashing_up' ),
				'section'  => 'event_summary',
				'type'     => 'text',
				'priority' => 0,
				'settings' => 'event_summary_title',
			)
		);

		$wp_customize->add_setting(
			'event_summary_subheading'
		);
		$wp_customize->add_control(
			'event_summary_subheading',
			array(
				'label'    => __( '小見出し', 'mashing_up' ),
				'section'  => 'event_summary',
				'type'     => 'text',
				'priority' => 10,
				'settings' => 'event_summary_subheading',
			)
		);

		$wp_customize->add_setting(
			'event_summary_content_ja'
		);
		$wp_customize->add_control(
			'event_summary_content_ja',
			array(
				'label'    => __( '文章(日本語)', 'mashing_up' ),
				'section'  => 'event_summary',
				'type'     => 'textarea',
				'priority' => 20,
				'settings' => 'event_summary_content_ja',
			)
		);

		$wp_customize->add_setting(
			'event_summary_content_en'
		);
		$wp_customize->add_control(
			'event_summary_content_en',
			array(
				'label'    => __( '文章(英語)', 'mashing_up' ),
				'section'  => 'event_summary',
				'type'     => 'textarea',
				'priority' => 30,
				'settings' => 'event_summary_content_en',
			)
		);

		$wp_customize->add_setting(
			'event_summary_button_text'
		);
		$wp_customize->add_control(
			'event_summary_button_text',
			array(
				'label'    => __( 'リンクボタンの文字', 'mashing_up' ),
				'section'  => 'event_summary',
				'type'     => 'text',
				'priority' => 40,
				'settings' => 'event_summary_button_text',
			)
		);

		$wp_customize->add_setting(
			'event_summary_button_url'
		);
		$wp_customize->add_control(
			'event_summary_button_url',
			array(
				'label'    => __( 'リンク先URL', 'mashing_up' ),
				'section'  => 'event_summary',
				'type'     => 'url',
				'priority' => 50,
				'settings' => 'event_summary_button_url',
			)
		);
}
