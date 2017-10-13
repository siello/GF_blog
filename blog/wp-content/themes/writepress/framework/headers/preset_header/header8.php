<?php 
include get_template_directory().'/framework/variables/variables-headers.php';
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area header_background zolo_preset_header8 <?php echo esc_attr($zolo_header_sticky);?>">
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
                    //Menu Bar Center
                    echo '<div class="header_center"><ul class="header_center_col">';
                    // Menu
                    writepress_preset_custom_top_header_main_menu();
                    echo '</ul></div>';
                    ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php 
        //header_sticky_opt Show/Hide
        if($header_sticky_opt == 'on'){ 
        echo ($header_sticky_display == 'section2_3' || $header_sticky_display == 'section2' || $header_sticky_display == 'section3') ? $header_sticky_wrapper_end : '' ?>
    <?php } ?>
  </div>
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
