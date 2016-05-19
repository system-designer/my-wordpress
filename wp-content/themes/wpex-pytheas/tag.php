<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */

get_header(); ?>


	<header class="page-header archive-header">
		<h1 class="page-header-title archive-title"><?php printf( __( 'Posts Tagged: %s', 'wpex' ), single_tag_title( '', false ) ); ?></h1>
		
		<?php if ( tag_description() ) : // Show an optional tag description ?>
		<div class="archive-meta"><?php echo tag_description(); ?></div>
		<?php endif; ?>
	</header><!-- .archive-header -->

	<div id="primary" class="content-area span_16 col clr-margin clr">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php wpex_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>