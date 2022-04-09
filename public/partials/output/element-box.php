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

			$output = '';
			$output .= '<div id="acx_webex_body_content">
            <div class="section-custom common_padding">
                <div class="acx_inside">
                    <div class="acx_common">';

                    $output .= '<div class="acx_gallery_filtr ">
					<div class="acx_gal_filter_grp filters-button-group">
                        <a class="acx_button is-checked" data-filter="*">all works</a>';
                        $tax_terms = get_terms( array(
                            'taxonomy' => 'public_category',
                            'orderby'    => 'count',
                            'hide_empty' => true,
                            'order'		=>'ASC'
                        ));
						<a class="acx_button" data-filter=".ok">ok</a>
						<a class="acx_button" data-filter=".ikll">ikll</a>

                        $output .= '</div> <!-- acx_gal_filter_grp-->
				</div> <!-- acx_gallery_filtr -->';

                $output .= '<div class="acx_gallery_wrk_cnvs">
					<div class="acx_gal_wrk_split element-item ok" data-category="ok" style="position: absolute; left: 0px; top: 0px;">
                        <div class="acx_gal_inner_split"><img src="http://localhost/wordpress-local/wp-content/uploads/2022/04/shutterstock_547563823-1024x1024-1.jpg"><span class="hover_bg">
                        <div class="gal_hvr_cntnt">
                        <div class="gal_link_hvr">
                            <a onclick="acx_w_portfolio_opened(93);" class="gal_zoom"></a><a href="gfgf" class="gal_linkto"></a></div> <!-- gal_link_hvr -->
                        <span class="gal_hvr_ttl"></span>
                        </div> <!-- gal_hvr_cntnt-->
                        </span>
                        </div> <!-- acx_gal_inner_split-->
                    </div> <!-- acx_gal_wrk_split-->
					<div class="acx_gal_wrk_split element-item ok" data-category="ikll" style="position: absolute; left: 159.969px; top: 0px;">
                        <div class="acx_gal_inner_split"><img src="http://localhost/wordpress-local/wp-content/uploads/2022/04/shutterstock_547563823-1024x1024-1.jpg"><span class="hover_bg">
                        <div class="gal_hvr_cntnt">
                        <div class="gal_link_hvr">
                            <a onclick="acx_w_portfolio_opened(92);" class="gal_zoom"></a><a href="jhjhj" class="gal_linkto"></a></div> <!-- gal_link_hvr -->
                        <span class="gal_hvr_ttl"></span>
                        </div> <!-- gal_hvr_cntnt-->
                        </span>
                        </div> <!-- acx_gal_inner_split-->
                    </div> <!-- acx_gal_wrk_split-->
					<div class="acx_gal_wrk_split element-item ikll" data-category="ikll" style="position: absolute; left: 319.938px; top: 0px;">
                        <div class="acx_gal_inner_split"><img src="http://localhost/wordpress-local/wp-content/uploads/2022/04/Background.jpg"><span class="hover_bg">
                        <div class="gal_hvr_cntnt">
                        <div class="gal_link_hvr">
                            <a onclick="acx_w_portfolio_opened(89);" class="gal_zoom"></a><a href="popop" class="gal_linkto"></a></div> <!-- gal_link_hvr -->
                        <span class="gal_hvr_ttl"></span>
                        </div> <!-- gal_hvr_cntnt-->
                        </span>
                        </div> <!-- acx_gal_inner_split-->
                    </div> <!-- acx_gal_wrk_split-->
				</div> <!-- acx_gallery_wrk_cnvs -->';

                    $output .= '</div><!-- acx_common -->
        </div><!-- acx_inside -->
    </div><!-- section -->
</div>';
			return $output;

		}
	}
}
