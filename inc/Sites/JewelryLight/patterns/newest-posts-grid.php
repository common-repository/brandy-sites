<?php
/**
 * Title: Brandy Newest Posts - Grid layout
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 */
?>

<!-- wp:query {"metadata":{"categories":["brandy"],"patternName":"brandy/newest-posts-grid","name":"Brandy Newest Posts"},"queryId":33,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","className":"brandy-jewelry-newest-posts","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide brandy-jewelry-newest-posts">
	<!-- wp:post-template {"className":"brandy-jewelry-newest-posts-list","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"18rem"}} -->
	<!-- wp:group {"className":"brandy-jewelry-newest-posts-list__item-card","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"color":{"gradient":"linear-gradient(178deg,rgba(245,249,252,0.7) 0%,rgba(245,249,252,0) 99%)"},"border":{"radius":"15px"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group brandy-jewelry-newest-posts-list__item-card has-background"
		style="border-radius:15px;background:linear-gradient(178deg,rgba(245,249,252,0.7) 0%,rgba(245,249,252,0) 99%);padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px">
		<!-- wp:group {"className":"brandy-jewelry-newest-posts-list__item-image","style":{"border":{"radius":"15px"},"spacing":{"margin":{"bottom":"5px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group brandy-jewelry-newest-posts-list__item-image"
			style="border-radius:15px;margin-bottom:5px">
			<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"10px"}}} /--></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-jewelry-newest-posts-list__item-content","style":{"spacing":{"padding":{"bottom":"10px","left":"10px","right":"10px","top":"10px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group brandy-jewelry-newest-posts-list__item-content"
			style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px">
			<!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"bottom":"5px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-brandy-secondary-text-color has-text-color has-link-color"
				style="margin-bottom:5px">
				<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}},"fontSize":"extra-small"} /-->

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"base"} -->
				<p class="has-base-font-size" style="font-style:normal;font-weight:500">•</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-date {"textAlign":"left","style":{"spacing":{"padding":{"bottom":"0"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"extra-small"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-title {"textAlign":"left","level":4,"isLink":true,"className":"brandy-link-underline-to-child brandy-text-ellipsis-2","style":{"spacing":{"margin":{"top":"0","bottom":"10px"}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"1.3rem"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text","fontFamily":"outfit"} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group">
				<!-- wp:avatar {"size":34,"style":{"border":{"radius":"100px"},"spacing":{"margin":{"right":"12px"}}}} /-->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"4px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-right:4px">Post by</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-author-name {"fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->