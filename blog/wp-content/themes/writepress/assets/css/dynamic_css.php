<?php
global $writepress_data;	
$cur_id = writepress_current_page_id();		
$output = '';

//titlebar_text_alignment
$p_title_align = get_post_meta( $cur_id, 'zt_titlebar_text_alignment', true );
$t_title_align = isset($writepress_data["page_title_alignment"]) ? $writepress_data["page_title_alignment"] : 'left' ;
if ( is_front_page() && is_home() ) {
	$titlebar_text_alignment = $t_title_align;
} else {
	if($p_title_align=='Default' || $p_title_align==''){
		$titlebar_text_alignment = $t_title_align;
	}else{
		$titlebar_text_alignment = $p_title_align;
	}
}  

// Site Layout CSS Start 
$site_width = isset($writepress_data['site_width']['width']) ? $writepress_data['site_width']['width'] : '1280px';
$output .= '.zolo-container,body.boxed_layout .layout_design{max-width:'.$site_width.';}';

$output .= '.body.boxed_layout .sticky_header.fixed{max-width:'.$site_width.';}';
$output .= '.pagetitle_parallax_content h1,.pagetitle_parallax{text-align:'.$titlebar_text_alignment.';}';
// Site Layout CSS End 
$preloader_bg_color = isset($writepress_data["preloader_bg_color"]) ? $writepress_data["preloader_bg_color"] : '#ffffff';
$output .= '#mask{background:'.$preloader_bg_color.';}';

$sitelayout_padding_top = isset($writepress_data["sitelayout_padding"]["padding-top"]) ? $writepress_data["sitelayout_padding"]["padding-top"] :'0px';
$sitelayout_padding_bottom = isset($writepress_data["sitelayout_padding"]["padding-bottom"]) ? $writepress_data["sitelayout_padding"]["padding-bottom"] :'0px';

$output .= '.site_layout{padding-top:'.$sitelayout_padding_top.'; padding-bottom:'.$sitelayout_padding_bottom.';}';

// Top Area CSS Start
$header_typography_css = '';
if(isset($writepress_data['header_typography']) && $writepress_data['header_typography'] && is_array($writepress_data['header_typography'])) {
if(isset($writepress_data['header_typography']['font-family']) && !empty($writepress_data['header_typography']['font-family'])) {
	$header_typography_css .= 'font-family: '.esc_attr($writepress_data['header_typography']['font-family']).';';
}
if(isset($writepress_data['header_typography']['font-size']) && !empty($writepress_data['header_typography']['font-size'])) {
	$header_typography_css .= 'font-size: '.esc_attr($writepress_data['header_typography']['font-size']).';';
}
if(isset($writepress_data['header_typography']['font-style']) && !empty($writepress_data['header_typography']['font-style'])) {
	$header_typography_css .= 'font-style: '.esc_attr($writepress_data['header_typography']['font-style']).';';
}
if(isset($writepress_data['header_typography']['font-weight']) && !empty($writepress_data['header_typography']['font-weight'])) {
	$header_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_typography']['font-weight']).';';
}
if(isset($writepress_data['header_typography']['letter-spacing']) && !empty($writepress_data['header_typography']['letter-spacing'])) {
	$header_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_typography']['text-transform']) && !empty($writepress_data['header_typography']['text-transform'])) {
	$header_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_typography']['text-transform']).';';
}
$output .= '.zolo-header-area{'.$header_typography_css.'}';
}



if(isset($writepress_data["header_top_bg_color"])){ 
$output .= '.zolo-topbar .zolo_navbar_search.expanded_search_but .nav_search_form_area,.zolo-topbar{background:'.$writepress_data["header_top_bg_color"].'; }';
}
if(isset($writepress_data["header_top_border"])){$output .= '.zolo-topbar{border-style:'.$writepress_data["header_top_border"]["border-style"].';border-color:'.$writepress_data["header_top_border_color"].';border-top-width:'.$writepress_data["header_top_border"]["border-top"].';border-right-width:'.$writepress_data["header_top_border"]["border-right"].';border-bottom-width:'.$writepress_data["header_top_border"]["border-bottom"].';border-left-width:'.$writepress_data["header_top_border"]["border-left"].';}';
}
if(isset($writepress_data["top_bar_font_color"])){
$output .= '.zolo-topbar input,.zolo-header-area #lang_sel a.lang_sel_sel,.zolo-topbar a,.zolo-topbar{color:'.$writepress_data["top_bar_font_color"]["regular"].'}';
$output .= '.zolo-topbar .cart-control:before,.zolo-topbar .cart-control:after,.zolo-topbar .nav_search-icon:after{border-color:'.$writepress_data["top_bar_font_color"]["regular"].'}';
$output .= '.zolo-topbar .nav_search-icon.search_close_icon:after,.zolo-topbar .nav_search-icon:before{background:'.$writepress_data["top_bar_font_color"]["regular"].'}';
$output .= '.zolo-topbar a:hover,.zolo-topbar .current-menu-item a{color:'.$writepress_data["top_bar_font_color"]["hover"].';}';
}
if(isset($writepress_data["header_top_menu_sub_sep_color"])){
$output .= '.zolo-top-menu ul.sub-menu li a{ border-bottom: 1px solid '.$writepress_data["header_top_menu_sub_sep_color"].';}';
}

if(isset($writepress_data["topbar_font_size"])){
$output .= '.zolo-topbar{font-size:'.$writepress_data["topbar_font_size"].'px;}';
}

if(isset($writepress_data["header_social_links_icon_color"])){
$output .= '.zolo-header-area .zolo-social ul.social-icon li a{color:'.$writepress_data["header_social_links_icon_color"]["regular"].';}';
$output .= '.zolo-header-area .zolo-social ul.social-icon li a:hover{color:'.$writepress_data["header_social_links_icon_color"]["hover"].';}';
}
if(isset($writepress_data["header_social_icon_width"])){
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{width:'.$writepress_data["header_social_icon_width"].'px;}';
}
if(isset($writepress_data["header_social_links_box_color"])){
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{background:'.$writepress_data["header_social_links_box_color"].';}';
}
if(isset($writepress_data["header_social_box_border_color"])){
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{border:1px solid '.$writepress_data["header_social_box_border_color"].';}';
}
if(isset($writepress_data["header_social_links_boxed_radius"])){
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{-moz-border-radius:'.$writepress_data["header_social_links_boxed_radius"].'px;-webkit-border-radius:'.$writepress_data["header_social_links_boxed_radius"].'px;-ms-border-radius:'.$writepress_data["header_social_links_boxed_radius"].'px;-o-border-radius:'.$writepress_data["header_social_links_boxed_radius"].'px;border-radius:'.$writepress_data["header_social_links_boxed_radius"].'px; }';
}
if(isset($writepress_data["header_social_boxed_padding"])){
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{padding-top:'.$writepress_data["header_social_boxed_padding"]["padding-top"].';padding-bottom:'.$writepress_data["header_social_boxed_padding"]["padding-bottom"].';}';
}
if(isset($writepress_data["header_social_font_size"])){
$output .= '.zolo-header-area .zolo-social li a,.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{font-size:'.$writepress_data["header_social_font_size"].'px;line-height:'.$writepress_data["header_social_font_size"].'px;}';
}
if(isset($writepress_data["header_social_boxed_margin"])){
$output .= '.zolo-header-area .header_element .zolo-social li{padding-left:'.$writepress_data["header_social_boxed_margin"]["padding-left"].';padding-right:'.$writepress_data["header_social_boxed_margin"]["padding-right"].';}';
}
if(isset($writepress_data["header_social_boxed_margin"])){
$output .= '.header_element ul.social-icon{margin-left:-'.$writepress_data["header_social_boxed_margin"]["padding-left"].';margin-right:-'.$writepress_data["header_social_boxed_margin"]["padding-right"].';}';
}

if(isset($writepress_data["topmenu_dropwdown_width"])){
$output .= '.zolo-top-menu ul.sub-menu{width:'.$writepress_data['topmenu_dropwdown_width']['width'].';}';
$output .= '.zolo-top-menu .top-menu li ul.sub-menu li ul.sub-menu{left:'.$writepress_data["topmenu_dropwdown_width"]["width"].';}';
}
if(isset($writepress_data["top_bar_lh"])){
$output .= '.zolo-top-menu ul.top-menu > li > a{line-height:'.$writepress_data["top_bar_lh"]["height"].';}';
}
if(isset($writepress_data["header_top_sub_bg_color"])){
$output .= '.zolo-top-menu ul.sub-menu{background:'.$writepress_data["header_top_sub_bg_color"]["regular"].';}';
$output .= '.zolo-top-menu li ul.sub-menu li a:hover{background:'.$writepress_data["header_top_sub_bg_color"]["hover"].';}';
}
if(isset($writepress_data["header_top_menu_sub_color"])){
$output .= '.zolo-top-menu li ul.sub-menu li a{color:'.$writepress_data["header_top_menu_sub_color"]["regular"].';}';
$output .= '.zolo-top-menu li ul.sub-menu li a:hover{color:'.$writepress_data["header_top_menu_sub_color"]["hover"].';}';
}

if(isset($writepress_data["fullscreen_expanded_search_bg"])){ 
$output .= '.search_overlay,.header_element .zolo_navbar_search.expanded_search_but .nav_search_form_area{background:'.$writepress_data["fullscreen_expanded_search_bg"].'!important; }';
}

if(isset($writepress_data["fullscreen_expanded_search_font_color"])){
$output .= '.full_screen_search input,.full_screen_search .search-form::after{ color:'.$writepress_data["fullscreen_expanded_search_font_color"].'!important; }';
$output .= '.search_overlay #mob_search_close_but:after, .search_overlay .search_close_but:after,
.search_overlay #mob_search_close_but:before, .search_overlay .search_close_but:before{ border-color:'.$writepress_data["fullscreen_expanded_search_font_color"].'!important; }';

$output .= '.full_screen_search input{border-color:'.$writepress_data["fullscreen_expanded_search_font_color"].'!important;}';
$output .= '.full_screen_search input::-webkit-input-placeholder{color:'.$writepress_data["fullscreen_expanded_search_font_color"].';}';
$output .= '.full_screen_search input::-moz-placeholder{color:'.$writepress_data["fullscreen_expanded_search_font_color"].';}';
$output .= '.full_screen_search input::-ms-input-placeholder{color:'.$writepress_data["fullscreen_expanded_search_font_color"].';}';
$output .= '.full_screen_search input:-o-placeholder{color:'.$writepress_data["fullscreen_expanded_search_font_color"].';}';
}

// Top Area CSS End 

// Header Area CSS Start
$top_bar_l_height = isset($writepress_data["top_bar_lh"]["height"]) ? $writepress_data["top_bar_lh"]["height"] : '40px';
$section_2_height = isset($writepress_data["section_2_height"]["height"]) ? $writepress_data["section_2_height"]["height"] : '94px';
$section_3_height = isset($writepress_data["section_3_height"]["height"]) ? $writepress_data["section_3_height"]["height"] : '54px';

$output .= '.header_section_one{min-height:'.$top_bar_l_height.';}';

$output .= '.header_section_two .zolo-navigation ul li.zolo-middle-logo-menu-logo,.header_section_two{min-height:'.$section_2_height.';}';
$output .= '.header_section_three .zolo-navigation ul li.zolo-middle-logo-menu-logo,.header_section_three{min-height:'.$section_3_height.';}';

$output .= '.header_section_one li.shopping_cart{line-height:'.$top_bar_l_height.';}';

$output .= '.header_section_two li.shopping_cart{line-height:'.$section_2_height.';}';

$output .= '.header_section_three li.shopping_cart{line-height:'.$section_3_height.';}';


$output .= '@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
.header_section_one{height:'.$top_bar_l_height.';}';
$output .= '.header_section_two .zolo-navigation ul li.zolo-middle-logo-menu-logo,.header_section_two{height:'.$section_2_height.';}';
$output .= '.header_section_three .zolo-navigation ul li.zolo-middle-logo-menu-logo,.header_section_three{height:'.$section_3_height.';}}';


//Header Img Background 
$header_bg_img = get_post_meta( $cur_id, 'zt_header_bg_img', true ); 
$header_bg_color = get_post_meta( $cur_id, 'zt_header_bg_color', true ); 

if($header_bg_img || $header_bg_color){
	
	$output .= '.headerbackground,.header_background{
		background-image:url("'.$header_bg_img.'");
		background-color:'.$header_bg_color.';
	}';
	//Header Img Background Repeat(page option)
	$header_bg_repeat = get_post_meta( $cur_id, 'zt_header_bg_repeat', true ); 
	if($header_bg_repeat != 'default' || $header_bg_repeat != ''){ 
		$output .= '.headerbackground,.header_background{background-repeat:'.$header_bg_repeat.';}';
	}
	//Header Img Background 100% (page option)
	$header_100per_bg = get_post_meta( $cur_id, 'zt_header_100per_bg', true ); 
	if($header_100per_bg == 'yes'){
	$output .='.headerbackground, .header_background {-moz-background-size:cover;-webkit-background-size:cover;-ms-background-size:cover;-o-background-size:cover;background-size:cover;}';
	}elseif($header_100per_bg == 'no'){
	$output .= '.headerbackground,.header_background{-moz-background-size:inherit;-webkit-background-size:inherit;-ms-background-size:inherit;-o-background-size:inherit;background-size:inherit;}';
	}
	
	
	}else{
		
		$header_bg_css = '';
		if(isset($writepress_data['header_background_img']['background-image']) && !empty($writepress_data['header_background_img']['background-image'])){
			$header_bg_css .= 'background-image: url('.esc_url($writepress_data['header_background_img']['background-image']).');';
			}
		if(isset($writepress_data['header_background_img']['background-color']) && !empty($writepress_data['header_background_img']['background-color'])){
			$header_bg_css .= 'background-color: '.esc_attr($writepress_data['header_background_img']['background-color']).';';
			}
		if(isset($writepress_data['header_background_img']['background-repeat']) && !empty($writepress_data['header_background_img']['background-repeat'])){
			$header_bg_css .= 'background-repeat:'.$writepress_data['header_background_img']['background-repeat'].';';
			}
		if(isset($writepress_data['header_background_img']['background-size']) && !empty($writepress_data['header_background_img']['background-size'])){
			$header_bg_css .= 'background-size:'.$writepress_data['header_background_img']['background-size'].';';
			}
		if(isset($writepress_data['header_background_img']['background-position']) && !empty($writepress_data['header_background_img']['background-position'])){
			$header_bg_css .= 'background-position:'.$writepress_data["header_background_img"]["background-position"].';';
			}
		if(isset($writepress_data['header_background_img']['background-attachment']) && !empty($writepress_data['header_background_img']['background-attachment'])){
			$header_bg_css .= 'background-attachment:'.$writepress_data["header_background_img"]["background-attachment"].';';
			}
		$output .= '.headerbackground,.header_background{'.$header_bg_css.'}';
		
		
//Header Color Background 
$header_background_img_background_color = isset($writepress_data['header_background_img']['background-color']) ? $writepress_data['header_background_img']['background-color'] : '#ffffff';
$output .= '.header_category_search_wrapper select option,.headerbackground,.header_background{background-color:'.$header_background_img_background_color.';}';
}
//Header section two Background Color
$header_bg_color = isset($writepress_data["header_bg_color"]) ? $writepress_data["header_bg_color"] : 'rgba(255,255,255,0.0)';
$vertical_header_shadow = isset($writepress_data['vertical_header_shadow']) ? $writepress_data['vertical_header_shadow'] : 'on';
$output .= 'header.zolo_header .headercontent_box{background-color:'.$header_bg_color.';}';

if(isset($writepress_data["header_border"])){
$output .= 'header.zolo_header .headercontent_box{border-style:'.$writepress_data["header_border"]["border-style"].';border-color:'.$writepress_data["header_border_color"].';border-top-width:'.$writepress_data["header_border"]["border-top"].';border-right-width:'.$writepress_data["header_border"]["border-right"].';border-bottom-width:'.$writepress_data["header_border"]["border-bottom"].';border-left-width:'.$writepress_data["header_border"]["border-left"].';}';}
if($vertical_header_shadow == 'on'){
$output .= '.zolo_vertical_header .header_category_search_wrapper select option,.zolo_vertical_header .headerbackground,.zolo_vertical_header .header_background{box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);}';
}

if(isset($writepress_data['searchbox_position'])){
$output .= '.header_element .zolo_navbar_search.default_search_but .nav_search_form_area{top:'.$writepress_data["searchbox_position"].'px;}';
}
if(isset($writepress_data['section2_font_color'])){
$output .= '.header_section_two a,.header_section_two{color:'.$writepress_data["section2_font_color"]["regular"].';}';
$output .= '.header_section_two a:hover{color:'.$writepress_data["section2_font_color"]["hover"].';}';
$output .= '.header_section_two .cart-control:before,.header_section_two .cart-control:after,.header_section_two .nav_search-icon:after{border-color:'.$writepress_data["section2_font_color"]["regular"].'}';
$output .= '.header_section_two .nav_search-icon.search_close_icon:after,.header_section_two .nav_search-icon:before{background:'.$writepress_data["section2_font_color"]["regular"].'}';

}
if(isset($writepress_data['section2_font_size'])){
$output .= '.header_section_two{font-size:'.$writepress_data["section2_font_size"].'px;}';
}
if(isset($writepress_data['section2_line_height'])){
$output .= '.zolo-header-area .header_section_two .top-tagline, .zolo-header-area .header_section_two .header_ad{line-height:'.$writepress_data["section2_line_height"].'px;}';
}


if(isset($writepress_data['section3_font_color'])){
$output .= '.header_section_three a,.header_section_three{color:'.$writepress_data["section3_font_color"]["regular"].';}';
$output .= '.header_section_three a:hover{color:'.$writepress_data["section3_font_color"]["hover"].';}';

$output .= '.header_section_three .cart-control:before,.header_section_three .cart-control:after,.header_section_three .nav_search-icon:after{border-color:'.$writepress_data["section3_font_color"]["regular"].'}';
$output .= '.header_section_three .nav_search-icon.search_close_icon:after,.header_section_three .nav_search-icon:before{background:'.$writepress_data["section3_font_color"]["regular"].'}';
}
if(isset($writepress_data['section3_font_size'])){
$output .= '.header_section_three{font-size:'.$writepress_data["section3_font_size"].'px;}';
}
if(isset($writepress_data['section3_line_height'])){
$output .= '.zolo-header-area .header_section_three .top-tagline, .zolo-header-area .header_section_three .header_ad{line-height:'.$writepress_data["section3_line_height"].'px;}';
}

if(isset($writepress_data['vertical_hd_font_color'])){
$output .= '.zolo_vertical_header a,.zolo_vertical_header{color:'.$writepress_data["vertical_hd_font_color"]["regular"].';}';
$output .= '.zolo_vertical_header a:hover{color:'.$writepress_data["vertical_hd_font_color"]["hover"].';}';
}
if(isset($writepress_data['vertical_hd_font_size'])){
$output .= '.zolo_vertical_header{font-size:'.$writepress_data["vertical_hd_font_size"].'px;}';
}
if(isset($writepress_data['vertical_hd_line_height'])){
$output .= '.zolo_vertical_header .vertical_fix_menu .top-tagline, .zolo_vertical_header .vertical_fix_menu .header_ad{line-height:'.$writepress_data["vertical_hd_line_height"].'px;}';
}

// Header Area CSS End

//Logo CSS Here Start

if(isset($writepress_data['logo_retina'])){
$output .= '@media only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 13/10), only screen and (min-resolution: 120dpi) {
header .logo{display:none !important;}
header .retina_logo{display:inline !important;}
}';
}
if(isset($writepress_data["logo_margin"])){
$output .= '.logo-box{padding:'.$writepress_data["logo_margin"]["padding-top"].' '.$writepress_data["logo_margin"]["padding-right"].' '.$writepress_data["logo_margin"]["padding-bottom"].' '.$writepress_data["logo_margin"]["padding-left"].';}';
}

if(isset($writepress_data["retina_logo_height_width"])){
$output .= '.logo-box a{width:'.$writepress_data["retina_logo_height_width"]["width"].';}';
}
if(isset($writepress_data["retina_logo_height_width"])){
$output .= '.logo-box a{max-height:'.$writepress_data["retina_logo_height_width"]["height"].';}';
$output .= '.logo-box a img{max-height:'.$writepress_data["retina_logo_height_width"]["height"].';}';
}
//Logo CSS Here End
$section1_element_separator = isset($writepress_data["section1_element_separator"]) ? $writepress_data["section1_element_separator"] : 'no_separator'; 
$section2_element_separator = isset($writepress_data["section2_element_separator"]) ? $writepress_data["section2_element_separator"] : 'no_separator'; 
$section3_element_separator = isset($writepress_data["section3_element_separator"]) ? $writepress_data["section3_element_separator"] : 'no_separator';

$section1_element_separator_color = isset($writepress_data["section1_element_separator_color"]) ? $writepress_data["section1_element_separator_color"] : '#e5e5e5';
$section2_element_separator_color = isset($writepress_data["section2_element_separator_color"]) ? $writepress_data["section2_element_separator_color"] : '#e5e5e5';
$section3_element_separator_color = isset($writepress_data["section3_element_separator_color"]) ? $writepress_data["section3_element_separator_color"] : '#e5e5e5';

