<?php
/**
 * Plugin Name: WP Shutdown
 * Plugin URI: https://github.com/ajudiyabinal/WP-Shutdown
 * Description: To disable all the update Notifications.
 * Version: 1.0
 * Author: binal
 * Author URI: https://github.com/ajudiyabinal
 * License: GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * Requires at least: 4.1
 * Tested up to: 4.9.3
 * Text Domain: wp-shutdown
 * Domain Path: /languages/
 *
 * @package WP Shutdown
 */


function wp_shutdown_handle() {
	global $wp_version;

	return (object) array( 'last_checked' => time(), 'version_checked' => $wp_version );
}

add_filter( 'pre_site_transient_update_core', 'wp_shutdown_handle' );
add_filter( 'pre_site_transient_update_plugins', 'wp_shutdown_handle' );
add_filter( 'pre_site_transient_update_themes', 'wp_shutdown_handle' );

add_action( 'admin_enqueue_scripts', function ( $hook ) {
	wp_enqueue_style( 'wp-shutdown-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), null );
}, 99 );