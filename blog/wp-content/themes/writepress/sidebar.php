<?php 
global $writepress_data;

$cur_id = writepress_current_page_id();

$page_sidebar_position = get_post_meta( $cur_id , 'zt_sidebar_position', true );	
$page_left_sidebar = get_post_meta( $cur_id , 'zt_sidebar_left_position', true );	
$page_right_sidebar = get_post_meta( $cur_id , 'zt_sidebar_right_position', true );

$admin_page_sidebar_position = isset($writepress_data["page_sidebar_position"]) ? $writepress_data["page_sidebar_position"] : 'left';
$admin_page_left_sidebar = isset($writepress_data["page_left_sidebar"]) ? $writepress_data["page_left_sidebar"] : 'sidebar';
$admin_page_right_sidebar = isset($writepress_data["page_right_sidebar"]) ? $writepress_data["page_right_sidebar"] : '';

$blogposts_sidebar_position = isset($writepress_data["blogposts_sidebar_position"]) ? $writepress_data["blogposts_sidebar_position"] : 'left';
$blogposts_left_sidebar = isset($writepress_data["blogposts_left_sidebar"]) ? $writepress_data["blogposts_left_sidebar"] : 'sidebar';
$blogposts_right_sidebar = isset($writepress_data["blogposts_right_sidebar"]) ? $writepress_data["blogposts_right_sidebar"] : '';

 if ((is_front_page() && is_home())) {	
	 if($blogposts_sidebar_position != 'none'){
				if($blogposts_sidebar_position == 'left' || $blogposts_sidebar_position == 'both'){
					echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">'; 
					if(function_exists('generated_dynamic_sidebar')){
						generated_dynamic_sidebar($blogposts_left_sidebar); 
					}else{
						dynamic_sidebar( $blogposts_left_sidebar );
						}
					echo '</div></div>';	
				}
				if($blogposts_sidebar_position == 'right' || $blogposts_sidebar_position == 'both'){
					echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
					if(function_exists('generated_dynamic_sidebar')){
						generated_dynamic_sidebar($blogposts_right_sidebar ); 				
					}
					echo '</div></div>';
				}
			}
	
	
 }elseif ( is_home() ) {
  if($page_sidebar_position=='default' || $page_sidebar_position=='none' || $page_sidebar_position==''){
		if($page_sidebar_position!='none'){
			if($blogposts_sidebar_position != 'none'){
				if($blogposts_sidebar_position == 'left' || $blogposts_sidebar_position == 'both'){
					echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
					if(function_exists('generated_dynamic_sidebar')){
						generated_dynamic_sidebar($blogposts_left_sidebar );
					}else{
						dynamic_sidebar( $blogposts_left_sidebar );
						}
					echo '</div></div>';
				}
				if($blogposts_sidebar_position == 'right' || $blogposts_sidebar_position == 'both'){				
					echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
					if(function_exists('generated_dynamic_sidebar')){
						generated_dynamic_sidebar($blogposts_right_sidebar ); 	
					}
					echo '</div></div>';
				}
			}
		}		
	  }else{
		  	
			if(($page_sidebar_position == 'left' || $page_sidebar_position == 'both')){ 
				echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
				if(function_exists('generated_dynamic_sidebar')){
					generated_dynamic_sidebar($page_left_sidebar ); 
				}else{
					dynamic_sidebar( $page_left_sidebar );
					}
				echo '</div></div>';
			}
			if($page_sidebar_position == 'right' || $page_sidebar_position == 'both'){	
				echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
				if(function_exists('generated_dynamic_sidebar')){
					generated_dynamic_sidebar($page_right_sidebar ); 
				}
				echo '</div></div>';	
			}
		  }
 	}

 ?>
    
    
 
 
 