<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sveltekitauth
 * @since             1.0.0
 * @package           Sveltekitauth
 *
 * @wordpress-plugin
 * Plugin Name:       sveltekit
 * Plugin URI:        https://sveltekitauth
 * Description:       sveltekitauth
 * Version:           1.0.0
 * Author:            sveltekitauth
 * Author URI:        https://sveltekitauth
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sveltekitauth
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
define( 'SVELTEKITAUTH_VERSION', '1.0.0' );
define( 'SVELTEKITAUTH_PATH', plugin_dir_path( __FILE__ ) );
define( 'SVELTEKITAUTH_URL', plugins_url('sveltekit') );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sveltekitauth-activator.php
 */
function activate_sveltekitauth() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sveltekitauth-activator.php';
	Sveltekitauth_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sveltekitauth-deactivator.php
 */
function deactivate_sveltekitauth() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sveltekitauth-deactivator.php';
	Sveltekitauth_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sveltekitauth' );
register_deactivation_hook( __FILE__, 'deactivate_sveltekitauth' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sveltekitauth.php';
require plugin_dir_path( __FILE__ ) . 'api/index.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sveltekitauth() {

	$plugin = new Sveltekitauth();
	$plugin->run();

}
run_sveltekitauth();

function deb($data){
	print_r("<pre>");
	print_r($data);
}


