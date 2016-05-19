<?php
function FT_OP_update()
{
	$settings = get_option('ft_op');
	$settings['id'] = 'ft_' . FT_scope::tool()->optionsName;
	update_option('ft_op', $settings);
}

function FT_OP_options()
{
	
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	//Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
	    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	
	

	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
	
	$options[] = array( "name" => "Slider",
						"type" => "heading");			
		
	$options[] = array( "name" => "Show featured product slider?",
						"desc" => "Check if you want to show the featured product slider on homepage.",
						"id" => "fabthemes_featpro",
						"std" => "1",
						"type" => "checkbox");		
		
		
	$options[] = array( "name" => "Number of featured products",
						"desc" => "Set the number of featured products on slider",
						"id" => "fabthemes_slide_number",
						"std" => "4",
						"class" => "mini",
						"type" => "text");	
							
	$options[] = array( "name" => "Deals",
						"type" => "heading");			
									
							
						
	$options[] = array( "name" => "Show deal banners",
						"desc" => "Check if you want to show the custom deal banners.",
						"id" => "fabthemes_deal_show",
						"std" => "1",
						"type" => "checkbox");	
	
	
	
	$options[] = array( "name" => "Left banner heading",
						"desc" => "Heading for the left banner.",
						"id" => "fabthemes_lbanner_head",
						"std" => "Deal heading",
						"type" => "text");	
	
	$options[] = array( "name" => "Left banner detail",
						"desc" => "Details on the left banner",
						"id" => "fabthemes_lbanner_text",
						"std" => "This is the short description of what this deal is about",
						"type" => "textarea");



	$options[] = array( "name" => "Middle banner heading",
						"desc" => "Heading for the middle banner.",
						"id" => "fabthemes_mbanner_head",
						"std" => "Deal heading",
						"type" => "text");	

	$options[] = array( "name" => "Middle banner detail",
						"desc" => "Details on the middle banner",
						"id" => "fabthemes_mbanner_text",
						"std" => "This is the short description of what this deal is about",
						"type" => "textarea");						
						
						
						
	$options[] = array( "name" => "Right banner heading",
						"desc" => "Heading for the right banner.",
						"id" => "fabthemes_rbanner_head",
						"std" => "Deal heading",
						"type" => "text");	

	$options[] = array( "name" => "Right banner detail",
						"desc" => "Details on the right banner",
						"id" => "fabthemes_rbanner_text",
						"std" => "This is the short description of what this deal is about",
						"type" => "textarea");						
						
						
						
						
	$options[] = array( "name" => "Ad banner",
						"type" => "heading");		
						
						

	if (file_exists(dirname(__FILE__) . '/FT/options/banners.php'))
			include ('FT/options/banners.php');

	if (file_exists(dirname(__FILE__) . '/FT/options/colors.php'))
			include ('FT/options/colors.php');

	if (file_exists(dirname(__FILE__) . '/FT/options/common.php'))
			include ('FT/options/common.php');

	return $options;
}