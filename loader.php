<?php
/**
 * @package DBRL_Hours
 * @wordpress-plugin
 * Plugin Name:       DBRL Branch hours fetcher
 * Version:           1.0.0
 * Description:       Sample code for fetching something use admin ajax.
 * Author:            dbrl_staff
 * Text Domain:       dbrl_hours_tools
 * Domain Path:       /languages
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/dcavins/sample-wpjs-fetch
 * @copyright 2018 DBRL
 */

namespace DBRL_Hours;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

// The main goer.
require_once( plugin_dir_path( __FILE__ ) . 'public/public.php' );

/**
 * Helper function.
 * @return Fully-qualified URI to the root of the plugin.
 */
function get_plugin_base_uri() {
	return plugin_dir_url( __FILE__ );
}

/**
 * Helper function.
 * @return Fully-qualified URI to the root of the plugin.
 */
function get_plugin_base_path() {
	return trailingslashit( dirname( __FILE__ ) );
}

/**
 * Helper function.
 * @return string Current version of the plugin.
 */
function get_plugin_version() {
	return '1.0.0';
}
