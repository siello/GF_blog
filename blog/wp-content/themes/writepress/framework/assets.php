<?php
/**
 * Scripts and stylesheets
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if (!function_exists('writepress_themes_scripts')) {
	/**
	 * Enqueue front scripts and styles
	 * @global obj $woocommerce
	 */
	function writepress_themes_scripts() {	
		global $writepress_data;
		$theme_info = wp_get_theme();
		
		wp_enqueue_style( 'zt-main-style', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) ); 
		wp_enqueue_style( 'zt-zolocommon', get_template_directory_uri() . '/assets/css/zolocommon.css', array(), $theme_info->get( 'Version' ) );
		wp_enqueue_style( 'zt-header_style', get_template_directory_uri() . '/assets/css/header_style.css', array(), $theme_info->get( 'Version' ) );
		wp_enqueue_style( 'zt-footer_style', get_template_directory_uri() . '/assets/css/footer_style.css', array(), $theme_info->get( 'Version' ) );
		wp_enqueue_style( 'zt-flex-slider', get_template_directory_uri() . '/assets/css/flexslider.css', array(), $theme_info->get( 'Version' ) );
		wp_enqueue_style( 'zt-jquery.fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array(), $theme_info->get( 'Version' ) );
		wp_enqueue_style( 'zt-font-awesome.min', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css', array(), $theme_info->get( 'Version' ) );	
		
		writepress_dynamic_css_output();
		
		// [if lt IE 9] - internet explorer fallback
		wp_enqueue_script( 'ie_html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', null, $theme_info->get( 'Version' ) );	
		wp_script_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );
		
		wp_enqueue_script( 'zt-onclick_menu', get_template_directory_uri() . '/assets/js/onclick-menu.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
		wp_enqueue_script( 'zt-isotope_min', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
		wp_enqueue_script( 'zt-imagesloaded', get_template_directory_uri(). '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
		wp_enqueue_script( 'zt-flex-slider', get_template_directory_uri() . '/assets/js/flexslider.js',array ( 'jquery' ), $theme_info->get( 'Version' ), true );	
		wp_enqueue_script( 'zt-jquery.parallax', get_template_directory_uri() . '/assets/js/jquery.parallax.js',array ( 'jquery' ), $theme_info->get( 'Version' ), true );	
		wp_enqueue_script( 'zt-theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
		
		wp_enqueue_script( 'zt-jquery.fancybox',get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array ( 'jquery' ), $theme_info->get( 'Version' ) );
		wp_enqueue_script( 'zt-main-scripts', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
		
		$header_position = isset($writepress_data["header_position"]) ? $writepress_data["header_position"] : 'Top';
		$header_sticky_opt = isset($writepress_data['header_sticky_opt']) ? $writepress_data['header_sticky_opt'] : 'on';
		$header_sticky_display = isset($writepress_data['header_sticky_display']) ? $writepress_data['header_sticky_display'] : 'section2';
		$header_sticky_effect = isset($writepress_data['header_sticky_effect']) ? $writepress_data['header_sticky_effect'] : 'default';
				
		if($header_position == 'Left' || $header_position == 'Right'){
			wp_enqueue_script( 'zt-vertical_main', get_template_directory_uri() . '/assets/js/vertical.main.js',array ( 'jquery' ), $theme_info->get( 'Version' ), true );
		}
		
		wp_enqueue_script( 'zt-mega_menu_js', get_template_directory_uri(). '/assets/js/megamenu.js' );	
			
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
			
		// Localize the script with new data	
		$local_variables = array(   
			'headerpositionval' => $header_position,
			'header_sticky_opt' => $header_sticky_opt,
			'header_sticky_display' => $header_sticky_display,
			'header_sticky_effect' => $header_sticky_effect,
		);		
		wp_localize_script( 'zt-main-scripts', 'js_local_vars', $local_variables );
		wp_localize_script( 'zt-main-scripts', 'zolo_zilla_likes', array('ajaxurl' => admin_url('admin-ajax.php')) );
		wp_localize_script( 'zt-main-scripts', 'zt_post', array('ajaxurl' => admin_url('admin-ajax.php')) );
			
	}
}
if (!function_exists('writepress_themes_admin_scripts')) {
	/**
	 * Enqueue admin scripts and styles
	 */
	function writepress_themes_admin_scripts() {
		$theme_info = wp_get_theme();
		wp_enqueue_style( 'writepress_theme_dashboard', get_template_directory_uri() . '/assets/css/theme_dashboard.css', array(), $theme_info->get( 'Version' ) );
	}
}