<?php

namespace BrandySites\Sites\ChristmasV1;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'christmas-v1';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/ChristmasV1';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/ChristmasV1';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/christmas-v1.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'christmas_v1_main_header',
		'checkout' => 'christmas_v1_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'christmas_v1_main_footer',
		'checkout' => 'christmas_v1_checkout_footer',
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
			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'woocommerce_product_categories' ), 100, 3 );
			add_filter( 'brandy_blocks_data', array( $this, 'change_categories_list_swiper_config' ) );
			$this->restyle_blocks();

		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Christmas v1 store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/christmas-v1-site-thumb-img-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/christmas-v1-site-preview-min.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
					'sale_badge'         => array(
						'background_color' => 'var(--wp--preset--color--brandy-accent)',
						'text_color'       => '#ffffff',
						'border'           => array(
							'radius' => array(
								'unit'  => 'px',
								'value' => 12,
								'min'   => 0,
								'max'   => 50,
							),
						),
					),
				),
				'input'       => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 22,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'select'      => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 22,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => '#407253',
					'primary_box_shadow'               => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => '#377E6233',
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
							'color'  => 'rgba(0,0,0,.1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'outline_hover_color'              => '#ffffff',
					'outline_hover_background_color'   => 'var(--wp--preset--color--brandy-accent)',
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
					'secondary_background_color'       => '#4A4A4A',
					'secondary_border_color'           => '#4A4A4A',
					'secondary_box_shadow'             => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(0, 0, 0, .1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
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
					'secondary_hover_color'            => '#ffffff',
					'secondary_hover_background_color' => 'var(--wp--preset--color--brandy-accent)',
					'secondary_hover_border_color'     => 'var(--wp--preset--color--brandy-accent)',
					'secondary_hover_box_shadow'       => array(
						'enabled'      => false,
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
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-posts.xml',
			),
			'sample_pages'                   => array(
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-pages-gutenberg.xml',
			),
			'sample_menus'                   => array(
				array(
					'name'      => __( 'Shopping menu', 'brandy-sites' ),
					'locations' => array( 'primary-menu', 'header-menu-1' ),
					'items'     => array(
						array(
							'title'  => __( 'Home', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => get_home_url(),
						),
						array(
							'title'       => __( 'New Arrivals', 'brandy-sites' ),
							'status'      => 'publish',
							'url'         => brandy_get_shop_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'  => __( 'Best selling', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/best-selling',
						),
						array(
							'title'       => __( 'Shop', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_shop_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'  => __( 'Pages', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => get_home_url() . '/pages',
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

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'brandy-christmas-v1-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Christmas V1 Demo Prod',
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
					'BCDecorations',
					'BCHoliday Apparel',
					'BCStocking Stuffers',
					'BCHome Decor',
					'BCParty Supplies',
					'BCBaking & Treats',
				),
				'fields'   => 'ids',
			)
		);
	}

	public function woocommerce_product_categories( $content, $attributes, $block ) {

		$children_only   = wc_string_to_bool( $attributes['showChildrenOnly'] ) && is_product_category();
		$has_count       = $attributes['hasCount'];
		$has_empty       = $attributes['hasEmpty'];
		$has_image       = $attributes['hasImage'];
		$has_slider      = true;
		$has_navigation  = false;
		$container_class = $attributes['className'];
		if ( isset( $attributes['align'] ) && 'wide' === $attributes['align'] ) {
			$container_class .= ' alignwide';
		}
		if ( $has_slider ) {
			$container_class .= ' swiper';
		}

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

		$items = '';

		$item_markup = '
		<li class="wc-block-product-categories-list-item ' . ( $has_slider ? 'swiper-slide' : '' ) . '">
			<a href="%1$s" class="wc-block-product-categories-list-item__wrap-link">
			<div class="wc-block-product-categories-list-item__image">
				<div class="wc-block-product-categories-list-item__image-wrap">
				%2$s 
				</div>
			'
			. ( $has_count ? '<p class="brandy-product-categories-list-item-count">%4$s</p>' : '' ) .
			'</div>
			<div class="wc-block-product-categories-list-item__content">
				<span class="wc-block-product-categories-list-item__name">%3$s</span>
			</div>
			</a>
		</li>
		';

		foreach ( $categories as $cat ) {
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image        = wp_get_attachment_image( $thumbnail_id, 800 );
			$items       .= sprintf(
				$item_markup,
				get_category_link( $cat ),
				$has_image ? ( empty( $image ) ? \wc_placeholder_img( 800 ) : $image ) : '',
				$cat->name,
				sprintf( '%s %s', $cat->category_count, _n( 'item', 'items', $cat->category_count, 'brandy' ) )
			);
		}

		$navigation = $has_navigation ? '
		<div class="wc-block-product-categories-navigation brandy-swiper-navigation">
				<span class="brandy-swiper-navigation-button brandy-swiper-navigation-button--back wc-block-product-categories-navigation-button">' . brandy_swiper_navigation_icon() . '</span>
				<span class="brandy-swiper-navigation-button brandy-swiper-navigation-button--next wc-block-product-categories-navigation-button">' . brandy_swiper_navigation_icon( 'next' ) . '</span>
			</div>
		' : '';

		$scrollbar = $has_slider ? '<div class="swiper-scrollbar brandy-swiper-scrollbar wc-block-product-categories-scrollbar"></div>' : '';

		$content = sprintf(
			'
		<div data-block-name="woocommerce/product-categories" class="wp-block-woocommerce-product-categories wc-block-product-categories brandy-product-categories-list %1$s">
			%2$s
			<ul class="wc-block-product-categories-list ' . ( $has_slider ? 'swiper-wrapper' : '' ) . '">
			%3$s
			</ul>
			%4$s
		</div>
		',
			$container_class,
			$navigation,
			$items,
			$scrollbar
		);
		return $content;
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

		if ( isset( $localize_data['woocommerce/product-categories']['swiper']['data'] ) ) {
			$localize_data['woocommerce/product-categories']['swiper']['data']['spaceBetween'] = 40;
		}
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
}
