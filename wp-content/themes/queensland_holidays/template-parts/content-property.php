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
		<h2><?php echo get_the_title(); ?></h2>
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
	<div class="row" id="map-search">
		<div class="col-md-7">
			<form action="#" method="post">
				<input type="search" name="sname" placeholder="Enter Suburb or Post Code" />
				<input type="checkbox" name="scheck" value="surround"> <label for="scheck">Surrounding Suburbs</label>
				<a class="map-button" data-toggle="modal" data-target="#mapsearchModal"> Search </a> 
			</form>
		</div>
		<div class="col-md-5">
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mapModal">View Map</button>
		</div>
	</div>
	<div class="row" id="featured_property">
		<div class="col-md-12">
			<h2><?php 
			$location = get_field('suburb');
			$term = get_term_by('term_id', $location, 'property_location');
			echo $term->name;
			?></h2>
		</div>
		<?php 
			
			$prop_cat = get_field('archive_for_property_categories');
			$args = array(
				'post_type'              => array( 'property' ),
				'post_status'            => array( 'publish' ),
				'nopaging'               => true,
				'posts_per_page'         => '-1',
				'order'                  => 'DESC',
				'orderby'                => 'date',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'property_location',
						'field'    => 'term_id',
						'terms'    => $location,
					),
					array(
						'taxonomy' => 'property_category',
						'field'    => 'term_id',
						'terms'    => $prop_cat,
					),
				),
			);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) { ?>
			<div class="owl-carousel col-md-12 owl-theme" id="carousel-property"> 
				<?php while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
					<div class="featured-property">
						<div class='property_img'>
							<?php the_post_thumbnail('property_thumbnail'); ?>
						</div>
						<div class="property_desc">
							<p class="property_title"><?php echo get_the_title(); ?></p>
							<?php 
								$terms1 = get_the_terms( get_the_ID(), 'property_location' );
                         		if ( $terms1 && ! is_wp_error( $terms1 ) ) : 
								 
								    $property_location = array();
								 
								    foreach ( $terms1 as $term1 ) {
								        $property_location[] = $term1->name;
								    }
								                         
								    $property_loc = join( ", ", $property_location );
						    ?>
 
								    <p class="property_cat">
								        <?php echo $property_loc; ?>
								    </p>
							<?php endif; ?>
							
 								<?php 
								$rate = get_field('rate');
                         		if ( $rate ) :  ?>
								    <p class="property_loc">
								        <?php echo 'From $'.$rate. ' / night'; ?>
								    </p>
							<?php endif; ?>
							<?php $link = get_field('link'); ?>
							<?php if($link){ ?>
    							<p class="property_link"><a target="_blank" href="<?php echo $link; ?>">View</a></p>	
    						<?php }else{ ?>
    							<p class="property_link"><a href="<?php echo get_the_permalink(); ?>">View</a></p>	
    						<?php } ?>
						</div>
					</div>
			<?php } ?>
			
			</div>
			
			<?php } else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
		?>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
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
			<div id="footer-gallery-text">
				<?php echo get_field('after_gallery_section'); ?>
			</div>
		</div>
	</div>		
	<?php vit_property_map($prop_cat, $location); ?>
	<?php vit_search_property_map($prop_cat, $postcode); ?>
	<div id="mapModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	     		<div class="modal-body">
	     			<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<div id="map_wrapper">
			    		<div id="map_canvas" class="mapping" style="width: 100%;height:500px;"></div>
					</div>
	      		</div>
	     	</div>
		</div>
	</div>
	<div id="mapsearchModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	     		<div class="modal-body">
	     			<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<div id="map_wrapper">
			    		<div id="map_search_canvas" class="mapping" style="width: 100%;height:500px;"></div>
					</div>
	      		</div>
	     	</div>
		</div>
	</div>