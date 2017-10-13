<?php
/*
Plugin Name: Writepress Importer
Plugin URI: http://wpblogtheme.org/demo/writepress/
Description: Writepress Importer Plugin for Writepress Theme
Version: 1.0.2
Author: Writepress Themes
Author URI: https://themeforest.net/user/zplus
*/

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

function enqueue_my_scripts() {
    wp_enqueue_script('writepress_admin_jss', plugin_dir_url(__FILE__) . 'writepress-import.js');
}
add_action('admin_enqueue_scripts', 'enqueue_my_scripts');

// Don't resize images
function writepress_filter_image_sizes( $sizes ) {
	return array();
}
// Hook importer into admin init
add_action( 'wp_ajax_zolo_import_demo_data', 'zolo_importer' );
function zolo_importer() {
	global $wpdb;

	if ( current_user_can( 'manage_options' ) ) {
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
			$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			include $wp_importer;
		}

		if ( !class_exists('WP_Import') ) { // if WP importer doesn't exist
			$wp_import = dirname( __FILE__ ) . '/wordpress-importer.php';
			include $wp_import;
		}

		if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class
			if( ! isset($_POST['demo_type']) || trim($_POST['demo_type']) == '' ) {
				$demo_type = 'main';
			} else {
				$demo_type = $_POST['demo_type'];
			}

			switch($demo_type) {
				case 'demo2':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo2/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo2/theme_options.json';
					$widgets_file = dirname( __FILE__ ) . '/demo2/widget_data.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo3':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo3/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo3/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo4':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo4/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo4/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo5':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo5/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo5/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo6':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo6/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo6/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;	
				case 'demo7':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo7/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo7/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo7/widget_data.json';
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo8':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo8/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo8/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo8/widget_data.json';
					
					// reading settings
					$homepage_title = 'Home';

				break;	
				case 'demo9':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo9/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo9/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo9/widget_data.json';
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo10':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo10/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo10/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo11':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo11/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo11/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;	
				case 'demo12':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo12/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo12/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo13':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo13/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo13/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;	
				case 'demo14':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo14/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo14/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo15':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo15/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo15/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo16':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo16/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo16/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo17':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo17/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo17/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;
				case 'demo18':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo18/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo18/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;	
				case 'demo19':					
					$theme_xml_file = dirname( __FILE__ ) . '/demo19/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo19/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// reading settings
					$homepage_title = 'Home';

				break;		
				default:										
					$theme_xml_file = dirname( __FILE__ ) . '/demo1/writepress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo1/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = true;
					$sidebars = array(
						'about-1' => 'about-1',
						'about-2' => 'about-2',
						'about-3' => 'about-3',
						'about-4' => 'about-4',
						'about-5' => 'about-5',	
						'about-6' => 'about-6',
						'about-7' => 'about-7',	
						'about-8' => 'about-8',				
					);

					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo1/widget_data.json';
					
					// reading settings
					$homepage_title = 'Home';

			}

			add_filter('intermediate_image_sizes_advanced', 'writepress_filter_image_sizes');
				
			$importer = new WP_Import();
			/* Import Posts, Pages, Portfolio Content, FAQ, Images, Menus */
			$theme_xml = $theme_xml_file;
			$importer->fetch_attachments = true;
			ob_start();
			$importer->import($theme_xml);
			ob_end_clean();

			flush_rewrite_rules();			

			// Set imported menus to registered theme locations
			$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
			$menus = wp_get_nav_menus(); // registered menus
			
			if($menus) {
				foreach($menus as $menu) { // assign menus to theme locations
					if( $menu->name == 'Main Menu' ) {
						$locations['primary-nav'] = $menu->term_id;
					} else if( $menu->name == 'Top Menu' ) {
						$locations['top-nav'] = $menu->term_id;
					}
				}
			}

			set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations

			// Import Theme Options
			$theme_options_json = file_get_contents( $theme_options_file );
			$theme_options = json_decode( $theme_options_json, true );
			update_option( 'writepress_data', $theme_options ); // update theme options

			// Add sidebar widget areas
			if($sidebar_exists == true) {
				update_option( 'sbg_sidebars', $sidebars );

				foreach( $sidebars as $sidebar ) {
					$sidebar_class = writepress_name_to_class( $sidebar );
					register_sidebar( array(
					'name'          => $sidebar,
					'id'            => 'writepress-custom-sidebar-' . strtolower( $sidebar_class ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="heading"><h4 class="widget-title">',
					'after_title'   => '</h4></div>',
				) );
				}
			}

			// Add data to widgets
			if( isset( $widgets_file ) && $widgets_file ) {
				$widgets_json = $widgets_file; // widgets data file
				$widgets_json = file_get_contents( $widgets_json );
				$widget_data = $widgets_json;
				$import_widgets = zolo_import_widget_data( $widget_data );
			}


			// Set reading options
			$homepage = get_page_by_title( $homepage_title );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}



			echo 'imported';

			exit;
		}
	}
}

