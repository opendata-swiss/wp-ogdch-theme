<?php get_header(); ?>


<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post();?>

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
			<?php get_template_part( 'partials/app', 'entry' ); ?>
		</div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
