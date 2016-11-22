<?php

/**
 * Setup Theme
 *
 * 1. Load Textdomain
 * 2. Register Menus
 * 3. Add Support for WP-Features & check config
 * 4. Register Image sizes
 * 5. Increase Image quality
 * 6. Disable Emoji
 *
 * @return void
 */
function theme_setup() {

	// =======================================================================//
	// Translations
	// =======================================================================//

	load_theme_textdomain( 'ogdch', get_template_directory() . '/languages' );

	// =======================================================================//
	// Register Navigations
	// =======================================================================//

	register_nav_menus( array(
		'main_navigation'      => __( 'Main-Navigation', 'ogdch' ),
	) );

	// =======================================================================//
	// Add support for Stuff
	// =======================================================================//

	add_theme_support( 'post-thumbnails' );
	// generate title tag in <head>
	add_theme_support( 'title-tag' );

	//check if constants are defined in wp config
	if ( ! defined( 'CKAN_API_ENDPOINT' ) ) {
		wp_die( 'Please define CKAN_API_ENDPOINT in your WP config.' );
		return;
	}

	// =======================================================================//
	// Custom Image Sizes
	// =======================================================================//

	add_image_size( 'app-image', 150 );

	add_filter( 'jpeg_quality', 'image_full_quality' );
	add_filter( 'wp_editor_set_quality', 'image_full_quality' );
	add_action( 'init', 'disable_emojis' );
}

// =======================================================================//
// Increase Img Quality
// =======================================================================//

/**
 * Increase Img Quality.
 *
 * @param integer $quality The quality value.
 *
 * @return integer
 */
function image_full_quality( $quality ) {
	return 95;
}

// =======================================================================//
// Disable Emoji
// =======================================================================//

/**
 * Disable emojis
 *
 * @return void
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

/**
 * Disable emojis in TinyMCE
 *
 * @param array $plugins All available plugins.
 *
 * @return array
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

add_action( 'after_setup_theme', 'theme_setup' );