$menu_separator = isset($writepress_data["menu_separator"]) ? $writepress_data["menu_separator"] : 'no_separator';
$menu_separator_color = isset($writepress_data["menu_separator_color"]) ? $writepress_data["menu_separator_color"] : '#e5e5e5';


if(isset($writepress_data["section1_element_space"])){
$section1element_space = $writepress_data["section1_element_space"] / 2;
$output .= '.header_section_one ul.header_center_col > li, .header_section_one ul.header_left_col > li, .header_section_one ul.header_right_col > li{padding:0 '.$section1element_space.'px;}';
if($section1_element_separator != 'large_separator'){
$output .= '.header_section_one .zolo-top-menu ul,.header_section_one ul.header_left_col,.header_section_one ul.header_right_col,.header_section_one ul.header_center_col{margin:0 -'.$section1element_space.'px;}';
}
}

if(isset($writepress_data["section2_element_space"])){
$section2element_space = $writepress_data["section2_element_space"] / 2;
$section2element_space2 = $writepress_data["section2_element_space"] / 2 + 60;
$output .= '.header_section_two ul.header_center_col > li, .header_section_two ul.header_left_col > li, .header_section_two ul.header_right_col > li{padding:0 '.$section2element_space.'px;}';
	if($section2_element_separator != 'large_separator'){
	$output .= '.header_section_two .zolo-navigation > ul,.header_section_two ul.header_left_col,.header_section_two ul.header_right_col,.header_section_two ul.header_center_col{margin:0 -'.$section2element_space.'px;}';
	}
$output .= '.header_section_two .zolo-navigation > ul{margin:0 -'.$section2element_space.'px;}';
$output .= '.header_section_two .vertical_menu_area.vertical_menu_open{right:'.$section2element_space.'px;}';
$output .= '.header_section_two .header_left .vertical_menu_area.vertical_menu_open{left:'.$section2element_space.'px;}';
$output .= '.header_section_two .horizontal_menu_area{padding-right:'.$section2element_space2.'px;}';
$output .= '.header_section_two .header_left .horizontal_menu_area{padding-left:'.$section2element_space2.'px;}';
}

if(isset($writepress_data["section3_element_space"])){
$section3element_space = $writepress_data["section3_element_space"] / 2;
$section3element_space2 = $writepress_data["section3_element_space"] / 2 + 60;
$output .= '.header_section_three ul.header_center_col > li, .header_section_three ul.header_left_col > li, .header_section_three ul.header_right_col > li{padding:0 '.$section3element_space.'px;}';
if($writepress_data["section3_element_separator"] != 'large_separator'){
$output .= '.header_section_three .zolo-navigation > ul,.header_section_three ul.header_left_col,.header_section_three ul.header_right_col,.header_section_three ul.header_center_col{margin:0 -'.$section3element_space.'px;}';
}
$output .= '.header_section_three .zolo-navigation > ul{margin:0 -'.$section3element_space.'px;}';
$output .= '.header_section_three .vertical_menu_area.vertical_menu_open{right:'.$section3element_space.'px;}';
$output .= '.header_section_three .header_left .vertical_menu_area.vertical_menu_open{left:'.$section3element_space.'px;}';
$output .= '.header_section_three .horizontal_menu_area{padding-right:'.$section3element_space2.'px;}';
$output .= '.header_section_three .header_left .horizontal_menu_area{padding-left:'.$section3element_space2.'px;}';
}

//Element Separator CSS Start

if($section1_element_separator){
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:first-child:before, .header_section_one ul.header_left_col > li:first-child:before, .header_section_one ul.header_right_col > li:first-child:before, .header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{background:'.$section1_element_separator_color.';}';
}
if($section1_element_separator == 'large_separator'){
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:first-child:before, .header_section_one ul.header_left_col > li:first-child:before, .header_section_one ul.header_right_col > li:first-child:before,.header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{height:'.$writepress_data["top_bar_lh"]["height"].';}';
$output .= '.zolo-top-menu ul > li:last-child:after{display:none;}';

}else if($section1_element_separator == 'small_separator'){
	
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{height:15px;}';
$output .= '.zolo-top-menu ul > li:last-child:after,
.header_section_one ul.header_center_col > li:last-child:after, .header_section_one ul.header_left_col > li:last-child:after, .header_section_one ul.header_right_col > li:last-child:after{display:none;}';

}else if($section1_element_separator == 'oblique_separator'){
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.zolo-top-menu ul > li:last-child:after,
.header_section_one ul.header_center_col > li:last-child:after, .header_section_one ul.header_left_col > li:last-child:after, .header_section_one ul.header_right_col > li:last-child:after{display:none;}';
}


if($section2_element_separator){
$output .= '.header_section_two ul.header_center_col > li:first-child:before, .header_section_two ul.header_left_col > li:first-child:before, .header_section_two ul.header_right_col > li:first-child:before, .header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{background:'.$section2_element_separator_color.';}';
}
if($section2_element_separator == 'large_separator'){
$output .= '.header_section_two ul.header_center_col > li:first-child:before, .header_section_two ul.header_left_col > li:first-child:before, .header_section_two ul.header_right_col > li:first-child:before,.header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{height:'.$writepress_data["section_2_height"]["height"].';}';

}else if($section2_element_separator == 'small_separator'){
	
$output .= '.header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{height:15px;}';
$output .= '.header_section_two ul.header_center_col > li:last-child:after, .header_section_two ul.header_left_col > li:last-child:after, .header_section_two ul.header_right_col > li:last-child:after{display:none;}';

}else if($section2_element_separator == 'oblique_separator'){
	
$output .= '.header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.header_section_two ul.header_center_col > li:last-child:after, .header_section_two ul.header_left_col > li:last-child:after, .header_section_two ul.header_right_col > li:last-child:after{display:none;}';
}

if($section3_element_separator){
$output .= '.header_section_three ul.header_center_col > li:first-child:before, .header_section_three ul.header_left_col > li:first-child:before, .header_section_three ul.header_right_col > li:first-child:before,.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{background:'.$section3_element_separator_color.';}';
}
if($section3_element_separator == 'large_separator'){
	
$output .= '.header_section_three ul.header_center_col > li:first-child:before, .header_section_three ul.header_left_col > li:first-child:before, .header_section_three ul.header_right_col > li:first-child:before,.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{height:'.$writepress_data["section_3_height"]["height"].';}';
}else if($section3_element_separator == 'small_separator'){
	
$output .= '.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{height:15px;}';
$output .= '.header_section_three ul.header_center_col > li:last-child:after, .header_section_three ul.header_left_col > li:last-child:after, .header_section_three ul.header_right_col > li:last-child:after{display:none;}';

}else if($section3_element_separator == 'oblique_separator'){
	
$output .= '.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.header_section_three ul.header_center_col > li:last-child:after, .header_section_three ul.header_left_col > li:last-child:after, .header_section_three ul.header_right_col > li:last-child:after{display:none;}';
}



if($menu_separator){
$output .= '.zolo-navigation ul > li:first-child:before,
.zolo-navigation ul > li:after{background:'.$menu_separator_color.';}';
}
if($menu_separator == 'large_separator'){

$output .= '.header_section_three .zolo-navigation ul > li:after, .header_section_three .zolo-navigation ul > li:first-child:before{height:'.$writepress_data["section_3_height"]["height"].';}';

$output .= '.header_section_two .zolo-navigation ul > li:after, .header_section_two .zolo-navigation ul > li:first-child:before{height:'.$writepress_data["section_2_height"]["height"].';}';

}else if($menu_separator == 'small_separator'){

$output .= '.zolo-navigation ul > li:after{height:15px;}';
$output .= '.zolo-navigation ul > li:last-child:after{display:none;}';

}else if($menu_separator == 'oblique_separator'){
	
$output .= '.zolo-navigation ul > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.zolo-navigation ul > li:last-child:after{display:none;}';
}
// Vertical Menu Css Start
$header_main_menu = isset($writepress_data['vertical_menu_design']) ? $writepress_data['vertical_menu_design'] : 'menu5' ;

$primary_color = isset($writepress_data['primary_color']) ? $writepress_data['primary_color'] : '#f82eb3';
$nav_highlightborder_color = !empty($writepress_data['nav_highlightborder_color']) ? $writepress_data['nav_highlightborder_color'] : $primary_color;
$menu_hover_bg_first_level = isset($writepress_data["menu_hover_bg_first_level"]) ? $writepress_data["menu_hover_bg_first_level"] : '#f7f7f7';
$nav_highlight_border = isset($writepress_data["nav_highlight_border"]) ? $writepress_data["nav_highlight_border"] : '2';

if($header_main_menu == 'menu5' || $header_main_menu == 'vertical_menu_hover_5'){ 
	$output .= '.menu_hover_style5 .zolo-navigation ul > li a:after {background:'.$menu_hover_bg_first_level.';border-right:'.$nav_highlight_border.'px solid '.$nav_highlightborder_color.';height: 100%;width: 100%;position: absolute;top: 0;left: -150%;content: "";transition: 0.4s all;-webkit-transition: 0.4s all;-moz-transition: 0.4s all;z-index: -1;
	}';
	$output .= '.menu_hover_style5 .zolo-navigation ul > .current-menu-ancestor a:after, .menu_hover_style5 .zolo-navigation ul > .current_page_item a:after, .menu_hover_style5 .zolo-navigation ul > .current-menu-item a:after, .menu_hover_style5 .zolo-navigation ul > .current-menu-parent a:after, .menu_hover_style5 .zolo-navigation ul > li:hover a:after {left: 0;}';
	$output .= '.menu_hover_style5 .zolo-navigation ul > li ul > li a:after, .menu_hover_style5 .zolo-navigation ul > li.current-menu-ancestor ul > li a:after {display: none;}';
	$output .= '.zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul > li a:after {border-right: 0;border-left:'.$nav_highlight_border.'px solid '.$nav_highlightborder_color.';left: 150%;}';	
	$output .= '.zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul > .current-menu-ancestor a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul .current_page_item a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul .current-menu-item a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul > .current-menu-parent a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul li:hover a:after {
		left: 0;
	}';
}elseif($header_main_menu == 'menu6'){ 
	$output .= '.zolo-navigation ul > li a {overflow: hidden;}';
	$output .= '.zolo-navigation ul > li a:after {background:'.$menu_hover_bg_first_level.';border-right:'.$nav_highlight_border.'px solid '.$nav_highlightborder_color.';height: 100%;width: 100%;position: absolute;top: 0;right: 100%;content: "";z-index: -1;}';
	$output .= '.zolo_right_vertical_header .zolo-navigation ul > li a:after {border-left:'.$nav_highlight_border.'px solid '.$nav_highlightborder_color.';	border-right: 0;}';
	$output .= '.zolo-navigation ul > .current-menu-ancestor a:after, .zolo-navigation ul > .current_page_item a:after, .zolo-navigation ul > .current-menu-item a:after, .zolo-navigation ul > .current-menu-parent a:after, .zolo-navigation ul > li:hover a:after {left: 0;}';
	$output .= '.zolo-navigation ul > li ul > li a:after, .zolo-navigation ul > li.current-menu-ancestor ul > li a:after {display: none;}';
	
}elseif($header_main_menu == 'menu7'){
	$output .= '.zolo_vertical_header .zolo-navigation ul.menu_hover_design7 li a {display: inline-block;}';	
	$output .= '.zolo_vertical_header .zolo-navigation ul.menu_hover_design7 li ul a {display: block;}';
	$output .= '.zolo-navigation ul .current_page_item a:after, .zolo-navigation ul .current-menu-item a:after, .zolo-navigation ul > .current-menu-parent a:after, .zolo-navigation ul li:hover a:after {height:'.$nav_highlight_border.'px;background:'.$nav_highlightborder_color.';position: absolute;bottom: 0;left: 0;content: "";width: 100%;}';
	$output .= '.zolo-navigation ul > li ul > li a:after, .zolo-navigation ul > li.current-menu-ancestor ul > li a:after {display: none;}';
} 
// Vertical Menu Css End

//Social Separator CSS Start
$header_social_separator = isset($writepress_data["header_social_separator"]) ? $writepress_data["header_social_separator"] : 'no_separator';
$header_social_separator_color = isset($writepress_data["header_social_separator_color"]) ? $writepress_data["header_social_separator_color"] : '#e5e5e5';

if($header_social_separator){
$output .= '.zolo-header-area ul .zolo-social li:first-child:before,
.zolo-header-area ul .zolo-social li:after{background:'.$header_social_separator_color.';}';
}
if($header_social_separator == 'large_separator'){

$output .= '.zolo-header-area .header_section_three ul .zolo-social li:after{height:'.$writepress_data["section_3_height"]["height"].';}';
$output .= '.zolo-header-area .header_section_two ul .zolo-social li:after{height:'.$writepress_data["section_2_height"]["height"].';}';
$output .= '.zolo-header-area .header_section_one ul .zolo-social li:after{height:'.$writepress_data["top_bar_lh"]["height"].';}';
$output .= '.zolo-header-area ul .zolo-social li:last-child:after{display:none;}';

}else if($header_social_separator == 'small_separator'){

$output .= '.zolo-header-area ul .zolo-social li:after{height:15px;}';
$output .= '.zolo-header-area ul .zolo-social li:last-child:after{display:none;}';

}else if($header_social_separator == 'oblique_separator'){
	
$output .= '.zolo-header-area ul .zolo-social li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.zolo-header-area ul .zolo-social li:last-child:after{display:none;}';
}
//Social Separator CSS End
//Element Separator CSS End

// Navigation CSS Here Start


$nav_highlightborder_color = !empty($writepress_data['nav_highlightborder_color']) ? $writepress_data['nav_highlightborder_color'] : $primary_color;

$menu_dropdown_topborder = isset($writepress_data['menu_dropdown_topborder']['border-color']) ? $writepress_data['menu_dropdown_topborder']['border-color'] : $primary_color;
$menu_dropdown_topborder_top = isset($writepress_data["menu_dropdown_topborder"]["border-top"]) ? $writepress_data["menu_dropdown_topborder"]["border-top"] : '3px';
$menu_dropdown_topborder_style = isset($writepress_data["menu_dropdown_topborder"]["border-style"]) ? $writepress_data["menu_dropdown_topborder"]["border-style"] : 'solid';
$nav_highlight_border = isset($writepress_data["nav_highlight_border"]) ? $writepress_data["nav_highlight_border"] : '2';
$vertical_menu_bg_color = isset($writepress_data["vertical_menu_bg_color"]) ? $writepress_data["vertical_menu_bg_color"] : 'rgba(0,0,0,0.8)';
$menu_hover_bg_first_level = isset($writepress_data["menu_hover_bg_first_level"]) ? $writepress_data["menu_hover_bg_first_level"] : '#f7f7f7';
$menu_first_level_color_regular = isset($writepress_data["menu_first_level_color"]["regular"]) ? $writepress_data["menu_first_level_color"]["regular"] : '#555555';
$menu_first_level_color_hover = isset($writepress_data["menu_first_level_color"]["hover"]) ? $writepress_data["menu_first_level_color"]["hover"] : '#999999';
$dropdown_menu_width = isset($writepress_data["dropdown_menu_width"]["width"]) ? $writepress_data["dropdown_menu_width"]["width"] : '160px';
$nav_item_margin_padding_top = isset($writepress_data["nav_item_margin"]['padding-top']) ? $writepress_data["nav_item_margin"]['padding-top'] : '0px';
$nav_item_margin_padding_right = isset($writepress_data["nav_item_margin"]['padding-right']) ? $writepress_data["nav_item_margin"]['padding-right'] : '0px';
$nav_item_margin_padding_bottom = isset($writepress_data["nav_item_margin"]['padding-bottom']) ? $writepress_data["nav_item_margin"]['padding-bottom'] : '0px';
$nav_item_margin_padding_left = isset($writepress_data["nav_item_margin"]['padding-left']) ? $writepress_data["nav_item_margin"]['padding-left'] : '0px';
$dropdown_item_top_bottom_padding_top = isset($writepress_data["dropdown_item_top_bottom_pad"]["padding-top"]) ? $writepress_data["dropdown_item_top_bottom_pad"]["padding-top"] : '10px';
$dropdown_item_top_bottom_padding_bottom = isset($writepress_data["dropdown_item_top_bottom_pad"]["padding-bottom"]) ? $writepress_data["dropdown_item_top_bottom_pad"]["padding-bottom"] : '10px';
$menu_sub_bg_color_regular = isset($writepress_data["menu_sub_bg_color"]["regular"]) ? $writepress_data["menu_sub_bg_color"]["regular"] : '#ffffff';
$menu_sub_bg_color_hover = isset($writepress_data["menu_sub_bg_color"]["hover"]) ? $writepress_data["menu_sub_bg_color"]["hover"] : '#f8f8f8';
$submenu_font_color_regular = isset($writepress_data["submenu_font_color"]["regular"]) ? $writepress_data["submenu_font_color"]["regular"] : '#333333'; 
$submenu_font_color_hover = isset($writepress_data["submenu_font_color"]["hover"]) ? $writepress_data["submenu_font_color"]["hover"] : '#333333'; 

$megamenu_shadow = isset($writepress_data['megamenu_shadow']) ? $writepress_data['megamenu_shadow'] : 'on';

if(!empty($writepress_data["nav_typography"])){
$output .= '.mobile-nav ul li,.zolo-navigation,.zolo-navigation ul li, .zolo-navigation ul li a{font-family:'.$writepress_data["nav_typography"]["font-family"].','.$writepress_data["nav_typography"]["font-backup"].';font-size:'.$writepress_data["nav_typography"]["font-size"].';line-height:'.$writepress_data["nav_typography"]["line-height"].';font-style:'.$writepress_data["nav_typography"]["font-style"].';font-weight:'.$writepress_data["nav_typography"]["font-weight"].';letter-spacing:'.$writepress_data["nav_typography"]["letter-spacing"].';
text-transform:'.$writepress_data["nav_typography"]["text-transform"].';}';
$output .= '.zolo-navigation ul li{text-align:'.$writepress_data["nav_typography"]["text-align"].';}';
}
if(!empty($writepress_data["nav_item_margin"])){
$output .= '.header_element .zolo-navigation > ul > li{padding:'.$writepress_data["nav_item_margin"]["padding-top"].' '.$writepress_data["nav_item_margin"]["padding-right"].' '.$writepress_data["nav_item_margin"]["padding-bottom"].' '.$writepress_data["nav_item_margin"]["padding-left"].';}';
}
if(!empty($writepress_data["nav_item_padding"])){
$output .= '.zolo-navigation ul li a{padding:'.$writepress_data["nav_item_padding"]["padding-top"].' '.$writepress_data["nav_item_padding"]["padding-right"].' '.$writepress_data["nav_item_padding"]["padding-bottom"].' '.$writepress_data["nav_item_padding"]["padding-left"].';}';
}

if(!empty($writepress_data["nav_dropdown_font_size"])){
$output .= '.zolo-navigation .zolo-megamenu-wrapper .zolo-megamenu-widgets-container ul li a,.zolo-navigation .zolo-megamenu-wrapper,.zolo-navigation ul li ul.sub-menu li a{font-size:'.$writepress_data["nav_dropdown_font_size"].'px;line-height:normal;}';
}
if(isset($writepress_data["megamenu_title_size"])){
$output .= '.zolo-navigation .zolo-megamenu-wrapper div.zolo-megamenu-title{font-size:'.$writepress_data["megamenu_title_size"].'px;}';
}
if(isset($writepress_data["navbar_bg_color"])){
$output .= '.header_element.header_section_three .zolo_navbar_search.expanded_search_but .nav_search_form_area,
.navigation-area{background:'.$writepress_data["navbar_bg_color"].';}';
}

if(isset($writepress_data["navbar_border_width"])){
$output .= '.navigation-area{border-style:'.$writepress_data["navbar_border_width"]["border-style"].';border-top-width:'.$writepress_data["navbar_border_width"]["border-top"].';border-right-width:'.$writepress_data["navbar_border_width"]["border-right"].';border-bottom-width:'.$writepress_data["navbar_border_width"]["border-bottom"].';border-left-width:'.$writepress_data["navbar_border_width"]["border-left"].';}';
}
if(isset($writepress_data["navbar_border_color"])){
$output .= '.navigation-area{border-color:'.$writepress_data["navbar_border_color"].';}';
}

if(!empty($writepress_data["ver_header_align"])){
$output .= '.zolo_vertical_header,.zolo-navigation ul li{text-align:'.$writepress_data["ver_header_align"].';}';
$output .= '.zolo_vertical_header .zolo-navigation ul li ul li{text-align:left;}';
}

// Navigation Color 

if(isset($writepress_data["menu_icon_color"])){
$output .= '.zolo-navigation ul li.navbar_cart a,.zolo-navigation ul li.navbar_cart a:hover,.zolo-navigation ul li.navbar_cart:hover a,.zolo-navigation ul li.zolo-small-menu span,.zolo-navigation ul li.zolo-search-menu span{color:'.$writepress_data["menu_icon_color"].';cursor:pointer;}';
$output .= '.nav_button_toggle .nav_bar{background:'.$writepress_data["menu_icon_color"].'!important;}';
}

