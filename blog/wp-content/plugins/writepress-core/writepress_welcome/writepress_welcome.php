<?php if ( ! defined( 'ABSPATH' ) ) { exit; } 

if ( ! class_exists( 'writepress_admin' ) ) {

	class writepress_admin{

		function __construct(){

			add_action( 'admin_menu', array( $this, 'writepress_admin_menu' ) );
			add_action( 'admin_head', array( $this, 'writepress_admin_scripts' ) );
			add_action( 'admin_menu', array( $this, 'edit_admin_menus' ) );
			add_action( 'after_switch_theme', array( $this, 'writepress_activation_redirect' ) );

		}


		/**
		 * Add the top-level menu item to the adminbar.
		 */
		function writepress_add_wp_toolbar_menu_item( $title, $parent = FALSE, $href = '', $custom_meta = array(), $custom_id = '' ) {

			global $wp_admin_bar;

			if ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
					return;
				}

				// Set custom ID
				if ( $custom_id ) {
					$id = $custom_id;
				// Generate ID based on $title
				} else {
					$id = strtolower( str_replace( ' ', '-', $title ) );
				}

				// links from the current host will open in the current window
				$meta = strpos( $href, site_url() ) !== false ? array() : array( 'target' => '_blank' ); // external links open in new tab/window
				$meta = array_merge( $meta, $custom_meta );

				$wp_admin_bar->add_node( array(
					'parent' => $parent,
					'id'     => $id,
					'title'  => $title,
					'href'   => $href,
					'meta'   => $meta,
				) );
			}

		}

		/**
		 * Modify the menu
		 */
		function edit_admin_menus() {
			global $submenu;

			if ( current_user_can( 'edit_theme_options' ) ) {
				$submenu['writepress-core'][0][0] = 'Support'; // Change writepress to WELCOME
			}
		}

		/**
		 * Redirect to admin page on theme activation
		 */
		function writepress_activation_redirect() {
			if ( current_user_can( 'edit_theme_options' ) ) {
				wp_redirect(admin_url("admin.php?page=writepress"));
			}
		}


		function writepress_admin_menu(){

			if ( current_user_can( 'edit_theme_options' ) ) {
				// Work around for theme check
				$writepress_menu_page_creation_method    = 'add_menu_page';
				$writepress_submenu_page_creation_method = 'add_submenu_page';

				$welcome_screen = $writepress_menu_page_creation_method( 'Writepress', 'Writepress', 'administrator', 'writepress-core', array( $this, 'writepress_support_tab' ), 'dashicons-writepress-logo', 3 );

				$demos          = $writepress_submenu_page_creation_method( 'writepress-core', __( 'Install Writepress Demos', 'writepress-core' ), __( 'Install Demos', 'writepress-core' ), 'administrator', 'writepress-demos', array( $this, 'writepress_demos_tab' ) );
				$theme_options  = $writepress_submenu_page_creation_method( 'writepress-core', __( 'Theme Options', 'writepress-core' ), __( 'Theme Options', 'writepress-core' ), 'administrator', 'themes.php?page=writepress_options' );

				add_action( 'admin_print_scripts-'.$welcome_screen, array( $this, 'support_screen_scripts' ) );
				add_action( 'admin_print_scripts-'.$demos, array( $this, 'demos_screen_scripts' ) );
			}
		}


		function writepress_support_tab() {
			require_once( WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'writepress_welcome/screens/support.php' );
		}
		
		function writepress_demos_tab() {
			require_once( WRITEPRESS_EXTENSIONS_PLUGIN_PATH.'writepress_welcome/screens/install-demos.php' );
		}


		function writepress_admin_scripts() {
			if ( is_admin() && current_user_can( 'edit_theme_options' ) ) {
			?>
			<style type="text/css">
			@media screen and (max-width: 782px) {
				#wp-toolbar > ul > .writepress-menu {
					display: block;
				}

				/*#wpadminbar .writepress-menu > .ab-item .ab-icon {
					padding-top: 6px !important;
					height: 40px !important;
					font-size: 30px !important;
				}*/
			}
			/*
			#menu-appearance a[href="themes.php?page=writepress_options"] {
				display: none;
			}
			*/
            </style>
            <?php
			}
		}

		function support_screen_scripts(){
			wp_enqueue_style( 'writepress_admin_css', WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/writepress_welcome/css/writepress-admin.css' );
		}

		function demos_screen_scripts(){
			wp_enqueue_style( 'writepress_admin_css', WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/writepress_welcome/css/writepress-admin.css' );
		}

	}

	new writepress_admin;

}

// Omit closing PHP tag to avoid "Headers already sent" issues.
