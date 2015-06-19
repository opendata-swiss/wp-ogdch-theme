<?php

// =======================================================================//
// Setup Theme
// 1. Load Textdomain
// 2. Register Menus
// 3. Add Support for WP-Features
// 4. Register Image sizes
// 5. Increase Image qulaity
// 6. Disable Emoji
// =======================================================================//

function theme_setup() {

	// =======================================================================//
	// Translations
	// =======================================================================//

	load_theme_textdomain( 'ogdch', get_template_directory() . '/languages' );


	// =======================================================================//
	// Register Navigations
	// =======================================================================//

	register_nav_menus( array(
		'service_navigation' => __( 'Service-Navigation', 'ogdch' ),
		'main_navigation'    => __( 'Haupt-Navigation', 'ogdch' ),
	) );

	// =======================================================================//
	// Add support for Stuff
	// =======================================================================//

	add_theme_support( 'post-thumbnails' );

	// =======================================================================//
	// Custom Image Sizes
	// =======================================================================//

	/*add_image_size( 'frontpage-slide', 900, 700, array( 'left', 'top' ) );
	add_image_size( 'post-teaser', 600, 400, array( 'left', 'top' ) );
	add_image_size( 'post-slide', 1170, 770, array( 'center', 'center' ) );*/


	// =======================================================================//
	// Increase Img Quality
	// =======================================================================//

	function image_full_quality( $quality ) {
		return 95;
	}

	add_filter( 'jpeg_quality', 'image_full_quality' );
	add_filter( 'wp_editor_set_quality', 'image_full_quality' );


	// =======================================================================//
	// Disable Emoji
	// =======================================================================//

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

	add_action( 'init', 'disable_emojis' );

	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
}

add_action( 'after_setup_theme', 'theme_setup' );