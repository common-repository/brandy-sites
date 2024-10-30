<?php
/**
 * Title: Brandy newest posts - grid layout
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 */
?>

<!-- wp:query {"metadata":{"categories":["brandy"],"patternName":"brandy/newest-posts-grid","name":"Brandy Newest Posts"},"queryId":33,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":4}} -->
	<!-- wp:group {"style":{"border":{"radius":"10px"},"color":{"background":"var:preset|color|brandy-theme-secondary-background"},"spacing":{"margin":{"top":"0","bottom":"1rem"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-background"
		style="border-radius:10px;background-color:var(--wp--preset--color--brandy-theme-secondary-background);margin-top:0;margin-bottom:1rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"10px"}}} /--></div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"6px"},"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group" style="margin-bottom:6px">
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"typography":{"textTransform":"uppercase"}},"textColor":"brandy-secondary-text","fontSize":"extra-small"} -->
		<p class="has-brandy-secondary-text-color has-text-color has-link-color has-extra-small-font-size"
			style="text-transform:uppercase">post on</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-date {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"typography":{"textTransform":"uppercase"}},"textColor":"brandy-secondary-text","fontSize":"extra-small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"className":"brandy-link-underline-to-child brandy-text-ellipsis-2","style":{"spacing":{"margin":{"top":"0","bottom":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text","fontSize":"large"} /-->
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->