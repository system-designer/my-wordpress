<?php
/**
 * @package WordPress
 * @subpackage Pytheas WordPress Theme
 * This file contains the styling for portfolio entries.
 */


global $wpex_query;

/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/
if ( is_singular() && !$wpex_query ) { ?>


	<div id="portfolio-media">
		<div id="portfolio-media-inner">
			<?php
			// Get attachments
			$attachments = wpex_get_gallery_ids();

			if( $attachments <= '1' && has_post_thumbnail() ) { ?>
				<div class="post-thumbnail">
					<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php the_title_attribute(); ?>" class="prettyphoto-link"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_post_width'),  wpex_img('portfolio_post_height'),  wpex_img('portfolio_post_crop') ) ?>" alt="<?php the_title(); ?>" class="portfolio-entry-img" /></a>
				</div><!-- /post-thumbnail -->
			<?php }
			elseif ( $attachments > '1' ) {
				wp_enqueue_script('flexslider', get_template_directory_uri() .'/js/flexslider.js', array('jquery'), '2.0', true);
				wp_enqueue_script('wpex-slider-home', get_template_directory_uri() .'/js/slider-portfolio.js', array('jquery','flexslider'), '1.0', true); ?>
				<div id="portfolio-slider" class="flexslider-container">
					<div id="portfolio-slider-loader"><i class="fa fa-spinner fa-spin"></i></div>
					<div id="slider-<?php get_the_ID(); ?>" class="flexslider">
						<ul class="slides">
								<?php foreach ( $attachments as $attachment ) : $attachment_meta = wpex_get_attachment( $attachment ); ?>
								<li class="slide">
								<?php if ( wpex_gallery_is_lightbox_enabled() == 'on' ) { ?>
								<a href="<?php echo wp_get_attachment_url( $attachment ); ?>" title="<?php echo $attachment_meta['title']; ?>" rel="prettyPhoto[portfolio_gallery]">
								<?php } ?>
								<img src="<?php echo aq_resize( wp_get_attachment_url($attachment), wpex_img('portfolio_post_width'),  wpex_img('portfolio_post_height'),  wpex_img('portfolio_post_crop') ) ?>" alt="<?php echo $attachment_meta['title']; ?>" />
								<?php if ( wpex_gallery_is_lightbox_enabled() == 'on' ) { ?></a><?php } ?>
								</li>
							<?php endforeach; ?>
						</ul><!-- .slides -->
					</div><!-- /.flexslider -->
				</div><!-- .flexslider-container -->
			<?php } else { /* Nothing to show here*/ } ?>
		</div><!-- #single-portfolio-media-inner -->
	</div><!-- #single-portfolio-media -->


<?php
/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
} else {
	
	global $wpex_count;
	$wpex_clr_margin = ( $wpex_count == 1 ) ? 'clr-margin' : NULL; ?>


	<article id="#post-<?php the_ID(); ?>" <?php post_class('portfolio-entry col span_6 '. $wpex_clr_margin); ?>>
		<?php
		// Display featured image
		if( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="portfolio-entry-img-link">
				<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'),  wpex_img('portfolio_entry_crop') ) ?>" alt="<?php the_title(); ?>" class="portfolio-entry-img" />
			</a>
		<?php } ?>
		<div class="portfolio-entry-description">
			<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="portfolio-entry-excerpt">
				<?php
				//show trimmed excerpt if default excerpt is empty
				echo ( !empty( $post->post_excerpt) ) ? get_the_excerpt() : wp_trim_words(get_the_content(), 15); ?>
			</div><!-- .portfolio-entry-excerpt -->
		</div><!-- .portfolio-entry-description -->
	</article><!-- /portfolio-entry -->

<?php
}