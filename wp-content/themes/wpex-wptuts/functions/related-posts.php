<?php
/**
 * Displays related posts (category based)
 *
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */


if ( ! function_exists( 'wpex_related_posts' ) ) {

	function wpex_related_posts() {

		// Return if disabled
		if ( get_theme_mod( 'blog_related', '1' ) !== '1' ) return;
		
		// Get Post Data
		global $post;
		$post_id = $post->ID;

		// Return if not standard post type
		if ( get_post_type( $post) !== 'post') return;

		// Theme Settings
		$disable_related_items = get_post_meta( $post_id, 'wpex_disable_related_items', true );
		$posts_per_page = get_theme_mod( 'blog_related_count', '3' );
	
		// Create an array of current category ID's
		$cats = wp_get_post_terms( $post_id, 'category' );
		$cats_ids = array();
		foreach($cats as $wpex_related_cat) {
			$cats_ids[] = $wpex_related_cat->term_id;
		}
		
		// Related query arguments
		$args = array(
			'posts_per_page'		=> $posts_per_page,
			'orderby' 				=> 'rand',
			'category__in'			=> $cats_ids,
			'post__not_in'			=> array($post_id),
			'no_found_rows'			=> true,
			'tax_query'				=> array (
			'relation'	=> 'AND',
				array (
					'taxonomy'		=> 'post_format',
					'field' 		=> 'slug',
					'terms' 		=> array( 'post-format-quote', 'post-format-link' ),
					'operator'		=> 'NOT IN',
				),
			),
		);
		$wpex_query = new wp_query( $args );
		if( $wpex_query->have_posts() ) { ?>
			 <section class="related-posts boxed clr">
				<div class="related-posts-title heading"><span><?php _e( 'Related Posts', 'wpex' ); ?></span></div>
				<?php
				// Loop through related posts
				$count=0;
				foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
				$count++;
				$postid = $post->ID;
				$attachment_id = get_post_thumbnail_id( $postid ); ?>
					<article class="related-post-entry span_1_of_3 col clr col-<?php echo $count; ?>">
						<?php
						// Display related post thumbnail
						if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="related-post-entry-thumbnail">
								<img src="<?php echo wpex_get_featured_img_url( $attachment_id, false, false ); ?>" alt="<?php echo the_title(); ?>" />
								<?php if ( 'video' == get_post_format() ) { ?>
									<div class="related-post-entry-video-overlay"><i class="fa fa-play-circle-o"></i></div>
								<?php } ?>
							</a>
						<?php } ?>
						<div class="related-post-entry-content clr">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="related-post-entry-title"><?php the_title(); ?></a>
							<div class="related-post-entry-excerpt clr">
								<?php wpex_excerpt( '15', false ); ?>
							</div><!-- related-post-entry-excerpt -->
						</div><!-- .related-post-entry-content -->
					</article><!-- .related-post-entry -->
				<?php endforeach; ?>
			 </section>
		<?php } // End related items
		
		// Reset query
		wp_reset_postdata();

	} // End function

} // End if