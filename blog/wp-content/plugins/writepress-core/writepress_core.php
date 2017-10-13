<?php
/*
Plugin Name: Writepress Core
Plugin URI: http://wpblogtheme.org
Description: Writepress theme extensions plugin contains custom shortcodes for Visual Composer, custom shortcodes, custom sidebars, custom widgets
Version: 1.0.3
Author: Writepress Themes
Author URI: http://wpblogtheme.org
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('WRITEPRESS_EXTENSIONS_PLUGIN_URL',plugins_url().'/writepress-core/');
define('WRITEPRESS_EXTENSIONS_PLUGIN_PATH',plugin_dir_path(__FILE__));

class Writepress_Core {
	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	private static $_instance;
	
	/**
	 * Get the instane of Writepress_Core
	 *
	 * @return self
	 */
	public static function getInstance() {
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	
	/**
	 * Constructor
	 *
	 */
	public function __construct() {
		$theme = wp_get_theme()->get( 'Name' );
		if(substr_count($theme, 'Writepress') > 0) {
			add_action( 'after_setup_theme', array( $this, 'load_writepress_core_text_domain' ) );
			$this->extensionsLoader();
			$this->loadRedux();
			$this->activeCustomizer();
			$this->welcomeWritepress();
			$this->mataboxGenerator();
			$this->multipleFeaturedImages();
			$this->addActions();
			add_action('init', array($this, 'init'), 10);
			add_action('after_setup_theme', array($this, 'addVcCustomElements'));
			$this->sidebarGenerator();
			$this->zillaLikes();
			register_activation_hook( __FILE__, array($this,'writepressReduxHook',) );
		} else {
			add_action('admin_notices', array($this, '_admin_notice__error'));
		}
	}
	
	
	/**
	 * Enables to add hooks in activation process.
	 *
	 */
	public function writepressReduxHook(  ) {
		do_action( 'writepress_activation_hook' );
	}
	
	/**
	 * Callback function for WP init action hook. Loads required objects.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function init() {
		
	}
	/**
	 * Register the plugin text domain.
	 *
	 * @access public
	 * @return void
	 */
	public function load_writepress_core_text_domain() {
		load_plugin_textdomain( 'writepress-core', false, WRITEPRESS_EXTENSIONS_PLUGIN_PATH . '/languages' );
	}
	/*
	 * Add Redux extensions
	 */
	public function extensionsLoader() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'redux_extensions/extensions-loader.php');
	}
	
	/*
	 * Load Redux Core
	 */
	public function loadRedux() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'redux_framework/ReduxCore/framework.php');
	}
	/*
	 * Load Redux Core Required
	 */
	public function activeCustomizer() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'redux_customizer/active-customizer.php');
	}
	/*
	 * Load Writepress Welcome 
	 */
	public function welcomeWritepress() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'writepress_welcome/writepress_welcome.php');
	}
	/*
	 * Load Metabox
	 */
	public function mataboxGenerator() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'metaboxes/metaboxes.php');
	}
	/*
	 * Multiple Featured Images
	 */
	public function multipleFeaturedImages() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'multiple-featured-images/multiple-featured-images.php');
	}
	/*
	 * Register custom Functions
	 */
	public function addActions() {
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'actions.php');
	}
	
	/*
	 * Add custom VC elements
	 */
	public function addVcCustomElements() {
		if ( class_exists( 'Vc_Manager', false ) ) {						
			add_action('admin_enqueue_scripts', 'writepress_vc_styles');
			function writepress_vc_styles() {
				wp_enqueue_style('writepress_vc', WRITEPRESS_EXTENSIONS_PLUGIN_URL.'/vc_custom/css/vc-custom.css', array(), time(), 'all');
			}
			require_once WRITEPRESS_EXTENSIONS_PLUGIN_PATH. 'vc_custom/vc-functions.php';
			require_once WRITEPRESS_EXTENSIONS_PLUGIN_PATH. 'mce/zolo_shortcodes_tinymce.php';
		}
	}
	/*
	 * Sidebar Generator
	 */
	public function sidebarGenerator() {
		// Inlude sidebar generator plugin
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'sidebar_generator.php');
	}	
	/*
	 * Zilla Likes
	 */
	public function zillaLikes() {
		// Include Like plugin
		require_once(WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'zilla-likes.php');
	}
	/*
	 * Admin notice text
	 */
	public function _admin_notice__error() {
		echo '<div class="notice notice-error is-dismissible">';
			echo '<p>'. esc_html__( 'WRITEPRESS Theme Extensions is enabled but not effective. It requires WRITEPRESS theme in order to work.', 'writepress-core' ) .'</p>';
		echo '</div>';
	}
}

$Writepress_Core = new Writepress_Core();