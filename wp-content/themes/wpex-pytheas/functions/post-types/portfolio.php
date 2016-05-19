<?php
/***
* Special Thanks To Devin Price
* This file is a modified of the original plugin found @https://github.com/devinsays/portfolio-post-type - Special Thanks!
***/

if ( ! class_exists( 'Symple_Portfolio_Post_Type' ) ) :
class Symple_Portfolio_Post_Type {

	function __construct() {

		// Adds the portfolio post type and taxonomies
		add_action( 'init', array( &$this, 'portfolio_init' ), 0 );

		// Thumbnail support for portfolio posts
		add_theme_support( 'post-thumbnails', array( 'portfolio' ) );

		// Adds columns in the admin view for thumbnail and taxonomies
		add_filter( 'manage_edit-portfolio_columns', array( &$this, 'portfolio_edit_columns' ) );
		add_action( 'manage_portfolio_posts_custom_column', array( &$this, 'portfolio_column_display' ), 10, 2 );

		// Allows filtering of posts by taxonomy in the admin view
		add_action( 'restrict_manage_posts', array( &$this, 'portfolio_add_taxonomy_filters' ) );

	}
	

	function portfolio_init() {

		/**
		 * Enable the Portfolio custom post type
		 * http://codex.wordpress.org/Function_Reference/register_post_type
		 */

		$labels = array(
			'name'					=> __( 'Portfolio', 'wpex' ),
			'singular_name'			=> __( 'Portfolio Item', 'wpex' ),
			'add_new'				=> __( 'Add New Item', 'wpex' ),
			'add_new_item'			=> __( 'Add New Portfolio Item', 'wpex' ),
			'edit_item'				=> __( 'Edit Portfolio Item', 'wpex' ),
			'new_item'				=> __( 'Add New Portfolio Item', 'wpex' ),
			'view_item'				=> __( 'View Item', 'wpex' ),
			'search_items'			=> __( 'Search Portfolio', 'wpex' ),
			'not_found'				=> __( 'No portfolio items found', 'wpex' ),
			'not_found_in_trash'	=> __( 'No portfolio items found in trash', 'wpex' )
		);
		
		$args = array(
			'labels'			=> $labels,
			'public'			=> true,
			'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions', 'post-formats' ),
			'capability_type'	=> 'post',
			'rewrite'			=> array( "slug" => "portfolio" ), // Permalinks format
			'has_archive'		=> true,
			'menu_icon'			=> 'dashicons-portfolio',
		); 
		
		$args = apply_filters('symple_portfolio_args', $args);
		
		register_post_type( 'portfolio', $args );

		/**
		 * Register a taxonomy for Portfolio Tags
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */

		$taxonomy_portfolio_tag_labels = array(
			'name'							=> __( 'Portfolio Tags', 'wpex' ),
			'singular_name'					=> __( 'Portfolio Tag', 'wpex' ),
			'search_items'					=> __( 'Search Portfolio Tags', 'wpex' ),
			'popular_items'					=> __( 'Popular Portfolio Tags', 'wpex' ),
			'all_items'						=> __( 'All Portfolio Tags', 'wpex' ),
			'parent_item'					=> __( 'Parent Portfolio Tag', 'wpex' ),
			'parent_item_colon'				=> __( 'Parent Portfolio Tag:', 'wpex' ),
			'edit_item'						=> __( 'Edit Portfolio Tag', 'wpex' ),
			'update_item'					=> __( 'Update Portfolio Tag', 'wpex' ),
			'add_new_item'					=> __( 'Add New Portfolio Tag', 'wpex' ),
			'new_item_name'					=> __( 'New Portfolio Tag Name', 'wpex' ),
			'separate_items_with_commas'	=> __( 'Separate portfolio tags with commas', 'wpex' ),
			'add_or_remove_items'			=> __( 'Add or remove portfolio tags', 'wpex' ),
			'choose_from_most_used'			=> __( 'Choose from the most used portfolio tags', 'wpex' ),
			'menu_name'						=> __( 'Portfolio Tags', 'wpex' )
		);

		$taxonomy_portfolio_tag_args = array(
			'labels'				=> $taxonomy_portfolio_tag_labels,
			'public'				=> true,
			'show_in_nav_menus'		=> true,
			'show_ui'				=> true,
			'show_tagcloud'			=> true,
			'hierarchical'			=> false,
			'rewrite'				=> array( 'slug'	=> 'portfolio-tag' ),
			'query_var'				=> true
		);

		$taxonomy_portfolio_tag_args = apply_filters('symple_taxonomy_portfolio_tag_args', $taxonomy_portfolio_tag_args);
		
