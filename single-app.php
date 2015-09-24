<?php get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>
			<div class="row">
				<?php get_template_part( 'partials/app', 'entry' ); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
