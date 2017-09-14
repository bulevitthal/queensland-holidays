<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package queensland_holidays
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Pacifico" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/2b5366dc94.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
<div class="container">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'queensland_holidays' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="col-md-12" id="header-top">
				<?php if(is_user_logged_in()){ ?>
				<a href="<?php echo site_url(); ?>/my-account/">My Account</a>    <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
				<?php }else{ ?>
				<a href="<?php echo get_page_link(of_get_option('login_page_url')); ?>">Advertiser's Log In & Sign Up</a>
				<?php } ?>
			</div>
			<div class="col-md-6 clearfix" id="header-social">
				<ul>
					<li class="facebook-social"><a href="<?php echo of_get_option('facebook_url'); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
					<li class="twitter-social"><a href="<?php echo of_get_option('twitter_url'); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
					<li class="gplus-social"><a href="<?php echo of_get_option('gplus_url'); ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
					<li class="pinterest-social"><a href="<?php echo of_get_option('pinterest_url'); ?>"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
					<li class="linkedin-social"><a href="<?php echo of_get_option('linkedin_url'); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
					<li class="instagram-social"><a href="<?php echo of_get_option('instagram_url'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="site-branding col-md-6">
				<?php
				if(of_get_option('logo')){ ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo of_get_option('logo'); ?>" /></a>
				<?php 
				}else{ ?>				
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php 
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; 
				} ?>
			</div><!-- .site-branding -->
		</div>
		<div id="header-top-menu" class="clearfix">
			<div class="top-1">
				<img src="<?php echo of_get_option('header-t-l-img'); ?>" alt="header-top"/>
			</div>
			<div class="top-2">
				<a href="<?php echo of_get_option('top-bar-url-1'); ?>"><?php echo of_get_option('top-bar-name-1'); ?></a>
			</div>
			<div class="top-3">
				<a href="<?php echo of_get_option('top-bar-url-2'); ?>"><?php echo of_get_option('top-bar-name-2'); ?></a>
			</div>
			<div class="top-4">
				<a href="<?php echo of_get_option('top-bar-url-3'); ?>"><?php echo of_get_option('top-bar-name-3'); ?></a>
			</div>
			<div class="top-5">
				<a href="<?php echo of_get_option('top-bar-url-4'); ?>"><?php echo of_get_option('top-bar-name-4'); ?></a>
			</div>
		</div>

		<nav class="navbar navbar-inverse " role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div><!--end navbar-header-->
			<div class="collapse navbar-collapse menu-primary" id="bs-example-navbar-collapse-1">
				<?php
				wp_nav_menu( array(
					'menu'              => '',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => '',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
				?>
			</div><!--end navbar-colapse-->
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
