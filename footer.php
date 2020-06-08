<?php
$dataset_count = get_dataset_count();
$org_count = wp_count_posts( 'ckan-local-org' )->publish;
$group_count = wp_count_posts( 'ckan-local-group' )->publish;
$app_count = get_localized_post_count( 'app' );
$newsletter_url = ogdch_get_localized_newsletter_url();
?>

<!-- Contribute -->
<section class="contribute inverted-container">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-xs-12 ">
				<h2><?php esc_html_e( 'Get involved', 'ogdch' ); ?></h2>
				<p><a href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>"><?php esc_html_e( 'Frequently Asked Questions', 'ogdch' ); ?></a></p>
			</div>
			<div class="col-lg-9 col-md-8 col-xs-12 ">
				<div class="col-xs-12 buttons">
					<a class="btn btn-default-inverted" href="https://handbook.opendata.swiss/" role="button"><?php esc_html_e( 'Learn to publish data', 'ogdch' ); ?></a>
					<a class="btn btn-default-inverted last" href="<?php echo esc_url( get_page_link_by_slug( 'contact' ) ); ?>" role="button"><?php esc_html_e( 'Share your application', 'ogdch' ); ?></a>
				</div>
				<div class="col-xs-12 buttons">
					<a class="btn-twitter" href="https://twitter.com/opendataswiss"
					role="button"
					><img src="/content/themes/wp-ogdch-theme/assets/images/twitter.svg"/></a>
					<?php if ( ! empty( $newsletter_url ) ) : ?>
						<a class="btn btn-default-inverted last" href="<?php esc_html( $newsletter_url ) ?>" role="button"><?php esc_html_e( 'NewsMail Open Government Data', 'ogdch' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>">
					<div class="statsnumber">
						<?php echo esc_html( $dataset_count['total_count'] ); ?> <i class="fa fa-files-o"></i>
					</div>
					<p><?php echo esc_html( _n( 'Dataset', 'Datasets', $dataset_count['total_count'], 'ogdch' ) ); ?></p>
				</a>
			</div>
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>">
					<div class="statsnumber">
						<?php echo esc_html( $org_count ); ?> <i class="fa fa-users"></i>
					</div>
					<p><?php echo esc_html( _n( 'Organization', 'Organizations', $org_count, 'ogdch' ) ); ?></p>
				</a>
			</div>
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'group' ) ); ?>">
					<div class="statsnumber">
						<?php echo esc_html( $group_count ); ?> <i class="fa fa-tags"></i>
					</div>
					<p><?php echo esc_html( _n( 'Category', 'Categories', $group_count, 'ogdch' ) ); ?></p>
				</a>
			</div>
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'showcase' ) ); ?>">
					<div class="statsnumber">
						<?php echo esc_html( $dataset_count['showcase_count'] ); ?> <i class="fa fa-puzzle-piece"></i>
					</div>
					<p><?php echo esc_html( _n( 'Application', 'Applications', $dataset_count['showcase_count'], 'ogdch' ) ); ?></p>
				</a>
			</div>
		</div>
		<div class="row top-buffer">
			<div class="col-xs-12 col-md-6 bottom-buffer">
				<h2><?php esc_html_e( 'A joint project of the Confederation and the cantons', 'ogdch' ); ?></h2>
				<p class="small"><?php esc_html_e( 'The opendata.swiss portal is a joint project of the Confederation, cantons, communes and other organizations with a mandate from the state. It makes open government data available to the general public in a central catalogue. opendata.swiss is operated by the Federal Statistical Office.', 'ogdch' ); ?></p>
			</div>
			<div id="logos" class="col-xs-12 col-md-6">
				<img class="logo-confederation" src="/content/themes/wp-ogdch-theme/assets/images/logo-confederation.png" />
				<img class="logo-egovernment" src="/content/themes/wp-ogdch-theme/assets/images/logo-tf-egovernment-<?php echo esc_attr( get_current_language() ); ?>.png" />
			</div>
		</div>
	</div>
</footer>

<div class="page-footer-navigation">
	<div class="container">
		<div class="language-switcher">
			<?php if ( class_exists( 'Polylang' ) ) : ?>
				<div class="btn-group dropup">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php esc_html_e( pll_current_language( 'name' ) ); ?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<?php
						$languages = pll_the_languages( array( 'raw' => true ) );
						foreach ( $languages as $language ) {
							$active_class = ($language['current_lang']) ? 'active' : '';
							echo '<li class="' . esc_attr( $active_class ) . '"><a href="' . esc_url( $language['url'] ) . '">' . esc_html( $language['name'] ) . '</a></li>';
						}
						?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="footer-navigation">
			<ul class="list-inline small">
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'about' ) ); ?>"><?php esc_html_e( 'About', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'contact' ) ); ?>"><?php esc_html_e( 'Contact', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>"><?php esc_html_e( 'Data', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>"><?php esc_html_e( 'Organizations', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'showcase' ) ); ?>"><?php esc_html_e( 'Applications', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'terms-of-use' ) ); ?>"><?php esc_html_e( 'Terms of use', 'ogdch' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_page_link_by_slug( 'legal-framework' ) ); ?>"><?php esc_html_e( 'Legal framework', 'ogdch' ); ?></a></li>
				<li><a href="https://github.com/opendata-swiss"><?php esc_html_e( 'Sourcecode', 'ogdch' ); ?></a></li>
			</ul>
		</div>
	</div>
</div>

<?php
$piwik_siteid = 0;
if ( defined( 'PIWIK_SITEID' ) && is_int( PIWIK_SITEID ) ) {
	$piwik_siteid = PIWIK_SITEID;
}
?>
<!-- Piwik -->
<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="//<?php echo esc_attr( PIWIK_URL ); ?>/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', <?php echo intval( $piwik_siteid ); ?>]);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	})();
</script>
<noscript><p><img src="//<?php echo esc_attr( PIWIK_URL ); ?>/piwik.php?idsite=<?php echo intval( $piwik_siteid ); ?>" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

<?php wp_footer(); ?>

</body>
</html>
