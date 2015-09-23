<?php get_header(); ?>


	<header class="container">
		<div class="row">
			<div class="col-md-4">
				<p><strong>Open Government Data Switzerland</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
				<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button">Learn more about opendata.swiss</a>
			</div>
			<div class="col-md-8 headline text-md-right">
				<?php
				$dataset_count = get_dataset_count();
				?>
				<div id="opendata-count"><?php echo number_format_i18n( $dataset_count['total_count'] ); ?></div>
				<div class="title">Open Datasets</div>
			</div>
		</div>
	</header>

	<div id="content">
		<!-- Explore -->
		<section id="explore" class="container">
			<div class="row">
				<div class="col-md-8">
					<h2>What you can find</h2>
				</div>
				<div class="col-md-4 text-md-right">
					<form class="h2-vertical-center" action="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>" role="search">
						<div class="form-group has-feedback">
							<input type="search" class="form-control" id="q" name="q" placeholder="<?php esc_attr_e( 'Search opendata.swiss', 'ogdch' ); ?>">
							<i class="fa fa-search form-control-feedback" aria-hidden="true"></i>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Data Categories</h3>
				</div>
			</div>

			<div class="row">
				<?php
				$current_post = 1;
				$shown_groups = 12;
				$group_count  = count( $dataset_count['groups'] );

				foreach( $dataset_count['groups'] as $group_name => $count ) {
					$args = array(
						'meta_key' => '_ckan_local_group_ckan_name',
						'meta_value' => $group_name,
						'post_type' => 'ckan-local-group',
						'post_status' => 'published',
						'posts_per_page' => 1
					);
					$groups = get_posts($args);
					?>
					<?php if ( $current_post === $shown_groups + 1 ): ?>
						<div class="collapse" id="collapsed-category">
					<?php endif; ?>
					<div class="col-md-3 col-sm-6 category">
						<?php
						$ckan_name = get_post_meta( $groups[0]->ID, '_ckan_local_group_ckan_name', true );
						$title     = get_localized_meta( $groups[0]->ID, '_ckan_local_group_title_' );
						?>
						<h4>
							<a href="<?php echo esc_url( get_page_link_by_slug( 'group/' . $ckan_name ) ); ?>"><?php echo $title; ?></a> <?php echo $count; ?>
						</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<?php if ( $group_count > $shown_groups && ( $current_post === $group_count ) ): ?>
						</div>
					<?php endif; ?>

					<?php $current_post ++; ?>
				<?php } ?>

				<?php if ( $group_count > $shown_groups ): ?>
					<div class="col-sm-12">
						<p>
							<a class="btn btn-default" id="collapse-category-btn" role="button" data-toggle="collapse" href="#collapsed-category" aria-expanded="false" aria-controls="collapsed-category">
								Weitere Kateogrien
							</a>
						</p>
					</div>
				<?php endif; ?>
			</div>

			<hr/>
		</section>

		<!-- How -->
		<section id="how" class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>How you can build</h2>
				</div>
				<div class="col-md-3 text-md-right">
					<a class="btn btn-primary h2-vertical-center" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button">Read our FAQ</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-6 step">
					<div class="number">1</div>
					<div class="description">
						<h3><a href="#">Find Data</a></h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 step">
					<div class="number">2</div>
					<div class="description">
						<h3><a href="#">Use Data</a></h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 step">
					<div class="number">3</div>
					<div class="description">
						<h3><a href="#">Share App</a></h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
			</div>

			<hr/>
		</section>

		<!-- Trending -->
		<section id="trending" class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>What's trending now</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-6">
					<h3>Popular Datasets</h3>

					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>

					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>" role="button">All Datasets</a>
				</div>
				<div class="col-md-4 col-sm-6">
					<h3>Active Publishers</h3>

					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>

					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>" role="button">All Publishers</a>
				</div>
				<div class="col-md-4 col-sm-6">
					<h3>Latest Applications</h3>

					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="dataset-teaser">
						<h4><a href="#">List group item heading</a></h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>

					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'app' ) ); ?>" role="button">All Applications</a>
				</div>
			</div>

			<div id="last-tweet" class="row">
				<div class="col-xs-12">
					<blockquote>
						<p><i class="fa fa-twitter"></i> <a href="#">@grssnbchr</a> er hat an der <a href="#">#opendatach</a> Konferenz letzte Woche nochmals darüber gesprochen...</p>
						<small>Stefan Oderbolz <a href="#">@odi</a> / 05.07.2015</small>
					</blockquote>
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>