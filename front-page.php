<?php get_header(); ?>


	<header class="container front-header">
		<div class="row">
			<div class="col-md-6">
				<p class="lead"><?php pll_e( get_theme_mod( 'introduction_text' ) ); ?></p>
				<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button"><?php esc_attr_e( 'Learn more about opendata.swiss', 'ogdch' ); ?></a>
			</div>
			<div class="col-md-offset-1 col-md-5 text-md-right text-xs-center">
				<div class="headline">
					<?php
					$dataset_count = get_dataset_count();
					?>
					<div id="opendata-count"><?php esc_html_e( number_format_i18n( $dataset_count['total_count'] ) ); ?></div>
					<div class="title"><?php esc_attr_e( 'Open Datasets', 'ogdch' ); ?></div>
				</div>
				<form action="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>" role="search">
					<div class="form-group has-feedback">
						<input type="search" class="form-control input-lg" id="q" name="q" placeholder="<?php esc_attr_e( 'Search opendata.swiss', 'ogdch' ); ?>">
						<i class="fa fa-search form-control-feedback" aria-hidden="true"></i>
					</div>
				</form>
			</div>
		</div>
	</header>

	<div id="content">
		<!-- Explore -->
		<section id="explore" class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><?php esc_attr_e( 'What you can find', 'ogdch' ); ?></h2>
				</div>
			</div>

			<div class="row">
				<?php
				$current_group = 0;
				$groups_args = array(
					// @codingStandardsIgnoreStart
					'posts_per_page' => -1,
					'meta_key'       => '_ckan_local_group_title_' . get_current_language(),
					'orderby'        => 'meta_value',
					'order'          => 'ASC',
					// @codingStandardsIgnoreEnd
					'post_type'      => 'ckan-local-group',
					'post_status'    => 'publish',
				);
				$groups_query = new WP_Query( $groups_args );
				$gourps_per_col = ceil( $groups_query->post_count / 3 );

				// The Loop
				if ( $groups_query->have_posts() ) {
					while ( $groups_query->have_posts() ) {
						$groups_query->the_post();

						if ( 0 === $current_group % $gourps_per_col ) {
							echo '<ul class="col-md-4 list-unstyled">';
						}

						$ckan_name = get_post_meta( get_the_ID(), '_ckan_local_group_ckan_name', true );
						$title     = get_localized_meta( get_the_ID(), '_ckan_local_group_title_' );
						$count     = $dataset_count['groups'][ $ckan_name ];
						echo '<li class="category"><strong><a href="' . esc_url( get_page_link_by_slug( 'group/' . $ckan_name ) ) . '">' . esc_attr( $title ) . '</a><span>' . esc_attr( $count ) . '</span></strong></li>';

						$current_group++;
						if ( 0 === $current_group % $gourps_per_col ) {
							echo '</ul>';
						}
					}
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>
			</div>

		</section>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<hr/>
				</div>
			</div>
		</div>

		<!-- How -->
		<section id="how" class="container">
			<div class="row">
				<div class="col-md-9">
					<h2><?php esc_attr_e( 'How you can build', 'ogdch' ); ?></h2>
				</div>
				<div class="col-md-3 text-md-right">
					<a class="btn btn-primary h2-vertical-center" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button"><?php esc_attr_e( 'Read our FAQ', 'ogdch' ); ?></a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-6 step">
					<div class="number">1</div>
					<div class="description">
						<h3><a href="#"><?php esc_attr_e( 'Find Data', 'ogdch' ); ?></a></h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 step">
					<div class="number">2</div>
					<div class="description">
						<h3><a href="#"><?php esc_attr_e( 'Use Data', 'ogdch' ); ?></a></h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 step">
					<div class="number">3</div>
					<div class="description">
						<h3><a href="#"><?php esc_attr_e( 'Share App', 'ogdch' ); ?></a></h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
			</div>
		</section>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<hr/>
				</div>
			</div>
		</div>

		<!-- Trending -->
		<section id="trending" class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php esc_attr_e( "What's trending now", 'ogdch' ); ?></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-6">
					<h3><?php esc_attr_e( 'Popular Datasets', 'ogdch' ); ?></h3>

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

					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>" role="button"><?php esc_attr_e( 'All Datasets', 'ogdch' ); ?></a>
				</div>
				<div class="col-md-4 col-sm-6">
					<h3><?php esc_attr_e( 'Active Publishers', 'ogdch' ); ?></h3>

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

					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>" role="button"><?php esc_attr_e( 'All Publishers', 'ogdch' ); ?></a>
				</div>
				<div class="col-md-4 col-sm-6">
					<h3><?php esc_attr_e( 'Latest Applications', 'ogdch' ); ?></h3>

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

					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'app' ) ); ?>" role="button"><?php esc_attr_e( 'All Applications', 'ogdch' ); ?></a>
				</div>
			</div>

			<div id="last-tweet" class="row top-buffer">
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
