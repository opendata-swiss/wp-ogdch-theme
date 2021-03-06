<?php
/**
 * Cleanup Header
 *
 * @return void
 */
function head_cleanup() {
	global $sitepress;
	global $wp_widget_factory;

	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10 );
	remove_action( 'wp_head', 'start_post_rel_link', 10 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', array( $sitepress, 'meta_generator_tag' ) );
	remove_action( 'wp_head', 'start_post_rel_link', 10 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	remove_action( 'wp_head', 'rel_canonical' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

	remove_action( 'wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style',
	) );

	add_filter( 'use_default_gallery_style', '__return_null' );
}

add_action( 'init', 'head_cleanup' );

/**
 * Remove Dashboard Widgets
 *
 * @return void
 */
function remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
	remove_meta_box( 'notepad_widget', 'dashboard', 'side' );

}

add_action( 'admin_init', 'remove_dashboard_widgets' );
