<?php

namespace BrandySites\Sites\Cosmetic;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'cosmetic';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/Cosmetic';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/Cosmetic';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/cosmetic.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'cosmetic_main_header',
		'checkout' => 'cosmetic_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'cosmetic_main_footer',
		'checkout' => 'cosmetic_checkout_footer',
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
			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'change_product_categories_layout' ), 100, 3 );
			add_filter( 'brandy_swiper_navigation_icon', array( $this, 'change_swiper_navigation_icon' ), 10, 2 );
			add_filter( 'brandy_blocks_data', array( $this, 'change_blocks_data' ) );
			$this->restyle_blocks();
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Cosmetic store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/cosmetic-site-thumbnail-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/cosmetic-site-preview-img-min.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
					'sale_badge'         => array(
						'background_color' => '#FFCCB4',
						'padding'          => array(
							'unit'   => 'px',
							'top'    => 3,
							'bottom' => 3,
							'left'   => 12,
							'right'  => 12,
						),
						'border'           => array(
							'radius' => array(
								'unit'  => 'px',
								'value' => 10,
								'min'   => 0,
								'max'   => 50,
							),
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => 'var(--wp--preset--color--brandy-accent)',
					'primary_box_shadow'               => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => '#D9E3F030',
							'x'      => 1,
							'y'      => 4,
							'blur'   => 8,
							'spread' => 0,
						),
					),
					'primary_hover_box_shadow'         => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => '#D9E3F030',
							'x'      => 1,
							'y'      => 4,
							'blur'   => 8,
							'spread' => 0,
						),
					),
					'outline_hover_color'              => '#ffffff',
					'outline_hover_background_color'   => '#151617',
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
					'secondary_color'                  => '#ffffff',
					'secondary_background_color'       => 'rgb(18 41 64)',
					'secondary_border_color'           => 'rgb(18 41 64)',
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
						'value' => 2,
					),
					'secondary_border_style'           => 'solid',
					'secondary_hover_color'            => 'rgb(18, 41, 64)',
					'secondary_hover_background_color' => '#ffffff',
					'secondary_hover_border_color'     => 'rgb(18 41 64)',
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
				'input'       => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'select'      => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
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
		wp_enqueue_style( 'brandy-cosmetic-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
		wp_enqueue_script( 'brandy-cosmetic-site-js', self::ROOT_URL . '/assets/script.js', array( 'jquery' ), BRANDYSITES_SCRIPT_VERSION, true );
	}

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Cosmetic Demo Prod',
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
					'BMakeup',
					'BSkincare',
					'BFragrances',
					'BBath & Body',
					'BHair Care',
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

	public function change_product_categories_layout( $content, $attributes, $block ) {

		$children_only = wc_string_to_bool( $attributes['showChildrenOnly'] ) && is_product_category();

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
			<div class="wc-block-product-categories-list-item__image">
			%2$s
			</div>
			<div class="wc-block-product-categories-list-item__content">
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

	public function change_swiper_navigation_icon( $icon, $type ) {
		if ( 'next' === $type ) {
			return '<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1.5 13.75L7.75 7.5L1.5 1.25" stroke="#151617" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			';
		}
		return '<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M7.5 13.75L1.25 7.5L7.5 1.25" stroke="#151617" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
		';
	}

	public function change_blocks_data( $data ) {
		$data['woocommerce/product-categories'] = array(
			'swiper' => array(
				'data' => array(
					'direction'     => 'horizontal',
					'spaceBetween'  => 30,
					'slidesPerView' => 1,
					'breakpoints'   => array(
						'1200' => array(
							'slidesPerView' => 3,
						),
						'800'  => array(
							'slidesPerView' => 2,
						),
					),
				),
			),
		);
		return $data;
	}
}
