<?php
/**
 * Portfolio theme options
 * @package WordPress
 * @subpackage Bizz WPExplorer Theme
 * @since Bizz 1.0
 */



add_action( 'customize_register', 'wpex_customizer_portfolio' );

function wpex_customizer_portfolio($wp_customize) {

	// Portfolio Section
	$wp_customize->add_section( 'wpex_portfolio' , array(
		'title'      => __( 'Portfolio', 'wpex' ),
		'priority'   => 220,
	) );
	
	// Enable/Disable Portfolio
	$wp_customize->add_setting( 'wpex_portfolio', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_portfolio', array(
		'label'		=> __('Portfolio Post Type','wpex'),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Portfolio Comments
	$wp_customize->add_setting( 'wpex_portfolio_comments', array(
		'type'		=> 'theme_mod',
		'default'	=> ''
	) );

	$wp_customize->add_control( 'wpex_portfolio_comments', array(
		'label'		=> __('Portfolio Comments','wpex'),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_comments',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Portfolio Related
	$wp_customize->add_setting( 'wpex_portfolio_related', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_portfolio_related', array(
		'label'		=> __('Portfolio Related','wpex'),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_related',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Posts Per Page - Homepage
	$wp_customize->add_setting( 'wpex_home_portfolio_count', array(
		'type'		=> 'theme_mod',
		'default'	=> '4',
	) );
	
	$wp_customize->add_control( 'wpex_home_portfolio_count', array(
		'label'		=> __('Portfolio Homepage Posts Per Page','wpex'),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_home_portfolio_count',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'wpex_portfolio_posts_per_page', array(
		'type'		=> 'theme_mod',
		'default'	=> '12',
	) );
	
	$wp_customize->add_control( 'wpex_portfolio_posts_per_page', array(
		'label'		=> __('Archive Posts Per Page','wpex'),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_posts_per_page',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

}