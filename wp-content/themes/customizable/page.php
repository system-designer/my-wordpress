<?php 
/**
 * The template for displaying all pages
 */
get_header();?>

<section>
  <div class="customize-breadcrumb">
    <div class="container customize-container">
      <h1>
        <?php the_title();?>
      </h1>
      <?php customizable_breadcrumbs();?>
    </div>
  </div>
</section>
<section class="main_section">
  <div class="container customize-container">
    <div class="left_section">
      <?php if(have_posts()):?>
      <?php while(have_posts()): the_post();?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section_post border-none">
          <?php if(has_post_thumbnail()) {echo get_the_post_thumbnail(get_the_ID(), 'customizable-blog-width',array('class'=>''));}?>
          <h3>
            <?php the_title(); ?>
          </h3>
         <div class="content">  <?php the_content();?></div>
        </div>
      </article>
  
      <!-- .nav-single -->
      <?php endwhile;?>
      <?php  if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
          ?>
      <?php 
		   else : 
		   ?>
      <p> <?php _e('no posts found','customizable') ?> </p>
      <?php  endif;?>
    </div>
    <div class="side_bar">
      <?php get_sidebar();?>
    </div>
  </div>
</section>
<?php get_footer();?>