$output .= '.zolo-navigation ul li a{color:'.$menu_first_level_color_regular.';}';
$output .= '.zolo-navigation ul .current-menu-ancestor a,.zolo-navigation ul .current_page_item a, .zolo-navigation ul .current-menu-item a,.zolo-navigation ul > .current-menu-parent a,.zolo-navigation ul li:hover a{color:'.$menu_first_level_color_hover.';}';

if(isset($writepress_data["vertical_header_menu_sep_color"])){
$output .= '.zolo_vertical_header .zolo-navigation ul > li{border-right:0;border-bottom:1px solid '.$writepress_data["vertical_header_menu_sep_color"].';}';
$output .= '.zolo_vertical_header .zolo-navigation ul > li ul li{border-right:0;border-bottom:0;}';
} 
// Sub Menu 
$output .= '.zolo-navigation ul li ul.sub-menu,ul.sub-menu{width:'.$dropdown_menu_width.';}';
$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li ul.sub-menu,.zolo-navigation ul li ul.sub-menu li ul.sub-menu{left:'.$dropdown_menu_width.';}';
$output .= '.zolo_right_vertical_header .zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li ul.sub-menu{right:'.$dropdown_menu_width.'; left:auto;}';


$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu,.zolo-navigation ul li ul.sub-menu,.zolo-navigation .zolo-megamenu-wrapper{margin-top:'.$nav_item_margin_padding_bottom.';}';
$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu ul.sub-menu,.zolo-navigation ul li ul.sub-menu ul.sub-menu{margin-top:0;}';

$output .= '.zolo-navigation .zolo-megamenu-wrapper a,.zolo-navigation .zolo-megamenu-wrapper li ul.sub-menu li a,.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li a,.zolo-navigation ul li ul.sub-menu li a{padding-top:'.$dropdown_item_top_bottom_padding_top.';padding-bottom:'.$dropdown_item_top_bottom_padding_bottom.';}';

$output .= '.zolo-navigation ul li ul.sub-menu li a{padding-left:20px;padding-right:20px;}';
if($megamenu_shadow == 'on'){
$output .= '.zolo-navigation ul ul.sub-menu,.zolo-megamenu-wrapper .zolo-megamenu-holder,.zolo-megamenu-wrapper .zolo-megamenu-holder,li.zolo-dropdown-menu ul.sub-menu{box-shadow:0 0 4px rgba(0, 0, 0, 0.15);}';
}

$output .= '.zolo-megamenu-wrapper .zolo-megamenu-holder,ul.sub-menu,.zolo-navigation ul li ul li a{background:'.$menu_sub_bg_color_regular.';}';
$output .= '.zolo-navigation ul li ul li a:hover, .zolo-navigation ul li ul li.current-menu-item > a{background:'.$menu_sub_bg_color_hover.';}';

$output .= '.sticky_header.fixed.header_background .zolo-navigation ul li:hover ul li a,.zolo-navigation .zolo-megamenu-wrapper,.zolo-navigation .zolo-megamenu-wrapper h3,.zolo-navigation ul .current-menu-ancestor ul .current-menu-item li a,.zolo-navigation ul .current-menu-ancestor ul li a,.zolo-navigation ul li:hover ul li a{color:'.$submenu_font_color_regular.';}';

$output .= '.sticky_header.fixed.header_background .zolo-navigation ul li:hover ul li a:hover,.zolo-navigation ul .current-menu-ancestor ul .current-menu-item li a:hover,.zolo-navigation ul .current-menu-ancestor ul .current-menu-item a,.zolo-navigation ul li:hover ul li a:hover{color:'.$submenu_font_color_hover.';}';


if(isset($writepress_data["menu_sub_sep_color"])){
$output .= '.zolo-navigation ul li ul.sub-menu li a{border-bottom:1px solid '.$writepress_data["menu_sub_sep_color"].';}';
$output .= '.zolo-navigation .zolo-megamenu-wrapper .zolo-megamenu-submenu{border-color:'.$writepress_data["menu_sub_sep_color"].'!important;}';
}
if(isset($writepress_data["fullscreen_hosizontal_menu_bg_color"])){ 
$output .= '.horizontal_menu_area,.full_screen_menu_area, .full_screen_menu_area_responsive{background:'.$writepress_data["fullscreen_hosizontal_menu_bg_color"].';}';
}
if(isset($writepress_data["fullscreen_menu_font_color"])){ 
$output .= '.full_screen_menu li a{color:'.$writepress_data["fullscreen_menu_font_color"].'!important;}';
$output .= '.full_screen_menu_area .fullscreen_menu_close_button::after, .full_screen_menu_area .fullscreen_menu_close_button::before, #full_screen_menu_close_responsive::after, #full_screen_menu_close_responsive::before{border-color:'.$writepress_data["fullscreen_menu_font_color"].'!important;}';
}

if(isset($writepress_data["menu_first_level_color"])){
$output .= '.navigation .zolo_navbar_search.expanded_search_but .nav_search_form_area input{color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input::-webkit-input-placeholder {color:color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input::-moz-placeholder {color:color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input:-ms-input-placeholder {color:color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input:-moz-placeholder{color:color:'.$menu_first_level_color_regular.';}';
}

$output .= '.zolo-navigation ul ul.sub-menu,.zolo-megamenu-wrapper .zolo-megamenu-holder{border-top: '.$menu_dropdown_topborder_top.'  '.$menu_dropdown_topborder_style.' '.$menu_dropdown_topborder.';}';
$output .= '.zolo-navigation ul ul.sub-menu ul.sub-menu{top:-'.$menu_dropdown_topborder_top.';}';
$output .= '.zolo_vertical_header .zolo-navigation ul ul.sub-menu,.zolo_vertical_header .zolo-megamenu-wrapper .zolo-megamenu-holder{border-top:0;border-left:'.$menu_dropdown_topborder_top.'  '.$menu_dropdown_topborder_style.' '.$menu_dropdown_topborder.';}';
$output .= '.zolo_right_vertical_header .zolo_vertical_header .zolo-navigation ul ul.sub-menu,.zolo_right_vertical_header .zolo_vertical_header .zolo-megamenu-wrapper .zolo-megamenu-holder{border-top:0;border-left:0;border-right: '.$menu_dropdown_topborder_top.'  '.$menu_dropdown_topborder_style.' '.$menu_dropdown_topborder.';}';
$output .= '.menu_hover_style4 .zolo-navigation ul li a:before,.menu_hover_style3 .zolo-navigation ul li a:before,.menu_hover_style1 .zolo-navigation ul li a:before{border-bottom: '.$nav_highlight_border.'px solid '.$nav_highlightborder_color.'!important;}';
$output .= '.menu_hover_style4 .zolo-navigation ul li a:after{border-top: '.$nav_highlight_border.'px solid '.$nav_highlightborder_color.'!important;}';
$output .= '.menu_hover_style2 .zolo-navigation ul li a:before{border-width: '.$nav_highlight_border.'px 0 '.$nav_highlight_border.'px 0!important;}';
$output .= '.menu_hover_style2 .zolo-navigation ul li a:after{border-width: 0 '.$nav_highlight_border.'px 0 '.$nav_highlight_border.'px!important;}';
$output .= '.menu_hover_style2 .zolo-navigation ul li a:before, .menu_hover_style2 .zolo-navigation ul li a:after{border-color:'.$nav_highlightborder_color.'!important;}';
$output .= '.vertical_menu_area .zolo-navigation li a{background:'.$vertical_menu_bg_color.';}';
$output .= '.vertical_menu_area .zolo-navigation li a:hover{background:'.$menu_hover_bg_first_level.';}';
$output .= '.zolo_header4 .vertical_menu_box .zolo-navigation .vertical_menu_area li a{color:'.$menu_first_level_color_regular.';}';
$output .= '.zolo_header4 .vertical_menu_box .zolo-navigation .vertical_menu_area li a:hover{color:'.$menu_first_level_color_hover.';}';

$main_menu_design = isset($writepress_data["main_menu_design"]) ? $writepress_data["main_menu_design"] : 'menu1';

// Main menu design start
if($main_menu_design == 'menu2'){ 

 $output .= '.zolo-navigation ul .current-menu-ancestor a,
 .zolo-navigation ul li a.current,
 .zolo-navigation ul .current_page_item a, 
 .zolo-navigation ul .current-menu-item a,
 .zolo-navigation ul .current-menu-parent a,
 .zolo-navigation ul li:hover a{background:'.$menu_hover_bg_first_level.';}';
}else if($main_menu_design == 'menu3'){
	
 $output .= '.zolo-navigation ul li a.current:after,
 .zolo-navigation ul .current_page_item a:after, 
 .zolo-navigation ul .current-menu-item a:after,
 .zolo-navigation ul > .current-menu-parent a:after,
 .zolo-navigation ul li:hover a:after{border-top:'.$nav_highlight_border.'px solid '.$nav_highlightborder_color.'; position:absolute; top:0; left:0; content:""; width:100%;}
 .zolo-navigation ul li ul li a:after{ display:none;}';
}else if($main_menu_design == 'menu4'){
	
 $output .= '.zolo-navigation ul li a.current:before,
 .zolo-navigation ul .current_page_item a:before, 
 .zolo-navigation ul .current-menu-item a:before,
 .zolo-navigation ul > .current-menu-parent a:before,
 .zolo-navigation ul li:hover a:before{ border-top:'.$nav_highlight_border.'px solid '.$nav_highlightborder_color.';position:absolute; bottom:0; left:0; content:""; width:100%;}
 .zolo-navigation ul li ul li a:before{ display:none;}';
}
// Main menu design end


// Navigation CSS Here End 

// Horizontal and Vertical Menu CSS Start 
$horizontal_menu_max_width = isset($writepress_data["horizontal_menu_max_width"]["width"]) ? $writepress_data["horizontal_menu_max_width"]["width"] : '800px';
$vertical_menu_max_width = isset($writepress_data["vertical_menu_max_width"]["width"]) ? $writepress_data["vertical_menu_max_width"]["width"] : '360px';
$vertical_menu_max_width = isset($writepress_data["vertical_menu_space_top"]) ? $writepress_data["vertical_menu_space_top"] : '53';

$output .= '.horizontal_menu_area{width:'.$horizontal_menu_max_width.';}';
$output .= '.vertical_menu_area{width:'.$vertical_menu_max_width.';}';
$output .= '.vertical_menu_area{top:'.$vertical_menu_max_width.'px;}';


// Vertical Header CSS Start 

$side_header_width = isset($writepress_data["side_header_width"]["width"]) ? $writepress_data["side_header_width"]["width"] : '280px';

$output .= '.zolo_vertical_header .vertical_fix_header_box,.zolo_vertical_header header.zolo_header{width:'.$side_header_width.';}';
$output .= '.zolo_left_vertical_header .zolo_vertical_header_topbar,.zolo_left_vertical_header .zolo_footer_area,.zolo_left_vertical_header .zolo_main_content_area{margin-left:'.$side_header_width.';}';
$output .= '.zolo_right_vertical_header .zolo_vertical_header_topbar,.zolo_right_vertical_header .zolo_footer_area,.zolo_right_vertical_header .zolo_main_content_area{margin-right:'.$side_header_width.';}';

$vertical_element_space_padding_top = isset($writepress_data["vertical_element_space"]["padding-top"]) ? $writepress_data["vertical_element_space"]["padding-top"] : '20px';
$vertical_element_space_padding_right = isset($writepress_data["vertical_element_space"]["padding-right"]) ? $writepress_data["vertical_element_space"]["padding-right"] : '40px';
$vertical_element_space_padding_bottom = isset($writepress_data["vertical_element_space"]["padding-bottom"]) ? $writepress_data["vertical_element_space"]["padding-bottom"] : '20px';
$vertical_element_space_padding_left = isset($writepress_data["vertical_element_space"]["padding-left"]) ? $writepress_data["vertical_element_space"]["padding-left"] : '40px';

if(isset($writepress_data["vertical_element_space"])){
$output .= '.zolo_vertical_header .vertical_fix_menu .header_left ul.header_left_col > li{padding:'.$vertical_element_space_padding_top.' '.$vertical_element_space_padding_right.' '.$vertical_element_space_padding_bottom.' '.$vertical_element_space_padding_left.';}';
$output .= '.vertical_header_menu .zolo-navigation ul li a,.vertical_header_menu .zolo-navigation ul.menu_hover_design7 > li{padding-left:'.$vertical_element_space_padding_left.';padding-right:'.$vertical_element_space_padding_right.';}';
$output .= '.vertical_header_menu .zolo-navigation ul.menu_hover_design7 > li > a{padding-left:0;padding-right:0;}';
}

$menu_dropdown_topborder = isset($writepress_data["menu_dropdown_topborder"]["border-top"]) ? $writepress_data["menu_dropdown_topborder"]["border-top"] : '3px';

$output .= '.zolo_vertical_header .zolo-navigation ul li.zolo-dropdown-menu ul ul{top:0; margin-left:-'.$menu_dropdown_topborder.';}';
$output .= '.zolo_right_vertical_header .zolo_vertical_header .zolo-navigation ul li.zolo-dropdown-menu ul ul{top:0; margin-right:-'.$menu_dropdown_topborder.';}';

// Vertical Header CSS End 

// Sticky Header CSS Start 
$header_sticky_bg_color = isset($writepress_data["header_sticky_bg_color"]) ? $writepress_data["header_sticky_bg_color"] : '#ffffff';
$header_sticky_effect = isset($writepress_data["header_sticky_effect"]) ? $writepress_data["header_sticky_effect"] : 'default';
$sticky_header_srink_height = isset($writepress_data["sticky_header_srink_height"]["height"]) ? $writepress_data["sticky_header_srink_height"]["height"] : '66px';
$sticky_header_nav_item_margin_padding_top = isset($writepress_data["sticky_header_nav_item_margin"]["padding-top"]) ? $writepress_data["sticky_header_nav_item_margin"]["padding-top"] : '0px';
$sticky_header_nav_item_margin_padding_right = isset($writepress_data["sticky_header_nav_item_margin"]["padding-right"]) ? $writepress_data["sticky_header_nav_item_margin"]["padding-right"] : '0px';
$sticky_header_nav_item_margin_padding_bottom = isset($writepress_data["sticky_header_nav_item_margin"]["padding-bottom"]) ? $writepress_data["sticky_header_nav_item_margin"]["padding-bottom"] : '0px';
$sticky_header_nav_item_margin_padding_left = isset($writepress_data["sticky_header_nav_item_margin"]["padding-left"]) ? $writepress_data["sticky_header_nav_item_margin"]["padding-left"] : '0px';

$sticky_header_nav_item_padding_top = isset($writepress_data["sticky_header_nav_item_padding"]["padding-top"]) ? $writepress_data["sticky_header_nav_item_padding"]["padding-top"] : '20px';
$sticky_header_nav_item_padding_right = isset($writepress_data["sticky_header_nav_item_padding"]["padding-right"]) ? $writepress_data["sticky_header_nav_item_padding"]["padding-right"] : '20px';
$sticky_header_nav_item_padding_bottom = isset($writepress_data["sticky_header_nav_item_padding"]["padding-top"]) ? $writepress_data["sticky_header_nav_item_padding"]["padding-bottom"] : '20px';
$sticky_header_nav_item_padding_left = isset($writepress_data["sticky_header_nav_item_padding"]["padding-left"]) ? $writepress_data["sticky_header_nav_item_padding"]["padding-left"] : '20px';
$section_2_height = isset($writepress_data["section_2_height"]["height"]) ? $writepress_data["section_2_height"]["height"] : '94px';
$sticky_header_font_color_regular = isset($writepress_data["sticky_header_font_color"]["regular"]) ? $writepress_data["sticky_header_font_color"]["regular"] : '#333333';
$sticky_header_font_color_hover = isset($writepress_data["sticky_header_font_color"]["hover"]) ? $writepress_data["sticky_header_font_color"]["hover"] : '#555555';

$output .= '.sticky_slide_down,.sticky_header_fixed{background:'.$header_sticky_bg_color.';}';
$output .= '.sticky_slide_down .navigation-area,.sticky_header_fixed .navigation-area{background:rgb(229, 229, 229,0.0);}';

if($header_sticky_effect == 'shrink'){
$output .= '.sticky_header_fixed.sticky-header-shrunk .header_section_two .zolo-navigation ul li.zolo-middle-logo-menu-logo,
.sticky_header_fixed.sticky-header-shrunk .header_section_two{min-height:'.$sticky_header_srink_height.';}';
$output .= '.sticky_header_fixed.sticky-header-shrunk .logo-box{padding-top:0px; padding-bottom:0px;}';
$output .= '.sticky_header_fixed.sticky-header-shrunk .logo-box img{max-width:90%;}';

$output .= '.sticky_header_fixed.sticky-header-shrunk .header_element .zolo-navigation > ul > li{padding:'.$sticky_header_nav_item_margin_padding_top.' '.$sticky_header_nav_item_margin_padding_right.' '.$sticky_header_nav_item_margin_padding_bottom.' '.$sticky_header_nav_item_margin_padding_left.';
}';
$output .= '.sticky_header_fixed.sticky-header-shrunk .header_element .zolo-navigation > ul > li > a{padding:'.$sticky_header_nav_item_padding_top.' '.$sticky_header_nav_item_padding_right.' '.$sticky_header_nav_item_padding_bottom.' '.$sticky_header_nav_item_padding_left.';}';
}else{
$output .= '.sticky_header_fixed .header_section_two{min-height:'.$section_2_height.';}';
}

if(isset($writepress_data["sticky_header_font_color"])){
$output .= '.sticky_header.sticky_header_area .zolo-navigation > ul > li > a,
.sticky_header_area .header_section_two a, .sticky_header_area .header_section_two,
.zolo-header-area .sticky_header_area .zolo-social ul.social-icon li a{color:'.$sticky_header_font_color_regular.';}';

$output .= '.sticky_header.sticky_header_area .zolo-navigation > ul > li > a:hover,
.sticky_header_area .header_section_two a:hover,
.zolo-header-area .sticky_header_area .zolo-social ul.social-icon li a:hover{color:'.$sticky_header_font_color_hover.';}';

$output .= '.sticky_header_area .header_element .nav_search-icon:after{border-color:'.$sticky_header_font_color_regular.'}';
$output .= '.sticky_header_area .header_element .nav_search-icon.search_close_icon:after,.sticky_header_area .header_element .nav_search-icon:before{background:'.$sticky_header_font_color_regular.'}';
}

// Sticky Header CSS End
$header_layout = isset($writepress_data["header_layout"]) ? $writepress_data["header_layout"] : 'v1';

if($header_layout == 'v1'){
$output .= '.zolo_preset_header1 .header_section_two .header_left{width:20%;}';
$output .= '.zolo_preset_header1 .header_section_two .header_right{width:80%;}';
}
if($header_layout == 'v2'){
$output .= '.zolo_preset_header2 .header_section_one .header_left{width:40%;}';
$output .= '.zolo_preset_header2 .header_section_one .header_right{width:60%;}';
$output .= '.zolo_preset_header2 .header_section_two .header_left{width:20%;}';
$output .= '.zolo_preset_header2 .header_section_two .header_right{width:80%;}';
}
if($header_layout == 'v3'){
$output .= '.zolo_preset_header3 .header_section_one .header_center{width:100%;}';
$output .= '.zolo_preset_header3 .header_section_two .header_center{width:40%;}';
$output .= '.zolo_preset_header3 .header_section_two .header_left{width:30%;}';
$output .= '.zolo_preset_header3 .header_section_two .header_right{width:30%;}';
}
if($header_layout == 'v4'){
$output .= '.zolo_preset_header4 .header_section_three .header_center{width:100%;}';
$output .= '.zolo_preset_header4 .header_section_two .header_center{width:40%;}';
$output .= '.zolo_preset_header4 .header_section_two .header_left{width:30%;}';
$output .= '.zolo_preset_header4 .header_section_two .header_right{width:30%;}';
}
if($header_layout == 'v5'){
$output .= '.zolo_preset_header5 .header_section_three .header_center{width:100%;}';
$output .= '.zolo_preset_header5 .header_section_two .header_center{width:100%;}';
$output .= '.zolo_preset_header5 .header_section_one .header_left{width:50%;}';
$output .= '.zolo_preset_header5 .header_section_one .header_right{width:50%;}';
}
if($header_layout == 'v6'){
$output .= '.zolo_preset_header6 .header_section_three .header_center{width:100%;}';
$output .= '.zolo_preset_header6 .header_section_two .header_left{width:30%;}';
$output .= '.zolo_preset_header6 .header_section_two .header_right{width:70%;}';
$output .= '.zolo_preset_header6 .header_section_one .header_left{width:50%;}';
$output .= '.zolo_preset_header6 .header_section_one .header_right{width:50%;}';
}
if($header_layout == 'v7'){
$output .= '.zolo_preset_header7 .header_section_two .header_left{width:50%;}';
$output .= '.zolo_preset_header7 .header_section_two .header_right{width:50%;}';
}
if($header_layout == 'v8'){
$output .= '.zolo_preset_header8 .header_section_two .header_center{width:100%;}';
}


