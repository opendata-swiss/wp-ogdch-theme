<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage OGD-CH
 */

?>

<article <?php post_class( 'col-xs-12' ); ?>>

	<header class="entry-header">
		<?php the_title( '<h1>', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
