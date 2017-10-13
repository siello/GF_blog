<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $writepress_data, $post;
$post_title_position = isset($writepress_data['post_title_position']) ? $writepress_data['post_title_position'] : 'above';
$post_title_alignment = isset($writepress_data['post_title_alignment']) ? $writepress_data['post_title_alignment'] : 'left';

$post_separator_show_hide = isset($writepress_data['post_separator_show_hide']) ? $writepress_data['post_separator_show_hide'] : 'hide';
$single_post_title_position = isset($writepress_data['single_post_title_position']) ? $writepress_data['single_post_title_position'] : 'title_position_middle';	

$panel_post_meta = get_post_meta( $post->ID , 'zt_post_meta', true );
$adminpanel_post_meta = isset($writepress_data["post_meta"]) ? $writepress_data["post_meta"] : 'on';

$featured_images_single = isset($writepress_data["featured_images_single"]) ? $writepress_data["featured_images_single"] : 'on';
$social_sharing_box = isset($writepress_data["social_sharing_box"]) ? $writepress_data["social_sharing_box"] : 'on';
$sharing_social_tagline = isset($writepress_data["sharing_social_tagline"]) ? $writepress_data["sharing_social_tagline"] : esc_html__( 'Share This Story, Choose Your Platform!', 'writepress' );
$related_posts = isset($writepress_data["related_posts"]) ? $writepress_data["related_posts"] : 'on';
$blog_comments = isset($writepress_data["blog_comments"]) ? $writepress_data["blog_comments"] : 'on';

$show_hide_sharing = get_post_meta($post->ID, 'zt_share_box', true );
$show_hide_related_posts = get_post_meta($post->ID, 'zt_related_posts', true);
$show_hide_post_comments = get_post_meta($post->ID, 'zt_post_comments', true );
$show_hide_post_pagination = get_post_meta($post->ID, 'zt_post_pagination', true );

$post_navigation_style = isset($writepress_data['post_navigation_style']) ? $writepress_data['post_navigation_style'] : 'style1';
$blog_pn_nav = isset($writepress_data["blog_pn_nav"]) ? $writepress_data["blog_pn_nav"] : 'on';

$show_hide_featured = get_post_meta($post->ID, 'zt_show_hide_featured', true ); 
$post_video = get_post_meta($post->ID, 'zt_video', true );

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 
			
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
		
if( writepress_number_of_featured_images() > 0 || $post_video ){
	$posthasno_thumb = 'posthas_thumb';
}else{
	$posthasno_thumb = 'posthas_no_thumb';
	}

