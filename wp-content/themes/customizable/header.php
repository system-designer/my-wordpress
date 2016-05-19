<?php
/**
 * The Header for our theme
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 <?php  global $customizable_options; $customizable_options = get_option( 'faster_theme_options' ); if(!empty($customizable_options['favicon'])){?>
<link rel="shortcut icon" href="<?php echo esc_url($customizable_options['favicon']);?>">
<?php } ?>
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<header>
  <div class="top_header">
    <div class="container customize-container">
      <div class="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <?php if(empty($customizable_options['logo'])){?><h1><?php bloginfo( 'name' ); ?></h1><?php }else{echo  "<img src='".esc_url($customizable_options['logo'])."' class='img-responsive'/>";}?>
      
        </a>
        <h6 class="site-description">
          <?php bloginfo( 'description' ); ?>
        </h6>
      </div>
      <div class="header_right">
        <div class="navbar-header pull-right">
          <button type="button" class="navbar-toggle navbar-toggle-top" id="menu-trigger"> <span class="sr-only"></span> <span class="icon-bar icon-color"></span> <span class="icon-bar icon-color"></span> <span class="icon-bar icon-color"></span> </button>
        </div>
        <nav class="customize-menu">
          <?php wp_nav_menu(array('theme_location'  => 'primary','container' => ' ')); ?>
        </nav>
        <div class="search_box">
          <form id="form_search" name="form_search" method="get" action="<?php echo site_url();?>">
            <input type="text" name="s" id="search_top" />
            <input type="button" name="btn1" id="btn_top" value="" />
          </form>
        </div>
      </div>
    </div>
    <?php if ( get_header_image() ) : ?>
    <div id="site-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""> </a> </div>
    <?php endif; ?>
  </div>
</header>
