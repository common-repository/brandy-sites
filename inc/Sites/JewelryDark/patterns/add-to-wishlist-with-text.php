<?php
/**
 * Title: Brandy Add To Wishlist With Text
 * Slug: brandy/add-to-wishlist-with-text
 * Categories: woocommerce, brandy
 */

if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:brandy/add-to-wishlist {"metadata":{"categories":["woocommerce","brandy"],"patternName":"brandy/add-to-wishlist-with-text","name":"Brandy Add To Wishlist With Text"},"iconActive":"https://images.wpbrandy.com/uploads/jewelry-dark-wishlist-active.png","textColor":"#5A6D80","textColorHover":"#5A6D80","textColorActive":"#377E62","loadingSpinnerColor":"#ffffff","style":{"spacing":{"margin":{"top":"25px"}}}} -->
<div data-product-id="" style="margin-top:25px;--atw-background-color:#ffffff00;--atw-background-color-hover:#ffffff00;--atw-background-color-active:#ffffff00;--atw-text-color:#5A6D80;--atw-text-color-hover:#5A6D80;--atw-text-color-active:#377E62;--atw-icon-size:20px;--atw-loading-spinner-color:#ffffff" class="wp-block-brandy-add-to-wishlist"><span class="wp-block-brandy-add-to-wishlist-loading"></span><div class="wp-block-brandy-add-to-wishlist-icon-wrap"><img src="https://images.wpbrandy.com/uploads/wishlist-icon-1.png" class="wp-block-brandy-add-to-wishlist-icon default-state" alt='add-to-wishlist-icon'/><img src="https://images.wpbrandy.com/uploads/wishlist-icon-1.png" class="wp-block-brandy-add-to-wishlist-icon hover-state" alt='add-to-wishlist-icon-hover'/><img src="https://images.wpbrandy.com/uploads/jewelry-dark-wishlist-active.png" class="wp-block-brandy-add-to-wishlist-icon active-state" alt='add-to-wishlist-icon-active'/></div><div class="wp-block-brandy-add-to-wishlist-text-wrap"><span class="wp-block-brandy-add-to-wishlist-text default-state">Add to wishlist</span><span class="wp-block-brandy-add-to-wishlist-text active-state">Wishlisted</span></div></div>
<!-- /wp:brandy/add-to-wishlist -->
