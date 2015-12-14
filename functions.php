<?php

// =======================================================================//
// Frontend Includes
// =======================================================================//

$frontend_includes = array(
	'assets/php/init.php',
	'assets/php/cleanup.php',
	'assets/php/scripts.php',
	'assets/php/theme_functions.php',
	'assets/php/multilingual_ninjaforms.php',
);

foreach ( $frontend_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( esc_html_x( 'Error locating %s for inclusion', '%s contains path to file.', 'ogdch' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );


// =======================================================================//
// Only Backend Includes
// =======================================================================//

if ( is_admin() ) {

	$backend_includes = array(
		'assets/php/backend/scripts.php',               // Admin Scripts / CSS
		'assets/php/backend/caps.php',                  // Caps & Roles
		'assets/php/backend/cpt_messages.php',          // Custom post type messages
		'assets/php/backend/menu.php',                  // Menu
		'assets/php/backend/statistics.php',            // Statistics API
		'assets/php/backend/wysiwyg.php',               // TinyMCE Configuration
	);

	foreach ( $backend_includes as $file ) {
		if ( ! $filepath = locate_template( $file ) ) {
			trigger_error( sprintf( esc_html_x( 'Error locating %s for inclusion', '%s contains path to file.', 'ogdch' ), $file ), E_USER_ERROR );
		}
		require_once $filepath;
	}
	unset( $file, $filepath );
}
