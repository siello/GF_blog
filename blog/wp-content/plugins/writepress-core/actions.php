<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');


function writepess_contact_methods( $profile_fields ) {
	
	 // Add new fields
	 $profile_fields['author_title']		= 'Designation';
	 $profile_fields['author_facebook']		= 'Facebook ';
	 $profile_fields['author_gplus']		= 'Google+';
	 $profile_fields['author_instagram']	= 'Instagram';
	 $profile_fields['author_linkedin']		= 'LinkedIn';
	 $profile_fields['author_pinterest']	= 'Pinterest';
	 $profile_fields['author_twitter']		= 'Twitter'; 
	 $profile_fields['author_vk']			= 'VK'; 
	 $profile_fields['author_youtube']		= 'Youtube'; 
	 
	 return $profile_fields;
}
add_filter( 'user_contactmethods', 'writepess_contact_methods' );

// Custom Widgets
require_once WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'widgets/widgets.php';

// Default writepress Sidebars
function writepress_default_widget(){
	if( class_exists('Woocommerce') ) {	
	register_sidebar( array(
		'name'          => __( 'Woocommerce Widgets', 'writepress-core' ),
		'id'            => 'woo-widgets',
		'description'   => __( 'Appears in the shop page', 'writepress-core' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title widget-shop-title"><span>',
		'after_title'   => '</span></h3>',
	) );	
	}
	register_sidebar( array(
		'name'          => __( 'Extended Sidebar Widget Area', 'writepress-core' ),
		'id'            => 'extended_sidebar',
		'description'   => __( 'Appears on Extended Sidebar.', 'writepress-core' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	global $writepress_data;  
  	$footer_layout = isset($writepress_data['footer_layout_columns']) ? $writepress_data['footer_layout_columns'] : 'layout1';
	if($footer_layout=='layout1'){
		$footer_layout_columns = 4;
		}elseif($footer_layout=='layout2' || $footer_layout=='layout3' || $footer_layout=='layout4' || $footer_layout=='layout5'){
			$footer_layout_columns = 3;
			}elseif($footer_layout=='layout6' || $footer_layout=='layout7' || $footer_layout=='layout8'){
				$footer_layout_columns = 2;
				}else{
					$footer_layout_columns = 1;
					}
	
	 $columns = $footer_layout_columns + 1;
	 
	 // Register footer widgets
	 for ( $i = 1; $i < $columns; $i++ ) {	
	 	
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Widget %s', 'writepress-core' ), $i ),
			'id'            => 'footer_widget'.$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title footer_widget_title"><span>',
			'after_title'   => '</span></h3>',
		) );
	 }
	
	$footer_upper_columns = isset($writepress_data['footer_upper_columns']) ? $writepress_data['footer_upper_columns'] : '';
	$columns = $footer_upper_columns + 1;

        // Register upper footer widgets
		for ( $i = 1; $i < $columns; $i++ ) {
		
		register_sidebar( array(
			'name'          => sprintf( __( 'Upper Footer Widget %s', 'writepress-core' ), $i ),
			'id'            => 'upper_footer_widget_' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title footer_widget_title"><span>',
			'after_title'   => '</span></h3>',
			) );
		
		}
		
	$footer_lower_columns = isset($writepress_data['footer_lower_columns']) ? $writepress_data['footer_lower_columns'] : '';
	$columns = $footer_lower_columns + 1;

        // Register lower footer widgets
	for ( $i = 1; $i < $columns; $i++ ) {
	
	register_sidebar( array(
		'name'          => sprintf( __( 'Lower Footer Widget %s', 'writepress-core' ), $i ),
		'id'            => 'lower_footer_widget_' . $i,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title footer_widget_title"><span>',
		'after_title'   => '</span></h3>',
		) );
	
	}	
	register_sidebar( array(
		'name'          => __( 'Right Sidebar Widget Area', 'writepress-core' ),
		'id'            => 'right_sidebar',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'writepress-core' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
}
add_action( 'widgets_init', 'writepress_default_widget' );

//Add options to wp admin topbar
function writepress_admin_bar_theme_options() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name', // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'writepress_options', // link ID, defaults to a sanitized title value
		'title' => __('Theme Options', 'writepress-core'), // link title
		'href' => admin_url( 'themes.php?page=writepress_options'), // name of file
		'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
	));
}
add_action( 'wp_before_admin_bar_render', 'writepress_admin_bar_theme_options' );

//Featured Images
if( class_exists( 'kdMultipleFeaturedImages' ) ) {
		$i = 2;

		while($i <= 5) {
			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'post',	  // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'page', // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$i++;
		}

}