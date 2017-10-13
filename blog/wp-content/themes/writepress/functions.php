<?php
//writepress setup.
if ( ! defined( 'ABSPATH' ) ) { exit; }
# Including theme components
require_once get_template_directory().'/framework/includes.php';

if (!function_exists('writepress_theme_setup')) {
	function writepress_theme_setup() {	
		// Make theme available for translation
		load_theme_textdomain( 'writepress', get_template_directory() . '/languages' );
	
		// Default WP generated title support
		add_theme_support( 'title-tag' );
		// Default RSS feed links
		add_theme_support( 'automatic-feed-links' );
		
		/*
		 * Switches default core markup for search form, comment form,
		 * and comments to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	
	
		// Post Formats
		add_theme_support( 'post-formats', array( 'audio', 'gallery', 'quote', 'video' ) );
	
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary-nav', __( 'Navigation Menu', 'writepress' ) );
		register_nav_menu( 'top-nav', __( 'Top Menu', 'writepress' ) );
		
				
		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 604, 270, true );
		
		//Thumb Image Size
		add_image_size('writepress_thumb_blog_large', 1066, 546, true);
		add_image_size('writepress_thumb_blog_medium', 900, 622, true);
		add_image_size('writepress_blogstyle_thumb', 700, 737, true);
		add_image_size('writepress_modern3_thumb_big', 533, 546, true);
		add_image_size('writepress_modern4_thumb_big', 1066, 546, true);
		add_image_size('writepress_modern4_thumb_small', 533, 273, true);
	
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
		
		// Enqueue theme scripts and styles
		add_action('wp_enqueue_scripts', 'writepress_themes_scripts', 100);
		
		// Enqueue admin scripts and styles
		add_action('admin_enqueue_scripts', 'writepress_themes_admin_scripts');
		
		if(class_exists('WooCommerce')) {
			writepress_themes_woocommerce_support();
		}
		
		// Visual Composer theme integration
		if ( class_exists( 'Vc_Manager', false ) ) {			
			if ( function_exists( 'vc_set_as_theme' ) ) {
				add_action( 'vc_before_init', 'zolo_vc_set_as_theme' );
				function zolo_vc_set_as_theme() {
					vc_set_as_theme(true);
				}
			}	
		}
	}
}
add_action( 'after_setup_theme', 'writepress_theme_setup' );


if (!function_exists('writepress_themes_woocommerce_support')) {
	/**
	 * WooCommerce support
	 *
	 * @return true
	 */
	function writepress_themes_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		include_once( get_template_directory() . '/framework/woo-config.php' );
	}
}

/**
 * Display favicon
 */
function writepress_favicon() {
	if( function_exists('wp_site_icon') && function_exists('has_site_icon') && has_site_icon() ){
			return;
		}
	global $writepress_data;
	if(isset($writepress_data['fav_icon_image']['url']) && $writepress_data['fav_icon_image']['url']) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url($writepress_data['fav_icon_image']['url']); ?>" type="image/x-icon" />
	<?php endif; ?>
	<?php if(isset($writepress_data['iphone_icon']['url']) && $writepress_data['iphone_icon']['url']) : ?>
	<!-- For iPhone -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($writepress_data['iphone_icon']['url']); ?>">
	<?php endif; ?>
	<?php if(isset($writepress_data['iphone_icon_retina']['url']) && $writepress_data['iphone_icon_retina']['url']) : ?>
	<!-- For iPhone 4 Retina display -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url($writepress_data['iphone_icon_retina']['url']); ?>">
	<?php endif; ?>
	<?php if(isset($writepress_data['ipad_icon']['url']) && $writepress_data['ipad_icon']['url']) : ?>
	<!-- For iPad -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url($writepress_data['ipad_icon']['url']); ?>">
	<?php endif; ?>
	<?php if(isset($writepress_data['ipad_icon_retina']['url']) && $writepress_data['ipad_icon_retina']['url']) : ?>
	<!-- For iPad Retina display -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url($writepress_data['ipad_icon_retina']['url']); ?>">
	<?php endif;
	
}

add_action( 'wp_head', 'writepress_favicon' );


//	Excerpt Length
function writepress_excerpt_length( $length ) {
	global $post,$writepress_data;
	
	$excerpt_length_blog = isset($writepress_data['excerpt_length_blog']) ? $writepress_data['excerpt_length_blog'] : '55';
	
    if ($post->post_type == 'post'){
		return $excerpt_length_blog;
	}else{
    	return 40;
	}
	
}
add_filter('excerpt_length', 'writepress_excerpt_length', 999);

