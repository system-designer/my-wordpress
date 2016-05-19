<?php
/**
 * @package WordPress
 * @subpackage Pytheas WordPress Theme
 * This file registers the theme's widget regions
 */


register_sidebar( array (
	'name' => __( 'Sidebar','wpex'),
	'id' => 'sidebar',
	'description' => __( 'Widgets in this area are used in the default sidebar.','wpex' ),
	'before_widget' => '<div class="sidebar-box %2$s clr">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="heading widget-title"><span>',
	'after_title' => '</span></h4>',
) );


if( of_get_option('widgetized_footer') ) {
	
	register_sidebar( array (
		'name' => __( 'Footer 1','wpex'),
		'id' => 'footer-one',
		'description' => __( 'Widgets in this area are used in the first footer column','wpex' ),
		'before_widget' => '<div class="footer-widget %2$s clr">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );
	
	register_sidebar( array (
		'name' => __( 'Footer 2','wpex'),
		'id' => 'footer-two',
		'description' => __( 'Widgets in this area are used in the second footer column','wpex' ),
		'before_widget' => '<div class="footer-widget %2$s clr">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>'
	) );
	
	register_sidebar( array (
		'name' => __( 'Footer 3','wpex'),
		'id' => 'footer-three',
		'description' => __( 'Widgets in this area are used in the third footer column','wpex' ),
		'before_widget' => '<div class="footer-widget %2$s clr">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );
	
	register_sidebar( array (
		'name' => __( 'Footer 4','wpex'),
		'id' => 'footer-four',
		'description' => __( 'Widgets in this area are used in the fourth footer column','wpex' ),
		'before_widget' => '<div class="footer-widget %2$s clr">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );
	
}