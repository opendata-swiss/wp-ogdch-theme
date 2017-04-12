<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" sizes="128x128" href="<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/images/favicon-128.png">
	<link rel="icon" sizes="192x192" href="<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/images/favicon-192.png">
	<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/images/favicon-128.png">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$banner_active = ( 'on' === ogdch_get_option( 'banner_active' ) );
$banner_title = ogdch_get_localized_option( 'banner_title' );
$banner_text = ogdch_get_localized_option( 'banner_text' );
?>

<?php if ( $banner_active ) : ?>
<div class="alert alert-info" role="alert">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="h4"><?php echo esc_html( $banner_title ); ?></h2>
				<p><?php echo esc_html( $banner_text ); ?></p>
			</div>
		</div>
	</div>
</div>
<?php endif ?>

<nav class="navbar navbar-default" id="main-navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation-collapse">
				<span class="sr-only"><?php esc_attr_e( 'Toggle navigation', 'ogdch' ); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/images/logo_horizontal.svg" onerror="this.onerror=null;this.src='<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/images/logo_horizontal.png'" class="navbar-brand-image" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" />
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="main-navigation-collapse" role="navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'main_navigation',
				'depth' => 2,
				'menu_class' => 'nav navbar-nav navbar-right',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="search"><a href="' . esc_url( get_page_link_by_slug( 'dataset' ) ) . '" title="' . __( 'Search', 'ogdch' ) . '"><i class="fa fa-search" aria-hidden="true"></i></a></li></ul>',
				'walker' => new wp_bootstrap_navwalker(),
				'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
			) );
			?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>
