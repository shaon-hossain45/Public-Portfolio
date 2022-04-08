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
		}

		// Register Custom Post Type
		function custom_post_type() {

			$labels = array(
				'name'                  => _x( 'Public Portfolios', 'Post Type General Name', 'public-portfolio' ),
				'singular_name'         => _x( 'Public Portfolio', 'Post Type Singular Name', 'public-portfolio' ),
				'menu_name'             => __( 'Public Portfolios', 'public-portfolio' ),
				'name_admin_bar'        => __( 'Public Portfolio', 'public-portfolio' ),
				'archives'              => __( 'Item Archives', 'public-portfolio' ),
				'attributes'            => __( 'Item Attributes', 'public-portfolio' ),
				'parent_item_colon'     => __( 'Parent Item:', 'public-portfolio' ),
				'all_items'             => __( 'All Items', 'public-portfolio' ),
				'add_new_item'          => __( 'Add New Item', 'public-portfolio' ),
				'add_new'               => __( 'Add New', 'public-portfolio' ),
				'new_item'              => __( 'New Item', 'public-portfolio' ),
				'edit_item'             => __( 'Edit Item', 'public-portfolio' ),
				'update_item'           => __( 'Update Item', 'public-portfolio' ),
				'view_item'             => __( 'View Item', 'public-portfolio' ),
				'view_items'            => __( 'View Items', 'public-portfolio' ),
				'search_items'          => __( 'Search Item', 'public-portfolio' ),
				'not_found'             => __( 'Not found', 'public-portfolio' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'public-portfolio' ),
				'featured_image'        => __( 'Featured Image', 'public-portfolio' ),
				'set_featured_image'    => __( 'Set featured image', 'public-portfolio' ),
				'remove_featured_image' => __( 'Remove featured image', 'public-portfolio' ),
				'use_featured_image'    => __( 'Use as featured image', 'public-portfolio' ),
				'insert_into_item'      => __( 'Insert into item', 'public-portfolio' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', 'public-portfolio' ),
				'items_list'            => __( 'Items list', 'public-portfolio' ),
				'items_list_navigation' => __( 'Items list navigation', 'public-portfolio' ),
				'filter_items_list'     => __( 'Filter items list', 'public-portfolio' ),
			);
			$args   = array(
				'label'               => __( 'Public Portfolio', 'public-portfolio' ),
				'description'         => __( 'Post Type Description', 'public-portfolio' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies'          => array( 'category', 'post_tag' ),
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
	}
}
