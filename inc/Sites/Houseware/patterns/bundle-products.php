<?php
/**
 * Title: Brandy Bundle Products
 * Slug: brandy/bundle-products
 * Categories: brandy, woocommerce, products
 */

if ( ! \is_wc_installed() ) {
	\brandy_get_template_part( 'template-parts/install-wc-notice' );
	return;
}

?>

<?php

	$grouped_products = \wc_get_products(
		[
			'limit' => 1,
			'name' => [ 'Ceramic bundle' ]
		]
	);

	if ( empty( $products ) ) {
		$grouped_products = \wc_get_products(
			[
				'limit' => 1,
				'type' => ['grouped']
			]
		);
	}

	if ( empty( $grouped_products ) ) {
		return;
	}
	$grouped_product = $grouped_products[0];
	$products = $grouped_product->get_children();
	$products = array_slice( $products, 0, 3 );
	
?>

<!-- wp:columns {"metadata":{"categories":["brandy"],"patternName":"brandy/bundle-products","name":"Brandy Bundle Products"},"verticalAlignment":null,"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":1,"minimumColumnWidth":null}} -->
		<div class="wp-block-group">
			<?php foreach ( $products as $id ) :
				$product = \wc_get_product( $id ); ?>
				<!-- wp:woocommerce/single-product {"productId":<?php echo esc_attr( $id ); ?>} -->
				<div class="wp-block-woocommerce-single-product"><!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
					<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"width":"150px"} -->
						<div class="wp-block-column" style="flex-basis:150px">
							<!-- wp:group {"style":{"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"constrained","wideSize":""}} -->
							<div class="wp-block-group has-brandy-theme-secondary-background-background-color has-background"
								style="border-radius:18px">
								<!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfSingleProductBlock":true,"width":"160px","height":"200px","style":{"border":{"radius":"18px"}}} /-->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:column -->

						<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
						<div class="wp-block-column is-vertically-aligned-center">
							<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"6px"}}},"fontSize":"base","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

							<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductBlock":true,"style":{"typography":{"fontSize":"1.25rem","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"1.5rem"}}},"originalPriceTypography":{"fontSize":"0.875rem","color":"","appearance":{"key":"regular","name":"Regular","style":{"fontStyle":"normal","fontWeight":"400"}}}} /-->

							<!-- wp:buttons -->
							<div class="wp-block-buttons">
								<!-- wp:button {"hoverTextColor":"#ffffff","className":"is-style-outline","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"color":{"text":"#b89d92"},"elements":{"link":{"color":{"text":"#b89d92"}}},"border":{"color":"#b89d92","width":"1px","style":"solid"}}} -->
								<div class="wp-block-button is-style-outline" style="font-style:normal;font-weight:400;--button-hover-color:#ffffff"><a class="wp-block-button__link has-text-color has-link-color has-border-color wp-element-button" href="<?php echo esc_url( $product->get_permalink() ); ?>" style="border-color:#b89d92;border-style:solid;border-width:1px;color:#b89d92">View Product</a></div>
								<!-- /wp:button -->
							</div>
							<!-- /wp:buttons -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->
				</div>
				<!-- /wp:woocommerce/single-product -->
			<?php endforeach; ?>

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"width":100,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"17px","bottom":"17px"}}},"fontSize":"base"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 has-custom-font-size has-base-font-size"
					style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button"
						style="padding-top:17px;padding-bottom:17px" href="<?php echo $grouped_product->get_permalink(); ?>">View Bundle</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center">
		<!-- wp:group {"style":{"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-brandy-theme-secondary-background-background-color has-background"
			style="border-radius:18px">
			<!-- wp:image {"width":"auto","height":"700px","sizeSlug":"large","style":{"border":{"radius":"18px"}}} -->
			<figure class="wp-block-image size-large is-resized has-custom-border"><img
			src="<?php echo esc_url( wp_get_attachment_image_src( get_post_thumbnail_id( $grouped_product->get_id() ), 700 )[0] ); ?>" alt=""
					style="border-radius:18px;width:auto;height:700px" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->