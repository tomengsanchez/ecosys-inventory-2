<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/tomengsanchez
 * @since             1.0.0
 * @package           Ecosys_Inventory
 *
 * @wordpress-plugin
 * Plugin Name:       Ecosys Inventory
 * Plugin URI:        Tech
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ecosys Tech Team
 * Author URI:        https://github.com/tomengsanchez
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ecosys-inventory
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
define( 'ECOSYS_INVENTORY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ecosys-inventory-activator.php
 */
function activate_ecosys_inventory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ecosys-inventory-activator.php';
	Ecosys_Inventory_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ecosys-inventory-deactivator.php
 */
function deactivate_ecosys_inventory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ecosys-inventory-deactivator.php';
	Ecosys_Inventory_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ecosys_inventory' );
register_deactivation_hook( __FILE__, 'deactivate_ecosys_inventory' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ecosys-inventory.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ecosys_inventory() {

	$plugin = new Ecosys_Inventory();
	$plugin->run();

}
run_ecosys_inventory();
