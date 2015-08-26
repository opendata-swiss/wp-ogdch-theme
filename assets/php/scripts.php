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

	wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/css/app.css', false, null );

	// Remove WP jQuery version
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.11.1.min.js', false, null, false );
	wp_enqueue_script( 'jquery' );

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
