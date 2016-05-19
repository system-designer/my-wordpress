<?php
/**
 * The default template for displaying content. Used for both single and index/archive.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
 
 

/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/

if ( is_singular() && is_main_query() ) {
	 
	if( of_get_option('blog_single_thumbnail' ) == '1' && has_post_thumbnail() ) { ?>
		<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php the_title_attribute(); ?>" class="prettyphoto-link" id="post-thumbnail"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_post_width'),  wpex_img('blog_post_height'),  wpex_img('blog_post_crop') ) ?>" alt="<?php echo the_title(); ?>" /></a>
	<?php }

}

/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
else {
	
	global $wpex_count;
	$wpex_clr_margin = ( $wpex_count == 1 ) ? 'clr-margin' : NULL; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry clr '. $wpex_clr_margin); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="blog-entry-img-link">
				<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_entry_width'),  wpex_img('blog_entry_height'),  wpex_img('blog_entry_crop') ) ?>" alt="<?php echo the_title(); ?>" />
			</a>
		<?php } ?>
		<div class="blog-entry-details">
			<header><h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
			<ul class="meta clr">
				<li><span class="fa fa-clock-o"></span><?php echo get_the_date(); ?></li>
				<li><span class="fa fa-folder-open"></span><?php the_category(' / '); ?></li>
				<?php if( comments_open() ) { ?>
					<li><span class="fa fa-comment"></span><?php comments_popup_link(__('Leave a comment', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link', __('Comments closed', 'wpex')); ?></li>
				<?php } ?>
				<li><span class="fa fa-user"></span><?php the_author_posts_link(); ?></li>
			</ul><!-- .meta -->
			<div class="blog-entry-content">
				<?php
				if ( of_get_option('blog_exceprt','1') == '1' ) {
					the_excerpt();
				} else {
					the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpex' ) );
				} ?>
			</div><!-- /entry-content -->
		</div><!-- /blog-entry-details -->
	</article><!-- /blog-entry-entry -->

<?php } ?>