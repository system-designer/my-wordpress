<?php
/**
 * @package WordPress
 * @subpackage Pytheas WordPress Theme
 * This file contains the styling for blog post entries.
 */
?>  

<article id="post-<?php the_ID(); ?>" <?php post_class('search-entry clr'); ?>>
	<?php if( has_post_thumbnail() ) {  ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="search-entry-img-link">
			<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ) , 100, 80, true ); ?>" alt="<?php echo the_title(); ?>" />
		</a>
	<?php } ?>
	<div class="search-entry-text <?php if( !has_post_thumbnail () ) echo 'full-width'; ?>">
		<header>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><span>(<?php echo get_post_type(); ?>)</span></h2>
		</header>
		<?php
		if ( of_get_option('blog_exceprt','1') == '1' ) {
			the_excerpt();
		} else {
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpex' ) );
		} ?>
	</div><!-- .search-entry-text -->
</article><!-- .entry -->