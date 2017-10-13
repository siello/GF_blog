<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->select(
		array(
			'title'    => __('Page Title Bar', 'writepress-core'), 
			'subtitle' => esc_html__( 'Choose to show or hide the page title bar.','writepress-core' ),
			'id'       => 'titlebar_show_hide',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'writepress-core'),'hide' => __('Hide', 'writepress-core'), 'show' => __('Show', 'writepress-core')),
			
		)
	);
					
					
// Dependency check that page title bar not hidden.
$page_title_dependency = array(
	array(
		'field'      => 'titlebar_show_hide',
		'value'      => 'hide',
		'comparison' => '!=',
	),
);

$this->select(
		array(
			'title'    => __('Page Title Bar Text Alignment', 'writepress-core'), 
			'subtitle' => esc_html__( 'Choose the title and subhead text alignment','writepress-core' ),
			'id'       => 'titlebar_text_alignment',
			'default'  => 'Default',
			'options'  => array('Default' => __('Default', 'writepress-core'), 'Left' => __('Left', 'writepress-core'), 'Center' => __('Center', 'writepress-core'), 'Right' => __('Right', 'writepress-core')),
			
		),
		$page_title_dependency
	);

$this->text(
		array(
			'title'    => __('Page Title Bar Text Size', 'writepress-core'), 
			'subtitle' => esc_html__( 'Insert without px','writepress-core' ),
			'id'       => 'title_text_size',
			'default'  => '',			
		),
		$page_title_dependency
	);

$this->color(
		array(
			'title'    => __('Page Title Font Color', 'writepress-core'), 
			'subtitle' => esc_html__( 'Controls the text color of the page title fonts.','writepress-core' ),
			'id'       => 'title_text_color',
			'default'  => '',			
		),
		$page_title_dependency					
	);

$this->text(
		array(
			'title'    => __('Page Title Bar Height', 'writepress-core'), 
			'subtitle' => esc_html__( 'Set the height of the page title bar. Insert without px ex: 10.','writepress-core' ),
			'id'       => 'titlebar_height',
			'default'  => '',			
		),
		$page_title_dependency
	);

$this->select(
		array(
				'title'    => __('Page Title Bar Background Position', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose the title bar Background Position','writepress-core' ),
				'id'       => 'titlebar_bg_position',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'below' => __('Below', 'writepress-core'), 'from_top' => __('From Top', 'writepress-core')),
				
			),
			$page_title_dependency
	);
	
$this->color(
		array(
			'title'    => __('Page Title Bar Background Color', 'writepress-core'), 
			'subtitle' => esc_html__( 'Controls the background color of the page title bar.','writepress-core' ),
			'id'       => 'titlebar_bg_color',
			'default'  => '',			
		),
		$page_title_dependency
	);

$this->image_upload(
		array(
			'title'    => __('Page Title Bar Background Image', 'writepress-core'), 
			'subtitle' => esc_html__( 'Select an image to use for the page title bar background.','writepress-core' ),
			'id'       => 'titlebar_bg_img',
			'default'  => '',			
		),
		$page_title_dependency
	); 

$this->select(
		array(
				'title'    => __('100% Background Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','writepress-core' ),
				'id'       => 'titlebar_bg_img_100per',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'No' => __('No', 'writepress-core'), 'Yes' => __('Yes', 'writepress-core')),
				
			),
			$page_title_dependency
	);

$this->select(
		array(
				'title'    => __('Parallax Background Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose a parallax scrolling effect for the background image.','writepress-core' ),
				'id'       => 'titlebar_parallax_bg',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'No' => __('No', 'writepress-core'), 'Yes' => __('Yes', 'writepress-core')),
				
			),
			$page_title_dependency
	);
		

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
