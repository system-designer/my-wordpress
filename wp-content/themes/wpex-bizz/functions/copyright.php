<?php
/**
 * Outputs the footer copyright info
 * @package WordPress
 * @subpackage Bizz WPExplorer Theme
 * @since Bizz 1.0
 */


if ( ! function_exists( 'wpex_copyright' ) ) {

	function wpex_copyright() {

		$copy = get_theme_mod('wpex_copyright'); ?>

		<?php
		// Display custom copyright
		if ( $copy ) {
			echo do_shortcode( $copy ); ?>
		<?php
		// Copyright fallback
		} else { ?>
			&copy; <?php _e( 'Copyright', 'wpex' ); ?> <?php the_date( 'Y' ); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
		<?php } ?>

		<?php

	} // end wpex_copyright

} // end function_exists 