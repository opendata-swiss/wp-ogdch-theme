<?php

// =======================================================================//
// Theme Functions
// =======================================================================//

function get_localized_meta( $post_id, $meta_name ) {
	global $language_priority;

	// try to get meta in current language
	$localized_meta = get_post_meta( $post_id, $meta_name . pll_current_language(), true );
	if( !empty( $localized_meta) ) {
		return $localized_meta;
	}

	// use other languages as fallback
	foreach( $language_priority as $lang ) {
		$localized_meta = get_post_meta( $post_id, $meta_name . $lang, true );
		if( !empty( $localized_meta ) ) {
			return $localized_meta;
		}
	}
	return false;
}


add_filter('nav_menu_css_class' , 'add_class_to_current_item' , 10 , 2);
function add_class_to_current_item($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}

function get_page_link_by_slug($slug) {
	return '/' . pll_current_language() . '/' . $slug;
}

function get_localized_post_count( $post_type ) {
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
	);
	$posts = new WP_Query( $args );
	return $posts->found_posts;
}