// Parsing Widgets Function
// Thanks to http://wordpress.org/plugins/widget-settings-importexport/
function zolo_import_widget_data( $widget_data ) {
	$json_data = $widget_data;
	$json_data = json_decode( $json_data, true );

	$sidebar_data = $json_data[0];
	$widget_data = $json_data[1];

	foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
		$widgets[ $widget_data_title ] = '';
		foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
			if( is_int( $widget_data_key ) ) {
				$widgets[$widget_data_title][$widget_data_key] = 'on';
			}
		}
	}
	unset($widgets[""]);

	foreach ( $sidebar_data as $title => $sidebar ) {
		$count = count( $sidebar );
		for ( $i = 0; $i < $count; $i++ ) {
			$widget = array( );
			$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
			$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
			if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
				unset( $sidebar_data[$title][$i] );
			}
		}
		$sidebar_data[$title] = array_values( $sidebar_data[$title] );
	}

	foreach ( $widgets as $widget_title => $widget_value ) {
		foreach ( $widget_value as $widget_key => $widget_value ) {
			$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
		}
	}

	$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

	zolo_parse_import_data( $sidebar_data );
}

function zolo_parse_import_data( $import_array ) {
	global $wp_registered_sidebars;
	$sidebars_data = $import_array[0];
	$widget_data = $import_array[1];
	$current_sidebars = get_option( 'sidebars_widgets' );
	$new_widgets = array( );

	foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

		foreach ( $import_widgets as $import_widget ) :
			//if the sidebar exists
			if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
				$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
				$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
				$current_widget_data = get_option( 'widget_' . $title );
				$new_widget_name = zolo_get_new_widget_name( $title, $index );
				$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
					$new_widgets[$title][$new_index] = $widget_data[$title][$index];
					$multiwidget = $new_widgets[$title]['_multiwidget'];
					unset( $new_widgets[$title]['_multiwidget'] );
					$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
					$current_widget_data[$new_index] = $widget_data[$title][$index];
					$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
					$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
					$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
					unset( $current_widget_data['_multiwidget'] );
					$current_widget_data['_multiwidget'] = $multiwidget;
					$new_widgets[$title] = $current_widget_data;
				}

			endif;
		endforeach;
	endforeach;

	if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
		update_option( 'sidebars_widgets', $current_sidebars );

		foreach ( $new_widgets as $title => $content )
			update_option( 'widget_' . $title, $content );

		return true;
	}

	return false;
}

function zolo_get_new_widget_name( $widget_name, $widget_index ) {
	$current_sidebars = get_option( 'sidebars_widgets' );
	$all_widget_array = array( );
	foreach ( $current_sidebars as $sidebar => $widgets ) {
		if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
			foreach ( $widgets as $widget ) {
				$all_widget_array[] = $widget;
			}
		}
	}
	while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
		$widget_index++;
	}
	$new_widget_name = $widget_name . '-' . $widget_index;
	return $new_widget_name;
}

if( function_exists( 'layerslider_import_sample_slider' ) ) {}

// Rename sidebar
function writepress_name_to_class($name){
	$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
	return $class;
}



/*
* Returns all files in directory with the given filetype. Uses glob() for older
* php versions and recursive directory iterator otherwise.
*
* @param string $directory Directory that should be parsed
* @param string $filetype The file type
*
* @return array $files File names that match the $filetype
*/
function zolo_get_import_files( $directory, $filetype ) {
	$phpversion = phpversion();
	$files = array();

	// Check if the php version allows for recursive iterators
	if ( version_compare( $phpversion, '5.2.11', '>' ) ) {
		if ( $filetype != '*' )  {
			$filetype = '/^.*\.' . $filetype . '$/';
		} else {
			$filetype = '/.+\.[^.]+$/';
		}
		$directory_iterator = new RecursiveDirectoryIterator( $directory );
		$recusive_iterator = new RecursiveIteratorIterator( $directory_iterator );
		$regex_iterator = new RegexIterator( $recusive_iterator, $filetype );

		foreach( $regex_iterator as $file ) {
			$files[] = $file->getPathname();
		}
	// Fallback to glob() for older php versions
	} else {
		if ( $filetype != '*' )  {
			$filetype = '*.' . $filetype;
		}

		foreach( glob( $directory . $filetype ) as $filename ) {
			$filename = basename( $filename );
			$files[] = $directory . $filename;
		}
	}

	return $files;
}

// Omit closing PHP tag to avoid "Headers already sent" issues.
