<?php get_header(); ?>


	<header class="page-header front-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="lead"><?php esc_attr_e( 'The portal opendata.swiss is a joint project of the confederation, cantons, municipalities and further organizations with a public mandate. It provides open government data for the public in a central catalog. The Swiss Federal Archives operates opendata.swiss.', 'ogdch' ); ?></p>
					<a class="btn btn-default-inverted" href="<?php echo esc_url( get_page_link_by_slug( 'about' ) ); ?>" role="button"><?php esc_attr_e( 'Learn more about opendata.swiss', 'ogdch' ); ?></a>
				</div>
				<div class="col-md-offset-1 col-md-5 text-md-right text-xs-center">
					<div class="headline">
						<?php
						$dataset_count = get_dataset_count();
						?>
						<div id="opendata-count"><?php esc_html_e( number_format_de( $dataset_count['total_count'] ) ); ?></div>
						<div class="title"><?php esc_attr_e( 'Open Datasets', 'ogdch' ); ?></div>
					</div>
					<form action="<?php echo esc_url( get_page_link_by_slug( 'dataset' ) ); ?>" role="search">
						<div class="form-group has-feedback">
							<input type="search" class="form-control input-lg" id="q" name="q" placeholder="<?php esc_attr_e( 'Search datasets...', 'ogdch' ); ?>">
							<i class="fa fa-search form-control-feedback" aria-hidden="true"></i>
						</div>
					</form>
				</div>
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
				$groups_args   = array(
					// @codingStandardsIgnoreStart
					'posts_per_page' => -1,
					'meta_key'       => '_ckan_local_group_title_' . get_current_language(),
					'orderby'        => 'meta_value',
					'order'          => 'ASC',
					// @codingStandardsIgnoreEnd
					'post_type'      => 'ckan-local-group',
					'post_status'    => 'publish',
				);
				$groups_query   = new WP_Query( $groups_args );
				$col_count      = 3;
				$gourps_per_col = ceil( $groups_query->post_count / $col_count );
				$col_size       = 12 / $col_count;

				// The Loop
				if ( $groups_query->have_posts() ) {
					while ( $groups_query->have_posts() ) {
						$groups_query->the_post();

						if ( 0 === $current_group % $gourps_per_col ) {
							echo '<ul class="col-md-' . esc_attr( $col_size ) . ' list-unstyled">';
						}

						$ckan_name = get_post_meta( get_the_ID(), '_ckan_local_group_ckan_name', true );
						$title     = get_localized_meta( get_the_ID(), '_ckan_local_group_title_' );
						$count     = $dataset_count['groups'][ $ckan_name ];
						echo '<li class="category"><strong><a href="' . esc_url( get_page_link_by_slug( 'group/' . $ckan_name ) ) . '">' . esc_attr( $title ) . '</a> <small>' . esc_attr( $count ) . '</small></strong></li>';

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
				<div class="col-md-6">
					<h2><?php esc_attr_e( 'How it works', 'ogdch' ); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h3><i class="fa fa-files-o"></i> <?php esc_attr_e( 'Data publisher', 'ogdch' ); ?></h3>
					<p><?php esc_attr_e( 'Are you an organization interested in publishing your open data on this portal?', 'ogdch' ); ?></p>
					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'organization' ) ); ?>" role="button"><?php esc_attr_e( 'How to publish data', 'ogdch' ); ?></a>
				</div>
				<div class="col-sm-6">
					<h3><i class="fa fa-cogs"></i> <?php esc_attr_e( 'Data user', 'ogdch' ); ?></h3>
					<p><?php esc_attr_e( 'Are you interested in using open data listed on this portal to build your own applications?', 'ogdch' ); ?></p>
					<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'faq' ) ); ?>" role="button"><?php esc_attr_e( 'How to use data', 'ogdch' ); ?></a>
				</div>
			</div>
		</section>

	</div>

<?php get_footer(); ?>
