<?php
/**
 * Press - Custom Post Type
 *
 * (1) Registers Custom Post Type "Press"
 * (2) Includes a basic Archive Page "/press" // over-ride in theme as archive-press.php
 * (3) Includes a basic Press Single Page // over-ride in theme as single-press.php
 *
 * This Plugin follows WordPress Coding Standards and PHP best practices.
 *
 * @package   Post_Type_Press
 * @author    Duri Chitayat <dchitayat@netatwork.com>
 * @link      http://netatwork.com
 * @copyright 2014 Net@Work
 *
 * @wordpress-plugin
 * Plugin Name:       post-type-press
 * Plugin URI:        @TODO
 * Description:       Registers Custom Post Type "Press"
 * Version:           1.0.0
 * Author:            Duri Chitayat
 * Author URI:        http://netatwork.com
 * Text Domain:       post-type-press
 * GitHub Plugin URI: https://github.com/NetatWork/post-type_press
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-name.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-post-type-press.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
register_activation_hook( __FILE__, array( 'Post_Type_Press', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Post_Type_Press', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action( 'plugins_loaded', array( 'Post_Type_Press', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-name-admin.php` with the name of the plugin's admin file
 * - replace Post_Type_Press_Admin with the name of the class defined in
 *   `class-plugin-name-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-post-type-press-admin.php' );
	add_action( 'plugins_loaded', array( 'Post_Type_Press_Admin', 'get_instance' ) );

}