//	Replaces the excerpt "more" text by a link
function writepress_excerpt_more($more) {
	global $post, $writepress_data;
	
	$post_continue_show_hide = isset($writepress_data['post_continue_reading_show_hide']) ? $writepress_data['post_continue_reading_show_hide'] : 'show';
	$post_continue_reading_modify = isset($writepress_data['post_continue_reading_modify']) ? $writepress_data['post_continue_reading_modify'] : __('Читать далее','writepress');
	
    if ($post->post_type == 'post'){
		if($post_continue_show_hide == 'show'){
			return '<span class="read_more_area"><a class="read-more" href="'. esc_url(get_permalink($post->ID)) . '"> '.$post_continue_reading_modify.' </a></span>';
		}
	}else if ($post->post_type == 'tribe_events'){
		return '';
	}else{
		if($post_continue_show_hide == 'show'){
			return '<span class="read_more_area"><a class="read-more" href="'. esc_url(get_permalink($post->ID)) . '"> '.$post_continue_reading_modify.' </a></span>';
		}
	}
}
add_filter('excerpt_more', 'writepress_excerpt_more');


// Register widget areas.
function writepress_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Left Sidebar Widget Area', 'writepress' ),
		'id'            => 'sidebar',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'writepress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );	
	
}
add_action( 'widgets_init', 'writepress_widgets_init' );


if ( ! function_exists( 'writepress_the_attached_image' ) ) {
	//Print the attached image with a link to the next attached image.
	function writepress_the_attached_image() {	
		$attachment_size     = apply_filters( 'writepress_attachment_size', array( 724, 724 ) );
		$next_attachment_url = wp_get_attachment_url();
		$post                = get_post();
		
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		) );
	
		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}
	
			// get the URL of the next image attachment...
			if ( $next_id )
				$next_attachment_url = get_attachment_link( $next_id );
	
			// or get the URL of the first image attachment.
			else
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	
		printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url( $next_attachment_url ),
			the_title_attribute( array( 'echo' => false ) ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}


//Extend the default WordPress body classes.
function writepress_body_class( $body_classes ) {	
	$c_pageID = writepress_current_page_id();
	
	global $writepress_data;
	
	$header_position = isset($writepress_data["header_position"]) ? $writepress_data["header_position"] : 'Top';
	$page_title_100_width = isset($writepress_data["page_title_100_width"]) ? $writepress_data["page_title_100_width"] : 'off';
	
	$header_100_width = isset($writepress_data["header_100_width"]) ? $writepress_data["header_100_width"] : 'off';
	$header_100per_width = get_post_meta( $c_pageID, 'zt_header_100_width', true ); 
	
	$footer_100_width = isset($writepress_data["footer_100_width"]) ? $writepress_data["footer_100_width"] : 'off';
	$footer_100per_width = get_post_meta( $c_pageID, 'zt_footer_100per_width', true ); 
		
	$footer_100_width_upper = isset($writepress_data["footer_100_width_upper"]) ? $writepress_data["footer_100_width_upper"] : 'off';
	$footer_100per_width_upper = get_post_meta( $c_pageID, 'zt_footer_100per_width_upper', true ); 
	
	$footer_100_width_lower = isset($writepress_data["footer_100_width_lower"]) ? $writepress_data["footer_100_width_lower"] : 'off';
	$footer_100per_width_lower = get_post_meta( $c_pageID, 'zt_footer_100per_width_lower', true ); 
	
	$layout = isset($writepress_data["layout"]) ? $writepress_data["layout"] : 'wide';
	
	$option_titlebar_bg_position = isset($writepress_data['titlebar_bg_position']) ? $writepress_data['titlebar_bg_position'] : 'below';
	$sidebar_widgets_style = isset($writepress_data['sidebar_widgets_style']) ? $writepress_data['sidebar_widgets_style'] : 'none';
	$single_post_layout_style = isset($writepress_data['single_post_layout_style']) ? $writepress_data['single_post_layout_style'] : 'layout_style1';
	
	$post_width_100 = get_post_meta( $c_pageID, 'zt_post_width_100', true ); 
	$bg_layout = get_post_meta( $c_pageID, 'zt_bg_layout', true ); 
	$titlebar_bg_position  = get_post_meta($c_pageID, 'zt_titlebar_bg_position', true ); 
	$page_single_post_layout_style  = get_post_meta($c_pageID, 'zt_single_post_layout_style', true );	
	
	
	if ( ! is_multi_author() )
		$body_classes[] = 'single-author';
		
	if ( ! get_option( 'show_avatars' ) )
		$body_classes[] = 'no-avatars';
		
	if($header_position == 'Top'){
		$body_classes[] = '';
	}elseif($header_position == 'Left'){
		$body_classes[] = 'zolo_left_vertical_header';
	}elseif($header_position == 'Right'){
		$body_classes[] = 'zolo_right_vertical_header';	
	}else{
		$body_classes[] = '';
		}
	//Title Bar width 100% Class
	if($page_title_100_width == 'on'){
		$body_classes[] = 'titlebar_100width';
	}
	//Header width 100% Class
	
	if($header_100per_width == 'yes'){
		$body_classes[] = 'header_100width';
	 }elseif($header_100per_width == 'no'){
		 $body_classes[] = '';
	 }else{
		if($header_100_width == 'on'){
			$body_classes[] = 'header_100width';
		}
	}
	//Footer width 100% Class
	
	if($footer_100per_width == 'yes'){
		$body_classes[] = 'footer_100width';
	 }elseif($footer_100per_width == 'no'){
		 $body_classes[] = '';
	 }else{
		if($footer_100_width == 'on'){
			$body_classes[] = 'footer_100width';
		}
	 }
	 
	//Upper Footer width 100% Class
	
	if($footer_100per_width_upper == 'yes'){
		$body_classes[] = 'footer_100per_upper';
	 }elseif($footer_100per_width_upper == 'no'){
		 $body_classes[] = '';
	 }else{
		if($footer_100_width_upper == 'on'){
			$body_classes[] = 'footer_100per_upper';
		}
	 }
	
	//Lower Footer width 100% Class
	
	if($footer_100per_width_lower == 'yes'){
		$body_classes[] = 'footer_100per_lower';
	 }elseif($footer_100per_width_lower == 'no'){
		 $body_classes[] = '';
	 }else{
		if($footer_100_width_lower == 'on'){
			$body_classes[] = 'footer_100per_lower';
		}
	 }
	 
	//Single Post width 100% Class
	
	if($post_width_100 == 'yes'){
		$body_classes[] = 'post_100width';
	 }
	 
	//Site Layout (Div close in Footer File)
	
		if($bg_layout == 'wide'){        
			$body_classes[] = 'wide_layout';
		}elseif($bg_layout == 'boxed'){
			$body_classes[] = 'boxed_layout';
		}elseif($bg_layout == 'theater'){
			$body_classes[] = 'theater_layout';
		}else{
			if($layout == 'boxed'){
				$body_classes[] = 'boxed_layout';
			}elseif($layout == 'wide'){
				$body_classes[] = 'wide_layout';
			}elseif($layout == 'theater'){
				$body_classes[] = 'theater_layout';
			}	
		}
			
		//TitleBar Background Position
		
		if($titlebar_bg_position == 'below'){
			$body_classes[] = 'titlebar_position_below';
		}elseif($titlebar_bg_position == 'from_top'){
			$body_classes[] = 'titlebar_position_from_top';	
		}else{
			if($option_titlebar_bg_position == "below"){
				$body_classes[] = 'titlebar_position_below';
			}elseif($option_titlebar_bg_position == "from_top"){
				$body_classes[] = 'titlebar_position_from_top';	
			}
		}
	
	//Sidebar widgets design class
	if($sidebar_widgets_style == "none"){
		$body_classes[] = 'sidebar_widget_style_none';
	}else{
		$body_classes[] = 'sidebar_widget_style_box';
	}
	
	//Single Post Style class
	if(is_single() && 'post' == get_post_type() ){	
	
		if($page_single_post_layout_style == 'default' || $page_single_post_layout_style == ''){
			$body_classes[] = 'single_post_'.esc_attr($single_post_layout_style);
		}else{
			$body_classes[] = 'single_post_'.esc_attr($page_single_post_layout_style);
		}
	}	
	
	return $body_classes;
}
add_filter( 'body_class', 'writepress_body_class' );

