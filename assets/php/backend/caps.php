<?php
/**
 * Add capabilities and roles used in this theme
 */
function add_theme_caps() {
	$post_types = array(
		'datasets',
		'groups',
		'organisations',
		'apps',
	);
	$taxonomies = array(
		'frequencies',
	);
	// Add all capabilities of plugin to administrator role (save in database) to make them visible in backend.
	$admin_role = get_role( 'administrator' );
	if ( is_object( $admin_role ) ) {
		foreach ( $post_types as $post_type ) {
			$admin_role->add_cap( 'edit_' . $post_type );
			$admin_role->add_cap( 'edit_others_' . $post_type );
			$admin_role->add_cap( 'publish_' . $post_type );
			$admin_role->add_cap( 'read_private_' . $post_type );
			$admin_role->add_cap( 'delete_' . $post_type );
			$admin_role->add_cap( 'delete_private_' . $post_type );
			$admin_role->add_cap( 'delete_published_' . $post_type );
			$admin_role->add_cap( 'delete_others_' . $post_type );
			$admin_role->add_cap( 'edit_private_' . $post_type );
			$admin_role->add_cap( 'edit_published_' . $post_type );
			$admin_role->add_cap( 'create_' . $post_type );
		}
		foreach ( $taxonomies as $taxonomy ) {
			$admin_role->add_cap( 'manage_' . $taxonomy );
			$admin_role->add_cap( 'edit_' . $taxonomy );
			$admin_role->add_cap( 'delete_' . $taxonomy );
			$admin_role->add_cap( 'assign_' . $taxonomy );
		}

		$admin_role->add_cap( 'edit_user_organisation' );
	}

	$datenlieferant_caps = array(
		'read'                    => true,
		'upload_files'            => true,
		'create_datasets'         => true,
		'edit_datasets'           => true,
		'edit_private_datasets'   => true,
		'edit_published_datasets' => true,
		'publish_datasets'        => true,
		'read_private_datasets'   => true,
		'edit_posts'             => true, // this cap is used to edit attachment details
	);
	init_role( 'datenlieferant', 'Datenlieferant', $datenlieferant_caps );

	$data_owner_caps = array(
		'read'                         => true,
		'upload_files'                 => true,
		'create_datasets'              => true,
		'edit_datasets'                => true,
		'edit_private_datasets'        => true,
		'edit_published_datasets'      => true,
		'publish_datasets'             => true,
		'read_private_datasets'        => true,
		'edit_organisations'           => true,
		'edit_private_organisations'   => true,
		'edit_published_organisations' => true,
		'read_private_organisations'   => true,
		'edit_posts'                   => true, // TODO why do we need to add this cap? (Without it we can't access the list view)
	);
	init_role( 'data-owner', 'Data Owner', $data_owner_caps );

	$content_manager_caps = array(
		'read'                   => true,
		'upload_files'           => true,
		'edit_theme_options'     => true,
		'create_apps'            => true,
		'delete_apps'            => true,
		'delete_others_apps'     => true,
		'delete_private_apps'    => true,
		'delete_published_apps'  => true,
		'edit_apps'              => true,
		'edit_others_apps'       => true,
		'edit_private_apps'      => true,
		'edit_published_apps'    => true,
		'publish_apps'           => true,
		'read_private_apps'      => true,
		'delete_others_pages'    => true,
		'delete_pages'           => true,
		'delete_private_pages'   => true,
		'delete_published_pages' => true,
		'edit_others_pages'      => true,
		'edit_pages'             => true,
		'edit_private_pages'     => true,
		'edit_published_pages'   => true,
		'publish_pages'          => true,
		'read_private_pages'     => true,
		'edit_posts'             => true, // this cap is used to edit attachment details
		'edit_others_posts'      => true, // this cap is used to edit attachment details
	);
	init_role( 'content-manager', 'Content Manager', $content_manager_caps );
}

/**
 * Initializes new role or resets it
 *
 * @param string $role_name Name of role.
 * @param string $display_name Displayed name of role.
 * @param array  $caps Capabilities of role.
 */
function init_role( $role_name, $display_name, $caps ) {
	$role = get_role( $role_name );
	if ( is_object( $role ) ) {
		// if role already exists -> reset
		foreach ( array_keys( $role->capabilities ) as $cap ) {
			$role->remove_cap( $cap );
		}
		foreach ( $caps as $cap => $allowed ) {
			if ( $allowed ) {
				$role->add_cap( $cap );
			}
		}
	} else {
		add_role( $role_name, $display_name, $caps );
	}
}

/**
 * Disables default WordPress roles
 *
 * @param array $roles Available roles.
 *
 * @return array
 */
function disable_default_roles( $roles ) {
	if ( isset( $roles['author'] ) ) {
		unset( $roles['author'] );
	}

	if ( isset( $roles['editor'] ) ) {
		unset( $roles['editor'] );
	}

	if ( isset( $roles['subscriber'] ) ) {
		unset( $roles['subscriber'] );
	}

	if ( isset( $roles['contributor'] ) ) {
		unset( $roles['contributor'] );
	}

	return $roles;
}

// Create OGD-CH roles on theme change
add_action( 'after_switch_theme', 'add_theme_caps' );

// Disable default WordPress roles
add_filter( 'editable_roles', 'disable_default_roles' );
