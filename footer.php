<footer class="container">
	<div class="row">
		<div class="col-lg-12">
			Helllo
			<ul class="nav nav-pills">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Langauge <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php pll_the_languages( array( 'show_flags' => 1 ) ); ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
