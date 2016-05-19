<?php 
/**
 * Library of Theme options functions.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/

// Display Breadcrumb navigation
function brickyard_get_breadcrumb() { 
global $brickyard_options_db;
		if ($brickyard_options_db['brickyard_display_breadcrumb'] != 'Hide') { ?>
<?php if (function_exists( 'bcn_display' ) && !is_front_page()){ _e('<div class="entry-content entry-content-bcn"><div class="entry-content-inner"><p class="breadcrumb-navigation">', 'brickyard'); ?><?php bcn_display(); ?><?php _e('</p></div></div>', 'brickyard');} ?>
<?php } 
} 

// Display featured images on single posts
function brickyard_get_display_image_post() { 
global $brickyard_options_db;
		if ($brickyard_options_db['brickyard_display_image_post'] == '' || $brickyard_options_db['brickyard_display_image_post'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function brickyard_get_display_image_page() { 
global $brickyard_options_db;
		if ($brickyard_options_db['brickyard_display_image_page'] == '' || $brickyard_options_db['brickyard_display_image_page'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} ?>