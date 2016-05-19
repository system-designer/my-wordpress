<?php
/**
 * The category archive template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<div class="entry-content">
  <div class="entry-content-inner">   
<?php if ( have_posts() ) : ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php single_cat_title(); ?></span></h1>
    </div>
<?php if ( category_description() ) : ?>
    <div class="archive-meta"><?php echo category_description(); ?></div>
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