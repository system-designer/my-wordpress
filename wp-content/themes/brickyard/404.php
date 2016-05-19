<?php
/**
 * The 404 page (Not Found) template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<div class="entry-content">
  <div class="entry-content-inner">
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php _e( 'Nothing Found', 'brickyard' ); ?></span></h1>
    </div>
<p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'brickyard' ); ?></p>
  </div>
</div>  
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>