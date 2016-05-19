<?php
/**
 * The default template for displaying video post format content.
 *
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */


/**
  Posts
**/

if ( is_singular() && is_main_query() ) { ?>

	<?php
	// Display post video
	// See functions/commons.php
	wpex_post_video(); ?>

<?php }

/**
  Entries
**/
else { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		// Display post thumbnail
		if ( has_post_thumbnail() && get_theme_mod( 'wpex_blog_entry_thumb', '1' ) == '1' ) { ?>
			<div class="loop-entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
					<img src="<?php echo wpex_get_featured_img_url(); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
					<div class="loop-entry-video-overlay"><i class="fa fa-play-circle-o"></i></div>
				</a>
			</div><!-- .post-entry-thumbnail -->
		<?php } ?>
		<div class="loop-entry-text clr">
			<header>
			<h2 class="loop-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
			<?php
			// Display post meta details
			wpex_post_meta() ;?>
			</header>
			<div class="loop-entry-content entry clr">
				<?php if ( get_theme_mod( 'wpex_entry_content_excerpt','excerpt' ) == 'content' ) {
					the_content();
				} else {
					$wpex_readmore = get_theme_mod( 'wpex_blog_readmore' ) == '1' ? true : false;
					wpex_excerpt( 30, $wpex_readmore );
				} ?>
			</div><!-- .loop-entry-content -->
		</div><!-- .loop-entry-text -->
	</article><!-- .loop-entry -->

<?php } ?>