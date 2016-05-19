<?php
/**
 * Lets setup our theme!
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.3
 */

add_action( 'after_setup_theme', 'pytheas_setup' );
function pytheas_setup() {
	
	// Localization support
	load_theme_textdomain( 'wpex', get_template_directory() .'/languages' );
	
	// Editor CSS
	// add_editor_style( 'css/editor-style.css' );

	// Register navigation menus
	register_nav_menus (
		array(
			'main_menu' => __('Main','wpex'),
			'footer_menu' => __('Footer','wpex')
		)
	);
		
	// Add theme support
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-background');
	add_theme_support('post-thumbnails');

	//custom header
	$custom_header_defaults = array(
		'default-image' => '',
		'random-default' => false,
		'width' => '1040',
		'height' => 150,
		'flex-height' => true,
		'flex-width' => false,
		'default-text-color' => '',
		'header-text' => true,
		'uploads' => true,
		'wp-head-callback' => '',
		'admin-head-callback' => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $custom_header_defaults );

}