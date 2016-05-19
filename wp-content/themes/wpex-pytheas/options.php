<?php
// Define options framework name for the DB
function optionsframework_option_name() {
	
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_wpex_themes';
    update_option('optionsframework', $optionsframework_settings);
	
}

// Begin Options Function
function optionsframework_options() {
	
	//prettyPhoto themes
	$lightbox_themes = array(
		'pp_default' => __('Default','wpex'),
		'light_rounded' => __('Light Rounded','wpex'),
		'dark_rounded' => __('Dark Rounded','wpex'),
		'light_square' => __('Light Square','wpex'),
		'dark_square' => __('Dark Square','wpex'),
		'facebook' => __('Facebook','wpex'),
	);

	// Begin options array
	$options = array();
	
	//GENERAL
	$options[] = array(
		'name' => __('General', 'wpex'),
		'type' => 'heading');
		
	$options['custom_logo'] = array(
		'name' => __('Custom Logo', 'wpex'),
		'desc' => __('Upload your custom logo.', 'wpex'),
		'id' => 'custom_logo',
		'type' => 'upload');
			
	$options['headerimg_front_page_exclude'] = array(
		'name' => __('Exclude Header Image From Homepage?', 'wpex'),
		'desc' => __('Check box to exclude the header image from the homepage.', 'wpex'),
		'id' => 'headerimg_front_page_exclude',
		'std' => '1',
		'type' => 'checkbox');

	$options['disable_background_image'] = array(
		'name' => __('Disable the background image?', 'wpex'),
		'desc' => __('Check box to disable the main background image.', 'wpex'),
		'id' => 'disable_background_image',
		'std' => '',
		'type' => 'checkbox');
		
	$options['retina'] = array(
		'name' => __('Retina Support?', 'wpex'),
		'desc' => __('Check box to enable retina support for featured images.', 'wpex'),
		'id' => 'retina',
		'std' => '0',
		'type' => 'checkbox');
		
	$options['widgetized_footer'] = array(
		'name' => __('Widgetized Footer?', 'wpex'),
		'desc' => __('Check box to enable the widgetized footer area.', 'wpex'),
		'id' => 'widgetized_footer',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['lightbox_theme'] = array(
		'name' => __('PrettyPhoto Theme', 'wpex'),
		'desc' => __('Choose your PrettyPhoto theme.', 'wpex'),
		'id' => 'lightbox_theme',
		'std' => 'default',
		'type' => 'select',
		'options' => $lightbox_themes );
	
	$options['masterhead_right'] = array(
		'name' => __('Header Right Content', 'wpex'),
		'desc' => __('Enter your custom content for the header top right section above the searchbox.', 'wpex'),
		'id' => 'masterhead_right',
		'std' => '<i class="icon-phone"></i>Call us: 999-99-99',
		'type' => 'textarea');	
		
	$options['custom_copyright'] = array(
		'name' => __('Custom Copyright', 'wpex'),
		'desc' => __('Enter your custom copyright infor for the footer.', 'wpex'),
		'id' => 'custom_copyright',
		'std' => '<a href="http://wordpress.org" title="WordPress">WordPress</a>'. __('Theme by','wpex') .'<a href="http://wpexplorer.me" title="WPExplorer">WPExplorer</a>',
		'type' => 'textarea');
		
		
	//Slider
	$options[] = array(
				'name' => __('Slides', 'wpex'),
				'type' => 'heading');
			
		if ( class_exists( 'Symple_Slides_Post_Type' ) ) {
				
			$options['slides_slideshow'] = array(
				"name" => __('Toggle: Slideshow', 'wpex'),
				"desc" => __('Check this box to enable automatic slideshow for your slides.', 'wpex'),
				"id" => "slides_slideshow",
				"std" => "true",
				"type" => "select",
				"options" => array(
					'true' => 'true',
					'false' => 'false'
				) );
				
			$options['slides_randomize'] = array(
				"name" => __('Toggle: Randomize', 'wpex'),
				"desc" => __('Check this box to enable the randomize feature for your slides.', 'wpex'),
				"id" => "slides_randomize",
				"std" => "false",
				"type" => "select",
				"options" => array(
					'true' => 'true',
					'false' => 'false'
				) );
				
			$options['slides_animation'] = array(
				"name" => __('Animation', 'wpex'),
				"desc" => __('Select your animation of choice.', 'wpex'),
				"id" => "slides_animation",
				"std" => "slide",
				"type" => "select",
				"options" => array(
					'fade' => 'fade',
					'slide' => 'slide'
				) );
				
			$options['slides_direction'] = array(
				"name" => __('Direction', 'wpex'),
				"desc" => __('Select the direction for your slides. Slide animation only & if using the <strong>vertical direction</strong> all slides must have the same height.', 'wpex'),
				"id" => "slides_direction",
				"std" => "horizontal",
				"type" => "select",
				"options" => array(
					'horizontal' => 'horizontal',
					'vertical' => 'vertical'
				));
				
			$options['slideshow_speed'] = array(
				"name" => __('SlideShow Speed', 'wpex'),
				"desc" => __('Enter your preferred slideshow speed in milliseconds.', 'wpex'),
				"id" => "slideshow_speed",
				"std" => "7000",
				"type" => "text" );
				
			$options['animation_speed'] = array(
				"name" => __('Animation Speed', 'wpex'),
				"desc" => __('Enter your preferred animation speed in milliseconds.', 'wpex'),
				"id" => "animation_speed",
				"std" => "600",
				"type" => "text" );
		}
			
		$options['slides_alt'] = array(
				"name" => __('Slider Alternative', 'wpex'),
				"desc" => __('If you prefer to use another slider you can enter the <strong>shortcode</strong> here.', 'wpex'),
				"id" => "slides_alt",
				"std" => "",
				"type" => "textarea" );
		
	
	//HOMEPAGE	
	$options[] = array(
		'name' => __('Homepage', 'wpex'),
		'type' => 'heading');

	$options['home_tagline'] = array(
		'name' => __('Homepage Tagline', 'wpex' ),
		'desc' => '',
		'id' => 'home_tagline',
		'std' => __('Homepage Tagline Sample','wpex'),
		'type' => 'textarea');
		
	$options['home_services_title'] = array(
		'name' => __('Homepage Services Title', 'wpex' ),
		'desc' => __('Enter your homepage services title.', 'wpex' ),
		'id' => 'home_services_title',
		'std' => __('What We Do','wpex'),
		'class' => 'mini',
		'type' => 'text');
		
	$options['home_services_count'] = array(
		'name' => __('How Many Services Posts', 'wpex' ),
		'desc' => __('Enter an integer for how many service posts to show on the homepage.', 'wpex'),
		'id' => 'home_services_count',
		'std' => '6',
		'type' => 'text');
		
	$options['home_portfolio'] = array(
		'name' => __('Show Recent Work?', 'wpex'),
		'desc' => __('Check box to show recent work on the homepage.', 'wpex'),
		'id' => 'home_portfolio',
		'std' => '1',
		'type' => 'checkbox');

	$options['home_portfolio_title'] = array(
		'name' => __('Recent Work Title', 'wpex'),
		'desc' => __('Enter your custom title for the recent work section', 'wpex'),
		'id' => 'home_portfolio_title',
		'std' => __('Recent Work','wpex'),
		'type' => 'text');
		
	$options['home_portfolio_count'] = array(
		'name' => __('Home Many Portfolio Posts?', 'wpex'),
		'desc' => __('Enter an integer for how many portfolio posts to show on the homepage.', 'wpex'),
		'id' => 'home_portfolio_count',
		'std' => __('4','wpex'),
		'type' => 'text');
		
	$options['home_blog'] = array(
		'name' => __('Show Recent Blog Posts?', 'wpex'),
		'desc' => __('Check box to show recent blog posts on the homepage.', 'wpex'),
		'id' => 'home_blog',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['home_blog_title'] = array(
		'name' => __('Recent Blog Posts Title', 'wpex'),
		'desc' => __('Enter your custom title for the recent blog posts section', 'wpex'),
		'id' => 'home_blog_title',
		'std' => __('Recent News','wpex'),
		'class' => 'mini',
		'type' => 'text');
		
	$options['home_blog_count'] = array(
		'name' => __('Home Many Blog Posts?', 'wpex'),
		'desc' => __('Enter an integer for how many blog posts to show on the homepage.', 'wpex'),
		'id' => 'home_blog_count',
		'std' => __('4','wpex'),
		'class' => 'mini',
		'type' => 'text');
		
	//BLOG	
	$options[] = array(
		'name' => __('Blog', 'wpex'),
		'type' => 'heading');
		
	$options['blog_single_thumbnail'] = array(
		'name' => __('Featured Images On Single Posts?', 'wpex'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id' => 'blog_single_thumbnail',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['blog_excerpt'] = array(
		'name' => __('Entry Excerpts?', 'wpex'),
		'desc' => __('Check box to show excerpts rather then full posts on standard entries.', 'wpex'),
		'id' => 'blog_exceprt',
		'std' => '1',
		'type' =>'checkbox');
		
	$options['blog_bio'] = array(
		'name' => __('Author Bio?', 'wpex'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id' => 'blog_bio',
		'std' => '1',
		'type' => 'checkbox');
			
	$options['blog_tags'] = array(
		'name' => __('Tags?', 'wpex'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id' => 'blog_tags',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['blog_related'] = array(
		'name' => __('Related Posts?', 'wpex'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id' => 'blog_related',
		'std' => '1',
		'type' => 'checkbox');
	
		
	//SOCIAL
	if( function_exists('wpex_social_links') ) {
		
		$options[] = array(
			'name' => __('Social', 'wpex'),
			'type' => 'heading');	
			
			
		$options['social'] = array(
			'name' => __('Social?', 'wpex'),
			'desc' => __('Check box to enable the social section in the main menu.', 'wpex'),
			'id' => 'social',
			'std' => '1',
			'type' => 'checkbox');
		
		
		$social_links = wpex_social_links();
		foreach( $social_links as $social_link ) {
			$options[] = array( "name" => ucfirst($social_link),
								'desc' => ' '. __('Enter your ','wpex') . $social_link . __(' url','wpex') .' <br />'. __('Include http:// at the front of the url.', 'wpex'),
								'id' => $social_link,
								'std' => '',
								'type' => 'text');
		}
	}

	return $options;
}