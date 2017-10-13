<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->select(
		array(
			'title'    => __('Display Header', 'writepress-core'), 
			'subtitle' => esc_html__( 'Choose to show or hide the header.','writepress-core' ),
			'id'       => 'header_display',
			'default'  => 'yes',
			'options'  => array('yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
			
		)
	);

$this->select(
		array(
			'title'    => __('100% Header Width', 'writepress-core'), 
			'subtitle' => esc_html__( 'Choose to set header width to 100% of the browser width. Select "No" for site width.','writepress-core' ),
			'id'       => 'header_100_width',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
			
		)
	);
$this->text(
		array(
			'title'    => __('Header Left/Right Padding', 'writepress-core'), 
			'subtitle' => esc_html__( 'Controls the left/right padding for header when using 100% header width. Insert with px ex: 10px','writepress-core' ),
			'id'       => 'header_width_100per_padding',
			'default'  => '',
		),
		array(
			array(
			'field'      => 'header_100_width',
			'value'      => 'yes',
			'comparison' => '==',
			)
		)
	);

$this->image_upload(	
		array(
				'title'    => __('Background Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Select an image to use for the header background.','writepress-core' ),
				'id'       => 'header_bg_img',
				'default'  => '',
			)
		); 

$this->color(
		array(
			'title'    => __('Background Color', 'writepress-core'), 
			'subtitle' => esc_html__( 'Controls the background color of the header.','writepress-core' ),
			'id'       => 'header_bg_color',
			'default'  => '',
		)
	);

$this->select(
		array(
				'title'    => __('100% Background Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','writepress-core' ),
				'id'       => 'header_100per_bg',
				'default'  => 'no',
				'options'  => array('no' => __('No', 'writepress-core'), 'yes' => __('Yes', 'writepress-core')),
				
			)
	);

$this->select(
		array(
				'title'    => __('Background Repeat', 'writepress-core'), 
				'subtitle' => esc_html__( 'Select how the background image repeats.','writepress-core' ),
				'id'       => 'header_bg_repeat',
				'default'  => 'default',
				'options'  => array('repeat' => __('Repeat', 'writepress-core'), 'repeat-x' => __('Repeat-x', 'writepress-core'), 'repeat-y' => __('Repeat-y', 'writepress-core'), 'no-repeat' => __('No Repeat', 'writepress-core')),
				
			)
	);

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
