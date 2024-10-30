<?php

namespace BrandySites\Sites\JewelryLight;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'jewelry-light';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/JewelryLight';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/JewelryLight';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/jewelry-light.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'jewelry_light_main_header',
		'checkout' => 'jewelry_light_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'jewelry_light_main_footer',
		'checkout' => 'jewelry_light_checkout_footer',
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
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Jewelry Light store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/jewelry-light-site-thumbnail-img-1-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/jewelry-light-site-preview-min-1.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
				),
				'input'       => array(
					'text_color' => array(
						'normal' => 'var(--wp--preset--color--brandy-secondary-text)',
						'hover'  => 'var(--wp--preset--color--brandy-secondary-text)',
					),
					'border'     => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 7,
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
							'value' => 7,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => 'var(--wp--preset--color--brandy-primary-text)',
					'primary_box_shadow'               => array(
						'enabled'      => true,
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
						'enabled'      => true,
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
					'outline_hover_background_color'   => '#21232A',
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
				'headers'     => array(
					self::ROOT_PATH . '/sample-data/sample-header.json',
					self::ROOT_PATH . '/sample-data/checkout-header.json',
				),
				'footers'     => array(
					self::ROOT_PATH . '/sample-data/sample-footer.json',
					self::ROOT_PATH . '/sample-data/checkout-footer.json',
				),
			),
			'sample_products'                => BRANDYSITES_PLUGIN_PATH . '/inc/Sites/JewelryDark/sample-data/sample-products.csv',
			'sample_product_category_images' => BRANDYSITES_PLUGIN_PATH . '/inc/Sites/JewelryDark/sample-data/sample-product-category-images.json',
			'sample_posts'                   => array(
				'gutenberg' => BRANDYSITES_PLUGIN_PATH . '/inc/Sites/JewelryDark/sample-data/sample-posts-gutenberg.xml',
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
							'title'  => __( 'Jewelry', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/jewelry',
						),
						array(
							'title'  => __( 'Wedding', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => brandy_get_shop_page_url() . '/wedding',
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
		wp_enqueue_style( 'brandy-jewelry-light-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Jewelry Demo Prod',
				),
				'fields'   => 'ids',
			)
		);
	}

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function restyle_blocks() {
		\wp_enqueue_block_style(
			'core/tag-cloud',
			array(
				'handle' => 'brandy/wp-tag-clouds',
				'src'    => self::ROOT_URL . '/assets/wp-tag-cloud.css',
				'ver'    => BRANDYSITES_SCRIPT_VERSION,
			)
		);
	}

	public function change_demo_cats() {
		return get_terms(
			array(
				'taxonomy' => 'product_cat',
				'name'     => array(
					'BJewelry',
					'BRing',
					'BBracelet',
					'BNecklace',
					'BEar Ring',
				),
				'fields'   => 'ids',
			)
		);
	}
}
