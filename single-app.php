<?php get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php esc_attr_e( get_post_type_archive_link( 'app' ) ); ?>">< Back to App-List</a>
		</div>
	</div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>
			<div class="row">
				<?php get_template_part( 'partials/app', 'entry' ); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
