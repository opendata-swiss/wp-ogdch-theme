<?php
$icon_id = get_post_meta( get_the_ID(),  '_app-showcase-app_icon_id', true );
$author_name = get_post_meta( get_the_ID(), '_app-showcase-app_author_name', true );
$author_email = get_post_meta( get_the_ID(), '_app-showcase-app_author_email', true );
$version = get_post_meta( get_the_ID(), '_app-showcase-app_version', true );
?>

<div class="row">
	<div class="col-lg-2">
		<?php
		echo wp_get_attachment_image( $icon_id, 'app-image' );
		?>
	</div>
	<div class="col-lg-10">
		<?php
		echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
		echo '<p>';
		echo 'Author: <a href="mailto:' . esc_attr( $author_email ) .'">' . esc_attr( $author_name ) . '</a>';
		echo ' | Version: ' . esc_attr( $version );
		echo '</p>';
		echo '<p>' . the_content() . '</p>';
		if( is_archive() ) {
			echo '<p><a href="' . esc_attr( get_permalink() ) . '">Details</a></p>';
		}
		?>
	</div>
</div>
