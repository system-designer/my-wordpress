<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'web2feel' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/cart.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php 
	wp_enqueue_script('jquery');
	wp_enqueue_script('custom', get_stylesheet_directory_uri() .'/js/custom.js');
	wp_enqueue_script('superfish', get_stylesheet_directory_uri() .'/js/superfish.js'); 
	wp_enqueue_script('bxslider', get_stylesheet_directory_uri() .'/js/jquery.bxSlider.min.js'); 
	wp_enqueue_script('jqzoom', get_stylesheet_directory_uri() .'/js/jquery.jqzoom-core-pack.js'); 	
	wp_enqueue_script('easing', get_stylesheet_directory_uri() .'/js/jquery.easing.1.3.js'); 
?>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">  <!-- wrapper begin -->

<div id="masthead"><!-- masthead begin -->
	<div id="top"> 
		<div class="blogname">	

	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>

			<h2><?php bloginfo( 'description' ); ?> </h2>
		</div>
		<?php get_search_form( ); ?> 
		
		<div class="mycart"><?php echo do_shortcode('[shopping_cart empty_msg="Your shopping cart is empty"]'); ?></div>
		
	</div>
	<div id="botmenu">
		<?php wp_nav_menu( array( 'container_id' => 'subnav', 'theme_location' => 'primary','menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
	</div>
</div><!--end masthead-->

<div id="casing">