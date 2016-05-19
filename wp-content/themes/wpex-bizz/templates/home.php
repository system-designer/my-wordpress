<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Bizz WPExplorer Theme
 * @since Bizz 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="homepage-wrap clr">
					<?php
					/**
						Slider
					**/
					$wpex_query = new WP_Query(
						array(
							'post_type'			=> 'slides',
							'posts_per_page'	=> '-1',
							'no_found_rows'		=> true,
						)
					);
					if ( $wpex_query->posts ) { ?>
						<div id="homepage-slider-wrap" class="clr flexslider-container">
							<div id="homepage-slider" class="flexslider">
								<ul class="slides clr">
									<?php foreach( $wpex_query->posts as $post ) : setup_postdata($post); ?>
										<li>
											<?php if ( '' != get_post_meta( get_the_ID(), 'wpex_slide_url', true ) ) { ?>
												<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_slide_url', true ); ?>" title="<?php the_title(); ?>">
											<?php } ?>
											<img src="<?php echo wpex_get_featured_img_url(); ?>" alt="<?php the_title(); ?>" />
											<?php if ( '' != get_post_meta( get_the_ID(), 'wpex_slide_url', true ) ) { echo '</a>'; } ?>
										</li>
									<?php endforeach; ?>
								</ul><!-- .slides -->
							</div><!-- .flexslider -->
						</div><!-- #homepage-slider" -->
					<?php } ?>
					<?php wp_reset_postdata(); ?>
					<?php
					/**
						Post Content
					**/ ?>
					<?php if ( get_the_content() !== '' ) { ?>
						<div id="homepage-content" class="entry clr">
							<hr class="dotted-divider homepage-content-top-divider">
							<?php the_content(); ?>
							<hr class="dotted-divider homepage-content-bottom-divider">
						</div><!-- .entry-content -->
					<?php } ?>
					<?php
					/**
						Features
					**/
					$wpex_query = new WP_Query(
						array(
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order',
							'post_type'			=> 'features',
							'posts_per_page'	=> '-1',
							'no_found_rows'		=> true,
						)
					);
					if ( $wpex_query->posts ) { ?>
						<div id="homepage-features" class="clr">
							<?php $wpex_count=0; ?>
							<?php foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
								<?php $wpex_count++; ?>
									<?php get_template_part( 'content-features', get_post_format() ); ?>
								<?php if ( $wpex_count == '3' ) { ?>
									<?php $wpex_count=0; ?>
								<?php } ?>
							<?php endforeach; ?>
						</div><!-- #homepage-features -->
					<?php } ?>
					<?php wp_reset_postdata(); ?>
					<?php
					/**
						Portfolio
					**/
					$display_count = get_theme_mod('wpex_home_portfolio_count', '4');
					$wpex_query = new WP_Query(
						array(
							'post_type'			=> 'portfolio',
							'posts_per_page'	=> $display_count,
							'no_found_rows'		=> true,
						)
					);
					if ( $wpex_query->posts ) { ?>
						<div id="homepage-portfolio" class="clr">
							<h2 class="heading"><span><?php _e( 'Recent Work', 'wpex' ); ?></span></h2>
							<?php $wpex_count=0; ?>
							<?php foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
								<?php $wpex_count++; ?>
									<?php get_template_part( 'content-portfolio', get_post_format() ); ?>
								<?php if ( $wpex_count == '4' ) { ?>
									<?php $wpex_count=0; ?>
								<?php } ?>
							<?php endforeach; ?>
						</div><!-- #homepage-portfolio -->
					<?php } ?>
					<?php wp_reset_postdata(); ?>
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>