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
					<div class="col-sm-8 col-sm-offset-2">
						<div class="registrationWrapper">
							<ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
							    <li role="presentation"><a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Sign Up</a></li>
							 </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="login">
							    	<?php 
							    		$args = array(
											'echo'           => true,
											'remember'       => true,
											'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
											'form_id'        => 'loginform',
											'id_username'    => 'user_login',
											'id_password'    => 'user_pass',
											'id_remember'    => 'rememberme',
											'id_submit'      => 'wp-submit',
											'label_username' => __( 'User Name: ' ),
											'label_password' => __( 'Password: ' ),
											'label_remember' => __( 'Remember Me' ),
											'label_log_in'   => __( 'Log In' ),
											'value_username' => '',
											'value_remember' => false
										);

										wp_login_form($args);
							    	 ?>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="signup">
							    	<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
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
