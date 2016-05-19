<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="wrap">
	
		<div id="header-wrap" class="clr">
			<header id="header" class="site-header container clr" role="banner">
				<?php
				// Outputs the site logo
				// See functions/logo.php
				wpex_logo(); ?>
				<?php if ( get_theme_mod( 'wpex_header_aside', '1' ) ) { ?>
					<aside id="header-aside" class="clr">
						<?php echo get_theme_mod( 'wpex_header_aside', '<a href="http://www.wpexplorer.com/out/authentic-themes/" target="_blank" rel="nofollow"><img src="'. get_template_directory_uri() .'/images/banner.png" alt="Banner" /></a>'); ?>
					</aside>
				<?php } ?>
			</header><!-- #header -->
		</div><!-- #header-wrap -->

		<div id="site-navigation-wrap">
			<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
			<nav id="site-navigation" class="navigation container main-navigation clr" role="navigation">
				<a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span><?php echo __( 'Menu', 'wpex' ); ?></a>
				<?php
				// Display main menu
				wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'dropdown-menu sf-menu',
					'fallback_cb'		=> false
				) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #site-navigation-wrap -->
		
		<div id="main" class="site-main container clr">