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

if ( ! class_exists( 'CmbBaseSetup' ) ) {
	class CmbBaseSetup {
		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string $plugin_name       The name of this plugin.
		 * @param      string $version    The version of this plugin.
		 */
		public function __construct() {
			add_action( 'add_meta_boxes', array( $this, 'wporg_add_custom_box' ) );
			add_action( 'save_post', array( $this, 'wporg_save_postdata' ) );
		}

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string $plugin_name       The name of this plugin.
		 * @param      string $version    The version of this plugin.
		 */
		public function wporg_add_custom_box() {
			$screens = array( 'public_portfolio' );
			foreach ( $screens as $screen ) {
				add_meta_box(
					'wporg_box_id',                 // Unique ID
					'Public Portfolio Box',      // Box title
					array( $this, 'wporg_custom_box_html' ),  // Content callback, must be of type callable
					$screen                            // Post type
				);
			}
		}

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string $plugin_name       The name of this plugin.
		 * @param      string $version    The version of this plugin.
		 */
		public function wporg_custom_box_html( $post ) {
			$value = get_post_meta( $post->ID, '_wporg_meta_key', true );
			var_dump( $value );
			?>

<div class="csf-field csf-field-select">
	<div class="csf-title"><h4>Choose Type</h4></div>
	<div class="csf-fieldset">
		<select name="_prefix_custom_options[opt-select-1]" data-depend-id="opt-select-1" placeholder="Select an option">
			<option value="">Select an option</option>
			<option value="opt-1" <?php
			if ( isset( $value['opt-select-1'] ) && $value['opt-select-1'] == 'opt-1' ) {
				echo 'selected="selected"';
			};
			?>>Website</option>
			<option value="opt-2" <?php
			if ( isset( $value['opt-select-1'] ) && $value['opt-select-1'] == 'opt-2' ) {
				echo 'selected="selected"';
			};
			?>>Logo</option>
			<option value="opt-3" <?php
			if ( isset( $value['opt-select-1'] ) && $value['opt-select-1'] == 'opt-3' ) {
				echo 'selected="selected"';
			};
			?>>Social Marketing</option>
		</select>
	</div>
	<div class="clear"></div>
</div>
<div class="csf-field csf-field-text">
	<div class="csf-title"><h4>Project Location</h4></div>
	<div class="csf-fieldset">
		<input type="text" name="_prefix_custom_options[opt-textloc]" value="<?php
			if ( isset( $value['opt-textloc'] ) ) {
				echo $value['opt-textloc'];
			};
			?>" data-depend-id="opt-text" class="">
	</div>
	<div class="clear"></div>
</div>
<div class="csf-field csf-field-textarea">
	<div class="csf-title"><h4>Project Description</h4></div>
	<div class="csf-fieldset">
		<textarea name="_prefix_custom_options[opt-textarea]" data-depend-id="opt-textarea"><?php
			if ( isset( $value['opt-textarea'] ) ) {
				echo $value['opt-textarea'];
			};
			?></textarea>
		<div class="csf-help"><span class="csf-help-text">The help text of the field.</span><i class="fas fa-question-circle"></i></div>
	</div>
	<div class="clear"></div>
</div>
<div class="csf-field csf-field-text">
	<div class="csf-title"><h4>Project Author</h4></div>
	<div class="csf-fieldset">
		<input type="text" name="_prefix_custom_options[opt-textaut]" value="<?php
			if ( isset( $value['opt-textaut'] ) ) {
				echo $value['opt-textaut'];
			};
			?>" data-depend-id="opt-text" class="">
	</div>
	<div class="clear"></div>
</div>
<div class="csf-field csf-field-text">
	<div class="csf-title"><h4>Project Link</h4></div>
	<div class="csf-fieldset">
		<input type="text" name="_prefix_custom_options[opt-textlin]" value="<?php
			if ( isset( $value['opt-textlin'] ) ) {
				echo $value['opt-textlin'];
			};
			?>" data-depend-id="opt-text" class="">
	</div>
	<div class="clear"></div>
</div>

<div class="csf-field csf-field-media">
	<div class="csf-title"><h4>Project Media (Web)</h4></div>
	<div class="csf-fieldset">
		<div class="csf--preview <?php
			if ( isset( $value['opt-media1'] ) && ( empty( $value['opt-media1'] ) ) ) {
				echo 'hidden';
			};
			?>">
			<div class="csf-image-preview"><a href="#" class="csf--remove fas fa-times"></a><img src="<?php
			if ( isset( $value['opt-media1'] ) ) {
				echo $value['opt-media1'];
			};
			?>" class="csf--src"></div>
		</div>
		<div class="csf--placeholder">
			<input type="text" name="_prefix_custom_options[opt-media1]" id="meta-image" value="<?php
			if ( isset( $value['opt-media1'] ) ) {
				echo $value['opt-media1'];
			};
			?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-1" placeholder="Not selected">
			<a class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
			<a href="#" class="button button-secondary csf-warning-primary csf--remove <?php
			if ( isset( $value['opt-media1'] ) && ( empty( $value['opt-media1'] ) ) ) {
				echo 'hidden';
			};
			?>">Remove</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="csf-field csf-field-media">
	<div class="csf-title"><h4>Project Media (Tablet)</h4></div>
	<div class="csf-fieldset">
		<div class="csf--preview <?php
			if ( isset( $value['opt-media2'] ) && ( empty( $value['opt-media2'] ) ) ) {
				echo 'hidden';
			};
			?>">
			<div class="csf-image-preview"><a href="#" class="csf--remove fas fa-times"></a><img src="<?php
			if ( isset( $value['opt-media2'] ) ) {
				echo $value['opt-media2'];
			};
			?>" class="csf--src"></div>
		</div>
		<div class="csf--placeholder">
			<input type="text" name="_prefix_custom_options[opt-media2]" value="<?php
			if ( isset( $value['opt-media2'] ) ) {
				echo $value['opt-media2'];
			};
			?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-2" placeholder="Not selected">
			<a href="#" class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
			<a href="#" class="button button-secondary csf-warning-primary csf--remove <?php
			if ( isset( $value['opt-media2'] ) && ( empty( $value['opt-media2'] ) ) ) {
				echo 'hidden';
			};
			?>">Remove</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="csf-field csf-field-media">
	<div class="csf-title"><h4>Project Media (Mobile)</h4></div>
	<div class="csf-fieldset">
		<div class="csf--preview <?php
			if ( isset( $value['opt-media3'] ) && ( empty( $value['opt-media3'] ) ) ) {
				echo 'hidden';
			};
			?>">
			<div class="csf-image-preview"><a href="#" class="csf--remove fas fa-times"></a><img src="<?php
			if ( isset( $value['opt-media3'] ) ) {
				echo $value['opt-media3'];
			};
			?>" class="csf--src"></div>
		</div>
		<div class="csf--placeholder">
			<input type="text" name="_prefix_custom_options[opt-media3]" value="<?php
			if ( isset( $value['opt-media3'] ) ) {
				echo $value['opt-media3'];
			};
			?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-3" placeholder="Not selected">
			<a href="#" class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
			<a href="#" class="button button-secondary csf-warning-primary csf--remove <?php
			if ( isset( $value['opt-media3'] ) && ( empty( $value['opt-media3'] ) ) ) {
				echo 'hidden';
			};
			?>">Remove</a>
		</div>
	</div>
	<div class="clear"></div>
</div>

			<?php
		}


		public function wporg_save_postdata( $post_id ) {
			if ( array_key_exists( '_prefix_custom_options', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_wporg_meta_key',
					$_POST['_prefix_custom_options']
				);
			}
		}

	}
}
