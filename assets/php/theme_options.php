<?php
/**
 * CMB2 Theme Options
 *
 * This code is based on the CMB2 Snippets Library (https://github.com/CMB2/CMB2-Snippet-Library/blob/00de06a666f57956a4dfab14815cb45c735a7fb5/options-and-settings-pages/network-options-cmb.php)
 */

/**
 * Class OgdchThemeOptions
 */
class OgdchThemeOptions {

	/**
	 * Option key, and option page slug
	 * @var string
	 */
	const KEY = 'ogdch_options';

	/**
	 * Options page metabox id
	 * @var string
	 */
	const METABOX_ID = 'ogdch_option_metabox';

	/**
	 * Holds an instance of the object
	 *
	 * @var OgdchThemeOptions
	 */
	protected static $instance = null;

	/**
	 * Returns the running object
	 *
	 * @return OgdchThemeOptions
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 */
	protected function __construct() {
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 */
	function add_options_page_metabox() {
		global $language_priority;

		$cmb = new_cmb2_box( array(
			'id'           => self::METABOX_ID,
			'title'        => __( 'Theme Options', 'ogdch' ),
			'capability'   => 'edit_theme_options',
			'object_types' => array( 'options-page' ),
			'parent_slug'  => 'themes.php',
			'option_key'   => self::KEY,
		) );

		// Set our CMB2 fields

		// Banner
		$cmb->add_field( array(
			'name' => 'Banner',
			'desc' => '',
			'type' => 'title',
			'id'   => 'banner_title',
		) );

		$cmb->add_field( array(
			'name' => __( 'Banner active?', 'ogdch' ),
			'desc' => '',
			'id'   => 'banner_active',
			'type' => 'checkbox',
		) );

		foreach ( $language_priority as $lang ) {
			$cmb->add_field(array(
				'name' => __( 'Banner Title', 'ogdch' ) . ' (' . strtoupper( $lang ) . ')',
				'desc' => '',
				'id' => 'banner_title_' . $lang,
				'type' => 'text',
				'default' => '',
			));
			$cmb->add_field(array(
				'name' => __( 'Banner Text', 'ogdch' ) . ' (' . strtoupper( $lang ) . ')',
				'desc' => '',
				'id' => 'banner_text_' . $lang,
				'type' => 'textarea_small',
				'default' => '',
			));
		}
	}
}

/**
 * Helper function to get/return the OgdchThemeOptions object
 * @return OgdchThemeOptions object
 */
function ogdch_theme_options() {
	return OgdchThemeOptions::get_instance();
}
