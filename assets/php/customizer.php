<?php
/**
 * Add theme specific settings to customizer
 *
 * @param WP_Customize_Manager $wp_customize The customizer object.
 */
function ogdch_customize_register( $wp_customize ) {
	// Create section
	$wp_customize->add_section( 'content_blocks', array(
		'title' => __( 'Content blocks', 'ogdch' ),
	) );

	// Introduction text
	$wp_customize->add_setting( 'introduction_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( 'introduction_text', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'content_blocks',
		'label' => __( 'Introduction text', 'ogdch' ),
	) );

	// Footer text
	$wp_customize->add_setting( 'footer_text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( 'footer_text', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'content_blocks',
		'label' => __( 'Footer text', 'ogdch' ),
	) );
}
add_action( 'customize_register', 'ogdch_customize_register' );

/**
 * Registers customizer strings to translate with Polylang
 */
function ogdch_multilingual_settings() {
	if ( function_exists( 'pll_register_string' ) ) {
		pll_register_string( __( 'Introduction text', 'ogdch' ), get_theme_mod( 'introduction_text' ), 'wp-ogdch-theme' );
		pll_register_string( __( 'Footer text', 'ogdch' ), get_theme_mod( 'footer_text' ), 'wp-ogdch-theme' );
	}
}
ogdch_multilingual_settings();
