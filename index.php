<?php get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Welcome to opendata.swiss</h1>
		</div>
	</div>

    <div class="row">

		<?php if ( have_posts() ) : ?>
		    <?php while ( have_posts() ) : the_post();?>
		        <div class="col-lg-12">
		            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		            <?php the_content(); ?>
		            <hr>
		        </div>
		    <?php endwhile; ?>

		<?php else : ?>
		    <?php echo '<p>' . esc_html( __( 'Nothing found!', 'ogdch' ) ) . '</p>'; ?>
		<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
