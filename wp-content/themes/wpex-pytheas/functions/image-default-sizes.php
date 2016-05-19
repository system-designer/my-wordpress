<?php
/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
*/
 
if ( ! function_exists( 'wpex_img' ) ) :

	function wpex_img($args){

		//slider
		if( $args == 'slider_width' ) return '1040';
		if( $args == 'slider_height' ) return '400';
		if( $args == 'slider_crop' ) return true;

		//blog home entries
		if( $args == 'blog_home_entry_width' ) return '700';
		if( $args == 'blog_home_entry_height' ) return '350';
		if( $args == 'blog_home_entry_crop' ) return true;

		//blog entries
		if( $args == 'blog_entry_width' ) return '700';
		if( $args == 'blog_entry_height' ) return '350';
		if( $args == 'blog_entry_crop' ) return true;

		//blog related entries
		if( $args == 'blog_related_entry_width' ) return '700';
		if( $args == 'blog_related_entry_height' ) return '350';
		if( $args == 'blog_related_entry_crop' ) return true;

		//blog post
		if( $args == 'blog_post_width' ) return '700';
		if( $args == 'blog_post_height' ) return '350';
		if( $args == 'blog_post_crop' ) return true;

		//portfolio entries
		if( $args == 'portfolio_entry_width' ) return '700';
		if( $args == 'portfolio_entry_height' ) return '350';
		if( $args == 'portfolio_entry_crop' ) return true;

		//portfolio related entries
		if( $args == 'portfolio_related_entry_width' ) return '700';
		if( $args == 'portfolio_related_entry_height' ) return '350';
		if( $args == 'portfolio_related_entry_crop' ) return true;

		//portfolio post
		if( $args == 'portfolio_post_width' ) return '700';
		if( $args == 'portfolio_post_height' ) return '350';
		if( $args == 'portfolio_post_crop' ) return true;

		//service post
		if( $args == 'service_post_width' ) return '700';
		if( $args == 'service_post_height' ) return '350';
		if( $args == 'service_post_crop' ) return true;

	}

endif;