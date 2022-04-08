<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Public_Portfolio
 * @subpackage Public_Portfolio/public/partials
 */

// namespace Inc;

if ( ! class_exists( 'outputBoxSetup' ) ) {
	class outputBoxSetup {


		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string $plugin_name       The name of this plugin.
		 * @param      string $version    The version of this plugin.
		 */
		public function __construct() {
			add_shortcode( 'public_portfolio', array( $this, 'shortcode_boxed' ) );

		}

        /**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string $plugin_name       The name of this plugin.
		 * @param      string $version    The version of this plugin.
		 */
		public function shortcode_boxed( $atts, $content = null, $tag = '' ) {
			global $post;
			$a = shortcode_atts(
				array(
					'title'       => 'Title',
					'title_color' => 'white',
					'color'       => 'blue',
				),
				$atts
			);

			echo $output = 'shaon';

		}
	}
}
