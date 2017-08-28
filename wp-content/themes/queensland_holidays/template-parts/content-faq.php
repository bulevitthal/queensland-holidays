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
				<?php
					//the_content();
					the_field('content');
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'queensland_holidays' ),
						'after'  => '</div>',
					) );
				?>
				<?php $faqs = get_field('faqs');
					if($faqs)	{?>
					<div class="faqPageContainer">
					<?php 
						foreach ($faqs as $faq) { ?>
							<div class="faq">
								<div class="question"><span class="qes">Q: </span><?php echo $faq['question']; ?></div>
								<div class="answer"><span class="ans">A:  </span><?php echo $faq['answer']; ?></div>
							</div>
						<?php }
					?>
					</div>
				<?php }
				?>
				
			</div>
		</div><!-- .entry-content -->

		<?php gallerySectionWrapper(); ?>
		
	</article><!-- #post-## -->
</div>
