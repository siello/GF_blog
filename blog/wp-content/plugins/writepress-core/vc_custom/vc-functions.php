<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if( !function_exists ('zolo_shortcodes_scripts') ) :
	function zolo_shortcodes_scripts() {
	$scripts_dir = WRITEPRESS_EXTENSIONS_PLUGIN_URL;
	$theme_info = wp_get_theme();
	// CSS Add Here 	
	wp_enqueue_style( 'zt-owl.carousel-2', $scripts_dir.'/vc_custom/css/owl.carousel-2.css', array(), $theme_info->get('Version'));
	wp_enqueue_style( 'zt-animate', $scripts_dir.'/vc_custom/css/animate.css', array(), $theme_info->get('Version'));
	wp_enqueue_style( 'zt-shortcode', $scripts_dir.'/vc_custom/css/zt-shortcode.css', array(), $theme_info->get('Version'));
	
	// JS Add Here
	wp_enqueue_script( 'zt-jquery.countTo', $scripts_dir.'/vc_custom/js/jquery.countTo.js', array ('jquery'), $theme_info->get('Version'));
	wp_enqueue_script( 'zt-owl.carousel-2', $scripts_dir.'/vc_custom/js/owl.carousel-2.js', array ('jquery'), $theme_info->get('Version'));	
	wp_enqueue_script( 'zt-owcarousel2thumbs', $scripts_dir.'/vc_custom/js/owl.carousel2.thumbs.js', array ('jquery'), $theme_info->get('Version'));
	wp_enqueue_script( 'zt-jquery.appear', $scripts_dir.'/vc_custom/js/jquery.appear.js', array ('jquery'), $theme_info->get('Version'));
	wp_enqueue_script( 'zt-all_scripts', $scripts_dir.'/vc_custom/js/all_scripts.js', array ('jquery'), $theme_info->get('Version'));
}
add_action('wp_enqueue_scripts', 'zolo_shortcodes_scripts');
endif;

if( !function_exists ('isotope_categories') ) : 
function isotope_categories($rnd_id) {
	
	$terms = get_terms("category"); 
	$count = count($terms);  
	
	$html = '<div class="button-group filters-button-group postfilter-'.$rnd_id.'">';
	$html .= '<button class="button is-checked"  data-filter="*">All</button>';
	
	if ( $count > 0 ){  
		foreach ( $terms as $term ){
			$termname = strtolower($term->name);
			$termname = str_replace(' ', '-', $termname);
			$html .= '<button class="button" data-filter=".'.$termname.'">'.$term->name.'</button>';
		
		}
		$html .= '</div>';
		echo $html;
	}
}
endif;

