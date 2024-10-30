<?php

namespace BrandySites;

use BrandySites\Sites\BookV1\NicheSetup as BookV1;
use BrandySites\Sites\EBook\NicheSetup as EBook;
use BrandySites\Sites\Plants\NicheSetup as Plant;
use BrandySites\Sites\Fashion\NicheSetup as Fashion;
use BrandySites\Sites\Houseware\NicheSetup as Houseware;
use BrandySites\Sites\JewelryDark\NicheSetup as JewelryDark;
use BrandySites\Sites\JewelryLight\NicheSetup as JewelryLight;
use BrandySites\Sites\Shoes\NicheSetup as Shoes;
use BrandySites\Sites\Cosmetic\NicheSetup as Cosmetic;
use BrandySites\Sites\Halloween\NicheSetup as Halloween;
use BrandySites\Sites\HalloweenV2\NicheSetup as HalloweenV2;
use BrandySites\Sites\ChristmasV1\NicheSetup as ChristmasV1;

class SitesLoader {
	use \BrandySites\Traits\SingletonTrait;

	protected function __construct() {
		add_action( 'brandy_sites_onload', array( $this, 'register_sites' ) );

		add_filter( 'theme_file_uri', array( $this, 'change_path_to_plugin_path' ), 100, 2 );
	}

	public function register_sites( $loader_instance ) {
		$loader_instance->register_niche( Fashion::get_instance() );
		$loader_instance->register_niche( Plant::get_instance() );
		$loader_instance->register_niche( JewelryDark::get_instance() );
		$loader_instance->register_niche( JewelryLight::get_instance() );
		$loader_instance->register_niche( Houseware::get_instance() );
		$loader_instance->register_niche( Shoes::get_instance() );
		$loader_instance->register_niche( BookV1::get_instance() );
		$loader_instance->register_niche( EBook::get_instance() );
		$loader_instance->register_niche( Cosmetic::get_instance() );
		$loader_instance->register_niche( Halloween::get_instance() );
		$loader_instance->register_niche( HalloweenV2::get_instance() );
		$loader_instance->register_niche( ChristmasV1::get_instance() );
	}

	public function change_path_to_plugin_path( $url, $file ) {

		$needle = '[brandy_sites_path]';

		if ( ! str_contains( $file, $needle ) ) {
			return $url;
		}
		return str_replace( $needle, BRANDYSITES_PLUGIN_URL, $file );
	}
}
