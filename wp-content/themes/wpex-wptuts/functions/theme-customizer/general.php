<?php
/**
 * General theme options
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */



add_action( 'customize_register', 'wpex_customizer_general' );

function wpex_customizer_general($wp_customize) {

	// Add textarea
	class WPEX_Customize_Textarea_Control extends WP_Customize_Control {
		
		//Type of customize control being rendered.
		public $type = 'textarea';

		//Displays the textarea on the customize screen.
		public function render_content() { ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

	// Category Select
	class Category_Dropdown_Custom_Control extends WP_Customize_Control {
		public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'				=> '_customize-dropdown-cats-' . $this->id,
				'echo'				=> 0,
				'show_option_none'	=> __( '&mdash; Select &mdash;', 'wap8theme-i18n' ),
				'selected'			=> $this->value(),
				'class'				=> 'customize-dropdown-cats',
			)
			);
			// hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}


	// Theme Settings Section
	$wp_customize->add_section( 'wpex_general' , array(
		'title'		=> __( 'Theme Settings', 'wpex' ),
		'priority'	=> 240,
	) );

	// Logo Image
	$wp_customize->add_setting( 'wpex_logo', array(
		'type'	=> 'theme_mod',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> __('Image Logo','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo',
		'priority'	=> '1',
	) ) );
	
	// Homepage Slider
	$wp_customize->add_setting( 'wpex_homepage_slider_cat', array(
		'type'	=> 'theme_mod',
	) );

	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'wpex_homepage_slider_cat', array(
		'label'		=> __( 'Homepage Slider Featured Category', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_homepage_slider_cat',
		'priority'	=> '1',
	) ) );

	// How Slider Count
	$wp_customize->add_setting( 'wpex_homepage_slider_count', array(
		'type'		=> 'theme_mod',
		'default'	=> '6',
	) );

	$wp_customize->add_control( 'wpex_homepage_slider_count', array(
		'label'		=> __('Homepage Slider Count','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_homepage_slider_count',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type'		=> 'theme_mod',
		'default'	=> '',
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> __('Read More Link','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
		'priority'	=> '3',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type'		=> 'theme_mod',
		'default'	=> '1',
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> __('Featured Image on Posts','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '4',
	) );

	// Header Banner
	$wp_customize->add_setting( 'wpex_header_aside', array(
		'type'		=> 'theme_mod',
		'default'	=> '<a href="http://www.wpexplorer.com/out/authentic-themes/" target="_blank" rel="nofollow"><img src="'. get_template_directory_uri() .'/images/banner.png" /></a>',
	) );

	$wp_customize->add_control( new WPEX_Customize_Textarea_Control( $wp_customize, 'wpex_header_aside', array(
		'label'		=> __('Header Banner','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_header_aside',
		'type'		=> 'textarea',
		'priority'	=> '5',
	) ) );

	// Copyright
	$wp_customize->add_setting( 'wpex_copyright', array(
		'type'		=> 'theme_mod',
		'default'	=> 'WPTuts Powered by <a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> and <a href="http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer" rel="nofollow">WPExplorer Themes</a>',
	) );

	$wp_customize->add_control( new WPEX_Customize_Textarea_Control( $wp_customize, 'wpex_copyright', array(
		'label'		=> __('Custom Copyright','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
		'priority'	=> '7',
	) ) );
		
		
}