if( !function_exists ('writepress_data_animations') ) : 
function writepress_data_animations() {

	$array = array(__("No Animation",'writepress-core') => "No Animation",__("bounce",'writepress-core') => "bounce",__("flash",'writepress-core') => "flash",__("pulse",'writepress-core') => "pulse",__("rubberBand",'writepress-core') => "rubberBand",__("shake",'writepress-core') => "shake",__("headShake",'writepress-core') => "headShake",__("swing",'writepress-core') => "swing",__("tada",'writepress-core') => "tada",__("wobble",'writepress-core') => "wobble",__("jello",'writepress-core') => "jello",__("bounceIn",'writepress-core') => "bounceIn",__("bounceInDown",'writepress-core') => "bounceInDown",__("bounceInLeft",'writepress-core') => "bounceInLeft",__("bounceInRight",'writepress-core') => "bounceInRight",__("bounceInUp",'writepress-core') => "bounceInUp",__("bounceOut",'writepress-core') => "bounceOut",__("bounceOutDown",'writepress-core') => "bounceOutDown",__("bounceOutLeft",'writepress-core') => "bounceOutLeft",__("bounceOutRight",'writepress-core') => "bounceOutRight",__("bounceOutUp",'writepress-core') => "bounceOutUp",__("fadeIn",'writepress-core') => "fadeIn",__("fadeInDown",'writepress-core') => "fadeInDown",__("fadeInDownBig",'writepress-core') => "fadeInDownBig",__("fadeInLeft",'writepress-core') => "fadeInLeft",__("fadeInLeftBig",'writepress-core') => "fadeInLeftBig",__("fadeInRight",'writepress-core') => "fadeInRight",__("fadeInRightBig",'writepress-core') => "fadeInRightBig",__("fadeInUp",'writepress-core') => "fadeInUp",__("fadeInUpBig",'writepress-core') => "fadeInUpBig",__("fadeOut",'writepress-core') => "fadeOut",__("fadeOutDown",'writepress-core') => "fadeOutDown",__("fadeOutDownBig",'writepress-core') => "fadeOutDownBig",__("fadeOutLeft",'writepress-core') => "fadeOutLeft",__("fadeOutLeftBig",'writepress-core') => "fadeOutLeftBig",__("fadeOutRight",'writepress-core') => "fadeOutRight",__("fadeOutRightBig",'writepress-core') => "fadeOutRightBig",__("fadeOutUp",'writepress-core') => "fadeOutUp",__("fadeOutUpBig",'writepress-core') => "fadeOutUpBig",__("flipInX",'writepress-core') => "flipInX",__("flipInY",'writepress-core') => "flipInY",__("flipOutX",'writepress-core') => "flipOutX",__("flipOutY",'writepress-core') => "flipOutY",__("lightSpeedIn",'writepress-core') => "lightSpeedIn",__("lightSpeedOut",'writepress-core') => "lightSpeedOut",__("rotateIn",'writepress-core') => "rotateIn",__("rotateInDownLeft",'writepress-core') => "rotateInDownLeft",__("rotateInDownRight",'writepress-core') => "rotateInDownRight",__("rotateInUpLeft",'writepress-core') => "rotateInUpLeft",__("rotateInUpRight",'writepress-core') => "rotateInUpRight",__("rotateOut",'writepress-core') => "rotateOut",__("rotateOutDownLeft",'writepress-core') => "rotateOutDownLeft",__("rotateOutDownRight",'writepress-core') => "rotateOutDownRight",__("rotateOutUpLeft",'writepress-core') => "rotateOutUpLeft",__("rotateOutUpRight",'writepress-core') => "rotateOutUpRight",__("hinge",'writepress-core') => "hinge",__("rollIn",'writepress-core') => "rollIn",__("rollOut",'writepress-core') => "rollOut",__("zoomIn",'writepress-core') => "zoomIn",__("zoomInDown",'writepress-core') => "zoomInDown",__("zoomInLeft",'writepress-core') => "zoomInLeft",__("zoomInRight",'writepress-core') => "zoomInRight",__("zoomInUp",'writepress-core') => "zoomInUp",__("zoomOut",'writepress-core') => "zoomOut",__("zoomOutDown",'writepress-core') => "zoomOutDown",__("zoomOutLeft",'writepress-core') => "zoomOutLeft",__("zoomOutRight",'writepress-core') => "zoomOutRight",__("zoomOutUp",'writepress-core') => "zoomOutUp",__("slideInDown",'writepress-core') => "slideInDown",__("slideInLeft",'writepress-core') => "slideInLeft",__("slideInRight",'writepress-core') => "slideInRight",__("slideInUp",'writepress-core') => "slideInUp",__("slideOutDown",'writepress-core') => "slideOutDown",__("slideOutLeft",'writepress-core') => "slideOutLeft",__("slideOutRight",'writepress-core') => "slideOutRight",__("slideOutUp",'writepress-core') => "slideOutUp");
		
	return $array;
}
endif;


