<?php get_header(); ?>


<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Open Government Data Switzerland</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
				<button class="btn btn-default" type="submit">Learn more about opendata.swiss</button>
			</div>
			<div class="col-lg-8 headline text-right">
				<div id="opendata-count">1'412</div>
				<div class="title">opendata</div>
				<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMjAgMzIwIj4NCjxwYXRoIGZpbGw9IiNkNTJiMWUiIGQ9Im0wLDBoMzIwdjMyMGgtMzIweiIvPg0KPGcgZmlsbD0iI2ZmZiI+DQo8cGF0aCBkPSJtNjAsMTMwaDIwMHY2MGgtMjAweiIvPg0KPHBhdGggZD0ibTEzMCw2MGg2MHYyMDBoLTYweiIvPg0KPC9nPg0KPC9zdmc+DQo=" />
			</div>
		</div>
	</div>
</header>

<div id="content">
	<!-- Explore -->
	<section id="explore" class="container">
		<div class="row">
			<div class="col-lg-9">
				<h2>What you can find</h2>
			</div>
			<div class="col-lg-3 text-right">
				<form class="form-inline h2-vertical-center" role="search">
					<div class="form-group">
						<input type="search" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e( 'Search opendata.swiss', 'ogdch' ); ?>">
					</div>
					<button type="submit" class="btn btn-default" aria-label="<?php esc_attr_e( 'Search', 'ogdch' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h3>Data Categories</h3>
			</div>
		</div>

		<div class="row">
			<?php
			$args = array(
				'post_type' => 'ckan-local-group',
				'posts_per_page' => -1,
			);
			$groups_query = new WP_Query( $args );
			?>
			<?php while ( $groups_query->have_posts() ) : $groups_query->the_post(); ?>
				<div class="col-lg-3">
					<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a> 12</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</section>


	<!-- How -->
	<section id="how" class="container">
		<div class="row">
			<div class="col-lg-9">
				<h2>How you can build</h2>
			</div>
			<div class="col-lg-3 text-right">
				<a class="btn btn-primary h2-vertical-center" href="#" role="button">Read our FAQ</a>
			</div>
		</div>

		<div class="row">

		</div>
	</section>
</div>



<?php get_footer(); ?>
