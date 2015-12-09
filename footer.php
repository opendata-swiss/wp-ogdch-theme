<?php
$dataset_count = get_dataset_count();
?>

<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>">
					<div class="statsnumber">
						<?php esc_html_e( $dataset_count['total_count'] ); ?> <i class="fa fa-files-o"></i>
					</div>
					<p><?php esc_attr_e( 'Datasets' ,'ogdch' ); ?></p>
				</a>
			</div>
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>">
					<div class="statsnumber">
						<?php esc_html_e( wp_count_posts( 'ckan-local-org' )->publish ); ?> <i class="fa fa-users"></i>
					</div>
					<p><?php esc_attr_e( 'Organizations', 'ogdch' ); ?></p>
				</a>
			</div>
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'group' ) ); ?>">
					<div class="statsnumber">
						<?php esc_html_e( wp_count_posts( 'ckan-local-group' )->publish ); ?> <i class="fa fa-tags"></i>
					</div>
					<p><?php esc_attr_e( 'Categories', 'ogdch' ); ?></p>
				</a>
			</div>
			<div class="col-sm-3 col-xs-6">
				<a href="<?php echo esc_url( get_page_link_by_slug( 'app' ) ); ?>">
					<div class="statsnumber">
						<?php esc_html_e( get_localized_post_count( 'app' ) ); ?> <i class="fa fa-puzzle-piece"></i>
					</div>
					<p><?php esc_attr_e( 'Applications', 'ogdch' ); ?></p>
				</a>
			</div>
		</div>
		<div class="row top-buffer">
			<div class="col-md-4 col-xs-12">
				<p class="lead"><?php esc_attr_e( 'How can you get involved?', 'ogdch' ); ?></p>
			</div>
			<div class="col-md-8 col-xs-12">
				<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button"><?php esc_attr_e( 'I want to publish data', 'ogdch' ); ?></a>
				<a class="btn btn-primary last" href="<?php echo esc_url( get_page_link_by_slug( 'contact' ) ); ?>" role="button"><?php esc_attr_e( 'I have developed an application', 'ogdch' ); ?></a>
			</div>
		</div>
		<div class="row top-buffer">
			<div class="col-md-2 col-xs-12">
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
								echo '<li class="' . esc_attr( $active_class ) . '"><a href="' . esc_url( $language['url'] ) . '">' . esc_html( $language['name'] ) . '</a></li>';
							}
							?>
						</ul>
					</div>
				<?php
				}
				?>
			</div>
			<div class="col-md-2 col-xs-6">
				<ul class="list-unstyled">
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'about' ) ); ?>"><?php esc_html_e( 'About', 'ogdch' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'ogdch' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'contact' ) ); ?>"><?php esc_html_e( 'Contact', 'ogdch' ); ?></a></li>
				</ul>
			</div>
			<div class="col-md-2 col-xs-6">
				<ul class="list-unstyled">
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>"><?php esc_html_e( 'Data', 'ogdch' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>"><?php esc_html_e( 'Organizations', 'ogdch' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'app' ) ); ?>"><?php esc_html_e( 'Applications', 'ogdch' ); ?></a></li>
				</ul>
			</div>
			<div class="col-md-2 col-xs-6">
				<ul class="list-unstyled">
					<li><a href="<?php echo esc_url( get_page_link_by_slug( 'legal-framework' ) ); ?>"><?php esc_html_e( 'Legal framework', 'ogdch' ); ?></a></li>
					<li><a href="http://docs.ckan.org/en/latest/api/index.html" target="_blank"><?php esc_html_e( 'API', 'ogdch' ); ?></a></li>
					<li><a href="https://github.com/ogdch/ckanext-switzerland"><?php esc_html_e( 'Sourcecode', 'ogdch' ); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="row top-buffer">
			<div class="col-xs-12">
				<h2><?php esc_attr_e( 'A joint project of the Confederation and the cantons', 'ogdch' ); ?></h2>
				<p><?php esc_attr_e( 'The opendata.swiss portal is a joint project of the Confederation, cantons, communes and other organizations with a mandate from the state. It makes open government data available to the general public in a central catalogue. opendata.swiss is operated by the Swiss Federal Archives.', 'ogdch' ); ?></p>
			</div>
		</div>
		<div id="logos" class="row top-buffer">
			<div class="col-xs-12">
				<img class="logo-confederation" src="/content/themes/wp-ogdch-theme/assets/images/logo-confederation.png" />
				<img class="logo-egovernment" src="/content/themes/wp-ogdch-theme/assets/images/logo-egovernment.png" />
			</div>
		</div>
	</div>
</footer>

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