if( !function_exists ('isotope_portfolio_categories') ) :
function isotope_portfolio_categories($rnd_id) {
	
	$terms = get_terms("catportfolio"); 
	$count = count($terms);  
	
	$html = '<div class="button-group filters-button-group portfoliofilter-'.$rnd_id.'">';
	$html .= '<button class="button is-checked"  data-filter="*">All</button>';
	
	if ( $count > 0 ){  
		foreach ( $terms as $term ) {  
			$termname = strtolower($term->name);  
			$termname = str_replace(' ', '-', $termname);  
			$html .= '<button class="button" data-filter=".'.$termname.'">'.$term->name.'</button>';  
		
		}
	
		$html .= '</div>';	
		echo $html;
	}
}
endif;
// Generate random string 
if( !function_exists ('RandomString') ) :
function RandomString($length) {
	
	$key = null;
    $keys = array_merge(range(0,9), range('a', 'z'));

    for($i=0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}
endif;
function writepress_set_vc_as_theme() {
		
	vc_set_as_theme($disable_updater = true);
	
	if ( function_exists( 'vc_set_template_dir' ) ) {
		$templates_path = WRITEPRESS_EXTENSIONS_PLUGIN_PATH . 'vc_custom/vc_templates/';
		vc_set_shortcodes_templates_dir( $templates_path );
	}

	require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH ."/vc_custom/ajax-handlers.php");	
	
	
	//if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
		//vc_set_default_editor_post_types( array( 'page', 'post' ) );
	//}

	//if(function_exists('vc_disable_frontend')) {
		//vc_disable_frontend();
	//}

}
add_action('vc_before_init', 'writepress_set_vc_as_theme');


vc_remove_element( 'vc_icon' );  
//vc_remove_element( 'vc_toggle' );  
vc_remove_element( 'vc_images_carousel' );
vc_remove_element( 'vc_tabs' ); 
vc_remove_element( 'vc_tour' );  
vc_remove_element( 'vc_accordion' );
vc_remove_element( 'vc_tta_pageable' );  
vc_remove_element( 'swatch_container' );   
vc_remove_element( 'ultimate_video_banner' );  
vc_remove_element( 'vc_posts_slider' );
vc_remove_element( 'vc_progress_bar' ); 
vc_remove_element( 'vc_pie' ); 
vc_remove_element( 'vc_basic_grid' );
vc_remove_element( 'vc_media_grid' );
vc_remove_element( 'vc_masonry_grid' );
vc_remove_element( 'vc_masonry_media_grid' );
//vc_remove_element( 'vc_button' );
vc_remove_element( 'vc_button2' ); 
vc_remove_element( 'vc_cta_button' ); 
vc_remove_element( 'vc_cta_button2' ); 
vc_remove_element( 'vc_cta' );  
vc_remove_element( 'vc_wp_search' );
vc_remove_element( 'vc_element-description' );
vc_remove_element( 'vc_wp_recentcomments' );
vc_remove_element( 'vc_wp_calendar' ); 
vc_remove_element( 'vc_wp_pages' ); 
vc_remove_element( 'vc_wp_tagcloud' ); 
vc_remove_element( 'vc_wp_custommenu' ); 
vc_remove_element( 'vc_wp_text' ); 
vc_remove_element( 'vc_wp_posts' ); 
vc_remove_element( 'vc_wp_categories' ); 
vc_remove_element( 'vc_wp_archives' ); 
vc_remove_element( 'vc_wp_rss' );  
vc_remove_element( 'vc_wp_meta' );
//vc_remove_element( 'contact-form-7' );


///////////////////////////////////////////////////////////////////////////////////////
//////                                                                           /////
/////                            ACCORDION module modifications                 /////
////                                                                           /////
///////////////////////////////////////////////////////////////////////////////////
vc_remove_param('vc_tta_accordion', 'style');
vc_remove_param('vc_tta_accordion', 'shape');
vc_remove_param('vc_tta_accordion', 'color'); 
vc_remove_param('vc_tta_accordion', 'no_fill');
vc_remove_param('vc_tta_accordion', 'spacing');
vc_remove_param('vc_tta_accordion', 'gap');
vc_remove_param('vc_tta_accordion', 'mt');
vc_remove_param('vc_tta_accordion', 'mb');
//vc_remove_param('vc_tta_accordion', 'c_align');
//vc_remove_param('vc_tta_accordion', 'c_position');



