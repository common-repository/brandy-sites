<?php
/**
 * Plugin Name: Brandy Starter Sites - Extra sites for Brandy theme
 * Plugin URI: https://yaycommerce.com/
 * Description: Brandy Starter Sites.
 * Version: 1.1.6
 * Author: YayCommerce
 * Author URI: https://yaycommerce.com/
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: brandy-sites
 * Requires PHP: 5.7
 * Domain Path: /languages
 *
 * @package BrandySites
 */

namespace BrandySites;

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'BRANDYSITES_FILE' ) ) {
	define( 'BRANDYSITES_FILE', __FILE__ );
}
if ( ! defined( 'BRANDYSITES_ABSPATH' ) ) {
	define( 'BRANDYSITES_ABSPATH', __DIR__ . '/' );
}
if ( ! defined( 'BRANDYSITES_PLUGIN_PATH' ) ) {
	define( 'BRANDYSITES_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'BRANDYSITES_PLUGIN_URL' ) ) {
	define( 'BRANDYSITES_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'BRANDYSITES_PLUGIN_BASENAME' ) ) {
	define( 'BRANDYSITES_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'BRANDYSITES_VERSION' ) ) {
	define( 'BRANDYSITES_VERSION', '1.1.6' );
}
if ( ! defined( 'BRANDYSITES_MINIMUM_PHP_VERSION' ) ) {
	define( 'BRANDYSITES_MINIMUM_PHP_VERSION', '5.7' );
}
if ( ! defined( 'BRANDYSITES_IS_DEVELOPMENT' ) ) {
	define( 'BRANDYSITES_IS_DEVELOPMENT', false );
}
if ( ! defined( 'BRANDYSITES_SCRIPT_VERSION' ) ) {
	define( 'BRANDYSITES_SCRIPT_VERSION', BRANDYSITES_IS_DEVELOPMENT ? time() : BRANDYSITES_VERSION );
}

require_once BRANDYSITES_PLUGIN_PATH . 'vendor/autoload.php';


add_action( 'after_setup_theme', '\\BrandySites\\bts_load_plugin', 8 );

if ( ! function_exists( 'BrandySites\\bts_load_plugin' ) ) {
	/**
	 * Initialize plugin instance
	 */
	function bts_load_plugin() { //phpcs:ignore
		if ( ! defined( 'BRANDY_VERSION' ) ) {
			Fallback::get_instance();
		} else {
			PluginInitialize::get_instance();
		}
	}
}
