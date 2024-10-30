<?php
/**
 * Title: Brandy Products Spotlight
 * Slug: brandy/products-spotlight
 * Categories: products, brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>


<!-- wp:columns {"metadata":{"categories":["brandy"],"patternName":"brandy/products-spotlight","name":"Brandy Products Spotlight"},"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0">
	<!-- wp:column {"verticalAlignment":"stretch","width":"338px","layout":{"type":"default"}} -->
	<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:338px">
		<!-- wp:cover {"url":"https://images.wpbrandy.com/uploads/shoes-image-2-min.png","id":74,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.52,"y":0.49},"minHeight":100,"minHeightUnit":"%","contentPosition":"bottom center","isDark":false,"align":"left","style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"default"}} -->
		<div class="wp-block-cover alignleft is-light has-custom-content-position is-position-bottom-center has-brandy-primary-text-color has-text-color has-link-color"
			style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:100%"><span
				aria-hidden="true"
				class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img
				class="wp-block-cover__image-background wp-image-74" alt=""
				src="https://images.wpbrandy.com/uploads/shoes-image-2-min.png" style="object-position:52% 49%"
				data-object-fit="cover" data-object-position="52% 49%" />
			<div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"170px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
					<h3 class="wp-block-heading"
						style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-style:normal;font-weight:800">
						<mark style="background-color:rgba(0, 0, 0, 0)"
							class="has-inline-color has-brandy-accent-color">SNEAKER</mark><br>MEN'S SHOES</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"margin":{"top":"3px"}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
					<p class="has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"
						style="margin-top:3px">Enjoy special offers just<br>for you!</p>
					<!-- /wp:paragraph -->

					<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"15px","bottom":"0"}}}} -->
					<div class="wp-block-columns" style="margin-top:15px;margin-bottom:0">
						<!-- wp:column {"verticalAlignment":"center","width":"70px","style":{"typography":{"fontSize":"10px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"5px","right":"5px"}},"border":{"width":"1px","style":"solid"},"shadow":"var:preset|shadow|shadow_2","color":{"background":"#ffffff"}},"borderColor":"brandy-primary-text","layout":{"type":"default"}} -->
						<div class="wp-block-column is-vertically-aligned-center has-border-color has-brandy-primary-text-border-color has-background"
							style="border-style:solid;border-width:1px;background-color:#ffffff;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;font-size:10px;font-style:normal;font-weight:600;box-shadow:var(--wp--preset--shadow--shadow-2);flex-basis:70px">
							<!-- wp:paragraph {"align":"center"} -->
							<p class="has-text-align-center">20% OFF</p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->

					<!-- wp:paragraph {"className":"brandy-link-underline-to-child","style":{"spacing":{"margin":{"top":"50px"}},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","fontSize":"small"} -->
					<p class="brandy-link-underline-to-child has-brandy-primary-text-color has-text-color has-link-color has-small-font-size" style="margin-top:50px;font-style:normal;font-weight:500"><a href="#">Shop Now →</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
		</div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":""} -->
	<div class="wp-block-column">
		<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"queryContextIncludes":["collection"],"align":"wide","layout":{"type":"default"}} -->
		<div class="wp-block-woocommerce-product-collection alignwide">
			<!-- wp:woocommerce/product-template {"className":"brandy-site-product-template","layout":{"type":"default"}} -->
			<?php
				require BRANDYSITES_PLUGIN_PATH . '/inc/Sites/Shoes/views/query-product-layout.php';
			?>
			<!-- /wp:woocommerce/product-template -->

			<!-- wp:woocommerce/product-collection-no-results -->
			<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
			<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size"><strong>No results found</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p>
					You can try <a class="wc-link-clear-any-filters" href="#">clearing any filters</a> or head to our <a
						class="wc-link-stores-home" href="#">store's home</a> </p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- /wp:woocommerce/product-collection-no-results -->
		</div>
		<!-- /wp:woocommerce/product-collection -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->