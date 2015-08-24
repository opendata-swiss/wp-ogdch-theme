<?php get_header(); ?>


<div class="container">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Apps... Yay!</h1>
		</div>
	</div>

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
			get_template_part( 'partials/app', 'archive-entry' );
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