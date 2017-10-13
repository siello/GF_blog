<?php 
include get_template_directory().'/framework/variables/variables-headers.php';
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area header_background zolo_preset_header3 <?php echo esc_attr($zolo_header_sticky);?>"> 
    
    <!--Top Area Start-->
    <div class="zolo-topbar">
      <div class="headertopcontent_box">
        <div class="zolo-container">
          <div class="header_element header_section_one">
            <?php			
        //Topbar Right
		echo '<div class="header_center"><ul class="header_center_col">'; 
			// Top Menu
			echo  '<li class="zolo-top-menu">';
			writepress_preset_custom_top_header_main_menu();
			echo '</li>';	
        echo '</ul></div>';  
        ?>
          </div>
        </div>
      </div>
    </div>
    <!--Top Area End-->
    
    <?php 
	//header_sticky_opt Show/Hide
		if($header_sticky_opt == 'on'){ 
		echo $header_sticky_display == 'section2_3' || $header_sticky_display == 'section2' || $header_sticky_display == 'section3' ? $header_sticky_wrapper_start : '' ?>
    <?php } ?>
    <header class="zolo_header">
      <div class="headercontent">
        <div class="headercontent_box">
          <div class="zolo-container">
            <div class="header_element header_section_two">
              <?php	
	//Menu Bar Left
	echo '<div class="header_left"><ul class="header_left_col">'; 
	
		get_template_part('framework/social_icons');
	
	echo '</ul></div>'; 

//Menu Bar Center
	echo '<div class="header_center"><ul class="header_center_col">'; ?>
              <?php
	// Header Logo
	 writepress_header_logo(); ?>
              <?php echo '</ul></div>';
	
//Menu Bar Right
	echo '<div class="header_right"><ul class="header_right_col">'; 

		// Cart icon
		if ( class_exists( 'WooCommerce' ) ) {				
			echo '<li class="shopping_cart"><div class="shopping-cart-wrapper">'.zolo_tiny_cart().'</div></li>';	
		}
	// Multilingual
	if($writepress_data["multilingual_show_hide"] == 'on'){ 
			if( defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE') ) { 
				echo '<li class="zolo-language">';
				do_action('wpml_add_language_selector');  
				echo '</li>';
			}
		}
		// Header Search
		echo '<li class="zolo-search-menu"><div class="zolo_navbar_search '.esc_attr($top_search_design).'"><span class="nav_'.esc_attr($top_search_design).' nav_search-icon"></span>';
		if($top_search_design == 'default_search_but'){
			echo '<div class="nav_search_form_area">';
			get_search_form();
			echo '</div>';
		}
		echo '</div></li>';
		// Extended Sidebar Option		
			echo '<li class="zolo_extended_sidebar"><span class="extended_sidebar_button" ><span class="zolo_small_bars"></span></span></li>';	
			
	
			
	echo '</ul></div>'; 
?> 
              <!--Expanded Search Content Start-->
              <?php 
if($top_search_design == 'expanded_search_but'){
	echo '<div class="zolo_navbar_search expanded_search_but"><div class="nav_search_form_area">';
	echo '<span id="nav_expanded_search_but" class="nav_search-icon expanded_close_button"></span>';
	get_search_form();
	echo '</div></div>';
}?>
              <!--Expanded Search Content End--> 
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php 
        //header_sticky_opt Show/Hide
        if($header_sticky_opt == 'on'){ 
        echo $header_sticky_display == 'section2_3' || $header_sticky_display == 'section2' || $header_sticky_display == 'section3' ? $header_sticky_wrapper_end : '' ?>
    <?php } ?>
  </div>
  <?php get_template_part('framework/headers/extended_sidebar'); ?>
  <!--Full Screen Search Content Start-->
  <?php if($top_search_design == 'full_screen_search_but'){?>
  <div class="search_overlay"> <span class="search_close_but">
    <?php __( 'Close', 'writepress' ); ?>
    </span>
    <div class="content_div full_screen_search">
      <div class="zolo-container">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
  <?php }?>
  <!--Full Screen Search Content End--> 
</div>
<?php 
//Mobile Header Code Header 
get_template_part('framework/headers/mobile_header');
?>
