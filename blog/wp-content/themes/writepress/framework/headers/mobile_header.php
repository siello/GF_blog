<?php 
include get_template_directory().'/framework/variables/variables-headers.php';
?>
<!--Header Start-->

<div class="mobile_header_area <?php echo esc_attr($mobile_menu_design.'_mobile_menu');?>">
  <div class="zolo-header-area header_background"> 
    
    <!--Top Area Start-->
    <?php if($mobile_header_top_bar_show_hide == 'on'){
		get_template_part('framework/headers/header_section_one');
		}?>
    
    <!--Top Area End-->
    <?php if($mobile_menu_design == 'compact'){ ?>
    <header class="zolo_header">
      <div class="headercontent">
        <div class="headercontent_box"> 
          <!-- Logo Area Start -->
		<?php 
		if($mobile_header_logo_showhide == 'on'){        
			echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">'; 
			echo '<img src="'.esc_url($writepress_data['mobile_logo']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';
			if($writepress_data['retina_mobile_logo']['url'] !== ''){ 
				echo '<img src="'.esc_url($writepress_data["retina_mobile_logo"]['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="retina_logo" />';
			}
			echo '</a></div>';
		}else{
			if($logo_url !== ''){
				echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">';
				echo '<img src="'.esc_url($logo_url).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';
				if($writepress_data['logo_retina']['url'] !== ''){
					echo '<img src="'.esc_url($writepress_data["logo_retina"]['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="retina_logo" />';
				}
				echo '</a></div>';
			}else{
				echo '<div class="logo_text"><a href="'.esc_url(home_url('/')).'">';
				echo '<p>'.esc_attr( get_bloginfo( 'name' ) ).'</p>';
				echo '</a></div>';
			} 
		}
        ?>
          <!-- Logo Area End --> 
        </div>
        
        <!-- Navigation Area Start -->
        
        <div class="zolo_mobile_navigation_area"> 
          <!--Menu bar Icon Start-->
          <ul class="mob_nav_icons">
            <?php
            //woocommerce Cart Icon
            writepress_mobile_woocommerce();
            
			if($multilingual_show_hide == 'on'){
				if( defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE') ) { 
					echo '<li class="zolo-language_li"><div class="zolo-language">';
					do_action('wpml_add_language_selector');  
					echo '</div></li>';
				}
            } 
			
			?>
            <li class="zolo-search_li">
              <div class="zolo_navbar_search <?php esc_attr($top_search_design);?>"> <a id="mob_full_screen_search_but" class="nav_search-icon"></a> </div>
            </li>
          </ul>
          
          <!--Menu bar Icon End--> 
          
          <!--Menu area Start--> 
          
          <span id="nav_toggle" class="zolo_mobile_menu_icon full_screen_menu_open_responsive"><span class="nav_bar nav_bar_1st"></span><span class="nav_bar nav_bar_2nd"></span><span class="nav_bar nav_bar_3rd"></span></span> 
          
          <!--Menu area End--> 
          
        </div>
        
        <!-- Navigation Area End --> 
        
      </div>
    </header>
    <?php }else{?>
    <header class="zolo_header">
      <div class="headercontent">
        <div class="headercontent_box"> 
          
          <!-- Logo Area Start -->
          <?php if($logo_url !== ''){
				echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">'; ?>
          <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo" />
          <?php			 
				if($writepress_data['logo_retina']['url'] !== ''){ ?>
          <img src="<?php echo esc_url($writepress_data["logo_retina"]['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="retina_logo" />
          <?php
				}
				echo '</a></div>';
			}else{
				?>
          <div class="logo_text"><a href="<?php echo esc_url(home_url('/')); ?>">
            <p>
              <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
            </p>
            </a></div>
          <?php 
			}?>
          <!-- Logo Area End --> 
          
          <!--Menu bar Icon Start-->
          <div class="mob_nav_icon_area"> <span id="nav_toggle" class="zolo_mobile_menu_icon"><span class="nav_bar nav_bar_1st"></span><span class="nav_bar nav_bar_2nd"></span><span class="nav_bar nav_bar_3rd"></span></span>
            <ul class="mob_nav_icons">
              <?php
                //woocommerce Cart Icon
                writepress_mobile_woocommerce();
				
				if($writepress_data["multilingual_show_hide"] == 'on'){
					if( defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE') ) { 
						echo '<li class="zolo-language_li"><div class="zolo-language">';
						do_action('wpml_add_language_selector');  
						echo '</div></li>';
					}
				} ?>
              <li class="zolo-search_li">
                <div class="zolo_navbar_search <?php esc_attr($top_search_design);?>"> <span id="mob_full_screen_search_but" class="nav_search-icon"></span> </div>
              </li>
            </ul>
          </div>
          <!--Menu bar Icon End--> 
          
        </div>
      </div>
    </header>
    <?php } ?>
  </div>
  <?php if($mobile_menu_design == 'compact'){ ?>
  <div class="zolo_mobile_navigation_area zolo_mobile_navigation_menu">
    <div class="mobile-nav">
      <div class="mobile-nav-holder main-menu"></div>
    </div>
  </div>
  <?php }else{?>
  <div class="zolo_mobile_navigation_area">
    <div class="mobile-nav">
      <div class="mobile-nav-holder main-menu"></div>
    </div>
  </div>
  <?php } ?>
  <div class="search_overlay"> <span id="mob_search_close_but"><?php echo __('Close','writepress');?></span>
    <div class="content_div full_screen_search">
      <?php get_search_form(); ?>
    </div>
  </div>
</div>
