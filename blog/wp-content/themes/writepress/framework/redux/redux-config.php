<?php

/* ------------------------------------------------------------------------ */
/* Redux Configuration
/* ------------------------------------------------------------------------ */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "writepress_data";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(		
		'opt_name'             => $opt_name,
		'disable_tracking'		=> true,
		'global_variable' 	   => $opt_name,
		'display_name'         => $theme->get('Name'), 
		'display_version'      => $theme->get('Version'),
		'menu_type'			   => 'submenu',
		'allow_sub_menu'       => true,
		'menu_title'           => esc_html__( 'Theme Options', 'writepress' ),
		'page_title'           => esc_html__( 'Theme Options', 'writepress' ),
		'async_typography'     => true,
		'admin_bar'            => false,
		'admin_bar_icon'       => 'dashicons-portfolio',
		'admin_bar_priority'   => 50,
		'global_variable'      => 'writepress_data',
		'update_notice'        => true,
		'page_parent'          => 'themes.php',
		'page_slug'            => 'writepress_options',
		'page_permissions'     => 'manage_options',
		'dev_mode'             => false,
		'customizer'           => true,
		'default_show'         => false,
		'show_options_object'  => false,
		'forced_dev_mode_off'  => false,
    );
	
    Redux::setArgs( $opt_name, $args );
 
 
 
 	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Global', 'writepress' ),
        'id'               => 'zolo_global',
		'icon'				=> 'el el-puzzle',
        'fields'           => array(
            	
				array(
					"title"			=> esc_html__("Pre Loader", "writepress"),	
					"subtitle"		=> esc_html__("Check the box to disable Pre Loader.", "writepress"),
					"id"			=> "body_preloader",					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'writepress' ),
							'off'   => esc_html__( 'OFF', 'writepress' ),
						),
					"default"		=> 'off',					
					),
				array(
					"title"			=> esc_html__("Pre Loader Image", "writepress"),		
					"subtitle"		=> esc_html__("Upload Preloader Image (70px x 70px).", "writepress"),
					"id"			=> "preloader_icon",
					'type'			=> 'media',					
					'required'		=> array( 
						array('body_preloader', '=', 'on'),
					),
				),
				array(
					"title"			=> esc_html__("Pre Loader screen Logo", "writepress"),		
					"subtitle"		=> esc_html__("Upload site Logo or Image for Preloader screen. This will appear above preloader image.", "writepress"),
					"id"			=> "preloader_logo",
					'type'			=> 'media',
					'required'		=> array( 
						array('body_preloader', '=', 'on'),
					),
				),
				array(
					"title"			=> esc_html__("Preloader Background Color", "writepress"),
					"subtitle"		=> esc_html__("Choose Preloader screen background color", "writepress"),
					"id"			=> "preloader_bg_color",
					"default"		=> "#ffffff",
					"type"			=> "color",
					'transparent'	=> false,
					'required' 		=> array( 
						array('body_preloader', '=', 'on'),
					),
				),
				array( 
					"title"		=> esc_html__("Tracking Code", "writepress"),
					"subtitle"	=> esc_html__("Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme. Please put code inside script tags.", "writepress"),
					"id"		=> "google_analytics",
					"type"		=> "textarea",
				),
				
        )
    ) );
 
 	// -> START Logo Section	
	
    Redux::setSection( $opt_name, array(
		'title'     => esc_html__('Logo', 'writepress'),
		'subtitle'	=> esc_html__( 'Logo Options', 'writepress' ),
		'id' 		=> 'zolo_logo_options',		
		'icon'      => 'el el-bulb',		

    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Logo', 'writepress' ),
        'id'               => 'zolo_logo',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'			=> esc_html__( 'Logo', 'writepress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'writepress' ),
					'id'			=> 'logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
				),
				array(
					'title' => esc_html__( 'Logo (Retina Version @2x) ', 'writepress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. <br> It should be exactly 2x the size of main logo. ', 'writepress' ),
					'id' 		=> 'logo_retina',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
				),
				array(
					'raw'	=> esc_html__('Sticky Header Logo', 'writepress' ),
					'id'	=> 'sticky_header_logo_options',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'		=> esc_html__( 'Sticky Header Logo','writepress' ),
					'id'		=> 'sticky_header_logo_showhide',
					'type'		=> 'button_set',
					'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
						),
					'default'  => 'off',
				),
				array(
					'title'			=> esc_html__( 'Sticky Header Logo', 'writepress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'writepress' ),
					'id'			=> 'sticky_logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('sticky_header_logo_showhide', '=', 'on')
				),
				array(
					'title' => esc_html__( 'Sticky Header Logo (Retina Version @2x) ', 'writepress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. <br> It should be exactly 2x the size of main logo. ', 'writepress' ),
					'id' 		=> 'retina_sticky_logo',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('sticky_header_logo_showhide', '=', 'on')
				),
				
				array(
					'raw'	=> esc_html__('Mobile Header Logo', 'writepress' ),
					'id'	=> 'mobile_header_logo_options',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'    => esc_html__( 'Mobile Header Logo','writepress' ),
					'id'       => 'mobile_header_logo_showhide',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'off',
				),
				array(
					'title'			=> esc_html__( 'Mobile Header Logo', 'writepress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'writepress' ),
					'id'			=> 'mobile_logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('mobile_header_logo_showhide', '=', 'on')
				),
				array(
					'title' => esc_html__( 'Mobile Header Logo (Retina Version @2x) ', 'writepress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. <br> It should be exactly 2x the size of main logo. ', 'writepress' ),
					'id' 		=> 'retina_mobile_logo',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('mobile_header_logo_showhide', '=', 'on')
				),
				array(
					'title'          => esc_html__( 'Standard Logo dimensions for Retina Logo', 'writepress' ),
					'subtitle'       => esc_html__( 'Please enter logo height and width', 'writepress' ),
					'id'             => 'retina_logo_height_width',
					'type'           => 'dimensions',
					'units'          => array( 'px' ),   
					'units_extended' => 'true',
					'default'        => array(
						'height'	=> '34px',
						'width'  	=> '84px',
					),
           		),		
				
				array(
					'title'          => esc_html__( 'Logo Margins', 'writepress' ),
					'subtitle'       => esc_html__( 'Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 30px, 0px, 29px, 0px.', 'writepress' ),
					'id'             => 'logo_margin',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'all'            => false,
					'units'          => array( 'px' ),
					'units_extended' => 'true', 
					'default'        => array(
						'padding-top'    => '0px',
						'padding-right'  => '0px',
						'padding-bottom' => '0px',
						'padding-left'   => '0px',
					),
            	),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Favicon', 'writepress' ),
        'id'               => 'zolo_favicons',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title' => esc_html__( 'Favicon', 'writepress' ),
					'subtitle' => esc_html__( 'Favicon for your website (16px x 16px).', 'writepress' ),
					'id' => 'fav_icon_image',
					'type' => 'media',					
				),
				array(
					'title' =>  esc_html__( 'Apple iPhone Icon Upload', 'writepress' ),
					'subtitle' => esc_html__( 'Favicon for Apple iPhone (57px x 57px).', 'writepress' ),
					'id' => 'iphone_icon',
					'type' => 'media',
				),
				array(
					'title' => esc_html__( 'Apple iPhone Retina Icon Upload', 'writepress' ),
					'subtitle' => esc_html__( 'Favicon for Apple iPhone Retina Version (114px x 114px).', 'writepress' ),
					'id' => 'iphone_icon_retina',
					'type' => 'media',
				),
				array(
					'title' => esc_html__( 'Apple iPad Icon Upload', 'writepress' ),
					'subtitle' => esc_html__( 'Favicon for Apple iPad (72px x 72px).', 'writepress' ),
					'id' => 'ipad_icon',
					'type' => 'media',
				),
				array(
					'title' => esc_html__( 'Apple iPad Retina Icon Upload', 'writepress' ),
					'subtitle' => esc_html__( 'Favicon for Apple iPad Retina Version (144px x 144px).', 'writepress' ),
					'id' => 'ipad_icon_retina',
					'type' => 'media',
				),
        )
    ) );
 
	Redux::setSection( $opt_name, array(
	'title'     => esc_html__('Layout', 'writepress'),
	'subtitle' 	=> esc_html__( 'Site Width', 'writepress' ),
	'id' 		=> 'zolo_site_layout',
	'icon'      => 'el el-website',			
	
	) );
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Layout', 'writepress' ),
	'id'               => 'zolo_sitewidth',
	'subsection'       => true,
	'fields'           => array(
			array(
				'title'    => esc_html__( 'Site Layout', 'writepress' ),					               
				'subtitle' => esc_html__( 'Controls the site layout.', 'writepress' ),
				'id'       => 'layout',
				'type'     => 'button_set', 
				'options'  => array(
					'wide' => esc_html__( 'Wide', 'writepress' ),
					'boxed' => esc_html__( 'Boxed', 'writepress' ),
					'theater' => esc_html__( 'Theater', 'writepress' ),
				),
				'default'  => 'wide',
			),	
			array(
				'title'          => esc_html__( 'Site Width', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the overall site width. In px or %, ex: 100% or 1280px.', 'writepress' ),
				'id'             => 'site_width',
				'type'           => 'dimensions',
				'units'          => array( 'px', '%' ),   
				'units_extended' => 'true',					
				'height'         => false,
				'default'        => array(
					'width'	=> '1280px',
				)
			),
			array(
				'title'          => esc_html__( 'Site Layout Padding', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the top/bottom padding for site layout. Enter valid value, ex: 10, 10.', 'writepress' ),
				'id'             => 'sitelayout_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'			 => false,
				'right'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-top'    => '0px',
					'padding-bottom' => '0px',
				)
			),	
			array(
				'title'          => esc_html__( 'Page Content Padding', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the top/bottom padding for page content', 'writepress' ),
				'id'             => 'page_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'			 => false,
				'right'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-top'    => '60px',
					'padding-bottom' => '50px',
				)
			),
			array(
				'title'          => esc_html__( '100% Width Left/Right Padding', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the left/right padding for page content when using 100% site width or 100% width page template. Enter value including any valid CSS unit, ex: 30px.', 'writepress' ),
				'id'             => 'hundredp_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'top'			 => false,
				'bottom'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-left'    => '30px',
					'padding-right' => '30px',
				)
			),
		)
	) );
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Sidebar Layout', 'writepress' ),
	'id'               => 'content_sidebar_width',
	'subsection'       => true,
	'fields'           => array(
			array(
				'title'				=>esc_html__( 'Content Width', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the width of the content area. In px or %, ex: 79% or 1010px.', 'writepress' ),
				'id'				=> 'content_width',
				'type'          	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  			=> '77%',
					'units'			 =>	'%',
				)
			),
			array(
				'title' 			=> esc_html__( 'Sidebar Width', 'writepress' ),
				'subtitle' 			=> esc_html__( 'Controls the width of the sidebar. In px or %, ex: 21% or 270px.', 'writepress' ),
				'id' 				=> 'sidebar_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '23%',
					'units'	 =>	'%',
				)
			),
		)
	) );
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Dual Sidebar Layouts', 'writepress' ),
	'id'               => 'content_sidebar_sidebar_width',
	'subsection'       => true,
	'fields'           => array(
			array(
				'title'				=> esc_html__( 'Content Width','writepress' ),
				'subtitle'			=> esc_html__( 'Controls the width of the content area. In px or %, ex: 58% or 740px.','writepress' ),
				'id'				=> 'content_width_2',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '58%',
					'units'	 =>	'%',
				)
			),
			array(
				'title'				=> esc_html__( 'Sidebar 1 Width','writepress' ),
				'subtitle'			=> esc_html__( 'Controls the width of the sidebar 1. In px or %, ex: 21% or 270px.','writepress' ),
				'id'				=> 'sidebar_2_1_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '21%',
					'units'	 =>	'%',
				)
			),
			array(
				'title'				=> esc_html__( 'Sidebar 2 Width','writepress' ),
				'subtitle'			=> esc_html__( 'Controls the width of the sidebar 2. In px or %, ex: 21% or 270px.','writepress' ),
				'id'				=> 'sidebar_2_2_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '21%',
					'units'	 =>	'%',
				)
			),
		)
	) );
	
	// -> START Header Section	
    Redux::setSection( $opt_name, array(
		'title'     => esc_html__('Header', 'writepress'),
		'id' 		=> 'zolo_header',
		'icon'      => 'el el-arrow-up',			

    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Content', 'writepress' ),
        'id'               => 'zolo_header_content',
        'subsection'       => true,
        'fields'           => array(
          	array(
				'title'		=> esc_html__( 'Header Position', 'writepress' ),
				'subtitle' 	=> esc_html__( 'Select the position of header. Vertical will work on Desktop only.', 'writepress' ),
				'id'          => 'header_position',
				'default'     => 'Top',
				'type'        => 'button_set',
				'options'     => array(					
					'Left'  => esc_html__( 'LEFT', 'writepress' ),
					'Top'   => esc_html__( 'TOP', 'writepress' ),
					'Right' => esc_html__( 'RIGHT', 'writepress' ),
					)
			),
            array(
				'title'    => esc_html__('Select a Header Layout', 'writepress'), 
                'id'       => 'header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header1.jpg',	
                    	),
                    	'v2'	=> array(
                        'alt'   => 'v2', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header2.jpg',
                   	 	),
                    	'v3'	=> array(
                        'alt'   => 'v3', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header3.jpg',
                    	),
                    	'v4'	=> array(
                        'alt'   => 'v4', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header4.jpg',
                    	),
						'v5'	=> array(
                        'alt'   => 'v5', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header5.jpg',
                    	),
						'v6'	=> array(
                        'alt'   => 'v6', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header6.jpg',
                    	),
						'v7'	=> array(
                        'alt'   => 'v7', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header7.jpg',
                    	),
						'v8'	=> array(
                        'alt'   => 'v8', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header8.jpg',
                    	),
                ),
				
				'required' => array( 
					array('header_position', '=', 'Top'), 
				),
            ),
			array(
				'title'    => esc_html__('Select a Header Layout', 'writepress'), 
                'id'       => 'left_header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/left_header.jpg',
                    	)
                ),
				
				'required' => array( 
					array('header_position', '=', 'Left'), 
				),
            ),
			array(
				'title'    => esc_html__('Select a Header Layout', 'writepress'), 
                'id'       => 'right_header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/right_header.jpg',
                    	)
                ),
				
				'required' => array( 
					array('header_position', '=', 'Right'), 
				),
            ),	
			array(
				'raw'			=> esc_html__('Header Options', "writepress"),
				'id'			=> 'header_options',
				'icon'			=> true,
				'type'			=> 'info',
				'required' => array('header_position', '=', 'Top'),					
			),	
			array(
				'title'		=> esc_html__( 'Search Design', 'writepress' ),
				'subtitle'	=> esc_html__( 'Select search design from dropdown.', 'writepress' ),
				'id'		=> 'search_design',
				'type'		=> 'select',
				'options' 	=> array(
					'default_search_but' => esc_html__( 'Default','writepress' ),
					'expanded_search_but' => esc_html__( 'Expanded','writepress' ),
					'full_screen_search_but' => esc_html__( 'Full Screen','writepress' ),
				),
				'default' 	=> 'full_screen_search_but',
				'required' => array('header_position', '=', 'Top'),	
			),
			array(
				'title'		=> esc_html__( 'Extended Menu Action', 'writepress' ),
				'subtitle'	=> esc_html__('Select the action of extended menu.', 'writepress' ),
				'id'		=> 'menu_action_change',
				'type'		=> 'select',
				'options'	=> array(
					'fullscreen_menu_open_button'	=> esc_html__( 'Full Screen Menu','writepress' ),
					'vertical_menu'					=> esc_html__( 'Vertical Menu','writepress' ),
					'horizontal_menu'				=> esc_html__( 'Horizontal Menu','writepress' ),
				),
				'default'							=> 'fullscreen_menu_open_button',
				'required' => array('header_position', '=', 'Top'),
			),			
			array(
				'title'		=> esc_html__('Multilingual Options', 'writepress'),
				'subtitle'	=> esc_html__('WPML plugin must be installed. It is not packed with theme. You can find it here: http://wpml.org/', 'writepress'),
				'id'		=> 'multilingual_show_hide',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
				'required' => array('header_position', '=', 'Top'),
			),	
			array(
				'raw'	=> esc_html__('Header Contact Details', 'writepress' ),
				'id'	=> 'header_contact_info',
				'icon'	=> true,
				'type'	=> 'info',		
				'required' => array('header_position', '=', 'Top'),				
			),
			array(
				'title'		=> esc_html__( 'Phone Number','writepress' ),
				'subtitle'	=> esc_html__( 'Phone number will display in header section.','writepress' ),
				'id'		=> 'header_number',
				'type'		=> 'text',
				'default'	=> '+1.208.567.1234',
				'required' => array('header_position', '=', 'Top'),		
			),
			array(
				'title' => esc_html__( 'Email Address For Contact Info','writepress' ),
				'subtitle' => esc_html__( 'Email address will display in header section.','writepress' ),
				'id' => 'header_email',
				'type' => 'text',
				'validate' => 'email',
                'msg'      => 'custom error message',
                'default'  => 'admin@yoursite.com',
				'required' => array('header_position', '=', 'Top'),		
			),
			array(
				'title'		=>  esc_html__( 'Header Ad area', 'writepress' ),
				'subtitle'	=>  esc_html__( 'Add HTML code for Header', 'writepress' ),
				'id'		=> 'header_ad_section',
				'type'		=> 'textarea',
				'default'	=> '<img src="'.get_template_directory_uri().'/assets/images/headers/default_ad_img.jpg" alt="'.esc_attr(get_bloginfo('name')).'">',
				'required' => array('header_position', '=', 'Top'),		
				),		
        )
    ) );
	// -> Header Styling	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Styling', 'writepress' ),
        'id'               => 'zolo_header_styling',
        'subsection'       => true,
        'fields'           => array(		
			array(				
                'title'    => esc_html__( 'Header Background', 'writepress' ),
                'subtitle' => esc_html__( 'Controls the background image, background position, background size, etc for the header.', 'writepress' ),
                'id'       => 'header_background_img',
                'type'     => 'background',
				'preview'  => false,
				'default'  => array(
					'background-color' => '#ffffff',
				),
            ),
			array(
				'title'			=> esc_html__( 'Header Typography', 'writepress' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for Header Font.', 'writepress' ),
				'id'			=> 'header_typography',
				'type'			=> 'typography',
				'font-backup'	=> false,
				'subsets'       => false, 
				'font-size'     => false,
				'line-height'   => false,               
				'letter-spacing'=> true, 
				'color'         => false,
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-style'	=> true,
				'font-weight'   => true,
				'default'		=> array(
					'font-family'	=> 'Open Sans',
					'font-weight'   => 'Normal 400',
					'google'		=> true,
					'font-style'	=> '400',
					'letter-spacing'=>'0.4px',
					'text-transform'=> 'none',
				),
			),
			array(
				'title'		=> esc_html__( '100% Header Width','writepress' ),
				'subtitle'	=> esc_html__( 'Check this box to set the header to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.','writepress' ),
				'id'		=> 'header_100_width', 
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',
				'required' => array( 
					array('header_position', '=', 'Top'),
				)
			),	
			array(
				'title'          => esc_html__( 'Header Left/Right Padding', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the left/right padding for header when using 100% header width. Enter value including any valid CSS unit.', 'writepress' ),
				'id'             => 'header_width_100per_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'top'			 => false,
				'bottom'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-left'    => '0px',
					'padding-right' => '0px',
				),
				'required' => array( 'header_100_width', '=', 'on')
			),
			array(
				'raw'	=> esc_html__('Top Bar Styling', 'writepress' ),
				'id'	=> 'header_topbar_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
			),
			array(				
				'title'		=> esc_html__( 'Top Bar Styling','writepress' ),
				'subtitle' 	=> esc_html__( 'Turn on to change default styling.Work for Preset 2, 5, 6 and Custom Header.','writepress' ),
				'id' 		=> 'header_topbar_styling_showhide',
				'type'        => 'button_set',
				'options'     => array(					
					'show'  => esc_html__( 'Show', 'writepress' ),
					'hide'   => esc_html__( 'Hide', 'writepress' ),
					),
				'default'     => 'hide',
			),
			array(
				'title'          => esc_html__( 'Section Height', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the Section One height. In px ex: 40px.', 'writepress' ),
				'id'             => 'top_bar_lh',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'         => false,
				'default'        => array(
					'height'	=> '40px',
				),
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'		=> esc_html__( 'Top Bar Background Color', 'writepress' ),
				'subtitle'	=> esc_html__( 'Controls the background color of the Search Button in header.', 'writepress' ),
				'id'		=> 'header_top_bg_color',
				'type'		=> 'color_alpha',
				'default'  => "rgba(255,255,255,0.0)",
				'transparent'=> false,
				'required' 	=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'          => esc_html__( 'Top Bar Border', 'writepress' ),
				'subtitle'       => esc_html__( 'This will work with Top Bar only.', 'writepress' ),
				'id'             => 'header_top_border',
				'type'			=> 'border',
				'all'      		=> false,
				'color'  		=> false,
				'default'  		=> array(
					'border-style'  => 'solid',
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '1px',
					'border-left'   => '0px'
				),
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
           	),
			array( 
				'title'			=> esc_html__('Top Bar Border Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the border colors for the Top Bar.', 'writepress'),
				'id'			=> 'header_top_border_color',
				'type'			=> 'color_alpha',
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__( 'Top Bar Font Color', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the Top Bar Font.', 'writepress' ),
				'id'			=> 'top_bar_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section One Element Space', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the space of the section One Element like space between social and tagline.', 'writepress' ),
				'id'				=> 'section1_element_space',
				'type'				=> 'text',
				'default'			=> '30',
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'		=> esc_html__( 'Header Element Separator', 'writepress' ),
				'id'		=> 'section1_element_separator',
				'type'		=> 'select',
				'options' 	=> array(
					'no_separator' => esc_html__('No Separator','writepress' ),
					'oblique_separator' => esc_html__('Oblique Separator','writepress' ),
					'small_separator' => esc_html__('Small Separator','writepress' ),
					'large_separator' => esc_html__('Large Separator','writepress' ),
				),
				'default' 	=> 'no_separator',
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'				=> esc_html__('Header Element Separator Color', 'writepress'),
				'subtitle'			=> esc_html__('Controls the separator color for the  header element.', 'writepress'),
				'id'				=> 'section1_element_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section1_element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			
			array(
				'title'			=> esc_html__('Top Bar Font Size', 'writepress'),
				'subtitle'		=> esc_html__('Insert css code', 'writepress'),
				'id'			=> 'topbar_font_size',
				'default'		=> '13',
				'type'			=> 'text', 
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'raw'	=> esc_html__('Section Two Styling', 'writepress' ),
				'id'	=> 'section_two_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array('header_position', '=', 'Top'),
			),
			array(				
				'title'		=> esc_html__( 'Section Two Styling','writepress' ),
				'subtitle' 	=> esc_html__( 'Turn on to change default styling. Work for all preset and custom Header','writepress' ),
				'id' 		=> 'section_two_styling_showhide',
				'type'        => 'button_set',
				'options'     => array(					
					'show'  => esc_html__( 'Show', 'writepress' ),
					'hide'   => esc_html__( 'Hide', 'writepress' ),
					),
				'default'     => 'hide',
				'required' => array('header_position', '=', 'Top'),
			),
			array(
				'title'          => esc_html__( 'Section Height', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the Section Two height. In px, ex: 94px.', 'writepress' ),
				'id'             => 'section_2_height',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'         => false,
				'default'        => array(
					'height'	=> '94px',
				),
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			
			array( 
				'title'			=> esc_html__('Header Background Color and Opacity', 'writepress'),
				'subtitle'		=> esc_html__('Controls the background color and opacity for the header. Opacity only works with header top position and ranges between 0 (transparent) and 1 (opaque). ex: .4', 'writepress'),
				'id'			=> 'header_bg_color',
				'type'			=> 'color_alpha',
				'default'		=> "rgba(255,255,255,0.0)",
				'transparent'	=> false,
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
					'title'          => esc_html__( 'Header Border', 'writepress' ),
					'subtitle'       => esc_html__( 'This will work with top header only.', 'writepress' ),
					'id'             => 'header_border',
					'type'			=> 'border',
					'all'      		=> false,
					'color'  		=> false,
					'default'  		=> array(
						'border-style'  => 'solid',
						'border-top'    => '0px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
					'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
           	),
			array( 
				'title'				=> esc_html__('Header Border Color', 'writepress'),
				'subtitle'			=> esc_html__('Controls the border colors for the header.', 'writepress'),
				'id'				=> 'header_border_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			
			array(
				'title'			=> esc_html__( 'Section Two Element Space', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the space of the section Two Element like space between social and tagline.', 'writepress' ),
				'id'			=> 'section2_element_space',
				'type'			=> 'text',
				'default'		=> '40',
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'		=> esc_html__( 'Header Element Separator', 'writepress' ),
				'id'		=> 'section2_element_separator',
				'type'		=> 'select',
				'options' 	=> array(
					'no_separator' => esc_html__('No Separator','writepress' ),
					'oblique_separator' => esc_html__('Oblique Separator','writepress' ),
					'small_separator' => esc_html__('Small Separator','writepress' ),
					'large_separator' => esc_html__('Large Separator','writepress' ),
				),
				'default'	=> 'no_separator',
				'required'	=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'			=> esc_html__('Header Element Separator Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the separator color for the  header element.', 'writepress'),
				'id'			=> 'section2_element_separator_color',
				'type'			=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section2_element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			array(
				'title'			=> esc_html__('Font Size', 'writepress'),
				'subtitle'		=> esc_html__('Insert css code', 'writepress'),
				'id'			=> 'section2_font_size',
				'default'		=> '16',
				'type'			=> 'text', 
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__('Line Height', 'writepress'),
				'subtitle'		=> esc_html__('This will works only tagline', 'writepress'),
				'id'			=> 'section2_line_height',
				'default'		=> '26',
				'type'			=> 'text', 
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__( 'Font Color', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the Section Two Font.', 'writepress' ),
				'id'			=> 'section2_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'raw'	=> esc_html__('Section Three Styling', 'writepress' ),
				'id'	=> 'section_three_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array('header_position', '=', 'Top'),
			),
			array(				
				'title'			=> esc_html__( 'Section Three Styling','writepress' ),
				'subtitle'		=> esc_html__( 'Turn on to change default styling. Work for Preset 3, 4, 5, 6 and Custom Header','writepress' ),
				'id'			=> 'section_three_styling_showhide',
				'type'			=> 'button_set',
				'options'		=> array(					
					'show'	=> esc_html__( 'Show', 'writepress' ),
					'hide'	=> esc_html__( 'Hide', 'writepress' ),
					),
				'default'		=> 'hide',
				'required'		=> array('header_position', '=', 'Top'),
			),
			array(
				'title'          => esc_html__( 'Section Height', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the Section Three height. In px or %, ex: 54px.', 'writepress' ),
				'id'             => 'section_3_height',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'			 => false,
				'default'        => array(
					'height'	=> '54px',
				),
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__('Background Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the background color of the menu when using header 3 or 5.', 'writepress'),
				'id'			=> 'navbar_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> "rgba(255,255,255,0.0)",
				'transparent'	=> false,
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
					'title'			=> esc_html__( 'Navbar Border', 'writepress' ),
					'subtitle'		=> esc_html__( 'Controls the top/right/bottom/left border for navbar', 'writepress' ),
					'id'			=> 'navbar_border_width',
					'type'			=> 'border',
					'all'      		=> false,
					'color'  		=> false,
					'default'  		=> array(
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
					'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
           		),
			array(
				'title'			=> esc_html__('Navbar Border Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the background color of the menu when using header 3 or 5.', 'writepress'),
				'id'			=> 'navbar_border_color',
				'type'			=> 'color_alpha',
				'default'  		=> '#e5e5e5',
				'transparent'	=> false,
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section Three Element Space', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the space of the section Three Element like space between social and tagline.', 'writepress' ),
				'id'				=> 'section3_element_space',
				'type'				=> 'text',
				'default'			=> '40',
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'		=> esc_html__( 'Header Element Separator', 'writepress' ),
				'id'		=> 'section3_element_separator',
				'type'		=> 'select',
				'options' 	=> array(
					'no_separator' => esc_html__('No Separator','writepress' ),
					'oblique_separator' => esc_html__('Oblique Separator','writepress' ),
					'small_separator' => esc_html__('Small Separator','writepress' ),
					'large_separator' => esc_html__('Large Separator','writepress' ),
				),
				'default' 	=> 'no_separator',
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'				=> esc_html__('Header Element Separator Color', 'writepress'),
				'subtitle'			=> esc_html__('Controls the separator color for the  header element.', 'writepress'),
				'id'				=> 'section3_element_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section3_element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),			
			array(
				'title'			=> esc_html__('Font Size', 'writepress'),
				'subtitle'		=> esc_html__('Insert css code', 'writepress'),
				'id'			=> 'section3_font_size',
				'default'		=> '16',
				'type'			=> 'text', 
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__('Line Height', 'writepress'),
				'subtitle'		=> esc_html__('This will works only tagline', 'writepress'),
				'id'			=> 'section3_line_height',
				'default'		=> '26',
				'type'			=> 'text', 
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__( 'Font Color', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the Section Three Font.', 'writepress' ),
				'id'			=> 'section3_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			//Left, Right header
			array(
				'raw'	=> esc_html__('Vertical Header Styling', 'writepress' ),
				'id'	=> 'vertical_header_styling_options',
				'icon'	=> true,
				'type'	=> 'info',
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'				=> esc_html__( 'Element Space', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left spacing for header Element.', 'writepress' ),
				'id'				=> 'vertical_element_space',
				'type'				=> 'spacing',
				'mode'				=> 'padding',
				'all'				=> false,
				'units'				=> array( 'px'), 
				'units_extended'	=> false,  
				'display_units'		=> false,			
				'default'			=> array(
					'padding-top'		=> '20px',
					'padding-right'		=> '40px',
					'padding-bottom'	=> '20px',
					'padding-left'		=> '40px',
				),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
            ),
			array(
				'title' => esc_html__( 'Vertical Header Width','writepress' ),
				'subtitle' => esc_html__( 'Controls width of the vertical side header.Insert without \'px\' ex: 280', 'writepress' ),
				'id' => 'side_header_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px'),
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '280',
				),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'			=> esc_html__('Font Size', 'writepress'),
				'subtitle'		=> esc_html__('Insert css code', 'writepress'),
				'id'			=> 'vertical_hd_font_size',
				'default'		=> '16',
				'type'			=> 'text', 
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'			=> esc_html__('Line Height', 'writepress'),
				'subtitle'		=> esc_html__('Insert css code', 'writepress'),
				'id'			=> 'vertical_hd_line_height',
				'default'		=> '26',
				'type'			=> 'text', 
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'			=> esc_html__( 'Font Color', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the vertical header Font.', 'writepress' ),
				'id'			=> 'vertical_hd_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title' 		=> esc_html__( 'Text Alignment', 'writepress' ),
				'subtitle' 		=> esc_html__( 'Select text alignment for vertical header', 'writepress' ),
				'id' 			=> 'ver_header_align',
				'type' 			=> 'select',
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
				'options' 		=> array(
					'left' 		=> esc_html__('Left','writepress' ),
					'center' 	=> esc_html__('Center','writepress' ),
					'right' 	=> esc_html__('Right','writepress' ),
				),					
				'default' 		=> 'left',
			),
			array(
				'title'				=> esc_html__( 'Vertical Header Shadow','writepress' ),
				'subtitle'			=> esc_html__( 'This will work only for Vertical Header Shadow.','writepress' ),
				'id'				=> 'vertical_header_shadow',
				'type'				=> 'button_set',
				'options'			=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'raw'	=> esc_html__('Search Styling', 'writepress' ),
				'id'	=> 'search_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
			),
			array(
				'title' => esc_html__( 'Height between Search box and Icon','writepress' ),
				'subtitle' =>esc_html__( 'Please enter the height between search box and search icon in px. e.g - 50','writepress' ),
				'id' => 'searchbox_position',
				'type' => 'text',
				'default' => '54',
				'required'	=> array('search_design', '=', 'default_search_but'),
			),
			array(
				"title" 		=> esc_html__("Search Font Color.", "writepress"),
				"subtitle" 		=> esc_html__("Controls the text color of the Full Screen and expanded Search.", "writepress"),
				"id" 			=> "fullscreen_expanded_search_font_color",
				"default" 		=> "#555555",
				"type" 			=> "color",
				'transparent' 	=> false,
				'required'	=> array('search_design', '!=', 'default_search_but'),
			),
			array( 
				'title' 		=> esc_html__('Search Background Color and Opacity.', 'writepress'),
				'subtitle' 		=> esc_html__('Controls the background color for the Full Screen and expanded Search.', 'writepress'),
				'id' 			=> 'fullscreen_expanded_search_bg',
				'type'			=> 'color_alpha',
				'default'  		=> '#ffffff',
				'transparent'	=> false,
				'required'	=> array('search_design', '!=', 'default_search_but'),
			),
			
			array(
				'id'	=> 'extended_menu_options',
				'icon'	=> true,
				'type'	=> 'info',	
				'raw'	=> esc_html__('Extended Menu Options', 'writepress' ),	
				'required'			=> array('header_position', '=', 'Top'),		
			),					
			array(
				'title'				=> esc_html__( 'Horizontal Menu Max-Width', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the the max width of the Horizontal Menu', 'writepress' ),
				'id'				=> 'horizontal_menu_max_width',
				'type'				=> 'dimensions',
				'units'				=> array( 'px'), 
				'units_extended'	=> 'true',
				'required'			=> array('menu_action_change', '=', 'horizontal_menu'),
				'height'			=>	false,	
				'default'			=> array(
					'width'	=> 800,
				),
			),
			array(
				'title'				=> esc_html__( 'Vertical Menu Max-Width', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the max width of the Vertical Menu', 'writepress' ),
				'id'				=> 'vertical_menu_max_width',
				'type'				=> 'dimensions',
				'units'				=> array( 'px'), 
				'units_extended'	=> 'true',
				'required'			=> array('menu_action_change', '=', 'vertical_menu'),
				'height'			=>	false,	
				'default'			=> array(
					'width'	=> 360,
				),
			),
			array(
				'title'			=> esc_html__( 'Vertical Menu Space From Top', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the space from top of the Vertical Menu. e.g - 53px', 'writepress' ),
				'id'			=> 'vertical_menu_space_top',
				'type'			=> 'text',
				'default'		=> '53',
				'required'		=> array('menu_action_change', '=', 'vertical_menu'),
			),
			array(
				'title'			=> esc_html__('Full Screen and Horizontal Menu Background', 'writepress'),
				'subtitle'		=> esc_html__('Controls the color of the full screen and horizontal menu background.', 'writepress'),
				'id'			=> 'fullscreen_hosizontal_menu_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(255,255,255,1)',
				'transparent'	=> false,	
				'required'		=> array('menu_action_change', '=', array('fullscreen_menu_open_button', 'horizontal_menu' )),
			),
			array(
				'title'			=> esc_html__('Full Screen Menu Font Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the Color of the full screen menu font.', 'writepress'),
				'id'			=> 'fullscreen_menu_font_color',
				'type'			=> 'color_alpha',
				'default'  		=> '#555555',
				'transparent'	=> false,	
				'required'		=> array('menu_action_change', '=', 'fullscreen_menu_open_button'),
			),
			array(
				'raw'	=> esc_html__('Extended Sidebar Styling', 'writepress' ),
				'id'	=> 'extended_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
			),
			array(
				'title'		=> esc_html__( 'Extended Sidebar Position','writepress' ),
				'subtitle'	=> esc_html__( 'Controls the Extended Sidebar position.','writepress' ),
				'id'		=> 'extended_sidebar_position',
				'type'		=> 'select',
				'options'	=> array(
					'right'	=> esc_html__('Right','writepress' ),
					'left'	=> esc_html__('Left','writepress' ),
				),
				'default'	=> 'right',
				'required'	=> array('header_position', '=', 'Top'),
			),
			array(
				'title'          => esc_html__( 'Extended Sidebar Width', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the Extended Sidebar Width. In px or %, ex: 100% or 1280px.', 'writepress' ),
				'id'             => 'extended_sidebar_width',
				'type'           => 'dimensions',
				'units'          => array( 'px', '%'),   
				'units_extended' => 'true',					
				'height'         => false,
				'default'        => array(
					'width'	=> '300px',
				)
			),
			array(
				'title'    => esc_html__( 'Extended Sidebar Background', 'writepress' ),
                'subtitle' => esc_html__( 'Controls the background image, background position, background size, etc for the header.', 'writepress' ),
                'id'       => 'extended_sidebar_bg',
                'type'     => 'background',                
				'preview'  => false,
				'background-attachment' => false,
				'default'  => array(
					'background-color' => '#ffffff',
				),
            ),
			array(
				'title' 		=> esc_html__('Extended Sidebar Font Color', 'writepress'),
				'subtitle' 		=> esc_html__('Controls the font color of the Extended Sidebar.', 'writepress'),
				'id' 			=> 'extended_font_color',
				'default' 		=> '#333333',
				'type' 			=> 'color',
				'transparent' 	=> false,
			),
			array(
				'title'			=> esc_html__('Extended Sidebar Link Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the link color of the Extended Sidebar.', 'writepress'),
				'id'			=> 'extended_link_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
                    'regular' => '#333333',
                    'hover'   => '',
                ),
			),
			array(
				'title' 		=> esc_html__('Extended Sidebar Border Color', 'writepress'),
				'subtitle' 		=> esc_html__('Controls the Border color of the Extended Sidebar.', 'writepress'),
				'id' 			=> 'extended_border_color',
				'default' 		=> '#eee',
				'type' 			=> 'color',
				'transparent' 	=> false,
			),
        )
    ) );
	// -> Sticky Header Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sticky Header', 'writepress' ),
        'id'               => 'zolo_sticky_header',
        'subsection'       => true,
        'fields'           => array(			
			array(
				'title'    => esc_html__('Enable Sticky Header', 'writepress'),
				'subtitle' => esc_html__('Turn on to show sticky header.', 'writepress'),
				'id'       => 'header_sticky_opt',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
			),
			
			array(
				'title'		=> esc_html__( 'Sticky Effect', 'writepress' ),
				'subtitle' 	=> esc_html__( 'Select the sticky effect.', 'writepress' ),
				'id'          => 'header_sticky_effect',
				'default'     => 'default',
				'type'        => 'button_set',
				'options'     => array(
					'default'   => esc_html__( 'Default', 'writepress' ),
					'shrink'  => esc_html__( 'Shrink', 'writepress' ),
					'slide_down' => esc_html__( 'Slide Down', 'writepress' )
					),
				'required'	=> array( 
						array('header_sticky_opt', '=', 'on'),
				),	
			),
			array(
				'title'          => esc_html__( 'Sticky Header Height', 'writepress' ),
				'subtitle'       => esc_html__( 'Controls the sticky header height. In px ex: 40px.', 'writepress' ),
				'id'             => 'sticky_header_srink_height',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'          => false,
				'default'        => array(
					'height'	 => '66px',
				),
				'required' 		=> array( 'header_sticky_effect', '=', 'shrink' ),
			),
			array(
					'title'				=> esc_html__( 'Sticky Header Menu Item Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'writepress' ),
					'id'				=> 'sticky_header_nav_item_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'		=> '20px',
						'padding-right'		=> '20px',
						'padding-bottom'	=> '20px',
						'padding-left'		=> '20px',
					),
					'required' 		=> array( 'header_sticky_effect', '=', 'shrink' ),
            	),
				array(
					'title'				=> esc_html__( 'Sticky Header Menu Item margin', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left margin for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'writepress' ),
					'id'				=> 'sticky_header_nav_item_margin',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'	=> '0px',
						'padding-right'	=> '0px',
						'padding-bottom'=> '0px',
						'padding-left'	=> '0px',
					),
					'required' 		=> array( 'header_sticky_effect', '=', 'shrink' ),
            	),
			array(
				'title'		=> esc_html__( 'Sticky Header Display For Headers' , 'writepress' ),
				'subtitle'	=> esc_html__( 'Controls what to displays in the sticky header', 'writepress' ),
				'id'		=> 'header_sticky_display',
				'type'		=> 'select',
				'options'	=> array(
					'section2'		=> esc_html__('Section Two','writepress' ),
					'section3'		=> esc_html__('Section Three','writepress' ),
					'section2_3'	=> esc_html__('Section Two + Section Three','writepress' ),
				),
				'default'	=> 'section2',	
				'required'	=> array( 
						array('header_sticky_opt', '=', 'on'),
				),			
			),
					
			array( 
				'title'			=> esc_html__('Sticky Header Background Color and Opacity.', 'writepress'),
				'subtitle'		=> esc_html__('Controls the background color for the sticky header.', 'writepress'),
				'id'			=> 'header_sticky_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> '#ffffff',
				'transparent'	=> false,
				'required'		=> array( 
						array('header_sticky_opt', '=', 'on'),
				),
			),
			array(
					'title'			=> esc_html__('Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the color of the Sticky Header.', 'writepress'),
					'id'			=> 'sticky_header_font_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#333333',
						'hover'   => '#555555',
					),
					'required'	=> array( 
						array('header_sticky_opt', '=', 'on'),
					),
				),
        )
    ) );
	// -> Mobile Header Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mobile Header', 'writepress' ),
        'id'               => 'zolo_mobile_header',
        'subsection'       => true,
        'fields'           => array(
            array(
				'title'			=> esc_html__('Show top bar on mobile', 'writepress'),
				'subtitle'		=> esc_html__('Select Top bar to show or hide', 'writepress'),
				'id'			=> 'mobile_header_top_bar_show_hide',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',
			),			
			array(
				'title'				=> esc_html__( 'Mobile header padding', 'writepress' ),
                'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for mobile header. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'writepress' ),
                'id'				=> 'mobile_header_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ), 
                'units_extended'	=> false,  
                'display_units'		=> false,			
                'default'			=> array(
                    'padding-top'		=> '0px',
					'padding-right'		=> '30px',
                    'padding-bottom'	=> '0px',
					'padding-left'		=> '30px',
                ),
            ),
			array(
				'title'			=> esc_html__('Mobile Menu Design Style','writepress'),
				'subtitle'		=> esc_html__('Select mobile header design.','writepress'),
				'id'			=> 'mobile_menu_design',
				'options'		=> array(
					'compact'	=> esc_html__('With Menu Bar','writepress'),
					'modern'	=> esc_html__('Without Menu Bar','writepress'),
				),
				'type'			=> 'select',
				'default'		=> 'compact',
			),
			array(
				'title'			=> esc_html__('Mobile Menu Font Size', 'writepress'),
				'subtitle'		=> esc_html__('Insert without "px" ex: 14', 'writepress'),
				'id'			=> 'mobile_font_size',
				'default'		=> '14',
				'type'			=> 'text',
			),
			array(
				'title'			=> esc_html__('Mobile Menu Line Height', 'writepress'),
				'subtitle'		=> esc_html__('Insert without "px" ex: 40', 'writepress'),
				'id'			=> 'mob_menu_lh',
				'default'		=> '40',
				'type'			=> 'text',
			),
			
			array(
				'raw'	=> esc_html__('Mobile Header Styling', 'writepress' ),
				'id'	=> 'mobile_header_styling_options',
				'icon'	=> true,
				'type'	=> 'info',
			),			
			array(
				'title'			=> esc_html__('Mobile Header Background Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the background color of the mobile header.', 'writepress'),
				'id'			=> 'mobile_header_background_color',
				'default'		=> '#ffffff',
				'type'			=> 'color',
				'transparent' 	=> false,
			),
			array(
				'title'			=> esc_html__('Mobile Menu Background Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the background color of the mobile menu box and dropdown.', 'writepress'),
				'id'			=> 'mobile_menu_background_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '',
					'hover'   => '#ffffff',
				),
			),
			array(
				'title'			=> esc_html__('Mobile Navbar Icon Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the color of the mobile nav bar icon.', 'writepress'),
				'id'			=> 'mobile_navbar_icon_color',
				'default'		=> '#e5e5e5',
				'type'			=> 'color',
				'transparent'	=> false,
			),
			array(
				'title'			=> esc_html__('Mobile Menu Font Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the color of the mobile menu items.', 'writepress'),
				'id'			=> 'mobile_menu_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '#ffffff',
					'hover'   => '',
				),
			),
			array(
				'title'			=> esc_html__('Mobile Menu Border Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the border, divider and icon colors of the mobile menu.', 'writepress'),
				'id'			=> 'mobile_menu_border_color',
				'type'		=> 'color_alpha',
				'default'  => '',
				'transparent'	=> false,
			),
        )
    ) );
	// -> Header Social Options
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Social', 'writepress' ),
        'id'               => 'zolo_header_social',
        'subsection'       => true,
        'fields'           => array(
			array(
				'title'			=> esc_html__( 'Header Social Icons Font Size', 'writepress' ),
				'subtitle'		=> esc_html__( 'Select header social Icons font size. Insert without \'px\' ex: 18.', 'writepress' ),
				'id'			=> 'header_social_font_size',
				'type'			=> 'text',
				'default'		=> '14',
			),			
			array(
				'title'			=> esc_html__( 'Header Social Icon Color Option', 'writepress' ),
				'subtitle'		=> esc_html__( 'Select a custom social icon color.', 'writepress' ),
				'id'			=> 'header_social_links_icon_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                )
			),			
			array(
                'title'			=> esc_html__('Header Social Icons Boxed', 'writepress'),
				'subtitle'		=> esc_html__('Turn on to show header social icons background.', 'writepress'),
				'id'			=> 'header_social_links_boxed',
                'type'     => 'button_set',
                'options'  => array(
                    'Yes' => esc_html__('Yes','writepress'),
					'No' => esc_html__('No','writepress'),
                ),
                'default'  => 'No'
            ),			
			array(
				'title'			=>  esc_html__( 'Header Social Icons Width', 'writepress'),
				'subtitle'		=> esc_html__( 'Social Icon Width', 'writepress'),
				'id'			=> 'header_social_icon_width',
				'type'			=> 'text',
				'default'		=> '34',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array(
				'title'			=> esc_html__( 'Header Social Icons Box Background Color', 'writepress'),
				'subtitle'		=> esc_html__( 'Header Social Icons Box Background Color', 'writepress'),
				'id'			=> 'header_social_links_box_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(54,56,57,0)',
				'transparent'	=> false,
				'mode'     		=> 'background',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array(
				'title'			=> esc_html__( 'Header Social Icons Box Border Color', 'writepress'),
				'id'			=> 'header_social_box_border_color',
				'type'			=> 'color',
				'default'		=> '#363839',
				'transparent'	=> false,
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array(
				'title'			=> esc_html__( 'Header Social Icons Boxed Radius', 'writepress'),
				'subtitle'		=> esc_html__( 'Box radius for the social icons. Insert without \'px\' ex: 4', 'writepress'),
				'id'			=> 'header_social_links_boxed_radius',
				'type'			=> 'text',
				'default'		=> '0',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array(
				'title'          => esc_html__( 'Header Social Icons Box Padding', 'writepress' ),
                'subtitle'       => esc_html__( 'Controls the top/bottom padding for Header Social Icons Box. Enter values including any valid CSS unit, ex: 8px, 8px', 'writepress' ),
                'id'             => 'header_social_boxed_padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
                'all'            => false,
                'units'          => array( 'px' ), 
                'units_extended' => false,  
                'display_units' => false,
				'left' 			=> false,
				'right' 		=> false,				
                'default'       => array(
                    'padding-top'  => '8px',
                    'padding-bottom'   => '8px'
                )
            ),
			array(
				'title'          => esc_html__( 'Header Social Icons Box Margin', 'writepress' ),
                'subtitle'       => esc_html__( 'Controls the right/left margin for Header Social Icons Box. Enter values including any valid CSS unit, ex: 12px, 12px', 'writepress' ),
                'id'             => 'header_social_boxed_margin',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'px' ), 
                'units_extended' => false,  
                'display_units' => false,
				'top' 			=> false,
				'bottom' 		=> false,				
                'default'       => array(
                    'padding-right'  => '12px',
                    'padding-left'   => '12px'
                )
            ),	
			array(
				'title'		=> esc_html__( 'Header Social Separator', 'writepress' ),
				'id'		=> 'header_social_separator',
				'type'		=> 'select',
				'options' 	=> array(
					'no_separator' => esc_html__('No Separator','writepress'),
					'oblique_separator' => esc_html__('Oblique Separator','writepress'),
					'small_separator' => esc_html__('Small Separator','writepress'),
					'large_separator' => esc_html__('Large Separator','writepress'),
				),
				'default' 	=> 'no_separator',
				'required' => array( 'header_position', '=', 'Top' ),
			),
			array( 
				'title'				=> esc_html__('Header Social Separator Color', 'writepress'),
				'subtitle'			=> esc_html__('Controls the separator color for the Header Social.', 'writepress'),
				'id'				=> 'header_social_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'header_social_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
        )
    ) );
	// -> Menu Section
    Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Menu', 'writepress' ),
        'subtitle'			=> esc_html__( 'Menu', 'writepress' ),
        'id'				=> 'zolo_menu',
        'icon'				=> 'el el-lines'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Options', 'writepress' ),
        'id'               => 'menu_option',
        'subsection'       => true,
        'fields'           => array(				
				 array(
					 'title'   => esc_html__( 'Menu Design', 'writepress' ),
					 'id'   => 'main_menu_design',
					 'type'    => 'image_select',					 
					 'default'  => 'menu1',
					 'options' => array(					 		
							'menu1'	=> array(
							'alt'   => esc_html__('menu1','writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design1.jpg',
							),
							'menu2' => array(
							'alt'   => esc_html__('menu2', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design2.jpg',
							),
							'menu3' => array(
							'alt'   => esc_html__('menu3', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design3.jpg',
							),
							'menu4' => array(
							'alt'   => esc_html__('menu4', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design4.jpg',
							),	
							'menu_hover_style1' => array(
							'alt'   => esc_html__('Menu Hover Style1', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-1.gif',
							),
							'menu_hover_style2' => array(
							'alt'   => esc_html__('Menu Hover Style2', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-2.gif',
							),
							'menu_hover_style3' => array(
							'alt'   => esc_html__('Menu Hover Style3', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-3.gif',
							),
							'menu_hover_style4' => array(
							'alt'   => esc_html__('Menu Hover Style4', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-4.gif',
							),				  
						),	
					 'required' => array( 'header_position', '=', 'Top' ),		 
				),

				array(
					 'title'   => esc_html__( 'Vertical Menu Design', 'writepress' ),
					 'id'   => 'vertical_menu_design',
					 'type'    => 'image_select',					 
					 'default'  => 'menu5',
					 'options' => array(
							'menu5' => array(
							'alt'   => esc_html__('Menu Five','writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design5.jpg',
							),
							'menu6' => array(
							'alt'   => esc_html__('Menu Six','writepress'), 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design6.jpg',
							),
							'menu7' => array(
							'alt'   => esc_html__('Menu Seven', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design7.jpg',
							),
							'vertical_menu_hover_1' => array(
							'alt'   => esc_html__('Menu Hover Style1','writepress'), 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-1.gif',
							),
							'vertical_menu_hover_2' => array(
							'alt'   => esc_html__('Menu Hover Style2', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-2.gif',
							),
							'vertical_menu_hover_3' => array(
							'alt'   => esc_html__('Menu Hover Style3', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-3.gif',
							),
							'vertical_menu_hover_4' => array(
							'alt'   => esc_html__('Menu Hover Style4', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-4.gif',
							),
							'vertical_menu_hover_5' => array(
							'alt'   => esc_html__('Menu Hover Style5', 'writepress'),
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-5.gif',
							),
						),	
					'required' => array( 'header_position', '!=', 'Top' ),
				),
				array(
					'raw'	=> esc_html__('Main Menu Styling', 'writepress' ),
					'id'	=> 'main_menu_styling_info',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'			=> esc_html__( 'Main Menu Highlight Border', 'writepress'),
					'id'			=> 'nav_highlight_border',
					'type' 			=> 'slider',
					'default' 		=> 2,
					'min' 			=> 0,
					'step' 			=> 1,
					'max' 			=> 20,
					'display_value' => 'text'
				),	
				array(
					'title'			=> esc_html__('Main Menu Highlight Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the color of the menu hover Highlight Border.', 'writepress'),
					'id'			=> 'nav_highlightborder_color',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,			
				),
				array(
					'title'				=> esc_html__( 'Menu Item Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'writepress' ),
					'id'				=> 'nav_item_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'		=> '40px',
						'padding-right'		=> '20px',
						'padding-bottom'	=> '40px',
						'padding-left'		=> '20px',
					),
            	),
				array(
					'title'				=> esc_html__( 'Menu Item margin', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left margin for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'writepress' ),
					'id'				=> 'nav_item_margin',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'	=> '0px',
						'padding-right'	=> '0px',
						'padding-bottom'=> '0px',
						'padding-left'	=> '0px',
					),
            	),
				array(
					'title'			=> esc_html__('Main Menu Font Color - First Level', 'writepress'),
					'subtitle'		=> esc_html__('Controls the text color of first level menu items.', 'writepress'),
					'id'			=> 'menu_first_level_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#555555',
						'hover'   => '#999999',
					)
				),
			
				array(
					'title'			=> esc_html__('Main Menu Background Color - First Level', 'writepress'),
					'subtitle'		=> esc_html__('This will only work with vertical expanding menu.', 'writepress'),
					'id'			=> 'vertical_menu_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.8)',
					'transparent'	=> false,
					'required' => array( 'menu_action_change', '=', 'vertical_menu' ),
					
				),
				array(
					'title'			=> esc_html__('Main Menu Hover Background Color - First Level', 'writepress'),
					'subtitle'		=> esc_html__('Controls the color of the menu hover background color  First Level.', 'writepress'),
					'id'			=> 'menu_hover_bg_first_level',
					'type'			=> 'color_alpha',
					'default'  		=> '#f7f7f7',
					'transparent'	=> false,			
				),
				array(
				'title'		=> esc_html__( 'Menu Separator', 'writepress' ),
				'id'		=> 'menu_separator',
				'type'		=> 'select',
				'options' 	=> array(
					'no_separator' => esc_html__('No Separator','writepress' ),
					'oblique_separator' => esc_html__('Oblique Separator','writepress' ),
					'small_separator' => esc_html__('Small Separator','writepress' ),
					'large_separator' => esc_html__('Large Separator','writepress' ),
				),
				'default' 	=> 'no_separator',
				'required' => array( 'header_position', '=', 'Top' ),
			),
			array( 
				'title'				=> esc_html__('Menu Separator Color', 'writepress'),
				'subtitle'			=> esc_html__('Controls the separator color for the menu item.', 'writepress'),
				'id'				=> 'menu_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'menu_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			array(
				'title'			=> esc_html__('Vertical Header Menu Separator', 'writepress'),
				'subtitle'		=> esc_html__('Controls the color of the Vertical Header menu separator.', 'writepress'),
				'id'			=> 'vertical_header_menu_sep_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(204,204,204,0.0)',
				'transparent'	=> false,	
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'raw' => esc_html__('Main Menu Typography', 'writepress' ),
				'id' => 'main_menu_typography_info',
				'type' => 'info',
			),
			array(
				'title'       	=> esc_html__( 'Menus Typography', 'writepress' ),
				'subtitle' 		=> esc_html__( 'These settings control the typography for all menus.', 'writepress' ),
				'id'          	=> 'nav_typography',
				'type'        	=> 'typography',
				'font-backup' 	=> true,
				'subsets'       => true, 
				'font-size'     => true,
				'line-height'   => true,               
				'letter-spacing'=> true, 
				'color'         => false,
				'text-align'	=> true, 
				'text-transform'=> true,
				'font-style'  	=> true,
				'font-weight'   => true,
				'default'     	=> array(
					'font-family'	=> 'Open Sans',
					'google'		=> true,
					'font-size'		=> '14px',
					'line-height'	=> '14px',
					'text-align'	=> 'left',
					'font-style'	=> '400',
					'font-weight'   => 'Normal 400',
					'letter-spacing'=>'0.4px',
					'text-transform'=> 'uppercase',
					'font-backup'	=> "'Bookman Old Style', serif",
				),
			),				
        )
    ) );
	// -> Menu Dropdown Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Dropdown', 'writepress' ),
        'id'               => 'main_dropdown_menu_style',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'				=> esc_html__( 'Menu Dropdown Width', 'writepress' ),
					'id'				=> 'dropdown_menu_width',
					'type'				=> 'dimensions',
					'units'				=> array( 'px'), 
					'units_extended'	=> 'true',
					'height'			=>	false,	
					'default'			=> array(
						'width'	=> 160,
					),
           		),
				array(
					'title' 		=> esc_html__( 'Dropdown loading design', 'writepress' ),
					'subtitle' 		=> esc_html__( 'Select Drop down loading design Style', 'writepress' ),
					'id' 			=> 'dropdown_loading',
					'type' 			=> 'select',
					'options' => array(
						'dropdown_loading_fade' => esc_html__('Fade','writepress' ),
						'dropdown_loading_slide_up' => esc_html__('Slide Up','writepress' ),
						'dropdown_loading_slide_down' => esc_html__('Slide Down','writepress' ),
					),					
					'default' 		=> 'dropdown_loading_fade',
				),
				array(
					'title'			=> esc_html__('Main Menu Dropdown Font Size', 'writepress'),
					'subtitle'		=> esc_html__('Insert without "px" ex: 14', 'writepress'),
					'id'			=> 'nav_dropdown_font_size',
					'default'		=> '14',
					'type'			=> 'text',
				),
				array(
					'title' 		=> esc_html__( 'Dropdown Menu Indicator', 'writepress' ),
					'subtitle' 		=> esc_html__( 'Select Drop Down Menu Indicator show/hide', 'writepress' ),
					'id' 			=> 'dropdown_indicator',
					'type' 			=> 'select',
					'options' 		=> array(
						'dropdown_indicator_hide' => esc_html__('Hide','writepress'),
						'dropdown_indicator_show' => esc_html__('Show','writepress'),
					),					
					'default' 		=> 'dropdown_indicator_hide',
				),
				array(
					'title'				=> esc_html__( 'Menu Dropdown Top Border', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the border Height of the menu highlight bar.', 'writepress' ),
					'id'				=> 'menu_dropdown_topborder',
					'type'				=> 'border',
					'all'      			=> false,
					'right' 			=> false, 
					'bottom' 			=> false,
					'left' 				=> false,
					'default'			=> array(
						'border-color'  => '',
						'border-style'  => 'solid',
						'border-top'    => '3px',
						
					),
           		),
				array(
					'title'				=> esc_html__( 'Menu Dropdown Item Top/Bottom Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the top/bottom padding for Main Menu Dropdown. Enter values including any valid CSS unit, ex: 0px, 30px', 'writepress' ),
					'id'				=> 'dropdown_item_top_bottom_pad',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px' ), 
					'units_extended'	=> false, 
					'right'				=> false,
					'left'				=> false, 
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'		=> '10px',
						'padding-bottom'	=> '10px',
					),
            	),
				array(
					'title'			=> esc_html__('Menu Dropdown Shadow','writepress'),
					'subtitle'		=> esc_html__('Check to enable the dropshadow for menu dropdowns, uncheck to disable.','writepress'),
					'id'			=> 'megamenu_shadow',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				
				array(
					'title'			=> esc_html__('Menu Font Color - Sublevels', 'writepress'),
					'subtitle'		=> esc_html__('Controls the color of the menu font sublevels.', 'writepress'),
					'id'			=> 'submenu_font_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#333333',
						'hover'   => '#333333',
					)
				),
				array(
					'title'			=> esc_html__('Menu Background Color - Sublevels', 'writepress'),
					'subtitle'		=> esc_html__('Controls the color of the menu sublevel background.', 'writepress'),
					'id'			=> 'menu_sub_bg_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#ffffff',
						'hover'   => '#f8f8f8',
					)
				),
				array(
					'title'			=> esc_html__('Menu Separator - Sublevels', 'writepress'),
					'subtitle'		=> esc_html__('Controls the color of the menu separator sublevels.', 'writepress'),
					'id'			=> 'menu_sub_sep_color',
					'default'		=> '#dcdadb',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Menu Icon Color(Cart,Search and Extended Menu Icon)', 'writepress'),
					'subtitle'		=> esc_html__('Controls the text color of the Menu Icon.', 'writepress'),
					'id'			=> 'menu_icon_color',
					'default'		=> '#555555',
					'type'			=> 'color',
					'transparent'	=> false,
				),
		
		
		
		)
    ) );
	// -> Mega Menu Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mega Menu', 'writepress' ),
        'id'               => 'main_mega_menu',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'				=> esc_html__( 'Mega Menu Max-Width', 'writepress' ),
					'subtitle'			=> esc_html__( 'Controls the the max width of the mega menu', 'writepress' ),
					'id'				=> 'megamenu_max_width',
					'type'				=> 'dimensions',
					'units'				=> array( 'px'), 
					'units_extended'	=> 'true',
					'height'			=>	false,	
					'default'			=> array(
						'width'	=> 1280,
					),
           		),			
				array(
					'title'			=> esc_html__('Mega Menu Column Title Size','writepress'),
					'subtitle'		=> esc_html__('Set the font size for mega menu column titles (menu 2nd level labels). Insert without \'px\' ex: 18','writepress'),
					'id'			=> 'megamenu_title_size',
					'type'			=> 'text',					
					'default'		=> '18',
				),
		
		
		)
    ) );
	// -> Top Menu Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Top Menu Style', 'writepress' ),
        'id'               => 'top_menu_style',
        'subsection'       => true,
        'fields'           => array(
			array(
					'title'				=> esc_html__( 'Top Menu Dropdown Width', 'writepress' ),
					'id'				=> 'topmenu_dropwdown_width',
					'type'				=> 'dimensions',
					'units'				=> array( 'px' ), 
					'units_extended'	=> 'true',
					'height'			=>	false,	
					'default'			=> array(
						'width'	=> 160,
					),
           		),	
		 	array(
				'title' => esc_html__( 'Top Bar Menu Font Color - Sublevels', 'writepress' ),
				'subtitle' => esc_html__( 'Controls the text color of the secondary menu font sublevels.', 'writepress' ),
				'id' => 'header_top_menu_sub_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '#747474',
					'hover'   => '#333333',
				),
			),
			array(
				'title' => esc_html__( 'Top Bar Menu Background Color - Sublevels', 'writepress' ),
				'subtitle' => esc_html__( 'Controls the background color of the secondary menu sublevels.', 'writepress' ),
				'id' => 'header_top_sub_bg_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '#ffffff',
					'hover'   => '#fafafa',
				),
			),
			array(
				'title' => esc_html__( 'Top Menu Border	- Sublevels', 'writepress' ),
				'subtitle' => esc_html__( 'Controls the border color of the secondary menu sublevels.', 'writepress' ),
				'id' => 'header_top_menu_sub_sep_color',
				'type' => 'color',
				'transparent' => false,
				'default' => '#e5e5e5',
			),		 	
		 	
		 )
    ) );

	// -> Page Title Bar Section
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Title Bar', 'writepress' ),
        'id'               => 'zolo_page_title_bar',
        'fields'           => array(
				array(				
					'title'		=> esc_html__( 'Page Title Bar','writepress' ),
					'subtitle' 	=> esc_html__( 'Controls how the page title bar displays. ','writepress' ),
					'id' 		=> 'page_title_bar',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title' 	=> esc_html__( '100% Page Title Width', 'writepress' ),
					'subtitle' 	=> esc_html__( 'Turn on to have the page title area display at 100% width according to the window size. Turn off to follow site width.','writepress' ),
					'id' 		=> 'page_title_100_width',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'off',
				),
				
				array(
				'title' 		=> esc_html__( 'Page Title Bar Height', 'writepress' ),
				'subtitle' 		=> esc_html__( 'Insert without \'px\' ex: 100', 'writepress' ),
                'id'            => 'page_title_height',
                'type'          => 'dimensions',
                'units'         => array( 'px'), 
                'units_extended'=> 'true',
				'width'			=>	false,	
                'default'       => array(
                    'height'  => 100,
                	),
            	),
				array(
				'title'			=> esc_html__( 'Page Title Bar Padding.', 'writepress' ),
				'subtitle'		=> esc_html__( 'Controls the top/right/bottom/left padding for Page Title Bar.', 'writepress' ),
                'id'			=> 'page_title_padding',
                'type'			=> 'spacing',
                'mode'			=> 'padding',
                'all'			=> false,
                'units'			=> array( 'px'), 
                'units_extended'=> false,  			
					'default'	=> array(
						'padding-top'	=> '30px',
						'padding-right'	=> '30px',
						'padding-bottom'=> '30px',
						'padding-left'	=> '30px',
					),
           		),
				array(
				'title'			=> esc_html__( 'Page Title Bar Text Alignment', 'writepress' ),
				'subtitle'		=> esc_html__( 'Choose the title and subheader text alignment', 'writepress' ),
				'id'			=> 'page_title_alignment',
				'type'			=> 'button_set',
				'options'		=> array(
					'left'		=> 'Left',
					'center'	=> 'Center',
					'right'		=> 'Right'
					),
				'default'		=> 'left'
				),
				array(
					'title'		=> esc_html__( 'Page Title Bar Background Position', 'writepress' ),
					'subtitle'	=> esc_html__( 'Choose the title bar Background Position. Below will start page title bar after header and From top will show page title bar from top same as that of header position.', 'writepress' ),
					'id'		=> 'titlebar_bg_position',
					'type'		=> 'select',
					'options'	=> array(
						'below'		=> esc_html__('Below','writepress'),
						'from_top'	=> esc_html__('From Top','writepress'),
					),										
					'default'	=> 'below',
				),
				array(					
					'title'    => esc_html__( 'Page Title Bar Background', 'writepress' ),
					'subtitle' => esc_html__( 'Controls the background image for the Title Bar.', 'writepress' ),
					'id'       => 'page_title_bg',
					'type'     => 'background',
					'preview'  => false,
					'default'  => array(
						'background-color' => '',
					),
				),

				array(
					'title'		=> esc_html__( 'Parallax Background Image', 'writepress' ),
					'subtitle'	=> esc_html__( 'Check to enable parallax background image when scrolling.', 'writepress' ),
					'id'		=> 'page_title_bg_parallax',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'off',
				),
				array(
					'raw'		=> esc_html__('Page Title Area Styling', 'writepress' ),
					'id'		=> 'page_title_area_styling_options',
					'icon'		=> true,
					'type'		=> 'info',
				),
				array( 
					"title"		=> esc_html__("Page Title Line Height", "writepress"),
					"subtitle"	=> esc_html__("Insert without 'px' ex: 36", "writepress"),
					"id"		=> "page_title_font_lh",
					"default"	=> "36",
					"type"		=> "text",
				),

				array(
					'title'			=> esc_html__('Page Title Bar Overlay Color', 'writepress'),
					'subtitle'		=> esc_html__('Page Title Bar Overlay Color.', 'writepress'),
					'id'			=> 'page_title_bar_overlay_color',					
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.15)',
					'transparent'	=> false,					
				),
				array(
					"title"			=> esc_html__("Page Title And Breadcrumbs Font Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the text color of the page title font.", "writepress"),
					"id"			=> "page_title_color",
					"default"		=> "#ffffff",
					"type"			=> "color",
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Page Title Font Size', 'writepress'),
					'subtitle'		=> esc_html__('Insert without "px" ex: 30', 'writepress'),
					'id'			=> 'page_title_font_size',
					'default'		=> '30',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Display Breadcrumbs', 'writepress' ),
					'subtitle'		=> esc_html__( 'Check to display the breadcrumbs. Uncheck to hide.', 'writepress' ),
					'id'			=> 'breadcrumb_show',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'			=> esc_html__('Breadcrumbs Font Size', 'writepress'),
					'subtitle'		=> esc_html__('Insert without "px" ex: 13', 'writepress'),
					'id'			=> 'breadcrumbs_font_size',
					'default'		=> '13',
					'type'			=> 'text',
					'required'		=> array( 
						array('breadcrumb_show', '=', 'on'),					
					),
				),
        )
    ) );
	
	// -> Sidebar Options	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebars', 'writepress' ),
        'id'               => 'zolo_sidebars',
        'icon'             => 'el el-th-list'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Pages', 'writepress' ),
        'id'               => 'zolo_page_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=>  esc_html__( 'Sidebar Position', 'writepress' ),
					'subtitle'	=>  esc_html__( 'Select sidebar position.', 'writepress' ),
					'id'		=> 'page_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full',  'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left',  'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right',  'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both',  'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
					
				),
				array(
					'title'		=>  esc_html__( 'Left Sidebar', 'writepress' ),
					'subtitle'	=>  esc_html__( 'Select Left Sidebar that will display on the pages.', 'writepress' ),
					'id'		=> 'page_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('page_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=>  esc_html__( 'Right Sidebar', 'writepress' ),
					'subtitle'	=>  esc_html__( 'Select right Sidebar that will display on the pages.', 'writepress' ),
					'id'		=> 'page_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'None',
					'required'	=> array( 
						array('page_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Posts', 'writepress' ),
        'id'               => 'zolo_blog_post_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__( 'Sidebar Position', 'writepress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'writepress' ),
					'id'		=> 'blogposts_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array(
					'title'		=> esc_html__( 'Left Sidebar', 'writepress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the blog posts.', 'writepress' ),
					'id'		=> 'blogposts_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('blogposts_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=> esc_html__( 'Right Sidebar', 'writepress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the blog posts.', 'writepress' ),
					'id'		=> 'blogposts_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'None',
					'required'	=> array( 
						array('blogposts_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Archive/Category', 'writepress' ),
        'id'               => 'zolo_blog_archive_category_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__( 'Sidebar Position','writepress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.','writepress' ),
					'id'		=> 'blog_archive_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array(

					'title'		=> esc_html__( 'Left Sidebar','writepress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the blog archive/category pages.','writepress' ),
					'id'		=> 'blog_archive_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('blog_archive_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=> esc_html__( 'Right Sidebar','writepress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the blog archive/category pages.','writepress' ),
					'id'		=> 'blog_archive_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'None',
					'required'	=> array( 
						array('blog_archive_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search Page', 'writepress' ),
        'id'               => 'zolo_searchpage_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__( 'Sidebar Position', 'writepress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'writepress' ),
					'id'		=> 'searchpage_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both', 'writepress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array(
					'title'		=> esc_html__( 'Left Sidebar', 'writepress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the search posts.', 'writepress' ),
					'id'		=> 'searchpage_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('searchpage_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=> esc_html__( 'Right Sidebar', 'writepress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the search posts.', 'writepress' ),
					'id'		=> 'searchpage_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'None',
					'required'	=> array(
						array('searchpage_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebar Styling', 'writepress' ),
        'id'               => 'zolo_sidebar_widget_styling',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'		=> esc_html__('Sidebar Widgets Style', 'writepress'),
					'subtitle'	=> esc_html__('Select sidebar design style.', 'writepress'),
					'id'		=> 'sidebar_widgets_style',
					'type'		=> 'select',
					'options'	=> array(
						'none'	=> esc_html__('None', 'writepress' ),
						'box'	=> esc_html__('Box','writepress' ),
					),
					'default'	=> 'none',
				),	
				array(
					"title"			=> esc_html__("Sidebar Widget Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the Background color of the Sidebar Widget.", "writepress"),
					"id"			=> "sidebar_widge_bg_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#f8f8f8',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_style', '=', 'box'),				
				),
				array(
					"title"			=> esc_html__("Sidebar Widget Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the Border color of the Sidebar Widget.", "writepress"),
					"id"			=> "sidebar_widget_border_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#f4f4f4',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_style', '=', 'box'),
				),			
				array(
					'title'		=> esc_html__('Sidebar Title Alignment', 'writepress'),
					'subtitle'	=> esc_html__('Select sidebar Widgets Title Alingment.', 'writepress'),
					'id'		=> 'sidebar_widgets_title_align',
					'type'		=> 'select',
					'options'	=> array(
						'left'	=> esc_html__('Left', 'writepress' ),
						'center'=> esc_html__('Center', 'writepress' ),
						'right' => esc_html__('Right','writepress' ),
					),
					'default'	=> 'left',
				),
				array(
					'title'			=> esc_html__( 'Widget title Top & Bottom Padding', 'writepress' ),
					'subtitle'		=> esc_html__( 'Controls the widgets title padding', 'writepress' ),
					'id'			=> 'sidebar_widgets_title_padding',
					'type'			=> 'spacing',
					'mode'			=> 'padding',
					'all'			=> false,
					'left'			=> false,
					'right'			=> false,
					'units'			=> array( 'px', '%' ), 
					'units_extended'=> false, 	
					'default'	=> array(
						'padding-top'		=> '10px',
						'padding-bottom'	=> '10px',
					),
           		),	
				array(
					'title'		=> esc_html__('Sidebar Widgets Title Seperator', 'writepress' ),
					'subtitle'	=> esc_html__('Check the box to display sidebar widgets title Seperator.', 'writepress' ),
					'id'		=> 'sidebar_widgets_title_seperator_show',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('Sidebar Title Decoration', 'writepress'),
					'subtitle'	=> esc_html__('Select sidebar Widgets Title Design.', 'writepress'),
					'id'		=> 'sidebar_widgets_title_design',
					'type'		=> 'select',
					'options'	=> array(
						'none'			=> esc_html__('None','writepress' ),
						'bottomborder'	=> esc_html__('Separator', 'writepress' ),
						'box'			=> esc_html__('Box', 'writepress' ),
						'boxfullwidth'	=> esc_html__('Box Full Width', 'writepress' ),
						'image'			=> esc_html__('Image','writepress' ),
					),
					'default'	=> 'none',
					'required'	=> array( 
						array('sidebar_widgets_title_seperator_show', '=', 'on'),
					),
				),
				array(
					'title'		=> esc_html__('Title separator Image', 'writepress'),
					'id'		=> 'sidebar_widgets_title_separator_img',				
					'type'		=> 'media',	
					'url'      => true,				
					'required'	=> array( 
						array('sidebar_widgets_title_design', '=', 'image'),
					),
				),
				array(
					'title'		=> esc_html__('Separator Width', 'writepress'),
					'subtitle'	=> esc_html__('Controls the widgets title separator width. In px or %, ex: 100% or 80px.', 'writepress'),
					'id'		=> 'sidebar_widgets_title_seperator_width',
					'default'	=> '80px',
					'type'		=> 'text',
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'bottomborder') ),
				),
				array(
					'title'		=> esc_html__('Title separator & Image Height', 'writepress'),
					'subtitle'	=> esc_html__('Controls the widgets title separator height. Insert without px ex: 2', 'writepress'),
					'id'		=> 'sidebar_widgets_title_seperator_height',
					'default'	=> '2',
					'type'		=> 'text',
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'bottomborder', 'image') ),
				),
				array(
					'title'			=> esc_html__( 'Title Bottom Margin', 'writepress' ),
					'subtitle'		=> esc_html__( 'Controls the widgets title Bottom Margin', 'writepress' ),
					'id'			=> 'sidebar_title_seperator_bottom_mar',
					'type'			=> 'spacing',
					'mode'			=> 'padding',
					'all'			=> false,
					'top'			=> false,
					'right'			=> false,
					'left'			=> false,
					'units'			=> array( 'px' ), 
					'units_extended'=> false, 	
					'default'		=> array(
						'padding-bottom' 	=> '10px',
					),
					'required'	=> array( 
						array('sidebar_widgets_title_seperator_show', '=', 'on'),
					),
           		),
					
				array(
					"title"			=> esc_html__("Sidebar Widget Headings separator Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the sidebar widget separator color.", "writepress"),
					"id"			=> "sidebar_widgets_title_seperator_color",
					"default"		=> "#333333",
					"type"			=> "color",
					"transparent"	=> false,
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'bottomborder') ),
				),	
				array(
					"title"			=> esc_html__("Sidebar Widget Title Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the Background color of the Sidebar Widget.", "writepress"),
					"id"			=> "sidebar_widget_title_bg_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#e4e4e4',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'box', 'boxfullwidth' ) ),				
				),	
				array(
					"title"			=> esc_html__("Sidebar Widget Title Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the Sidebar Widget.", "writepress"),
					"id"			=> "sidebar_widget_title_border_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#e4e4e4',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'box', 'boxfullwidth' ) ),				
				),	
				array( 
					'title'			=> esc_html__('Sidebar Item Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the Border color of the Sidebar item.', 'writepress'),
					'id'			=> 'sidebar_item_border_color',				
					'type'			=> 'color_alpha',
					'default'  		=> '#dadada',
					'transparent'	=> false,		
        		),
				array(
					'title'			=> esc_html__('Sidebar Link Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the text color of the Sidebar link font.', 'writepress'),
					'id'			=> 'sidebar_link_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#888888',
						'hover'   => '#333333',
					)
				),
				array(
					'raw'	=> esc_html__('Sidebar Typography', 'writepress' ),
					'id'	=> 'sidebar_typography_info',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'				=> esc_html__( 'Sidebar Title Typography', 'writepress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the Sidebar headings.', 'writepress' ),
					'id'				=> 'sidebar_title_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'subsets' 			=> false,
					'all_styles'		=> true,
					'text-align'		=> false,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'font-weight'		=> true,
					'default'			=> array(
						'color'				=> '#333333',
						'font-style'		=> '700',
						'font-family'		=> 'Abel',
						'font-weight'   	=> 'Normal 400',
						'google'			=> true,
						'font-size'			=> '18px',
						'line-height'		=> '26px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),
				array(
					'title'				=> esc_html__( 'Sidebar Font Typography', 'writepress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the Sidebar.', 'writepress' ),
					'id'				=> 'sidebar_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'all_styles'		=> true,
					'text-align'		=> true,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'font-weight'		=> true,
					'subsets' 			=> false, 
					'default'			=> array(
						'color'				=> '#333333',
						'font-style'		=> '700',
						'font-family'		=> 'Abel',
						'font-weight'   	=> 'Normal 400',
						'google'			=> true,
						'font-size'			=> '16px',
						'line-height'		=> '24px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),				
								
			)
    ) );
	
	// -> Footer Section	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'writepress' ),
        'id'               => 'zolo_footer',
        'icon'             => 'el el-arrow-down'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Layout', 'writepress' ),
        'id'               => 'footers_layout_columns',
        'subsection'       => true,
        'fields'           => array(
			
			array(				
				'title'		=> esc_html__( 'Footer Widgets','writepress' ),
				'subtitle' 	=> esc_html__( 'Turn on to display footer widgets.','writepress' ),
				'id' 		=> 'footer_widgets',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
			),
			array(
				'title'		=> esc_html__( 'Layout', 'writepress' ),
				'subtitle'	=> esc_html__( 'Select the number of columns to display in the footer.', 'writepress' ),
				'id'		=> 'footer_layout_columns',
				'type'		=> 'select',	
				'options'	=> array(
					'layout1' => esc_html__('1/4 1/4 1/4 1/4', 'writepress'),
					'layout2' => esc_html__('1/4 1/4 1/2', 'writepress'),
					'layout3' => esc_html__('1/4 1/2 1/4', 'writepress'),
					'layout4' => esc_html__('1/2 1/4 1/4', 'writepress'),
					'layout5' => esc_html__('1/3 1/3 1/3', 'writepress'),
					'layout6' => esc_html__('1/3 2/3', 'writepress'),
					'layout7' => esc_html__('2/3 1/3', 'writepress'),
					'layout8' => esc_html__('1/2 1/2', 'writepress'),
					'layout9' => esc_html__('1/1', 'writepress'),
					),				
				'default'	=> 'layout1',
				'required'	=> array( 
						array('footer_widgets', '=', 'on'),					
					),
			),
			array(
				'title'		=> esc_html__('100% Footer Width','writepress' ),
				'subtitle'	=> esc_html__('Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.','writepress' ),
				'id'		=> 'footer_100_width',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',	
				'required'	=> array( array('footer_widgets', '=', 'on'),
				),
			),
			array(
					'title'				=> esc_html__( 'Footer Widgets Top, bottom, left, right Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 10', 'writepress' ),
					'id'				=> 'footer_area_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended' 	=> false,  
						'default'       => array(
							'padding-top'		=> '40px',
							'padding-right'		=> '30px',
							'padding-bottom'	=> '40px',
							'padding-left'		=> '30px',
						),
					'required'	=> array( array('footer_widgets', '=', 'on'),
					),
           		),
				
			array(				
				'title'		=> esc_html__( 'Upper Footer Widgets','writepress' ),
				'subtitle' 	=> esc_html__( 'Turn on to display upper footer widgets.','writepress' ),
				'id' 		=> 'upper_footer_widgets',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',
			),
			
			array( 
				'title'		=> esc_html__('Layout For Upper Footer', 'writepress'),
				'subtitle'	=> esc_html__('Select the number of columns to display above footer.', 'writepress'),
				'id'		=> 'footer_upper_columns',
				'type'		=> 'select',
				'options'	=> array(
						'0' => esc_html__('0','writepress'),
						'1' => esc_html__('1', 'writepress'),
						'2' => esc_html__('2', 'writepress'),
						'3' => esc_html__('3', 'writepress'),
						'4' => esc_html__('4','writepress'),
				),				
				'default'		=> '0',
				'required'	=> array('upper_footer_widgets', '=', 'on'),
			),
			array( 
				"title"		=> esc_html__("100% Layout for Widget Area Above Footer", "writepress"),
				"subtitle"	=> esc_html__("Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "writepress"),
				"id"		=> "footer_100_width_upper",
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',
				'required'	=> array('upper_footer_widgets', '=', 'on'),
			),
			array(
					'title'				=> esc_html__( 'Upper Footer Top & bottom Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 10', 'writepress' ),
					'id'				=> 'upper_footer_area_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'left'				=> false,
					'right'				=> false,	
					'units'				=> array( 'px' ), 
					'units_extended'	=> false, 								
					'default'			=> array(
							'padding-top'		=> '0px',
							'padding-bottom'	=> '40px',
					),
					'required'	=> array('upper_footer_widgets', '=', 'on'),
           		),
			
			array(				
				'title'		=> esc_html__( 'Lower Footer Widgets','writepress' ),
				'subtitle' 	=> esc_html__( 'Turn on to display lower footer widgets.','writepress' ),
				'id' 		=> 'lower_footer_widgets',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',
			),
			array( 
				"title"		=> esc_html__("Layout For Lower Footer", "writepress"),
				"subtitle"	=> esc_html__("Select the number of columns to display below footer.", "writepress"),
				"id"		=> "footer_lower_columns",
				"type"		=> "select",
				"options" => array(
						'0' => esc_html__('0', 'writepress'),
						'1' => esc_html__('1', 'writepress'),
						'2' => esc_html__('2', 'writepress'),
						'3' => esc_html__('3', 'writepress'),
						'4' => esc_html__('4', 'writepress'),
				),				
				'default'	=> '0',
				'required'	=> array( 'lower_footer_widgets', '=', 'on'	),
			),
			array(
				"title"		=> esc_html__("100% Layout for Widget Area Below Footer", "writepress"),
				"subtitle"	=> esc_html__("Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "writepress"),
				"id"		=> "footer_100_width_lower",
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'off',
				'required'	=> array( 'lower_footer_widgets', '=', 'on'	),
			),
			
				array(
					'title'				=> esc_html__( 'Lower Footer Top & bottom Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 10', 'writepress' ),
					'id'				=> 'lower_footer_area_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px' ), 
					'units_extended'	=> false, 
					'left'				=> false,
					'right'				=> false,				
						'default'		=> array(
							'padding-top'		=> '40px',
							'padding-bottom'	=> '0px',
						),
					'required'	=> array( 'lower_footer_widgets', '=', 'on'	),
           		),
			array(
				'title'		=> esc_html__( 'Style', 'writepress' ),
				'subtitle'	=> esc_html__( 'Select the Style display in the footer.', 'writepress' ),
				'id'		=> 'footer_layout_style',
				'type'		=> 'select',
				'options'	=> array(
					'footer_default' => esc_html__( 'Default','writepress' ),
					'footer_fixed' => esc_html__( 'Fixed (covers content)','writepress' ),
					'footer_parallax' => esc_html__( 'Parallax','writepress' ),
				),				
				'default'	=> 'footer_default',
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Footer Widgets Title', 'writepress' ),
		'subtitle'			=> esc_html__( 'Footer Widgets Title Design', 'writepress' ),
		'subsection'		=> true,	
        'id'				=> 'footer_widget_title_design',        	
        'fields'			=> array(			
			array(
				'title'			=> esc_html__( 'Footer Widgets Title Top & bottom Padding', 'writepress' ),
				'subtitle'		=> esc_html__( 'Insert without \'px\' ex: 10', 'writepress' ),
                'id'			=> 'footer_widgets_title_padding',
                'type'			=> 'spacing',
                'mode'			=> 'padding',
                'all'			=> false,
                'units'			=> array( 'px' ), 
                'units_extended'=> false, 
				'left'			=> false,
				'right'			=> false,				
				'default'		=> array(
						'padding-top'		=> '10px',
						'padding-bottom'	=> '10px'
					),
           		),
			array(
				'title'			=> esc_html__( 'Footer Widgets Title Seperator', 'writepress' ),
				'subtitle'		=> esc_html__( 'Check the box to display footer widgets title Seperator.', 'writepress' ),
				'id'			=> 'footer_widgets_title_seperator_show',
				'type'			=> 'button_set',
				'options'		=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
			),
			array(
				'title'				=> esc_html__( 'Footer Widgets Title Seperator Width', 'writepress' ),
				'subtitle'			=> esc_html__( 'Controls the widgets title seperator width. In px or %, ex: 100% or 80px.', 'writepress' ),
                'id'				=> 'footer_widgets_title_seperator_dimensions',
                'type'				=> 'dimensions',
                'units'				=> array( 'px' ), 
                'units_extended'	=> 'true',
                'default'			=> array(
					'height'  => 2,
                    'width'  => 80,
                	),
				'required'	=> array( 'footer_widgets_title_seperator_show', '=', 'on'),
            	),
			array(
				'title'				=> esc_html__( 'Seperator Bottom Margin', 'writepress' ),
                'subtitle'			=> esc_html__( 'Controls the widgets title seperator Bottom Margin. Insert without \'px\' ex: 10', 'writepress' ),
                'id'				=> 'footer_title_seperator_bottom_mar',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ), 
                'units_extended'	=> false,
				'top'				=> false,
				'right'				=> false,
				'left'				=> false,				
                'default'			=> array(
                    'padding-bottom'	=> '10px',
                ),
				'required'	=> array( 'footer_widgets_title_seperator_show', '=', 'on'),
            ),
			array(
				'title'			=> esc_html__('Footer Widget Headings Seperator Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls the Footer Widget Seperator color.', 'writepress'),
				'id'			=> 'footer_widgets_title_seperator_color',
				'default'		=> '#dddddd',
				'type'			=> 'color',
				'transparent'	=> false,
				'required'	=> array( 'footer_widgets_title_seperator_show', '=', 'on'),
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Styling', 'writepress' ),
        'id'               => 'zolo_footer_styling_option',
        'subsection'       => true,
        'fields'           => array(
				
				array(					
					'title'    => esc_html__( 'Footer Background', 'writepress' ),
					'subtitle' => esc_html__( 'Controls the background image for the Footer.', 'writepress' ),
					'id'       => 'footer_bg_image',
					'type'     => 'background',
					'preview'  => false,
					'default'  => array(
						'background-color' => '#2b3034',
					),
				),
				array(
					'title'          => esc_html__( 'Footer Border', 'writepress' ),
					'subtitle'       => esc_html__( 'Controls the Top Footer Border.', 'writepress' ),
					'id'             => 'footer_area_bor_width',
					'type'			=> 'border',
					'all'      		=> false,
					'default'  		=> array(
						'border-color'	=> '#e9eaee',
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
           		),
				
				array(
					'title'			=> esc_html__('Footer Link Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the text color of the footer link font.', 'writepress'),
					'id'			=> 'footer_link_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#bfbfbf',
						'hover'   => '#919191',
					)
				),
				array(
					'title'			=> esc_html__('Footer Item Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the Border color of the footer item.', 'writepress'),
					'id'			=> 'footer_item_border_color',					
					'type'			=> 'color_alpha',
					'default'  		=> '#707070',
					'transparent'	=> false,
				),

				array(
					'raw'			=> esc_html__( 'Footer Typography', 'writepress' ),
					'id'			=> 'footer_typography_info',
					'type'			=> 'info',
				),			
				array(
					'title'				=> esc_html__( 'Footer Title Typography', 'writepress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the footer headings.', 'writepress' ),
					'id'				=> 'footer_title_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'all_styles'		=> true,
					'text-align'		=> true,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'subsets' 			=> false, 
					'default'			=> array(
						'color'				=> '#dddddd',
						'font-style'		=> '700',
						'font-family'		=> 'Abel',
						'google'			=> true,
						'font-size'			=> '18px',
						'line-height'		=> '26px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),
				array(
					'title'				=> esc_html__( 'Footer Font Typography', 'writepress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the footer.', 'writepress' ),
					'id'				=> 'footer_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'all_styles'		=> true,
					'text-align'		=> true,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'subsets' 			=> false, 
					'default'			=> array(
						'color'				=> '#dddddd',
						'font-style'		=> '700',
						'font-family'		=> 'Abel',
						'google'			=> true,
						'font-size'			=> '16px',
						'line-height'		=> '24px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),

        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Copyright', 'writepress' ),
        'id'				=> 'copyright_alignment',
        'subsection'		=> true,
        'fields'			=> array(
            array(
					'title'		=> esc_html__( 'Copyright & Social Icon Alignment', 'writepress' ),
					'id'		=> 'copyright_social_align',
					'type'		=> 'select',
					'options'	=> array(
						'default'	=> esc_html__( 'Default',"writepress"),
						'center'	=> esc_html__( 'Center',"writepress"),
					),
					'default'	=> 'default',
				),
				array(					
					'title'		=> esc_html__( 'Copyright Bar', 'writepress' ),
					'subtitle'	=> esc_html__( 'Check the box to display the copyright bar.', 'writepress' ),
					'id'		=> 'footer_copyright',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',	
				),
				array(
					'title'		=> esc_html__( 'Copyright Text', 'writepress' ),
					'subtitle'	=> esc_html__( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'writepress' ),
					'id'		=> 'copyright_text',
					'type'		=> 'textarea',					
					'default'	=> 'Copyright 2017 writepress | All Rights Reserved | Powered by <a href="http://wordpress.org">WordPress</a>',
					'required'	=> array('footer_copyright', '=', 'on'),
				),				
				array(
					'title'          => esc_html__( 'Copyright Border', 'writepress' ),
					'subtitle'       => esc_html__( 'Controls the Copyright Border.', 'writepress' ),
					'id'             => 'copyright_area_border',
					'type'			=> 'border',
					'all'      		=> false,
					'default'  		=> array(
						'border-color'	=> '#4b4c4d',
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
           		),
				array(
					'title'				=> esc_html__( 'Copyright Top & bottom Padding', 'writepress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 18px', 'writepress' ),
					'id'				=> 'copyright_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'left'				=> false,
					'right'				=> false,
					'units'				=> array( 'px' ), 
					'units_extended'	=> false,  	
						'default'		=> array(
							'padding-top'		=> '18px',
							'padding-bottom'	=> '18px',
						),
           		),
				array(
					'raw'			=> esc_html__( 'Copyright Design', 'writepress' ),
					'id'			=> 'footer_copyright_design',
					'type'			=> 'info',
            	),
				array(
					'title'			=> esc_html__('Copyright Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the background color of the footer copyright.', 'writepress'),
					'id'			=> 'footer_copyright_bg_color',
					'default'		=> '#282a2b',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Copyright Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the text color of the Copyright font.', 'writepress'),
					'id'			=> 'copyright_text_color',
					'default'		=> '#8C8989',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Copyright Link Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the text color of the Copyright link font.', 'writepress'),
					'id'			=> 'copyright_link_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#bfbfbf',
						'hover'   => '#919191',
					)
				),
				array(
					'title'			=> esc_html__('Copyright Font Size', 'writepress'),
					'subtitle'		=> esc_html__("Insert without 'px' ex: 12", "writepress"),
					'id'			=> 'copyright_font_size',
					'default'		=> '12',
					'type'			=> 'text',
				),			
        )
    ) );	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Social', 'writepress' ),
        'id'               => 'footer_social_icons',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'			=> esc_html__( 'Display Social Icons on Footer of the Page', 'writepress' ),
					'subtitle'		=> esc_html__( 'Select the checkbox to show social media icons on the footer of the page.', 'writepress' ),
					'id'			=> 'footer_social_icon',					
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',	
				),
				array(
					'title'			=> esc_html__( 'Footer Social Icons Font Size', 'writepress' ),
					'subtitle'		=> esc_html__( 'Insert without \'px\' ex: 18', 'writepress' ),
					'id'			=> 'footer_social_font_size',
					'type'			=> 'text',					
					'default'		=> '14',
					'required'	=> array( 'footer_social_icon', '=', 'on'),
				),
				array(
					'title'			=> esc_html__('Footer Social Icon Color', 'writepress' ),
					'subtitle'		=> esc_html__('Select a custom social icon color', 'writepress' ),
					'id'			=> 'footer_social_links_icon_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#e7e7e7',
						'hover'   => '#c5c5c5',
					),
					'required'	=> array( 'footer_social_icon', '=', 'on'),
				),
				array(
					'title'			=> esc_html__( 'Footer Social Icons Boxed', 'writepress' ),
					'subtitle'		=> esc_html__( 'Controls the color of the social icons in the footer.', 'writepress' ),
					'id'			=> 'footer_social_links_boxed',
					'type'			=> 'button_set',
					'options'		=> array(
						'Yes'	=> 'Yes',
						'No'	=> 'No',
					),
					'default'		=> 'No',
					'required'	=> array( 'footer_social_icon', '=', 'on'),
				),
				array(
					'title'			=> esc_html__( 'Footer Social Icons Width (Only works on icon boxed design set to yes above)', 'writepress' ),
					'subtitle'		=> esc_html__( 'In px or %, ex: 100% or 80px.', 'writepress' ),
					'id'			=> 'footer_social_icon_width',
					'type'			=> 'dimensions',
					'units'			=> array( 'px', '%' ), 
					'units_extended'=> true,
					'height'		=> false,
					'default'		=> array(
							'width'	=> 34,
						),
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
            	),
				array(
					'title'			=> esc_html__( 'Footer Social Icons Box Background Color', 'writepress' ),
					'subtitle'		=> esc_html__( 'Select a custom social icon box color', 'writepress' ),
					'id'			=> 'footer_social_links_box_color',					
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(34,34,34,0)',
					'transparent'	=> false,
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
				),
				array(
					'title'			=> esc_html__( 'Footer Social Icons Box Border Color', 'writepress' ),
					'subtitle'		=> esc_html__( 'Enter color', 'writepress' ),
					'id'			=> 'footer_social_box_border_color',
					'type'			=> 'color',					
					'default'		=> '#e7e7e7',
					'transparent'	=> false,
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
				),
				array(

					'title'			=> esc_html__( 'Footer Social Icons Boxed Radius', 'writepress' ),
					'subtitle'		=> esc_html__( 'Boxradius for the social icons. Insert without \'px\' ex: 4', 'writepress' ),
					'id'			=> 'footer_social_links_boxed_radius',
					'type'			=> 'text',	
					"default"		=> "0",		
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
				),
				
				array(
					'title'			=> esc_html__( 'Footer Social Icons Box Top & Bottom Padding', 'writepress' ),
					'subtitle'		=> esc_html__( 'Box Padding for the social icons', 'writepress' ),
					'id'			=> 'footer_social_boxed_padding',
					'type'			=> 'spacing',
					'mode'			=> 'padding',
					'all'			=> false,
					'left'			=> false,
					'right'			=> false,
					'units'			=> array( 'px'), 
					'units_extended'=> false, 	
					'default'		=> array(
							'padding-top'		=> '8px',
							'padding-bottom'	=> '8px',
						),
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
           		),
				array(
				'title'				=> esc_html__( 'Footer Social Icons Box left & right margin', 'writepress' ),
				'subtitle'			=> esc_html__( 'Box margin for the social icons', 'writepress' ),
                'id'				=> 'footer_social_boxed_margin',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
				'top'				=> false,
				'bottom'			=> false,
                'units'				=> array( 'px'), 
                'units_extended'	=> false, 	
				'default'			=> array(
						'padding-left' 	=> '12px',
						'padding-right'	=> '12px',
					),
				'required'	=> array( 'footer_social_icon', '=', 'on'),
           		),	
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back to Top', 'writepress' ),
        'id'               => 'zolo_back_to_top',
        'subsection'       => true,
        'fields'           => array(
            array(
				'title'		=> esc_html__( 'Back to Top button', "writepress"),
				'subtitle'	=> esc_html__( 'Select Position', "writepress"),
				'id'		=> 'back_to_top',
				'type'		=> 'select',
				'options'	=> array(
					'default_backtotop'			=> esc_html__('Default | in Copyright area',"writepress"),
					'sticky_backtotop'			=> esc_html__('Sticky',"writepress"),
					'sticky_on_scroll_backtotop'=> esc_html__('Sticky show on scroll',"writepress"),
					'hide_backtotop'			=> esc_html__('Hide',"writepress"),
				),					
				'default'	=> 'default_backtotop',
			),
			array(
				"title"		=> esc_html__("Back to Top button Style", "writepress"),
				"subtitle"	=> esc_html__("Select Position", "writepress"),
				"id"		=> "back_to_top_style",
				"default"	=> "backtotop_style_none",
				"type"		=> "select",
				"options"	=> array(
					'backtotop_style_none' => esc_html__('None', 'writepress'),
					'backtotop_style_square' => esc_html__('Square', 'writepress'),
					'backtotop_style_round' => esc_html__('Round', 'writepress'),
					'backtotop_style_rounded' => esc_html__('Rounded','writepress'),
				),
			),
			array(
				"title"			=> esc_html__("Button Font Color", "writepress"),
				"subtitle"		=> esc_html__("Controls the font color of the Back To Top Button.", "writepress"),
				"id"			=> "backtotop_font_color",
				'type'			=> 'link_color',
                'active'    	=> false,
                'default'  => array(
                    'regular' => '#ffffff',
                    'hover'   => '#ffffff',
                )
            ),
			array(
				"title"			=> esc_html__("Button Background Color and Opacity", "writepress"),
				"subtitle"		=> esc_html__("Controls the background color and opacity of the Back To Top Button.", "writepress"),
				"id"			=> "backtotop_background_color",
				'type'			=> 'color_alpha',
				'default'  		=> '#46494a',
				'transparent'	=> false,
			),
			array(
				"title"			=> esc_html__("Button Hover Background Color and Opacity", "writepress"),
				"subtitle"		=> esc_html__("Controls the hover background color and opacity of the Back To Top Button.", "writepress"),
				"id"			=> "backtotop_hoverbg_color",
				'type'			=> 'color_alpha',
				'default'  		=> '',

				'transparent'	=> false,			
			),
			array(
				"title"			=> esc_html__("Button border Color and Opacity", "writepress"),
				"subtitle"		=> esc_html__("Controls the border color and opacity of the Back To Top Button.", "writepress"),
				"id"			=> "backtotop_border_color",
				'type'			=> 'color_alpha',
				'default'  		=> '#e1e1e1',
				'transparent'	=> false,
			),
			array(
				"title"			=> esc_html__("Button Hover border Color and Opacity", "writepress"),
				"subtitle"		=> esc_html__("Controls the hover border color and opacity of the Back To Top Button.", "writepress"),
				"id"			=> "backtotop_hoverborder_color",
				'type'			=> 'color_alpha',
				'default'  		=> '',
				'transparent'	=> false,			
			),
        )
    ) );
	// -> Background options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Background', 'writepress' ),
        'id'               => 'zolo_background',
        'icon'             => 'el el-photo',
		'fields'           => array(
            	array(
					'raw'		=> esc_html__( 'Options below will work only in boxed mode.', 'writepress' ),
					'id'		=> 'boxed_mode_only',
					'type'		=> 'info',
            	),
				
				array(
					'id'       => 'body_bg_image',
					'type'     => 'background',
					'title'    => esc_html__( 'Background', 'writepress' ),
					'default'  => array(
						'background-color' => '#ffffff',
					),
				),
				array(
					'raw'		=> esc_html__( 'Options below will work for both Boxed & Wide Mode.', 'writepress' ),
					'id'	=> 'boxed_wide_mode_only',
					'type'	=> 'info',
            	),
				array(
					'id'       => 'main_content_bg_image',
					'type'     => 'background',
					'title'    => esc_html__( 'Background', 'writepress' ),
					'default'  => array(
						'background-color' => '#ffffff',
					),
				),
        )
    ) );
	
	// -> Typography Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'writepress' ),
        'id'               => 'zolo_typography',
        'icon'             => 'el el-fontsize',
		'fields'			=> array(
            array(
                'id'				=> 'body_typography',
                'type'				=> 'typography',
                'title'				=> esc_html__( 'Body Typography', 'writepress' ),
				'font-backup'		=> false,
				'subsets' 			=> false,
                'font-size'			=> true,
                'line-height'		=> true, 
                'letter-spacing'	=> true, 
                'color'				=> true,
                'preview'			=> true, 
				'text-align'		=> true,
				'text-transform'	=> true,
				'font-weight'		=> true,
                'subtitle'			=> esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'			=> array(
                    'color'			=> '#747474',
                    'font-style'	=> 'normal',
                    'font-family'	=> 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'		=> true,
                    'font-size'		=> '16px',
                    'line-height'	=> '26px',
					'letter-spacing'=> '0px',
					'text-align'	=> 'left',
					'text-transform'=> 'none',
                ),
            ),
			array(
				'raw'	=> esc_html__( 'Headers Typography', 'writepress' ),
				'id'	=> 'heading_typography',
				'type'	=> 'info',
			),
			array(
                'id'          => 'header_h1_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H1 Headers Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true, 
				'font-weight'   => true,              
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '30px',
                    'line-height' => '40px',
					'letter-spacing'=> '0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h2_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H2 Headers Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false,  
				'text-transform'=> true, 
				'font-weight'   => true,             
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '26px',
                    'line-height' => '36px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h3_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H3 Headers Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,  
				'font-weight'   => true,             
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '24px',
                    'line-height' => '34px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h4_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H4 Headers Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false, 
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '22px',
                    'line-height' => '30px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h5_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H5 Headers Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false, 
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true, 
				'font-weight'   => true,              
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '30px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h6_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H6 Headers Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
				'raw'	=> esc_html__( 'Page Title Bar Typography', 'writepress' ),
				'id'	=> 'page_title_bar_typography',
				'type'	=> 'info',
			),
			array(
                'id'				=> 'page_titlebar_typography',
                'type'				=> 'typography',
                'title'				=> esc_html__( 'Typography', 'writepress' ),
				'font-backup'		=> false,
				'subsets' 			=> false,
                'font-size'			=> true,
                'line-height'		=> true, 
                'letter-spacing'	=> true, 
                'color'				=> false,
                'preview'			=> true, 
				'text-align'		=> false,
				'text-transform'	=> true,
				'font-weight'		=> true,
                'subtitle'			=> esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'			=> array(
                    'font-style'	=> 'normal',
                    'font-family'	=> 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'		=> true,
                    'font-size'		=> '30px',
                    'line-height'	=> '36px',
					'letter-spacing'=> '0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
				'raw'	=> esc_html__( 'Blog Typography', 'writepress' ),
				'id'	=> 'blog_typography',
				'type'	=> 'info',
			),
			array(
                'id'          => 'single_post_title_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Title Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '28px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'post_meta_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Post Meta Typography', 'writepress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'writepress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Abel',
					'font-weight' => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '12px',
                    'line-height' => '16px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
        )
		
    ) );
	
	// -> Colors Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Colors', 'writepress' ),
        'id'               => 'zolo_colors',
        'subtitle'             => esc_html__( 'These are really basic fields!', 'writepress' ),
        'icon'             => 'el el-brush',
		'fields'           => array(
			array(
				'title'			=> esc_html__('Primary Color', 'writepress'),
				'subtitle'		=> esc_html__('Controls several items, ex: link hovers, highlights, and more.', 'writepress'),
				'id'			=> 'primary_color',
				'default'		=> '#f82eb3',
				'type'			=> 'color',
				'transparent'	=> false,
			),
			array(
				'id'       => 'body-link-color',
				'type'     => 'link_color',
				'title'    => esc_html__('Body Links Color Option', 'writepress'),
				'subtitle' => esc_html__('Only color validation can be done on this field type', 'writepress'),
				'active'   => false,
				'default'  => array(
				'regular'  => '#888888',
				'hover'    => '#333333',
				),
			),
		)
    ) );
	
	// -> Blog Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'writepress' ),
        'id'               => 'zolo_blog',
        'subtitle'             => esc_html__( 'These are really basic fields!', 'writepress' ),
        'icon'             => 'el el-file-edit'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Page Layout', 'writepress' ),
        'id'               => 'zolo_blog_page_layout',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__('Blog Page Title','writepress'),
					'subtitle'	=> esc_html__('This text will display in the page title bar of the assigned blog page.','writepress'),
					'id'		=> 'blog_title',
					'type'		=> 'text',
					'default'	=> 'Blog',
				),
				array(
					'title'		=> esc_html__('Page Title Bar Show/Hide', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to show the page title bar for the assigned blog page in "settings > reading"', 'writepress'),
					'id'		=> 'blog_show_page_title_bar',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),			
				array( 
					'title'		=> esc_html__('Blog Layout', 'writepress'),
					'subtitle'	=> esc_html__('Select the layout for the assigned blog page in settings > reading.', 'writepress'),
					'id'		=> 'blog_layout',
					'type'		=> 'select',
					'options'	=> array(
						'small'		=> esc_html__('Small','writepress'),
						'medium'	=> esc_html__('Medium','writepress'),
						'large'		=> esc_html__('Large','writepress'),
						'grid'		=> esc_html__('Grid','writepress'),
						'masonry'	=> esc_html__('Masonry','writepress'),
					),
					'default'	=> 'masonry',
				),
				array( 
					'title'		=> esc_html__('Blog Archive/Category Layout', 'writepress'),
					'subtitle'	=> esc_html__('Select the layout for the blog archive/category pages.', 'writepress'),
					'id'		=> 'blog_archive_layout',
					'type'		=> 'select',
					'options'	=> array(
						'small'		=> esc_html__('Small','writepress'),
						'medium'	=> esc_html__('Medium','writepress'),
						'large'		=> esc_html__('Large','writepress'),
						'grid'		=> esc_html__('Grid','writepress'),
						'masonry'	=> esc_html__('Masonry','writepress'),
					),
					'default'		=> 'masonry',
				),
				array( 
					'title'		=> esc_html__('Grid/Masonry Layout # of Columns', 'writepress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'writepress'),
					'id'		=> 'blog_grid_columns',					
					'type'		=> 'select',
					'options'	=> array(
						'2' => esc_html__('2', 'writepress'),
						'3' => esc_html__('3','writepress'),
						'4' => esc_html__('4','writepress'),
						'5' => esc_html__('5','writepress'),
						'6' => esc_html__('6','writepress'),
					),
					'default'	=> '2',
				),
				array(
					'title'		=> esc_html__('Post title position', 'writepress'),
					'subtitle'	=> esc_html__('Show Post title below or above featured image', 'writepress'),
					'id'		=> 'post_title_position',					
					'type'		=> 'select',
					'options'	=> array(
						'above' => esc_html__('Above','writepress'),
						'below' => esc_html__('Below','writepress'),
					),
					'default'	=> 'above',
				),
				array(
					'title'		=> esc_html__('Post title alignment', 'writepress'),
					'subtitle'	=> esc_html__('Please select post title alignment', 'writepress'),
					'id'		=> 'post_title_alignment',
					'type'		=> 'select',
					'options'	=> array(
						'left'		=> esc_html__('Left','writepress'),
						'center'	=> esc_html__('Center','writepress'),
						'right'		=> esc_html__('Right','writepress'),
					),
					'default'	=> 'left',
				),
				array(
					'title'		=> esc_html__('Post title separator Show/Hide', 'writepress'),
					'subtitle'	=> esc_html__('Select to show or hide post title separator', 'writepress'),
					'id'		=> 'post_title_separator_show_hide',
					'type'		=> 'select',
					'options'	=> array(
						'show' => esc_html__('Show','writepress'),
						'hide' => esc_html__('Hide','writepress'),
					),
					'default'	=> 'hide',
				),
				array(
					'title'		=> esc_html__('Post title separator Image', 'writepress'),
					'id'		=> 'post_title_separator_img',
					'type'		=> 'media',					
					'required'	=> array( 
						array('post_title_separator_show_hide', '=', 'show'),
					),
				),
				array(
					'title'		=> esc_html__('Category position', 'writepress'),
					'subtitle'	=> esc_html__('Select to show category above or below the post title', 'writepress'),
					'id'		=> 'post_category_position',					
					'type'		=> 'select',
					'options'	=> array(
						'above' => esc_html__('Above','writepress'),
						'below' => esc_html__('Below','writepress'),
					),
					'default'	=> 'above',
				),
				array(
					'title'		=> esc_html__('Category design', 'writepress'),
					'subtitle'	=> esc_html__('Please choose category design', 'writepress'),
					'id'		=> 'post_category_design',
					'type'		=> 'select',
					'options'	=> array(
						'box'		=> esc_html__('Box','writepress'),
						'rounded'	=> esc_html__('Rounded','writepress'),
						'image'		=> esc_html__('Image','writepress'),
						'none'		=> esc_html__('None','writepress'),
					),
					'default'	=> 'box',
				),
				array(
					'title'		=> esc_html__('Image for category design', 'writepress'),
					'id'		=> 'blog_category_design_img',
					'type'		=> 'media',					
					'required'	=> array( 
						array('post_category_design', '=', 'image'),
					),
				),
				array(
					'title'		=> esc_html__('Excerpt Length','writepress'),
					'subtitle'	=> esc_html__('Insert the number of words you want to show in the post excerpts.','writepress'),
					'id'		=> 'excerpt_length_blog',
					'type'		=> 'text',
					'default'	=> '55',
				),
				array(
					'title'		=> esc_html__('Continue Reading Show/Hide', 'writepress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'writepress'),
					'id'		=> 'post_continue_reading_show_hide',
					'type'		=> 'select',
					'options'	=> array(
						'show'	=> esc_html__('Show','writepress'),
						'hide'	=> esc_html__('Hide','writepress'),
					),
					'default'	=> 'show',
				),
				array(
					'title'		=> esc_html__('Modify the Continue Reading text ', 'writepress'),
					'id'		=> 'post_continue_reading_modify',
					'default'	=> esc_html__('Continue Reading','writepress'),
					'type'		=> 'text',
					'required'	=> array( 
						array('post_continue_reading_show_hide', '=', 'show'),
					),
				),
				array(
					'title'		=> esc_html__('Post social sharing Show/Hide', 'writepress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'writepress'),
					'id'		=> 'post_social_sharing_show_hide',					
					'type'		=> 'select',
					'options'	=> array(
						'show' => esc_html__('Show','writepress'),
						'hide' => esc_html__('Hide','writepress'),
					),
					'default'	=> 'show',
				),
				
				array(
					'title'		=> esc_html__('Blog Post Design', 'writepress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'writepress'),
					'id'		=> 'blog_post_design',					
					'type'		=> 'select',
					'options'	=> array(
						'none'	=> esc_html__('None','writepress'),
						'box'	=> esc_html__('Box','writepress'),
						'box_withoutpadding' => 'Box Without Padding',
					),
					'default'	=> 'none',
				),
				array(
					'title'		=> esc_html__('Post separator Show/Hide', 'writepress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'writepress'),
					'id'		=> 'post_separator_show_hide',					
					'type'		=> 'select',
					'options'	=> array(						
						'show' => esc_html__('Show','writepress'),
						'hide' => esc_html__('Hide','writepress'),				
					),
					'default'	=> 'hide',
				),
				array(
					'title'		=> esc_html__('Post separator Image', 'writepress'),
					'id'		=> 'post_separator_img',
					'type'		=> 'media',					
					'required' => array( 
						array('post_separator_show_hide', '=', 'show'),
					),
				),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Single Post', 'writepress' ),
        'id'               => 'zolo_blog_single_post',
        'subsection'       => true,
        'fields'           => array(
			array(
				'title'		=>  esc_html__( 'Single Post Layout Style', 'writepress' ),
				'subtitle'	=>  esc_html__( 'Select sidebar position.', 'writepress' ), 
				'id'		=> 'single_post_layout_style',
				'type'     => 'image_select',
				'options'  => array( 
					'layout_style1'	=> array(
					'alt'   => esc_html__('layout_style1', 'writepress' ),
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout1.jpg',
					),      	
					'layout_style2'	=> array(
					'alt'   => esc_html__('layout_style2', 'writepress' ),
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout2.jpg',
					),						
					'layout_style3'	=> array(
					'alt'   => esc_html__('layout_style3', 'writepress' ),
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout3.jpg',
					),
					'layout_style4'	=> array(
					'alt'   => esc_html__('layout_style4', 'writepress' ),
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout4.jpg',
					),
					'layout_style5'	=> array(
					'alt'   => esc_html__('layout_style5', 'writepress' ),
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout5.jpg',
					),
					'layout_style6'	=> array(
					'alt'   => esc_html__('layout_style6','writepress' ),
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout6.jpg',
					),
				),
				'default'	=> 'layout_style1',
				
			),
			array(				
					'title'		=> esc_html__( 'Single Post Title Bar','writepress' ),
					'subtitle' 	=> esc_html__( 'Controls how the single post title bar displays. ','writepress' ),
					'id' 		=> 'single_post_title_bar',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'off',
				),
			array(
				'title'          => esc_html__( 'Single Post Content Max Width', 'writepress' ),
				'id'             => 'single_post_layout_width',
				'type'           => 'dimensions',
				'units'          => array( 'px'),
				'units_extended' => 'true',
				'height'         => false,
				'default'        => array(
					'width'	=> '900',
				),
				'required' => array('single_post_layout_style', '!=', 'layout_style1'),
			),
			array(
				'title'			=> esc_html__( 'Single Post Title Position', 'writepress' ),
				'id'			=> 'single_post_title_position',
				'type'			=> 'button_set',
				'options'		=> array(
					'title_position_middle' => esc_html__( 'Middle', 'writepress' ),
					'title_position_bottom' => esc_html__( 'Bottom', 'writepress' ),
				),
				'default'  => 'title_position_middle',
				'required' => array('single_post_layout_style', '=', 'layout_style4'),
			),
			array(
				'title'			=> esc_html__( 'Post Meta', 'writepress' ),
				'subtitle'		=> esc_html__( 'Turn on to display post meta on blog posts.', 'writepress' ),
				'id'			=> 'post_meta',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',	
			),
			array(
				'title'		=> esc_html__( 'Featured Image / Video on Single Post Page', 'writepress' ),
				'subtitle'	=> esc_html__( 'Turn on to display featured images and videos on single blog posts.', 'writepress' ),
				'id'		=> 'featured_images_single',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
			),
			array(
				'title'		=> esc_html__( 'Post Title', 'writepress' ),
				'subtitle'	=> esc_html__( 'Turn on to display the post title that goes below the featured image area.', 'writepress' ),
				'id'		=> 'blog_post_title',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
			),
			array(
				'title'		=> esc_html__( 'Disable Previous/Next Pagination', 'writepress' ),
				'subtitle'	=> esc_html__( 'Turn on to display the previous/next post pagination for single blog posts.', 'writepress'),
				'id'		=> 'blog_pn_nav',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'writepress' ),
					'off'   => esc_html__( 'OFF', 'writepress' ),
				),
				'default'     => 'on',
			),
			array(
				'title'    => esc_html__( 'Navigation Style', 'writepress' ),
				'subtitle' => esc_html__( 'Controls the Navigation style.', 'writepress' ),
				'id'       => 'post_navigation_style',
				'type'     => 'button_set',
				'options'  => array(
					'style1' => esc_html__( 'Style 1', 'writepress' ),
					'style2' => esc_html__( 'Style 2', 'writepress' ),
					'style3' => esc_html__( 'Style 3', 'writepress' ),
					'style4' => esc_html__( 'Style 4', 'writepress' ),
				),
				'default'  => 'style1',
				'required' => array('blog_pn_nav', '=', 'on'),
				),
				array( 
					'title'			=> esc_html__('Navigation Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the Font color of the Navigation.', 'writepress'),
					'id'			=> 'post_navigation_font_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#888888',
						'hover'   => '#333333',
					),
					'required' => array('post_navigation_style', '!=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the background color of the Navigation.', 'writepress'),
					'id'			=> 'post_navigation_bg_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#f7f7f7',
						'hover'   => '#eeeeee',
					),
					'required' => array('post_navigation_style', '!=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the font color of the Navigation.', 'writepress'),
					'id'			=> 'post_navigation_font_color4-w',
					'type'			=> 'color',
					'default'  		=> '#ffffff',
					'transparent'	=> false,
					'required' 		=> array('post_navigation_style', '=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Image Overlay Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the Overlay color of the Navigation.', 'writepress'),
					'id'			=> 'post_navigation_overlay_color',
					'type'			=> 'color',
					'default'  		=> '#888888',
					'transparent'	=> false,
					'required' => array('post_navigation_style', '=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Button link source', 'writepress'),
					'id'			=> 'post_navigation_button_link_source',
					'type'			=> 'select',
					'options' 		=> array(
						'page' 		=> esc_html__('Page', 'writepress'),
						'url' 		=> esc_html__('Custom url', 'writepress'),
					),
					'default'  		=> 'select',
					'required' => array('post_navigation_style', '=', 'style2'),
				),
				array( 
					'title'			=> esc_html__('Navigation Button link source', 'writepress'),
					'id'			=> 'post_navigation_button_link_source',
					'type'			=> 'select',
					'options' 		=> array(
						'page' 		=> esc_html__('Page', 'writepress'),
						'url' 		=> esc_html__('Custom url', 'writepress'),
					),
					'default'  		=> '',
					'required' => array('post_navigation_style', '=', 'style2'),
				),
				array( 
					'title'			=> esc_html__('Page select', 'writepress'),
					'id'			=> 'post_navigation_page_select',
					'type'			=> 'select',
					'data'     		=> 'pages',
					'required' => array('post_navigation_button_link_source', '=', 'page'),
				),
				array( 
					'title'			=> esc_html__('Page url', 'writepress'),
					'id'			=> 'post_navigation_page_url',
					'type'			=> 'text',
					'validate' 		=> 'url',
					'default'  		=> '',
					'required' => array('post_navigation_button_link_source', '=', 'url'),
				),
				array(
					'title'		=> esc_html__( 'Author Info Box', 'writepress' ),
					'subtitle'	=> esc_html__( 'Turn on to display the author info box below posts.', 'writepress' ),
					'id'		=> 'post_author_info',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__( 'Social Sharing Box', 'writepress' ),
					'subtitle'	=> esc_html__( 'Turn on to display the social sharing box.', 'writepress' ),
					'id'		=> 'social_sharing_box',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__( 'Related Posts', 'writepress' ),
					'subtitle'	=> esc_html__( 'Turn on to display related posts.', 'writepress' ),
					'id'		=> 'related_posts',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__( 'Comments', 'writepress' ),
					'subtitle'	=> esc_html__( 'Turn on to display comments.', 'writepress' ),
					'id'		=> 'blog_comments',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Styling', 'writepress' ),
        'id'               => 'zolo_blog_styling',
        'subsection'       => true,
        'fields'           => array(
            	
				array(
					"title"			=> esc_html__("Category Item Font Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the font color of the Category item.", "writepress"),
					"id"			=> "post_category_font",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					)
				),
				array(
					"title"			=> esc_html__("Category item Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the background color of the Category item.", "writepress"),
					"id"			=> "post_category_bg",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,					
				),
				array(
					"title"			=> esc_html__("Category item Hover Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the background color of the Category item.", "writepress"),
					"id"			=> "post_category_bg_hover",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(84,159,252,0.0)',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Category item Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the Category item.", "writepress"),
					"id"			=> "post_category_border",
					'type'			=> 'color_alpha',
					'default'  		=> '#757575',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Category item Hover Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the Category item hover.", "writepress"),
					"id"			=> "post_category_border_hover",
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Font Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the font color of the continue reading button.", "writepress"),
					"id"			=> "post_continuereading_font",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					)
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the background color of the continue reading button.", "writepress"),
					"id"			=> "post_continuereading_bg",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,				
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Hover Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the background color of the continue reading button hover.", "writepress"),
					"id"			=> "post_continuereading_bg_hover",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(84,159,252,0.0)',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the continue reading button.", "writepress"),
					"id"			=> "post_continuereading_border",
					'type'			=> 'color_alpha',
					'default'  		=> '#757575',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Hover Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the continue reading button hover.", "writepress"),
					"id"			=> "post_continuereading_border_hover",
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),				
				array( 
					'title'			=> esc_html__('Box Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the background color of the grid box.', 'writepress'),
					'id'			=> 'bloggrid_box_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(255,255,255,0.9)',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Box Shadow Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the shadow color of the grid box.', 'writepress'),
					'id'			=> 'bloggrid_box_shadow_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.15)',
					'transparent'	=> false,
				),
				array( 
					'title'			=> esc_html__('Pagination Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the background color of the Pagination.', 'writepress'),
					'id'			=> 'Pagi_background_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#eeeeee',
						'hover'   => '',
					)
				),
				array(
					'title'			=> esc_html__('Pagination Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the font color of the Pagination.', 'writepress'),
					'id'			=> 'Pagi_font_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#333333',
						'hover'   => '#ffffff',
					)
				),
				array(
					"title"			=> esc_html__("Pagination border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the Pagination.", "writepress"),
					"id"			=> "Pagi_border_color",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#e1e1e1',
						'hover'   => '#cccccc',
					)
				),
				array(
					'title'			=> esc_html__('Pagination Font Size', 'writepress'),
					'subtitle'		=> esc_html__("Insert without 'px' ex: 12", "writepress"),
					'id'			=> 'pagination_font_size',
					'default'		=> '12',
					'type'			=> 'text',
				),
				array(
					'raw'			=> esc_html__('Social Share Options','writepress' ),
					'id'			=> 'social_share_options',
					'icon'			=> true,
					'type'			=> 'info',					
				),
				array(				
					'title'		=> esc_html__( 'Social Share Style','writepress' ),
					'id' 		=> 'social_share_style',
					'type'     	=> 'button_set', 				
					'options' => array(
						'default' => 'Default',
						'metro'   => 'Metro', 
					), 
					'default' => 'default',
				),	
				array(
					"title"			=> esc_html__("Social Share Font Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the font color of the social share.", "writepress"),
					"id"			=> "post_social_share_font",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					),
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				array(
					"title"			=> esc_html__("Social Share Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the background color of the Social Share.", "writepress"),
					"id"			=> "post_social_share_bg",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				
				array(
					"title"			=> esc_html__("Social Share Hover Background Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the background color of the social share hover.", "writepress"),
					"id"			=> "post_social_share_bg_hover",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(84,159,252,0.0)',
					'transparent'	=> false,
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				array(
					"title"			=> esc_html__("Social Share Border Color", "writepress"),
					"subtitle"		=> esc_html__("Controls the border color of the social share.", "writepress"),
					"id"			=> "post_social_share_border",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					),
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				array(
					'title'		=> esc_html__('Social Sharing Border Radius', 'writepress'),
					"subtitle"	=> esc_html__("Enter the value without px. e.g 5px.", "writepress"),
					'id'		=> 'post_social_sharing_border_radius',
					'default'	=> '', 
					'type'		=> 'text',
				),
        )
    ) );
	
	// -> Social Section	
    Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Social Media', 'writepress' ),
        'id'				=> 'zolo_social_section',
        'subtitle'			=> esc_html__( 'These are really basic fields!', 'writepress' ),
        'icon'				=> 'el el-share-alt'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Media', 'writepress' ),
        'id'               => 'zolo_social_media',
        'subsection'       => true,
        'fields'           => array(            	
				array(
					'title'			=> esc_html__( 'Facebook', 'writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Facebook icon. Leave blank to hide icon.', 'writepress' ),
					'id'			=> 'facebook_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Flickr','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Flickr icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'flickr_link',
					'type'			=> 'text',					
				),
				array(
					'title'			=> esc_html__( 'RSS','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the RSS icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'rss_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Twitter','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Twitter icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'twitter_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Vimeo','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Vimeo icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'vimeo_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Youtube','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Youtube icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'youtube_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Instagram','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Instagram icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'instagram_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Pinterest','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Pinterest icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'pinterest_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'Tumblr','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Tumblr icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'tumblr_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Google+','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Google+ icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'google_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Dribbble','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Dribbble icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'dribbble_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Digg','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Digg icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'digg_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'LinkedIn','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the LinkedIn icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'linkedin_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Skype','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Skype icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'skype_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Deviantart','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Deviantart icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'deviantart_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Yahoo','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Yahoo icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'yahoo_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'Reddit','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Redditt icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'reddit_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Dropbox','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Dropbox icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'dropbox_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'Soundcloud','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Soundcloud icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'soundcloud_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'VK','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the VK icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'vk_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Email Address','writepress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the mail icon. Leave blank to hide icon.','writepress' ),
					'id'			=> 'email_link',
					'type'			=> 'text',
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Sharing Box', 'writepress' ),
        'id'               => 'zolo_social_sharing_box',
        'subsection'       => true,
        'fields'           => array(  
		
				array(
					'title'		=> esc_html__( 'Sharing Box Tagline', 'writepress' ),
					'subtitle'	=> esc_html__( 'Insert a tagline for the social sharing boxes.', 'writepress' ),
					'id'		=> 'sharing_social_tagline',
					'default'	=> esc_html__( 'Share This Story, Choose Your Platform!', 'writepress' ),
					'type'		=> 'text',
					),       	
				array(
					'title'		=> esc_html__('Facebook', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the facebook sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_facebook',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('Twitter', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the twitter sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_twitter',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('LinkedIn', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the linkedin sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_linkedin',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('Google Plus', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the g+ sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_google',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('Tumblr', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the tumblr sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_tumblr',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('Pinterest', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the pinterest sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_pinterest',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
				array(
					'title'		=> esc_html__('Email', 'writepress'),
					'subtitle'	=> esc_html__('Turn on to display the email sharing icon in blog posts.', 'writepress'),
					'id'		=> 'sharing_email',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'writepress' ),
						'off'   => esc_html__( 'OFF', 'writepress' ),
					),
					'default'     => 'on',
				),
        )
    ) );
	
	
	// -> Contact Form Section
	// check if contact form 7 plugin installed
	
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Contact Form', 'writepress' ),
        'id'				=> 'zolo_contact_form',
		'icon'				=> 'el el-address-book',
        'fields'			=> array(
				array( 
					'title'			=> esc_html__('Contact Form Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Select a color for the Contact Form Text Color.', 'writepress'),
					'id'			=> 'contact_form_text_color',
					'default'		=> '#747474',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Contact Form Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Contact Form Input field Border Color.', 'writepress'),
					'id'			=> 'contact_form_input_bor_color',
					'type'			=> 'color_alpha',
					'default'  		=> '#cccccc',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Input Field Background Color", "writepress"),
					"subtitle"		=> esc_html__("Contact Form Input field Background Color.", "writepress"),
					"id"			=> "contact_form_input_bg_color",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(255,255,255,0.0)',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Button Text Color", "writepress"),
					"subtitle"		=> esc_html__("Contact Form Button text Color.", "writepress"),
					"id"			=> "contact_form_button_font_color",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#ffffff',
						'hover'   => '#F6F6F6',
					)
				),
				array(
					'title'			=> esc_html__('Button Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Contact Form Button Background Color.', 'writepress'),
					'id'			=> 'contact_form_button_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Button Hover Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Contact Form Button Background Color.', 'writepress'),
					'id'			=> 'contact_form_button_bg_color_h',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Button Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Contact Form Border Background Color.', 'writepress'),
					'id'			=> 'contact_form_button_bor_color',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Button Hover Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Contact Form Border Background Color.', 'writepress'),
					'id'			=> 'contact_form_button_bor_color_h',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,				
				),
        )
    ) );
	
	// check if woocommerce plugin installed
   
	// -> Woocommerce Section	
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Woocommerce', 'writepress' ),
        'id'				=> 'zolo_woocommerce',
		'icon'				=> 'el el-shopping-cart',
        'fields'			=> array(
            	array(
					'id'		=> 'woocommerce_info',
					'icon'		=> true,
					'type'		=> 'info',
					'raw'		=> esc_html__('Shop Page','writepress'),
				),
				array(
					'title'			=> esc_html__('Shop Page Layout','writepress'),
					'subtitle'		=> esc_html__('Select Shop page layout','writepress'),
					'id'			=> 'shop_page_layout',
					'default'		=> 'rightsidebar',
					'type'			=>'select',
					'options'		=> array(
						'leftsidebar'	=> esc_html__('Left Sidebar', 'writepress'),
						'rightsidebar'	=> esc_html__('Right Sidebar', 'writepress'),						
						'fullwidth'		=> esc_html__('Full Width', 'writepress'),
					),
				),
				array(
					'title'			=> esc_html__('Woocommerce Number of Products per Page', 'writepress'),
					'subtitle'		=> esc_html__('Insert the number of posts to display per page.', 'writepress'),
					'id'			=> 'woo_items',
					'default'		=> '12',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__('Woocommerce Number of Product Columns', 'writepress'),
					'subtitle'		=> esc_html__('Insert the number of products to display per page.', 'writepress'),
					'id'			=> 'woocommerce_shop_page_columns',
					'default'		=> '4',
					'type'			=> 'select',
					'options'		=> array( 
						'2' => esc_html__('2', 'writepress'),
						'3' => esc_html__('3', 'writepress'),
						'4' => esc_html__('4', 'writepress'),
						'5' => esc_html__('5', 'writepress'),
						'6' => esc_html__('6', 'writepress'),			   
					),
				),
				array(
					'title'			=> esc_html__('Woocommerce Related/Up-Sell/Cross-Sell Product Number of Columns', 'writepress'),
					'subtitle'		=> esc_html__('Select the number of columns for the related and up-sell products on single post pages and cross-sells on cart page.', 'writepress'),
					'id'			=> 'woocommerce_related_columns',
					'default'		=> '4',
					'type'			=> 'select',
					'options' => array( 
						'2' => esc_html__('2', 'writepress'),
						'3' => esc_html__('3', 'writepress'),
						'4' => esc_html__('4', 'writepress'),
						'5' => esc_html__('5', 'writepress'),
						'6' => esc_html__('6', 'writepress'),					   
						),
				),
				array(
					'id'			=> 'woocommerce_style',
					'icon'			=> true,
					'type'			=> 'info',
					'raw'			=> esc_html__('Shop Page Style','writepress'),
				),
				array(
					'title'			=> esc_html__('Product Box Background Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the background color of the Product Box', 'writepress'),
					'id'			=> 'woo_product_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> '#ffffff',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Product Box Border Color', 'writepress'),
					'subtitle'		=> esc_html__('Controls the Border color of the Product Box', 'writepress'),
					'id'			=> 'woo_product_bor_color',
					'default'		=> '#e8e8e8',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Product Image Overlay Background and Opacity', 'writepress'),
					'subtitle'		=> esc_html__('Controls the background color and opacity of the Product Box.', 'writepress'),
					'id'			=> 'woo_product_overlaybg_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.5)',
					'transparent'	=> false,					
				),
				array(
					'title'			=> esc_html__('WooCommerce Button Color', 'writepress'),
					'subtitle'		=> esc_html__('Select color', 'writepress'),
					'id'			=> 'woo_product_button_color',
					'default'		=> '',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'id'			=> 'mini_cart_style',
					'icon'			=> true,
					'type'			=> 'info',
					'raw'			=> esc_html__('Mini Cart Style','writepress'),
				),
				array(
					'title'			=> esc_html__('Mini Cart Box Color', 'writepress'),
					'subtitle'		=> esc_html__('Select color', 'writepress'),
					'id'			=> 'woo_minicart_box_color',
					'default'		=> '#ffffff',
					'type'			=> 'color_alpha',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Font Color', 'writepress'),
					'subtitle'		=> esc_html__('Select color', 'writepress'),
					'id'			=> 'woo_minicart_font_color',
					'default'		=> '#555555',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Separator Color', 'writepress'),
					'subtitle'		=> esc_html__('Select color', 'writepress'),
					'id'			=> 'woo_minicart_separator_color',
					'default'		=> 'rgba(0,0,0,0.08)',
					'type'			=> 'color_alpha',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Button Color', 'writepress'),
					'subtitle'		=> esc_html__('Select color', 'writepress'),
					'id'			=> 'woo_minicart_button_bg_color',
					'default'		=> '',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Button Text Color', 'writepress'),
					'subtitle'		=> esc_html__('Select color', 'writepress'),
					'id'			=> 'woo_minicart_button_text_color',
					'default'		=> '#ffffff',
					'type'			=> 'color',
					'transparent'	=> false,
				),
        )
    ) );
	
   // end check woocommerce
	
	// -> Custom css Section
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom CSS', 'writepress' ),
        'id'               => 'zolo_custom_css',
		'icon'				=> 'el el-css',
        'fields'           => array(
            	array(
					'title'    => esc_html__( 'CSS Code', 'writepress' ),
					'subtitle' => esc_html__( 'Paste your CSS code here.', 'writepress' ),
					'id'       => 'custom_css',
					'type'     => 'ace_editor',
					'mode'     => 'css',
					'theme'    => 'monokai',
					'default'  => "#header{\n   margin: 0 auto;\n}"
            ),			
        )
    ) );

/* ------------------------------------------------------------------------ */
/*  Custom function for writepress's own scripts
/* ------------------------------------------------------------------------ */

function overridePanelScripts() {   
	wp_register_style( 'writepressredux-custom-css', get_template_directory_uri() . '/framework/redux/zt-redux-custom.css', array(), '1', 'all' );    
	wp_enqueue_style('writepressredux-custom-css');
	
	wp_register_script( 'writepressredux-custom-js', trailingslashit( get_template_directory_uri() ) . '/framework/redux/zt-redux-custom.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'writepressredux-custom-js');
}
add_action( 'redux/page/writepress_data/enqueue', 'overridePanelScripts' );