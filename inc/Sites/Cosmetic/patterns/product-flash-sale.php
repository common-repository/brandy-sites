<?php
/**
 * Title: Brandy Product Flash Sale
 * Slug: brandy/product-flash-sale
 * Categories: woocommerce, brandy, products
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:columns {"metadata":{"categories":["woocommerce","brandy","products"],"patternName":"brandy/product-flash-sale","name":"Brandy Product Flash Sale"},"align":"wide","className":"brandy-cosmetic-flash-sale","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns alignwide brandy-cosmetic-flash-sale"><!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center">
		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"300px"}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center">Sale Upto 20% OFF Of This Week</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-product-collection-custom-slider brandy-cosmetic-flash-sale-slider","layout":{"type":"constrained","contentSize":"340px"}} -->
		<div class="wp-block-group brandy-product-collection-custom-slider brandy-cosmetic-flash-sale-slider">
			<!-- wp:pattern {"slug":"brandy/on-sale-products-collection"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","layout":{"type":"constrained","justifyContent":"right"}} -->
	<div class="wp-block-column is-vertically-aligned-center">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"600px"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"scale":"cover","sizeSlug":"large","style":{"border":{"radius":"20px"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img
					src="https://images.wpbrandy.com/uploads/cosmetic-flash-sale-img-min.png" alt=""
					style="border-radius:20px;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->