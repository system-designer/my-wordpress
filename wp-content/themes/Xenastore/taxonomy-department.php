<?php get_header(); ?>

<div id="left">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="title">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmeta"> 	<span>Posted by <?php the_author_posts_link(); ?></span> | <span><?php the_time('l, n F Y'); ?></span> | <span><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?> </span> </div>
		</div>
	
		<div class="entry">
			<?php the_post_thumbnail( 'product_panel', array('class' => 'arcpanel') ); ?>
			<?php wpe_excerpt('wpe_excerptlength_side', ''); ?>
			<div class="paneldata">
					<span class="sl-price"><?php echo get_post_meta($post->ID, 'WTF_price', true) ?></span>
					<span class="sl-buy"> <a href="<?php the_permalink() ?>"> BUY NOW </a> </span>
			</div>
			<div class="clear"></div>
					
		</div>
	</div>

<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>