//Adjust content_width value for video post formats and attachment templates.
function writepress_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'writepress_content_width' );

//Add postMessage support for site title and description for the Customizer.
function writepress_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'writepress_customize_register' );

//Enqueue Javascript postMessage handlers for the Customizer.
function writepress_customize_preview_js() {
	wp_enqueue_script( 'writepress-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'writepress_customize_preview_js' );


/** remove redux menu under the tools **/
add_action( 'admin_menu', 'writepressreduxMenuRemove',12 );
function writepressreduxMenuRemove() {
    remove_submenu_page('tools.php','redux-about');
}

function writepressRemoveDemoModeLink() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'writepressRemoveDemoModeLink');


// writepress dynamic css
if (!function_exists('writepress_dynamic_css_output')) {
	function writepress_dynamic_css_output(){
		include(get_template_directory() .'/assets/css/dynamic_css.php');
	}
}

// WMPL Check
if( defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE') ) { 
	//Disabling WPML’s JS files
	define('ICL_DONT_LOAD_LANGUAGES_JS', true);
}

// Remove shortcode from search
function remove_shortcode_from_search($content) {
  if ( is_search() ) {
    $content = strip_shortcodes( $content );
  }
  return $content;
}
add_filter('the_content', 'remove_shortcode_from_search');


function writepress_google_analytics_tracking_code(){
global $writepress_data;
// Google Analytics
echo isset($writepress_data['google_analytics']) ? wp_kses($writepress_data['google_analytics'], array(
																'script' => array(
																	'type' => array(),
																),
																'noscript' => array()
															)) : ''; 
	
}

// include GA tracking code before the closing head tag
add_action('wp_head', 'writepress_google_analytics_tracking_code');