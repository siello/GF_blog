<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

    $this->image_buttonset(
        array(
            'title'    => __('Post Layout', 'writepress-core'), 
            'subtitle' => esc_html__( 'Select post layout','writepress-core' ),
            'id'       => 'single_post_layout_style',
            'default'  => 'default',
            'options'  => array(
                    'default'	=> array(
					'alt'   => 'default', 
					'img'   => get_template_directory_uri().'/assets/images/default.jpg',
					), 
					'layout_style1'	=> array(
					'alt'   => 'layout_style1', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout1.jpg',
					),      	
					'layout_style2'	=> array(
					'alt'   => 'layout_style2', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout2.jpg',
					),						
					'layout_style3'	=> array(
					'alt'   => 'layout_style3', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout3.jpg',
					),
					'layout_style4'	=> array(
					'alt'   => 'layout_style4', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout4.jpg',
					),
					'layout_style5'	=> array(
					'alt'   => 'layout_style5', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout5.jpg',
					),
					'layout_style6'	=> array(
					'alt'   => 'layout_style6',
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout6.jpg',
					),
            ),
        )
    );            
    $this->text(
		array(
			'title'    => __('Single Post Content Max Width', 'writepress-core'), 
			'subtitle' => esc_html__( 'Insert with px ex: 900px. Leave empty for default value.','writepress-core' ),
			'id'       => 'single_post_layout_width',
			'default'  => '',
		)
	);
    $this->select(
		array(
				'title'    => __('Featured Image', 'writepress-core'), 
				'subtitle' => esc_html__( 'Show / Hide featured images and videos on single post pages.','writepress-core' ),
				'id'       => 'show_hide_featured',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'),'hide' => __('Hide', 'writepress-core'), 'show' => __('Show', 'writepress-core')),
			)
		);
    
    $this->radio_buttonset(
		array(
				'title'    => __('Use 100% Width Page', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to set this post to 100% browser width.','writepress-core' ),
				'id'       => 'post_width_100',
				'default'  => 'default',
				'options'  => array('default' => __( 'Default', 'writepress-core' ),'no' => __( 'No', 'writepress-core' ),'yes' => __( 'Yes', 'writepress-core' )),
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
    
    $this->select(
			array(
				'title'    => __('Image Rollover Icons', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose Icons Show/Hide on this post.','writepress-core' ),
				'id'       => 'image_rollover_icons_show_hide',
				'default'  => 'default',
				'options'  => array('show' => __('Show', 'writepress-core'), 'hide' => __('Hide', 'writepress-core')),
			)
	);
    
    $this->select(
				array(
				'title'    => __('Show Related Posts', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to show or hide related posts on this post.','writepress-core' ),
				'id'       => 'related_posts',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Show', 'writepress-core'), 'no' => __('Hide', 'writepress-core')),
			)
		);
    
    $this->select(
		array(
				'title'    => __('Show Social Share Box', 'writepress-core'), 
				'subtitle' => esc_html__( 'Choose to show or hide the social share box.','writepress-core' ),
				'id'       => 'share_box',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Show', 'writepress-core'), 'no' => __('Hide', 'writepress-core')),
			)
		);
    
    $this->select(
		array(
				'title'    => __('Show Previous/Next Pagination', 'writepress-core'), 
				'subtitle' => esc_html__('Choose to show or hide the post navigation', 'writepress-core'),
				'id'       => 'post_pagination',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Show', 'writepress-core'), 'no' => __('Hide', 'writepress-core')),				
			)
		);
    $this->radio_buttonset(
		array(
				'title'    => __('Navigation Style', 'writepress-core'), 
				'subtitle' => esc_html__( 'Controls the Navigation style.','writepress-core' ),
				'id'       => 'navigation_style',
				'default'  => 'style1',
				'options'  => array('style1' => __( 'Style 1', 'writepress-core' ),'style2' => __( 'Style 2', 'writepress-core' ),'style3' => __( 'Style 3', 'writepress-core' ),'style4' => __( 'Style 4', 'writepress-core' )),
			),
			array(
			array(
				'field'      => 'post_pagination',
				'value'      => 'yes',
				'comparison' => '==',
				)	
			)
	);	
    $this->select(	
		array(
				'title'    => __('Show Author Info Box', 'writepress-core'), 
				'subtitle' => esc_html__('Choose to show or hide the author info box', 'writepress-core'),
				'id'       => 'author_info',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Show', 'writepress-core'), 'no' => __('Hide', 'writepress-core')),				
			)
		);
    
    $this->select(	
		array(
				'title'    => __('Show Post Meta', 'writepress-core'), 
				'subtitle' => esc_html__('Choose to show or hide the post meta', 'writepress-core'),
				'id'       => 'post_meta',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Show', 'writepress-core'), 'no' => __('Hide', 'writepress-core')),				
			)
		);
    
    $this->select(	
		array(
			'title'    => __('Show Comments', 'writepress-core'), 
			'subtitle' => esc_html__('Choose to show or hide comments area', 'writepress-core'),
			'id'       => 'post_comments',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'writepress-core'), 'yes' => __('Show', 'writepress-core'), 'no' => __('Hide', 'writepress-core')),				
		)
	);
    

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
