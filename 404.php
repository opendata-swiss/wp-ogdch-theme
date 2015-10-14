<?php get_header(); ?>

<header class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php bootstrap_breadcrumb(); ?>
				<h1><?php esc_attr_e( 'Page not found', 'ogdch' ); ?></h1>
			</div>
		</div>
	</div>
</header>

<section class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<p class="lead"><?php esc_attr_e( "Ooops... The page you're looking for isn't available. Here is a cool space shuttle to make you feel better!", 'ogdch' ); ?></p>
			<p><i class="fa fa-space-shuttle fa-5x"></i></p>
		</div>
	</div>
</section>

<?php get_footer(); ?>
