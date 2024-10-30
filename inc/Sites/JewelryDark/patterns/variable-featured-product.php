<?php
/**
 * Title: Brandy Single Variable Featured Product ( Single Image )
 * Slug: brandy/variable-featured-product
 * Categories: woocommerce, brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

$product_query_args = array(
	'post_status'    => 'publish',
	'post_type'      => 'product',
	'tax_query'      => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'product_tag',
			'field'    => 'id',
			'terms'    => \brandy_get_demo_tags(),
			'operator' => 'IN',
		),
		array(
			'taxonomy' => 'product_type',
			'field'    => 'slug',
			'terms'    => 'variable',
		),
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'slug',
			'terms'    => 'featured',
		),
	),
	'orderby'        => 'rand',
	'posts_per_page' => 1,
);
$products_query     = new \WP_Query( $product_query_args );
$products           = $products_query->get_posts();

if ( count( $products ) < 1 ) {
	return;
}

$product    = $products[0];
$product    = \wc_get_product( $product );
$product_id = $product->get_id();

?>

<!-- wp:woocommerce/single-product {"metadata":{"categories":["brandy"],"patternName":"brandy/variable-featured-product","name":"Brandy Single Variable Featured Product ( Single Image )"},"productId":<?php echo esc_html( $product_id ); ?>,"align":"wide","className":"brandy-single-featured-product brandy-single-variable-featured-product"} -->
<div
	class="wp-block-woocommerce-single-product alignwide brandy-single-featured-product brandy-single-variable-featured-product">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns"><!-- wp:column {"width":"57%"} -->
		<div class="wp-block-column" style="flex-basis:57%">
			<!-- wp:woocommerce/product-image {"saleBadgeAlign":"left","isDescendentOfSingleProductBlock":true,"height":"450px","style":{"border":{"radius":"7px"}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:post-terms {"term":"product_cat","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"typography":{"textTransform":"capitalize"}},"textColor":"brandy-primary-text","fontSize":"small","fontFamily":"prata"} /-->

			<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"2px"}},"typography":{"fontSize":"2rem","fontStyle":"normal","fontWeight":"500"}},"fontFamily":"outfit","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"25px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group" style="margin-bottom:25px">
				<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductBlock":true,"textColor":"brandy-accent","style":{"spacing":{"margin":{"top":"3px"}},"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}}},"originalPriceTypography":{"fontSize":"18px","color":"","appearance":{"key":"light","name":"Light","style":{"fontStyle":"normal","fontWeight":"300"}}}} /-->

				<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductBlock":true} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:woocommerce/add-to-cart-form {"isDescendentOfSingleProductBlock":true} /-->
			
			<!-- wp:post-excerpt {"excerptLength":30,"style":{"spacing":{"margin":{"top":"25px","bottom":"25px"}}},"__woocommerceNamespace":"woocommerce/product-collection/product-summary"} /-->

			<!-- wp:pattern {"slug":"brandy/add-to-wishlist-with-text"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:woocommerce/single-product -->
