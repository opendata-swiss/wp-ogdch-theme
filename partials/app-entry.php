<?php
$icon_id      = get_post_meta( get_the_ID(), '_app-showcase-app_icon_id', true );
$author_name  = get_post_meta( get_the_ID(), '_app-showcase-app_author_name', true );
$author_email = get_post_meta( get_the_ID(), '_app-showcase-app_author_email', true );
$url          = get_post_meta( get_the_ID(), '_app-showcase-app_url', true );
$related_datasets = get_post_meta( get_the_ID(), '_app-showcase-app_relations', true );
$icon_attributes = wp_get_attachment_image_src( $icon_id, 'full' );
if ( $icon_attributes ) {
	$icon_src = $icon_attributes[0];
} else {
	$icon_src = '/content/themes/wp-ogdch-theme/assets/images/no_image_available.png';
}
?>

<div class="row">
	<div class="col-sm-3 h2-vertical-center">
		<img src="<?php esc_attr_e( $icon_src ); ?>" class="img-responsive" />
	</div>
	<div class="col-sm-9">
		<?php
		echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
		echo '<p class="small">';
		echo the_date();
		// @codingStandardsIgnoreStart
		printf( __( ' | Author: <a href="mailto:%1$s">%1$s</a>', 'ogdch' ), esc_attr( $author_email ) );
		printf( __( ' | Website: <a href="%1$s">%1$s</a>', 'ogdch' ), $url );
		// @codingStandardsIgnoreEnd
		echo '</p>';
		echo '<p>' . the_content() . '</p>';
		if ( ! empty( $related_datasets ) ) {
			// Check if wp-ckan-backend plugin is active
			if ( ! method_exists( 'Ckan_Backend_Helper', 'get_dataset_title' ) ) {
				esc_attr_e( 'Please activate wp-ckan-backend plugin', 'ogdch' );
			} else {
				echo '<div class="collapse" id="collapsed-related-' . esc_attr( get_the_ID() ) . '">';
				echo '<ul>';
				foreach ( $related_datasets as $dataset ) {
					$title = Ckan_Backend_Helper::get_dataset_title( $dataset['dataset_id'] );
					echo '<li><a href="' . esc_attr( get_page_link_by_slug( 'dataset/' . $dataset['dataset_id'] ) ) . '">' . esc_attr( $title ) . '</a></li>';
				}
				echo '</ul>';
				echo '</div>';
				echo '<p class="small"><a id="collapsed-related-' . esc_attr( get_the_ID() ) . '-link" data-toggle="collapse" href="#collapsed-related-' . esc_attr( get_the_ID() ) . '" aria-expanded="false" aria-controls="collapsed-related-' . esc_attr( get_the_ID() ) . '">' . esc_attr__( 'Show related datasets', 'ogdch' ) . '</a></p>';
			}
		}
		?>
	</div>
</div>
