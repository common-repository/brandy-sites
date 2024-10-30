<?php

namespace BrandySites;

class PluginInitialize {
	use \BrandySites\Traits\SingletonTrait;

	protected function __construct() {
		SitesLoader::get_instance();
		Enqueue::get_instance();
	}
}
