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
	<div id="explore">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<h2>What you can find</h2>
				</div>
				<div class="col-lg-3 text-right">
					<form class="form-inline" role="search">
						<div class="form-group">
							<input type="search" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e( 'Search opendata.swiss', 'ogdch' ); ?>">
						</div>
						<button type="submit" class="btn btn-default" aria-label="<?php esc_attr_e( 'Search', 'ogdch' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>

			</div>

			<div class="row">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post();?>
						<div class="col-lg-12">
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php the_content(); ?>
							<hr>
						</div>
					<?php endwhile; ?>

				<?php else : ?>
					<?php echo '<p>' . esc_html( __( 'Nothing found!', 'ogdch' ) ) . '</p>'; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>
