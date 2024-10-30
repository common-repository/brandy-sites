<?php
/**
 * Title: Brandy list products - grid layout - has pagination
 * Slug: brandy/products-grid-has-pagination
 * Categories: brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>


<!-- wp:query {"metadata":{"categories":["brandy"],"patternName":"brandy/products-grid-has-pagination","name":"Brandy List Products - Grid layout - Has Pagination"},"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query","align":"wide"} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"className":"brandy-site-product-template","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"22rem"},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
	<?php
	$query_product_layout = apply_filters( 'brandy_sites_query_product_layout', BRANDY_TEMPLATE_DIR . '/template-parts/query-product-layout.php' );
	if ( file_exists( $query_product_layout ) ) {
		require $query_product_layout;
	}
	?>
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-secondary-text","layout":{"type":"flex","justifyContent":"right"}} -->
	<!-- wp:query-pagination-previous /-->

	<!-- wp:query-pagination-numbers /-->

	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
	<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
	<p><?php echo esc_html__( 'No product found.', 'brandy' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
