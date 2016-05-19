<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>


	</div><!-- /main-content -->
		<?php if( of_get_option( 'widgetized_footer' ) ) { ?>
			<footer id="footer" class="site-footer">
				<div id="footer-widgets" class="row clr">
					<div class="footer-box span_6 col clr-margin">
						<?php dynamic_sidebar('footer-one'); ?>
					</div><!-- .footer-box -->
					<div class="footer-box span_6 col">
						<?php dynamic_sidebar('footer-two'); ?>
					</div><!-- .footer-box -->
					<div class="footer-box span_6 col">
						<?php dynamic_sidebar('footer-three'); ?>
					</div><!-- .footer-box -->
					<div class="footer-box span_6 col">
						<?php dynamic_sidebar('footer-four'); ?>
					</div><!-- .footer-box -->
				</div><!-- #footer-widgets -->
			</footer><!-- #footer -->
		<?php } ?>
		<div id="footer-bottom" class="row clr">
			<div id="copyright" class="span_12 col clr-margin" role="contentinfo">
				<?php
				// Copyright
				if ( of_get_option( 'custom_copyright' ) ) {
					echo do_shortcode( of_get_option( 'custom_copyright' ) );
				} ?>
			</div><!-- /copyright -->
			<div id="footer-menu" class="span_12 col">
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'footer_menu',
					'sort_column'		=> 'menu_order',
					'fallback_cb'		=> '',
				)); ?>
			</div><!-- /footer-menu -->
		</div><!-- /footer-bottom -->
	</div><!-- /wrap -->

<?php wp_footer(); ?>
</body>
</html>