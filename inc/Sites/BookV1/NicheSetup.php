<?php

namespace BrandySites\Sites\BookV1;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {
	use SingletonTrait;

	public const NICHE_ID = 'book_v1';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/book_v1.json';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/BookV1';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/BookV1';

	protected const REPLACED_HEADERS = array(
		'main'     => 'bookstore_main_header',
		'checkout' => 'bookstore_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'bookstore_main_footer',
		'checkout' => 'bookstore_checkout_footer',
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
			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'change_product_categories_layout' ), 100, 3 );
			add_filter( 'brandy_product_demo_tags', array( $this, 'change_demo_tags' ) );
			add_filter( 'brandy_product_demo_cats', array( $this, 'change_demo_cats' ) );
			add_filter( 'brandy_products_collection_column', array( $this, 'change_products_collection_column' ) );
			add_filter( 'brandy_products_collection_grid_min_width', array( $this, 'change_products_collection_grid_min_width' ) );
			add_filter( 'brandy_swiper_navigation_icon', array( $this, 'change_swiper_navigation_icon' ), 10, 2 );
			add_filter( 'brandy_blocks_data', array( $this, 'change_blocks_data' ) );
			add_filter( 'brandy_products_collection_per_page', array( $this, 'change_products_per_page' ) );
			add_filter( 'brandy_related_products_per_page', array( $this, 'change_products_per_page' ) );
			add_filter( 'brandy_payment_method_icon', array( $this, 'change_payment_method_icon' ), 10, 2 );
			$this->restyle_blocks();
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Book store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/book-v1-site-thumbnail-img-1-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/book-v1-site-preview-img-min.png',
			'plan'                           => 'free',
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
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
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => 'var(--wp--preset--color--brandy-primary-text)',
					'primary_box_shadow'               => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => '#FF7F091A',
							'x'      => 0,
							'y'      => 5,
							'blur'   => 35,
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
					'outline_hover_background_color'   => 'var(--wp--preset--color--brandy-primary-text)',
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
					'secondary_background_color'       => '#151617',
					'secondary_border_color'           => '#151617',
					'secondary_box_shadow'             => array(
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
		wp_enqueue_style( 'brandy-book-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
		// wp_enqueue_script( 'brandy-book-site-script', self::ROOT_URL . '/assets/script.js', array('jquery'), BRANDYSITES_SCRIPT_VERSION );
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
			<a href="%1$s" class="wc-block-product-categories-list-item__wrap-link">
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
			</ul>
		</div>
		',
			$container_class,
			$has_slider ? 'swiper-wrapper' : '',
			$items
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

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Book v1 Demo Prod',
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
					'BFamily Story',
					'BRomance Loves',
					'BFiction Books',
					'BReveal Zodiac',
					'BStrategy Business',
					'BCooking Secrets',
				),
				'fields'   => 'ids',
			)
		);
	}

	public function change_products_collection_column() {
		return 5;
	}

	public function change_swiper_navigation_icon( $icon, $type ) {
		if ( 'next' === $type ) {
			return '<svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M8.05867 8.69882C7.75189 8.97713 7.7288 9.45145 8.00711 9.75823C8.28542 10.065 8.75973 10.0881 9.06652 9.80979L13.6177 5.681C13.6423 5.65872 13.6654 5.63544 13.6869 5.61129C13.8761 5.47513 13.9992 5.25303 13.9992 5.00217C13.9992 4.75134 13.8761 4.52927 13.687 4.3931C13.6654 4.36892 13.6423 4.34561 13.6177 4.32331L9.06652 0.194522C8.75973 -0.0837864 8.28542 -0.0607027 8.00711 0.246082C7.7288 0.552867 7.75189 1.02718 8.05867 1.30549L11.3068 4.25217H0.75C0.335786 4.25217 0 4.58796 0 5.00217C0 5.41638 0.335786 5.75217 0.75 5.75217H11.3068L8.05867 8.69882Z" fill="#969FA9"/>
			</svg>
			';
		}
		return '<svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M5.94045 8.69882C6.24723 8.97713 6.27032 9.45145 5.99201 9.75823C5.7137 10.065 5.23938 10.0881 4.9326 9.80979L0.381374 5.681C0.356878 5.65878 0.333879 5.63556 0.312376 5.61147C0.12307 5.47533 -0.000207901 5.25315 -0.000207901 5.00217C-0.000207901 4.75122 0.123039 4.52906 0.312305 4.39292C0.333829 4.3688 0.356852 4.34556 0.381374 4.32331L4.9326 0.194522C5.23938 -0.0837864 5.7137 -0.0607027 5.99201 0.246082C6.27032 0.552867 6.24723 1.02718 5.94045 1.30549L2.69227 4.25217H13.249C13.6632 4.25217 13.999 4.58796 13.999 5.00217C13.999 5.41638 13.6632 5.75217 13.249 5.75217H2.6923L5.94045 8.69882Z" fill="#969FA9"/>
		</svg>		
		';
	}

	public function change_blocks_data( $data ) {
		$data['woocommerce/product-collection'] = array(
			'swiper' => array(
				'data' => array(
					'spaceBetween'  => 30,
					'slidesPerView' => 2,
					'breakpoints'   => array(
						'1400' => array(
							'slidesPerView' => 5,
						),
						'1200' => array(
							'slidesPerView' => 4,
						),
						'800'  => array(
							'slidesPerView' => 3,
						),
					),
				),
			),
		);
		$data['woocommerce/product-categories'] = array(
			'swiper' => array(
				'data' => array(
					'direction'     => 'horizontal',
					'spaceBetween'  => 30,
					'slidesPerView' => 1,
					'breakpoints'   => array(
						'1200' => array(
							'slidesPerView' => 6,
						),
						'1000' => array(
							'slidesPerView' => 4,
						),
						'800'  => array(
							'slidesPerView' => 3,
						),
						'400'  => array(
							'slidesPerView' => 2,
						),
					),
				),
			),
		);
		return $data;
	}

	public function change_products_collection_grid_min_width() {
		return '14rem';
	}

	public function change_products_per_page() {
		return 10;
	}

	public function change_payment_method_icon( $html, $icon_type ) {
		switch ( $icon_type ) {
			case 'visa':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="41.0947" height="28" rx="3" fill="white"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M12.4751 18.9711H9.98554L8.11869 11.8943C8.03008 11.5688 7.84193 11.281 7.56518 11.1453C6.87452 10.8045 6.11346 10.5332 5.2832 10.3964V10.1239H9.29366C9.84716 10.1239 10.2623 10.5332 10.3315 11.0085L11.3001 16.1133L13.7884 10.1239H16.2088L12.4751 18.9711ZM17.5925 18.9713H15.2413L17.1774 10.124H19.5285L17.5925 18.9713ZM22.5705 12.573C22.6397 12.0965 23.0549 11.824 23.5392 11.824C24.3002 11.7556 25.1293 11.8924 25.8211 12.2321L26.2363 10.3272C25.5444 10.0548 24.7833 9.91797 24.0927 9.91797C21.8107 9.91797 20.1502 11.1434 20.1502 12.8442C20.1502 14.1381 21.3264 14.8175 22.1566 15.2268C23.0549 15.6349 23.4008 15.9073 23.3316 16.3154C23.3316 16.9276 22.6397 17.2 21.9491 17.2C21.1188 17.2 20.2886 16.996 19.5287 16.6551L19.1136 18.5612C19.9438 18.9009 20.8421 19.0377 21.6723 19.0377C24.231 19.1049 25.8211 17.8806 25.8211 16.043C25.8211 13.7289 22.5705 13.5932 22.5705 12.573ZM34.0496 18.9713L32.1827 10.124H30.1775C29.7624 10.124 29.3472 10.3965 29.2089 10.8046L25.7519 18.9713H28.1723L28.6554 17.6786H31.6292L31.906 18.9713H34.0496ZM30.5234 12.5048L31.214 15.8391H29.278L30.5234 12.5048Z" fill="#172B85"/>
				</svg>
			';
			case 'discover':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.43457" width="41.0947" height="28" rx="3" fill="white"/>
				<path d="M17.2461 27.0665L40.5954 20.5332V25.0665C40.5954 26.1711 39.6999 27.0665 38.5954 27.0665H17.2461Z" fill="#FD6020"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M36.5411 11.2124C37.8168 11.2124 38.5185 11.7765 38.5185 12.8421C38.5823 13.657 38.0082 14.3465 37.2427 14.4718L38.965 16.791H37.6255L36.1583 14.5345H36.0308V16.791H34.9464V11.2124H36.5411ZM36.031 13.7825H36.3497C37.0509 13.7825 37.3696 13.4691 37.3696 12.9049C37.3696 12.4035 37.0509 12.0901 36.3497 12.0901H36.031V13.7825ZM31.1831 16.791H34.2449V15.8508H32.2675V14.3465H34.1811V13.4063H32.2675V12.1526H34.2449V11.2124H31.1831V16.791ZM27.9936 14.9733L26.5265 11.2124H25.3783L27.7385 16.9164H28.3126L30.6727 11.2124H29.5245L27.9936 14.9733ZM15.0446 14.0332C15.0446 15.6002 16.3204 16.9165 17.9151 16.9165C18.4254 16.9165 18.8719 16.7911 19.3184 16.6031V15.3495C18.9995 15.7256 18.553 15.9763 18.0426 15.9763C17.022 15.9763 16.1928 15.2241 16.1928 14.2212V14.0958C16.129 13.0929 16.9582 12.2154 17.9789 12.1527C18.4892 12.1527 18.9995 12.4034 19.3184 12.7795V11.5259C18.9357 11.2752 18.4254 11.2125 17.9789 11.2125C16.3204 11.0871 15.0446 12.4034 15.0446 14.0332ZM13.067 13.3435C12.4291 13.0928 12.2378 12.9674 12.2378 12.654C12.3016 12.2779 12.6205 11.9645 13.0032 12.0272C13.3222 12.0272 13.6411 12.2152 13.8963 12.466L14.4704 11.7138C14.0238 11.3377 13.4497 11.087 12.8757 11.087C11.9826 11.0243 11.2172 11.7138 11.1534 12.5913V12.654C11.1534 13.4062 11.4723 13.845 12.4929 14.1584C12.7481 14.221 13.0032 14.3464 13.2584 14.4718C13.4497 14.5971 13.5773 14.7852 13.5773 15.0359C13.5773 15.4747 13.1946 15.8508 12.8119 15.8508H12.7481C12.2378 15.8508 11.7913 15.5373 11.5999 15.0986L10.8982 15.7881C11.2809 16.4776 12.0464 16.8537 12.8119 16.8537C13.8325 16.9163 14.6617 16.1642 14.7255 15.1613V14.9732C14.6617 14.221 14.3428 13.845 13.067 13.3435ZM9.36739 16.791H10.451V11.2124H9.36739V16.791ZM4.32812 11.2124H5.92283H6.24177C7.77269 11.2751 8.98466 12.5287 8.92087 14.0331C8.92087 14.8479 8.53814 15.6001 7.90026 16.1642C7.32617 16.603 6.6245 16.8537 5.92283 16.791H4.32812V11.2124ZM5.73152 15.8505C6.24182 15.9132 6.81592 15.7251 7.19865 15.4117C7.58137 15.0356 7.77274 14.5342 7.77274 13.97C7.77274 13.4686 7.58137 12.9671 7.19865 12.591C6.81592 12.2776 6.24182 12.0896 5.73152 12.1523H5.41258V15.8505H5.73152Z" fill="black"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M22.572 11.083C20.9772 11.083 19.6377 12.3366 19.6377 13.9664C19.6377 15.5334 20.9135 16.8497 22.572 16.9124C24.2304 16.9751 25.5062 15.6588 25.57 14.029C25.5062 12.3993 24.2304 11.083 22.572 11.083V11.083Z" fill="#FD6020"/>
				</svg>
			';
			case 'mastercard':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.869141" width="40.8279" height="28" rx="3" fill="white"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5139 20.2787C20.124 21.4784 18.3209 22.2027 16.3506 22.2027C11.9544 22.2027 8.39062 18.597 8.39062 14.1492C8.39062 9.70137 11.9544 6.0957 16.3506 6.0957C18.3209 6.0957 20.124 6.81994 21.5139 8.01964C22.9039 6.81994 24.707 6.0957 26.6773 6.0957C31.0734 6.0957 34.6373 9.70137 34.6373 14.1492C34.6373 18.597 31.0734 22.2027 26.6773 22.2027C24.707 22.2027 22.9039 21.4784 21.5139 20.2787Z" fill="#ED0006"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5137 20.2787C23.2251 18.8016 24.3104 16.6036 24.3104 14.1492C24.3104 11.6948 23.2251 9.49679 21.5137 8.01963C22.9037 6.81994 24.7067 6.0957 26.677 6.0957C31.0732 6.0957 34.637 9.70137 34.637 14.1492C34.637 18.597 31.0732 22.2027 26.677 22.2027C24.7067 22.2027 22.9037 21.4784 21.5137 20.2787Z" fill="#F9A000"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5135 20.2777C23.225 18.8005 24.3102 16.6026 24.3102 14.1481C24.3102 11.6937 23.225 9.49571 21.5135 8.01855C19.802 9.49571 18.7168 11.6937 18.7168 14.1481C18.7168 16.6026 19.802 18.8005 21.5135 20.2777Z" fill="#FF5E00"/>
				</svg>
				';
			case 'paypal':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.738281" width="41.0947" height="28" rx="3" fill="white"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M18.4335 21.5228L18.6988 19.8322L18.1079 19.8184H15.2861L17.2472 7.34249C17.2533 7.30471 17.273 7.26964 17.3019 7.24469C17.3308 7.21974 17.3678 7.20605 17.4064 7.20605H22.1643C23.744 7.20605 24.8341 7.5358 25.4031 8.18673C25.6699 8.49209 25.8399 8.81129 25.9221 9.16241C26.0084 9.53093 26.0098 9.97116 25.9257 10.5082L25.9196 10.5472V10.8914L26.1864 11.0431C26.411 11.1627 26.5896 11.2995 26.7266 11.4562C26.9548 11.7174 27.1024 12.0493 27.1648 12.4426C27.2293 12.8472 27.208 13.3287 27.1024 13.8739C26.9806 14.5009 26.7838 15.047 26.518 15.4938C26.2736 15.9055 25.9622 16.2471 25.5923 16.5117C25.2393 16.7632 24.8198 16.9541 24.3456 17.0762C23.8859 17.1963 23.3619 17.2569 22.7872 17.2569H22.417C22.1523 17.2569 21.8951 17.3525 21.6932 17.524C21.4907 17.6991 21.3569 17.9383 21.3158 18.1999L21.2878 18.3521L20.8191 21.3321L20.7979 21.4414C20.7922 21.4761 20.7826 21.4933 20.7684 21.505C20.7557 21.5157 20.7375 21.5228 20.7198 21.5228H18.4335Z" fill="#28356A"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M26.4396 10.5869C26.4255 10.678 26.4092 10.7711 26.391 10.8668C25.7636 14.0992 23.6169 15.2158 20.8752 15.2158H19.4793C19.144 15.2158 18.8614 15.4601 18.8092 15.7919L17.8921 21.6291C17.8581 21.847 18.0255 22.0434 18.2446 22.0434H20.7205C21.0136 22.0434 21.2627 21.8297 21.3089 21.5395L21.3332 21.4134L21.7993 18.4451L21.8293 18.2823C21.8749 17.9912 22.1246 17.7774 22.4177 17.7774H22.788C25.1867 17.7774 27.0646 16.8003 27.6135 13.9724C27.8427 12.7912 27.724 11.8048 27.1173 11.1111C26.9338 10.902 26.706 10.7283 26.4396 10.5869Z" fill="#298FC2"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M25.7827 10.3236C25.6868 10.2955 25.5879 10.2702 25.4865 10.2472C25.3844 10.2248 25.28 10.205 25.1725 10.1876C24.7961 10.1266 24.3836 10.0977 23.9419 10.0977H20.2126C20.1207 10.0977 20.0335 10.1185 19.9555 10.1561C19.7834 10.2391 19.6557 10.4025 19.6247 10.6025L18.8313 15.6443L18.8086 15.7912C18.8607 15.4594 19.1433 15.2151 19.4787 15.2151H20.8746C23.6162 15.2151 25.7629 14.0979 26.3904 10.8661C26.4091 10.7704 26.4249 10.6773 26.439 10.5862C26.2803 10.5017 26.1083 10.4294 25.9232 10.3678C25.8775 10.3526 25.8303 10.3379 25.7827 10.3236Z" fill="#22284F"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M19.6247 10.603C19.6557 10.403 19.7834 10.2396 19.9555 10.1572C20.034 10.1194 20.1207 10.0986 20.2126 10.0986H23.9419C24.3836 10.0986 24.7961 10.1277 25.1724 10.1887C25.28 10.206 25.3844 10.2259 25.4864 10.2483C25.5879 10.2711 25.6868 10.2966 25.7827 10.3246C25.8303 10.3388 25.8774 10.3536 25.9236 10.3683C26.1087 10.4299 26.2808 10.5028 26.4395 10.5867C26.6262 9.39222 26.438 8.57891 25.7943 7.84245C25.0846 7.03156 23.8039 6.68457 22.165 6.68457H17.4069C17.0722 6.68457 16.7866 6.92878 16.7349 7.26123L14.7531 19.8654C14.714 20.1148 14.9057 20.3397 15.1563 20.3397H18.0938L19.6247 10.603Z" fill="#28356A"/>
				</svg>
				';
			case 'stripe':
				return '
				<svg width="41" height="28" viewBox="0 0 41 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.171875" width="40.8279" height="28" rx="3" fill="white"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M22.109 9.49867L20.035 9.94383V8.26211L22.109 7.8252V9.49867ZM26.422 10.4299C25.6122 10.4299 25.0917 10.8091 24.8025 11.0729L24.6951 10.5618H22.8772V20.174L24.9429 19.7371L24.9512 17.4041C25.2487 17.6185 25.6866 17.9235 26.4137 17.9235C27.8928 17.9235 29.2396 16.7364 29.2396 14.1231C29.2313 11.7324 27.868 10.4299 26.422 10.4299ZM25.9262 16.1101C25.4387 16.1101 25.1495 15.9369 24.9512 15.7226L24.943 12.6642C25.1578 12.4251 25.4553 12.2603 25.9262 12.2603C26.6782 12.2603 27.1987 13.1011 27.1987 14.181C27.1987 15.2857 26.6864 16.1101 25.9262 16.1101ZM35.7508 14.2055C35.7508 12.0952 34.7262 10.4299 32.768 10.4299C30.8014 10.4299 29.6116 12.0952 29.6116 14.1891C29.6116 16.6704 31.0163 17.9235 33.0324 17.9235C34.0156 17.9235 34.7593 17.7009 35.3212 17.3876V15.7389C34.7593 16.0192 34.1148 16.1923 33.2968 16.1923C32.4953 16.1923 31.7847 15.912 31.6938 14.9392H35.7343C35.7343 14.8938 35.7373 14.7906 35.7407 14.6717C35.7453 14.5101 35.7508 14.3195 35.7508 14.2055ZM31.669 13.4223C31.669 12.4907 32.2391 12.1033 32.7596 12.1033C33.2637 12.1033 33.8008 12.4907 33.8008 13.4223H31.669ZM20.035 10.5706H22.109V17.7838H20.035V10.5706ZM17.6802 10.5698L17.8124 11.1799C18.2999 10.2895 19.2667 10.4709 19.5311 10.5698V12.4659C19.2749 12.3752 18.4486 12.2598 17.9611 12.8946V17.7831H15.8954V10.5698H17.6802ZM13.681 8.78149L11.6648 9.21017L11.6566 15.8134C11.6566 17.0334 12.5737 17.932 13.7966 17.932C14.4742 17.932 14.97 17.8084 15.2426 17.66V15.9865C14.9782 16.0937 13.6727 16.4729 13.6727 15.2528V12.3263H15.2426V10.5704H13.6727L13.681 8.78149ZM8.79772 12.2188C8.35979 12.2188 8.09538 12.3425 8.09538 12.664C8.09538 13.015 8.55043 13.1694 9.11498 13.361C10.0353 13.6733 11.2467 14.0844 11.2518 15.607C11.2518 17.0826 10.0702 17.9317 8.35152 17.9317C7.64092 17.9317 6.86422 17.7916 6.09577 17.4618V15.4998C6.78985 15.879 7.66571 16.1593 8.35152 16.1593C8.81424 16.1593 9.14476 16.0357 9.14476 15.6564C9.14476 15.2676 8.65147 15.0899 8.05593 14.8753C7.14898 14.5485 6.00488 14.1363 6.00488 12.7629C6.00488 11.3038 7.12036 10.4299 8.79772 10.4299C9.48353 10.4299 10.1611 10.5371 10.8469 10.8091V12.7464C10.2189 12.4084 9.42569 12.2188 8.79772 12.2188Z" fill="#6461FC"/>
				</svg>
				';
			case 'americanexpress':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.302734" width="40.8279" height="28" rx="3" fill="white"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M7.6217 9.91699L3.80176 18.3715H8.37476L8.94168 17.0235H10.2375L10.8045 18.3715H15.838V17.3427L16.2866 18.3715H18.8903L19.3389 17.3209V18.3715H29.8074L31.0803 17.0585L32.2722 18.3715L37.649 18.3824L33.817 14.1679L37.649 9.91699H32.3556L31.1165 11.2057L29.9621 9.91699H18.5737L17.5958 12.0992L16.595 9.91699H12.0315V10.9108L11.5238 9.91699H7.6217ZM8.50655 11.1171H10.7356L13.2694 16.8501V11.1171H15.7113L17.6683 15.2276L19.472 11.1171H21.9017V17.1838H20.4233L20.4112 12.4299L18.2558 17.1838H16.9333L14.7659 12.4299V17.1838H11.7244L11.1478 15.8237H8.03271L7.4573 17.1826H5.82774L8.50655 11.1171ZM29.2657 11.1171H23.2542V17.1802H29.1726L31.0802 15.1708L32.9189 17.1802H34.8409L32.0473 14.1662L34.8409 11.1171H33.0023L31.1043 13.1034L29.2657 11.1171ZM9.59103 12.1436L8.56472 14.5664H10.6162L9.59103 12.1436ZM24.7388 13.481V12.3735V12.3724H28.4898L30.1266 14.1436L28.4173 15.9244H24.7388V14.7153H28.0184V13.481H24.7388Z" fill="#1F72CD"/>
				</svg>
				';

			default:
				return $html;
		}
	}
}
