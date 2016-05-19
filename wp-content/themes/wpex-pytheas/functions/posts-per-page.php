<?php
/**
 * This file filters the default WP pagination where needed
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
*/

$wpex_option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'wpex_modify_posts_per_page', 0);

if ( ! function_exists( 'wpex_modify_posts_per_page' ) ) {
	
	function wpex_modify_posts_per_page() {
		add_filter( 'option_posts_per_page', 'wpex_option_posts_per_page' );
	}

}

if ( ! function_exists ( 'wpex_option_posts_per_page' ) ) {
	
	function wpex_option_posts_per_page( $value ) {
		global $wpex_option_posts_per_page;
		
		// Portfolio Pagination
		if( is_tax('portfolio_category') || is_tax('portfolio_tag') || is_post_type_archive('portfolio') ) {
			return of_get_option('portfolio_pagination','12');
		}
		
		// Services Pagination
		if( is_tax('services_category') || is_tax('services_tag') || is_post_type_archive('services') ) {
			return of_get_option('services_pagination','12');
		}
		
		// Search pagination
		if( is_search() ) {
			return of_get_option('search_pagination','10');
		}
		
		// Everything else
		else {
			return $wpex_option_posts_per_page;
		}
	}

}