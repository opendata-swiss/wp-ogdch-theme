<?php
/**
 * Setup customizer
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
}
add_action( 'customize_register', 'ogdch_customize_register' );
