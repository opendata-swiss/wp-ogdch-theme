<footer class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="statsnumber">
				1'412 <i class="fa fa-files-o"></i>
			</div>
			<p>Open Datasets</p>
		</div>
		<div class="col-md-3">
			<div class="statsnumber">
				24 <i class="fa fa-users"></i>
			</div>
			<p>Data Publishers</p>
		</div>
		<div class="col-md-3">
			<div class="statsnumber">
				7 <i class="fa fa-puzzle-piece"></i>
			</div>
			<p>Built Applications</p>
		</div>
		<div class="col-md-3">
			<div class="statsnumber">
				157 <i class="fa fa-twitter"></i>
			</div>
			<p>Tweets</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<p class="lead">What about you?</p>
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-primary" href="<?php echo get_page_link( 'faq' ); ?>" role="button">How do I publish open data?</a>
			<a class="btn btn-primary" href="app" role="button">How to share the App I built?</a>
		</div>
	</div>
	<div id="info" class="row">
		<div class="col-md-2">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo pll_current_language( 'name' ); ?> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<?php pll_the_languages(); ?>
				</ul>
			</div>
		</div>
		<div class="col-md-4">
			<p>Lorem ipsum dolor sit amet ea ius soluta nusquam constituto. Lorem ipsum dolor sit amet ea ius soluta nusquam constituto</p>
		</div>
		<div class="sitemap col-md-2">
			<p><a href="#">About</a></p>
			<p><a href="#">FAQ</a></p>
			<p><a href="#">Contact</a></p>
		</div>
		<div class="sitemap col-md-2">
			<p><a href="#">Data</a></p>
			<p><a href="#">Publishers</a></p>
			<p><a href="#">Apps</a></p>
		</div>
		<div class="sitemap col-md-2">
			<p><a href="#">API</a></p>
			<p><a href="#">Source Code</a></p>
			<p><a href="#">Legal Terms</a></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
