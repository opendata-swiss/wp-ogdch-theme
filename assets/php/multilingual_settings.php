<?php
/**
 * Registers setting strings to translate with Polylang
 */
function ogdch_multilingual_settings() {
	if ( function_exists( 'pll_register_string' ) ) {
		pll_register_string( __( 'Introduction text', 'ogdch' ), get_theme_mod( 'introduction_text' ), 'wp-ogdch-theme' );
	}
}
ogdch_multilingual_settings();
