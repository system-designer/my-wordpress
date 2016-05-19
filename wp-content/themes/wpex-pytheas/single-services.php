<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */

get_header(); ?>

	<header class="page-header">
		<h1 class="page-header-title"><?php the_title(); ?></h1>
		<nav class="single-nav clr"> 
			<?php next_post_link('<div class="single-nav-left">%link</div>', '<span class="fa fa-chevron-left"></span>', false); ?>
			<?php previous_post_link('<div class="single-nav-right">%link</div>', '<span class="fa fa-chevron-right"></span>', false); ?>
		</nav><!-- .page-header-title --> 
	</header><!-- .page-header -->

	<div id="primary" class="content-area span_16 col clr clr-margin">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( !post_password_required() ) { ?>
						<?php get_template_part('content','services'); ?>
					<?php } ?>
					<div class="entry-content entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
					<?php if ( of_get_option('services_tags', '1') =='1' ) : ?>
						 <?php echo get_the_term_list( get_the_ID(), 'services_tag', '<div class="service-tags clr">', ' ', '</div>' ); ?> 
					<?php endif; ?>
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit Page', 'wpex' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>