<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $writepress_data;

//Header Sticky Code Start
$header_sticky_opt = isset($writepress_data["header_sticky_opt"]) ? $writepress_data["header_sticky_opt"] : 'on';
$multilingual_show_hide = isset($writepress_data["multilingual_show_hide"]) ? $writepress_data["multilingual_show_hide"] : 'on';

$header_sticky_display = isset($writepress_data["header_sticky_display"]) ? $writepress_data["header_sticky_display"] : 'section2';
$top_search_design = isset($writepress_data["search_design"]) ? $writepress_data["search_design"] : 'full_screen_search_but';

$zolo_header_sticky = $header_sticky_opt ? 'zolo_header_sticky' : '';

if($header_sticky_opt == 'on'){
	if($header_sticky_display == 'section2' || $header_sticky_display == 'section3' || $header_sticky_display == 'section2_3'){
		$header_sticky_wrapper_start = '<div class="sticky_header_wrapper"><div class="sticky_header fadeInDown">';
		$header_sticky_wrapper_end = '</div></div>';
	}else{
		$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
		}
}else{
	$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
	}
//Header Sticky Code End
// Mobile Header
$mobile_menu_design = isset($writepress_data["mobile_menu_design"]) ? $writepress_data["mobile_menu_design"] : 'compact';
$mobile_header_top_bar_show_hide = isset($writepress_data["mobile_header_top_bar_show_hide"]) ? $writepress_data["mobile_header_top_bar_show_hide"] : 'off';
$mobile_header_logo_showhide = isset($writepress_data["mobile_header_logo_showhide"]) ? $writepress_data["mobile_header_logo_showhide"] : 'off';
$logo_url = isset($writepress_data['logo']['url']) ? $writepress_data['logo']['url'] :'';
