<?php
/**
 * Adds custom CSS to the site header
 *
 * @package WordPress
 * @subpackage Total
 * @since Total 1.0
 */


if ( is_admin() ) return; // We don't need this in the admin


if ( !function_exists( 'wpex_header_css' ) ) {
	
	function wpex_header_css() {
	
		$custom_css ='';

		// Remove background image
		$disable_background_image = of_get_option( 'disable_background_image' );
		if ( '1' == $disable_background_image ) {
			$custom_css .= 'body { background-image: none;';
		}

		
		// trim white space for faster page loading
		$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
		// output css on front end
		if ( $custom_css_trimmed ) {
			$css_output = "<!-- Header CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
		} else {
			$css_output = '';
		}
		if( $css_output ) {
			echo $css_output;
		}
		
	} // End function
	
} // End if

add_action('wp_head', 'wpex_header_css');