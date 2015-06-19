<h2>Freshest groups in town!</h2>

<?php
$taxonomies = array(
	'ckan_group',
);

$args = array(
	'orderby' => 'name',
	'order'   => 'ASC',
);

$terms = get_terms( $taxonomies, $args );

if ( count( $terms > 0 ) ) {
	echo '<ul>';
	foreach ( $terms as $term ) {
		echo '<li>' . $term->name . '</li>';
	}
	echo '</ul>';
} else {
	echo '<p>' . __('Nothing found!', 'ogdch') . '</p>';
}