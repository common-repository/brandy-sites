<?php
/**
 * Title: Brandy on sale products collection layout 2
 * Slug: brandy/on-sale-products-collection-layout-2
 * Categories: brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:woocommerce/product-collection {"metadata":{"categories":["brandy"],"patternName":"brandy/on-sale-products-collection-layout-2","name":"Brandy On Sale Products Collection Layout 2"},"queryId":11,"query":{"perPage":<?php echo esc_attr( apply_filters( 'brandy_products_collection_per_page', 8 ) ); ?>,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{<?php echo wp_kses_post( \brandy_get_products_collection_demo_tax_queries() ); ?>},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":true,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":<?php echo esc_attr( apply_filters( 'brandy_products_collection_column', 4 ) ); ?>,"shrinkColumns":true},"collection":"woocommerce/product-collection/on-sale","hideControls":["inherit","on-sale"],"queryContextIncludes":["collection"],"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide">
	<!-- wp:woocommerce/product-template {"className":"brandy-site-product-template","layout":{"type":"default"}} -->
	<?php
	$query_product_layout = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/Ebook/views/query-product-layout-2.php';
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
