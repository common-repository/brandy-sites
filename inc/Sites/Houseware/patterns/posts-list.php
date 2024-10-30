<?php
/**
 * Title: Brandy list of posts - List layout
 * Slug: brandy/posts-list
 * Categories: query, brandy, post
 * Block Types: core/query
 */
?>

<!-- wp:query {"metadata":{"categories":["brandy"],"patternName":"brandy/posts-list","name":"Brandy List Of Posts - List Layout"},"queryId":20,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"className":""} -->
	<!-- wp:group {"metadata":{"name":""},"style":{"border":{"radius":"10px"},"spacing":{"blockGap":"0"}},"className":"brandy-card-shadow has-border-color","layout":{"type":"default"}} -->
	<div class="wp-block-group brandy-card-shadow has-border-color" style="border-radius:10px">
		<!-- wp:group {"style":{"color":{"background":"var:preset|color|brandy-theme-secondary-background"},"border":{"radius":{"topLeft":"9px","topRight":"9px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group has-background"
			style="border-top-left-radius:9px;border-top-right-radius:9px;background-color:var(--wp--preset--color--brandy-theme-secondary-background);">
			<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#dee2e5","isUserOverlayColor":true,"minHeight":500,"isDark":false,"style":{"spacing":{"padding":{"right":"16px","left":"16px","top":"16px","bottom":"16px"}},"border":{"radius":{"topLeft":"9px","topRight":"9px"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover is-light"
				style="border-top-left-radius:9px;border-top-right-radius:9px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px;min-height:500px">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"
					style="background-color:#dee2e5"></span>
				<div class="wp-block-cover__inner-container">
					<!-- wp:avatar {"size":42,"isLink":true,"linkTarget":"_blank","align":"left","style":{"border":{"radius":"100px","width":"1px"},"spacing":{"margin":{"top":"480px"}}},"borderColor":"white"} /-->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"},"blockGap":"10px"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
			<!-- wp:post-terms {"term":"post_tag","textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"15px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy_accent"},":hover":{"color":{"text":"var:preset|color|brandy_accent"}}}},"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"}},"textColor":"brandy_accent","fontSize":"small"} /-->

			<!-- wp:post-title {"level":2,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text","className":"brandy-link-underline-to-child","fontSize":"2-xl"} /-->

			<!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"small"} /-->

			<!-- wp:post-excerpt {"moreText":"Continue reading","excerptLength":56,"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"},":hover":{"color":{"text":"var:preset|color|brandy-accent"}}}}},"textColor":"brandy-secondary-text"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"align":"wide"} -->
	<!-- wp:query-pagination-previous /-->

	<!-- wp:query-pagination-numbers /-->

	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->