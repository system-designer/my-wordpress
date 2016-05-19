<?php
/**
 * The main template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<?php if ($brickyard_options_db['brickyard_display_latest_posts'] != 'Hide') { ?>
<div class="entry-content">
  <div class="entry-content-inner">   
    <section class="home-latest-posts">
      <h2 class="entry-headline"><span class="entry-headline-text"><?php if($brickyard_options_db['brickyard_latest_posts_headline'] == '') { ?><?php _e( 'Latest Posts' , 'brickyard' ); ?><?php } else { echo esc_attr($brickyard_options_db['brickyard_latest_posts_headline']); } ?></span></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php brickyard_content_nav( 'nav-below' ); ?>
   </section> 
  </div>
</div>
<?php } ?> 
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php endif; ?> 
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>