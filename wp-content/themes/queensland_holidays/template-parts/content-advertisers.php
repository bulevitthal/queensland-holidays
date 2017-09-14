<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package queensland_holidays
 */

?>

<div class="mainPageContainer">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
				$slider_img = miu_get_images();
				$arr_count = count($slider_img);
				if($arr_count > 0){
					queenslandPageSlider(); 
				}
			?>
			<div class="pageContent">
				<h2 class="text-center"><?php the_field('page_heading'); ?></h2>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<?php the_content(); ?>
						<div class="registrationWrapper">
							<ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
							    <li role="presentation"><a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Sign Up</a></li>
							 </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="login">
							    	<?php 
							    		//echo do_shortcode('[theme-my-login]');
							    	dynamic_sidebar('login-sidebar');
							    	 ?>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="signup">
							    	<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]'); ?>
							    </div>
							   </div>
						</div>
						<?php
							//the_content();
							the_field('content');
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'queensland_holidays' ),
								'after'  => '</div>',
							) );
						?>
					</div>
				</div>
				
				
				
			</div>
		</div><!-- .entry-content -->

		<?php gallerySectionWrapper(); ?>
		
	</article><!-- #post-## -->
</div>
