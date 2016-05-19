<?php
/**
 * @package WordPress
 * @subpackage Pytheas WordPress Theme
 */

get_header(); ?>


	<?php while ( have_posts() ) : the_post();
	
	// Get portfolio terms
	$terms = get_the_term_list( get_the_ID(), 'portfolio_category' );
	$terms_list = wp_get_post_terms( get_the_ID(), 'portfolio_category'); ?>
	
	<header class="page-header clr">
		<h1 class="page-header-title"><?php the_title(); ?></h1>
		<nav class="single-nav clr">
			<?php next_post_link('<div class="single-nav-left">%link</div>', '<span class="inner"><span class="fa fa-chevron-left"></span></span>', false); ?>
			<?php previous_post_link('<div class="single-nav-right">%link</div>', '<span class="inner"><span class="fa fa-chevron-right"></span></span>', false); ?>
		</nav><!-- .single-nav -->
	</header><!-- .page-heading -->
	
	<div id="primary" class="content-area span_16 col clr clr-margin">
		<div id="content" class="site-content" role="main">
			<?php if ( !post_password_required() ) { ?>
				<ul class="meta portfolio-meta clr">
					<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
					<?php if( $terms ) { ?>
						<li><i class="fa fa-folder-open"></i><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ', ' ') ?></li>
					<?php } $terms = NULL; ?>
					<?php if( comments_open() && of_get_option('portfolio_comments','') == '1' ) { ?>
						<li i="comment-scroll"><i class="fa fa-comment"></i> <?php comments_popup_link(__('Leave a comment', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link', __('Comments closed', 'wpex')); ?></li>
					<?php } ?>
				</ul><!-- .meta -->
				<?php get_template_part('content','portfolio'); ?>
			<?php } ?>
			<article class="entry clr">
				<?php the_content(); ?>
			</article><!-- .entry clr -->
			<?php
			// Tags
			if ( of_get_option( 'portfolio_tags', '1' ) ) { ?>
				<?php echo get_the_term_list( get_the_ID(), 'portfolio_tag', '<div class="portfolio-tags clr">', ' ', '</div>' ); ?> 
			<?php } ?>
			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit Page', 'wpex' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
			<?php
			// Related posts
			get_template_part('content','portfolio-related'); ?>
			<?php
			// Comments
			comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer();?>