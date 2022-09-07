<?php
/**
 * Grocery Ecommerce: Block Patterns
 *
 * @package Grocery Ecommerce
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'grocery-ecommerce',
		array( 'label' => __( 'Grocery Ecommerce', 'grocery-ecommerce' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'grocery-ecommerce/banner-section',
		array(
			'title'      => __( 'Banner Section', 'grocery-ecommerce' ),
			'categories' => array( 'grocery-ecommerce' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/block-patterns/images/banner.png\",\"id\":6,\"dimRatio\":20,\"overlayColor\":\"white\",\"isDark\":false,\"align\":\"full\",\"className\":\"banner-section px-md-5\"} -->\n<div class=\"wp-block-cover alignfull is-light banner-section px-md-5\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-white-background-color has-background-dim-20 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-6\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"mx-lg-5\"} -->\n<div class=\"wp-block-columns mx-lg-5\"><!-- wp:column {\"verticalAlignment\":\"bottom\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-bottom\" style=\"flex-basis:50%\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":\"45px\"}}} -->\n<h2 style=\"font-size:45px\">Fresh Grocery Shopping</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"16px\"}},\"textColor\":\"black\"} -->\n<p class=\"has-black-color has-text-color\" style=\"font-size:16px\">Lorem Ipsum&nbsp;is simply dummy text for the printing and typesetting industry. Ever since the 1500s, Lorem Ipsum has been the industry's standard dummy text.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"left\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"background\":\"#0a472e\"},\"border\":{\"radius\":\"0px\"},\"typography\":{\"fontSize\":\"18px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:18px\"><a class=\"wp-block-button__link has-background\" style=\"border-radius:0px;background-color:#0a472e\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'grocery-ecommerce/product-section',
		array(
			'title'      => __( 'Product Section', 'grocery-ecommerce' ),
			'categories' => array( 'grocery-ecommerce' ),
			'content'    => "<!-- wp:group {\"className\":\"product-section mt-3 mb-3\"} -->\n<div class=\"wp-block-group product-section mt-3 mb-3\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":4} -->\n<h4 class=\"has-text-align-center\">Best Sellers</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"className\":\"py-4 \"} -->\n<h2 class=\"has-text-align-center py-4\">SPECIAL OF THE WEEK</h2>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-category {\"columns\":4,\"rows\":1,\"categories\":[15],\"contentVisibility\":{\"image\":true,\"title\":true,\"price\":true,\"rating\":true,\"button\":true},\"stockStatus\":[\"\",\"\",\"instock\",\"onbackorder\",\"outofstock\"],\"className\":\"product-box-section  mx-2 \"} /--></div>\n<!-- /wp:group -->",
		)
	);
}


