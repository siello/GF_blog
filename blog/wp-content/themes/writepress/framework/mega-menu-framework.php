<?php
/**
 * ZOLOcode MegaMenu Functions
 *
 * WARNING: This file is part of the Mega Menu Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @package  ZOLOcode/MegaMenu
 * @author   ThemeZOLOcode
 * @link     http://theme-zolo.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'ZOLOcodeMegaMenuFramework' ) ) {

    /**
     * Main ZOLOcodeMegaMenuFramework Class
     *
     * @since       4.0.0
     */
    class ZOLOcodeMegaMenuFramework {
        public static $_classes;

        function __construct() {
        	add_action( 'zolo_init', 				array( $this, 'include_functions' ) );
        	add_action( 'admin_enqueue_scripts', 	array( $this, 'register_scripts' ) );
        	add_action( 'admin_enqueue_scripts',	array( $this, 'register_stylesheets' ) );

        	do_action( 'zolo_init' );

        } // end __construct()

        public function include_functions() {


			// Load functions
			get_template_part('framework/mega-menus');

			self::$_classes['menus'] = new ZOLOcodeMegaMenu();


        } // end include_functions()

		/**
		 * Register megamenu javascript assets
		 *
		 * @return void
		 *
		 * @since  3.4
		 */
		function register_scripts() {

			// scripts
			wp_enqueue_media();
			wp_register_script( 'zolo-megamenu', get_template_directory_uri(). '/assets/js/mega-menu.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'zolo-megamenu' );
		}

		/**
		 * Enqueue megamenu stylesheets
		 *
		 * @return void
		 *
		 * @since  3.4
		 */
		function register_stylesheets() {

			wp_enqueue_style( 'zolo-megamenu', get_template_directory_uri(). '/assets/css/mega-menu.css', false, '1.0' );

		}



	}

	$zolocore = new ZOLOcodeMegaMenuFramework();

}