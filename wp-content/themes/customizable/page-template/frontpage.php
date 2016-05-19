<?php
/*
* Template Name: Home Page
*/
?>
<?php get_header(); 
$customizable_options = get_option( 'faster_theme_options' );
?>
<section class="main_section">
<div class="callbacks_container">
<ul class="rslides" id="slider4">
<?php for($customizable_loop=1 ; $customizable_loop <5 ; $customizable_loop++):?>
	<?php if(!empty($customizable_options['slider-img-'.$customizable_loop])){ ?>
    	<li><?php if(!empty($customizable_options['slidelink-'.$customizable_loop])) {?><a href="<?php echo esc_url($customizable_options['slidelink-'.$customizable_loop]);?>" target="_blank"><img src="<?php echo esc_url($customizable_options['slider-img-'.$customizable_loop]); ?>" alt="" /></a><?php }else{?><img src="<?php echo $customizable_options['slider-img-'.$customizable_loop]; ?>" alt="" /><?php } ?></li>
    <?php } ?>
<?php endfor;?>
</ul>
</div>
<div class="container customize-container"> 
    <div class="col-md-12 customizable-home-title">
        	<?php if(!empty($customizable_options['sectionhead'])){ ?>
		<h1>
			<?php echo wp_filter_nohtml_kses($customizable_options['sectionhead']);?>
           <h6><span><img src="<?php echo get_template_directory_uri(); ?>/images/line-logo.png" /></span></h6>      
        </h1>
        <?php } ?>
    </div>
     <div class="col-md-12 customizable-home-icom">
     
<?php
	 for($customizable_l=1; $customizable_l <= 3 ;$customizable_l++ ):
	 if(!empty($customizable_options['section-icon-'.$customizable_l])):
	 ?>
		<div class="col-md-4 customizable-post">
        	 <div class="back-icon">	
	            <img class="fa icon-center" src="<?php echo esc_url($customizable_options['section-icon-'.$customizable_l]); ?>" />
             </div>   
             <div>
             	<h1><?php if(!empty($customizable_options['sectiontitle'.$customizable_l])) echo wp_filter_nohtml_kses($customizable_options['sectiontitle'.$customizable_l]); ?></h1>
				<p><?php if(!empty($customizable_options['sectiondesc-'.$customizable_l])) echo wp_filter_nohtml_kses($customizable_options['sectiondesc-'.$customizable_l]); ?></p>
             </div>
        </div>	 
	 <?php
	 endif;
	 endfor;
?>
    	

    </div> 

<!-- LATEST POST -->
	<div class="col-md-12 customizable-home-title">
       	<?php if(!empty($customizable_options['post-title'])){ ?>
    	<h1><?php echo wp_filter_nohtml_kses($customizable_options['post-title']); ?></h1>
        <h6><span><img src="<?php echo get_template_directory_uri(); ?>/images/line-logo.png" /></span></h6>
        <?php } ?>
        
    </div>
	<div class="row no-padding customizable-postcat">
    <?php     
	
			
		$customizable_args = array(
			   'cat'  => $customizable_options['post-category'],
				'meta_query' => array(
					array(
					 'key' => '_thumbnail_id',
					 'compare' => 'EXISTS'
					),
				)
			);		
            $customizable_post = new WP_Query( $customizable_args );
           ?>
			<?php if ( $customizable_post->have_posts() ) { ?>
			<div class="owl-carousel" id="owl-demo" >
		   
		   
		   <?php
            while ( $customizable_post->have_posts() ) {
            $customizable_post->the_post();
            
            $customizable_feature_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
        ?>
    	<div class="col-md-3 post-blog" >
              <div>
				 <a href="<?php echo get_permalink(get_the_ID()); ?>"><img src="<?php echo $customizable_feature_img_url; ?>"></a>
              </div>
              <h2> 
                <a href="<?php echo get_permalink(get_the_ID()); ?>"> <?php echo get_the_title(); ?> </a>
              </h2>
              <span> <?php echo the_date("j F, Y "); ?> </span>
              <p> <?php echo get_the_excerpt(); ?>	</p>
          	  <div class=" col-md-12 no-padding post-comment" >
                    <div class="col-md-6 no-padding post-comment-set">
                        <?php _e('Post By:','customizable') ?><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"> <?php echo get_the_author(); ?></a>
                    </div>
                    <div class="col-md-6 no-padding post-comment-set text-right">
                        <?php _e('Comments:','customizable') ?> <?php echo get_comments_number(); ?>
                    </div>
              </div>
        </div>
        <?php } ?> 
        </div>
			<?php 
            } else {
            echo '<p>'.__('no posts found','customizable').'</p>';
            }	 
            
            ?>
    </div>
<!-- END LATEST POST -->
</div>
<div class="col-md-12 no-padding download-theme">
 <div class="container customize-container">
    	<div class="col-md-10 buttone-left no-padding">
        	<p><?php if(!empty($customizable_options['downloadcaption'])) echo wp_filter_nohtml_kses($customizable_options['downloadcaption']); ?></p>
        </div>
        <div class="col-md-2 btn-group no-padding">
        <?php if(!empty($customizable_options['downloadlink'])){ ?>
		  <a href="<?php echo esc_url($customizable_options['downloadlink']); ?>" class="btn btn-default download-button"><?php _e('Download ','customizable') ?></a>
          <?php } ?>
        </div>
    </div>
    </div>
</section>
<?php get_footer();?>
