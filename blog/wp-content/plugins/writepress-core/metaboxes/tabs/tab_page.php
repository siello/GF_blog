<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
$screen = get_current_screen();
if ( 'page' == $screen->post_type ) {
	$this->select(
			array(
					'title'    => __('Featured Image', 'writepress-core'), 
					'subtitle' => esc_html__('Show / Hide featured images and videos on single page.', 'writepress-core'),
					'id'       => 'show_hide_featured',
					'default'  => 'show',
					'options'  => array('show' => __('Show', 'writepress-core'),'hide' => __('Hide', 'writepress-core') ),				
				)
		);
	
	$this->select(
			array(
					'title'    => __('Use 100% Width Page', 'writepress-core'), 
					'subtitle' => esc_html__('Choose to set this post to 100% browser width.', 'writepress-core'),
					'id'       => 'post_width_100',
					'default'  => 'default',
					'options'  => array('no' => __('No', 'writepress-core'),'yes' => __('Yes', 'writepress-core')),				
				)
		);
	
	$this->textarea(
			array(
					'title'    => __('Video Embed Code', 'writepress-core'), 
					'subtitle' => esc_html__( 'Insert Youtube or Vimeo embed code.','writepress-core' ),
					'id'       => 'video',
					'default'  => '',
			)
		);
}
$this->text(
		array(
				'title'    => __('Page Content Top Padding', 'writepress-core'), 
				'subtitle' => esc_html__( 'Insert with px ex: 10px. Leave empty for default value.','writepress-core' ),
				'id'       => 'content_top_pad',
				'default'  => '',
				
		)
	);

$this->text(
		array(
				'title'    => __('Page Content Bottom Padding', 'writepress-core'), 
				'subtitle' => esc_html__( 'Insert with px ex: 10px. Leave empty for default value.','writepress-core' ),
				'id'       => 'content_bottom_pad',
				'default'  => '',
				
		)
	);

$this->text(
		array(
				'title'    => __('100% Width Left/Right Padding', 'writepress-core'), 
				'subtitle' => esc_html__( 'This option controls the left/right padding for page content when using 100% site width or 100% width page template. Insert with px ex: 10px','writepress-core' ),
				'id'       => 'content_left_right_pad',
				'default'  => '',
				
		)
	);

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
