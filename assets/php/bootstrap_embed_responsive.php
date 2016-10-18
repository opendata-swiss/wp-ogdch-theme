<?php
/**
 * Adds bootstrap embed-responsive classes to oEmbed object.
 * Source: http://www.lorut.no/responsive-vimeo-youtube-embed-wordpress/
 *
 * @param string $html The returned oEmbed HTML.
 * @param object $data A data object result from an oEmbed provider.
 *
 * @return string
 */
function responsive_wrap_oembed_dataparse( $html, $data ) {
	// Verify oembed data (as done in the oEmbed data2html code)
	if ( ! is_object( $data ) || empty( $data->type ) ) {
		return $html;
	}

	// Verify that it is a video
	if ( ! ( 'video' === $data->type ) ) {
		return $html;
	}

	// Calculate aspect ratio
	$ar = $data->width / $data->height;

	// Set the aspect ratio modifier
	$ar_mod = ( abs( $ar - ( 4 / 3 ) ) < abs( $ar - ( 16 / 9 ) ) ? 'embed-responsive-4by3' : 'embed-responsive-16by9' );

	// Strip width and height from html
	$html = preg_replace( '/(width|height)="\d*"\s/', '', $html );

	// Return code
	return '<div class="embed-container"><div class="embed-responsive ' . $ar_mod . '">' . $html . '</div></div>';
}
add_filter( 'oembed_dataparse', 'responsive_wrap_oembed_dataparse', 10, 2 );
