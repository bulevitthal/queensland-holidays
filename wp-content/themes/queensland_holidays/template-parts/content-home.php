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
		<?php echo get_field('content'); ?>
	</div><!-- .entry-content -->
	<div class="row" id="prop_slider">
		<div class="col-md-9 slider_left">
			<div id="carousel-home" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  	<ol class="carousel-indicators">
		  		<?php 
					$slider_img = miu_get_images();
					$arr_count = count($slider_img);

					for ($i=0; $i < $arr_count; $i++) { 
						if ($i==0) { ?>
							<li data-target="#carousel-home" data-slide-to="<?php echo $i; ?>" class="active"></li>
						<?php }else{ ?>
							<li data-target="#carousel-home" data-slide-to="<?php echo $i; ?>"></li>
						<?php }
						?>
					 	
				<?php } 
				?>
			  	</ol>

			  <!-- Wrapper for slides -->
			 	<div class="carousel-inner" role="listbox">
			 		<?php 
					$slider_img = miu_get_images();
					$i = 0;
					foreach ($slider_img as $key => $value) { 
						$image_id = pn_get_attachment_id_from_url($value);
						$property_image = wp_get_attachment_image_src( $image_id,"property_slider" );
					?>
					<div class="item <?php if($i==0){echo 'active';} ?>">
						<img src="<?php echo $property_image[0]; ?>" alt="<?php echo 'slide-'.$i; ?>" />
					</div>
					<?php 
					$i++;
					}
					?>
		    	</div>			
		  	</div>
		</div>
		<div class="col-md-3 slider_right">
			<div class="banner-right">
				<?php  $attachment_id = get_field('right_banner_image'); 
				$custom_thumb = wp_get_attachment_image_src( $attachment_id,"right_banner" ); ?>
				<img src="<?php echo $custom_thumb[0]; ?>" />
				<div class="banner-list">
					<?php echo get_field('right_banner_text'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="featured_property">
		<div class="col-md-12">
			<h2>Your exciting holiday memories start here</h2>
		</div>
		<?php 
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'property' ),
				'post_status'            => array( 'publish' ),
				'nopaging'               => true,
				'posts_per_page'         => '4',
				'order'                  => 'DESC',
				'orderby'                => 'date',
				'meta_query' => array(
					array(
						'key' => 'is_featured',
						'compare' => '==',
						'value' => '1'
					)
				)
			);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
					<div class="col-md-3 col-sm-3 featured-property">
						<div class='property_img'>
							<?php the_post_thumbnail('property_thumbnail'); ?>
						</div>
						<div class="property_desc">
							<p class="property_title"><?php echo get_the_title(); ?></p>
							<?php 
								$terms = get_the_terms( get_the_ID(), 'property_category' );
                         		if ( $terms && ! is_wp_error( $terms ) ) : 
								 
								    $property_category = array();
								 
								    foreach ( $terms as $term ) {
								        $property_category[] = $term->name;
								    }
								                         
								    $property_cat = join( ", ", $property_category );
								    ?>
 
								    <p class="property_cat">
								        <?php echo $property_cat; ?>
								    </p>
							<?php endif; ?>
							<?php 
								$terms1 = get_the_terms( get_the_ID(), 'property_location' );
                         		if ( $terms1 && ! is_wp_error( $terms1 ) ) : 
								 
								    $property_location = array();
								 
								    foreach ( $terms1 as $term1 ) {
								        $property_location[] = $term1->name;
								    }
								                         
								    $property_loc = join( ", ", $property_location );
								    ?>
 
								    <p class="property_loc">
								        <?php echo $property_loc; ?>
								    </p>
							<?php endif; ?>
    						<p class="property_link"><a href="<?php echo get_the_permalink(); ?>">View</a></p>	
						</div>
					</div>
			<?php }
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
		?>
	</div>
	<div class="row">
		<div class="col-md-12 center-headline">
			<h2>Fly with the Airline that knows Australia Best</h2>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<div class="row" id="featured-section">
				<div class="col-md-4 col-sm-4">
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
				<div class="col-md-4 col-sm-4">
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
				<div class="col-md-4 col-sm-4">
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
				<div class="col-md-3 col-sm-3" id="sun-logo">
					<img src="<?php echo of_get_option('sun_logo'); ?>" alt='sun' />
				</div>
				<div class="col-md-6 col-sm-6" id="web_url">
					<h3><?php echo of_get_option('web_url'); ?></h3>
				</div>
				<div class="col-md-3 col-sm-3" id="aus_flag">
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
				<h2><?php echo get_field('gallery_heading_default'); ?></h2>
			</div>
		</div>
	</div>		
