<?php
/**
 * Title: Brandy newest posts - grid layout - with title
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 */
?>

<!-- wp:query {"metadata":{"categories":["brandy"],"patternName":"brandy/newest-posts-grid","name":"Brandy Newest Posts"},"queryId":33,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3}} -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"0","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)">
		<!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"}},"border":{"radius":"18px"}}} /-->

		<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#b89d92"}}},"spacing":{"blockGap":"3px","margin":{"top":"0","bottom":"10px"}},"color":{"text":"#b89d92"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group has-text-color has-link-color" style="color:#b89d92;margin-top:0;margin-bottom:10px">
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size">Posted by</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-author-name {"isLink":true,"fontSize":"small"} /-->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size">on</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-date {"textAlign":"left","isLink":true,"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"className":"brandy-link-underline-to-child brandy-text-ellipsis-2","style":{"spacing":{"margin":{"top":"0","bottom":"10px","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text","fontSize":"2-xl"} /-->

		<!-- wp:post-excerpt {"moreText":"Read more →","excerptLength":17,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}} /-->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button {"className":"is-style-outline","fontSize":"base"} -->
		<div class="wp-block-button has-custom-font-size is-style-outline has-base-font-size"><a
				class="wp-block-button__link wp-element-button" href="#">View
				more</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:query -->