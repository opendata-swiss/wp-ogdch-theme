<?php
/**
 * Custom post type update messages.
 *
 * See /wp-admin/edit-form-advanced.php
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended post update messages with new CPT update messages.
 */
function ogd_cpt_updated_messages( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );
	$singular = $post_type_object->labels->singular_name;

	$messages[ $post_type ] = array(
		0  => '', // Unused. Messages start at index 1.
	    1  => sprintf( __( '%s updated.', 'ogdch' ), esc_attr( $singular ) ),
	    2  => __( 'Custom field updated.', 'ogdch' ),
	    3  => __( 'Custom field deleted.', 'ogdch' ),
	    4  => sprintf( __( '%s updated.', 'ogdch' ), esc_attr( $singular ) ),
		/* translators: %1$s: post title / %2$s: revision title */
	    5  => isset( $_GET['revision'] ) ? sprintf( __( '%1$s restored to revision from %2$s', 'ogdch' ), esc_attr( $singular ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	    6  => sprintf( __( '%s published.', 'ogdch' ), $singular ),
	    7  => sprintf( __( '%s saved.', 'ogdch' ), esc_attr( $singular ) ),
	    8  => sprintf( __( '%s submitted.', 'ogdch' ), $singular ),
	    9  => sprintf( __( '%1$s scheduled for: <strong>%2$s</strong>.', 'ogdch' ), $singular, date_i18n( __( 'M j, Y @ G:i', 'ogdch' ), strtotime( $post->post_date ) ) ),
	    10 => sprintf( __( '%s draft updated.', 'ogdch' ), $singular ),
	);

	if ( $post_type_object->publicly_queryable ) {
		$permalink = get_permalink( $post->ID );

		$view_link = sprintf( __( ' <a href="%s">View %s</a>', 'ogdch' ), esc_url( $permalink ), $singular );
		$messages[ $post_type ][1] .= $view_link;
		$messages[ $post_type ][6] .= $view_link;
		$messages[ $post_type ][9] .= $view_link;

		$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
		$preview_link = sprintf( __( ' <a target="_blank" href="%s">Preview %s</a>', 'ogdch' ), esc_url( $preview_permalink ), $singular );
		$messages[ $post_type ][8]  .= $preview_link;
		$messages[ $post_type ][10] .= $preview_link;
	}

	return $messages;
}
add_filter( 'post_updated_messages', 'ogd_cpt_updated_messages' );
