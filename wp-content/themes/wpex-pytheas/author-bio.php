<?php
/**
 * The template for displaying Author bios.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>

<div class="author-info row clr">
	<h4 class="heading"><span><?php printf( __( 'About %s', 'wpex' ), get_the_author() ); ?></span></h4>
	<div class="author-avatar col span_4 clr-margin">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 74 ) ); ?>
	</div><!-- .author-avatar -->
	<div class="author-description col span_18 clr-margin">
		<p>
			<?php the_author_meta( 'description' ); ?>
			<br />
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'wpex' ), get_the_author() ); ?>
			</a>
		</p>
	</div><!-- .author-description -->
</div><!-- .author-info -->