		register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $taxonomy_portfolio_tag_args );

		/**
		 * Register a taxonomy for Portfolio Categories
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */

		$taxonomy_portfolio_category_labels = array(
			'name'							=> __( 'Portfolio Categories', 'wpex' ),
			'singular_name'					> __( 'Portfolio Category', 'wpex' ),
			'search_items'					=> __( 'Search Portfolio Categories', 'wpex' ),
			'popular_items'					=> __( 'Popular Portfolio Categories', 'wpex' ),
			'all_items'						=> __( 'All Portfolio Categories', 'wpex' ),
			'parent_item'					=> __( 'Parent Portfolio Category', 'wpex' ),
			'parent_item_colon'				=> __( 'Parent Portfolio Category:', 'wpex' ),
			'edit_item'						=> __( 'Edit Portfolio Category', 'wpex' ),
			'update_item'					=> __( 'Update Portfolio Category', 'wpex' ),
			'add_new_item'					=> __( 'Add New Portfolio Category', 'wpex' ),
			'new_item_name'					=> __( 'New Portfolio Category Name', 'wpex' ),
			'separate_items_with_commas'	=> __( 'Separate portfolio categories with commas', 'wpex' ),
			'add_or_remove_items'			=> __( 'Add or remove portfolio categories', 'wpex' ),
			'choose_from_most_used'			=> __( 'Choose from the most used portfolio categories', 'wpex' ),
			'menu_name'						=> __( 'Portfolio Categories', 'wpex' ),
		);

		$taxonomy_portfolio_category_args = array(
			'labels'				=> $taxonomy_portfolio_category_labels,
			'public'				=> true,
			'show_in_nav_menus'		=> true,
			'show_ui'				=> true,
			'show_tagcloud'			=> true,
			'hierarchical'			=> true,
			'rewrite'				=> array( 'slug'	=> 'portfolio-category' ),
			'query_var'				=> true,
		);

		$taxonomy_portfolio_category_args = apply_filters('symple_taxonomy_portfolio_category_args', $taxonomy_portfolio_category_args);
		
		register_taxonomy( 'portfolio_category', array( 'portfolio' ), $taxonomy_portfolio_category_args );

	}

	/**
	 * Add Columns to Portfolio Edit Screen
	 * http://wptheming.com/2010/07/column-edit-pages/
	 */

	function portfolio_edit_columns( $columns ) {
		$columns['portfolio_category'] = __( 'Category', 'wpex' );
		$columns['portfolio_tag'] = __( 'Tags', 'wpex' );
		return $columns;
	}

	function portfolio_column_display( $column, $post_id ) {

		// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview

		switch ( $column ) {

			// Display the thumbnail in the column view
			case "portfolio_thumbnail":
				$width = (int) 80;
				$height = (int) 80;
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

				// Display the featured image in the column view if possible
				if ( $thumbnail_id ) {
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				}
				if ( isset( $thumb ) ) {
					echo $thumb;
				} else {
					echo __('None', 'wpex');
				}
				break;

			// Display the portfolio tags in the column view
			case "portfolio_category":

			if ( $category_list = get_the_term_list( $post_id, 'portfolio_category', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo __('None', 'wpex');
			}
			break;	

			// Display the portfolio tags in the column view
			case "portfolio_tag":

			if ( $tag_list = get_the_term_list( $post_id, 'portfolio_tag', '', ', ', '' ) ) {
				echo $tag_list;
			} else {
				echo __('None', 'wpex');
			}
			break;
		}
	}

	/**
	 * Adds taxonomy filters to the portfolio admin page
	 * Code artfully lifed from http://pippinsplugins.com
	 */

	function portfolio_add_taxonomy_filters() {
		global $typenow;

		// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
		$taxonomies = array( 'portfolio_category', 'portfolio_tag' );

		// must set this to the post type you want the filter(s) displayed on
		if ( $typenow == 'portfolio' ) {

			foreach ( $taxonomies as $tax_slug ) {
				$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
				$tax_obj = get_taxonomy( $tax_slug );
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms($tax_slug);
				if ( count( $terms ) > 0) {
					echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
					echo "<option value=''>$tax_name</option>";
					foreach ( $terms as $term ) {
						echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
					}
					echo "</select>";
				}
			}
		}
	}

	/**
	 * Add Portfolio count to "Right Now" Dashboard Widget
	 */

	function add_portfolio_counts() {
			if ( ! post_type_exists( 'portfolio' ) ) {
				 return;
			}

			$num_posts = wp_count_posts( 'portfolio' );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( 'Portfolio Item', 'Portfolio Items', intval($num_posts->publish) );
			if ( current_user_can( 'edit_posts' ) ) {
				$num = "<a href='edit.php?post_type=portfolio'>$num</a>";
				$text = "<a href='edit.php?post_type=portfolio'>$text</a>";
			}
			echo '<td class="first b b-portfolio">' . $num . '</td>';
			echo '<td class="t portfolio">' . $text . '</td>';
			echo '</tr>';

			if ($num_posts->pending > 0) {
				$num = number_format_i18n( $num_posts->pending );
				$text = _n( 'Portfolio Item Pending', 'Portfolio Items Pending', intval($num_posts->pending) );
				if ( current_user_can( 'edit_posts' ) ) {
					$num = "<a href='edit.php?post_status=pending&post_type=portfolio'>$num</a>";
					$text = "<a href='edit.php?post_status=pending&post_type=portfolio'>$text</a>";
				}
				echo '<td class="first b b-portfolio">' . $num . '</td>';
				echo '<td class="t portfolio">' . $text . '</td>';

				echo '</tr>';
			}
	}

}

new Symple_Portfolio_Post_Type;

endif;