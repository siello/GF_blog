<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


$this->select(
		array(
				'title'    => __('Layout', 'writepress-core'), 
				'subtitle' => esc_html__( 'Select boxed or wide layout.','writepress-core' ),
				'id'       => 'bg_layout',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'wide' => __('Wide', 'writepress-core'), 'boxed' => __('Boxed', 'writepress-core'), 'theater' => __('Theater', 'writepress-core')),
				
			)
	);
?>
<h3><?php _e('Following options only work in boxed mode:', 'writepress-core'); ?></h3>
<?php
$this->image_upload(
		array(
			'title'    => __('Background Image for Outer Area', 'writepress-core'), 
			'subtitle' => esc_html__( 'Select an image to use for the outer background.','writepress-core' ),
			'id'       => 'bg_img',
			'default'  => '',			
		)
	); 

$this->color(
		array(
			'title'    => __('Background Color', 'writepress-core'), 
			'subtitle' => esc_html__( 'Controls the background color for the outer background.','writepress-core' ),
			'id'       => 'bg_color',
			'default'  => '',
			
		)
	);

$this->select(
			array(
				'title'    => __('100% Background Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','writepress-core' ),
				'id'       => 'bg_img_100per',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'no' => __('No', 'writepress-core'), 'yes' => __('Yes', 'writepress-core')),
				
			)
	);

$this->select(
			array(
				'title'    => __('Background Repeat', 'writepress-core'), 
				'subtitle' => esc_html__( 'Select how the background image repeats.','writepress-core' ),
				'id'       => 'bg_repeat',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'repeat' => __('Repeat', 'writepress-core'), 'repeat-x' => __('Repeat-x', 'writepress-core'), 'repeat-y' => __('Repeat-y', 'writepress-core'), 'no-repeat' => __('No Repeat', 'writepress-core')),
				
			)
	);
?>
<h3><?php _e('Following options work in boxed and wide mode:', 'writepress-core'); ?></h3>
<?php 
$this->image_upload(
		array(
			'title'    => __('Background Image for Main Content Area', 'writepress-core'), 
			'subtitle' => esc_html__( 'Select an image to use for the main content area.','writepress-core' ),
			'id'       => 'wide_bg_img',
			'default'  => '',	
		)
	); 

$this->color(
		array(
				'title'    => __('Background Color', 'writepress-core'), 
				'subtitle' => esc_html__( 'Controls the background color for the main content area.','writepress-core' ),
				'id'       => 'wide_bg_color',
				'default'  => '',			
			)
	);

$this->select(
		array(
				'title'    => __('100% Background Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','writepress-core' ),
				'id'       => 'wide_bg_img_100per',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'no' => __('No', 'writepress-core'), 'yes' => __('Yes', 'writepress-core')),
			)
		);

$this->select(
		array(
			'title'    => __('Background Repeat', 'writepress-core'), 
			'subtitle' => esc_html__( 'Select how the background image repeats.','writepress-core' ),
			'id'       => 'wide_bg_repeat',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'writepress-core'), 'repeat' => __('Repeat', 'writepress-core'), 'repeat-x' => __('Repeat-x', 'writepress-core'), 'repeat-y' => __('Repeat-y', 'writepress-core'), 'no-repeat' => __('No Repeat', 'writepress-core')),
		)
		
	);


/* Omit closing PHP tag to avoid "Headers already sent" issues. */
