<?php
/**
 * Title: Brandy Newest Posts - Grid Layout
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 */
?>

<!-- wp:query {"metadata":{"categories":["brandy"],"patternName":"brandy/newest-posts-grid","name":"Brandy Newest Posts"},"queryId":33,"query":{"perPage":"8","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","layout":{"type":"default"},"className":"brandy-block-query-slider brandy-book-v1-newest-posts"} -->
<div class="wp-block-query alignwide brandy-block-query-slider brandy-book-v1-newest-posts">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"18rem"}} -->
	<!-- wp:group {"className":"brandy-book-v1-newest-posts-thumbnail-group","style":{"spacing":{"margin":{"bottom":"17px"}},"border":{"radius":"15px"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group brandy-book-v1-newest-posts-thumbnail-group" style="border-radius:15px;margin-bottom:17px"><!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"15px"}}} /--></div>
	<!-- /wp:group -->

	<!-- wp:post-date {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"padding":{"bottom":"0"},"margin":{"bottom":"6px"}},"typography":{"textTransform":"none"}},"textColor":"brandy-secondary-text","fontSize":"small"} /-->

	<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"className":"brandy-link-underline-to-child brandy-text-ellipsis-2","style":{"spacing":{"margin":{"top":"0","bottom":"10px"}},"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text","fontSize":"2-xl","fontFamily":"alice"} /-->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group"><!-- wp:avatar {"size":35,"style":{"border":{"radius":"100%"}}} /-->

		<!-- wp:post-author-name {"fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->