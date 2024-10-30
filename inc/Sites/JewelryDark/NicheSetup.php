<?php

namespace BrandySites\Sites\JewelryDark;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'jewelry-dark';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/JewelryDark';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/JewelryDark';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/jewelry-dark.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'jewelry_dark_main_header',
		'checkout' => 'jewelry_dark_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'jewelry_dark_main_footer',
		'checkout' => 'jewelry_dark_checkout_footer',
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
			add_filter( 'brandy_blocks_data', array( $this, 'change_product_image_gallery_swiper_data' ) );
			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'change_product_categories_layout' ), 100, 3 );
			add_filter( 'brandy_payment_method_icon', array( $this, 'change_payment_method_icon' ), 10, 2 );
			add_filter( 'brandy_product_demo_cats', array( $this, 'change_demo_cats' ) );
			$this->restyle_blocks();
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Jewelry Dark store', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/jewelry-dark-site-thumbnail-img-1-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/dark-jewelry-preview-min.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
					'sale_badge'         => array(
						'background_color' => '#FFAC70',
						'border'           => array(
							'radius' => array(
								'unit'  => 'px',
								'value' => 3,
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
							'value' => 5,
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
							'value' => 5,
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
					'primary_hover_color'              => '#000000',
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
					'outline_hover_color'              => 'var(--wp--preset--color--brandy-primary-text)',
					'outline_hover_background_color'   => '#445B70',
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
					'secondary_color'                  => '#272829',
					'secondary_background_color'       => '#d6e0e9',
					'secondary_border_color'           => '#d6e0e9',
					'secondary_box_shadow'             => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => '#d6e0e956',
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
					'secondary_hover_color'            => '#ffffff',
					'secondary_hover_background_color' => 'var(
						--wp--preset--color--brandy-accent
					  )',
					'secondary_hover_border_color'     => 'var(
						--wp--preset--color--brandy-accent
					  )',
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
		wp_enqueue_style( 'brandy-jewelry-dark-site-style', self::ROOT_URL . '/assets/style.css', array(), BRANDYSITES_SCRIPT_VERSION );
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

	public function change_product_image_gallery_swiper_data( $data ) {
		$data['woocommerce/product-image-gallery'] = array(
			'swiper' => array(
				'data' => array(
					'spaceBetween'  => 10,
					'slidesPerView' => 1,
					'breakpoints'   => array(
						'1200' => array(
							'slidesPerView' => 2,
						),
					),
				),
			),
		);
		return $data;
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
		wp_enqueue_block_style(
			'woocommerce/product-categories',
			array(
				'handle' => 'brandy/wc-product-categories',
				'src'    => self::ROOT_URL . '/assets/wc-product-categories.css',
				'ver'    => BRANDYSITES_SCRIPT_VERSION,
			)
		);
	}

	public function change_payment_method_icon( $html, $icon_type ) {
		switch ( $icon_type ) {
			case 'visa':
				return '
			<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="41.0947" height="28" rx="3" fill="#EFF2F9" fill-opacity="0.05"/>
			<path fill-rule="evenodd" clip-rule="evenodd" d="M12.4756 18.9716H9.98603L8.11917 11.8948C8.03056 11.5692 7.84242 11.2815 7.56567 11.1458C6.87501 10.8049 6.11394 10.5337 5.28369 10.3968V10.1244H9.29415C9.84765 10.1244 10.2628 10.5337 10.332 11.009L11.3006 16.1138L13.7889 10.1244H16.2093L12.4756 18.9716ZM17.593 18.9718H15.2418L17.1778 10.1245H19.529L17.593 18.9718ZM22.571 12.5735C22.6402 12.0969 23.0553 11.8245 23.5397 11.8245C24.3007 11.7561 25.1298 11.8929 25.8216 12.2326L26.2368 10.3277C25.5449 10.0553 24.7838 9.91846 24.0932 9.91846C21.8112 9.91846 20.1507 11.1439 20.1507 12.8447C20.1507 14.1386 21.3269 14.818 22.1571 15.2273C23.0553 15.6354 23.4013 15.9078 23.3321 16.3159C23.3321 16.9281 22.6402 17.2005 21.9496 17.2005C21.1193 17.2005 20.289 16.9965 19.5292 16.6556L19.1141 18.5617C19.9443 18.9013 20.8426 19.0382 21.6728 19.0382C24.2315 19.1054 25.8216 17.8811 25.8216 16.0435C25.8216 13.7293 22.571 13.5937 22.571 12.5735ZM34.0501 18.9718L32.1832 10.1245H30.178C29.7628 10.1245 29.3477 10.397 29.2093 10.8051L25.7524 18.9718H28.1727L28.6558 17.6791H31.6297L31.9065 18.9718H34.0501ZM30.5239 12.5052L31.2145 15.8396H29.2785L30.5239 12.5052Z" fill="#172B85"/>
			</svg>
			';
			case 'mastercard':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.869141" width="40.8279" height="28" rx="3" fill="#EFF2F9" fill-opacity="0.05"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5135 20.2792C20.1235 21.4789 18.3204 22.2032 16.3501 22.2032C11.954 22.2032 8.39014 18.5975 8.39014 14.1497C8.39014 9.70186 11.954 6.09619 16.3501 6.09619C18.3204 6.09619 20.1235 6.82043 21.5135 8.02012C22.9034 6.82043 24.7065 6.09619 26.6768 6.09619C31.073 6.09619 34.6368 9.70186 34.6368 14.1497C34.6368 18.5975 31.073 22.2032 26.6768 22.2032C24.7065 22.2032 22.9034 21.4789 21.5135 20.2792Z" fill="#ED0006"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5132 20.2792C23.2246 18.8021 24.3099 16.6041 24.3099 14.1497C24.3099 11.6953 23.2246 9.49728 21.5132 8.02012C22.9032 6.82043 24.7062 6.09619 26.6765 6.09619C31.0727 6.09619 34.6365 9.70186 34.6365 14.1497C34.6365 18.5975 31.0727 22.2032 26.6765 22.2032C24.7062 22.2032 22.9032 21.4789 21.5132 20.2792Z" fill="#F9A000"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5135 20.2777C23.225 18.8005 24.3102 16.6026 24.3102 14.1481C24.3102 11.6937 23.225 9.49571 21.5135 8.01855C19.802 9.49571 18.7168 11.6937 18.7168 14.1481C18.7168 16.6026 19.802 18.8005 21.5135 20.2777Z" fill="#FF5E00"/>
				</svg>
				';
			case 'paypal':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.737793" width="41.0947" height="28" rx="3" fill="#EFF2F9" fill-opacity="0.05"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M18.4326 21.5228L18.6978 19.8322L18.1069 19.8184H15.2852L17.2462 7.34249C17.2523 7.30471 17.272 7.26964 17.3009 7.24469C17.3299 7.21974 17.3668 7.20605 17.4054 7.20605H22.1634C23.743 7.20605 24.8331 7.5358 25.4021 8.18673C25.6689 8.49209 25.8389 8.81129 25.9211 9.16241C26.0074 9.53093 26.0088 9.97116 25.9247 10.5082L25.9186 10.5472V10.8914L26.1854 11.0431C26.41 11.1627 26.5886 11.2995 26.7256 11.4562C26.9538 11.7174 27.1014 12.0493 27.1638 12.4426C27.2283 12.8472 27.207 13.3287 27.1014 13.8739C26.9797 14.5009 26.7829 15.047 26.517 15.4938C26.2727 15.9055 25.9612 16.2471 25.5914 16.5117C25.2383 16.7632 24.8189 16.9541 24.3446 17.0762C23.885 17.1963 23.361 17.2569 22.7862 17.2569H22.416C22.1513 17.2569 21.8941 17.3525 21.6922 17.524C21.4897 17.6991 21.3559 17.9383 21.3148 18.1999L21.2868 18.3521L20.8181 21.3321L20.7969 21.4414C20.7913 21.4761 20.7816 21.4933 20.7674 21.505C20.7548 21.5157 20.7366 21.5228 20.7188 21.5228H18.4326Z" fill="#28356A"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M26.4381 10.5869C26.4241 10.678 26.4077 10.7711 26.3896 10.8668C25.7621 14.0992 23.6154 15.2158 20.8738 15.2158H19.4778C19.1425 15.2158 18.8599 15.4601 18.8078 15.7919L17.8906 21.6291C17.8567 21.847 18.024 22.0434 18.2431 22.0434H20.7191C21.0122 22.0434 21.2612 21.8297 21.3074 21.5395L21.3317 21.4134L21.7979 18.4451L21.8279 18.2823C21.8735 17.9912 22.1231 17.7774 22.4162 17.7774H22.7865C25.1853 17.7774 27.0632 16.8003 27.612 13.9724C27.8412 12.7912 27.7226 11.8048 27.1159 11.1111C26.9323 10.902 26.7045 10.7283 26.4381 10.5869Z" fill="#298FC2"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M25.7817 10.3236C25.6858 10.2955 25.5869 10.2702 25.4855 10.2472C25.3835 10.2248 25.279 10.205 25.1715 10.1876C24.7951 10.1266 24.3826 10.0977 23.9409 10.0977H20.2117C20.1197 10.0977 20.0325 10.1185 19.9545 10.1561C19.7824 10.2391 19.6547 10.4025 19.6237 10.6025L18.8304 15.6443L18.8076 15.7912C18.8598 15.4594 19.1424 15.2151 19.4777 15.2151H20.8736C23.6153 15.2151 25.762 14.0979 26.3894 10.8661C26.4082 10.7704 26.4239 10.6773 26.438 10.5862C26.2793 10.5017 26.1074 10.4294 25.9222 10.3678C25.8765 10.3526 25.8293 10.3379 25.7817 10.3236Z" fill="#22284F"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M19.6237 10.603C19.6547 10.403 19.7824 10.2396 19.9545 10.1572C20.0331 10.1194 20.1197 10.0986 20.2116 10.0986H23.9409C24.3826 10.0986 24.7951 10.1277 25.1715 10.1887C25.279 10.206 25.3834 10.2259 25.4855 10.2483C25.5869 10.2711 25.6858 10.2966 25.7817 10.3246C25.8293 10.3388 25.8765 10.3536 25.9226 10.3683C26.1078 10.4299 26.2798 10.5028 26.4385 10.5867C26.6252 9.39222 26.437 8.57891 25.7933 7.84245C25.0836 7.03156 23.8029 6.68457 22.164 6.68457H17.406C17.0712 6.68457 16.7856 6.92878 16.7339 7.26123L14.7521 19.8654C14.7131 20.1148 14.9047 20.3397 15.1554 20.3397H18.0928L19.6237 10.603Z" fill="#28356A"/>
				</svg>
				';
			case 'stripe':
				return '
				<svg width="41" height="28" viewBox="0 0 41 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.171875" width="40.8279" height="28" rx="3" fill="#EFF2F9" fill-opacity="0.05"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M22.1085 9.49866L20.0345 9.94382V8.26211L22.1085 7.8252V9.49866ZM26.4215 10.4299C25.6117 10.4299 25.0912 10.8091 24.802 11.0729L24.6946 10.5618H22.8768V20.174L24.9425 19.7371L24.9507 17.4041C25.2482 17.6185 25.6861 17.9235 26.4132 17.9235C27.8923 17.9235 29.2391 16.7364 29.2391 14.1231C29.2309 11.7324 27.8675 10.4299 26.4215 10.4299ZM25.9258 16.1101C25.4383 16.1101 25.1491 15.9369 24.9507 15.7226L24.9425 12.6642C25.1573 12.4251 25.4548 12.2603 25.9258 12.2603C26.6777 12.2603 27.1982 13.1011 27.1982 14.181C27.1982 15.2857 26.6859 16.1101 25.9258 16.1101ZM35.7503 14.2055C35.7503 12.0952 34.7258 10.4299 32.7675 10.4299C30.8009 10.4299 29.6111 12.0952 29.6111 14.1891C29.6111 16.6704 31.0158 17.9235 33.0319 17.9235C34.0152 17.9235 34.7588 17.7009 35.3207 17.3876V15.7389C34.7588 16.0192 34.1143 16.1923 33.2963 16.1923C32.4948 16.1923 31.7842 15.912 31.6933 14.9392H35.7338C35.7338 14.8938 35.7368 14.7906 35.7402 14.6717C35.7449 14.5101 35.7503 14.3195 35.7503 14.2055ZM31.6685 13.4223C31.6685 12.4907 32.2386 12.1033 32.7592 12.1033C33.2632 12.1033 33.8003 12.4907 33.8003 13.4223H31.6685ZM20.0345 10.5706H22.1085V17.7838H20.0345V10.5706ZM17.6797 10.5698L17.8119 11.1799C18.2994 10.2895 19.2662 10.4709 19.5306 10.5698V12.4659C19.2744 12.3752 18.4481 12.2598 17.9606 12.8946V17.7831H15.8949V10.5698H17.6797ZM13.6805 8.78149L11.6643 9.21017L11.6561 15.8134C11.6561 17.0334 12.5733 17.932 13.7962 17.932C14.4737 17.932 14.9695 17.8084 15.2422 17.66V15.9865C14.9777 16.0937 13.6722 16.4729 13.6722 15.2528V12.3263H15.2422V10.5704H13.6722L13.6805 8.78149ZM8.79723 12.2188C8.3593 12.2188 8.09489 12.3425 8.09489 12.664C8.09489 13.015 8.54994 13.1694 9.11449 13.361C10.0348 13.6733 11.2462 14.0844 11.2513 15.607C11.2513 17.0826 10.0697 17.9317 8.35104 17.9317C7.64043 17.9317 6.86373 17.7916 6.09529 17.4618V15.4998C6.78936 15.879 7.66522 16.1593 8.35104 16.1593C8.81375 16.1593 9.14427 16.0357 9.14427 15.6564C9.14427 15.2676 8.65098 15.0899 8.05545 14.8753C7.14849 14.5485 6.00439 14.1363 6.00439 12.7629C6.00439 11.3038 7.11988 10.4299 8.79723 10.4299C9.48304 10.4299 10.1606 10.5371 10.8464 10.8091V12.7464C10.2184 12.4084 9.4252 12.2188 8.79723 12.2188Z" fill="#6461FC"/>
				</svg>
				';
			case 'americanexpress':
				return '
				<svg width="42" height="28" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.303223" width="40.8279" height="28" rx="3" fill="#1F72CD" fill-opacity="0.05"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M7.62268 9.9165L3.80273 18.371H8.37574L8.94266 17.023H10.2385L10.8054 18.371H15.839V17.3422L16.2875 18.371H18.8913L19.3398 17.3205V18.371H29.8083L31.0813 17.058L32.2732 18.371L37.65 18.3819L33.818 14.1674L37.65 9.9165H32.3566L31.1175 11.2052L29.9631 9.9165H18.5747L17.5968 12.0987L16.5959 9.9165H12.0325V10.9103L11.5248 9.9165H7.62268ZM8.50753 11.1166H10.7366L13.2704 16.8496V11.1166H15.7123L17.6693 15.2272L19.473 11.1166H21.9026V17.1833H20.4242L20.4122 12.4294L18.2568 17.1833H16.9343L14.7668 12.4294V17.1833H11.7254L11.1488 15.8232H8.03368L7.45828 17.1821H5.82872L8.50753 11.1166ZM29.2667 11.1166H23.2552V17.1797H29.1736L31.0812 15.1703L32.9198 17.1797H34.8419L32.0482 14.1657L34.8419 11.1166H33.0032L31.1053 13.1029L29.2667 11.1166ZM9.59201 12.1431L8.5657 14.5659H10.6171L9.59201 12.1431ZM24.7398 13.4805V12.373V12.3719H28.4908L30.1275 14.1431L28.4183 15.9239H24.7398V14.7148H28.0194V13.4805H24.7398Z" fill="#EFF2F9"/>
				</svg>
				';

			default:
				return $html;
		}
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
					'BGemstone',
					'BAnklet',
				),
				'fields'   => 'ids',
			)
		);
	}
}
