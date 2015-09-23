<?php

/**
 * Load scripts for admin interface.
 *
 * @return void
 */
function ogdch_admin_scripts() {
	wp_enqueue_style( 'cmb2-overwrite', get_template_directory_uri() . '/assets/css/admin/cmb2_overwrite.css', array(
		'cmb2-styles',
	) );
}

add_action( 'admin_enqueue_scripts', 'ogdch_admin_scripts' );
