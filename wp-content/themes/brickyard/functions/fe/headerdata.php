<?php
/**
 * Headerdata of Theme options.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/  

// additional js and css
if(	!is_admin()){
function brickyard_fonts_include () {
global $brickyard_options_db;
// Google Fonts
$bodyfont = $brickyard_options_db['brickyard_body_google_fonts'];
$headingfont = $brickyard_options_db['brickyard_headings_google_fonts'];
$descriptionfont = $brickyard_options_db['brickyard_description_google_fonts'];
$headlinefont = $brickyard_options_db['brickyard_headline_google_fonts'];
$headlineboxfont = $brickyard_options_db['brickyard_headline_box_google_fonts'];
$postentryfont = $brickyard_options_db['brickyard_postentry_google_fonts'];
$sidebarfont = $brickyard_options_db['brickyard_sidebar_google_fonts'];
$menufont = $brickyard_options_db['brickyard_menu_google_fonts'];
$topmenufont = $brickyard_options_db['brickyard_top_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$headlineboxfonturl = $fonturl.$headlineboxfont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
$topmenufonturl = $fonturl.$topmenufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('brickyard-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('brickyard-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('brickyard-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('brickyard-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('brickyard-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('brickyard-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('brickyard-google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('brickyard-google-font9', $topmenufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('brickyard-google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'brickyard_fonts_include' );
}

// additional js and css
function brickyard_css_include () {
global $brickyard_options_db;
	if ($brickyard_options_db['brickyard_css'] == 'Orange (default)' ){
			wp_enqueue_style('brickyard-style', get_stylesheet_uri());
		}

		if ($brickyard_options_db['brickyard_css'] == 'Blue' ){
			wp_enqueue_style('brickyard-style-blue', get_template_directory_uri().'/css/blue.css');
		}
    
    if ($brickyard_options_db['brickyard_css'] == 'Red' ){
			wp_enqueue_style('brickyard-style-red', get_template_directory_uri().'/css/red.css');
		}
}
add_action( 'wp_enqueue_scripts', 'brickyard_css_include' );

// Background Pattern Opacity
function brickyard_get_background_pattern_opacity() {
global $brickyard_options_db;
    $background_pattern_opacity = $brickyard_options_db['brickyard_background_pattern_opacity']; 
		if ($background_pattern_opacity != '' && $background_pattern_opacity != '100' && $background_pattern_opacity != 'Default') { ?>
		<?php echo '#wrapper .pattern { opacity: 0.'; ?><?php echo $background_pattern_opacity ?><?php echo '; filter: alpha(opacity='; ?><?php echo $background_pattern_opacity ?><?php echo '); }'; ?>
<?php } 
    elseif ($background_pattern_opacity == '100') { ?>
    <?php echo '#wrapper .pattern { opacity: 1; filter: alpha(opacity=100); }';
}  
} 

// Display sidebar
function brickyard_display_sidebar() {
global $brickyard_options_db;
    $display_sidebar = $brickyard_options_db['brickyard_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper #container #main-content #content { width: 100%; }', 'brickyard'); ?>
<?php } 
}

// Display header Search Form - header content width
function brickyard_display_search_form() {
global $brickyard_options_db;
    $display_search_form = $brickyard_options_db['brickyard_display_search_form']; 
		if ($display_search_form == 'Hide') { ?>
		<?php _e('#wrapper #header .header-content .site-title, #wrapper #header .header-content .site-description, #wrapper #header .header-content .header-logo { max-width: 100%; }', 'brickyard'); ?>
<?php } 
}

// Display Meta Box on posts - post entries styling
function brickyard_display_meta_post_entry() {
global $brickyard_options_db;
    $display_meta_post_entry = $brickyard_options_db['brickyard_display_meta_post']; 
		if ($display_meta_post_entry == 'Hide') { ?>
		<?php _e('#wrapper #main-content .post-entry .attachment-post-thumbnail { margin-bottom: 17px; } #wrapper #main-content .post-entry .post-entry-content { margin-bottom: -4px; }', 'brickyard'); ?>
<?php } 
}

// FONTS
// Body font
function brickyard_get_body_font() {
global $brickyard_options_db;
    $bodyfont = $brickyard_options_db['brickyard_body_google_fonts'];
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select, #wrapper #content .breadcrumb-navigation, #wrapper #main-content .post-meta { font-family: "', 'brickyard'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Site title font
function brickyard_get_headings_google_fonts() {
global $brickyard_options_db;
    $headingfont = $brickyard_options_db['brickyard_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #header .site-title { font-family: "', 'brickyard'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Site description font
function brickyard_get_description_font() {
global $brickyard_options_db;
    $descriptionfont = $brickyard_options_db['brickyard_description_google_fonts']; 
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #header .site-description {font-family: "', 'brickyard'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Page/post headlines font
function brickyard_get_headlines_font() {
global $brickyard_options_db;
    $headlinefont = $brickyard_options_db['brickyard_headline_google_fonts']; 
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading { font-family: "', 'brickyard'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// BrickYard Posts-Default Widgets headlines font
function brickyard_get_headline_box_google_fonts() {
global $brickyard_options_db;
    $headline_box_google_fonts = $brickyard_options_db['brickyard_headline_box_google_fonts']; 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { font-family: "', 'brickyard'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Post entry font
function brickyard_get_postentry_font() {
global $brickyard_options_db;
    $postentryfont = $brickyard_options_db['brickyard_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .slides li a, #wrapper #main-content .home-list-posts ul li a { font-family: "', 'brickyard'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Sidebar and Footer widget headlines font
function brickyard_get_sidebar_widget_font() {
global $brickyard_options_db;
    $sidebarfont = $brickyard_options_db['brickyard_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'brickyard'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Main Header menu font
function brickyard_get_menu_font() {
global $brickyard_options_db;
    $menufont = $brickyard_options_db['brickyard_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #header .menu-box ul li a { font-family: "', 'brickyard'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// Top Header menu font
function brickyard_get_top_menu_font() {
global $brickyard_options_db;
    $topmenufont = $brickyard_options_db['brickyard_top_menu_google_fonts']; 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #top-navigation-wrapper .top-navigation ul li { font-family: "', 'brickyard'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brickyard'); ?>
<?php } 
}

// User defined CSS.
function brickyard_get_own_css() {
global $brickyard_options_db;
    $own_css = $brickyard_options_db['brickyard_own_css']; 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function brickyard_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php brickyard_get_own_css(); ?>
<?php brickyard_get_background_pattern_opacity(); ?>
<?php brickyard_display_sidebar(); ?>
<?php brickyard_display_search_form(); ?>
<?php brickyard_display_meta_post_entry(); ?>
<?php brickyard_get_body_font(); ?>
<?php brickyard_get_headings_google_fonts(); ?>
<?php brickyard_get_description_font(); ?>
<?php brickyard_get_headlines_font(); ?>
<?php brickyard_get_headline_box_google_fonts(); ?>
<?php brickyard_get_postentry_font(); ?>
<?php brickyard_get_sidebar_widget_font(); ?>
<?php brickyard_get_menu_font(); ?>
<?php brickyard_get_top_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'brickyard_custom_styles');	?>