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
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">OGD.CH</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Langauge <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php
						$translations = pll_the_languages(array('raw'=>1));

						foreach($translations as $translation) {
							echo '<li><a href="' . $translation['url'] . '"><img src="' . $translation['flag'] . '"/> ' . $translation['name'] . '</a></li>';
						}
						?>
					</ul>
				</li>
				<li>
					<a href="<?php echo get_post_type_archive_link( 'ckan-dataset' ); ?>">CKAN-Dataset Archiv</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<header>
	<h1>ODG.CH PORTAL</h1>
</header>