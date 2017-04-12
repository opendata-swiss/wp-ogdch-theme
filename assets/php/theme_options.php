<?php
/**
 * CMB2 Theme Options
 *
 * This code is based on the CMB2 Snippets Library (https://github.com/CMB2/CMB2-Snippet-Library/blob/7b6e0c7dc91ebf84751a6cdb2355da4c4f704520/options-and-settings-pages/theme-options-cmb.php)
 *
 * @version 0.1.0
 */

/**
 * Class OgdchThemeOptions
 */
class OgdchThemeOptions {

	/**
	 * Option key, and option page slug
	 * @var string
	 */
	private $key = 'ogdch_options';

	/**
	 * Options page metabox id
	 * @var string
	 */
	private $metabox_id = 'ogdch_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = 'Theme Options';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

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
			self::$instance->hooks();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	protected function __construct() {
		// Set our title
		$this->title = __( $this->title, 'ogdch' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo esc_attr( $this->key ); ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key ),
			),
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
			'name' => 'Banner active?',
			'desc' => '',
			'id'   => 'banner_active',
			'type' => 'checkbox',
		) );

		$cmb->add_field(array(
			'name' => __( 'Banner Title DE', 'ogdch' ),
			'desc' => __( 'German Banner Title', 'ogdch' ),
			'id'   => 'banner_title_de',
			'type' => 'text',
			'default' => 'Wartungsfenster',
		) );
		$cmb->add_field(array(
			'name' => __( 'Banner Text DE', 'ogdch' ),
			'desc' => __( 'German Banner Text', 'ogdch' ),
			'id'   => 'banner_text_de',
			'type' => 'textarea_small',
			'default' => '',
		) );

		$cmb->add_field(array(
			'name' => __( 'Banner Title FR', 'ogdch' ),
			'desc' => __( 'French Banner Title', 'ogdch' ),
			'id'   => 'banner_title_fr',
			'type' => 'text',
			'default' => 'Maintainance',
		) );
		$cmb->add_field(array(
			'name' => __( 'Banner Text FR', 'ogdch' ),
			'desc' => __( 'French Banner Text', 'ogdch' ),
			'id'   => 'banner_text_fr',
			'type' => 'textarea_small',
			'default' => '',
		) );

		$cmb->add_field(array(
			'name' => __( 'Banner Title IT', 'ogdch' ),
			'desc' => __( 'Italian Banner Title', 'ogdch' ),
			'id'   => 'banner_title_it',
			'type' => 'text',
			'default' => 'Mantenimento',
		) );
		$cmb->add_field(array(
			'name' => __( 'Banner Text IT', 'ogdch' ),
			'desc' => __( 'Italian Banner Text', 'ogdch' ),
			'id'   => 'banner_text_it',
			'type' => 'textarea_small',
			'default' => '',
		) );

		$cmb->add_field(array(
			'name' => __( 'Banner Title EN', 'ogdch' ),
			'desc' => __( 'English Banner Title', 'ogdch' ),
			'id'   => 'banner_title_en',
			'type' => 'text',
			'default' => 'Maintainance',
		) );
		$cmb->add_field(array(
			'name' => __( 'Banner Text EN', 'ogdch' ),
			'desc' => __( 'English Banner Text', 'ogdch' ),
			'id'   => 'banner_text_en',
			'type' => 'textarea_small',
			'default' => '',
		) );
	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key.
	 * @param  array $updated   Array of updated fields.
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'ogdch' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @throws Exception If invalid property is provided.
	 * @param  string $field Field to retrieve.
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}
}

/**
 * Helper function to get/return the OgdchThemeOptions object
 * @since  0.1.0
 * @return OgdchThemeOptions object
 */
function ogdch_theme_options() {
	return OgdchThemeOptions::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key.
 * @param  mixed  $default Optional default value.
 * @return mixed           Option value
 */
function ogdch_get_option( $key = '', $default = null ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( ogdch_theme_options()->key, $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( ogdch_theme_options()->key, $key, $default );

	$val = $default;

	if ( 'all' === $key ) {
		$val = $opts;
	} elseif ( array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}

/**
 * Get the localized value of an option key
 * @param string $key Options array key.
 * @return bool|mixed
 */
function ogdch_get_localized_option( $key ) {
	global $language_priority;

	// try to get the option in current language
	$localized_option = ogdch_get_option( $key . '_' . get_current_language() );
	if ( ! empty( $localized_option ) ) {
		return $localized_option;
	}

	// use other languages as fallback
	foreach ( $language_priority as $lang ) {
		$localized_option = ogdch_get_option( $key . '_' . $lang );
		if ( ! empty( $localized_option ) ) {
			return $localized_option;
		}
	}

	return false;
}
