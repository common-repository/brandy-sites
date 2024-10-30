<?php

namespace BrandySites\Sites\HalloweenV2;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'halloween_v2';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/HalloweenV2';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/HalloweenV2';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/halloween-v2.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'halloween_v2_main_header',
		'checkout' => 'halloween_v2_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'halloween_v2_main_footer',
		'checkout' => 'halloween_v2_checkout_footer',
	);

	protected function __construct() {
		parent::__construct();

		if ( self::is_current_niche() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action(
				'enqueue_block_assets',
				function () {
					global $current_screen;
					if ( ! empty( $current_screen->is_block_editor ) ) {
						$this->enqueue_scripts();
					}
				}
			);

			add_filter( 'brandy_sites_query_product_layout', array( $this, 'change_product_template_layout' ) );
			add_filter( 'brandy_product_demo_tags', array( $this, 'change_demo_tags' ) );
			add_filter( 'brandy_product_demo_cats', array( $this, 'change_demo_cats' ) );

			$this->restyle_blocks();

			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'change_product_categories_layout' ), 100, 3 );
			add_filter( 'brandy_blocks_data', array( $this, 'change_categories_list_swiper_config' ) );
			add_filter( 'brandy_products_collection_per_page', array( $this, 'change_products_per_page' ) );
			add_filter( 'brandy_products_collection_column', array( $this, 'change_products_column' ) );
			add_filter( 'brandy_products_collection_grid_min_width', array( $this, 'change_products_grid_min_width' ) );

			add_filter( 'brandy_payment_method_icon', array( $this, 'change_payment_method_icon' ), 10, 2 );
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Halloween v2 store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/halloween-v2-site-thumbnail-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/halloween-v2-site-preview-min.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
					'sale_badge'         => array(
						'background_color' => '#E26B0F',
						'border'           => array(
							'radius' => array(
								'unit'  => 'px',
								'value' => 8,
								'min'   => 0,
								'max'   => 50,
							),
						),
						'padding'          => array(
							'unit'   => 'px',
							'top'    => 3,
							'bottom' => 3,
							'left'   => 8,
							'right'  => 8,
						),
					),
				),
				'input'       => array(
					'background_color' => array(
						'normal' => 'transparent',
						'hover'  => 'transparent',
					),
					'text_color'       => array(
						'normal' => 'var(--wp--preset--color--brandy-primary-text)',
						'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
					),
					'border'           => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
						'color'  => array(
							'normal' => '#5A6D80',
							'hover'  => '#5A6D80',
							'focus'  => '#5A6D80',
						),
					),
				),
				'select'      => array(
					'background_color' => array(
						'normal' => 'transparent',
						'hover'  => 'transparent',
					),
					'text_color'       => array(
						'normal' => 'var(--wp--preset--color--brandy-primary-text)',
						'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
					),
					'border'           => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
						'color'  => array(
							'normal' => '#5A6D80',
							'hover'  => '#5A6D80',
							'focus'  => '#5A6D80',
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => '#9A501E',
					'primary_box_shadow'               => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(226, 106, 15, .2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 25,
							'spread' => 0,
						),
					),
					'primary_hover_box_shadow'         => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(154, 80, 30, 0.2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'outline_hover_color'              => '#E0E3EC',
					'outline_hover_background_color'   => '#F4F4F30D',
					'outline_box_shadow'               => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(47, 112, 179, .2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 25,
							'spread' => 0,
						),
					),
					'outline_hover_box_shadow'         => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(0,0,0,.1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'secondary_color'                  => '#0E1326',
					'secondary_background_color'       => '#E0E3EC',
					'secondary_border_color'           => '#E0E3EC',
					'secondary_box_shadow'             => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(47, 112, 179, .2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 25,
							'spread' => 0,
						),
					),
					'secondary_border_width'           => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 10,
						'value' => 0,
					),
					'secondary_border_style'           => 'solid',
					'secondary_hover_color'            => '#E0E3EC',
					'secondary_hover_background_color' => 'var(--wp--preset--color--brandy-accent)',
					'secondary_hover_border_color'     => '#E0E3EC',
					'secondary_hover_box_shadow'       => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(0, 0, 0, .1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
				),
				'headers'     => array(
					self::ROOT_PATH . '/sample-data/sample-header.json',
					self::ROOT_PATH . '/sample-data/checkout-header.json',
				),
				'footers'     => array(
					self::ROOT_PATH . '/sample-data/sample-footer.json',
					self::ROOT_PATH . '/sample-data/checkout-footer.json',
				),
			),
			'sample_products'                => self::ROOT_PATH . '/sample-data/sample-products.csv',
			'sample_product_category_images' => self::ROOT_PATH . '/sample-data/sample-product-category-images.json',
			'sample_posts'                   => array(
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-posts-gutenberg.xml',
				'elementor' => self::ROOT_PATH . '/sample-data/sample-posts-elementor.xml',
			),
			'sample_pages'                   => array(
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-pages-gutenberg.xml',
				'elementor' => self::ROOT_PATH . '/sample-data/sample-pages-elementor.xml',
			),
			'sample_menus'                   => array(
				array(
					'name'      => __( 'Shopping menu', 'brandy-sites' ),
					'locations' => array( 'primary-menu', 'header-menu-1' ),
					'items'     => array(
						array(
							'title'  => __( 'Home', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => home_url(),
						),
						array(
							'title'       => __( 'Blog', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_blog_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Shop', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_shop_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Cart', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_cart_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Checkout', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_checkout_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'  => __( 'FAQ', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Contact us', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
					),
				),
				array(
					'name'  => __( 'Customer service', 'brandy-sites' ),
					'items' => array(
						array(
							'title'  => __( 'Shipping & delivery', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Track your order', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Refund policy', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Terms and conditions', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'FAQ', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Contact us', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
					),
				),
				array(
					'name'  => __( 'Special sales menu', 'brandy-sites' ),
					'items' => array(
						array(
							'title'  => __( 'Our best seller', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( '-50% off items', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Buy 3 and pay 2', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Custom order', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						'locations' => array( 'secondary-menu', 'header-menu-1' ),
					),
				),
			),
		);
		return $data;
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'brandy-halloween-v2-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
	}

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Halloween V2 Demo Prod',
				),
				'fields'   => 'ids',
			)
		);
	}

	public function change_demo_cats() {
		return get_terms(
			array(
				'taxonomy' => 'product_cat',
				'name'     => array(
					'BH2 Costumes',
					'BH2 Outerwear',
					'BH2 Footerwear',
					'BH2 Jewelry & Props',
					'BH2 Hats & Headwear',
					'BH2 Accessories',
				),
				'fields'   => 'ids',
			)
		);
	}

	public function restyle_blocks() {
		wp_enqueue_block_style(
			'woocommerce/product-categories',
			array(
				'handle' => 'brandy/wc-product-categories',
				'src'    => self::ROOT_URL . '/assets/wc-product-categories.css',
				'ver'    => BRANDYSITES_SCRIPT_VERSION,
			)
		);
	}

	public function change_categories_list_swiper_config( $localize_data ) {

		if ( isset( $localize_data['woocommerce/product-categories']['swiper']['data']['breakpoints'] ) ) {
			$localize_data['woocommerce/product-categories']['swiper']['data']['breakpoints'] = array(
				'1200' => array(
					'slidesPerView' => 6,
				),
				'1000' => array(
					'slidesPerView' => 5,
				),
				'800'  => array(
					'slidesPerView' => 4,
				),
				'600'  => array(
					'slidesPerView' => 3,
				),
				'300'  => array(
					'slidesPerView' => 2,
				),
			);
		}

		return $localize_data;
	}

	public function change_product_categories_layout( $content, $attributes, $block ) {

		$children_only = wc_string_to_bool( $attributes['showChildrenOnly'] ) && is_product_category();
		$has_image     = wc_string_to_bool( $attributes['hasImage'] );

		$has_empty = $attributes['hasEmpty'];

		if ( $children_only ) {
			$term_id    = get_queried_object_id();
			$categories = get_categories(
				array(
					'taxonomy'     => 'product_cat',
					'hide_empty'   => ! $has_empty,
					'pad_counts'   => true,
					'hierarchical' => true,
					'child_of'     => $term_id,
					'include'      => \brandy_get_demo_cats(),
				)
			);
		} else {
			$categories = get_categories(
				array(
					'taxonomy'   => 'product_cat',
					'hide_empty' => ! $has_empty,
					'include'    => \brandy_get_demo_cats(),
				)
			);
		}

		$container_class = $attributes['className'];

		if ( isset( $attributes['align'] ) && 'wide' === $attributes['align'] ) {
			$container_class .= ' alignwide';
		}

		$has_slider = true;

		if ( $has_slider ) {
			$container_class .= ' swiper';
		}

		$items = '';

		$item_markup = '
		<li class="wc-block-product-categories-list-item ' . ( $has_slider ? 'swiper-slide' : '' ) . '">
			<a href="%1$s" class="wc-block-product-categories-list-item__wrap-link" aria-label="%3$s">
			' . ( $has_image ? '<div class="wc-block-product-categories-list-item__image">
			%2$s
			</div>
			' : '' ) . ' <div class="wc-block-product-categories-list-item__content">
				<span class="wc-block-product-categories-list-item__name">%3$s</span>
				'
				. ( $attributes['hasCount'] ? '<p class="brandy-product-categories-list-item-count">%4$s</p>' : '' ) .
			'</div>
			</a>
		</li>
		';

		foreach ( $categories as $cat ) {
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image        = wp_get_attachment_image( $thumbnail_id, 800 );
			$items       .= sprintf(
				$item_markup,
				get_category_link( $cat ),
				empty( $image ) ? \wc_placeholder_img( 800 ) : $image,
				$cat->name,
				sprintf( '%s %s', $cat->category_count, _n( 'item', 'items', $cat->category_count, 'brandy' ) )
			);
		}

		$content = sprintf(
			'
		<div data-block-name="woocommerce/product-categories" class="wp-block-woocommerce-product-categories wc-block-product-categories brandy-product-categories-list %1$s ">'
			. ( $has_slider ? '<div class="wc-block-product-categories-navigation brandy-swiper-navigation">
				<div class="brandy-swiper-navigation-button brandy-swiper-navigation-button--back wc-block-product-categories-navigation-button">' . \brandy_swiper_navigation_icon() . '</div>
				<div class="brandy-swiper-navigation-button brandy-swiper-navigation-button--next wc-block-product-categories-navigation-button">' . \brandy_swiper_navigation_icon( 'next' ) . '</div>
			</div>' : '' ) .
			'<ul class="wc-block-product-categories-list %2$s">
			%3$s
			</ul>'
			. ( $has_slider ? '<div class="swiper-scrollbar brandy-swiper-scrollbar wc-block-product-categories-scrollbar"></div>' : '' ) .
			'</div>
		',
			$container_class,
			$has_slider ? 'swiper-wrapper' : '',
			$items
		);
		return $content;
	}

	public function change_products_per_page() {
		return 9;
	}

	public function change_products_column() {
		return 3;
	}

	public function change_products_grid_min_width() {
		return '25rem';
	}

	public function change_payment_method_icon( $html, $icon_type ) {
		switch ( $icon_type ) {
			case 'visa':
				return '
				<svg width="37" height="12" viewBox="0 0 37 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_2096_15432)">
				<path d="M16.098 11.4339H13.2539L15.0328 0.601074H17.8768L16.098 11.4339Z" fill="#D3D3D3"/>
				<path d="M26.4086 0.865984C25.8476 0.646794 24.9578 0.404785 23.8576 0.404785C21.0489 0.404785 19.071 1.87983 19.0589 3.98868C19.0356 5.54461 20.475 6.40877 21.5516 6.92756C22.6519 7.45768 23.026 7.80372 23.026 8.27625C23.0148 9.00197 22.1368 9.3365 21.318 9.3365C20.1824 9.3365 19.574 9.16403 18.6495 8.76028L18.2749 8.58721L17.877 11.019C18.544 11.3182 19.773 11.5838 21.0489 11.5954C24.0332 11.5954 25.976 10.1433 25.9991 7.89596C26.0104 6.66274 25.2504 5.71785 23.6117 4.9457C22.6169 4.45004 22.0078 4.11582 22.0078 3.60867C22.0194 3.14762 22.523 2.67539 23.6459 2.67539C24.5705 2.65227 25.2499 2.87115 25.7645 3.09018L26.0218 3.20521L26.4086 0.865984Z" fill="#D3D3D3"/>
				<path d="M30.1875 7.59623C30.4217 6.97392 31.323 4.5653 31.323 4.5653C31.3112 4.58843 31.5567 3.93148 31.6972 3.52817L31.8959 4.4616C31.8959 4.4616 32.4345 7.05465 32.5515 7.59623C32.107 7.59623 30.7492 7.59623 30.1875 7.59623ZM33.6982 0.601074H31.4983C30.8199 0.601074 30.3044 0.796827 30.0117 1.49989L25.7871 11.4338H28.7714C28.7714 11.4338 29.2627 10.0968 29.3683 9.80881C29.6957 9.80881 32.5988 9.80881 33.02 9.80881C33.1016 10.1892 33.3593 11.4338 33.3593 11.4338H35.9927L33.6982 0.601074Z" fill="#D3D3D3"/>
				<path d="M10.8794 0.601074L8.09402 7.98808L7.78962 6.48988C7.27466 4.7612 5.65968 2.88302 3.85742 1.94913L6.40872 11.4225H9.41627L13.8868 0.601074H10.8794Z" fill="#D3D3D3"/>
				<path d="M5.50751 0.601074H0.931579L0.884766 0.819954C4.45428 1.71892 6.81829 3.88583 7.78957 6.49037L6.7948 1.51168C6.63103 0.819802 6.12775 0.623896 5.50751 0.601074Z" fill="#909090"/>
				</g>
				<defs>
				<clipPath id="clip0_2096_15432">
				<rect width="36" height="12" fill="white" transform="translate(0.5)"/>
				</clipPath>
				</defs>
				</svg>
			';
			case 'discover':
				return '
				<svg width="67" height="12" viewBox="0 0 67 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_2096_15442)">
				<path d="M5.98686 8.48151C5.35148 9.05524 4.52613 9.30558 3.21953 9.30558H2.67682V2.45009H3.21953C4.52613 2.45009 5.319 2.68388 5.98686 3.28852C6.6862 3.91126 7.10693 4.87618 7.10693 5.86936C7.10693 6.86451 6.6862 7.85898 5.98686 8.48151ZM3.6246 0.693604H0.65625V11.0606H3.60894C5.17906 11.0606 6.31276 10.6902 7.30795 9.86378C8.49055 8.88511 9.18988 7.41004 9.18988 5.88428C9.18988 2.82486 6.90406 0.693604 3.6246 0.693604Z" fill="#D3D3D3"/>
				<path d="M10.1211 11.0606H12.1432V0.693604H10.1211V11.0606Z" fill="#D3D3D3"/>
				<path d="M17.0873 4.67162C15.8738 4.2226 15.5175 3.92642 15.5175 3.36631C15.5175 2.71342 16.1523 2.21724 17.024 2.21724C17.6299 2.21724 18.1278 2.4661 18.6547 3.05685L19.7127 1.67134C18.8432 0.910816 17.8029 0.521973 16.6663 0.521973C14.8321 0.521973 13.433 1.7958 13.433 3.49251C13.433 4.92078 14.0844 5.65202 15.9836 6.33555C16.7752 6.61475 17.1781 6.80078 17.3814 6.92598C17.7855 7.18978 17.9878 7.56324 17.9878 7.99864C17.9878 8.83864 17.32 9.46098 16.4177 9.46098C15.4532 9.46098 14.6764 8.97864 14.2108 8.07824L12.9043 9.33611C13.836 10.7037 14.955 11.3098 16.4936 11.3098C18.5951 11.3098 20.0692 9.91258 20.0692 7.90564C20.0692 6.25854 19.3876 5.51294 17.0873 4.67162Z" fill="#D3D3D3"/>
				<path d="M20.707 5.88426C20.707 8.93149 23.0998 11.2944 26.1791 11.2944C27.0496 11.2944 27.795 11.1232 28.7144 10.6902V8.30976C27.906 9.11889 27.19 9.44522 26.2731 9.44522C24.2366 9.44522 22.791 7.96869 22.791 5.86933C22.791 3.8789 24.2822 2.3088 26.1791 2.3088C27.1436 2.3088 27.8736 2.65297 28.7144 3.47528V1.09605C27.8268 0.645723 27.0968 0.459229 26.2268 0.459229C23.1632 0.459229 20.707 2.86991 20.707 5.88426Z" fill="#D3D3D3"/>
				<path d="M44.7491 7.65693L41.9845 0.693359H39.7754L44.1747 11.3263H45.2629L49.7417 0.693359H47.5497L44.7491 7.65693Z" fill="#D3D3D3"/>
				<path d="M50.6562 11.0606H56.3911V9.30558H52.6768V6.50718H56.254V4.75114H52.6768V2.45009H56.3911V0.693604H50.6562V11.0606Z" fill="#D3D3D3"/>
				<path d="M60.339 5.46644H59.7482V2.32653H60.3708C61.6302 2.32653 62.3149 2.85416 62.3149 3.86311C62.3149 4.90533 61.6302 5.46644 60.339 5.46644ZM64.3959 3.75421C64.3959 1.81338 63.0589 0.693604 60.7269 0.693604H57.7285V11.0606H59.7482V6.89604H60.0118L62.8109 11.0606H65.2978L62.0342 6.69311C63.5572 6.38347 64.3959 5.34158 64.3959 3.75421Z" fill="#D3D3D3"/>
				<path d="M65.3051 1.20736H65.2683V0.969222H65.3073C65.415 0.969222 65.4707 1.00795 65.4707 1.0864C65.4707 1.16704 65.4142 1.20736 65.3051 1.20736ZM65.6882 1.08306C65.6882 0.901355 65.5631 0.802002 65.3433 0.802002H65.0508V1.71323H65.2683V1.35981L65.5234 1.71323H65.7889L65.4892 1.33746C65.6174 1.30293 65.6882 1.20956 65.6882 1.08306Z" fill="#D3D3D3"/>
				<path d="M65.3846 1.90827C65.0363 1.90827 64.7515 1.61848 64.7515 1.25693C64.7515 0.89408 65.0326 0.604442 65.3846 0.604442C65.731 0.604442 66.0135 0.900727 66.0135 1.25693C66.0135 1.61544 65.731 1.90827 65.3846 1.90827ZM65.3875 0.461426C64.945 0.461426 64.5938 0.814586 64.5938 1.25578C64.5938 1.69667 64.9491 2.05025 65.3875 2.05025C65.8186 2.05025 66.1717 1.69289 66.1717 1.25578C66.1717 0.820826 65.8186 0.461426 65.3875 0.461426Z" fill="#D3D3D3"/>
				<path d="M35.0196 0.510742H34.7552C31.7094 0.510742 29.2402 2.97987 29.2402 6.0257V6.02572C29.2402 9.07155 31.7094 11.5407 34.7552 11.5407H35.0196C38.0654 11.5407 40.5346 9.07155 40.5346 6.02572V6.0257C40.5346 2.97987 38.0654 0.510742 35.0196 0.510742Z" fill="#D3D3D3"/>
				</g>
				<defs>
				<clipPath id="clip0_2096_15442">
				<rect width="66" height="12" fill="white" transform="translate(0.5)"/>
				</clipPath>
				</defs>
				</svg>
			';
			case 'mastercard':
				return '
				<svg width="23" height="14" viewBox="0 0 23 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_2096_15438)">
				<path d="M14.464 1.81519H8.56836V12.185H14.464V1.81519Z" fill="#D3D3D3"/>
				<path d="M8.96166 6.99994C8.96166 4.89309 9.97333 3.0232 11.5258 1.81502C10.3832 0.935564 8.94203 0.404053 7.37002 0.404053C3.64603 0.404053 0.632812 3.35405 0.632812 6.99994C0.632812 10.6458 3.64603 13.5958 7.37002 13.5958C8.94203 13.5958 10.3832 13.0643 11.5258 12.1848C9.97119 10.9938 8.96166 9.10678 8.96166 6.99994Z" fill="#909090"/>
				<path d="M22.4183 6.99994C22.4183 10.6458 19.4051 13.5958 15.6811 13.5958C14.1091 13.5958 12.6679 13.0643 11.5254 12.1848C13.0974 10.9745 14.0894 9.10678 14.0894 6.99994C14.0894 4.89309 13.0778 3.0232 11.5254 1.81502C12.6657 0.935564 14.1069 0.404053 15.6789 0.404053C19.4051 0.404053 22.4183 3.37327 22.4183 6.99994Z" fill="white"/>
				</g>
				<defs>
				<clipPath id="clip0_2096_15438">
				<rect width="22" height="14" fill="white" transform="translate(0.5)"/>
				</clipPath>
				</defs>
				</svg>
				';
			case 'paypal':
				return '
				<svg width="45" height="12" viewBox="0 0 45 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_2096_15453)">
				<path d="M6.18587 0.181885H2.80301C2.57151 0.181885 2.37464 0.350759 2.33854 0.580227L0.970348 9.29065C0.943143 9.46252 1.07571 9.61749 1.24933 9.61749H2.86434C3.09584 9.61749 3.29271 9.44861 3.32881 9.21865L3.69782 6.86932C3.73343 6.6393 3.9308 6.47043 4.16179 6.47043H5.2327C7.46105 6.47043 8.74716 5.38768 9.08302 3.24198C9.23436 2.30324 9.08943 1.56566 8.65166 1.04911C8.17087 0.481885 7.31814 0.181885 6.18587 0.181885ZM6.57617 3.36317C6.39115 4.58205 5.4637 4.58205 4.56691 4.58205H4.05644L4.41456 2.30572C4.43583 2.16814 4.55454 2.06682 4.69304 2.06682H4.92701C5.5379 2.06682 6.11417 2.06682 6.41195 2.41649C6.58953 2.6251 6.6439 2.93503 6.57617 3.36317Z" fill="#D3D3D3"/>
				<path d="M16.2987 3.32413H14.6788C14.5408 3.32413 14.4216 3.42545 14.4003 3.56303L14.3286 4.018L14.2153 3.8531C13.8646 3.34201 13.0825 3.17114 12.302 3.17114C10.5119 3.17114 8.98294 4.53257 8.6852 6.44231C8.53033 7.395 8.75044 8.30591 9.28866 8.9412C9.78232 9.52527 10.4887 9.76866 11.3291 9.76866C12.7714 9.76866 13.5713 8.83735 13.5713 8.83735L13.4991 9.28936C13.4719 9.46222 13.6044 9.61718 13.777 9.61718H15.2363C15.4682 9.61718 15.6641 9.44831 15.7007 9.21835L16.5763 3.65095C16.604 3.47959 16.4718 3.32413 16.2987 3.32413ZM14.0407 6.49004C13.8844 7.41933 13.1498 8.04316 12.213 8.04316C11.7426 8.04316 11.3667 7.89169 11.1252 7.60456C10.8859 7.31951 10.7948 6.91369 10.871 6.46173C11.0169 5.54035 11.7638 4.89614 12.6864 4.89614C13.1464 4.89614 13.5203 5.04962 13.7667 5.33919C14.0135 5.63176 14.1114 6.04004 14.0407 6.49004Z" fill="#D3D3D3"/>
				<path d="M24.9265 3.32397H23.2987C23.1433 3.32397 22.9974 3.40146 22.9093 3.53109L20.6641 6.85195L19.7124 3.66073C19.6526 3.46106 19.4691 3.32397 19.2614 3.32397H17.6617C17.4672 3.32397 17.3322 3.5147 17.3941 3.69848L19.1872 8.98228L17.5014 11.3718C17.3688 11.56 17.5024 11.8189 17.7314 11.8189H19.3573C19.5116 11.8189 19.656 11.7434 19.7436 11.6162L25.158 3.76851C25.2876 3.58076 25.1545 3.32397 24.9265 3.32397Z" fill="#D3D3D3"/>
				<path d="M30.3148 0.181885H26.9314C26.7004 0.181885 26.5036 0.350759 26.4674 0.580227L25.0992 9.29065C25.0721 9.46252 25.2046 9.61749 25.3773 9.61749H27.1135C27.2747 9.61749 27.4127 9.49929 27.4379 9.33832L27.8262 6.86932C27.8618 6.6393 28.0592 6.47043 28.2902 6.47043H29.3606C31.5895 6.47043 32.8751 5.38768 33.2114 3.24198C33.3633 2.30324 33.2174 1.56566 32.7796 1.04911C32.2993 0.481885 31.447 0.181885 30.3148 0.181885ZM30.7051 3.36317C30.5206 4.58205 29.5931 4.58205 28.6958 4.58205H28.1859L28.5444 2.30572C28.5657 2.16814 28.6835 2.06682 28.8225 2.06682H29.0564C29.6668 2.06682 30.2435 2.06682 30.5413 2.41649C30.7189 2.6251 30.7729 2.93503 30.7051 3.36317Z" fill="#909090"/>
				<path d="M40.4275 3.32413H38.8085C38.6695 3.32413 38.5513 3.42545 38.5306 3.56303L38.4588 4.018L38.3451 3.8531C37.9944 3.34201 37.2128 3.17114 36.4323 3.17114C34.6422 3.17114 33.1137 4.53257 32.8159 6.44231C32.6616 7.395 32.8807 8.30591 33.4189 8.9412C33.9136 9.52527 34.6189 9.76866 35.4593 9.76866C36.9017 9.76866 37.7015 8.83735 37.7015 8.83735L37.6293 9.28936C37.6021 9.46222 37.7347 9.61718 37.9083 9.61718H39.367C39.598 9.61718 39.7948 9.44831 39.831 9.21835L40.707 3.65095C40.7337 3.47959 40.6011 3.32413 40.4275 3.32413ZM38.1695 6.49004C38.0141 7.41933 37.2786 8.04316 36.3418 8.04316C35.8723 8.04316 35.4954 7.89169 35.254 7.60456C35.0146 7.31951 34.9246 6.91369 34.9998 6.46173C35.1467 5.54035 35.8926 4.89614 36.8151 4.89614C37.2752 4.89614 37.6491 5.04962 37.8955 5.33919C38.1433 5.63176 38.2412 6.04004 38.1695 6.49004Z" fill="#909090"/>
				<path d="M42.3374 0.4208L40.9489 9.29067C40.9217 9.46254 41.0542 9.61751 41.2269 9.61751H42.6228C42.8547 9.61751 43.0516 9.44863 43.0872 9.21862L44.4564 0.508714C44.4836 0.33686 44.351 0.181396 44.1784 0.181396H42.6153C42.4774 0.181893 42.3586 0.283218 42.3374 0.4208Z" fill="#909090"/>
				</g>
				<defs>
				<clipPath id="clip0_2096_15453">
				<rect width="44" height="12" fill="white" transform="translate(0.5)"/>
				</clipPath>
				</defs>
				</svg>
				';
			case 'stripe':
				return '
				<svg width="41" height="16" viewBox="0 0 41 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M22.1523 2.16827L19.3634 2.74505V0.5661L22.1523 0V2.16827ZM27.9582 3.37476C26.8693 3.37476 26.1693 3.86609 25.7805 4.20789L25.636 3.54565H23.1916V15.9999L25.9694 15.4338L25.9805 12.411C26.3805 12.6887 26.9693 13.0839 27.9471 13.0839C29.936 13.0839 31.747 11.5458 31.747 8.15992C31.7359 5.06238 29.9026 3.37476 27.9582 3.37476ZM27.2907 10.7342C26.6351 10.7342 26.2462 10.5099 25.9796 10.2322L25.9685 6.26947C26.2573 5.95972 26.6573 5.74609 27.2907 5.74609C28.3018 5.74609 29.0017 6.83557 29.0017 8.2348C29.0017 9.66607 28.3129 10.7342 27.2907 10.7342ZM40.5 8.26672C40.5 5.53235 39.1222 3.37476 36.489 3.37476C33.8446 3.37476 32.2446 5.53235 32.2446 8.24536C32.2446 11.4604 34.1334 13.0839 36.8445 13.0839C38.1667 13.0839 39.1667 12.7955 39.9222 12.3896V10.2534C39.1667 10.6166 38.3 10.8409 37.2001 10.8409C36.1223 10.8409 35.1668 10.4777 35.0445 9.21734H40.4778C40.4778 9.15847 40.4818 9.02473 40.4864 8.87065C40.4926 8.6613 40.5 8.41439 40.5 8.26672ZM35.0112 7.2517C35.0112 6.04474 35.7778 5.54272 36.4778 5.54272C37.1556 5.54272 37.8778 6.04474 37.8778 7.2517H35.0112ZM19.3634 3.55737H22.1523V12.9034H19.3634V3.55737ZM16.1981 3.55621L16.3758 4.34661C17.0314 3.19305 18.3314 3.42803 18.6869 3.55621V6.01287C18.3425 5.89538 17.2314 5.74584 16.5758 6.56829V12.9022H13.7981V3.55621H16.1981ZM10.8223 1.23901L8.11117 1.79443L8.10006 10.35C8.10006 11.9308 9.33338 13.0951 10.9778 13.0951C11.8889 13.0951 12.5556 12.9349 12.9222 12.7426V10.5743C12.5667 10.7132 10.8111 11.2045 10.8111 9.62371V5.83191H12.9222V3.55682H10.8111L10.8223 1.23901ZM4.25551 5.69281C3.66663 5.69281 3.31108 5.85303 3.31108 6.2696C3.31108 6.72442 3.92298 6.92449 4.68213 7.1727C5.91971 7.57735 7.54858 8.10994 7.55547 10.0828C7.55547 11.9947 5.9666 13.0949 3.65552 13.0949C2.69997 13.0949 1.65554 12.9133 0.622221 12.486V9.94391C1.55554 10.4352 2.7333 10.7984 3.65552 10.7984C4.27773 10.7984 4.72217 10.6382 4.72217 10.1469C4.72217 9.64305 4.05885 9.41278 3.25804 9.13477C2.03846 8.71138 0.5 8.17729 0.5 6.39777C0.5 4.50721 1.99998 3.375 4.25551 3.375C5.17772 3.375 6.08882 3.51386 7.01103 3.86634V6.37641C6.16659 5.93848 5.09994 5.69281 4.25551 5.69281Z" fill="#D3D3D3"/>
				</svg>
				';
			case 'americanexpress':
				return '
				<svg width="48" height="12" viewBox="0 0 48 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M5.80433 0L0.5 11.9846H6.85003L7.63725 10.0737H9.43665L10.2239 11.9846H17.2135V10.5262L17.8363 11.9846H21.4519L22.0747 10.4953V11.9846H36.6111L38.3787 10.1234L40.0338 11.9846L47.5 12L42.1789 6.02575L47.5 0H40.1496L38.429 1.82682L36.826 0H21.0122L19.6543 3.09332L18.2645 0H11.9277V1.40879L11.2228 0H5.80433ZM7.03224 1.70093H10.1275L13.6459 9.82774V1.70093H17.0367L19.7542 7.52781L22.2587 1.70093H25.6326V10.3007H23.5796L23.5629 3.56196L20.57 10.3007H18.7335L15.7239 3.56196V10.3007H11.5006L10.6999 8.37271H6.37426L5.57526 10.299H3.31247L7.03224 1.70093ZM35.8606 1.70093H27.5131V10.2956H35.7314L38.3803 7.44718L40.9334 10.2956H43.6023L39.7231 6.02316L43.6023 1.70093H41.0492L38.4138 4.51663L35.8606 1.70093ZM8.53922 3.15625L7.11409 6.59073H9.96269L8.53922 3.15625ZM29.5737 5.05185V3.48197V3.48047H34.7823L37.055 5.9911L34.6816 8.51546H29.5737V6.80161H34.1276V5.05185H29.5737Z" fill="#D3D3D3"/>
				</svg>
				';

			default:
				return $html;
		}
	}
}
