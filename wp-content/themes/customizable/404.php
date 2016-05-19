<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();?>

<section>
  <div class="customize-breadcrumb">
    <div class="container customize-container">
      <h1>
        <?php _e( 'Not Found', 'customizable' ); ?>
      </h1>
      <?php customizable_breadcrumbs();?>
    </div>
  </div>
</section>
<section class="main_section customizable-not-found">
  <div class="container customize-container">
      <p>
        <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'customizable' ); ?>
      </p>
      <?php get_search_form(); ?>
  </div>
</section>
<?php get_footer();?>
