<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.makas.it
 * @since             1.0.0
 * @package           wildixKite
 *
 * @wordpress-plugin
 * Plugin Name:       Wildix Kite WordPress Plugin
 * Plugin URI:        http://www.makas.it
 * Description:       Display status of connection for Kite
 * Version:           1.0.5
 * Author:            Makas Srls
 * Author URI:        http://www.makas.it
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wildixKite
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/wildixKite-activator.php
 */
function activate_wildixKite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/wildixKite-activator.php';
	wildixKite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/wildixKite-deactivator.php
 */
function deactivate_wildixKite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/wildixKite-deactivator.php';
	wildixKite_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/wildixKite.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wildixKite() {

	$plugin = new wildixKite();
	$plugin->run();

}
run_wildixKite();
