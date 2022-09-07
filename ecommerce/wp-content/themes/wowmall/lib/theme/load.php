<?php

namespace WOWMALL\THEME\Theme;

class Load {


	protected static $_instance;

	public function __construct() {
		load_theme_textdomain( 'wowmall', WOWMALL_THEME_DIR . '/languages' );

		add_action( 'after_setup_theme', array( $this, 'supports' ) );
		add_action( 'admin_init', array( $this, 'enqueue_editor_styles' ) );
		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );

		// Fix WooCommerce add-to-cart-variation.js missing in product pages
		add_action(
			'wp_enqueue_scripts',
			function () {
				if ( function_exists( 'is_product' ) && is_product() ) {
					wp_enqueue_script( 'wc-add-to-cart-variation' );
				}
			},
			10,
			2
		);

		// Fix WooCommerce empty <form action=""/>
		add_filter(
			'woocommerce_add_to_cart_form_action',
			function ( $produc_link ) {

				global $product;

				if ( $product && ! $produc_link ) {
					return $product->get_permalink();
				}

				return $produc_link;
			},
			999
		);
	}

	public function enqueue_editor_styles() {
		if ( isset( wp_styles()->registered['wowmall-theme-editor']->src ) ) {
			add_editor_style(
				array(
					wp_styles()->registered['wowmall-theme-editor']->src,
				)
			);
		}
	}

	public function block_assets() {
		if ( ! is_admin() ) {
			wp_enqueue_style( 'wowmall-theme-frontend' );
		}
	}

	public function supports() {
		add_theme_support( 'editor-styles' );
		add_theme_support( 'experimental-custom-spacing' );
		add_theme_support( 'experimental-lineHeight' );
		add_theme_support( 'custom-lineHeight' );
		add_theme_support( 'experimental-custom-spacing' );
		add_theme_support( 'experimental-link-color' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support(
			'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio',
			)
		);

	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
