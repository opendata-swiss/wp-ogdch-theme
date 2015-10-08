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
		<?php the_title( '<h3>', '</h3>' ); ?>
		<p class="small"><?php echo the_date(); ?> | <a href="mailto:<?php echo esc_attr( $author_email ); ?>"><?php echo esc_attr( $author_name ); ?></a> | <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_url( $url ); ?></a></p>
		<p><?php the_content() ?></p>
		<?php
		if ( ! empty( $related_datasets ) ) {
			echo '<h4>' . esc_attr( 'Datasets Used', 'ogdch' ) . '</h4>';
			// Check if wp-ckan-backend plugin is active
			if ( ! method_exists( 'Ckan_Backend_Helper', 'get_dataset_title' ) ) {
				esc_attr_e( 'Please activate wp-ckan-backend plugin', 'ogdch' );
			} else {
				echo '<ul>';
				foreach ( $related_datasets as $dataset ) {
					$title = Ckan_Backend_Helper::get_dataset_title( $dataset['dataset_id'] );
					echo '<li><a href="' . esc_attr( get_page_link_by_slug( 'dataset/' . $dataset['dataset_id'] ) ) . '">' . esc_attr( $title ) . '</a></li>';
				}
				echo '</ul>';
			}
		}
		?>
	</div>
	<div class="col-xs-12">
		<hr/>
	</div>
</div>
