<?php
/**
 * The WooCommerce pages template file.
 * @package BrickYard
 * @since BrickYard 1.0.1
*/
get_header(); ?>
<div class="entry-content">
  <div class="entry-content-inner">
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></span></h1>
    </div>
<?php woocommerce_content(); ?>
  </div>
</div>   
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>