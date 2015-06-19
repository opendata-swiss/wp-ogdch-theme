<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();?>
					<h2 class="post__title"><?php the_title(); ?></h2>
					<h3>Ref ID</h3>
					<?php var_dump( get_post_meta( get_the_ID(), '_ckandataset_reference' , true ) ); ?>

					<h3>Last update</h3>
					<?php var_dump( get_post_meta( get_the_ID(), '_ckandataset_last_request' , true ) ); ?>

					<h3>Data</h3>
					<pre><?php var_dump( get_post_meta( get_the_ID(), '_ckandataset_response' , true ) ); ?></pre>
				<?php endwhile; ?>

			<?php else : ?>
				Nix gefunden
			<?php endif; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<?php comments_template(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
