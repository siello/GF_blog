<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $writepress_data;
$cur_id = writepress_current_page_id();
  
$footer_layout_columns = isset($writepress_data["footer_layout_columns"]) ? $writepress_data["footer_layout_columns"] : 'layout1';
$footer_layout_style = isset($writepress_data["footer_layout_style"]) ? $writepress_data["footer_layout_style"] : 'footer_default';
$back_to_top = isset($writepress_data["back_to_top"]) ? $writepress_data["back_to_top"] : 'default_backtotop';
$footer_widgets = isset($writepress_data["footer_widgets"]) ? $writepress_data["footer_widgets"] : 'off';
$upper_footer_widgets = isset($writepress_data["upper_footer_widgets"]) ? $writepress_data["upper_footer_widgets"] : 'off';
$lower_footer_widgets = isset($writepress_data["lower_footer_widgets"]) ? $writepress_data["lower_footer_widgets"] : 'off';

$footer_upper_columns = isset($writepress_data['footer_upper_columns']) ? $writepress_data['footer_upper_columns'] : '0';
$footer_lower_columns = isset($writepress_data['footer_lower_columns']) ? $writepress_data['footer_lower_columns'] : '0';
$footer_copyright = isset($writepress_data["footer_copyright"]) ? $writepress_data["footer_copyright"] : 'on';
$footer_social_icon = isset($writepress_data["footer_social_icon"]) ? $writepress_data["footer_social_icon"] : 'off';
$copyright_text = isset($writepress_data["copyright_text"]) ? $writepress_data["copyright_text"] : esc_html__('Copyright 2017 writepress','writepress');
$back_to_top_style = isset($writepress_data["back_to_top_style"]) ? $writepress_data["back_to_top_style"] : 'backtotop_style_none';
$copyright_social_align = isset($writepress_data["copyright_social_align"]) ? $writepress_data["copyright_social_align"] : 'default';



$display_footer = get_post_meta( $cur_id, 'zt_display_footer', true ); 
$display_copyright = get_post_meta( $cur_id, 'zt_display_copyright', true ); 
 
// Footer Show and hide
if($display_footer == 'default' || $display_footer == ''){
	 $footer_show_hide = $footer_widgets == 'on' ? 'show' : 'hide';		
 }else if($display_footer == 'yes' || $display_footer == 'no'){
	 $footer_show_hide = ($display_footer == 'yes') ? 'show' : 'hide';		
	 }else{
		  $footer_show_hide = $footer_widgets == 'on' ? 'show' : 'hide';
		 }
			 
// Copyright Section Show and hide
if($display_copyright == 'default' || $display_copyright == ''){
	 $copyright_show_hide = $footer_copyright == 'on' ? 'show' : 'hide';		
 }else if($display_copyright == 'yes' || $display_copyright == 'no'){
	 $copyright_show_hide = ($display_copyright == 'yes') ? 'show' : 'hide';		
	 }else{
		  $copyright_show_hide = $footer_copyright == 'on' ? 'show' : 'hide';
		 }
			 
			 
if($footer_layout_columns == 'layout1'){	
	$layout_columns_class = 'footer_layout_columns_4';
}else if($footer_layout_columns == 'layout2' || $footer_layout_columns == 'layout3' || $footer_layout_columns == 'layout4' || $footer_layout_columns == 'layout5'){		
	$layout_columns_class = 'footer_layout_columns_3';
}else if($footer_layout_columns == 'layout6' || $footer_layout_columns == 'layout7' || $footer_layout_columns == 'layout8'){		
	$layout_columns_class = 'footer_layout_columns_2';
}else if($footer_layout_columns == 'layout9'){		
	$layout_columns_class = 'footer_layout_columns_1';
}