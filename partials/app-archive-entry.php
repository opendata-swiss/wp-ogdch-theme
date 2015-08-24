<div class="row">
	<div class="col-lg-2">
		<?php
		$icon_id = get_post_meta( get_the_ID(),  '_app-showcase-app_icon_id', true );
		$author_name = get_post_meta( get_the_ID(), '_app-showcase-app_author_name', true );
		$author_email = get_post_meta( get_the_ID(), '_app-showcase-app_author_email', true );
		$version = get_post_meta( get_the_ID(), '_app-showcase-app_version', true );
		echo wp_get_attachment_image( $icon_id, 'app-image' );
		?>
	</div>
	<div class="col-lg-10">
		<?php
		echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
		echo '<p>Author: <a href="mailto:' . $author_email .'">' . $author_name . '</a></p>';
		echo '<p>Version: ' . $version . '</p>';
		echo '<p>' . the_content() . '</p>';
		echo '<p><a href="' . esc_attr( get_permalink() ) . '">Details</a></p>';
		?>
	</div>
</div>