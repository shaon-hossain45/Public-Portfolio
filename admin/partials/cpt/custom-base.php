<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    public_plugin
 * @subpackage public_plugin/admin/partials
 */
// namespace Inc;

if ( ! class_exists( 'CptBaseSetup' ) ) {
	class CptBaseSetup {

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string $plugin_name       The name of this plugin.
		 * @param      string $version    The version of this plugin.
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'custom_post_type' ), 0 );
			add_action( 'init', array( $this, 'public_category' ), 0 );
			add_action( 'init', array( $this, 'public_tag' ), 0 );
		}

		// Register Custom Post Type
		function custom_post_type() {

			$labels = array(
				'name'                  => _x( 'Public Portfolios', 'Post Type General Name', 'public-portfolio' ),
				'singular_name'         => _x( 'Public Portfolio', 'Post Type Singular Name', 'public-portfolio' ),
				'menu_name'             => __( 'Public Portfolios', 'public-portfolio' ),
				'name_admin_bar'        => __( 'Public Portfolio', 'public-portfolio' ),
				'archives'              => __( 'Portfolio Archives', 'public-portfolio' ),
				'attributes'            => __( 'Portfolio Attributes', 'public-portfolio' ),
				'parent_item_colon'     => __( 'Parent Portfolio:', 'public-portfolio' ),
				'all_items'             => __( 'All Portfolios', 'public-portfolio' ),
				'add_new_item'          => __( 'Add New Portfolio', 'public-portfolio' ),
				'add_new'               => __( 'Add New', 'public-portfolio' ),
				'new_item'              => __( 'New Portfolio', 'public-portfolio' ),
				'edit_item'             => __( 'Edit Portfolio', 'public-portfolio' ),
				'update_item'           => __( 'Update Portfolio', 'public-portfolio' ),
				'view_item'             => __( 'View Portfolio', 'public-portfolio' ),
				'view_items'            => __( 'View Portfolios', 'public-portfolio' ),
				'search_items'          => __( 'Search Portfolio', 'public-portfolio' ),
				'not_found'             => __( 'Not found', 'public-portfolio' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'public-portfolio' ),
				'featured_image'        => __( 'Featured Image', 'public-portfolio' ),
				'set_featured_image'    => __( 'Set featured image', 'public-portfolio' ),
				'remove_featured_image' => __( 'Remove featured image', 'public-portfolio' ),
				'use_featured_image'    => __( 'Use as featured image', 'public-portfolio' ),
				'insert_into_item'      => __( 'Insert into item', 'public-portfolio' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', 'public-portfolio' ),
				'items_list'            => __( 'Portfolios list', 'public-portfolio' ),
				'items_list_navigation' => __( 'Portfolios list navigation', 'public-portfolio' ),
				'filter_items_list'     => __( 'Filter items list', 'public-portfolio' ),
			);

			$args = array(
				'label'               => __( 'Public Portfolio', 'public-portfolio' ),
				'description'         => __( 'Post Type Description', 'public-portfolio' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies'          => array( 'public_category', 'public_tag' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-welcome-learn-more',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
			);
			register_post_type( 'public_portfolio', $args );

		}


		// Register Custom Taxonomy
		function public_category() {

			$labels = array(
				'name'                       => _x( 'Public Categories', 'Taxonomy General Name', 'public-portfolio' ),
				'singular_name'              => _x( 'Public Category', 'Taxonomy Singular Name', 'public-portfolio' ),
				'menu_name'                  => __( 'Public Category', 'public-portfolio' ),
				'all_items'                  => __( 'All Items', 'public-portfolio' ),
				'parent_item'                => __( 'Parent Category', 'public-portfolio' ),
				'parent_item_colon'          => __( 'Parent Category:', 'public-portfolio' ),
				'new_item_name'              => __( 'New Category Name', 'public-portfolio' ),
				'add_new_item'               => __( 'Add New Category', 'public-portfolio' ),
				'edit_item'                  => __( 'Edit Category', 'public-portfolio' ),
				'update_item'                => __( 'Update Category', 'public-portfolio' ),
				'view_item'                  => __( 'View Category', 'public-portfolio' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'public-portfolio' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'public-portfolio' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'public-portfolio' ),
				'popular_items'              => __( 'Popular Categories', 'public-portfolio' ),
				'search_items'               => __( 'Search Categories', 'public-portfolio' ),
				'not_found'                  => __( 'Not Found', 'public-portfolio' ),
				'no_terms'                   => __( 'No items', 'public-portfolio' ),
				'items_list'                 => __( 'Categories list', 'public-portfolio' ),
				'items_list_navigation'      => __( 'Categories list navigation', 'public-portfolio' ),
			);
			$args   = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
			);
			register_taxonomy( 'public_category', array( 'public_portfolio' ), $args );

		}


		// Register Custom Taxonomy
		function public_tag() {

			$labels = array(
				'name'                       => _x( 'Public Tags', 'Taxonomy General Name', 'public-portfolio' ),
				'singular_name'              => _x( 'Public Tag', 'Taxonomy Singular Name', 'public-portfolio' ),
				'menu_name'                  => __( 'Public Tag', 'public-portfolio' ),
				'all_items'                  => __( 'All Tags', 'public-portfolio' ),
				'parent_item'                => __( 'Parent Tag', 'public-portfolio' ),
				'parent_item_colon'          => __( 'Parent Tag:', 'public-portfolio' ),
				'new_item_name'              => __( 'Public Tag', 'public-portfolio' ),
				'add_new_item'               => __( 'Add New Tag', 'public-portfolio' ),
				'edit_item'                  => __( 'Edit Tag', 'public-portfolio' ),
				'update_item'                => __( 'Update Tag', 'public-portfolio' ),
				'view_item'                  => __( 'View Tag', 'public-portfolio' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'public-portfolio' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'public-portfolio' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'public-portfolio' ),
				'popular_items'              => __( 'Popular Tags', 'public-portfolio' ),
				'search_items'               => __( 'Search Tags', 'public-portfolio' ),
				'not_found'                  => __( 'Not Found', 'public-portfolio' ),
				'no_terms'                   => __( 'No items', 'public-portfolio' ),
				'items_list'                 => __( 'Tags list', 'public-portfolio' ),
				'items_list_navigation'      => __( 'Tags list navigation', 'public-portfolio' ),
			);
			$args   = array(
				'labels'            => $labels,
				'hierarchical'      => false,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
			);
			register_taxonomy( 'public_tag', array( 'public_portfolio' ), $args );

		}

	}
}
