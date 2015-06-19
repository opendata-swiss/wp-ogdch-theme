<h2><?php _e('Newest shiny datasets!', 'ogdch'); ?></h2>

<?php
$args = array(
	'post_type' => 'ckan-dataset',
	'order'     => 'DESC',
);

// The Query
$the_datasets_query = new WP_Query( $args );

// The Loop
if ( $the_datasets_query->have_posts() ) {
	echo '<ul>';
	while ( $the_datasets_query->have_posts() ) {
		$the_datasets_query->the_post();
		get_template_part( 'partials/post', 'dataset-teaser' );
	}
	echo '</ul>';
} else {
	echo '<p>' . __('Nothing found!', 'ogdch') . '</p>';
}
/* Restore original Post Data */
wp_reset_postdata();