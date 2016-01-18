<?php
$author_name      = get_post_meta( get_the_ID(), '_app-showcase-app_author_name', true );
$author_email     = get_post_meta( get_the_ID(), '_app-showcase-app_author_email', true );
$url              = get_post_meta( get_the_ID(), '_app-showcase-app_url', true );
$related_datasets = get_post_meta( get_the_ID(), '_app-showcase-app_relations', true );
?>

<div class="row">
	<div class="col-sm-3 header-sm-vertical-center">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
		} else {
			echo '<img src="/content/themes/wp-ogdch-theme/assets/images/app.png" class="img-responsive" />';
		}
		?>
	</div>
	<div class="col-sm-9">
		<?php the_title( '<h3>', '</h3>' ); ?>
		<p class="small"><?php the_time( get_option( 'date_format' ) ); ?> | <a href="mailto:<?php echo esc_attr( $author_email ); ?>"><?php echo esc_attr( $author_name ); ?></a> | <a href="<?php echo esc_url( $url ); ?>" class="break-word"><?php echo esc_url( $url ); ?></a></p>
		<p><?php the_content() ?></p>
		<?php
		if ( ! empty( $related_datasets ) ) {
			echo '<h4>' . esc_attr__( 'Used datasets', 'ogdch' ) . '</h4>';
			// Check if wp-ckan-backend plugin is active
			if ( ! method_exists( 'Ckan_Backend_Helper', 'get_dataset_title' ) ) {
				esc_attr_e( 'Please activate wp-ckan-backend plugin', 'ogdch' );
			} else {
				echo '<ul>';
				foreach ( $related_datasets as $related_dataset ) {
					$dataset = Ckan_Backend_Helper::get_dataset( $related_dataset['dataset_id'], false );
					if ( $dataset ) {
						$dataset_title = Ckan_Backend_Helper::get_localized_text( $dataset['title'] );
						echo '<li><a href="' . esc_attr( get_page_link_by_slug( 'dataset/' . $dataset['name'] ) ) . '">' . esc_html( $dataset_title ) . '</a></li>';
					} else {
						echo '<li>' . esc_html( $related_dataset['dataset_id'] ) . '</li>';
					}
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
