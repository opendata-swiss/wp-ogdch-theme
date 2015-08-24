<?php get_header(); ?>

<a href="<?php esc_attr_e( get_post_type_archive_link( 'app' ) ); ?>">Back to App-List</a>

<div class="container">
	<div class="row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();?>
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>

		<?php else : ?>
			Nix gefunden
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
