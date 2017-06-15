<?php
/**
 * Template part for displaying page content in home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package queensland_holidays
 */

?>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
	<div class="row" id="featured_property">
		<div class="col-md-12">
			<h2>Your exciting holiday memories start here</h2>
		</div>
		<?php 
			$args = array(
				'post_type' => 'post',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'movie_genre',
						'field'    => 'slug',
						'terms'    => array( 'action', 'comedy' ),
					),
					array(
						'taxonomy' => 'actor',
						'field'    => 'term_id',
						'terms'    => array( 103, 115, 206 ),
						'operator' => 'NOT IN',
					),
				),
			);
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<ul>';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<li>' . get_the_title() . '</li>';
				}
				echo '</ul>';
				/* Restore original Post Data */
				wp_reset_postdata();
			}
		?>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row" id="featured-section">
				<div class="col-md-4">
					<div class="feature-section">
						<img src="<?php echo of_get_option('feature-image-1'); ?>" alt="feature 1">
						<div class="feature-inner">
							<h2><?php echo of_get_option('feature-title-1'); ?></h2>
							<ul>
								<?php 
								$specialities = of_get_option('feature-speciality-1');
								if ($specialities) {
									$single_spe = explode(',', $specialities);
									foreach ($single_spe as $key => $value) {
										echo '<li>'.$value.'</li>';
									}
								} ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="feature-section">
						<img src="<?php echo of_get_option('feature-image-2'); ?>" alt="feature 2">
						<div class="feature-inner">
							<h2><?php echo of_get_option('feature-title-2'); ?></h2>
							<ul>
								<?php 
								$specialities = of_get_option('feature-speciality-2');
								if ($specialities) {
									$single_spe = explode(',', $specialities);
									foreach ($single_spe as $key => $value) {
										echo '<li>'.$value.'</li>';
									}
								} ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="feature-section">
						<img src="<?php echo of_get_option('feature-image-3'); ?>" alt="feature 3">
						<div class="feature-inner">
							<h2><?php echo of_get_option('feature-title-3'); ?></h2>
							<ul>
								<?php 
								$specialities = of_get_option('feature-speciality-3');
								if ($specialities) {
									$single_spe = explode(',', $specialities);
									foreach ($single_spe as $key => $value) {
										echo '<li>'.$value.'</li>';
									}
								} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="sun-flag">
				<div class="col-md-3" id="sun-logo">
					<img src="<?php echo of_get_option('sun_logo'); ?>" alt='sun' />
				</div>
				<div class="col-md-6" id="web_url">
					<h3><?php echo of_get_option('web_url'); ?></h3>
				</div>
				<div class="col-md-3" id="aus_flag">
					<img src="<?php echo of_get_option('aus_flag'); ?>" alt='flag' />
				</div>
			</div>
			<div id="footer-gallery" class="clearfix">
				<?php $galleryArray = get_post_gallery_ids($post->ID); ?>

				<?php foreach ($galleryArray as $id) { ?>
					<div class="foot-gal-img">
				    	<img src="<?php echo wp_get_attachment_thumb_url( $id ); ?>">
				    </div>	

				<?php } ?>
			</div>
			<div id="footer-gallery-heading">
				<h2><?php echo get_field('gallery_heading'); ?></h2>
			</div>
		</div>
	</div>		
