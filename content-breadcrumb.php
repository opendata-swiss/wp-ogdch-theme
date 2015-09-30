<?php
/**
 * The template used for displaying breadcrumb
 *
 * @package WordPress
 * @subpackage OGD-CH
 */

?>

<nav class="container">
	<div class="row">
		<div class="col-xs-12">
		<?php
		if ( function_exists( 'bootstrap_breadcrumb' ) ) {
			bootstrap_breadcrumb();
		}
		?>
		</div>
	</div>
</nav>
