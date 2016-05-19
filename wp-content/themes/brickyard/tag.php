<?php
/**
 * The tag archive template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="entry-content">
  <div class="entry-content-inner">   
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php printf( __( 'Tag Archive: %s', 'brickyard' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></span></h1>
    </div>
<?php if ( tag_description() ) : ?>
        <div class="archive-meta"><?php echo tag_description(); ?></div>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?> 
<?php brickyard_content_nav( 'nav-below' ); ?>  
  </div>
</div>
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>