// Header CSS Here End 
// Footer CSS Here Start
$footer_bg_image_background_color = isset($writepress_data['footer_bg_image']['background-color']) ? $writepress_data['footer_bg_image']['background-color'] : '#2b3034';
$footer_layout_style = isset($writepress_data["footer_layout_style"]) ? $writepress_data["footer_layout_style"] : 'footer_default';
$footer_area_bor_width_border_style = isset($writepress_data["footer_area_bor_width"]["border-style"]) ? $writepress_data["footer_area_bor_width"]["border-style"] : 'solid';
$footer_area_bor_width_border_color = isset($writepress_data["footer_area_bor_width"]["border-color"]) ? $writepress_data["footer_area_bor_width"]["border-color"] : '#e9eaee';
$footer_area_bor_width_border_top = isset($writepress_data["footer_area_bor_width"]["border-top"]) ? $writepress_data["footer_area_bor_width"]["border-top"] : '1px';
$footer_area_bor_width_border_right = isset($writepress_data["footer_area_bor_width"]["border-right"]) ? $writepress_data["footer_area_bor_width"]["border-right"] : '0px';
$footer_area_bor_width_border_bottom = isset($writepress_data["footer_area_bor_width"]["border-bottom"]) ? $writepress_data["footer_area_bor_width"]["border-bottom"] : '0px';
$footer_area_bor_width_border_left = isset($writepress_data["footer_area_bor_width"]["border-left"]) ? $writepress_data["footer_area_bor_width"]["border-left"] : '0px';
$footer_area_padding_top = isset($writepress_data["footer_area_padding"]["padding-top"]) ? $writepress_data["footer_area_padding"]["padding-top"] : '40px';
$footer_area_padding_right = isset($writepress_data["footer_area_padding"]["padding-right"]) ? $writepress_data["footer_area_padding"]["padding-right"] : '30px';
$footer_area_padding_bottom = isset($writepress_data["footer_area_padding"]["padding-bottom"]) ? $writepress_data["footer_area_padding"]["padding-bottom"] : '40px';
$footer_area_padding_left = isset($writepress_data["footer_area_padding"]["padding-left"]) ? $writepress_data["footer_area_padding"]["padding-left"] : '30px';
$upper_footer_area_padding_top = isset($writepress_data["upper_footer_area_padding"]["padding-top"]) ? $writepress_data["upper_footer_area_padding"]["padding-top"] : '0px';
$upper_footer_area_padding_bottom = isset($writepress_data["upper_footer_area_padding"]["padding-bottom"]) ? $writepress_data["upper_footer_area_padding"]["padding-bottom"] : '40px';
$lower_footer_area_padding_top = isset($writepress_data["lower_footer_area_padding"]["padding-top"]) ? $writepress_data["lower_footer_area_padding"]["padding-top"] : '40px';
$lower_footer_area_padding_bottom = isset($writepress_data["lower_footer_area_padding"]["padding-bottom"]) ? $writepress_data["lower_footer_area_padding"]["padding-bottom"] : '0px';
$footer_item_border_color = isset($writepress_data["footer_item_border_color"]) ? $writepress_data["footer_item_border_color"] : '#707070';
$sidebar_item_border_color = isset($writepress_data["sidebar_item_border_color"]) ? $writepress_data["sidebar_item_border_color"] : '#dadada';
$footer_widgets_title_padding_top = isset($writepress_data["footer_widgets_title_padding"]["padding-top"]) ? $writepress_data["footer_widgets_title_padding"]["padding-top"] : '10px';
$footer_widgets_title_padding_bottom = isset($writepress_data["footer_widgets_title_padding"]["padding-bottom"]) ? $writepress_data["footer_widgets_title_padding"]["padding-bottom"] : '10px';
$footer_title_seperator_bottom_padding = isset($writepress_data["footer_title_seperator_bottom_mar"]["padding-bottom"]) ? $writepress_data["footer_title_seperator_bottom_mar"]["padding-bottom"] : '10px';
$footer_widgets_title_seperator_show = isset($writepress_data["footer_widgets_title_seperator_show"]) ? $writepress_data["footer_widgets_title_seperator_show"] : 'on';
$footer_widgets_title_seperator_dimensions_height = isset($writepress_data["footer_widgets_title_seperator_dimensions"]["height"]) ? $writepress_data["footer_widgets_title_seperator_dimensions"]["height"] : '2px';
$footer_widgets_title_seperator_dimensions_width = isset($writepress_data["footer_widgets_title_seperator_dimensions"]["width"]) ? $writepress_data["footer_widgets_title_seperator_dimensions"]["width"] : '80px';
$footer_widgets_title_seperator_color = isset($writepress_data["footer_widgets_title_seperator_color"]) ? $writepress_data["footer_widgets_title_seperator_color"] : '#dddddd';

$footer_bg_css = '';
if(isset($writepress_data['footer_bg_image']['background-image']) && !empty($writepress_data['footer_bg_image']['background-image'])){
	$footer_bg_css .= 'background-image: url('.esc_url($writepress_data['footer_bg_image']['background-image']).');';
	}
if($footer_bg_image_background_color){
	$footer_bg_css .= 'background-color: '.esc_attr($footer_bg_image_background_color).'!important;';
	}
if(isset($writepress_data['footer_bg_image']['background-repeat']) && !empty($writepress_data['footer_bg_image']['background-repeat'])){
	$footer_bg_css .= 'background-repeat:'.esc_attr($writepress_data['footer_bg_image']['background-repeat']).'!important;';
	}
if(isset($writepress_data['footer_bg_image']['background-size']) && !empty($writepress_data['footer_bg_image']['background-size'])){
	$footer_bg_css .= 'background-size:'.esc_attr($writepress_data['footer_bg_image']['background-size']).'!important;';
	}
if(isset($writepress_data['footer_bg_image']['background-position']) && !empty($writepress_data['footer_bg_image']['background-position'])){
	$footer_bg_css .= 'background-position:'.esc_attr($writepress_data["footer_bg_image"]["background-position"]).';';
	}
if(isset($writepress_data['footer_bg_image']['background-attachment']) && !empty($writepress_data['footer_bg_image']['background-attachment'])){
	$footer_bg_css .= 'background-attachment:'.esc_attr($writepress_data["footer_bg_image"]["background-attachment"]).'!important;';
	}
$output .= '.footer{'.$footer_bg_css.'}';


if($footer_layout_style != 'footer_parallax' && isset($writepress_data['footer_bg_image']['background-attachment']) && !empty($writepress_data['footer_bg_image']['background-attachment'])){
$output .= '.footer{background-position:'.esc_attr($writepress_data["footer_bg_image"]["background-position"]).'!important;}';
}
if(isset($writepress_data["footer_area_bor_width"])){
$output .= '.footer{border-style:'.$footer_area_bor_width_border_style.';border-color:'.$footer_area_bor_width_border_color.';border-top-width:'.$footer_area_bor_width_border_top.';border-right-width:'.$footer_area_bor_width_border_right.';border-bottom-width:'.$footer_area_bor_width_border_bottom.';border-left-width:'.$footer_area_bor_width_border_left.';
}';
}

	
$output .= '.footer-widgets{padding-top:'.$footer_area_padding_top.'}';
$output .= '.footer-widgets{padding-bottom:'.$footer_area_padding_bottom.';}';
$output .= '.copyright,.footer-widgets{padding-right:'.$footer_area_padding_right.';}';
$output .= '.copyright,.footer-widgets{padding-left:'.$footer_area_padding_left.';}';



$output .= '.footer-layout-upper{padding-top:'.$upper_footer_area_padding_top.'}';
$output .= '.footer-layout-upper{padding-bottom:'.$upper_footer_area_padding_bottom.';}';
$output .= '.footer-layout-lower{padding-top:'.$lower_footer_area_padding_top.'}';
$output .= '.footer-layout-lower{padding-bottom:'.$lower_footer_area_padding_bottom.';}';


$output .= '.zolo_footer_area .widget .tagcloud a,.zolo_footer_area .widget li,.zolo_footer_area .widget.widget_nav_menu li a{border-color:'.$footer_item_border_color.'!important;}';
$output .= '.widget.widget_pages li a,.widget .tagcloud a,.widget li,.widget.widget_nav_menu li a{border-color:'.$sidebar_item_border_color.'!important;}';

$output .= '.footer h3.widget-title{padding-top:'.$footer_widgets_title_padding_top.';}';
$output .= '.footer h3.widget-title{padding-bottom:'.$footer_widgets_title_padding_bottom.';}';
$output .= '.footer h3.widget-title{margin-bottom:'.$footer_title_seperator_bottom_padding.';}';

if($footer_widgets_title_seperator_show == 'on'){
$output .= '.footer h3.widget-title{position: relative;}
.footer h3.widget-title:after{height:'.$footer_widgets_title_seperator_dimensions_height.'; width:'.$footer_widgets_title_seperator_dimensions_width.'; background:'.$footer_widgets_title_seperator_color.';position: absolute;bottom:0px;content: ""; left:0;}';
}
// Footer CSS Here End

// Copyright CSS Here Start
$footer_copyright_bg_color = isset($writepress_data["footer_copyright_bg_color"]) ? $writepress_data["footer_copyright_bg_color"] : '#282a2b';
$copyright_area_border_color = isset($writepress_data["copyright_area_border"]["border-color"]) ? $writepress_data["copyright_area_border"]["border-color"] : '#4b4c4d';
$copyright_area_border_style = isset($writepress_data["copyright_area_border"]["border-style"]) ? $writepress_data["copyright_area_border"]["border-style"] : 'solid';
$copyright_area_border_top = isset($writepress_data["copyright_area_border"]["border-top"]) ? $writepress_data["copyright_area_border"]["border-top"] : '1px';
$copyright_area_border_right = isset($writepress_data["copyright_area_border"]["border-right"]) ? $writepress_data["copyright_area_border"]["border-right"] : '0px';
$copyright_area_border_bottom = isset($writepress_data["copyright_area_border"]["border-bottom"]) ? $writepress_data["copyright_area_border"]["border-bottom"] : '0px';
$copyright_area_border_left = isset($writepress_data["copyright_area_border"]["border-left"]) ? $writepress_data["copyright_area_border"]["border-left"] : '0px';
$copyright_padding_top = isset($writepress_data["copyright_padding"]["padding-top"]) ? $writepress_data["copyright_padding"]["padding-top"] : '18px';
$copyright_padding_bottom = isset($writepress_data["copyright_padding"]["padding-bottom"]) ? $writepress_data["copyright_padding"]["padding-bottom"] : '18px';

$output .= '.copyright{background:'.$footer_copyright_bg_color.';}';
$output .= '.copyright{border-style:'.$copyright_area_border_style.';border-color:'.$copyright_area_border_color.';border-top-width:'.$copyright_area_border_top.';border-right-width:'.$copyright_area_border_right.';border-bottom-width:'.$copyright_area_border_bottom.';border-left-width:'.$copyright_area_border_left.';}';
$output .= '.copyright{padding-top:'.$copyright_padding_top.'}';
$output .= '.copyright{padding-bottom:'.$copyright_padding_bottom.';}';

// Footer Social CSS Here Start

$footer_social_links_icon_color_regular = isset($writepress_data["footer_social_links_icon_color"]["regular"]) ? $writepress_data["footer_social_links_icon_color"]["regular"] : '#e7e7e7';
$footer_social_links_icon_color_hover = isset($writepress_data["footer_social_links_icon_color"]["hover"]) ? $writepress_data["footer_social_links_icon_color"]["hover"] : '#c5c5c5';
$footer_social_links_box_color = isset($writepress_data["footer_social_links_box_color"]) ? $writepress_data["footer_social_links_box_color"] : 'rgba(34,34,34,0)';
$footer_social_box_border_color = isset($writepress_data["footer_social_box_border_color"]) ? $writepress_data["footer_social_box_border_color"] : '#e7e7e7';
$footer_social_links_boxed_radius = isset($writepress_data["footer_social_links_boxed_radius"]) ? $writepress_data["footer_social_links_boxed_radius"] : '';
$footer_social_icon_width = isset($writepress_data["footer_social_icon_width"]["width"]) ? $writepress_data["footer_social_icon_width"]["width"] : '34px';
$footer_social_boxed_padding_top = isset($writepress_data["footer_social_boxed_padding"]["padding-top"]) ? $writepress_data["footer_social_boxed_padding"]["padding-top"] : '8px';
$footer_social_boxed_padding_bottom = isset($writepress_data["footer_social_boxed_padding"]["padding-bottom"]) ? $writepress_data["footer_social_boxed_padding"]["padding-bottom"] : '8px';
$footer_social_font_size = isset($writepress_data["footer_social_font_size"]) ? $writepress_data["footer_social_font_size"] : '14';
$footer_social_boxed_margin_padding_left = isset($writepress_data["footer_social_boxed_margin"]["padding-left"]) ? $writepress_data["footer_social_boxed_margin"]["padding-left"] : '12px';
$footer_social_boxed_margin_padding_right = isset($writepress_data["footer_social_boxed_margin"]["padding-right"]) ? $writepress_data["footer_social_boxed_margin"]["padding-right"] : '12px';

$output .= '.copyright_social .zolo-social ul.social-icon li a{color:'.$footer_social_links_icon_color_regular.';}';
$output .= '.copyright_social .zolo-social ul.social-icon li a:hover{color:'.$footer_social_links_icon_color_hover.';}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{background:'.$footer_social_links_box_color.';}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{border:1px solid '.$footer_social_box_border_color.';}';

$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{-moz-border-radius:'.$footer_social_links_boxed_radius.'px;-webkit-border-radius:'.$footer_social_links_boxed_radius.'px;-ms-border-radius:'.$footer_social_links_boxed_radius.'px;-o-border-radius:'.$footer_social_links_boxed_radius.'px;border-radius:'.$footer_social_links_boxed_radius.'px;}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{min-width:'.$footer_social_icon_width.';}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{padding-top:'.$footer_social_boxed_padding_top.';padding-bottom:'.$footer_social_boxed_padding_bottom.';}';
$output .= '.copyright_social .zolo-social li a,
.copyright_social .zolo-social.boxed-icons ul.social-icon li a{font-size:'.$footer_social_font_size.'px;line-height:'.$footer_social_font_size.'px;}';

$output .= '.copyright_social .zolo-social li{padding-left:'.$footer_social_boxed_margin_padding_left.';}';
$output .= '.copyright_social .zolo-social li{padding-right:'.$footer_social_boxed_margin_padding_right.';}';

// Copyright CSS Here End

// Page Area CSS Start 
$page_padding_top = isset($writepress_data["page_padding"]['padding-top']) ? $writepress_data["page_padding"]['padding-top'] : '60px';
$page_padding_bottom = isset($writepress_data["page_padding"]['padding-bottom']) ? $writepress_data["page_padding"]['padding-bottom'] : '50px';
$hundredp_padding_left = isset($writepress_data["hundredp_padding"]['padding-left']) ? $writepress_data["hundredp_padding"]['padding-left'] : '30px';
$hundredp_padding_right = isset($writepress_data["hundredp_padding"]['padding-right']) ? $writepress_data["hundredp_padding"]['padding-right'] : '30px';
$header_width_100per_padding_left = isset($writepress_data["header_width_100per_padding"]['padding-left']) ? $writepress_data["header_width_100per_padding"]['padding-left'] : '0px';
$header_width_100per_padding_right = isset($writepress_data["header_width_100per_padding"]['padding-right']) ? $writepress_data["header_width_100per_padding"]['padding-right'] : '0px';
$header_100_width = isset($writepress_data["header_100_width"]) ? $writepress_data["header_100_width"] : 'off';

if( is_home() || is_page() || is_singular( array( 'post') ) ) {
$content_top_pad = get_post_meta( $cur_id, 'zt_content_top_pad', true ); 
if($content_top_pad){
	$output .= '.container-padding{padding-top:'.$content_top_pad.';}';
}else{	
	$output .= '.container-padding{padding-top:'.$page_padding_top.';}';	
}
}else{
	$output .= '.container-padding{padding-top:'.$page_padding_bottom.';}';
}

if( is_home() || is_page() || is_singular( array( 'post') ) ) {
$content_bottom_pad = get_post_meta( $cur_id, 'zt_content_bottom_pad', true ); 
if($content_bottom_pad){
	$output .= '.container-padding{padding-bottom:'.$content_bottom_pad.';}';
}else{
	$output .= '.container-padding{padding-bottom:'.$page_padding_bottom.';}';
	}
}else{
$output .= '.container-padding{padding-bottom:'.$page_padding_bottom.';}';
}

if( is_home() || is_page() || is_singular( array( 'post') ) ) {
$content_left_right_pad = get_post_meta( $cur_id, 'zt_content_left_right_pad', true ); 
	if($content_left_right_pad){	
		$output .= '.container-padding{padding-left:'.$content_left_right_pad.';padding-right:'.$content_left_right_pad.';}';
	}else{
		$output .= '.container-padding{padding-left:'.$hundredp_padding_left.';padding-right:'.$hundredp_padding_right.';}';
		}
}else{
		$output .= '.container-padding{padding-left:'.$hundredp_padding_left.';padding-right:'.$hundredp_padding_right.';}';
}
$output .= '.zolo-topbar,.headercontent_box,.navigation-area{padding-left:'.$hundredp_padding_left.';padding-right:'.$hundredp_padding_right.';}';



if( is_home() || is_page() || is_singular( array( 'post') ) ) {		
	$page_header_100_width = get_post_meta( $cur_id, 'zt_header_100_width', true ); 
	$page_header_width_100per_padding = get_post_meta( $cur_id, 'zt_header_width_100per_padding', true );
	
	if($page_header_100_width == 'yes'){		
		$output .= '.zolo-topbar .zolo-container,.headercontent_box .zolo-container,.navigation-area .zolo-container{padding-left:'.$page_header_width_100per_padding.';padding-right:'.$page_header_width_100per_padding.';}';	
	}else if($page_header_100_width == 'no'){
		$output .= '';
		}else{
			if($header_100_width == 'on'){
				$output .= '.zolo-topbar .zolo-container,.headercontent_box .zolo-container,.navigation-area .zolo-container{padding-left:'.$header_width_100per_padding_left.';padding-right:'.$header_width_100per_padding_right.';}';
			}	
		}
}else{
	if($header_100_width == 'on'){
		$output .= '.zolo-topbar .zolo-container,.headercontent_box .zolo-container,.navigation-area .zolo-container{padding-left:'.$header_width_100per_padding_left.';padding-right:'.$header_width_100per_padding_right.';}';
	}
}



//Page sidebar Area CSS Start
$content_width_2 = isset($writepress_data["content_width_2"]['width']) ? $writepress_data["content_width_2"]['width'] : '58%';;
$sidebar_2_1_width = isset($writepress_data["sidebar_2_1_width"]['width']) ? $writepress_data["sidebar_2_1_width"]['width'] : '21%';
$sidebar_2_2_width = isset($writepress_data["sidebar_2_2_width"]['width']) ? $writepress_data["sidebar_2_2_width"]['width'] : '21%';
$content_width = isset($writepress_data["content_width"]["width"]) ? $writepress_data["content_width"]["width"] : '77%';
$sidebar_width = isset($writepress_data["sidebar_width"]["width"]) ? $writepress_data["sidebar_width"]["width"] : '23%';
$sidebar_widgets_title_padding_top = isset($writepress_data["sidebar_widgets_title_padding"]["padding-top"]) ? $writepress_data["sidebar_widgets_title_padding"]["padding-top"] : '10px';
$sidebar_widgets_title_padding_bottom = isset($writepress_data["sidebar_widgets_title_padding"]["padding-bottom"]) ? $writepress_data["sidebar_widgets_title_padding"]["padding-bottom"] : '10px';
$sidebar_title_seperator_bottom_mar = isset($writepress_data["sidebar_title_seperator_bottom_mar"]["padding-bottom"]) ? $writepress_data["sidebar_title_seperator_bottom_mar"]["padding-bottom"] : '10px';
$sidebar_link_color_regular = isset($writepress_data['sidebar_link_color']["regular"]) ? $writepress_data['sidebar_link_color']["regular"] : '#888888';
$sidebar_link_color_hover = isset($writepress_data['sidebar_link_color']["hover"]) ? $writepress_data['sidebar_link_color']["hover"] : '#333333';
$sidebar_widgets_title_design = isset($writepress_data["sidebar_widgets_title_design"]) ? $writepress_data["sidebar_widgets_title_design"] : 'none';
$sidebar_widgets_title_seperator_height = isset($writepress_data["sidebar_widgets_title_seperator_height"]) ? $writepress_data["sidebar_widgets_title_seperator_height"] : '2px';
$sidebar_widgets_title_seperator_width = isset($writepress_data["sidebar_widgets_title_seperator_width"]) ? $writepress_data["sidebar_widgets_title_seperator_width"] : '80px';
$sidebar_widget_title_bg_color = isset($writepress_data["sidebar_widget_title_bg_color"]) ? $writepress_data["sidebar_widget_title_bg_color"] : '#e4e4e4';
$sidebar_widget_title_border_color = isset($writepress_data["sidebar_widget_title_border_color"]) ? $writepress_data["sidebar_widget_title_border_color"] : '#e4e4e4';
$sidebar_widgets_title_separator_img_url = isset($writepress_data["sidebar_widgets_title_separator_img"]["url"]) ? $writepress_data["sidebar_widgets_title_separator_img"]["url"] : '';
$sidebar_widge_bg_color = isset($writepress_data["sidebar_widge_bg_color"]) ? $writepress_data["sidebar_widge_bg_color"] : '#f8f8f8';
$sidebar_widget_border_color = isset($writepress_data["sidebar_widget_border_color"]) ? $writepress_data["sidebar_widget_border_color"] : '#f4f4f4';
$sidebar_widgets_title_align = isset($writepress_data["sidebar_widgets_title_align"]) ? $writepress_data["sidebar_widgets_title_align"] : 'left';
$sidebar_widgets_style = isset($writepress_data["sidebar_widgets_style"]) ? $writepress_data["sidebar_widgets_style"] : 'none';

