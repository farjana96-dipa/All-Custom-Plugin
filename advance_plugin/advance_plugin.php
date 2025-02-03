<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://farjana-dipa.com
 * @since             1.0.0
 * @package           Advance_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Advance Plugin
 * Plugin URI:        https://advance_plugin.com
 * Description:       Book LIbrary Management Advance Plugin
 * Version:           1.0.0
 * Author:            Farjana Dipa
 * Author URI:        https://farjana-dipa.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advance_plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ADVANCE_PLUGIN_VERSION', '1.0.0' );
define('ADVANCE_PLUGIN_ADMIN_URL',plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advance_plugin-activator.php
 */
function activate_advance_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance_plugin-activator.php';
	$activator = new Advance_plugin_Activator;
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advance_plugin-deactivator.php
 */
function deactivate_advance_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance_plugin-deactivator.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance_plugin-activator.php';
	$activator = new Advance_plugin_Activator;
	$deactivator = new Advance_plugin_Deactivator($activator);
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_advance_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_advance_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advance_plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_advance_plugin() {

	$plugin = new Advance_plugin();
	$plugin->run();

}
run_advance_plugin();
