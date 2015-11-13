<?php
/**
 * Make Ninja Forms message translatable in Polylang settings
 * Source: https://github.com/wpninjas/ninja-forms/issues/155
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
		'password_mismatch',
	);
	foreach ( $label_settings as $label_setting ) {
		add_filter( 'ninja_forms_labels/' . $label_setting, 'multilingual_ninja_forms_translate' );
	}
	return $settings;
}

/**
 * Get Polylang translation of Ninja form message when printed
 *
 * @param string $label Message which should be translated.
 *
 * @return string
 */
function multilingual_ninja_forms_translate( $label ) {
	return __( $label, 'ogdch' );
}
add_filter( 'ninja_forms_settings', 'multilingual_ninja_forms_polylang' );

/**
 * Make Ninja Forms labels and values translatable
 * Source: https://github.com/wpninjas/ninja-forms/issues/155
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


/**
 * Make Ninja Forms success message translatable
 *
 * @param string $message Success message to translate.
 * @param int    $form_id ID of the current form.
 *
 * @return string
 */
function translate_ninja_success_message( $message, $form_id ) {
	return __( $message, 'ogdch' );
}
add_filter( 'nf_success_msg', 'translate_ninja_success_message', 10, 2 );
