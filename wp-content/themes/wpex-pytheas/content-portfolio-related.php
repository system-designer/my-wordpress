<?php
/**
 * File used to display related posts for single.php
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */

$terms = wp_get_post_terms( get_the_ID(), 'portfolio_category');
if ( isset ( $terms[0] ) ) {
	$wpex_tax_query = array (
		array (
			'taxonomy' => 'portfolio_category',
			'field' 	=> 'id',
			'terms' 	=> $terms[0]->term_id,
		)
	);
} else {
	$wpex_tax_query = NULL;
}

$wpex_query = new WP_Query(
	array(
		'post_type'			=> 'portfolio',
		'posts_per_page'	=> '3',
		'post__not_in'		=> array( get_the_ID() ),
		'no_found_rows'		=> true,
		'orderby'			=> 'rand',
		'tax_query'			=> $wpex_tax_query,
	)
);
if( $wpex_query->posts ) { ?>

	<section class="related-posts row clr">
		<h4 class="heading"><span><?php _e('Related Projects','wpex'); ?></span></h4>
		<?php
		$wpex_count=0;
		while( $wpex_query->have_posts() ) : $wpex_query->the_post();
		$wpex_count++;
		$wpex_clr_margin = ( $wpex_count == 1 ) ? 'clr-margin' : NULL; ?>
			<article <?php post_class('portfolio-entry col span_8 '. $wpex_clr_margin); ?>>
				<?php
				// Display featured image
				if( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="portfolio-entry-img-link">
					<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_related_entry_width'),  wpex_img('portfolio_related_entry_height'),  wpex_img('portfolio_related_entry_crop') ) ?>" alt="<?php the_title(); ?>" class="portfolio-entry-img" />
				</a>
				<?php } ?>
				<div class="portfolio-entry-description">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="portfolio-entry-excerpt">
						<?php
						//show trimmed excerpt if default excerpt is empty
						echo ( !empty( $post->post_excerpt) ) ? get_the_excerpt() : wp_trim_words(get_the_content(), 15); ?>
					</div><!-- .portfolio-entry-excerpt -->
				</div><!-- .portfolio-entry-description -->
			</article><!-- /portfolio-entry -->
		<?php if( $wpex_count == 3 ) {
			echo '<div class="clr"></div>'; $wpex_count=0;
		} ?>
		<?php endwhile; ?>
		<?php
		// Reset postdata
		wp_reset_postdata(); ?>
	</section><!-- #related-posts -->

<?php }
