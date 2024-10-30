<?php

namespace BrandySites;

use BrandySites\Traits\SingletonTrait;

defined( 'ABSPATH' ) || exit;

/**
 * Declare class
 */
class Fallback {
	use SingletonTrait;

	/**
	 * Constructor
	 */
	protected function __construct() {
		add_action( 'admin_notices', array( $this, 'add_require_brandy_notice' ) );
		add_action( 'admin_notices', array( $this, 'add_require_php_version_notice' ) );
		if ( ! \version_compare( phpversion(), BRANDYSITES_MINIMUM_PHP_VERSION, '>=' ) ) {
			deactivate_plugins( BRANDYSITES_PLUGIN_BASENAME );
		}
	}

	public function add_require_brandy_notice() {
		include BRANDYSITES_PLUGIN_PATH . 'templates/admin-notices/html-notice-require-brandy.php';
	}

	public function add_require_php_version_notice() {
		include BRANDYSITES_PLUGIN_PATH . 'templates/admin-notices/html-require-php-version.php';
	}
}
