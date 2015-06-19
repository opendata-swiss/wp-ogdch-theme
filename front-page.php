<?php get_header(); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php get_template_part( 'partials/frontpage', 'datasets' ); ?>
			</div>
			<div class="col-md-6">
				<?php get_template_part( 'partials/frontpage', 'groups' ); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>