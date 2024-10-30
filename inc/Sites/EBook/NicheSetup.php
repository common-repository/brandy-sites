<?php

namespace BrandySites\Sites\EBook;

use BrandySites\Traits\SingletonTrait;
use DOMDocument;
use SimpleXMLElement;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {
	use SingletonTrait;

	public const NICHE_ID = 'ebook';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/ebook.json';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/EBook';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/EBook';

	protected const REPLACED_HEADERS = array(
		'main'     => 'ebook_main_header',
		'checkout' => 'ebook_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'ebook_main_footer',
		'checkout' => 'ebook_checkout_footer',
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
			add_filter( 'render_block_woocommerce/product-image', array( $this, 'add_premium_tag_to_product_image' ), 10, 3 );
			add_filter( 'render_block_woocommerce/product-button', array( $this, 'add_product_button_icon' ), 10, 3 );
			add_filter( 'brandy_swiper_navigation_icon', array( $this, 'change_swiper_navigation_icon' ), 10, 2 );

			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'woocommerce_product_categories' ), 100, 3 );
			add_filter( 'brandy_blocks_data', array( $this, 'add_block_data' ) );
			add_filter( 'brandy_products_collection_grid_min_width', array( $this, 'change_products_grid_max_column' ) );
			$this->restyle_blocks();
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo E-Book', 'brandy-sites' ),
			'img'                            => 'https://images.wpbrandy.com/uploads/ebook-site-thumb-img-min.png',
			'demo_url'                       => 'https://images.wpbrandy.com/uploads/ebook-site-preview-min.png',
			'plan'                           => 'free',
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
					'sale_badge'         => array(
						'background_color' => '#FF991D',
					),
				),
				'input'       => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 16,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'select'      => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 16,
							'min'   => 0,
							'max'   => 100,
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
		wp_enqueue_script( 'brandy-book-site-script', self::ROOT_URL . '/assets/script.js', array( 'jquery' ), BRANDYSITES_SCRIPT_VERSION, true );
	}

	public function change_product_template_layout() {
		return self::ROOT_PATH . '/views/query-product-layout.php';
	}

	public function change_demo_tags() {
		return get_terms(
			array(
				'taxonomy' => 'product_tag',
				'name'     => array(
					'Brandy Ebook Demo Prod',
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
					'BMy Beloved Family Collection',
					'BFamily 1',
					'BFamily 2',
					'BFamily 3',
					'BFamily 4',
					'BYour Literary Journey Begins',
					'BJourney 1',
					'BJourney 2',
					'BJourney 3',
					'BJourney 4',
					'BStart-up for Young People',
					'BStart-up 1',
					'BStart-up 2',
					'BStart-up 3',
					'BStart-up 4',
					'BTest Ebook Category',
					'BTest Ebook 1',
				),
				'fields'   => 'ids',
			)
		);
	}

	public function woocommerce_product_categories( $content, $attributes, $block ) {

		$hierarchical  = wc_string_to_bool( $attributes['isHierarchical'] );
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
		$categories_tree = $this->get_categories_tree( $categories, $hierarchical );
		$items           = '';

		$item_markup = '
		<li class="wc-block-product-categories-list-item swiper-slide">
			<div class="wc-block-product-categories-list-item__images">
				%1$s
			</div>
			<div class="wc-block-product-categories-list-item__content">
				<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 8.37668V1.44824C0 0.486364 0.539 0.254934 1.197 0.93476L3.01 2.8079C3.283 3.08995 3.731 3.08995 3.997 2.8079L6.503 0.211541C6.776 -0.0705138 7.224 -0.0705138 7.49 0.211541L10.003 2.8079C10.276 3.08995 10.724 3.08995 10.99 2.8079L12.803 0.93476C13.461 0.254934 14 0.486364 14 1.44824V8.38391C14 10.5536 12.6 12 10.5 12H3.5C1.568 11.9928 0 10.3728 0 8.37668Z" fill="#FF991D"/>
				</svg>
				<div>
					<a href="%2$s">
					<p class="wc-block-product-categories-list-item__name">%3$s</p>
					</a>
					<p class="brandy-product-categories-list-item-count">%4$s</p>
				</div>
			</div>
		</li>
		';

		foreach ( array_values( $categories_tree ) as $tree_key => $list_categories ) {

			$parent_cat      = $list_categories[0];
			$parent_cat_link = get_category_link( $parent_cat );
			$parent_cat_name = $parent_cat->name;

			$image_list   = '';
			$image_markup = '<a href="%1$s" aria-label="%2$s" class="wc-block-product-categories-list-item__image %3$s">%4$s</a>';
			for ( $cat_ind = 0; $cat_ind <= 4; $cat_ind++ ) {

				$class        = '';
				$has_children = count( $list_categories ) > 1;

				if ( 0 === $cat_ind ) {
					$class .= ' parent-item';
				}
				if ( ! $has_children ) {
					$class .= ' no-children';
				}
				if ( $cat_ind > 0 && ! $has_children ) {
					continue;
				}

				if ( ! isset( $list_categories[ $cat_ind ] ) ) {
					$cat_image = \wc_placeholder_img( 800 );
					$cat_link  = $parent_cat_link;
					$cat_name  = $parent_cat_name;
				} else {
					$category     = $list_categories[ $cat_ind ];
					$cat_link     = get_category_link( $category );
					$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
					$cat_image    = wp_get_attachment_image( $thumbnail_id, 800 );
					$cat_name     = $category->name;
				}

				$image_list .= sprintf(
					$image_markup,
					$cat_link,
					$cat_name,
					$class,
					empty( $cat_image ) ? \wc_placeholder_img( 800 ) : $cat_image
				);
			}

			$items .= sprintf(
				$item_markup,
				$image_list,
				$parent_cat_link,
				$parent_cat->name,
				sprintf( '%s %s', $parent_cat->category_count, _n( 'book', 'books', $parent_cat->category_count, 'brandy' ) ),
			);
		}

		$content = sprintf(
			'
		<div data-block-name="woocommerce/product-categories" class="wp-block-woocommerce-product-categories wc-block-product-categories %1s brandy-product-categories-list swiper">
			<div class="wc-block-product-categories-navigation brandy-swiper-navigation">
				<div class="brandy-swiper-navigation-button brandy-swiper-navigation-button--back wc-block-product-categories-navigation-button">' . \brandy_swiper_navigation_icon() . '</div>
				<div class="brandy-swiper-navigation-button brandy-swiper-navigation-button--next wc-block-product-categories-navigation-button">' . \brandy_swiper_navigation_icon( 'next' ) . '</div>
			</div>
			<ul class="wc-block-product-categories-list swiper-wrapper">
			%2s
			</ul>
			<div class="swiper-scrollbar brandy-swiper-scrollbar wc-block-product-categories-scrollbar"></div>
		</div>
		',
			isset( $attributes['align'] ) && 'wide' === $attributes['align'] ? 'alignwide' : '',
			$items
		);
		return $content;
	}

	private function get_categories_tree( $categories, $hierarchical = true ) {
		$tree = array();
		foreach ( $categories as $cat ) {
			$tree_key = ! $cat->parent ? $cat->term_id : $cat->parent;

			if ( ! $hierarchical ) {
				$tree_key = $cat->term_id;
			}

			if ( ! isset( $tree[ $tree_key ] ) ) {
				$tree[ $tree_key ] = array();
			}
			$tree[ $tree_key ][] = $cat;
		}
		return $tree;
	}

	public function add_block_data( $data ) {
		$data['woocommerce/product-categories'] = array(
			'swiper' => array(
				'data' => array(
					'direction'    => 'horizontal',
					'spaceBetween' => 30,
					'breakpoints'  => array(
						'1200' => array(
							'slidesPerView' => 3,
						),
						'600'  => array(
							'slidesPerView' => 2,
						),
						'400'  => array(
							'slidesPerView' => 1,
						),
					),
				),
			),
		);
		return $data;
	}

	public function add_premium_tag_to_product_image( $html, $attributes, $block ) {

		if ( empty( $html ) ) {
			return $html;
		}

		$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : '';
		$product = \wc_get_product( $post_id );

		if ( ! $product || ! ( $product instanceof \WC_Product ) ) {
			return $html;
		}

		if ( $product->is_on_sale() ) {
			return $html;
		}

		if ( $product->get_regular_price() ) {
			return $html;
		}

		$dom = new DOMDocument();
		$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
		$premium_tag = $dom->createElement( 'div' );
		$premium_tag->setAttribute( 'class', 'brandy-ebook-premium-tag' );

		$icon = $dom->createElement( 'div', '{{icon_placeholder}}' );
		$icon->setAttribute( 'class', 'brandy-ebook-product-button-icon' );
		$premium_tag->appendChild( $icon );

		$dom->firstChild->appendChild( apply_filters( 'brandy_ebook_site_premium_tag', $premium_tag ) );

		$html = $dom->saveHTML();

		$html = str_replace(
			'{{icon_placeholder}}',
			'<svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 6.98056V1.20687C0 0.405304 0.462 0.212445 1.026 0.778966L2.58 2.33991C2.814 2.57496 3.198 2.57496 3.426 2.33991L5.574 0.176284C5.808 -0.0587615 6.192 -0.0587615 6.42 0.176284L8.574 2.33991C8.808 2.57496 9.192 2.57496 9.42 2.33991L10.974 0.778966C11.538 0.212445 12 0.405304 12 1.20687V6.98659C12 8.79464 10.8 10 9 10H3C1.344 9.99397 0 8.64397 0 6.98056Z" fill="#FF991D"/>
			</svg>
			',
			$html
		);

		return $html;
	}

	public function add_product_button_icon( $html, $attributes, $block ) {

		if ( empty( $html ) ) {
			return $html;
		}

		$dom = new DOMDocument();
		$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
		$icon = $dom->createElement( 'div', '{{icon_placeholder}}' );
		$icon->setAttribute( 'class', 'brandy-ebook-product-button-icon' );

		$buttons = $dom->getElementsByTagName( 'button' );

		if ( ! $buttons || $buttons->count() < 1 ) {
			return $html;
		}

		$button = $buttons->item( 0 );
		$button->insertBefore( $icon, $button->firstChild );

		$html = $dom->saveHTML();
		$html = str_replace(
			'{{icon_placeholder}}',
			'<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M15.6819 17C16.1087 17 16.4546 16.6589 16.4546 16.2381C16.4546 15.8173 16.1087 15.4762 15.6819 15.4762C15.2551 15.4762 14.9092 15.8173 14.9092 16.2381C14.9092 16.6589 15.2551 17 15.6819 17Z"
				fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
			<path
				d="M7.18191 17C7.60867 17 7.95463 16.6589 7.95463 16.2381C7.95463 15.8173 7.60867 15.4762 7.18191 15.4762C6.75514 15.4762 6.40918 15.8173 6.40918 16.2381C6.40918 16.6589 6.75514 17 7.18191 17Z"
				fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
			<path
				d="M1 1H4.09091L6.16182 11.2019C6.23248 11.5527 6.42602 11.8678 6.70856 12.092C6.9911 12.3163 7.34463 12.4354 7.70727 12.4286H15.2182C15.5808 12.4354 15.9344 12.3163 16.2169 12.092C16.4994 11.8678 16.693 11.5527 16.7636 11.2019L18 4.80952H4.86364"
				stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>',
			$html
		);
		return $html;
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

	public function change_products_grid_max_column() {
		return '15rem';
	}
}
