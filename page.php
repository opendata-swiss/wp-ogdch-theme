<?php get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>
	<header class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php bootstrap_breadcrumb(); ?>
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
		<main class="row">
			<article <?php post_class( 'col-xs-12' ); ?>>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
// End the loop.
endwhile;
?>

<?php get_footer(); ?>
