<?php get_header(); 
global $writepress_data;
$page_single_post_layout = get_post_meta( $post->ID , 'zt_single_post_layout_style', true );
$admin_single_post_layout_style = isset($writepress_data['single_post_layout_style']) ? $writepress_data['single_post_layout_style'] : 'layout_style1';

if($page_single_post_layout == 'default' || $page_single_post_layout == ''){
	$single_single_post_layout_value = $admin_single_post_layout_style;
}else{
	$single_single_post_layout_value = $page_single_post_layout;
}
 
if($single_single_post_layout_value == 'layout_style1'){
	
	get_template_part( 'post_layout/'.$single_single_post_layout_value);
	
}else if($single_single_post_layout_value == 'layout_style2'){

	get_template_part( 'post_layout/'.$single_single_post_layout_value);

}else if($single_single_post_layout_value == 'layout_style3'){
	
	get_template_part( 'post_layout/'.$single_single_post_layout_value);
	
}else if($single_single_post_layout_value == 'layout_style4'){

	get_template_part( 'post_layout/'.$single_single_post_layout_value);
	
}else if($single_single_post_layout_value == 'layout_style5'){

	get_template_part( 'post_layout/'.$single_single_post_layout_value);

}else if($single_single_post_layout_value == 'layout_style6'){

	get_template_part( 'post_layout/'.$single_single_post_layout_value);

}

get_footer(); ?>
