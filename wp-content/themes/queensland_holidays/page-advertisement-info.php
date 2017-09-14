<?php
/**
* Template Name: Advertisers Page
*/

get_header(); ?>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) :


					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>

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
											
											<?php
												//echo do_shortcode('[gravityform id="4" title="true" description="true" ajax="true"]');
												//the_field('content');
											the_content();
											?>
										</div>
									</div>
									
									
									
								</div>
							</div><!-- .entry-content -->

							<?php gallerySectionWrapper(); ?>
							
						</article><!-- #post-## -->
					</div>


					<?php endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!–col-md-12 col-xs-12 –>
	</div>
	<?php get_footer(); ?>
