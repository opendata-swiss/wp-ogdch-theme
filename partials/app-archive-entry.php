<div class="row">
	<div class="col-lg-4">
		<?php
		$icon_id = get_post_meta( get_the_ID(),  '_app-showcase-app_icon_id', true );
		echo wp_get_attachment_image( $icon_id, 'app-image' );
		?>
	</div>
	<div class="col-lg-8">
		<?php
		echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
		echo '<p>' . the_content() . '</p>';
		echo '<p><a href="' . esc_attr( get_permalink() ) . '">Details</a></p>';
		?>
	</div>
</div>