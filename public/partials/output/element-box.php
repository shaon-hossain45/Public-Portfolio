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

			$output  = '';
			$output .= '<div id="acx_webex_body_content">
            <div class="section-custom common_padding">
                <div class="acx_inside">
                    <div class="acx_common">';

			$output       .= '<div class="acx_gallery_filtr ">
					<div class="acx_gal_filter_grp filters-button-group">
                        <a class="acx_button is-checked" data-filter="*">all works</a>';
				$tax_terms = get_terms(
					array(
						'taxonomy'   => 'public_category',
						'orderby'    => 'count',
						'hide_empty' => true,
						'order'      => 'ASC',
					)
				);

			foreach ( $tax_terms as $key => $term ) {
				if ( $term->count > 0 ) {
					$output .= '<a class="acx_button" data-filter=".' . $term->slug . '">' . $term->name . '</a>';
				}
			}

				$output .= '</div> <!-- acx_gal_filter_grp-->
				</div> <!-- acx_gallery_filtr -->';

				$output .= '<div class="acx_gallery_wrk_cnvs">';
			//foreach ( $tax_terms as $key => $term ) {
				//if ( $term->count > 0 ) {

					$args = array(
						'post_type'   => 'public_portfolio',
						'post_status' => array( 'publish' ),
					);

					$the_query = new WP_Query( $args );

					//var_dump( $the_query );

					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) :
							$the_query->the_post();

							$acx_img =  wp_get_attachment_url( get_post_thumbnail_id($post->ID));

							$taxonomies=get_taxonomies('','names');
                			$tax_slug = wp_get_post_terms($post->ID, $taxonomies,  array("fields" => "all"));
							$acx_count = count($tax_slug);

							if($acx_count > 0) {
								for($i= 0; $i< $acx_count ; $i++)
								{
									$elementcount = $tax_slug[$i]->slug;
								   // echo " ";
								   //var_dump($elementcount);
								}
							}

							$output .= '<div class="acx_gal_wrk_split element-item '.$elementcount.'" data-category="'.$tax_slug[0]->slug.'">
							<div class="acx_gal_inner_split"><img src="'.$acx_img.'">
							<span class="hover_bg">
							<div class="gal_hvr_cntnt">
							<div class="gal_link_hvr">
							<a onclick="acx_w_portfolio_opened(93);" class="gal_zoom"></a>
							<a href="gfgf" class="gal_linkto"></a>
							</div> <!-- gal_link_hvr -->
							<span class="gal_hvr_ttl"></span>
							</div> <!-- gal_hvr_cntnt-->
							</span>
							</div> <!-- acx_gal_inner_split-->
							</div> <!-- acx_gal_wrk_split-->';
						endwhile;
					endif;
				//}
			//}
			$output .= '</div> <!-- acx_gallery_wrk_cnvs -->';

			$output .= '</div><!-- acx_common -->
        </div><!-- acx_inside -->
    </div><!-- section -->
</div>';
			return $output;

		}
	}
}
