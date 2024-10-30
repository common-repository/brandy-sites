<?php
/**
 * Title: Brandy newest products collection with slider layout 3
 * Slug: brandy/newest-products-collection-slider-layout-3
 * Categories: brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}
?>

<!-- wp:woocommerce/product-collection {"metadata":{"categories":["brandy"],"patternName":"brandy/newest-products-collection-slider-layout-3","name":"Brandy Newest Products Collection With Slider Layout 3"},"queryId":10,"query":{"perPage":8,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":{<?php echo wp_kses_post( \brandy_get_products_collection_demo_tax_queries() ); ?>},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"timeFrame":{"operator":"in","value":"-7 days"}},"tagName":"div","displayLayout":{"type":"flex","columns":1,"shrinkColumns":true},"collection":"woocommerce/product-collection/new-arrivals","hideControls":["inherit","order"],"queryContextIncludes":["collection"],"align":"wide", "className":"brandy-product-collection-slider brandy-product-collection-custom-slider"} -->
<div class="wp-block-woocommerce-product-collection alignwide brandy-product-collection-slider brandy-product-collection-custom-slider">
	<!-- wp:woocommerce/product-template {"layout":{"type":"default"}} -->
	<?php
	$query_product_layout = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/Ebook/views/query-product-card-effect-layout.php';
	if ( file_exists( $query_product_layout ) ) {
		require $query_product_layout;
	}
	?>
	<!-- /wp:woocommerce/product-template -->

	<!-- wp:woocommerce/product-collection-no-results -->
	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
		<p class="has-medium-font-size"><strong><?php echo esc_html__( 'No results found', 'brandy' ); ?></strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>
		<?php
		printf(
			esc_html__( 'You can try %1$sclearing any filters%2$s or head to our %3$sstore\'s home%4$s', 'brandy' ),
			'<a class="wc-link-clear-any-filters" href="#">',
			'</a>',
			'<a class="wc-link-stores-home" href="#">',
			'</a>'
		);
		?>
		</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:woocommerce/product-collection-no-results -->
</div>
<!-- /wp:woocommerce/product-collection -->