$output .= '.hassidebar.double_sidebars .content-area{width: calc('.$content_width_2.');padding:0 50px;	float:left;	margin-left:calc('.$sidebar_2_1_width.');}';
$output .= '.hassidebar.double_sidebars .sidebar_container_1{width:'.$sidebar_2_1_width.';margin-left:calc(1px - ('.$sidebar_2_1_width.' + '.$content_width_2.'));float:left;}';
$output .= '.hassidebar.double_sidebars .sidebar_container_2{width:'.$sidebar_2_2_width.';float:left;}';
$output .= '.hassidebar .content-area{width:'.$content_width.';}';
$output .= '.hassidebar .sidebar_container_1{width:'.$sidebar_width.';}';
$output .= '.hassidebar .sidebar_container_2{width:'.$sidebar_width.';} ';
$output .= '.sidebar .widget h3.widget-title span{padding-top:'.$sidebar_widgets_title_padding_top.';}';
$output .= '.sidebar .widget h3.widget-title span{padding-bottom:'.$sidebar_widgets_title_padding_bottom.';}';
$output .= '.sidebar .widget h3.widget-title{margin-bottom:'.$sidebar_title_seperator_bottom_mar.';}';


$output .= '.sidebar a{color:'.$sidebar_link_color_regular.';}';
$output .= '.sidebar a:hover{color:'.$sidebar_link_color_hover.';}';
//sidebar_widgets_title_design
if($sidebar_widgets_title_design == 'bottomborder'){
	
$output .= '.sidebar .widget h3.widget-title{position: relative;}';
$output .= '.sidebar .widget h3.widget-title:after{ height:'.$sidebar_widgets_title_seperator_height.'px; width:'.$sidebar_widgets_title_seperator_width.';background:'.$writepress_data["sidebar_widgets_title_seperator_color"].';position: absolute;bottom:0px;content: ""; left:0;}';

}elseif($sidebar_widgets_title_design == 'box' || $sidebar_widgets_title_design == 'boxfullwidth'){
	
$output .= '.sidebar .widget h3.widget-title span{padding-left:15px;padding-right:15px; min-width:100px;background:'.$sidebar_widget_title_bg_color.';border: 1px solid '.$sidebar_widget_title_border_color.';}';

}elseif($sidebar_widgets_title_design == 'image'){
	
$output .= '.sidebar .widget h3.widget-title{position: relative;}';
$output .= '.sidebar .widget h3.widget-title:after{ height:'.$sidebar_widgets_title_seperator_height.'px; width:100%; background-image:url("'.$sidebar_widgets_title_separator_img_url.'");position: absolute;bottom:0px;content: ""; left:0;background-repeat: no-repeat;background-position:center center;}';

}

if($sidebar_widgets_title_design == 'box'){
	$output .= '.sidebar .widget h3.widget-title span{text-align: center;}';
}
if($sidebar_widgets_title_design == 'boxfullwidth'){
	$output .= '.sidebar .widget h3.widget-title span{ width:100%;}';
}
if($sidebar_widgets_title_align == 'left'){
$output .= '.sidebar .widget h3.widget-title{text-align: left;}';
}elseif($sidebar_widgets_title_align == 'center'){
$output .= '.sidebar .widget h3.widget-title{text-align: center;}';
$output .= '.sidebar .widget h3.widget-title:after{left:50%;-moz-transform: translate(-50%, 0px);-webkit-transform: translate(-50%, 0px);-ms-transform: translate(-50%, 0px);-o-transform: translate(-50%, 0px);transform: translate(-50%, 0px);}';
}elseif($sidebar_widgets_title_align == 'right'){
$output .= '.sidebar .widget h3.widget-title:after{right:0; left:auto;}';
$output .= '.sidebar .widget h3.widget-title{text-align: right;}';
}
if($sidebar_widgets_style == 'box'){
$output .= '.sidebar_widget_style_box .sidebar .widget{background:'.$sidebar_widge_bg_color.';border: 1px solid '.$sidebar_widget_border_color.';}';
}
//Page sidebar Area CSS End
// Page Area CSS End //
// Page Title Bar Area CSS Start //

$page_title_height = isset($writepress_data["page_title_height"]["height"]) ? $writepress_data["page_title_height"]["height"] : '100px';
$page_title_bar_overlay_color = isset($writepress_data["page_title_bar_overlay_color"]) ? $writepress_data["page_title_bar_overlay_color"] : 'rgba(0,0,0,0.15)';


$titlebar_height = get_post_meta( $cur_id, 'zt_titlebar_height', true ); 
if($titlebar_height){
$output .= '.pagetitle_parallax{height:'.$titlebar_height.'px;}';
}else{	 
	$output .= '.pagetitle_parallax{height:'.$page_title_height.';}';
}    
if($page_title_bar_overlay_color){
	$output .= '.pagetitle_parallax:after{background:'.$page_title_bar_overlay_color.'!important;}';
} 

//Page Title background
$pagetitle_bg_css = '';
if(isset($writepress_data['page_title_bg']['background-repeat']) && !empty($writepress_data['page_title_bg']['background-repeat'])){
	$pagetitle_bg_css .= 'background-repeat:'.$writepress_data['page_title_bg']['background-repeat'].'!important;';
	}
if(isset($writepress_data['page_title_bg']['background-position']) && !empty($writepress_data['page_title_bg']['background-position'])){
	$pagetitle_bg_css .= 'background-position:'.$writepress_data["page_title_bg"]["background-position"].'!important;';
	}
if(isset($writepress_data['page_title_bg']['background-attachment']) && !empty($writepress_data['page_title_bg']['background-attachment'])){
	$pagetitle_bg_css .= 'background-attachment:'.$writepress_data["page_title_bg"]["background-attachment"].'!important;';
	}
$output .= '.pagetitle_parallax_1{'.$pagetitle_bg_css.'}';


//Page Title background Size
$titlebar_bg_img_100per = get_post_meta( $cur_id, 'zt_titlebar_bg_img_100per', true ); 
if($titlebar_bg_img_100per == 'No'){
$output .= '.pagetitle_parallax{-moz-background-size:inherit!important;-webkit-background-size:inherit!important;-ms-background-size:inherit!important;-o-background-size:inherit!important;background-size:inherit!important;}';
}else if($titlebar_bg_img_100per == 'Yes'){
$output .= '.pagetitle_parallax{-moz-background-size:cover!important;-webkit-background-size:cover!important;-ms-background-size:cover!important;-o-background-size:cover!important;background-size:cover!important;}';
}else{

if(isset($writepress_data['page_title_bg']['background-size']) && !empty($writepress_data['page_title_bg']['background-size'])){
		$output .= '.pagetitle_parallax{-moz-background-size:'.$writepress_data["page_title_bg"]["background-size"].'!important; -webkit-background-size:'.$writepress_data["page_title_bg"]["background-size"].'!important ;-ms-background-size:'.$writepress_data["page_title_bg"]["background-size"].'!important; -o-background-size:'.$writepress_data["page_title_bg"]["background-size"].'!important; background-size:'.$writepress_data["page_title_bg"]["background-size"].'!important;}';
	}
} 

//Page Title Font Size
$page_titlebar_typography_line_height = isset($writepress_data['page_titlebar_typography']['line-height']) ? $writepress_data['page_titlebar_typography']['line-height'] : '36px';
$page_titlebar_typography_font_size = isset($writepress_data['page_titlebar_typography']['font-size']) ? $writepress_data['page_titlebar_typography']['font-size'] : '30px';
$page_title_color = isset($writepress_data["page_title_color"]) ? $writepress_data["page_title_color"] : '#ffffff';
$page_title_padding_top = isset($writepress_data["page_title_padding"]["padding-top"]) ? $writepress_data["page_title_padding"]["padding-top"] : '30px';
$page_title_padding_right = isset($writepress_data["page_title_padding"]["padding-right"]) ? $writepress_data["page_title_padding"]["padding-right"] : '30px';
$page_title_padding_bottom = isset($writepress_data["page_title_padding"]["padding-bottom"]) ? $writepress_data["page_title_padding"]["padding-bottom"] : '30px';
$page_title_padding_left = isset($writepress_data["page_title_padding"]["padding-left"]) ? $writepress_data["page_title_padding"]["padding-left"] : '30px';
$breadcrumbs_font_size = isset($writepress_data['breadcrumbs_font_size']) ? $writepress_data['breadcrumbs_font_size'] : '13';

$title_text_size = get_post_meta( $cur_id, 'zt_title_text_size', true ); 
if($title_text_size){
$output .= '.pagetitle_parallax_content h1{font-size:'.$title_text_size.'px;line-height:'.$title_text_size.'px;}';
}else{
	 if($page_titlebar_typography_line_height || $page_titlebar_typography_font_size){
	$output .= '.pagetitle_parallax_content h1{font-size:'.$page_titlebar_typography_font_size.';line-height:'.$page_titlebar_typography_line_height.';}';
} 	} 	
//Page Title Font Color
$title_text_color = get_post_meta( $cur_id, 'zt_title_text_color', true ); 
if($title_text_color == '#' || $title_text_color == ''){
	if($page_title_color){
    $output .= '#crumbs, #crumbs a,	.pagetitle_parallax_content h1{color:'.$page_title_color.';}';
	} 
}else if($title_text_color){
$output .= '#crumbs, #crumbs a, .pagetitle_parallax_content h1{color:'.$title_text_color.';}';
}
$output .= '.pagetitle_parallax_content{padding:'.$page_title_padding_top.' '.$page_title_padding_right.' '.$page_title_padding_bottom.' '.$page_title_padding_left.';}';

$output .= '#crumbs,#crumbs a{font-size:'.$breadcrumbs_font_size.'px;}';
// Page Title Bar Area CSS End  


//Boxed Layout Body Background
$bg_img = get_post_meta( $cur_id, 'zt_bg_img', true );
$bg_color = get_post_meta( $cur_id, 'zt_bg_color', true );
$bg_repeat = get_post_meta( $cur_id, 'zt_bg_repeat', true ); 
$bg_img_100per = get_post_meta( $cur_id, 'zt_bg_img_100per', true );
$body_bg_image_background_size = isset($writepress_data['body_bg_image']['background-size']) ? $writepress_data['body_bg_image']['background-size'] : '';
$body_bg_image_background_color = isset($writepress_data['body_bg_image']['background-color']) ? $writepress_data['body_bg_image']['background-color'] : '#ffffff';

//Boxed Layout Body Img Background Repeat

if($bg_img || $bg_color){
$output .= 'body.boxed_layout .site_layout{background-color:'.$bg_color.';}';
if($bg_img){
$output .= 'body.boxed_layout .site_layout{background-image:url("'.$bg_img.'");}';
$output .= 'body.boxed_layout .site_layout{background-repeat:'.$bg_repeat.';}';
if($bg_img_100per == 'yes'){
$output .= 'body.boxed_layout .site_layout{ background-attachment: fixed; -moz-background-size:cover;-webkit-background-size:cover;-ms-background-size:cover;-o-background-size:cover;background-size:cover;background-attachment:fixed;}';
}elseif($bg_img_100per == 'no'){
$output .= 'body.boxed_layout .site_layout{ -moz-background-size:inherit;-webkit-background-size:inherit;-ms-background-size:inherit;-o-background-size:inherit;background-size:inherit;}';
}

}

 }else{	 	
	
	if($body_bg_image_background_color && !empty($body_bg_image_background_color)){
		$output .= 'body.boxed_layout .site_layout{background-color:'.esc_attr($body_bg_image_background_color).';}';
		}		
		
	$body_bg_css = '';
	if(isset($writepress_data['body_bg_image']['background-image']) && !empty($writepress_data['body_bg_image']['background-image'])){
		$body_bg_css .= 'background-image: url('.esc_url($writepress_data['body_bg_image']['background-image']).');';
		}	
	if(isset($writepress_data['body_bg_image']['background-repeat']) && !empty($writepress_data['body_bg_image']['background-repeat'])){
		$body_bg_css .= 'background-repeat:'.$writepress_data['body_bg_image']['background-repeat'].';';
		}
	if(isset($writepress_data['body_bg_image']['background-size']) && !empty($writepress_data['body_bg_image']['background-size'])){
		$body_bg_css .= 'background-size:'.$writepress_data['body_bg_image']['background-size'].';';
		}
	if(isset($writepress_data['body_bg_image']['background-position']) && !empty($writepress_data['body_bg_image']['background-position'])){
		$body_bg_css .= 'background-position:'.$writepress_data["body_bg_image"]["background-position"].';';
		}
	if(isset($writepress_data['body_bg_image']['background-attachment']) && !empty($writepress_data['body_bg_image']['background-attachment'])){
		$body_bg_css .= 'background-attachment:'.$writepress_data["body_bg_image"]["background-attachment"].';';
		}
	$output .= 'body.boxed_layout .site_layout{'.$body_bg_css.'}';
	
}
  
//+++++++++++++++++++++++++++++++++++++---------+++++++++++++++++++++++++++++++++++++
//Wide Layout Body Background
$wide_bg_img = get_post_meta( $cur_id, 'zt_wide_bg_img', true );
$wide_bg_color = get_post_meta( $cur_id, 'zt_wide_bg_color', true );
$wide_bg_img_100per = get_post_meta( $cur_id, 'zt_wide_bg_img_100per', true ); 
$wide_bg_repeat = get_post_meta( $cur_id, 'zt_wide_bg_repeat', true ); 
$container_bg_class = '';

$layout = isset($writepress_data["layout"]) ? $writepress_data["layout"] : 'wide';

//Site Layout Style
$bg_layout = get_post_meta( $cur_id, 'zt_bg_layout', true ); 
if($bg_layout == 'wide'){        
	$container_bg_class = '.container-main';
	}elseif($bg_layout == 'boxed'){
		$container_bg_class = '.container-main';
	 }elseif($bg_layout == 'theater'){
		$container_bg_class = '.container-main';
	 }else{
if($layout=='boxed'){
	$container_bg_class = '.container-main';
}elseif($layout=='wide'){
	$container_bg_class = '.container-main';
 }elseif($layout=='theater'){
	$container_bg_class = '.container-main';
 }	
	}

if($wide_bg_img || $wide_bg_color){
$output .= $container_bg_class.'{background-color:'.$wide_bg_color.';}';
if($wide_bg_img){
$output .= $container_bg_class.'{background-image:url("'.$wide_bg_img.'");}';
$output .= $container_bg_class.'{background-repeat:'.$wide_bg_repeat.';}';
if($wide_bg_img_100per == 'yes'){
	$output .= $container_bg_class.'{-moz-background-size:cover; -webkit-background-size:cover;-ms-background-size:cover; -o-background-size:cover; background-size:cover;background-attachment:fixed;}';
}elseif($wide_bg_img_100per == 'no'){
	$output .= $container_bg_class.'{-moz-background-size:inherit;-webkit-background-size:inherit;-ms-background-size:inherit; -o-background-size:inherit; background-size:inherit;}';
}
	}
}else{
$main_content_bg_css = '';
if(isset($writepress_data['main_content_bg_image']['background-image']) && !empty($writepress_data['main_content_bg_image']['background-image'])){
	$main_content_bg_css .= 'background-image: url('.esc_url($writepress_data['main_content_bg_image']['background-image']).');';
	}
if(isset($writepress_data['main_content_bg_image']['background-color']) && !empty($writepress_data['main_content_bg_image']['background-color'])){
	$main_content_bg_css .= 'background-color: '.esc_attr($writepress_data['main_content_bg_image']['background-color']).';';
	}
if(isset($writepress_data['main_content_bg_image']['background-repeat']) && !empty($writepress_data['main_content_bg_image']['background-repeat'])){
	$main_content_bg_css .= 'background-repeat:'.$writepress_data['main_content_bg_image']['background-repeat'].';';
	}
if(isset($writepress_data['main_content_bg_image']['background-size']) && !empty($writepress_data['main_content_bg_image']['background-size'])){
	$main_content_bg_css .= 'background-size:'.$writepress_data['main_content_bg_image']['background-size'].';';
	}
if(isset($writepress_data['main_content_bg_image']['background-position']) && !empty($writepress_data['main_content_bg_image']['background-position'])){
	$main_content_bg_css .= 'background-position:'.$writepress_data["main_content_bg_image"]["background-position"].';';
	}
if(isset($writepress_data['main_content_bg_image']['background-attachment']) && !empty($writepress_data['main_content_bg_image']['background-attachment'])){
	$main_content_bg_css .= 'background-attachment:'.$writepress_data["main_content_bg_image"]["background-attachment"].';';
	}
$output .= $container_bg_class.'{'.$main_content_bg_css.'}';
}

//Wide Layout Body Img Background 

//Typography Area Start


//Font Size
$body_typography_css = '';
if(isset($writepress_data['body_typography']) && $writepress_data['body_typography'] && is_array($writepress_data['body_typography'])) {
if(isset($writepress_data['body_typography']['font-family']) && !empty($writepress_data['body_typography']['font-family'])) {
	$body_typography_css .= 'font-family: '.esc_attr($writepress_data['body_typography']['font-family']).';';
}
if(isset($writepress_data['body_typography']['font-size']) && !empty($writepress_data['body_typography']['font-size'])) {
	$body_typography_css .= 'font-size: '.esc_attr($writepress_data['body_typography']['font-size']).';';
}
if(isset($writepress_data['body_typography']['line-height']) && !empty($writepress_data['body_typography']['line-height'])) {
	$body_typography_css .= 'line-height: '.esc_attr($writepress_data['body_typography']['line-height']).';';
}
if(isset($writepress_data['body_typography']['font-style']) && !empty($writepress_data['body_typography']['font-style'])) {
	$body_typography_css .= 'font-style: '.esc_attr($writepress_data['body_typography']['font-style']).';';
}
if(isset($writepress_data['body_typography']['font-weight']) && !empty($writepress_data['body_typography']['font-weight'])) {
	$body_typography_css .= 'font-weight: '.esc_attr($writepress_data['body_typography']['font-weight']).';';
}
if(isset($writepress_data['body_typography']['letter-spacing']) && !empty($writepress_data['body_typography']['letter-spacing'])) {
	$body_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['body_typography']['letter-spacing']).';';
}
if(isset($writepress_data['body_typography']['text-align']) && !empty($writepress_data['body_typography']['text-align'])) {
	$body_typography_css .= 'text-align: '.esc_attr($writepress_data['body_typography']['text-align']).';';
}
if(isset($writepress_data['body_typography']['text-transform']) && !empty($writepress_data['body_typography']['text-transform'])) {
	$body_typography_css .= 'text-transform: '.esc_attr($writepress_data['body_typography']['text-transform']).';';
}
if(isset($writepress_data['body_typography']['color']) && !empty($writepress_data['body_typography']['color'])) {
	$body_typography_css .= 'color: '.esc_attr($writepress_data['body_typography']['color']).';';
}
$output .= 'body,input,select,textarea{'.$body_typography_css.'}';
}


$header_h1_typography_css = '';

$header_h1_typography_font_size = isset($writepress_data['header_h1_typography']['font-size']) ? $writepress_data['header_h1_typography']['font-size'] : '30px';
$header_h1_typography_line_height = isset($writepress_data['header_h1_typography']['line-height']) ? $writepress_data['header_h1_typography']['line-height'] : '40px';


if(isset($writepress_data['header_h1_typography']['font-family']) && !empty($writepress_data['header_h1_typography']['font-family'])) {
	$header_h1_typography_css .= 'font-family: '.esc_attr($writepress_data['header_h1_typography']['font-family']).';';
}
if($header_h1_typography_font_size){
	$header_h1_typography_css .= 'font-size: '.esc_attr($header_h1_typography_font_size).';';
}
if($header_h1_typography_line_height) {
	$header_h1_typography_css .= 'line-height: '.esc_attr($header_h1_typography_line_height).';';
}
if(isset($writepress_data['header_h1_typography']['font-style']) && !empty($writepress_data['header_h1_typography']['font-style'])) {
	$header_h1_typography_css .= 'font-style: '.esc_attr($writepress_data['header_h1_typography']['font-style']).';';
}
if(isset($writepress_data['header_h1_typography']['font-weight']) && !empty($writepress_data['header_h1_typography']['font-weight'])) {
	$header_h1_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_h1_typography']['font-weight']).';';
}
if(isset($writepress_data['header_h1_typography']['letter-spacing']) && !empty($writepress_data['header_h1_typography']['letter-spacing'])) {
	$header_h1_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_h1_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_h1_typography']['text-transform']) && !empty($writepress_data['header_h1_typography']['text-transform'])) {
	$header_h1_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_h1_typography']['text-transform']).';';
}
if(isset($writepress_data['header_h1_typography']['color']) && !empty($writepress_data['header_h1_typography']['color'])) {
	$header_h1_typography_css .= 'color: '.esc_attr($writepress_data['header_h1_typography']['color']).';';
}
$output .= 'h1{'.$header_h1_typography_css.'}';


