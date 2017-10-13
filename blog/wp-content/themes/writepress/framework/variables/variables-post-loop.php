<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $writepress_data, $post;

// Featured Image
$image_rollover_icons_show_hide = get_post_meta( $post->ID, 'zt_image_rollover_icons_show_hide', true );	


$panel_post_meta = get_post_meta( $post->ID , 'zt_post_meta', true );
$show_hide_sharing = get_post_meta($post->ID, 'zt_share_box', true );
$show_hide_related_posts = get_post_meta($post->ID, 'zt_related_posts', true);
$show_hide_post_comments = get_post_meta($post->ID, 'zt_post_comments', true );
$show_hide_post_pagination = get_post_meta($post->ID, 'zt_post_pagination', true );
$show_hide_featured = get_post_meta($post->ID, 'zt_show_hide_featured', true ); 
$post_video = get_post_meta($post->ID, 'zt_video', true );


$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 

$panel_post_meta = get_post_meta( $post->ID , 'zt_post_meta', true );
$adminpanel_post_meta = isset($writepress_data["post_meta"]) ? $writepress_data["post_meta"] : 'on';


// Post Meta
if($panel_post_meta == 'default'){			
	if($adminpanel_post_meta == 'on'){
			$post_meta = true;
		}else{
			$post_meta = false;
		}
			  
}elseif($panel_post_meta == 'yes' || $panel_post_meta == 'no'){
	 if($panel_post_meta == 'yes'){
			$post_meta = true;
		 }else{
			 $post_meta = false;
			 }
	}else{
			$post_meta = true;
		}	
		
$post_video = get_post_meta( $post->ID, 'zt_video', true );	

if( writepress_number_of_featured_images() > 0 || $post_video ){
	$posthasno_thumb = 'posthas_thumb';
}else{
	$posthasno_thumb = 'posthas_no_thumb';
	}