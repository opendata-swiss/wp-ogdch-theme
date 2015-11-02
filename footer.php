<?php
$dataset_count = get_dataset_count();
?>

<footer class="container page-footer top-buffer">
	<div class="row">
		<div class="col-sm-3 col-xs-6">
			<a href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>">
				<div class="statsnumber">
					<?php esc_html_e( number_format_i18n( $dataset_count['total_count'] ) ); ?> <i class="fa fa-files-o"></i>
				</div>
				<p><?php esc_attr_e( 'Open Datasets' ,'ogdch' ); ?></p>
			</a>
		</div>
		<div class="col-sm-3 col-xs-6">
			<a href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>">
				<div class="statsnumber">
					<?php esc_html_e( number_format_i18n( wp_count_posts( 'ckan-local-org' )->publish ) ); ?> <i class="fa fa-users"></i>
				</div>
				<p><?php esc_attr_e( 'Organizations', 'ogdch' ); ?></p>
			</a>
		</div>
		<div class="col-sm-3 col-xs-6">
			<a href="<?php echo esc_url( get_page_link_by_slug( 'app' ) ); ?>">
				<div class="statsnumber">
					<?php esc_html_e( number_format_i18n( get_localized_post_count( 'app' ) ) ); ?> <i class="fa fa-puzzle-piece"></i>
				</div>
				<p><?php esc_attr_e( 'Built Applications', 'ogdch' ); ?></p>
			</a>
		</div>
		<div class="col-sm-3 col-xs-6">
			<a href="https://twitter.com/OpendataCH" target="_blank">
				<div class="statsnumber">
					<?php esc_html_e( number_format_i18n( get_tweet_count() ) ); ?> <i class="fa fa-twitter"></i>
				</div>
				<p><?php esc_attr_e( 'Tweets', 'ogdch' ); ?></p>
			</a>
		</div>
	</div>
	<div class="row top-buffer">
		<div class="col-sm-4">
			<p class="lead"><?php esc_attr_e( 'What about you?', 'ogdch' ); ?></p>
		</div>
		<div class="col-sm-8 text-md-right">
			<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button"><?php esc_attr_e( 'How do I publish open data?', 'ogdch' ); ?></a>
			<a class="btn btn-primary last" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button"><?php esc_attr_e( 'How do I use open data?', 'ogdch' ); ?></a>
		</div>
	</div>
	<div class="row top-buffer">
		<div class="col-md-2 col-xs-4">
			<?php
			if ( class_exists( 'Polylang' ) ) {
			?>
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php esc_html_e( pll_current_language( 'name' ) ); ?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<?php
						$languages = pll_the_languages( array( 'raw' => true ) );
						foreach ( $languages as $language ) {
							$active_class = ($language['current_lang']) ? 'active' : '';
							echo '<li class="' . esc_attr( $active_class ) . '"><a href="' . esc_url( $language['url'] ) . '">' . esc_attr( $language['name'] ) . '</a></li>';
						}
						?>
					</ul>
				</div>
			<?php
			}
			?>
		</div>
		<div class="col-md-4 col-xs-8">
			<p><?php esc_attr_e( 'The portal opendata.swiss is a joint project of the federal government, cantons and municipalities. It provides the public authorities open data of all federal levels in a central catalog. The Swiss Federal Archives operates opendata.swiss.', 'ogdch' ); ?></p>
		</div>
		<div class="col-md-2 col-xs-4">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'about_navigation',
				'menu_class'     => 'list-unstyled',
			) );
			?>
		</div>
		<div class="col-md-2 col-xs-4">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'data_navigation',
				'menu_class'     => 'list-unstyled',
			) );
			?>
		</div>
		<div class="col-md-2 col-xs-4">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'developer_navigation',
				'menu_class'     => 'list-unstyled',
			) );
			?>
		</div>
	</div>
	<div id="logos" class="row top-buffer">
		<div class="col-xs-12">
			<img class="logo-confederation" src="/content/themes/wp-ogdch-theme/assets/images/logo-confederation.png" />
			<img class="logo-egovernment" src="/content/themes/wp-ogdch-theme/assets/images/logo-egovernment.png" />
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
