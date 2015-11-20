<?php

/**
 * Add / Remove Scripts and CSS only in Frontend
 *
 * @return void
 */
function odg_scripts() {

	if ( is_admin() ) {
		return;
	}

	// Header
	// We need to add null as version number otherwise WordPress adds wp version behind automatically
	wp_register_style( 'font_source_sans_pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic', array(), null );
	wp_enqueue_style( 'font_source_sans_pro' );

	// IE8 - IE7 can't understand multiple Google Web Font styles through the same file request
	wp_register_style( 'font_source_sans_pro_400', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro', array(), null );
	wp_style_add_data( 'font_source_sans_pro_400', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'font_source_sans_pro_400' );

	wp_register_style( 'font_source_sans_pro_400italic', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400italic', array(), null );
	wp_style_add_data( 'font_source_sans_pro_400italic', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'font_source_sans_pro_400italic' );

	wp_register_style( 'font_source_sans_pro_600', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:600', array(), null );
	wp_style_add_data( 'font_source_sans_pro_600', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'font_source_sans_pro_600' );

	wp_register_style( 'font_source_sans_pro_600italic', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:600italic', array(), null );
	wp_style_add_data( 'font_source_sans_pro_600italic', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'font_source_sans_pro_600italic' );

	wp_register_style( 'app', get_template_directory_uri() . '/assets/css/app.css', array(), get_theme_version() );
	wp_enqueue_style( 'app' );

	wp_register_script( 'html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array(), '3.7.2', false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'html5shiv' );

	wp_register_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '1.4.2', false );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond' );

	// Footer
	wp_deregister_script( 'jquery' ); // Remove WP jQuery version
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.11.1.min.js', array(), '1.11.1', true );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'app', get_template_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), get_theme_version(), true );
	wp_enqueue_script( 'app' );
}

add_action( 'wp_enqueue_scripts', 'odg_scripts' );

/**
 * Adds favicon to header
 */
function add_favicon() {
	echo '<link rel="icon" sizes="128x128" href="' . esc_attr( get_stylesheet_directory_uri() ) . '/assets/images/favicon-128.png">';
	echo '<link rel="icon" sizes="192x192" href="' . esc_attr( get_stylesheet_directory_uri() ) . '/assets/images/favicon-192.png">';
}

// Now, just make sure that function runs when you're on the login page and admin pages
add_action( 'login_head', 'add_favicon' );
if ( is_admin() ) {
	add_action( 'admin_head', 'add_favicon' );
}
