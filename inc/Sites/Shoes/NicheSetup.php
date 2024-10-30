<?php

namespace BrandySites\Sites\Shoes;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'shoes';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/Shoes';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/Shoes';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/shoes.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'shoes_main_header',
		'checkout' => 'shoes_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'shoes_main_footer',
		'checkout' => 'shoes_checkout_footer',
	);

	protected function __construct() {
		parent::__construct();

		if ( self::is_current_niche() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action( 'enqueue_block_assets', array( $this, 'enqueue_scripts_in_editor' ) );

			add_filter( 'brandy_sites_query_product_layout', array( $this, 'change_product_template_layout' ) );
			add_filter( 'brandy_blocks_data', array( $this, 'change_product_categories_swiper_data' ) );
			add_filter( 'brandy_wishlist_normal_icon', array( $this, 'change_wishlist_icon' ) );

			add_filter( 'brandy_product_demo_tags', array( $this, 'change_demo_tags' ) );
			add_filter( 'brandy_product_demo_cats', array( $this, 'change_demo_cats' ) );

			$this->restyle_blocks();
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Shoes store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/shoes-site-thumbnail-img-1-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/shoe-preview-min.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_1',
					'product_thumb_size' => 'size_2',
					'sale_badge'         => array(
						'background_color' => '#FFAC70',
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
								'value' => 0,
								'min'   => 0,
								'max'   => 50,
							),
						),
					),
				),
				'input'       => array(
					'text_color' => array(
						'normal' => 'var(--wp--preset--color--brandy-secondary-text)',
						'hover'  => 'var(--wp--preset--color--brandy-secondary-text)',
					),
					'border'     => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'select'      => array(
					'text_color' => array(
						'normal' => 'var(--wp--preset--color--brandy-secondary-text)',
						'hover'  => 'var(--wp--preset--color--brandy-secondary-text)',
					),
					'border'     => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => 'var(--wp--preset--color--brandy-primary-text)',
					'primary_hover_background_color'   => '#ffffff',
					'primary_box_shadow'               => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'var(--wp--preset--color--brandy-primary-text)',
							'x'      => 3,
							'y'      => 3,
							'blur'   => 0,
							'spread' => 0,
						),
					),
					'primary_hover_box_shadow'         => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'var(--wp--preset--color--brandy-primary-text)',
							'x'      => 3,
							'y'      => 3,
							'blur'   => 0,
							'spread' => 0,
						),
					),
					'outline_hover_color'              => '#ffffff',
					'outline_hover_background_color'   => 'var(--wp--preset--color--brandy-accent)',
					'outline_box_shadow'               => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'var(--wp--preset--color--brandy-primary-text)',
							'x'      => 1.5,
							'y'      => 1.5,
							'blur'   => 0,
							'spread' => 0,
						),
					),
					'outline_hover_box_shadow'         => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'var(--wp--preset--color--brandy-primary-text)',
							'x'      => 1.5,
							'y'      => 1.5,
							'blur'   => 0,
							'spread' => 0,
						),
					),
					'secondary_color'                  => '#ffffff',
					'secondary_background_color'       => '#091727',
					'secondary_border_color'           => '#091727',
					'secondary_box_shadow'             => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(9, 23, 39, .2)',
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
					'secondary_hover_color'            => '#091727',
					'secondary_hover_background_color' => '#ffffff',
					'secondary_hover_border_color'     => '#091727',
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
			'sample_products'                => BRANDYSITES_PLUGIN_PATH . '/inc/Sites/Shoes/sample-data/sample-products.csv',
			'sample_product_category_images' => self::ROOT_PATH . '/sample-data/sample-product-category-images.json',
			'sample_posts'                   => array(
				'gutenberg' => BRANDYSITES_PLUGIN_PATH . '/inc/Sites/Shoes/sample-data/sample-posts-gutenberg.xml',
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
							'title'  => __( 'Shoes', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/shoes',
						),
						array(
							'title'  => __( 'Sporty', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/sporty',
						),
						array(
							'title'       => __( 'Shop', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_shop_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'  => __( 'Best sellers', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/best-sellers',
						),
						array(
							'title'  => __( 'Sale', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/sale',
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
		wp_enqueue_style( 'brandy-shoes-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
	}

	public function enqueue_scripts_in_editor() {
		global $current_screen;
		if ( ! empty( $current_screen->is_block_editor ) ) {
			$this->enqueue_scripts();
		}
	}

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function change_wishlist_icon() {
		return '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M13.3131 3.07865L10 6.22472H9.91919L6.60606 3.07865H4.66667L2 5.67416V9.37079L10 17L18 9.37079V5.67416L15.2525 3H13.3131V3.07865ZM16.8687 8.89888L10 15.5056L9.91919 15.427L3.13131 8.89888V6.14607L5.15152 4.17978H6.20202L9.11111 7.01124L10 7.79775L13.798 4.10112H14.8485L16.8687 6.14607V8.89888Z" fill="#495C70"/>
		</svg>';
	}

	public function change_product_categories_swiper_data( $localize_data ) {

		if ( isset( $localize_data['woocommerce/product-categories']['swiper']['data']['breakpoints'] ) ) {
			$localize_data['woocommerce/product-categories']['swiper']['data']['breakpoints'] = array(
				'800' => array(
					'slidesPerView' => 3,
				),
				'600' => array(
					'slidesPerView' => 2,
				),
				'400' => array(
					'slidesPerView' => 1,
				),
			);
		}

		return $localize_data;
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Shoes Demo Prod',
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
					'BNew Arrivals',
					'BCrocs Sandals',
					'BSneaker',
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
		wp_enqueue_block_style(
			'core/tag-cloud',
			array(
				'handle' => 'brandy/wp-tag-cloud',
				'src'    => self::ROOT_URL . '/assets/wp-tag-cloud.css',
				'ver'    => BRANDYSITES_SCRIPT_VERSION,
			)
		);
	}
}
