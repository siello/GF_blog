<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site_layout">
<?php
global $writepress_data; 
if(isset($writepress_data['extended_sidebar_position'])){	?>
<div class="extended_sidebar_box <?php echo esc_attr('extended_sidebar_position_'.$writepress_data['extended_sidebar_position']);?>">
<div class="extended_sidebar_mask"></div>
<?php } ?>
<?php 
$body_preloader = isset($writepress_data["body_preloader"]) ? $writepress_data["body_preloader"] : 'off';
?>
<!-- Preloader -->
<?php if($body_preloader == 'on'): ?>
<div id="mask">
  <div id="loader">
    <?php if($writepress_data['preloader_logo']['url']){ ?>
    	<span class="preloader_logo"><img src="<?php echo esc_url($writepress_data['preloader_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></span>
    <?php } 
  	if($writepress_data['preloader_icon']['url']){ ?>
    	<span class="preloader_icon"><img src="<?php echo esc_url($writepress_data['preloader_icon']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></span>
    <?php } ?>
  </div>
</div>
<?php endif; ?>
<?php //Site Layout (Div close in Footer File)?>
<div class="layout_design">

<!-- Home Page Section Start -->
<?php //call header
writepress_header();
?>

<!--zolo_main_content_area Start-->
<div class="zolo_main_content_area">
<!--zolo_content_bg_area Start-->
<div class="zolo_content_bg_area">
<?php //page title bar	
	$c_pageID = writepress_current_page_id();
	writepress_current_page_title_bar( $c_pageID );
?>