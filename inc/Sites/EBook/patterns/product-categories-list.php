<?php
/**
 * Title: Brandy Product Categories List
 * Slug: brandy/product-categories-list
 * Categories: woocommerce, brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:woocommerce/product-categories {"metadata":{"categories":["brandy"],"patternName":"brandy/product-categories-list","name":"Brandy Product Categories List"},"align":"wide","hasCount":true,"hasImage":true,"isHierarchical":true,"className":"brandy-product-categories-list"} /-->
