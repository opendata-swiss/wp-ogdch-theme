<footer class="container">
	<div class="row">
		<div class="col-sm-3 col-xs-6">
			<div class="statsnumber">
				1'412 <i class="fa fa-files-o"></i>
			</div>
			<p>Open Datasets</p>
		</div>
		<div class="col-sm-3 col-xs-6">
			<div class="statsnumber">
				<?php echo wp_count_posts( 'ckan-local-org' )->publish; ?> <i class="fa fa-users"></i>
			</div>
			<p>Data Publishers</p>
		</div>
		<div class="col-sm-3 col-xs-6">
			<div class="statsnumber">
				<?php echo get_localized_post_count( 'app' ); ?> <i class="fa fa-puzzle-piece"></i>
			</div>
			<p>Built Applications</p>
		</div>
		<div class="col-sm-3 col-xs-6">
			<div class="statsnumber">
				157 <i class="fa fa-twitter"></i>
			</div>
			<p>Tweets</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<p class="lead">What about you?</p>
		</div>
		<div class="col-sm-8 text-md-right">
			<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button">How do I publish open data?</a>
			<a class="btn btn-primary last" href="<?php echo esc_url( get_page_link_by_slug( 'app' ) ); ?>" role="button">How to share the App I built?</a>
		</div>
	</div>
	<div id="info" class="row">
		<div class="col-md-2 col-xs-4">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo pll_current_language( 'name' ); ?> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<?php pll_the_languages( array( 'hide_current' => true ) ); ?>
				</ul>
			</div>
		</div>
		<div class="col-md-4 col-xs-8">
			<p>Lorem ipsum dolor sit amet ea ius soluta nusquam constituto. Lorem ipsum dolor sit amet ea ius soluta nusquam constituto</p>
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
</footer>

<?php wp_footer(); ?>

</body>
</html>
