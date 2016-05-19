<?php
/**
 * Used to display a featured category slider
 *
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */
?>

<?php
// Get featured category
$wpex_featured_cat = get_theme_mod( 'wpex_homepage_slider_cat' );
// Show homepage featured slider if theme panel category isn't blank
if( $wpex_featured_cat !== '' && $wpex_featured_cat !== '-1' ) {
		
	// Get posts based on featured category
	$wpex_query = new WP_Query( array(
		'post_type'			=>'post',
		'posts_per_page'	=> get_theme_mod( 'wpex_homepage_slider_count', '6' ),
		'no_found_rows'		=> true,
		'tax_query'			=> array(
			'relation'		=> 'AND',
			array(
				'taxonomy'	=> 'category',
				'field'		=> 'ID',
				'terms'		=> $wpex_featured_cat
				)
			),
		'meta_query'	=> array(
			array(
				'key'	=> '_thumbnail_id',
			)
		)
	) );
	
	if( $wpex_query->have_posts() ) {
		
		// Get Scripts
		wp_enqueue_script( 'flexslider', WPEX_JS_DIR_URI .'/flexslider.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'wpex-flexslider-home', WPEX_JS_DIR_URI .'/flexslider-home.js', array( 'flexslider' ), '', true); ?>
		<div id="featured-slider-wrap" class="boxed clr">
			<div id="featured-slider" class="flexslider-container">
				<div class="flexslider">
					<ul class="slides">
						<?php
						// Loop through each post
						while( $wpex_query->have_posts() ) : $wpex_query->the_post(); ?> 
							<li class="featured-slider-slide" data-thumb="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), 400, 300, true ); ?>">
								<div class="featured-slider-img">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
										<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), '620', '320', true ); ?>" alt="<?php echo the_title(); ?>" />
									</a>
								</div><!-- .featured-slider-img -->
								<article class="featured-slider-caption">
									<h2 class="featured-slider-caption-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									<div class="featured-slider-caption-excerpt clr">
										<?php echo wpex_excerpt('20'); ?>
									</div><!-- .featured-slider-caption-excerpt -->
								</article><!--.featured-slider-caption -->
							</li><!-- .featured-slider-->
						<?php endwhile; ?>
					</ul><!--.slides -->
				</div><!-- .flexslider -->
				<span class="featured-slider-preloader"><i class="fa fa-spinner fa-spin"></i></span>
			</div><!-- #featured-flexslider -->
		</div><!-- #featured-slider-wrap -->
	<?php } ?>
	<?php wp_reset_postdata(); ?>
<?php } ?>