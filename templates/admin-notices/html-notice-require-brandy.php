<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="error">
	<p>
	<?php
	/* Translators: %s: search WooCommerce plugin link. */
	printf( 'Brandy Starter Sites ' . esc_html__( 'is enabled but not effective. It requires %1$sBrandy theme%2$s in order to work.', 'brandy-sites' ), '<a href="' . esc_url( admin_url( 'theme-install.php?search=brandy' ) ) . '">', '</a>' );
	?>
	</p>
</div>
