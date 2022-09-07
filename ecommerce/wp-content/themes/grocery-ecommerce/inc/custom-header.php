<?php
/**
 * @package Grocery Ecommerce
 * @subpackage grocery-ecommerce
 * Setup the WordPress core custom header feature.
 *
 * @uses grocery_ecommerce_header_style()
*/

function grocery_ecommerce_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'grocery_ecommerce_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1284,
		'height'                 => 95,
		'wp-head-callback'       => 'grocery_ecommerce_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'grocery_ecommerce_custom_header_setup' );

if ( ! function_exists( 'grocery_ecommerce_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see grocery_ecommerce_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'grocery_ecommerce_header_style' );
function grocery_ecommerce_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$grocery_ecommerce_custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: left top;
		}";
	   	wp_add_inline_style( 'grocery-ecommerce-basic-style', $grocery_ecommerce_custom_css );
	endif;
}
endif; //grocery_ecommerce_header_style