<?php
/**
 * The ThemeEnqueue handle enqueueing script and styles for theme layout.
 *
 * @package Brandy\Core
 * @since 1.0
 */

namespace BrandySites;

use BrandySites\Traits\SingletonTrait;

/**
 * Declare class
 */
class Enqueue {
	use SingletonTrait;

	/**
	 * Constructor
	 */
	protected function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action(
			'enqueue_block_assets',
			function() {
				global $current_screen;
				if ( ! empty( $current_screen->is_block_editor ) ) {
					$this->enqueue_scripts();
				}
			}
		);

	}

	/**
	 * Enqueue callback
	 */
	public function enqueue_scripts() {
		/** Enqueue styles */
		wp_enqueue_script( 'brandy-sites-frontend', BRANDYSITES_PLUGIN_URL . '/assets/js/frontend.js', array( 'jquery' ), BRANDYSITES_SCRIPT_VERSION, true );
		wp_localize_script(
			'brandy-sites-frontend',
			'brandySitesData',
			array(
				'urls' => array(
					'assets'   => BRANDYSITES_PLUGIN_URL . '/assets',
				),
			)
		);
	}

}
