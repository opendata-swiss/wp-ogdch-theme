<?php get_header(); ?>
<?php get_template_part( 'content', 'breadcrumb' ); ?>

<div class="container">
	<main class="row">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// End the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
