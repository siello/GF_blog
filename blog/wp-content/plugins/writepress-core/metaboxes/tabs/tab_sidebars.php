<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
$this->select(
		array(
			'title'    => __('Sidebar Position', 'writepress-core'), 
			'subtitle' => esc_html__( 'Select the sidebar position.','writepress-core' ),
			'id'       => 'sidebar_position',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'writepress-core'), 'none' => __('None', 'writepress-core'), 'right' => __('Right', 'writepress-core'), 'left' => __('Left', 'writepress-core'), 'both' => __('Both', 'writepress-core') ),
		)
	);
global $wp_registered_sidebars;
$sidebar_options[''] = 'None';

	$sidebars = $wp_registered_sidebars;
	if(is_array($sidebars) && !empty($sidebars)){
		foreach($sidebars as $sidebar){
			$sidebar_options[$sidebar['name']] = $sidebar['name'];
		}
	}
		
			
$this->select(
		array(
			'title'    => __('Left Sidebar', 'writepress-core'), 
			'subtitle' => esc_html__( 'Select the left sidebar position.','writepress-core' ),
			'id'       => 'sidebar_left_position',
			'default'  => 'default',
			'options'  => $sidebar_options ,
		),
		array(
			array(
				'field'      => 'sidebar_position',
				'value'      => 'default',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'none',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'right',
				'comparison' => '!=',
				),		
			)
	);
$this->select(
		array(
				'title'    => __('Right Sidebar', 'writepress-core'), 
				'subtitle' => esc_html__( 'Select the right sidebar position.','writepress-core' ),
				'id'       => 'sidebar_right_position',
				'default'  => 'default',
				'options'  => $sidebar_options ,
			),
		array(
			array(
				'field'      => 'sidebar_position',
				'value'      => 'default',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'none',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'left',
				'comparison' => '!=',
			),		
		)
	);						

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
