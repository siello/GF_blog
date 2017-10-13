<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $writepress_data, $post;

$cur_id = writepress_current_page_id();

$blog_layout_column_class = '';
$blog_archive_layout = isset($writepress_data["blog_archive_layout"]) ? $writepress_data["blog_archive_layout"] : 'masonry';
$blog_grid_columns = isset($writepress_data["blog_grid_columns"]) ? $writepress_data["blog_grid_columns"] : '2';
$post_title_position = isset($writepress_data['post_title_position']) ? $writepress_data['post_title_position'] : 'above';
$post_title_alignment = isset($writepress_data['post_title_alignment']) ? $writepress_data['post_title_alignment'] : 'left';
$post_separator_show_hide = isset($writepress_data['post_separator_show_hide']) ? $writepress_data['post_separator_show_hide'] : 'hide';
$blog_post_design = isset($writepress_data['blog_post_design']) ? $writepress_data['blog_post_design'] : 'none';
$post_social_sharing_show_hide = isset($writepress_data["post_social_sharing_show_hide"]) ? $writepress_data["post_social_sharing_show_hide"] : 'show';	
	
//Blog Archive Layout Class
//Blog Archive Layout Masonry Class
//Blog Archive Layout Thumbnail Size
if($blog_archive_layout == 'small'){	
	$blog_layout_masonry_class = 'blog_layout_small fitrow_row';
	$blog_archive_layout_thumb = 'writepress_thumb_blog_medium';	
}elseif($blog_archive_layout == 'medium'){	
	$blog_layout_masonry_class = 'blog_layout_medium fitrow_row';
	$blog_archive_layout_thumb = 'writepress_thumb_blog_medium';	
}elseif($blog_archive_layout == 'large'){	
	$blog_layout_masonry_class = 'blog_layout_large fitrow_row';
	$blog_archive_layout_thumb = 'writepress_thumb_blog_large';	
}elseif($blog_archive_layout == 'grid'){	
	$blog_layout_masonry_class = 'blog_layout_grid fitrow_row';
	$blog_archive_layout_thumb = 'writepress_thumb_blog_medium';	
}elseif($blog_archive_layout == 'masonry'){	
	$blog_layout_masonry_class = 'blog_layout_masonry';	
	$blog_archive_layout_thumb = 'full';	
}
//Blog Layout Columns Class
if($blog_archive_layout == 'grid' || $blog_archive_layout == 'masonry'){	
	if($blog_grid_columns == '2'){
		$blog_layout_column_class = 'blog_column_2';		
	}elseif($blog_grid_columns == '3'){
		$blog_layout_column_class = 'blog_column_3';		
	}elseif($blog_grid_columns == '4'){
		$blog_layout_column_class = 'blog_column_4';		
	}elseif($blog_grid_columns == '5'){
		$blog_layout_column_class = 'blog_column_5';		
	}elseif($blog_grid_columns == '6'){
		$blog_layout_column_class = 'blog_column_6';
	}	
}	

//Masonry
if($blog_archive_layout == 'masonry'){
	$masonry_item = 'masonry-item';
}else{
	$masonry_item = 'fitrow_columns';
}