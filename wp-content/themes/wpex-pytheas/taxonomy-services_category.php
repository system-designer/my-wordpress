<?php
/**
 * The template for displaying Services Categories
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */

get_header(); ?>

	<header class="page-header clr">
		<h1 class="page-header-title"><?php echo single_term_title(); ?></h1>
		<?php if ( category_description() ) : // Show an optional category description ?>
			<div class="archive-meta"><?php echo term_description(); ?></div>
		<?php endif; ?>
		<?php if ( of_get_option('services_archive_filter','1') == '1' ) { ?>      
			<?php $posttype_obj = get_post_type_object( get_post_type( ) ); ?>
			<?php $services_terms = get_terms( 'services_category', array( 'orderby' => 'name', 'order' => 'ASC' ) ); ?>            
			<?php if ( $services_terms ) { ?>
				<ul class="tax-archives-filter dropdown-menu clearfix">
					<li><?php _e('Browse','wpex') ; ?> <?php echo $posttype_obj->label; ?><i class="icon-caret-down"></i>
						<ul>
							<li><a href="<?php echo get_post_type_archive_link( $post->post_type ); ?>" title="<?php echo $posttype_obj->label; ?>" class="active"><?php _e('All','wpex'); ?></a></li>
							<?php foreach( $services_terms as $services_term ) : ?>	
								<li><a href="<?php echo get_term_link( $services_term->slug, 'services_category'); ?>" title="<?php echo $services_term->name; ?>"><?php echo $services_term->name; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</li>
				</ul><!-- .tax-archives-filter -->
			<?php } ?>
		<?php } ?>
	</header><!-- /page-heading -->

	<?php if ( have_posts( ) ) : ?>
		<div id="primary" class="content-area span_24 row clr">
			<div id="content" class="site-content" role="main">
				<div class="services-content row clr">
					<?php
					$wpex_count=0;
					while ( have_posts() ) : the_post();
						$wpex_count++;
						get_template_part('content','services');
						if( $wpex_count == 3 ) { echo '<div class="clr"></div>'; $wpex_count=0; }
					endwhile; ?>
				</div><!-- .services-content -->
				<?php wpex_pagination(); ?>
			</div><!-- #content -->
		</div><!-- #primary -->
	<?php endif; ?>

<?php get_footer(); ?>