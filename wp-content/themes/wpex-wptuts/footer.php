<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */
?>

	</div><!-- #main-content -->

	<footer id="footer-wrap" class="site-footer clr">
		<div id="footer" class="container clr">
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
		<div id="copyright" role="contentinfo" class="container clr">
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