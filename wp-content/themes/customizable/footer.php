<?php
/**
 * The template for displaying the footer
**/ 
?>
<footer class="main_footer">
  <div class="top_footer">
    <div class="container customize-container">
      <?php get_sidebar('footer');?>
    </div>
  </div>
  <div class="bottom_footer">
    <div class="container customize-container">
      <p><?php
  global $customizable_options;
   if(!empty($customizable_options['footertext']))
  {
	  echo wp_filter_nohtml_kses($customizable_options['footertext']).' ';
	  printf( __( 'Powered by %1$s and %2$s', 'customizable' ), '<a href="http://wordpress.org" target="_blank">WordPress</a>', '<a href="http://fasterthemes.com/wordpress-themes/customizable" target="_blank">Customizable</a>' ); 
	}
	else
	{
		printf( __( 'Powered by %1$s and %2$s', 'customizable' ), '<a href="http://wordpress.org" target="_blank">WordPress</a>', '<a href="http://fasterthemes.com/wordpress-themes/customizable" target="_blank">Customizable</a>' ); 
	}?></p>
    <?php wp_nav_menu(array('theme_location'  => 'secondary', 'fallback_cb' => false)); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
