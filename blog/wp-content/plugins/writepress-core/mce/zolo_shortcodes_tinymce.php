<?php
/**
 * This file has all the main shortcode functions
 */
function zolo_shortcodes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'zolo_shortcodes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'zolo_shortcodes_register_mce_button' );
	}
}
add_action('admin_head', 'zolo_shortcodes_add_mce_button');


function zolo_shortcodes_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['zolo_shortcodes_mce_button'] = WRITEPRESS_EXTENSIONS_PLUGIN_URL.'/mce/js/zolo_shortcodes_tinymce.js';
	return $plugin_array;
}


function zolo_shortcodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'zolo_shortcodes_mce_button' );
	return $buttons;
}


function zolo_shortcodes_mce_css() {
	wp_enqueue_style('zolo_shortcodes-tc', WRITEPRESS_EXTENSIONS_PLUGIN_URL.'/mce/css/zolo_shortcodes_tinymce_style.css');
}
add_action( 'admin_enqueue_scripts', 'zolo_shortcodes_mce_css' );