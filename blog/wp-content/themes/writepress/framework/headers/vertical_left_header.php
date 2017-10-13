<?php 
global $writepress_data; 
$top_search_design = $writepress_data["search_design"];
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area zolo_vertical_header"> 

    <!--Top Area Start-->
    <div class="zolo-container line-height0"></div>
    <!--Top Area End-->
      
    <header class="zolo_header vertical_fix_menu">
      <div class="zolo_vertical_header_box">
          <div class="vertical_headercontent_box header_element">
    <?php echo '<div class="header_left">';
			echo '<ul class="header_left_col">'; 
					// Header Logo
					writepress_header_logo();
					// Menu
					get_template_part('framework/headers/vertical_header_menu');
			
			echo '</ul>'; 
			echo '</div>';
	?>
    
          </div>
      </div>

	<div class="headerbackground"></div>
    
    </header>
  </div>
    
</div>
<?php //Mobile Header Code Header 
get_template_part('framework/headers/mobile_header');
?>