$header_h2_typography_css = '';
$header_h2_typography_font_size = isset($writepress_data['header_h2_typography']['font-size']) ? $writepress_data['header_h1_typography']['font-size'] : '26px';
$header_h2_typography_line_height = isset($writepress_data['header_h2_typography']['line-height']) ? $writepress_data['header_h1_typography']['line-height'] : '36px';


if(isset($writepress_data['header_h2_typography']['font-family']) && !empty($writepress_data['header_h2_typography']['font-family'])) {
	$header_h2_typography_css .= 'font-family: '.esc_attr($writepress_data['header_h2_typography']['font-family']).';';
}
if($header_h2_typography_font_size) {
	$header_h2_typography_css .= 'font-size: '.esc_attr($header_h2_typography_font_size).';';
}
if($header_h2_typography_line_height) {
	$header_h2_typography_css .= 'line-height: '.esc_attr($header_h2_typography_line_height).';';
}
if(isset($writepress_data['header_h2_typography']['font-style']) && !empty($writepress_data['header_h2_typography']['font-style'])) {
	$header_h2_typography_css .= 'font-style: '.esc_attr($writepress_data['header_h2_typography']['font-style']).';';
}
if(isset($writepress_data['header_h2_typography']['font-weight']) && !empty($writepress_data['header_h2_typography']['font-weight'])) {
	$header_h2_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_h2_typography']['font-weight']).';';
}
if(isset($writepress_data['header_h2_typography']['letter-spacing']) && !empty($writepress_data['header_h2_typography']['letter-spacing'])) {
	$header_h2_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_h2_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_h2_typography']['text-transform']) && !empty($writepress_data['header_h2_typography']['text-transform'])) {
	$header_h2_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_h2_typography']['text-transform']).';';
}
if(isset($writepress_data['header_h2_typography']['color']) && !empty($writepress_data['header_h2_typography']['color'])) {
	$header_h2_typography_css .= 'color: '.esc_attr($writepress_data['header_h2_typography']['color']).';';
}
$output .= 'h2{'.$header_h2_typography_css.'}';


$header_h3_typography_css = '';
$header_h3_typography_font_size = isset($writepress_data['header_h3_typography']['font-size']) ? $writepress_data['header_h3_typography']['font-size'] : '24px';
$header_h3_typography_line_height = isset($writepress_data['header_h3_typography']['line-height']) ? $writepress_data['header_h3_typography']['line-height'] : '34px';


if(isset($writepress_data['header_h3_typography']['font-family']) && !empty($writepress_data['header_h3_typography']['font-family'])) {
	$header_h3_typography_css .= 'font-family: '.esc_attr($writepress_data['header_h3_typography']['font-family']).';';
}
if($header_h3_typography_font_size) {
	$header_h3_typography_css .= 'font-size: '.esc_attr($header_h3_typography_font_size).';';
}
if($header_h3_typography_line_height) {
	$header_h3_typography_css .= 'line-height: '.esc_attr($header_h3_typography_line_height).';';
}
if(isset($writepress_data['header_h3_typography']['font-style']) && !empty($writepress_data['header_h3_typography']['font-style'])) {
	$header_h3_typography_css .= 'font-style: '.esc_attr($writepress_data['header_h3_typography']['font-style']).';';
}
if(isset($writepress_data['header_h3_typography']['font-weight']) && !empty($writepress_data['header_h3_typography']['font-weight'])) {
	$header_h3_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_h3_typography']['font-weight']).';';
}
if(isset($writepress_data['header_h3_typography']['letter-spacing']) && !empty($writepress_data['header_h3_typography']['letter-spacing'])) {
	$header_h3_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_h3_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_h3_typography']['text-transform']) && !empty($writepress_data['header_h3_typography']['text-transform'])) {
	$header_h3_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_h3_typography']['text-transform']).';';
}
if(isset($writepress_data['header_h3_typography']['color']) && !empty($writepress_data['header_h3_typography']['color'])) {
	$header_h3_typography_css .= 'color: '.esc_attr($writepress_data['header_h3_typography']['color']).';';
}
$output .= 'h3{'.$header_h3_typography_css.'}';


$header_h4_typography_css = '';

$header_h4_typography_font_size = isset($writepress_data['header_h4_typography']['font-size']) ? $writepress_data['header_h4_typography']['font-size'] : '22px';
$header_h4_typography_line_height = isset($writepress_data['header_h4_typography']['line-height']) ? $writepress_data['header_h4_typography']['line-height'] : '30px';


if(isset($writepress_data['header_h4_typography']['font-family']) && !empty($writepress_data['header_h4_typography']['font-family'])) {
	$header_h4_typography_css .= 'font-family: '.esc_attr($writepress_data['header_h4_typography']['font-family']).';';
}
if($header_h4_typography_font_size) {
	$header_h4_typography_css .= 'font-size: '.esc_attr($header_h4_typography_font_size).';';
}
if($header_h4_typography_line_height) {
	$header_h4_typography_css .= 'line-height: '.esc_attr($header_h4_typography_line_height).';';
}
if(isset($writepress_data['header_h4_typography']['font-style']) && !empty($writepress_data['header_h4_typography']['font-style'])) {
	$header_h4_typography_css .= 'font-style: '.esc_attr($writepress_data['header_h4_typography']['font-style']).';';
}
if(isset($writepress_data['header_h4_typography']['font-weight']) && !empty($writepress_data['header_h4_typography']['font-weight'])) {
	$header_h4_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_h4_typography']['font-weight']).';';
}
if(isset($writepress_data['header_h4_typography']['letter-spacing']) && !empty($writepress_data['header_h4_typography']['letter-spacing'])) {
	$header_h4_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_h4_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_h4_typography']['text-transform']) && !empty($writepress_data['header_h4_typography']['text-transform'])) {
	$header_h4_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_h4_typography']['text-transform']).';';
}
if(isset($writepress_data['header_h4_typography']['color']) && !empty($writepress_data['header_h4_typography']['color'])) {
	$header_h4_typography_css .= 'color: '.esc_attr($writepress_data['header_h4_typography']['color']).';';
}
$output .= 'h4{'.$header_h4_typography_css.'}';


$header_h5_typography_css = '';

$header_h5_typography_font_size = isset($writepress_data['header_h5_typography']['font-size']) ? $writepress_data['header_h5_typography']['font-size'] : '20px';
$header_h5_typography_line_height = isset($writepress_data['header_h5_typography']['line-height']) ? $writepress_data['header_h5_typography']['line-height'] : '30px';


if(isset($writepress_data['header_h5_typography']['font-family']) && !empty($writepress_data['header_h5_typography']['font-family'])) {
	$header_h5_typography_css .= 'font-family: '.esc_attr($writepress_data['header_h5_typography']['font-family']).';';
}
if($header_h5_typography_font_size) {
	$header_h5_typography_css .= 'font-size: '.esc_attr($header_h5_typography_font_size).';';
}
if($header_h5_typography_line_height) {
	$header_h5_typography_css .= 'line-height: '.esc_attr($header_h5_typography_line_height).';';
}
if(isset($writepress_data['header_h5_typography']['font-style']) && !empty($writepress_data['header_h5_typography']['font-style'])) {
	$header_h5_typography_css .= 'font-style: '.esc_attr($writepress_data['header_h5_typography']['font-style']).';';
}
if(isset($writepress_data['header_h5_typography']['font-weight']) && !empty($writepress_data['header_h5_typography']['font-weight'])) {
	$header_h5_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_h5_typography']['font-weight']).';';
}
if(isset($writepress_data['header_h5_typography']['letter-spacing']) && !empty($writepress_data['header_h5_typography']['letter-spacing'])) {
	$header_h5_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_h5_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_h5_typography']['text-transform']) && !empty($writepress_data['header_h5_typography']['text-transform'])) {
	$header_h5_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_h5_typography']['text-transform']).';';
}
if(isset($writepress_data['header_h5_typography']['color']) && !empty($writepress_data['header_h5_typography']['color'])) {
	$header_h5_typography_css .= 'color: '.esc_attr($writepress_data['header_h5_typography']['color']).';';
}
$output .= 'h5{'.$header_h5_typography_css.'}';


$header_h6_typography_css = '';

$header_h6_typography_font_size = isset($writepress_data['header_h6_typography']['font-size']) ? $writepress_data['header_h6_typography']['font-size'] : '18px';
$header_h6_typography_line_height = isset($writepress_data['header_h6_typography']['line-height']) ? $writepress_data['header_h6_typography']['line-height'] : '28px';


if(isset($writepress_data['header_h6_typography']['font-family']) && !empty($writepress_data['header_h6_typography']['font-family'])) {
	$header_h6_typography_css .= 'font-family: '.esc_attr($writepress_data['header_h6_typography']['font-family']).';';
}
if($header_h6_typography_font_size) {
	$header_h6_typography_css .= 'font-size: '.esc_attr($header_h6_typography_font_size).';';
}
if($header_h6_typography_line_height) {
	$header_h6_typography_css .= 'line-height: '.esc_attr($header_h6_typography_line_height).';';
}
if(isset($writepress_data['header_h6_typography']['font-style']) && !empty($writepress_data['header_h6_typography']['font-style'])) {
	$header_h6_typography_css .= 'font-style: '.esc_attr($writepress_data['header_h6_typography']['font-style']).';';
}
if(isset($writepress_data['header_h6_typography']['font-weight']) && !empty($writepress_data['header_h6_typography']['font-weight'])) {
	$header_h6_typography_css .= 'font-weight: '.esc_attr($writepress_data['header_h6_typography']['font-weight']).';';
}
if(isset($writepress_data['header_h6_typography']['letter-spacing']) && !empty($writepress_data['header_h6_typography']['letter-spacing'])) {
	$header_h6_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['header_h6_typography']['letter-spacing']).';';
}
if(isset($writepress_data['header_h6_typography']['text-transform']) && !empty($writepress_data['header_h6_typography']['text-transform'])) {
	$header_h6_typography_css .= 'text-transform: '.esc_attr($writepress_data['header_h6_typography']['text-transform']).';';
}
if(isset($writepress_data['header_h6_typography']['color']) && !empty($writepress_data['header_h6_typography']['color'])) {
	$header_h6_typography_css .= 'color: '.esc_attr($writepress_data['header_h6_typography']['color']).';';
}
$output .= 'h6{'.$header_h6_typography_css.'}';


$sidebar_title_typography_css = '';
if(isset($writepress_data['sidebar_title_typography']) && $writepress_data['sidebar_title_typography'] && is_array($writepress_data['sidebar_title_typography'])) {
if(isset($writepress_data['sidebar_title_typography']['font-family']) && !empty($writepress_data['sidebar_title_typography']['font-family'])) {
	$sidebar_title_typography_css .= 'font-family: '.esc_attr($writepress_data['sidebar_title_typography']['font-family']).';';
}
if(isset($writepress_data['sidebar_title_typography']['font-size']) && !empty($writepress_data['sidebar_title_typography']['font-size'])) {
	$sidebar_title_typography_css .= 'font-size: '.esc_attr($writepress_data['sidebar_title_typography']['font-size']).';';
}
if(isset($writepress_data['sidebar_title_typography']['line-height']) && !empty($writepress_data['sidebar_title_typography']['line-height'])) {
	$sidebar_title_typography_css .= 'line-height: '.esc_attr($writepress_data['sidebar_title_typography']['line-height']).';';
}
if(isset($writepress_data['sidebar_title_typography']['font-style']) && !empty($writepress_data['sidebar_title_typography']['font-style'])) {
	$sidebar_title_typography_css .= 'font-style: '.esc_attr($writepress_data['sidebar_title_typography']['font-style']).';';
}
if(isset($writepress_data['sidebar_title_typography']['text-transform']) && !empty($writepress_data['sidebar_title_typography']['text-transform'])) {
	$sidebar_title_typography_css .= 'text-transform: '.esc_attr($writepress_data['sidebar_title_typography']['text-transform']).';';
}
if(isset($writepress_data['sidebar_title_typography']['font-weight']) && !empty($writepress_data['sidebar_title_typography']['font-weight'])) {
	$sidebar_title_typography_css .= 'font-weight: '.esc_attr($writepress_data['sidebar_title_typography']['font-weight']).';';
}
if(isset($writepress_data['sidebar_title_typography']['letter-spacing']) && !empty($writepress_data['sidebar_title_typography']['letter-spacing'])) {
	$sidebar_title_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['sidebar_title_typography']['letter-spacing']).';';
}
if(isset($writepress_data['sidebar_title_typography']['color']) && !empty($writepress_data['sidebar_title_typography']['color'])) {
	$sidebar_title_typography_css .= 'color: '.esc_attr($writepress_data['sidebar_title_typography']['color']).';';
}
$output .= '.sidebar .widget h3.widget-title{'.$sidebar_title_typography_css.'}';
}

$sidebar_typography_css = '';
if(isset($writepress_data['sidebar_typography']) && $writepress_data['sidebar_typography'] && is_array($writepress_data['sidebar_typography'])) {
if(isset($writepress_data['sidebar_typography']['font-family']) && !empty($writepress_data['sidebar_typography']['font-family'])) {
	$sidebar_typography_css .= 'font-family: '.esc_attr($writepress_data['sidebar_typography']['font-family']).';';
}
if(isset($writepress_data['sidebar_typography']['font-size']) && !empty($writepress_data['sidebar_typography']['font-size'])) {
	$sidebar_typography_css .= 'font-size: '.esc_attr($writepress_data['sidebar_typography']['font-size']).';';
}
if(isset($writepress_data['sidebar_typography']['line-height']) && !empty($writepress_data['sidebar_typography']['line-height'])) {
	$sidebar_typography_css .= 'line-height: '.esc_attr($writepress_data['sidebar_typography']['line-height']).';';
}
if(isset($writepress_data['sidebar_typography']['font-style']) && !empty($writepress_data['sidebar_typography']['font-style'])) {
	$sidebar_typography_css .= 'font-style: '.esc_attr($writepress_data['sidebar_typography']['font-style']).';';
}
if(isset($writepress_data['sidebar_typography']['font-weight']) && !empty($writepress_data['sidebar_typography']['font-weight'])) {
	$sidebar_typography_css .= 'font-weight: '.esc_attr($writepress_data['sidebar_typography']['font-weight']).';';
}
if(isset($writepress_data['sidebar_typography']['text-transform']) && !empty($writepress_data['sidebar_typography']['text-transform'])) {
	$sidebar_typography_css .= 'text-transform: '.esc_attr($writepress_data['sidebar_typography']['text-transform']).';';
}
if(isset($writepress_data['sidebar_typography']['letter-spacing']) && !empty($writepress_data['sidebar_typography']['letter-spacing'])) {
	$sidebar_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['sidebar_typography']['letter-spacing']).';';
}
if(isset($writepress_data['sidebar_typography']['text-align']) && !empty($writepress_data['sidebar_typography']['text-align'])) {
	$sidebar_typography_css .= 'text-align: '.esc_attr($writepress_data['sidebar_typography']['text-align']).';';
}
if(isset($writepress_data['sidebar_typography']['color']) && !empty($writepress_data['sidebar_typography']['color'])) {
	$sidebar_typography_css .= 'color: '.esc_attr($writepress_data['sidebar_typography']['color']).';';
}

$output .= '.sidebar,.sidebar h1,.sidebar h2,.sidebar h3,.sidebar h4,.sidebar h5,.sidebar h6{'.$sidebar_typography_css.'}';
}

$footer_title_typography_css = '';
$footer_title_typography_color = isset($writepress_data['footer_title_typography']['color']) ? $writepress_data['footer_title_typography']['color'] : '#dddddd';

if(isset($writepress_data['footer_title_typography']['font-family']) && !empty($writepress_data['footer_title_typography']['font-family'])) {
	$footer_title_typography_css .= 'font-family: '.esc_attr($writepress_data['footer_title_typography']['font-family']).';';
}
if(isset($writepress_data['footer_title_typography']['font-size']) && !empty($writepress_data['footer_title_typography']['font-size'])) {
	$footer_title_typography_css .= 'font-size: '.esc_attr($writepress_data['footer_title_typography']['font-size']).';';
}
if(isset($writepress_data['footer_title_typography']['line-height']) && !empty($writepress_data['footer_title_typography']['line-height'])) {
	$footer_title_typography_css .= 'line-height: '.esc_attr($writepress_data['footer_title_typography']['line-height']).';';
}
if(isset($writepress_data['footer_title_typography']['font-style']) && !empty($writepress_data['footer_title_typography']['font-style'])) {
	$footer_title_typography_css .= 'font-style: '.esc_attr($writepress_data['footer_title_typography']['font-style']).';';
}
if(isset($writepress_data['footer_title_typography']['font-weight']) && !empty($writepress_data['footer_title_typography']['font-weight'])) {
	$footer_title_typography_css .= 'font-weight: '.esc_attr($writepress_data['footer_title_typography']['font-weight']).';';
}
if(isset($writepress_data['footer_title_typography']['letter-spacing']) && !empty($writepress_data['footer_title_typography']['letter-spacing'])) {
	$footer_title_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['footer_title_typography']['letter-spacing']).';';
}
if(isset($writepress_data['footer_title_typography']['text-align']) && !empty($writepress_data['footer_title_typography']['text-align'])) {
	$footer_title_typography_css .= 'text-align: '.esc_attr($writepress_data['footer_title_typography']['text-align']).';';
}
if(isset($writepress_data['footer_title_typography']['text-transform']) && !empty($writepress_data['footer_title_typography']['text-transform'])) {
	$footer_title_typography_css .= 'text-transform: '.esc_attr($writepress_data['footer_title_typography']['text-transform']).';';
}
if($footer_title_typography_color && !empty($footer_title_typography_color)) {
	$footer_title_typography_css .= 'color: '.esc_attr($footer_title_typography_color).';';
}

$output .= '.footer h3.widget-title{'.$footer_title_typography_css.'}';


$footer_typography_css = '';
$footer_typography_color = isset($writepress_data['footer_typography']['color']) ? $writepress_data['footer_typography']['color'] : '#dddddd';

if(isset($writepress_data['footer_typography']['font-family']) && !empty($writepress_data['footer_typography']['font-family'])) {
	$footer_typography_css .= 'font-family: '.esc_attr($writepress_data['footer_typography']['font-family']).';';
}
if(isset($writepress_data['footer_typography']['font-style']) && !empty($writepress_data['footer_typography']['font-style'])) {
	$footer_typography_css .= 'font-style: '.esc_attr($writepress_data['footer_typography']['font-style']).';';
}
if(isset($writepress_data['footer_typography']['font-weight']) && !empty($writepress_data['footer_typography']['font-weight'])) {
	$footer_typography_css .= 'font-weight: '.esc_attr($writepress_data['footer_typography']['font-weight']).';';
}
if(isset($writepress_data['footer_typography']['letter-spacing']) && !empty($writepress_data['footer_typography']['letter-spacing'])) {
	$footer_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['footer_typography']['letter-spacing']).';';
}
if(isset($writepress_data['footer_typography']['text-align']) && !empty($writepress_data['footer_typography']['text-align'])) {
	$footer_typography_css .= 'text-align: '.esc_attr($writepress_data['footer_typography']['text-align']).';';
}
if(isset($writepress_data['footer_typography']['text-transform']) && !empty($writepress_data['footer_typography']['text-transform'])) {
	$footer_typography_css .= 'text-transform: '.esc_attr($writepress_data['footer_typography']['text-transform']).';';
}
if($footer_typography_color && !empty($footer_typography_color)) {
	$footer_typography_css .= 'color: '.esc_attr($footer_typography_color).';';
}

$output .= '.footer,.footer h1,.footer h2,.footer h3,.footer h4,.footer h5,.footer h6{'.$footer_typography_css.'}';
$footer_typography_font_size_line_height = '';
if(isset($writepress_data['footer_typography']['font-size']) && !empty($writepress_data['footer_typography']['font-size'])) {
	$footer_typography_font_size_line_height .= 'font-size: '.esc_attr($writepress_data['footer_typography']['font-size']).';';

}
if(isset($writepress_data['footer_typography']['line-height']) && !empty($writepress_data['footer_typography']['line-height'])) {
	$footer_typography_font_size_line_height .= 'line-height: '.esc_attr($writepress_data['footer_typography']['line-height']).';';
}
$output .= '.footer{'.$footer_typography_font_size_line_height.'}';


