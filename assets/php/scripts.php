<?php

// =======================================================================//
// Add / Remove Scripts and CSS only in Fronend
// =======================================================================//

function odg_scripts() {

	if ( is_admin() ) {
		return;
	}

	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' );
	wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/css/app.css', false, null );

	// Remove WP jQuery version
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.11.1.min.js', false, null, false );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js' );
	wp_enqueue_script( 'bootstrap' );

	wp_register_script( 'app', get_template_directory_uri() . '/assets/js/app.min.js', false, null, true );
	wp_enqueue_script( 'app' );

	wp_localize_script( 'app', 'ogdAjax',
		array(
			'ajaxurl'         => admin_url( 'admin-ajax.php' ),
			'submissionNonce' => wp_create_nonce( 'submissionNonce' ),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'odg_scripts' );