<?php get_header(); ?>


<header class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php bootstrap_breadcrumb(); ?>
				<h1><?php post_type_archive_title(); ?></h1>
			</div>
		</div>
	</div>
</header>

<div class="container">

	<div class="row">
		<div class="col-xs-12">
			<h2><?php esc_attr_e( 'Are you an interested open data user?' ,'ogdch' ); ?></h2>
			<p><?php esc_attr_e( 'We present a selection of applications and visual representations created using datasets from the opendata.swiss portal. If you have developed an application, please contact us.' ,'ogdch' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'contact' ) ); ?>" role="button"><?php esc_attr_e( 'Know more about building apps', 'ogdch' ); ?></a>
		</div>
	</div>

	<hr />

	<div class="row">
		<div class="col-xs-12">
			<h2>
				<?php
				$dataset_count = get_localized_post_count( 'app' );
				printf(
					_n( '%s Built Application', '%s Built Applications', $dataset_count, 'ogdch' ),
					number_format_i18n( $dataset_count )
				);
				?>
			</h2>
		</div>
	</div>

	<?php
	$args = array(
		'post_type' => 'app',
		'post_status' => 'publish',
		// @codingStandardsIgnoreStart
		'posts_per_page' => -1,
		// @codingStandardsIgnoreEnd
	);
	// The Query
	$app_query = new WP_Query( $args );

	// The Loop
	if ( $app_query->have_posts() ) {
		while ( $app_query->have_posts() ) {
			$app_query->the_post();
			get_template_part( 'partials/app', 'entry' );
		}
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>

</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
