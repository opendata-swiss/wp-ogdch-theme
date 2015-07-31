<?php

// =======================================================================//
// AJAX Endpoints (Move big functions into theme_functions.php)
// =======================================================================//


/**
 * Search via CKAN API
 *
 * @return void
 */
function ckan_search() {
	$return    = array( 'status' => 'error' );
	$fq        = array();
	$fq_string = '';

	parse_str( $_POST['q'], $args );

	if ( ! isset( $args['q'] ) ) {
		$args['q'] = '';
	}

	// create fq string
	// &fq=organization:liip-ag and so on
	if ( isset( $args['groups'] ) ) {
		$fq['groups'] = 'groups:';
		$fq['groups'] .= implode( '+groups:', $args['groups'] );
	}

	if ( isset( $args['organization'] ) ) {
		$fq['organization'] = 'organization:';
		$fq['organization'] .= implode( '+organization:', $args['organization'] );
	}

	$fq_string = implode( '+', $fq );

	// create endpoint
	$endpoint = CKAN_SEARCH_API_ENDPOINT . '?q=' . $args['q'];
	$endpoint .= '&facet=true&facet.field=["groups","organization","tags","license"]';

	// add fq to endpoint
	if ( '' !== $fq_string ) {
		$endpoint .= '&fq=' . $fq_string;
	}

	// request
	$response = wp_remote_get( $endpoint );
	$response = json_decode( $response['body'] );

	$response = $response->result;

	$return['count']  = $response->count;
	$return['facets'] = $response->facets;

	if ( wp_admin_bar_my_account_menu( $response->results ) > 0 ) {
		ob_start();
		foreach ( $response->results as $res ) {
			include( locate_template( 'partials/search-result-short.php' ) );
		}
		$return['html'] = ob_get_clean();
	}

	$return['status'] = 'success';

	header( 'Content: application/json' );
	echo wp_json_encode( $return );
	die;

}

add_action( 'wp_ajax_ckan_search_action', 'ckan_search' );
add_action( 'wp_ajax_nopriv_ckan_search_action', 'ckan_search' );
