<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package queensland_holidays
 */

?>

		</div><!-- #content -->
	</div><!-- #page -->
</div><!-- .container -->
<div class="container-full" id="footer-menu">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<footer id="colophon" class="site-footer" role="contentinfo">
		<p>Copyright © <?php echo of_get_option('copyright_text'); ?>: <?php the_date('Y'); ?> All Rights Reserved.</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
