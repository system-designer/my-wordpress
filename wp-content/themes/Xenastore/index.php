<?php get_header(); ?>

<?php get_template_part( 'slider' ); ?>
<!-- Deals -->

<?php if (ft_of_get_option('fabthemes_deal_show')== "1") { ?>
	
<div id="dealbanner">
	<div class="dealbox dbleft">
		<h1><?php echo ft_of_get_option('fabthemes_lbanner_head'); ?></h1>
		<p><?php echo ft_of_get_option('fabthemes_lbanner_text'); ?></p>
	</div>
	<div class="dealbox dbmid">
		<h1><?php echo ft_of_get_option('fabthemes_mbanner_head'); ?></h1>
		<p><?php echo ft_of_get_option('fabthemes_mbanner_text'); ?></p>
	</div>
	<div class="dealbox dbright">
		<h1><?php echo ft_of_get_option('fabthemes_rbanner_head'); ?></h1>
		<p><?php echo ft_of_get_option('fabthemes_rbanner_text'); ?></p>
	</div>
</div>
	<?php } ?> 
<!-- Store -->

<ul id="storefront">
	<?php
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$wp_query->query('post_type=product&paged='.$paged);
	?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
	<li class="storepanel">
		<div class="panelpic"><a href="<?php the_permalink() ?>">	<?php the_post_thumbnail( 'product_panel', array('class' => 'impanel') ); ?></a></div>
		<div class="paneldata">
			<h2> <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h2>
			<p><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></p>
			<div class="panelcopy"><p><?php wpe_excerpt('wpe_excerptlength_aside', ''); ?></p></div>
				<span class="sl-price"><?php echo get_post_meta($post->ID, 'WTF_price', true) ?></span>
				<span class="sl-buy"> <a href="<?php the_permalink() ?>"> BUY NOW </a> </span>
		</div>
	</li>
	
	<?php endwhile; ?>
	<?php getpagenavi(); ?>
	<?php $wp_query = null; $wp_query = $temp;?>
</ul>


<?php get_footer(); ?>