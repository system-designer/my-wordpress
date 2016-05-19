<?php
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>

<div id="left">
	<?php
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$wp_query->query('paged='.$paged);
	?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="title">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmeta"> 	<span>Posted by <?php the_author_posts_link(); ?></span> | <span><?php the_time('l, n F Y'); ?></span> | <span><?php the_category(', '); ?></span> </div>
			</div>

			<div class="entry">
				<?php the_post_thumbnail( 'product_single', array('class' => 'postim') ); ?>
				<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
				<div class="clear"></div>
			</div>
		</div>

	<?php endwhile; ?>

	<?php getpagenavi(); ?>
	
	<?php $wp_query = null; $wp_query = $temp;?>	
				
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>