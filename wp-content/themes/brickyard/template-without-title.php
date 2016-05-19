<?php
/**
 * Template Name: Page without Title
 * The template file for pages without the page title.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry-content">
  <div class="entry-content-inner">
<?php brickyard_get_display_image_page(); ?>
<?php the_content(); ?>
<?php edit_post_link( __( 'Edit', 'brickyard' ), '<p>', '</p>' ); ?>
<?php endwhile; endif; ?>
  </div>
</div>
<?php comments_template( '', true ); ?>   
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>