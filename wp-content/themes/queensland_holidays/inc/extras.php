<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package queensland_holidays
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function queensland_holidays_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'queensland_holidays_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function queensland_holidays_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'queensland_holidays_pingback_header' );


function queenslandPageSlider(){ ?>
	<div class="row" id="prop_slider">
		<div class="col-md-9 slider_left">
			<div id="carousel-home" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <?php
			  		$slider_img = miu_get_images();
					$arr_count = count($slider_img);
					if($arr_count > 1){
			   ?>
				  	<ol class="carousel-indicators">
			  		<?php 
						

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
			<?php } ?>

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
				<?php  $attachment_id = get_field('right_banner_image_default'); 
				$custom_thumb = wp_get_attachment_image_src( $attachment_id,"right_banner" ); ?>
				<img src="<?php echo $custom_thumb[0]; ?>" />
				<div class="banner-list">
					<?php echo get_field('right_banner_text_default'); ?>
				</div>
			</div>
		</div>
	</div>
<?php }


/*****************************************************************************
	Gallery HEading
******************************************************************************/


function gallerySectionWrapper(){ 
	global $post;
?>
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row" id="sun-flag">
				<div class="col-md-3" id="sun-logo">
					<img src="<?php echo of_get_option('sun_logo'); ?>" alt='sun' />
				</div>
				<div class="col-md-7" id="web_url">
					<h3><?php echo of_get_option('web_url'); ?></h3>
				</div>
				<div class="col-md-2" id="aus_flag">
					<img src="<?php echo of_get_option('aus_flag'); ?>" alt='flag' />
				</div>
			</div>
			<div id="footer-gallery" class="clearfix">
				<?php $galleryArray = get_post_gallery_ids($post->ID); ?>

				<?php foreach ($galleryArray as $id) { ?>
					<div class="foot-gal-img">
				    	<a href="<?php echo wp_get_attachment_thumb_url( $id ); ?>" rel="prettyPhoto[gallery]"><img src="<?php echo wp_get_attachment_thumb_url( $id ); ?>"></a>
				    </div>	

				<?php } ?>
			</div>
			<?php if(get_field('gallery_heading_default')){ ?>
				<div id="footer-gallery-heading">
					<h2><?php echo get_field('gallery_heading_default'); ?></h2>
				</div>
			<?php } ?>
			
		</div>
	</div>	
<?php }