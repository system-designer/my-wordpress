<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	$input['headingtext'] = wp_filter_nohtml_kses( $input['headingtext'] );

	 for($customizable_k=1; $customizable_k <= 5 ;$customizable_k++ ):
	 	$input['slider-img-'.$customizable_k] = esc_url_raw( $input['slider-img-'.$customizable_k] );
	 	$input['slidelink-'.$customizable_k] = esc_url_raw( $input['slidelink-'.$customizable_k] );
	 endfor;

	 for($customizable_l=1; $customizable_l <= 3 ;$customizable_l++ ):
	 	$input['section-icon-'.$customizable_l] = esc_url_raw( $input['section-icon-'.$customizable_l] );
	 	$input['sectiontitle'.$customizable_l] = wp_filter_nohtml_kses( $input['sectiontitle-'.$customizable_l] );
	 	$input['sectiondesc-'.$customizable_l] = wp_filter_nohtml_kses( $input['sectiondesc-'.$customizable_l] );
	 endfor;

	$input['post-title'] = wp_filter_nohtml_kses( $input['post-title'] );
	$input['downloadcaption'] = wp_filter_nohtml_kses( $input['downloadcaption'] );
	$input['downloadlink'] = esc_url_raw( $input['downloadlink'] );
    return $input;
}
add_action( 'admin_init', 'fasterthemes_options_init' );
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery' ) );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$customizable_menu = array(
				'page_title' => __( 'Faster Themes Options', 'customizable'),
				'menu_title' => __('Theme Options', 'customizable'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $customizable_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$customizable_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($customizable_menu['page_title'],$customizable_menu['menu_title'],$customizable_menu['capability'],$customizable_menu['menu_slug'],$customizable_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
		$customizable_image=get_template_directory_uri().'/theme-options/images/logo.png';		
?>
<div class="fasterthemes-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="fasterthemes-header">
    <div class="logo">
      <?php
		$customizable_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$customizable_image."' alt='FasterThemes' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'customizable' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='".__('Save Options','customizable')."' /></div>";			
			?>
    </div>
  </div>
  <div class="fasterthemes-details">
    <div class="fasterthemes-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1"><?php _e('Basic Settings','customizable') ?></a></li>
            <li><a id="options-group-2-tab" class="nav-tab homesettings-tab" title="Home Settings" href="#options-group-2"><?php _e('Home Page Settings','customizable') ?></a></li>
            <li><a id="options-group-3-tab" class="nav-tab profeatures-tab" title="Pro Settings" href="#options-group-3"><?php _e('PRO Theme Features','customizable') ?></a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'ft_options' );  
		$customizable_options = get_option( 'faster_theme_options' ); ?>
            <!-------------- First group ----------------->
            <div id="options-group-1" class="group faster-inner-tabs">
                <div class="section theme-tabs theme-logo">
                <a class="heading faster-inner-tab active" href="javascript:void(0)"><?php _e('Site Logo','customizable') ?></a>
                <div class="faster-inner-tab-group active">
                    <div class="explain"><?php _e('Size of logo should be exactly 117x43px for best results. Leave blank to use text heading.','customizable') ?></div>
                    <div class="ft-control">
                    <input id="logo" class="upload" type="text" name="faster_theme_options[logo]" value="<?php if(!empty($customizable_options['logo'])) echo esc_url($customizable_options['logo']); ?>" placeholder="<?php _e('No file chosen','customizable') ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','customizable') ?>" />
                    <div class="screenshot" id="logo-image">
                      <?php if(!empty($customizable_options['logo'])) echo "<img src='".esc_url($customizable_options['logo'])."' /><a class='remove-image'>Remove</a>" ?>
                    </div>
                  </div>
                </div>
              </div>
                <div class="section theme-tabs theme-favicon">
                  <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Favicon','customizable') ?></a>
                  <div class="faster-inner-tab-group">
                    <div class="explain"><?php _e('Size of favicon should be exactly 32x32px for best results.','customizable') ?></div>
                    <div class="ft-control">
                      <input id="logo" class="upload" type="text" name="faster_theme_options[favicon]" value="<?php if(!empty($customizable_options['favicon'])) echo esc_url($customizable_options['favicon']); ?>" placeholder="<?php _e('No file chosen','customizable') ?>" />
                      <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','customizable') ?>" />
                      <div class="screenshot" id="favicon-image">
                        <?php if(!empty($customizable_options['favicon'])) echo "<img src='".esc_url($customizable_options['favicon'])."' /><a class='remove-image'>Remove</a>" ?>
                      </div>
                    </div>
                  </div>
                </div> 
                <div id="section-headingtext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Home page heading Text','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding default home page title.','customizable') ?></div>                
                  	<input type="text" id="headingtext" class="of-input" name="faster_theme_options[headingtext]" size="32"  value="<?php if(!empty($customizable_options['headingtext'])) echo wp_filter_nohtml_kses($customizable_options['headingtext']); ?>">
                </div>                
              </div>
            </div>
            	<div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Copyright Text','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.','customizable') ?></div>                
                  	<input type="text" id="footertext" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($customizable_options['footertext'])) echo wp_filter_nohtml_kses($customizable_options['footertext']); ?>">
                </div>                
              </div>
            </div>
            </div>          
          <!-------------- Second group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">
          <h3><?php _e('Slider','customizable') ?></h3>   
          <?php for($customizable_i=1; $customizable_i <= 5 ;$customizable_i++ ):?> 
                <div class="section theme-tabs theme-logo">
                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Slide','customizable') ?> <?php echo $customizable_i; ?></a>
                <div class="faster-inner-tab-group">
                    <div class="explain"></div>
                    <div class="ft-control">
                    <input id="slider-img-<?php echo $customizable_i;?>" class="upload" type="text" name="faster_theme_options[slider-img-<?php echo $customizable_i;?>]" value="<?php if(!empty($customizable_options['slider-img-'.$customizable_i])) echo esc_url($customizable_options['slider-img-'.$customizable_i]); ?>" placeholder="<?php _e('No file chosen','customizable') ?>" />
                <input id="slider" class="upload-button button" type="button" value="<?php _e('Upload','customizable') ?>" />
                    <div class="screenshot" id="logo-image">
                      <?php if(!empty($customizable_options['slider-img-'.$customizable_i])) echo "<img src='".esc_url($customizable_options['slider-img-'.$customizable_i])."' /><a class='remove-image'>Remove</a>"; ?>
               		</div>
                    </div>
                    <div class="ft-control">
                    <input id="slidelink-<?php echo $customizable_i; ?>" class="of-input" name="faster_theme_options[slidelink-<?php echo $customizable_i; ?>]" type="text" size="46" value="<?php if(!empty($customizable_options['slidelink-'.$customizable_i])) { echo esc_url($customizable_options['slidelink-'.$customizable_i]); } ?>" placeholder="<?php _e('Slide Link','customizable') ?>" />
                  </div>
                </div>
              </div> 
          <?php endfor; ?>
          <h3><?php _e('First Section','customizable') ?></h3>   
          		<div id="section-sectiontitle2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Section Title','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding default home page title.','customizable') ?></div>                
                  	<input type="text" id="sectionhead" class="of-input" name="faster_theme_options[sectionhead]" size="32"  value="<?php if(!empty($customizable_options['sectionhead'])) { echo wp_filter_nohtml_kses($customizable_options['sectionhead']); } ?>">
                </div>                
              </div>
            </div>
          <?php for($customizable_j=1; $customizable_j <= 3 ;$customizable_j++ ):?>
                <div class="section theme-tabs theme-logo">
                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Tab','customizable') ?> <?php echo $customizable_j; ?></a>
                <div class="faster-inner-tab-group">
                    <div class="ft-control">
                    <input id="section-icon-<?php echo $customizable_j;?>" class="upload" type="text" name="faster_theme_options[section-icon-<?php echo $customizable_j;?>]"  value="<?php if(!empty($customizable_options['section-icon-'.$customizable_j])) echo esc_url($customizable_options['section-icon-'.$customizable_j]); ?>" placeholder="<?php _e('No file chosen','customizable') ?>" />
            <input id="icon" class="upload-button button" type="button" value="<?php _e('Upload','customizable') ?>" />
                    <div class="screenshot" id="logo-image">
                      <?php if(!empty($customizable_options['section-icon-'.$customizable_j])) echo "<img src='".esc_url($customizable_options['section-icon-'.$customizable_j])."' /><a class='remove-image'>Remove</a>"; ?>
                    </div>
                    <div class="ft-control">
                    <div class="explain"><?php _e("Upload icon for your home template , you would like to display in the Home Page.",'customizable') ?></div>
                    <input id="sectiontitle-<?php echo $customizable_j; ?>" class="of-input" name="faster_theme_options[sectiontitle-<?php echo $customizable_j; ?>]" type="text" size="46" value="<?php if(!empty($customizable_options['sectiontitle-'.$customizable_j])) { echo wp_filter_nohtml_kses($customizable_options['sectiontitle-'.$customizable_j]); } ?>"  placeholder="<?php _e('Section Title','customizable') ?>" />
                    </div>
                    <div class="ft-control">
                    <div class="explain"><?php _e('Enter title for your home template , you would like to display in the Home Page.','customizable') ?></div>
                    <textarea name="faster_theme_options[sectiondesc-<?php echo $customizable_j; ?>]" id="sectiondesc-<?php echo $customizable_j; ?>" class="of-input" placeholder="<?php _e('Section Description','customizable') ?>" rows="8" ><?php if(!empty($customizable_options['sectiondesc-'.$customizable_j])) { echo wp_filter_nohtml_kses($customizable_options['sectiondesc-'.$customizable_j]); } ?></textarea>
                    <div class="explain"><?php _e("Enter description for your home template , you would like to display in the Home Page.",'customizable') ?></div>
                  </div>
                </div>
              </div>
              </div> 
          <?php endfor; ?>    
           <h3><?php _e('Second Section','customizable') ?></h3>  
          		<div id="section-recentpost2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Recent Post Title','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Enter recent post title for your site , you would like to display in the Home Page.','customizable') ?></div>                
                  	<input type="text" id="post" class="of-input" name="faster_theme_options[post-title]" size="32"  value="<?php if(!empty($customizable_options['post-title'])) { echo wp_filter_nohtml_kses($customizable_options['post-title']); } ?>">
                </div>                
              </div>
            </div>
            	<div id="section-category" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Category','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"></div>                
                  	<select name="faster_theme_options[post-category]" id="category"> 
                 <option value=""><?php echo esc_attr(__('Select Category','customizable')); ?></option> 
                  <?php $customizable_args = array(
				 'post_status'=>'publish',
				 'meta_query' => array(
									array(
									'key' => '_thumbnail_id',
									'compare' => 'EXISTS'
										),
									)
								);  
				$customizable_post = new WP_Query( $customizable_args );
				$customizable_cat_id=array();
				while($customizable_post->have_posts()){
				$customizable_post->the_post();
				$customizable_post_categories = wp_get_post_categories( get_the_id());   
				$customizable_cat_id[]=$customizable_post_categories[0];
				}
				$customizable_cat_id=array_unique($customizable_cat_id);
				$customizable_args = array(
				'orderby' => 'name',
				'parent' => 0,
				'include'=>$customizable_cat_id
				);
				$customizable_categories = get_categories($customizable_args); 
                  foreach ($customizable_categories as $customizable_category) {
					  if($customizable_category->term_id == $customizable_options['post-category'])
					  	$customizable_selected="selected=selected";
					  else
					  	$customizable_selected='';
                    $customizable_option = '<option value="'.$customizable_category->term_id .'" '.$customizable_selected.'>';
                    $customizable_option .= $customizable_category->cat_name;
                    $customizable_option .= '</option>';
                    echo $customizable_option;
                  }
                 ?>
                </select>
                </div>                
              </div>
            </div> 
            <h3><?php _e('Download Settings','customizable') ?></h3>  
            	<div id="section-downloadcaption" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Download Caption','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"></div>                
                  	<textarea name="faster_theme_options[downloadcaption]" id="downloadcaption" class="of-input" rows="5" placeholder="<?php _e('Caption','customizable') ?>" ><?php if(!empty($customizable_options['downloadcaption'])) { echo wp_filter_nohtml_kses($customizable_options['downloadcaption']); } ?></textarea>
                </div>                
              </div>
            </div>
            	<div id="section-downloadlink" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Download Link','customizable') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"></div>                
                  	<input type="text" id="downloadlink" class="of-input" name="faster_theme_options[downloadlink]" size="32" placeholder="<?php _e('Download Link','customizable') ?>"  value="<?php if(!empty($customizable_options['downloadlink'])) { echo esc_url($customizable_options['downloadlink']); } ?>">
                </div>                
              </div>
            </div>         
          </div>          
          <!-------------- Third group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs fasterthemes-pro-image"> 
          <div class="fasterthemes-pro-header">
              <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/theme-logo.png" class="fasterthemes-pro-logo" />
              <a href="http://fasterthemes.com/checkout/get_checkout_details?theme=Customizable" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/buy-now.png" class="fasterthemes-pro-buynow" /></a>
              </div>
          	<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/pro-featured.png" />           
          </div>    
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="fasterthemes-footer">
      	<ul>
        	<li>&copy; <a href="http://fasterthemes.com" target="_blank"><?php _e('fasterthemes.com','customizable') ?></a></li>
            <li><a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a></li>
            <li><a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a></li>
            <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save Options','customizable') ?>" /></li>
        </ul>
    </div>
    </form>    
</div>
<div class="save-options"><h2><?php _e('Options saved successfully.','customizable') ?></h2></div>
<div class="newsletter"> 
  <!-- Begin MailChimp Signup Form -->
  <h1><?php _e('Subscribe with us','customizable'); ?></h1>
       <p><?php _e("Join our mailing list and we'll keep you updated on new themes as they're released and our exclusive special offers. ","customizable"); ?>
          
        <a href="http://fasterthemes.com/freethemesubscribers/" target="_blank"><?php _e('Click here to join.','customizable'); ?></a>
        
       </p> 
  <!--End mc_embed_signup--> 
</div>



<?php } ?>
