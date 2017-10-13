<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->select(
		array(
			'title'    => __('Display Footer Widget Area', 'writepress-core'), 
			'subtitle' => esc_html__( 'Choose to show or hide the footer.','writepress-core' ),
			'id'       => 'display_footer',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
			
		)
	);

$this->select(
		array(
				'title'    => __('Display Copyright Area', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to show or hide the copyright area.','writepress-core' ),
				'id'       => 'display_copyright',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
				
			)
	);

$this->select(
		array(
				'title'    => __('100% Footer Width', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to set footer width to 100% of the browser width. Select "No" for site width.','writepress-core' ),
				'id'       => 'footer_100per_width',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
				
			)
	);

$this->select(
		array(
				'title'    => __('100% Layout for Widget Area Above Footer', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to set Above Footer Widget Area width to 100% of the browser width. Select "No" for site width.','writepress-core' ),
				'id'       => 'footer_100per_width_upper',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
				
			)
	);

$this->select(
		array(
				'title'    => __('100% Layout for Widget Area Below Footer', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to set below footer Widget Area width to 100% of the browser width. Select "No" for site width.','writepress-core' ),
				'id'       => 'footer_100per_width_lower',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Yes', 'writepress-core'), 'no' => __('No', 'writepress-core')),
				
			)
	);


/* Omit closing PHP tag to avoid "Headers already sent" issues. */
