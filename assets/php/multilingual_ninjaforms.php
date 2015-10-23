<?php
/**
 * Make Ninja Forms message translatable in Polylang settings
 *
 * @param array $settings Ninja forms settings.
 *
 * @return array
 */
function multilingual_ninja_forms_polylang( $settings ) {
	$label_settings = array(
		'date_format',
		'currency_symbol',
		'req_div_label',
		'req_field_symbol',
		'req_error_label',
		'req_field_error',
		'spam_error',
		'honeypot_error',
		'timed_submit_error',
		'javascript_error',
		'invalid_email',
		'process_label',
		'password_mismatch'
	);
	foreach ( $label_settings as $label_setting ) {
		if ( function_exists( 'pll_register_string' ) ) {
			pll_register_string( $label_setting, $settings[ $label_setting ], 'Ninja Forms' );
		}
		add_filter( 'ninja_forms_labels/' . $label_setting, 'multilingual_ninja_forms_translate' );
	}
	return $settings;
}

/**
 * Get Polylang translation of Ninja form message when printed
 *
 * @param string $label Message which should be translated.
 *
 * @return bool|string|void
 */
function multilingual_ninja_forms_translate( $label ) {
	if ( function_exists( 'pll__' ) ) {
		$label = pll__( $label );
	}
	return $label;
}
add_filter( 'ninja_forms_settings', 'multilingual_ninja_forms_polylang' );

/**
 * Make Ninja Forms labels and values translatable
 *
 * @param array $data Array of field settings.
 * @param int   $field_id ID of the field being filtered.
 *
 * @return array
 */
function translate_ninja_forms( $data, $field_id ) {
	$data['label']         = __( $data['label'], 'ogdch' );
	$data['default_value'] = __( $data['default_value'], 'ogdch' );
	return $data;
}
add_filter( 'ninja_forms_field', 'translate_ninja_forms', 10, 2 );