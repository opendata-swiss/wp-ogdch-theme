<?php
/**
 * Template Name: Search
 *
 */

get_header();

$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if ( count( $_GET ) == 0 ) {
	$url .= '?';
}
?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>Groups</h2>
				<?php
				$terms = get_terms( 'ckan_group' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					echo '<ul class="facet">';
					foreach ( $terms as $term ) {
						echo '<li><a href="' . $url . '&groups[]=' . $term->slug . '" slug="' . $term->slug . '" class="facet__term groups__' . $term->slug . '">' . $term->name . ' (<span>' . $term->count . '</span>)</a></li>';
					}
					echo '</ul>';
				}
				?>
				<h2>Organisations</h2>
				<?php
				$terms = get_terms( 'ckan_organisation' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					echo '<ul class="facet">';
					foreach ( $terms as $term ) {
						echo '<li><a href="' . $url . '&organization[]=' . $term->slug . '" slug="' . $term->slug . '" class="facet__term organization__' . $term->slug . '">' . $term->name . ' (<span>' . $term->count . '</span>)</a></li>';
					}
					echo '</ul>';
				}
				?>
			</div>
			<div class="col-md-8">

				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<h1 class="page__title"><?php the_title(); ?></h1>

					<form id="ckan_search" class="form-horizontal" action="<?php echo $url; ?>">
						<div class="form-group form-group-lg">
							<div class="col-sm-12">
								<input class="form-control" type="text" id="q" name="q" placeholder="Term"/>
							</div>
						</div>
					</form>

					<div id="results"></div>

				<?php
				endwhile; endif; ?>
			</div>
		</div>
	</div>

<?php
get_footer(); ?>