<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Bizz WPExplorer Theme
 * @since Bizz 1.0
 */
?>

	<div id="footer-wrap" class="site-footer clr">
		<div id="footer" class="clr">
			<div id="footer-widgets" class="clr">
				<div class="footer-box span_1_of_3 col col-1">
					<?php dynamic_sidebar( 'footer-one' ); ?>
				</div><!-- .footer-box -->
				<div class="footer-box span_1_of_3 col col-2">
					<?php dynamic_sidebar( 'footer-two' ); ?>
				</div><!-- .footer-box -->
				<div class="footer-box span_1_of_3 col col-3">
					<?php dynamic_sidebar( 'footer-three' ); ?>
				</div><!-- .footer-box -->
			</div><!-- #footer-widgets -->
		</div><!-- #footer -->
	</div><!-- #footer-wrap -->

</div><!-- #main-content -->

	<footer id="copyright-wrap" class="clear">
		<div id="copyright" role="contentinfo" class="clr">
			<?php
			// Displays copyright info
			// See functions/copyright.php
			wpex_copyright(); ?>
		</div><!-- #copyright -->
	</footer><!-- #footer-wrap -->
</div><!-- #wrap -->

<?php wp_footer(); ?>
</body>
</html>