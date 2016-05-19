<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>

<!DOCTYPE html>

<!-- WordPress Theme by WPExplorer (http://www.wpexplorer.com) -->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class('body'); ?>>

	<div id="wrap" class="container clr">
		<header id="masthead" class="site-header clr" role="banner">
			<div class="logo">
				<?php if ( of_get_option('custom_logo') ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php echo get_bloginfo( 'name' ) ?>" /></a>
				<?php } else { ?>
					<?php if ( is_front_page() ) { ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h1>
					<?php } else { ?>
					<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
					<?php }
					if ( get_bloginfo('description') ) {
						echo '<p class="site-description">'. get_bloginfo('description') .'</p>';
					} ?>
				<?php } ?>
			</div><!-- .logo -->
			<div class="masthead-right">
				<?php if ( of_get_option('masterhead_right','<i class="fa fa-phone"></i>Call us: 999-99-99') !== '' ) { ?>
					<div class="masthead-right-content">
						<?php echo of_get_option('masterhead_right','<i class="fa fa-phone"></i>Call us: 999-99-99'); ?>
					</div><!-- .masterhead-right-content -->
				<?php } ?>
				<?php if ( of_get_option('masthead_search','1') ) { ?>
					<div class="masthead-search clr">
						<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php _e( 'Search', 'wpex' ); ?>&hellip;" />
							<button type="submit" class="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
						</form>
					</div><!-- /masthead-search -->
				<?php } ?>
			</div><!-- .masthead-right -->
		</header><!-- .header -->
		<?php
		//show header image only if defined
		if( get_header_image() !='' ) {
			$wpex_show_header_image = ( of_get_option('headerimg_front_page_exclude', '1') == '1' && is_front_page() ) ? 'no' : 'yes';
			if( $wpex_show_header_image == 'yes' ) { ?>
				<img src="<?php header_image(); ?>" alt="<?php get_bloginfo( 'name' ); ?>" id="header-image" />
		<?php
			} $wpex_show_header_image = NULL;
		} ?>

		<div id="navbar" class="navbar clr">
			<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
				<span class="nav-toggle"><?php _e( 'Menu', 'wpex' ); ?><i class="toggle-icon fa fa-arrow-down"></i></span>
				<?php wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'nav-menu dropdown-menu',
					'fallback_cb'		=> false,
					'walker'			=> new WPEX_Dropdown_Walker_Nav_Menu()
				) ); ?>
			</nav><!-- #site-navigation -->
			<?php if ( of_get_option('social','1') == '1') wpex_display_social(); ?>
		</div><!-- #navbar -->
		
	<div id="main" class="site-main row clr fitvids">
		<?php if ( is_singular('page') && has_post_thumbnail() ) { ?>
			<div id="page-featured-img">
				<?php global $post; the_post_thumbnail( $post->ID ); ?>
			</div><!-- #page-featured-img -->
		<?php } ?>
		<?php
		//Yoast SEO breadcrumbs
		if ( !is_front_page() && !is_404() ) {
			if( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<nav id="breadcrumbs">','</nav>');
			}
		} ?>