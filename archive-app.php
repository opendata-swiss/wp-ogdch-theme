<?php get_header(); ?>


<div class="container">

	<?php
	$args = array(
		'post_type' => 'app',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);
	// The Query
	$app_query = new WP_Query( $args );

	// The Loop
	if ( $app_query->have_posts() ) {
		while ( $app_query->have_posts() ) {
			$app_query->the_post();
			echo '<div class="row"><div class="col-12">' . get_the_title() . '</div></div>';
		}
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>

</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>