$page_titlebar_typography_css = '';
if(isset($writepress_data['page_titlebar_typography']) && $writepress_data['page_titlebar_typography'] && is_array($writepress_data['page_titlebar_typography'])) {
if(isset($writepress_data['page_titlebar_typography']['font-family']) && !empty($writepress_data['page_titlebar_typography']['font-family'])) {
	$page_titlebar_typography_css .= 'font-family: '.esc_attr($writepress_data['page_titlebar_typography']['font-family']).';';
}
if(isset($writepress_data['page_titlebar_typography']['font-style']) && !empty($writepress_data['page_titlebar_typography']['font-style'])) {
	$page_titlebar_typography_css .= 'font-style: '.esc_attr($writepress_data['page_titlebar_typography']['font-style']).';';
}
if(isset($writepress_data['page_titlebar_typography']['font-weight']) && !empty($writepress_data['page_titlebar_typography']['font-weight'])) {
	$page_titlebar_typography_css .= 'font-weight: '.esc_attr($writepress_data['page_titlebar_typography']['font-weight']).';';
}
if(isset($writepress_data['page_titlebar_typography']['letter-spacing']) && !empty($writepress_data['page_titlebar_typography']['letter-spacing'])) {
	$page_titlebar_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['page_titlebar_typography']['letter-spacing']).';';
}
if(isset($writepress_data['page_titlebar_typography']['text-transform']) && !empty($writepress_data['page_titlebar_typography']['text-transform'])) {
	$page_titlebar_typography_css .= 'text-transform: '.esc_attr($writepress_data['page_titlebar_typography']['text-transform']).';';
}
$output .= '.pagetitle_parallax_content h1{'.$page_titlebar_typography_css.'}';
}

$single_post_title_typography_css = '';
if(isset($writepress_data['single_post_title_typography']) && $writepress_data['single_post_title_typography'] && is_array($writepress_data['single_post_title_typography'])) {
if(isset($writepress_data['single_post_title_typography']['font-family']) && !empty($writepress_data['single_post_title_typography']['font-family'])) {
	$single_post_title_typography_css .= 'font-family: '.esc_attr($writepress_data['single_post_title_typography']['font-family']).';';
}
if(isset($writepress_data['single_post_title_typography']['font-size']) && !empty($writepress_data['single_post_title_typography']['font-size'])) {
	$single_post_title_typography_css .= 'font-size: '.esc_attr($writepress_data['single_post_title_typography']['font-size']).';';
}
if(isset($writepress_data['single_post_title_typography']['line-height']) && !empty($writepress_data['single_post_title_typography']['line-height'])) {
	$single_post_title_typography_css .= 'line-height: '.esc_attr($writepress_data['single_post_title_typography']['line-height']).';';
}
if(isset($writepress_data['single_post_title_typography']['font-style']) && !empty($writepress_data['single_post_title_typography']['font-style'])) {
	$single_post_title_typography_css .= 'font-style: '.esc_attr($writepress_data['single_post_title_typography']['font-style']).';';
}
if(isset($writepress_data['single_post_title_typography']['font-weight']) && !empty($writepress_data['single_post_title_typography']['font-weight'])) {
	$single_post_title_typography_css .= 'font-weight: '.esc_attr($writepress_data['single_post_title_typography']['font-weight']).';';
}
if(isset($writepress_data['single_post_title_typography']['letter-spacing']) && !empty($writepress_data['single_post_title_typography']['letter-spacing'])) {
	$single_post_title_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['single_post_title_typography']['letter-spacing']).';';
}
if(isset($writepress_data['single_post_title_typography']['text-transform']) && !empty($writepress_data['single_post_title_typography']['text-transform'])) {
	$single_post_title_typography_css .= 'text-transform: '.esc_attr($writepress_data['single_post_title_typography']['text-transform']).';';
}
if(isset($writepress_data['single_post_title_typography']['color']) && !empty($writepress_data['single_post_title_typography']['color'])) {
	$single_post_title_typography_css .= 'color: '.esc_attr($writepress_data['single_post_title_typography']['color']).';';
}
$output .= 'body.single .post_title_area h2,.single_page_title{'.$single_post_title_typography_css.'}';
}

$post_meta_typography_css = '';
if(isset($writepress_data['post_meta_typography']) && $writepress_data['post_meta_typography'] && is_array($writepress_data['post_meta_typography'])) {
if(isset($writepress_data['post_meta_typography']['font-family']) && !empty($writepress_data['post_meta_typography']['font-family'])) {
	$post_meta_typography_css .= 'font-family: '.esc_attr($writepress_data['post_meta_typography']['font-family']).';';
}
if(isset($writepress_data['post_meta_typography']['font-size']) && !empty($writepress_data['post_meta_typography']['font-size'])) {
	$post_meta_typography_css .= 'font-size: '.esc_attr($writepress_data['post_meta_typography']['font-size']).';';
}
if(isset($writepress_data['post_meta_typography']['line-height']) && !empty($writepress_data['post_meta_typography']['line-height'])) {
	$post_meta_typography_css .= 'line-height: '.esc_attr($writepress_data['post_meta_typography']['line-height']).';';
}
if(isset($writepress_data['post_meta_typography']['font-style']) && !empty($writepress_data['post_meta_typography']['font-style'])) {
	$post_meta_typography_css .= 'font-style: '.esc_attr($writepress_data['post_meta_typography']['font-style']).';';
}
if(isset($writepress_data['post_meta_typography']['font-weight']) && !empty($writepress_data['post_meta_typography']['font-weight'])) {
	$post_meta_typography_css .= 'font-weight: '.esc_attr($writepress_data['post_meta_typography']['font-weight']).';';
}
if(isset($writepress_data['post_meta_typography']['letter-spacing']) && !empty($writepress_data['post_meta_typography']['letter-spacing'])) {
	$post_meta_typography_css .= 'letter-spacing: '.esc_attr($writepress_data['post_meta_typography']['letter-spacing']).';';
}
if(isset($writepress_data['post_meta_typography']['text-transform']) && !empty($writepress_data['post_meta_typography']['text-transform'])) {
	$post_meta_typography_css .= 'text-transform: '.esc_attr($writepress_data['post_meta_typography']['text-transform']).';';
}
if(isset($writepress_data['post_meta_typography']['color']) && !empty($writepress_data['post_meta_typography']['color'])) {
	$post_meta_typography_css .= 'color: '.esc_attr($writepress_data['post_meta_typography']['color']).';';
}
$output .= '.zolo_blog_date_style5,.writepress_postmeta_area,.zolo_blog_meta,.post-bottom-info,.zolo_blog_post_slider_area ul.metatag_list,ul.entry_meta_list,.entry-meta,.zolo_blog_box .zolo_blog_author, .zolo_blog_box .zolo_blog_date,.social_sharing_icon{'.$post_meta_typography_css.'}';
}

$footer_link_color_regular = isset($writepress_data['footer_link_color']['regular']) ? $writepress_data['footer_link_color']['regular'] : '#bfbfbf';
$footer_link_color_hover = isset($writepress_data['footer_link_color']['hover']) ? $writepress_data['footer_link_color']['hover'] : '#919191';
$copyright_text_color = isset($writepress_data['copyright_text_color']) ? $writepress_data['copyright_text_color'] : '#8C8989';
$copyright_font_size = isset($writepress_data['copyright_font_size']) ? $writepress_data['copyright_font_size'] : '12px';
$copyright_link_color_regular = isset($writepress_data['copyright_link_color']["regular"]) ? $writepress_data['copyright_link_color']["regular"] : '#bfbfbf';
$copyright_link_color_hover = isset($writepress_data['copyright_link_color']["hover"]) ? $writepress_data['copyright_link_color']["hover"] : '#919191';
$pagination_font_size = isset($writepress_data['pagination_font_size']) ? $writepress_data['pagination_font_size'] : '12';


$output .= '.footer a{color:'.$footer_link_color_regular.'}';
$output .= '.footer a:hover{color:'.$footer_link_color_hover.';}';
$output .= '.vertical_copyright,.copyright{font-size:'.$copyright_font_size.'px;color:'.$copyright_text_color.';}';
$output .= '.copyright a{color:'.$copyright_link_color_regular.';}';
$output .= '.copyright a:hover{color:'.$copyright_link_color_hover.';}';
$output .= '.pagination,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li span, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li span,
.page-numbers{font-size:'.$pagination_font_size.'px;line-height:'.$pagination_font_size.'px;}';
//Typography Area End

//Styling Area Start
//Primary Color Start
$output .= '.launch_button,.widget_calendar caption,.widget_calendar th,.widget_calendar tbody td#today,.widget_calendar a:hover,.zolo_zilla_likes_box,.post_flexslider .zolo_blog_icons .zolo_blog_icon,.navigation .nav-next a,.navigation .nav-previous a,.paging-navigation .nav-next a:hover, .navigation .nav-previous a:hover,#bbpress-forums fieldset.bbp-form legend,button:hover,button:focus,input[type="submit"]:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:focus,input[type="button"]:focus,input[type="reset"]:focus,button, input[type="submit"], input[type="button"], input[type="reset"],.favorite-toggle,a.subscription-toggle,.subscription-toggle,.zolo_navbar_search.default_search_but .nav_search_form_area .search-form .search-submit{background:'.$primary_color.';}';
$output .= '::-moz-selection{background:'.$primary_color.';color:#fff;}';
$output .= '::selection{background:'.$primary_color.';color:#fff;}';

$output .= 'article blockquote,.zolo_navbar_search.default_search_but .nav_search_form_area .search-form .search-submit{border-color:'.$primary_color.';}';
$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,.title404,.zoloblogstyle1 .post_title_area h2 a:hover,.zolo-about-me ul.zolo-about-me-social li a,nav.woocommerce-MyAccount-navigation ul li.is-active a,nav.woocommerce-MyAccount-navigation ul li a:hover{color:'.$primary_color.';}';
$output .= '.zolo_navbar_search.expanded_search_but .nav_search_form_area input,.wpcf7-form input:focus, .wpcf7-form textarea:focus,.zolo-about-me ul.zolo-about-me-social li a{border-color:'.$primary_color.'!important;}';
//Primary Color End

$body_link_color_regular = isset($writepress_data['body-link-color']['regular']) ? $writepress_data['body-link-color']['regular'] : '#888888';
$body_link_color_hover = isset($writepress_data['body-link-color']['hover']) ? $writepress_data['body-link-color']['hover'] : '#333333';
$body_typography_color = isset($writepress_data['body_typography']['color']) ? $writepress_data['body_typography']['color'] : '#747474';
$Pagi_font_regular_color = isset($writepress_data['Pagi_font_color']['regular']) ? $writepress_data['Pagi_font_color']['regular'] : '#333333';
$Pagi_font_hover_color = isset($writepress_data['Pagi_font_color']['hover']) ? $writepress_data['Pagi_font_color']['hover'] : '#ffffff';
$Pagi_background_color_regular = isset($writepress_data['Pagi_background_color']['regular']) ? $writepress_data['Pagi_background_color']['regular'] : '#eeeeee';
$Pagi_background_color_hover = !empty($writepress_data['Pagi_background_color']['hover']) ? $writepress_data['Pagi_background_color']['hover'] : $primary_color;
$Pagi_border_color_regular = isset($writepress_data['Pagi_border_color']['regular']) ? $writepress_data['Pagi_border_color']['regular'] : '#e1e1e1';
$Pagi_border_color_hover = isset($writepress_data['Pagi_border_color']['hover']) ? $writepress_data['Pagi_border_color']['hover'] : '#cccccc';
$header_h4_typography_font_size = isset($writepress_data["header_h4_typography"]["font-size"]) ? $writepress_data["header_h4_typography"]["font-size"] : '22px';
$header_h4_typography_line_height = isset($writepress_data["header_h4_typography"]["line-height"]) ? $writepress_data["header_h4_typography"]["line-height"] : '30px';

$output .= 'a{color:'.$body_link_color_regular.';}';
$output .= '.widget.widget_nav_menu li.current-menu-item a,.widget.widget_pages li.current_page_item a,a:hover{color:'.$body_link_color_hover.';}';
$output .= '.woocommerce div.product .stock, .woocommerce #content div.product .stock, .woocommerce-page div.product .stock, .woocommerce-page #content div.product .stock,
.woocommerce div.product span.price del, .woocommerce div.product p.price del, .woocommerce #content div.product span.price del, .woocommerce #content div.product p.price del, .woocommerce-page div.product span.price del, .woocommerce-page div.product p.price del, .woocommerce-page #content div.product span.price del, .woocommerce-page #content div.product p.price del,.woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price,
.woocommerce ul.products li.product .price{color:'.$body_typography_color.'!important;}';
// Pagination Start
$output .= '.page-numbers li a,.page-numbers li span.dots,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li span, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li span{color:'.$Pagi_font_regular_color.'!important;background:'.$Pagi_background_color_regular.'!important;border: 1px solid '.$Pagi_border_color_regular.';}';
// Hover


$output .= '.page-numbers li span,.page-numbers li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus{color:'.$Pagi_font_hover_color.'!important;background:'.$Pagi_background_color_hover.'!important;border: 1px solid '.$Pagi_border_color_hover.';}';
// Pagination End 

$output .= 'body.single .post-navigation .post-meta-nav-title{font-size:'.$header_h4_typography_font_size.'; line-height:'.$header_h4_typography_line_height.';}';
$output .= 'body.single .post-navigation .post-meta-nav{border-color:'.$body_link_color_regular.';}';
$output .= 'body.single .post-navigation a:hover .post-meta-nav{border-color:'.$body_link_color_hover.';}';

// Back to top Start 
$backtotop_hoverbg_color = !empty($writepress_data['backtotop_hoverbg_color']) ? $writepress_data['backtotop_hoverbg_color'] : $primary_color;
$backtotop_hoverborder_color = !empty($writepress_data['backtotop_hoverborder_color']) ? $writepress_data['backtotop_hoverborder_color'] : $primary_color;
$backtotop_background_color = isset($writepress_data["backtotop_background_color"]) ? $writepress_data["backtotop_background_color"] : '#46494a';
$backtotop_font_color_regular = isset($writepress_data['backtotop_font_color']["regular"]) ? $writepress_data['backtotop_font_color']["regular"] : '#ffffff';
$backtotop_font_color_hover = isset($writepress_data['backtotop_font_color']["hover"]) ? $writepress_data['backtotop_font_color']["hover"] : '#ffffff';
$backtotop_border_color = isset($writepress_data["backtotop_border_color"]) ? $writepress_data["backtotop_border_color"] : '#e1e1e1';
$header_position = isset($writepress_data["header_position"]) ? $writepress_data["header_position"] : 'Top';

$output .= 'a.default_back-to-top,a.back-to-top{background:'.$backtotop_background_color.';color:'.$backtotop_font_color_regular.';border:1px solid '.$backtotop_border_color.';}';
$output .= 'a.default_back-to-top:hover,a.back-to-top:hover{background:'.$backtotop_hoverbg_color.';color:'.$backtotop_font_color_hover.';border:1px solid '.$backtotop_hoverborder_color.';}';

if($header_position == 'Right'){
$backtotop_position_from_right = $side_header_width + 20;
$output .= '.back-to-top{right:'.$backtotop_position_from_right.'px;}';
}
// Back to top End

// Extended Sidebar Start
$extended_sidebar_width = isset($writepress_data['extended_sidebar_width']['width']) ? $writepress_data['extended_sidebar_width']['width'] : '300px';
$extended_font_color = isset($writepress_data["extended_font_color"]) ? $writepress_data["extended_font_color"] : '#333333';
$extended_link_color_regular = isset($writepress_data['extended_link_color']['regular']) ? $writepress_data['extended_link_color']['regular'] : '#333333';

