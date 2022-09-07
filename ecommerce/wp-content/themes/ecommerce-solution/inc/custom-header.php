<?php
/**
 * @package Ecommerce Solution
 * @subpackage ecommerce-solution
 * @since ecommerce-solution 1.0
 * Setup the WordPress core custom header feature.
 * @uses ecommerce_solution_header_style()
*/

function ecommerce_solution_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'ecommerce_solution_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 120,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'ecommerce_solution_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'ecommerce_solution_custom_header_setup' );

if ( ! function_exists( 'ecommerce_solution_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see relief_medical_hospital_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'ecommerce_solution_header_style' );
function ecommerce_solution_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$ecommerce_solution_custom_css = "
        .mid-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'ecommerce-solution-basic-style', $ecommerce_solution_custom_css );
	endif;
}
endif; // ecommerce_solution_header_style