$attributes = array(
	'type' => 'dropdown',
	'heading' => __("Icon",'writepress-core'),
	'param_name' => 'c_icon',
	"value" => array (__("Chevron",'writepress-core') => "chevron",__("None",'writepress-core') => "icon_none",__("Plus",'writepress-core') => "plus", __("Triangle",'writepress-core') => "triangle", __("Cross",'writepress-core') => "cross"),
	'description' => __("Select accordion shape.",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	"type" => "checkbox",
	"heading" => __("Icon Border",'writepress-core'),
	"param_name" => "icon_border",
	'value' => array(  'Yes'  => true ),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'dropdown',
	'heading' => __("Accordian Title Border Style",'writepress-core'),
	'param_name' => 'accordian_titleborder',
	"value" => array (__("Border",'writepress-core') => "titleborder_all",__("Bottom Border",'writepress-core') => "titleborder_bottom",__("None",'writepress-core') => "titleborder_none"),
	'description' => __("Select Title Border style.",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'textfield',
	'heading' => __("Accordian Title Spacing",'writepress-core'),
	'param_name' => 'c_title_spacing',
	'value' => '2',
	'description' => __("Accordion title to title Spacing",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'textfield',
	'heading' => __("Accordian Content Spacing",'writepress-core'),
	'param_name' => 'c_content_spacing',
	'value' => '1',
	'description' => __("Accordion title to content Spacing",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'textfield',
	'heading' => __("Title Left padding",'writepress-core'),
	'param_name' => 'ct_l_padding',
	'value' => '50',
	'description' => __("Accordion title left Padding ( e.g 10 )",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);
$attributes = array(
	'type' => 'textfield',
	'heading' => __("Title  Right padding",'writepress-core'),
	'param_name' => 'ct_r_padding',
	'value' => '50',
	'description' => __("Accordion title right Padding ( e.g 10 )",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'textfield',
	'heading' => __("Title Top and Bottom padding",'writepress-core'),
	'param_name' => 'ct_tb_padding',
	'value' => '10',
	'description' => __("Accordion title left and right Padding ( e.g 10 )",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'textfield',
	'heading' => __("Content Left and Right padding",'writepress-core'),
	'param_name' => 'cc_lr_padding',
	'value' => '25',
	'description' => __("Accordion content Left and Right padding ( e.g 10 )",'writepress-core'),
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Title color",'writepress-core'),
	'param_name' => 'title_color',
	'value' => '#aaaaaa',
	'description' => __("Select the Title color",'writepress-core')
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Title background color",'writepress-core'),
	'param_name' => 'title_bg_color',
	'value' => '',
	'description' => __("Select the Title background color",'writepress-core')
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Tab border color",'writepress-core'),
	'param_name' => 'border_color',
	'value' => '#ecebeb',
	'description' => __("Select the border color",'writepress-core')
);
vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Content text color",'writepress-core'),
	'param_name' => 'content_text_color',
	'value' => '#aaaaaa',
	'description' => __("Select the tab content text color",'writepress-core')
);
vc_add_param('vc_tta_accordion', $attributes);


$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Content background color",'writepress-core'),
	'param_name' => 'content_bg_color',
	'value' => '',
	'description' => __("Select the tab content background color",'writepress-core')
);
vc_add_param('vc_tta_accordion', $attributes);


$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Content Border color",'writepress-core'),
	'param_name' => 'content_border_color',
	'value' => '#ecebeb',
	'description' => __("Select the tab content border color",'writepress-core')
);

vc_add_param('vc_tta_accordion', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Active Tab title color",'writepress-core'),
	'param_name' => 'active_title_color',
	'value' => '#549ffc',
	'description' => __("Select the Active Tab Title color",'writepress-core')
);

vc_add_param('vc_tta_section', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Active Tab background color",'writepress-core'),
	'param_name' => 'active_bg_color',
	'value' => '',
	'description' => __("Select the Active Tab Title background color",'writepress-core')
);

vc_add_param('vc_tta_section', $attributes);

$attributes = array(
	'type' => 'colorpicker',
	'heading' => __("Active Tab Border color",'writepress-core'),
	'param_name' => 'active_border_color',
	'value' => '#ecebeb',
	'description' => __("Select the Active Tab Title Border color",'writepress-core')
);

vc_add_param('vc_tta_section', $attributes);


foreach(glob(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'vc_custom/zolo_vc_addons/modules/*.php') as $module) {
		require_once($module);
}
//include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		foreach(glob(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'vc_custom/zolo_vc_addons/contact_form_7/*.php') as $module) {
			require_once($module);
		}
}