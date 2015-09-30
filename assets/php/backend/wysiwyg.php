<?php
/**
 * Disable unused buttons in TinyMCE.
 *
 * @param array $buttons TinyMCE button configuration.
 *
 * @return array
 */
function configure_tiny_mce_buttons( $buttons ) {
	// Remove the text color selector
	$remove = 'forecolor';

	//Find the array key and then unset
	if ( ( $key = array_search( $remove, $buttons ) ) !== false ) {
		unset( $buttons[ $key ] );
	}

	return $buttons;
}

add_filter( 'mce_buttons_2', 'configure_tiny_mce_buttons' );

/**
 * Disable unused block formats.
 *
 * @param array $init TinyMCE configuration.
 *
 * @return array
 */
function configure_tiny_mce_blockformats( $init ) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Preformatted=pre';

	return $init;
}

add_filter( 'tiny_mce_before_init', 'configure_tiny_mce_blockformats' );
