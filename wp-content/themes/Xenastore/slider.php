<!-- Slide -->
<?php if (ft_of_get_option('fabthemes_featpro')== "1") { ?>
<div class="prowrap">
<div id="proslide">
		<?php $count = ft_of_get_option('fabthemes_slide_number');
		$query = new WP_Query( array( 'post_type'=>'product','department'=>'featured','posts_per_page' =>$count ) );
	    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
	
	<div class="propanel">
		<div class="imgpanel">
			<a href="<?php the_permalink() ?>">	<?php the_post_thumbnail( 'product_slide', array('class' => 'proslide') ); ?></a>
		</div>
		<div class="prodata">
			<h2><?php the_title(); ?></h2>
			<p><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></p>
			<div class="procopy"> <?php the_excerpt(); ?></div>
			<span class="sl-price">	<?php echo get_post_meta($post->ID, 'WTF_price', true) ?></span>
			<span class="sl-buy"> <a href="<?php the_permalink() ?>"> BUY NOW </a> </span>
		</div>
	</div>
		<?php endwhile; endif; ?>
</div>
</div>
	<?php } ?> 