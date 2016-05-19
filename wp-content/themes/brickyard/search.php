<?php
/**
 * The search results template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="entry-content">
  <div class="entry-content-inner">   
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php printf( __( 'Search Results for: %s', 'brickyard' ), '<span>' . get_search_query() . '</span>' ); ?></span></h1>
    </div>
    <div class="archive-meta"><p class="number-of-results"><?php _e( 'Number of Results: ', 'brickyard' ); ?><?php echo $wp_query->found_posts; ?></p></div>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; ?> 

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'brickyard' ); ?></h2>
      <div class="nav-wrapper">
			 <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'brickyard' ),
	'next_text' => __( 'Next &rarr;', 'brickyard' ),
	'total' => $wp_query->max_num_pages
) );
?>
        </p>
      </div>
    </div>
<?php endif; ?>

<?php else : ?>
<div class="entry-content">
  <div class="entry-content-inner">
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php _e( 'Nothing Found', 'brickyard' ); ?></span></h1>
    </div>
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'brickyard' ); ?></p>
<?php endif; ?> 
  </div>
</div> 
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>