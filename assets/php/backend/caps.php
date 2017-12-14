<?php
/**
 * Initialize roles used in this theme
 */
function init_theme_roles() {
	$datenlieferant_caps = array(
		'read'                    => true,
		'upload_files'            => true,
		'create_datasets'         => true,
		'edit_datasets'           => true,
		'edit_private_datasets'   => true,
		'edit_published_datasets' => true,
		'publish_datasets'        => true,
		'read_private_datasets'   => true,
		'assign_keywords'         => true,
		'edit_posts'              => true, // this cap is used to edit attachment details
		'harvester_dashboard'     => true,
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
		'assign_keywords'              => true,
		'edit_posts'                   => true, // this cap is used to edit attachment details, (Without it we also can't access the list view)
		'edit_others_posts'            => true, // this cap is used to edit attachment details
		'delete_posts'                 => true, // this cap is used to delete attachments
		'delete_others_posts'          => true, // this cap is used to delete attachments
		'list_users'                   => true,
		'edit_users'                   => true,
		'promote_users'                => true,
		'edit_organisation_users'       => true,
	);
	init_role( 'data_owner', 'Data Owner', $data_owner_caps );

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
		'delete_posts'           => true, // this cap is used to delete attachments
		'delete_others_posts'    => true, // this cap is used to delete attachments
	);
	init_role( 'content_manager', 'Content Manager', $content_manager_caps );
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
	$disabled_roles = array(
		'author',
		'editor',
		'subscriber',
		'contributor',
	);

	foreach ( $disabled_roles as $role ) {
		if ( isset( $roles[ $role ] ) ) {
			unset( $roles[ $role ] );
		}
	}

	return $roles;
}

/**
 * Disables default WordPress roles in user list (members plugin somehow overwrites WP filter)
 *
 * @param array $roles Available roles.
 *
 * @return array
 */
function disable_default_roles_members_plugin( $roles ) {
	$disabled_roles = array(
		'author',
		'editor',
		'subscriber',
		'contributor',
	);

	foreach ( $disabled_roles as $role ) {
		if ( ( $key = array_search( $role, $roles ) ) !== false ) {
			unset( $roles[ $key ] );
		}
	}

	return $roles;
}

// Create OGD-CH roles on theme change
add_action( 'after_switch_theme', 'init_theme_roles' );

// Disable default WordPress roles
add_filter( 'editable_roles', 'disable_default_roles' );
add_filter( 'members_manage_roles_items', 'disable_default_roles_members_plugin' );