if(isset($writepress_data["extended_sidebar_width"])){
$output .= '.extended_sidebar_box.extended_sidebar_position_right.extended_sidebar_mask_open{right:'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_position_right .extended_sidebar_area{right:-'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_area{width:'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_box.extended_sidebar_position_left.extended_sidebar_mask_open{left:'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_position_left .extended_sidebar_area{left:-'.$extended_sidebar_width.';}';
}
if(isset($writepress_data["sitelayout_padding"])){
$output .= '.extended_sidebar_box .extended_sidebar_mask{top:-'.$sitelayout_padding_top.';}';
}
if(isset($writepress_data["extended_sidebar_bg"])){
	
	$extended_sidebar_bg_css = '';
	if(isset($writepress_data['extended_sidebar_bg']['background-image']) && !empty($writepress_data['extended_sidebar_bg']['background-image'])){
		$extended_sidebar_bg_css .= 'background-image: url('.esc_url($writepress_data['extended_sidebar_bg']['background-image']).');';
		}
	if(isset($writepress_data['extended_sidebar_bg']['background-color']) && !empty($writepress_data['extended_sidebar_bg']['background-color'])){
		$extended_sidebar_bg_css .= 'background-color: '.esc_attr($writepress_data['extended_sidebar_bg']['background-color']).';';
		}
	if(isset($writepress_data['extended_sidebar_bg']['background-repeat']) && !empty($writepress_data['extended_sidebar_bg']['background-repeat'])){
		$extended_sidebar_bg_css .= 'background-repeat:'.$writepress_data['extended_sidebar_bg']['background-repeat'].';';
		}
	if(isset($writepress_data['extended_sidebar_bg']['background-size']) && !empty($writepress_data['extended_sidebar_bg']['background-size'])){
		$extended_sidebar_bg_css .= 'background-size:'.$writepress_data['extended_sidebar_bg']['background-size'].';';
		}
	if(isset($writepress_data['extended_sidebar_bg']['background-position']) && !empty($writepress_data['extended_sidebar_bg']['background-position'])){
		$extended_sidebar_bg_css .= 'background-position:'.$writepress_data["extended_sidebar_bg"]["background-position"].';';
		}
	$output .= '.extended_sidebar_area{'.$extended_sidebar_bg_css.'}';
}

if($extended_font_color){
$output .= '.extended_sidebar_area h1,.extended_sidebar_area h2,.extended_sidebar_area h3,.extended_sidebar_area h4,.extended_sidebar_area h5,.extended_sidebar_area h6,.extended_sidebar_area,.extended_sidebar_area .widget,.extended_sidebar_area .widget h3.widget-title{color:'.$extended_font_color.';}';
}
if(isset($writepress_data["extended_link_color"])){
$output .= '.extended_sidebar_area a,.extended_sidebar_area .widget a{color:'.$extended_link_color_regular.';}';
}

$extended_link_color_hover = isset($writepress_data['extended_link_color']['hover']) ? $writepress_data['extended_link_color']['hover'] : $primary_color ;
$output .= '.extended_sidebar_area a:hover,.extended_sidebar_area .widget a:hover{color:'.$extended_link_color_hover.';}';

if(isset($writepress_data["extended_border_color"])){
$output .= '.extended_sidebar_area .widget li,.extended_sidebar_area .widget.widget_nav_menu li a{border-color:'.$writepress_data['extended_border_color'].'!important;}';
}
// Extended Sidebar End

//Single Post CSS Start

$single_post_layout_width_page = get_post_meta( $cur_id, 'zt_single_post_layout_width', true );
$single_post_layout_width_admin = isset($writepress_data['single_post_layout_width']['width']) ? $writepress_data['single_post_layout_width']['width'] : '900px';;
$post_navigation_font_color_regular = isset($writepress_data['post_navigation_font_color']['regular']) ? $writepress_data['post_navigation_font_color']['regular'] : '#888888';
$post_navigation_font_color_hover = isset($writepress_data['post_navigation_font_color']['hover']) ? $writepress_data['post_navigation_font_color']['hover'] : '#333333';
$post_navigation_bg_color_regular = isset($writepress_data['post_navigation_bg_color']['regular']) ? $writepress_data['post_navigation_bg_color']['regular'] : '#f7f7f7';
$post_navigation_bg_color_hover = isset($writepress_data['post_navigation_bg_color']['hover']) ? $writepress_data['post_navigation_bg_color']['hover'] : '#eeeeee';
$post_navigation_font_color4_w = isset($writepress_data['post_navigation_font_color4-w']) ? $writepress_data['post_navigation_font_color4-w'] : '#ffffff';
$post_navigation_overlay_color = isset($writepress_data['post_navigation_overlay_color']) ? $writepress_data['post_navigation_overlay_color'] : '#888888';


if($single_post_layout_width_page == ''){
$single_post_layout_width = $single_post_layout_width_admin;
}else{
$single_post_layout_width = $single_post_layout_width_page;
}
$output .= '.single_post_content_wrapper{ max-width:'.$single_post_layout_width.';}';


$output .= 'body.single .post-navigation.navigation_style1 a{color:'.$post_navigation_font_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style1 a:hover{color:'.$post_navigation_font_color_hover.';}';
$output .= 'body.single .post-navigation.navigation_style1 .post-meta-nav{border-color:'.$post_navigation_font_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style1 a:hover .post-meta-nav{border-color:'.$post_navigation_font_color_hover.';}';
$output .= 'body.single .post-navigation.navigation_style2,body.single .post-navigation.navigation_style2 a{color:'.$post_navigation_font_color_regular.';background-color:'.$post_navigation_bg_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style2 a:hover{color:'.$post_navigation_font_color_hover.';background-color:'.$post_navigation_bg_color_hover.';}';

$output .= 'body.single .post-navigation.navigation_style3 a.pagination_button{color:'.$post_navigation_font_color_regular.';background-color:'.$post_navigation_bg_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style3 a.pagination_button:hover,
body.single .post-navigation.navigation_style3 .pagination_thumb_area{color:'.$post_navigation_font_color_hover.';background-color:'.$post_navigation_bg_color_hover.';}';

$output .= 'body.single .post-navigation.navigation_style4 .pagination_caption{color:'.$post_navigation_font_color4_w.';}';
$output .= 'body.single .post-navigation.navigation_style4 a .pagination_bg:after{background:'.$post_navigation_overlay_color.';}';

//Single Post CSS End

//Styling Area End

if( class_exists('Woocommerce') ) {	
//WooCommerce  Start
$woo_minicart_button_bg_color = !empty($writepress_data["woo_minicart_button_bg_color"]) ? $writepress_data["woo_minicart_button_bg_color"] : $primary_color;
$woo_minicart_button_text_color = isset($writepress_data['woo_minicart_button_text_color']) ? $writepress_data['woo_minicart_button_text_color'] : '#ffffff';
$woo_minicart_font_color = isset($writepress_data['woo_minicart_font_color']) ? $writepress_data['woo_minicart_font_color'] : '#555555';
$woo_minicart_box_color = isset($writepress_data['woo_minicart_box_color']) ? $writepress_data['woo_minicart_box_color'] : '#ffffff';
$woo_product_button_color = !empty($writepress_data["woo_product_button_color"]) ? $writepress_data["woo_product_button_color"] : $primary_color;
$woo_minicart_separator_color = isset($writepress_data['woo_minicart_separator_color']) ? $writepress_data['woo_minicart_separator_color'] : 'rgba(0,0,0,0.08)';
$woo_product_bg_color = isset($writepress_data["woo_product_bg_color"]) ? $writepress_data["woo_product_bg_color"] : '#ffffff';
$woo_product_bor_color = isset($writepress_data["woo_product_bor_color"]) ? $writepress_data["woo_product_bor_color"] : '#e8e8e8';
$woo_product_overlaybg_color = isset($writepress_data["woo_product_overlaybg_color"]) ? $writepress_data["woo_product_overlaybg_color"] : 'rgba(0,0,0,0.5)';
$body_typography_color = isset($writepress_data["body_typography"]["color"]) ? $writepress_data["body_typography"]["color"] : '#747474';

$output .= '.cart-number,.woocommerce .zt-tiny-cart-wrapper .cart-dropdown-form .dropdown-footer a.button,
.zt-tiny-cart-wrapper .cart-dropdown-form .dropdown-footer a.button{background:'.$woo_minicart_button_bg_color.'!important;color:'.$woo_minicart_button_text_color.';}';

$output .= '.woocommerce .zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li a.remove, .zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li a.remove, .woocommerce .zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li a.remove:hover{color:'.$woo_minicart_button_bg_color.'!important;}';

$output .= '.zt-tiny-cart-wrapper:hover .cart-dropdown-form,
.zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li h3.product-name a{color:'.$woo_minicart_font_color.';background:'.$woo_minicart_box_color.';}';

$output .= '.zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li{border-color:'.$woo_minicart_separator_color.';}';


$output .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce span.onsale, .woocommerce-page span.onsale,.woocommerce span.onsale::after, .woocommerce-page span.onsale::after,.woocommerce-page ul.products li.product .zolo_product_thumbnail .zolo_cart_but a.added_to_cart, .woocommerce ul.products li.product .zolo_product_thumbnail .zolo_cart_but a.added_to_cart, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button{background:'.$woo_product_button_color.'!important;}';
$output .= '.woocommerce p.stars.selected a,.woocommerce p.stars a,.woocommerce p.stars.selected a:not(.active):before,.woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before{color:'.$woo_product_button_color.'!important;}';

if($woo_product_bg_color){ 
$output .= '.woocommerce-page ul.products li.product .product_list_item, .woocommerce ul.products li.product .product_list_item{background:'.$woo_product_bg_color.';}';
}
if($woo_product_bor_color){
$output .= '.woocommerce-page ul.products li.product .product_list_item, .woocommerce ul.products li.product .product_list_item{border-color:'.$woo_product_bor_color.'!important;}';
$output .= '.woocommerce-page ul.products li.product .product_list_item:hover, .woocommerce ul.products li.product .product_list_item:hover{box-shadow: 0 0 7px '.$woo_product_bor_color.';}';
}
if($woo_product_overlaybg_color){ 
$output .= '.woocommerce-page ul.products li.product .zolo_product_thumbnail a.zolo_product_img::after, .woocommerce ul.products li.product .zolo_product_thumbnail a.zolo_product_img::after{background:'.$woo_product_overlaybg_color.'!important;}';
}
$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a{color:'.$body_typography_color.'!important;}';
$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a{color:'.$primary_color.'!important;}';
//WooCommerce  End
}
//Blog Grid Box CSS Start
$bloggrid_box_bg_color = isset($writepress_data["bloggrid_box_bg_color"]) ? $writepress_data["bloggrid_box_bg_color"] : 'rgba(255,255,255,0.9)';
$bloggrid_box_shadow_color = isset($writepress_data["bloggrid_box_shadow_color"]) ? $writepress_data["bloggrid_box_shadow_color"] : 'rgba(0,0,0,0.15)';
$post_title_alignment = isset($writepress_data["post_title_alignment"]) ? $writepress_data["post_title_alignment"] : 'left';
$post_category_bg = isset($writepress_data["post_category_bg"]) ? $writepress_data["post_category_bg"] : 'rgba(117,117,117,0.0)';
$post_category_border = isset($writepress_data["post_category_border"]) ? $writepress_data["post_category_border"] : '#757575';
$post_category_font_regular = isset($writepress_data["post_category_font"]["regular"]) ? $writepress_data["post_category_font"]["regular"] : '#757575';
$post_category_font_hover = !empty($writepress_data['post_category_font']["hover"]) ? $writepress_data['post_category_font']["hover"] : $primary_color;
$post_category_bg_hover = isset($writepress_data["post_category_bg_hover"]) ? $writepress_data["post_category_bg_hover"] : 'rgba(84,159,252,0.0)';
$post_category_border_hover = !empty($writepress_data['post_category_border_hover']) ? $writepress_data['post_category_border_hover'] : $primary_color;
$post_continuereading_bg = isset($writepress_data["post_continuereading_bg"]) ? $writepress_data["post_continuereading_bg"] : 'rgba(117,117,117,0.0)';
$post_continuereading_border = isset($writepress_data["post_continuereading_border"]) ? $writepress_data["post_continuereading_border"] : '#757575';
$post_continuereading_font_regular = isset($writepress_data["post_continuereading_font"]["regular"]) ? $writepress_data["post_continuereading_font"]["regular"] : '#757575';
$post_continuereading_font_hover = !empty($writepress_data["post_continuereading_font"]["hover"]) ? $writepress_data["post_continuereading_font"]["hover"] : $primary_color;
$post_continuereading_bg_hover = isset($writepress_data["post_continuereading_bg_hover"]) ? $writepress_data["post_continuereading_bg_hover"] : 'rgba(84,159,252,0.0)';
$post_continuereading_border_hover = !empty($writepress_data["post_continuereading_border_hover"]) ? $writepress_data["post_continuereading_border_hover"] : $primary_color;

$output .= '.portfolio_layout article .portfoliopage_content,.blog_layout .blog_layout_box .blogpage_content,.blog_layout .blog_layout_box_withoutpadding .blogpage_content{background:'.$bloggrid_box_bg_color.';}';
$output .= '.portfolio_layout article .portfoliopage_content,.blog_layout .blog_layout_box .blogpage_content,.blog_layout .blog_layout_box_withoutpadding .blogpage_content{box-shadow: 0 0px 2px '.$bloggrid_box_shadow_color.';}';
$output .= '.blog_layout .blog_layout_box .blogpage_content:hover,.blog_layout .blog_layout_box_withoutpadding .blogpage_content:hover{box-shadow: 0 0px 7px '.$bloggrid_box_shadow_color.';}';
$output .= '.read_more_area,.blog_layout .share-box,.post_title_area{text-align:'.$post_title_alignment.'}';
//Categories area CSS
$output .= '.categories-links.rounded a,.categories-links.box a{background:'.$post_category_bg.';}';
$output .= '.categories-links.rounded a,.categories-links.box a{border: 1px solid '.$post_category_border.';}';
$output .= '.categories-links.rounded a,.categories-links.box a{color:'.$post_category_font_regular.'}';
$output .= '.categories-links.rounded a:hover,.categories-links.box a:hover{color:'.$post_category_font_hover.'}';
$output .= '.categories-links.rounded a:hover,.categories-links.box a:hover{background:'.$post_category_bg_hover.';}';
$output .= '.categories-links.rounded a:hover, .categories-links.box a:hover{border: 1px solid '.$post_category_border_hover.';}';
//Continue Reading Button
$output .= 'a.more-link,.read_more_area a.read-more{background:'.$post_continuereading_bg.';}';
$output .= 'a.more-link,.read_more_area a.read-more{border: 1px solid '.$post_continuereading_border.';}';
$output .= 'a.more-link,.read_more_area a.read-more{color:'.$post_continuereading_font_regular.'}';
$output .= 'a.more-link:hover,.read_more_area a.read-more:hover{color:'.$post_continuereading_font_hover.'}';
$output .= 'a.more-link:hover,.read_more_area a.read-more:hover{background:'.$post_continuereading_bg_hover.';}';
$output .= 'a.more-link:hover,.read_more_area a.read-more:hover{border: 1px solid '.$post_continuereading_border_hover.';}';

//Share Box
$post_social_sharing_border_radius = isset($writepress_data["post_social_sharing_border_radius"]) ? $writepress_data["post_social_sharing_border_radius"] : '0px';
$social_share_style = isset($writepress_data["social_share_style"]) ? $writepress_data["social_share_style"] : 'default';
$post_social_share_bg = isset($writepress_data["post_social_share_bg"]) ? $writepress_data["post_social_share_bg"] : 'rgba(117,117,117,0.0)';
$post_social_share_bg_hover = isset($writepress_data["post_social_share_bg_hover"]) ? $writepress_data["post_social_share_bg_hover"] : 'rgba(84,159,252,0.0)';
$post_social_share_border_regular = isset($writepress_data["post_social_share_border"]["regular"]) ? $writepress_data["post_social_share_border"]["regular"] : '#757575';
$post_social_share_border_hover = !empty($writepress_data["post_social_share_border"]["hover"]) ? $writepress_data["post_social_share_border"]["hover"] : $primary_color;
$post_social_share_font_regular = isset($writepress_data["post_social_share_font"]["regular"]) ? $writepress_data["post_social_share_font"]["regular"] : '#757575';
$post_social_share_font_hover = !empty($writepress_data["post_social_share_font"]["hover"]) ? $writepress_data["post_social_share_font"]["hover"] : $primary_color;

$output .= '.share-box li a{-moz-border-radius:'.$post_social_sharing_border_radius.'px;-webkit-border-radius:'.$post_social_sharing_border_radius.'px;-ms-border-radius:'.$post_social_sharing_border_radius.'px;-o-border-radius:'.$post_social_sharing_border_radius.'px;border-radius:'.$post_social_sharing_border_radius.'px;}';

if($social_share_style == 'default'){ 
$output .= '.share-box li a{background:'.$post_social_share_bg.';}';
$output .= '.share-box li a:hover{background:'.$post_social_share_bg_hover.'}';
$output .= '.share-box li a{border: 1px solid '.$post_social_share_border_regular.';}';
$output .= '.share-box li a:hover{border: 1px solid '.$post_social_share_border_hover.';}';
$output .= '.share-box li a{color:'.$post_social_share_font_regular.'}';
$output .= '.share-box li a:hover{color:'.$post_social_share_font_hover.'}';
}else{
$output .= '.share-box ul.social_share_style_metro li a{color:#fff;background:none;border:0!important;}';
$output .= '.share-box ul.social_share_style_metro li.facebook a{background:#37589b;}';
$output .= '.share-box ul.social_share_style_metro li.twitter a{background:#58ccff;}';
$output .= '.share-box ul.social_share_style_metro li.linkedin a{background:#419cca;}';
$output .= '.share-box ul.social_share_style_metro li.tumblr a{background:#36465d;}';
$output .= '.share-box ul.social_share_style_metro li.google a{background:#de5a49;}';
$output .= '.share-box ul.social_share_style_metro li.pinterest a{background:#bd081c;}';
$output .= '.share-box ul.social_share_style_metro li.email a{background:#aaaaaa;}';

}
//Blog Grid Box CSS End
//Contact Form CSS Start
$contact_form_input_bor_color = isset($writepress_data["contact_form_input_bor_color"]) ? $writepress_data["contact_form_input_bor_color"] : '#cccccc';
$contact_form_input_bg_color = isset($writepress_data["contact_form_input_bg_color"]) ? $writepress_data["contact_form_input_bg_color"] : 'rgba(255,255,255,0.0)';
$contact_form_text_color = isset($writepress_data["contact_form_text_color"]) ? $writepress_data["contact_form_text_color"] : '#747474';
$contact_form_button_bor_color = !empty($writepress_data["contact_form_button_bor_color"]) ? $writepress_data["contact_form_button_bor_color"] : $primary_color;
$contact_form_button_bor_color_h = !empty($writepress_data["contact_form_button_bor_color_h"]) ? $writepress_data["contact_form_button_bor_color_h"] : $primary_color;
$contact_form_button_bg_color = !empty($writepress_data["contact_form_button_bg_color"]) ? $writepress_data["contact_form_button_bg_color"] : $primary_color;
$contact_form_button_bg_color_h = !empty($writepress_data["contact_form_button_bg_color_h"]) ? $writepress_data["contact_form_button_bg_color_h"] : $primary_color;
$contact_form_button_font_color_regular = isset($writepress_data["contact_form_button_font_color"]["regular"]) ? $writepress_data["contact_form_button_font_color"]["regular"] : '#ffffff';
$contact_form_button_font_color_hover = isset($writepress_data["contact_form_button_font_color"]["hover"]) ? $writepress_data["contact_form_button_font_color"]["hover"] : '#F6F6F6';

$output .= '.wpcf7-form select,.wpcf7-form .uneditable-input,.wpcf7-form input,.wpcf7-form textarea{border-color:'.$contact_form_input_bor_color.';background:'.$contact_form_input_bg_color.'!important;}';
$output .= '.wpcf7-form select,.wpcf7-form .uneditable-input, .wpcf7-form input, .wpcf7-form textarea,.wpcf7-form{color:'.$contact_form_text_color.';}';
$output .= '.wpcf7-form button, .wpcf7-form input[type=reset], .wpcf7-form input[type=submit], html .wpcf7-form input[type=button]{border:1px solid '.$contact_form_button_bor_color.'!important;}';
$output .= '.wpcf7-form button:hover, .wpcf7-form input[type=reset]:hover, .wpcf7-form input[type=submit]:hover, html .wpcf7-form input[type=button]:hover{border:1px solid '.$contact_form_button_bor_color_h.'!important;}';
$output .= '.wpcf7-form button, .wpcf7-form input[type=reset], .wpcf7-form input[type=submit], html .wpcf7-form input[type=button]{ background:'.$contact_form_button_bg_color.'!important;}';
$output .= '.wpcf7-form button:hover, .wpcf7-form input[type=reset]:hover, .wpcf7-form input[type=submit]:hover, html .wpcf7-form input[type=button]:hover{background:'.$contact_form_button_bg_color_h.'!important;opacity:1;}';
$output .= '.zt_button_icon,.zt_button_icon_right,.wpcf7-form button, .wpcf7-form input[type=reset], .wpcf7-form input[type=submit], html .wpcf7-form input[type=button]{color:'.$contact_form_button_font_color_regular.'!important;}';
$output .= '.zt_button_icon:hover,.zt_button_icon_right:hover,.wpcf7-form button:hover, .wpcf7-form input[type=reset]:hover, .wpcf7-form input[type=submit]:hover, html .wpcf7-form input[type=button]:hover{color:'.$contact_form_button_font_color_hover.'!important;}';
//Contact Form CSS End
//Mobile Site CSS Start
$mobile_header_padding_top = isset($writepress_data['mobile_header_padding']['padding-top']) ? $writepress_data['mobile_header_padding']['padding-top'] : '0px';
$mobile_header_padding_right = isset($writepress_data['mobile_header_padding']['padding-right']) ? $writepress_data['mobile_header_padding']['padding-right'] : '30px';
$mobile_header_padding_bottom = isset($writepress_data['mobile_header_padding']['padding-bottom']) ? $writepress_data['mobile_header_padding']['padding-bottom'] : '0px';
$mobile_header_padding_left = isset($writepress_data['mobile_header_padding']['padding-left']) ? $writepress_data['mobile_header_padding']['padding-left'] : '30px';
$mobile_menu_background_color = !empty($writepress_data['mobile_menu_background_color']['regular']) ? $writepress_data['mobile_menu_background_color']['regular'] : $primary_color;
$mobile_menu_background_color_hover = !empty($writepress_data['mobile_menu_background_color']['hover']) ? $writepress_data['mobile_menu_background_color']['hover'] : $primary_color;
$mobile_font_size = isset($writepress_data["mobile_font_size"]) ? $writepress_data["mobile_font_size"] : '14';
$mob_menu_lh = isset($writepress_data["mob_menu_lh"]) ? $writepress_data["mob_menu_lh"] : '40';
$mobile_navbar_icon_color = isset($writepress_data['mobile_navbar_icon_color']) ? $writepress_data['mobile_navbar_icon_color'] : '#e5e5e5';
$mobile_menu_font_color_reular = isset($writepress_data['mobile_menu_font_color']['regular']) ? $writepress_data['mobile_menu_font_color']['regular'] : '#ffffff';
$mobile_menu_font_color_hover = !empty($writepress_data['mobile_menu_font_color']['hover']) ? $writepress_data['mobile_menu_font_color']['hover'] : $primary_color;
$mobile_menu_border_color = !empty($writepress_data['mobile_menu_border_color']) ? $writepress_data['mobile_menu_border_color'] : $primary_color ;
$mobile_header_background_color = isset($writepress_data["mobile_header_background_color"]) ? $writepress_data["mobile_header_background_color"] : '#ffffff';

$output .= '.mobile_header_area header.zolo_header .headercontent_box{padding-top:'.$mobile_header_padding_top.';}';
$output .= '.mobile_header_area header.zolo_header .headercontent_box{padding-bottom:'.$mobile_header_padding_bottom.';}';
$output .= '.mobile_header_area header.zolo_header .headercontent_box{padding-right:'.$mobile_header_padding_right.';padding-left:'.$mobile_header_padding_left.';}';
$output .= '.zolo_mobile_navigation_area{background:'.$mobile_menu_background_color.'!important;}';
$output .= '.mobile-nav ul li a:hover{background:'.$mobile_menu_background_color_hover.';}';
$output .= '.mobile-nav ul li a{font-size:'.$mobile_font_size.'px;line-height:'.$mob_menu_lh.'px;}';
$output .= '.open-submenu{height:'.$mob_menu_lh.'px;}';
$output .= '.mobile_header_area ul.mob_nav_icons li a{color:'.$mobile_navbar_icon_color.'!important;}';
$output .= '.mobile_header_area .nav_search-icon.search_close_icon:after,.mobile_header_area .nav_search-icon:before,#nav_toggle .nav_bar{background:'.$mobile_navbar_icon_color.'!important;}';
$output .= '.mobile_header_area .nav_search-icon:after{border-color:'.$mobile_navbar_icon_color.'!important;}';
$output .= '.open-submenu:after,.mobile-nav ul li a{color:'.$mobile_menu_font_color_reular.'!important;}';
$output .= '.mobile-nav ul li a:hover{color:'.$mobile_menu_font_color_hover.'!important;}';
$output .= '.mobile-nav ul li a{border-bottom:1px solid '.$mobile_menu_border_color.'!important;}';
$output .= '.mobile_header_area .headerbackground,.mobile_header_area .header_background{background-color:'.$mobile_header_background_color.';}';

//Mobile Site CSS End 

$output .= '@media (max-width:1050px) {
.zolo_left_vertical_header .zolo_vertical_header_topbar,.zolo_left_vertical_header .zolo_footer_area,.zolo_left_vertical_header .zolo_main_content_area{margin-left:0px!important;}
.zolo_right_vertical_header .zolo_vertical_header_topbar,.zolo_right_vertical_header .zolo_footer_area,.zolo_right_vertical_header .zolo_main_content_area{margin-right:0px!important;}
}
@media (max-width:800px){
.hassidebar.double_sidebars .content-area{width:100%;padding:0;float:left;margin-left:0;}
.hassidebar.double_sidebars .sidebar_container_1{width:100%;margin-left:0;float:left;}
.hassidebar.double_sidebars .sidebar_container_2{width:100%;float:left;}
.hassidebar.right .content-area,.hassidebar.left .content-area,.hassidebar .content-area{width:100%; padding:0!important;}
.hassidebar .sidebar_container_1{width:100%;}
.hassidebar .sidebar_container_2{width:100%;} 
.hassidebar .sidebar{ padding-top:40px;}
body.single .post_title_area h2, .single_page_title{font-size:30px;line-height:36px;}
}
@media (max-width:767px){
.zolo-container{max-width:440px;}
}
@media (max-width:500px){
.zolo-container{max-width:330px;}
body.single .post_title_area h2, .single_page_title{font-size:20px;line-height:26px;}
}';

if(isset($writepress_data['custom_css'])){
		$output .= wp_strip_all_tags($writepress_data['custom_css']);
	}

wp_add_inline_style( 'zt-font-awesome.min', $output );



