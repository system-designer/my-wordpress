<?php
/**
 * Template Name: Logged In
 * The template file for displaying the page content only for logged in users.
 * @package BrickYard
 * @since BrickYard 1.1.6
*/
get_header(); ?>
<?php if ( is_user_logged_in() ) { ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry-content">
  <div class="entry-content-inner">
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
    </div>
<?php brickyard_get_display_image_page(); ?>
<?php the_content(); ?>
<?php edit_post_link( __( 'Edit', 'brickyard' ), '<p>', '</p>' ); ?>
<?php endwhile; endif; ?>
  </div>
</div>
<?php comments_template( '', true ); ?>  
<?php } else { ?>
<div class="entry-content">
  <div class="entry-content-inner">
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
    </div>
      <p class="logged-in-message"><?php _e( 'You must be logged in to view this page.', 'brickyard' ); ?></p>
<?php wp_login_form(); ?>
  </div>
</div>
<?php } ?> 
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>