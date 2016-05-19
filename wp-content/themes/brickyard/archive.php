<?php
/**
 * The archive template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="entry-content">
  <div class="entry-content-inner">   
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'brickyard' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'brickyard' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'brickyard' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'brickyard' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'brickyard' ) ) . '</span>' );
					else :
						_e( 'Archive', 'brickyard' );
					endif ;?></span></h1>
    </div>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?> 
<?php brickyard_content_nav( 'nav-below' ); ?>
  </div>
</div>  
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>