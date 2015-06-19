<?php get_header(); ?>


<div class="container">
    <div class="grid">

		<?php if ( have_posts() ) : ?>
		    <?php while ( have_posts() ) : the_post();?>
		        <div class="grid__col grid__col--2-of-4">
		            <h1 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		            <?php the_content(); ?>
		            <hr>
		        </div>
		    <?php endwhile; ?>

		<?php else : ?>
		    <?php echo '<p>' . __('Nothing found!', 'ogdch') . '</p>'; ?>
		<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
