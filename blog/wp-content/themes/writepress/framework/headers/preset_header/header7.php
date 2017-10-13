<?php 
include get_template_directory().'/framework/variables/variables-headers.php';

$header_main_menu = $writepress_data["main_menu_design"];

	if($header_main_menu == 'menu1'){
		
		$menu_design_name = 'menu_hover_design_none';	
		$menu_hover_styles = '';
		
	}elseif($header_main_menu == 'menu2'){  
		
		$menu_design_name = 'menu_hover_design2';
		$menu_hover_styles = '';
	
	}elseif($header_main_menu == 'menu3'){  
	
		$menu_design_name = 'menu_hover_design3';
		$menu_hover_styles = '';
		
	}elseif($header_main_menu == 'menu4'){  
	
		$menu_design_name = 'menu_hover_design4';
		$menu_hover_styles = '';
		
	}elseif($header_main_menu == 'menu4'){  
		
		$menu_design_name = 'menu_hover_design4';
		$menu_hover_styles = '';
		
	}elseif($header_main_menu == 'menu_hover_style1'){  
	
		$menu_design_name = 'menu_hover_design_none';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style1';
		
	}elseif($header_main_menu == 'menu_hover_style2'){  
	
		$menu_design_name = 'menu_hover_design_none';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style2';
	
	}elseif($header_main_menu == 'menu_hover_style3'){  
		
		$menu_design_name = 'menu_hover_design_none';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style3';
		
	}elseif($header_main_menu == 'menu_hover_style4'){  
		
		$menu_design_name = 'menu_hover_design_none';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style4';
	
	}else{
		$menu_design_name = '';
		$menu_hover_styles = ''; 
	} 
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area header_background zolo_preset_header7 <?php echo esc_attr($zolo_header_sticky);?>">
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
	echo '<div class="header_left"><ul class="header_left_col">'; ?>
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
		
		// Extended Manu Option		
				echo '<li class="zolo-small-menu"><span class="'.esc_attr($writepress_data["menu_action_change"]).'" ><span class="zolo_small_bars"></span></span>';
				if($writepress_data["menu_action_change"] == 'vertical_menu' || $writepress_data["menu_action_change"] == 'horizontal_menu'){?>
              <div class="<?php echo esc_attr($writepress_data["menu_action_change"]).'_area';?>">
                <div class="menu-main-container-box zolo-navigation">
                  <?php	
                            wp_nav_menu(  
									array(  
									'theme_location'  => 'primary-nav', 
									'container'       => false, 			        
									'container_id'    => 'main-nav',  
									'container_class' => '',  
									'menu_class' => 'nav zolo-navbar-nav',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'menu_id'         => 'primary_menu' ,
									'depth'  			=> 1,
									'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
									'walker' 			=> new ZOLOCoreFrontendWalker()
									)
								);  
                            ?>
                </div>
              </div>
              <?php }
		echo '</li>';
	echo '</ul></div>'; 
	?>
              <!--Expanded Search Content Start-->
		<?php 
		if($top_search_design == 'expanded_search_but'){
			echo '<div class="zolo_navbar_search expanded_search_but"><div class="nav_search_form_area">';
			echo '<span id="nav_expanded_search_but" class="nav_search-icon expanded_close_button"></span>';
			get_search_form();
			echo '</div></div>';
		}
		?>
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
    <?php 
	// Mobile Menu active
	writepress_mobile_menu(true);?>
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
