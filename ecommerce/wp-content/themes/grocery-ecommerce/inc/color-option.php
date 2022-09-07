<?php

	$grocery_ecommerce_custom_css = '';

	// Layout Options
	$grocery_ecommerce_theme_layout = get_theme_mod( 'grocery_ecommerce_theme_layout_options','Default Theme');
    if($grocery_ecommerce_theme_layout == 'Default Theme'){
		$grocery_ecommerce_custom_css .='body{';
			$grocery_ecommerce_custom_css .='max-width: 100%;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_theme_layout == 'Container Theme'){
		$grocery_ecommerce_custom_css .='body{';
			$grocery_ecommerce_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_theme_layout == 'Box Container Theme'){
		$grocery_ecommerce_custom_css .='body{';
			$grocery_ecommerce_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$grocery_ecommerce_custom_css .='}';
	}
	
	/*--------- Preloader Color Option -------*/
	$grocery_ecommerce_preloader_color = get_theme_mod('grocery_ecommerce_preloader_color');

	if($grocery_ecommerce_preloader_color != false){
		$grocery_ecommerce_custom_css .=' .tg-loader{';
			$grocery_ecommerce_custom_css .='border-color: '.esc_attr($grocery_ecommerce_preloader_color).';';
		$grocery_ecommerce_custom_css .='} ';
		$grocery_ecommerce_custom_css .=' .tg-loader-inner, .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_preloader_color).';';
		$grocery_ecommerce_custom_css .='} ';
	}

	$grocery_ecommerce_preloader_bg_color = get_theme_mod('grocery_ecommerce_preloader_bg_color');

	if($grocery_ecommerce_preloader_bg_color != false){
		$grocery_ecommerce_custom_css .=' #overlayer, .preloader{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_preloader_bg_color).';';
		$grocery_ecommerce_custom_css .='} ';
	}

	/*------------ Button Settings option-----------------*/

	$grocery_ecommerce_top_button_padding = get_theme_mod('grocery_ecommerce_top_button_padding');
	$grocery_ecommerce_bottom_button_padding = get_theme_mod('grocery_ecommerce_bottom_button_padding');
	$grocery_ecommerce_left_button_padding = get_theme_mod('grocery_ecommerce_left_button_padding');
	$grocery_ecommerce_right_button_padding = get_theme_mod('grocery_ecommerce_right_button_padding');
	if($grocery_ecommerce_top_button_padding != false || $grocery_ecommerce_bottom_button_padding != false || $grocery_ecommerce_left_button_padding != false || $grocery_ecommerce_right_button_padding != false){
		$grocery_ecommerce_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_top_button_padding).'px; padding-bottom: '.esc_attr($grocery_ecommerce_bottom_button_padding).'px; padding-left: '.esc_attr($grocery_ecommerce_left_button_padding).'px; padding-right: '.esc_attr($grocery_ecommerce_right_button_padding).'px; display:inline-block;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_button_border_radius = get_theme_mod('grocery_ecommerce_button_border_radius');
	$grocery_ecommerce_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
		$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_button_border_radius).'px;';
	$grocery_ecommerce_custom_css .='}';

	/*----------- Copyright css -----*/
	$grocery_ecommerce_copyright_top_padding = get_theme_mod('grocery_ecommerce_top_copyright_padding');
	$grocery_ecommerce_copyright_bottom_padding = get_theme_mod('grocery_ecommerce_bottom_copyright_padding');
	if($grocery_ecommerce_copyright_top_padding != '' || $grocery_ecommerce_copyright_bottom_padding != ''){
		$grocery_ecommerce_custom_css .='.inner{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_copyright_top_padding).'px; padding-bottom: '.esc_attr($grocery_ecommerce_copyright_bottom_padding).'px; ';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_copyright_alignment = get_theme_mod('grocery_ecommerce_copyright_alignment', 'center');
	if($grocery_ecommerce_copyright_alignment == 'center' ){
		$grocery_ecommerce_custom_css .='#footer .copyright p{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_copyright_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_copyright_alignment == 'left' ){
		$grocery_ecommerce_custom_css .='#footer .copyright p{';
			$grocery_ecommerce_custom_css .=' text-align: '. $grocery_ecommerce_copyright_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_copyright_alignment == 'right' ){
		$grocery_ecommerce_custom_css .='#footer .copyright p{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_copyright_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_copyright_font_size = get_theme_mod('grocery_ecommerce_copyright_font_size');
	$grocery_ecommerce_custom_css .='#footer .copyright p{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_copyright_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	/*------ Topbar padding ------*/
	$grocery_ecommerce_top_topbar_padding = get_theme_mod('grocery_ecommerce_top_topbar_padding');
	$grocery_ecommerce_bottom_topbar_padding = get_theme_mod('grocery_ecommerce_bottom_topbar_padding');
	if($grocery_ecommerce_top_topbar_padding != false || $grocery_ecommerce_bottom_topbar_padding != false){
		$grocery_ecommerce_custom_css .='.top-bar, .page-template-custom-front-page .top-bar{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_top_topbar_padding).'px !important; padding-bottom: '.esc_attr($grocery_ecommerce_bottom_topbar_padding).'px !important; ';
		$grocery_ecommerce_custom_css .='}';
	}

	/*------ Woocommerce ----*/
	$grocery_ecommerce_product_border = get_theme_mod('grocery_ecommerce_product_border',true);

	if($grocery_ecommerce_product_border == false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$grocery_ecommerce_custom_css .='border: 0;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_top = get_theme_mod('grocery_ecommerce_product_top_padding',10);
	$grocery_ecommerce_product_bottom = get_theme_mod('grocery_ecommerce_product_bottom_padding',10);
	$grocery_ecommerce_product_left = get_theme_mod('grocery_ecommerce_product_left_padding',10);
	$grocery_ecommerce_product_right = get_theme_mod('grocery_ecommerce_product_right_padding',10);
	if($grocery_ecommerce_product_top != false || $grocery_ecommerce_product_bottom != false || $grocery_ecommerce_product_left != false || $grocery_ecommerce_product_right != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_product_top).'px; padding-bottom: '.esc_attr($grocery_ecommerce_product_bottom).'px; padding-left: '.esc_attr($grocery_ecommerce_product_left).'px; padding-right: '.esc_attr($grocery_ecommerce_product_right).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_border_radius = get_theme_mod('grocery_ecommerce_product_border_radius');
	if($grocery_ecommerce_product_border_radius != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_product_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- WooCommerce button css --------*/
	$grocery_ecommerce_product_button_top = get_theme_mod('grocery_ecommerce_product_button_top_padding',10);
	$grocery_ecommerce_product_button_bottom = get_theme_mod('grocery_ecommerce_product_button_bottom_padding',10);
	$grocery_ecommerce_product_button_left = get_theme_mod('grocery_ecommerce_product_button_left_padding',12);
	$grocery_ecommerce_product_button_right = get_theme_mod('grocery_ecommerce_product_button_right_padding',12);
	if($grocery_ecommerce_product_button_top != false || $grocery_ecommerce_product_button_bottom != false || $grocery_ecommerce_product_button_left != false || $grocery_ecommerce_product_button_right != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_product_button_top).'px; padding-bottom: '.esc_attr($grocery_ecommerce_product_button_bottom).'px; padding-left: '.esc_attr($grocery_ecommerce_product_button_left).'px; padding-right: '.esc_attr($grocery_ecommerce_product_button_right).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_button_border_radius = get_theme_mod('grocery_ecommerce_product_button_border_radius');
	if($grocery_ecommerce_product_button_border_radius != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, a.checkout-button.button.alt.wc-forward, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_product_button_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- WooCommerce product sale css --------*/
	$grocery_ecommerce_product_sale_top = get_theme_mod('grocery_ecommerce_product_sale_top_padding');
	$grocery_ecommerce_product_sale_bottom = get_theme_mod('grocery_ecommerce_product_sale_bottom_padding');
	$grocery_ecommerce_product_sale_left = get_theme_mod('grocery_ecommerce_product_sale_left_padding');
	$grocery_ecommerce_product_sale_right = get_theme_mod('grocery_ecommerce_product_sale_right_padding');
	if($grocery_ecommerce_product_sale_top != false || $grocery_ecommerce_product_sale_bottom != false || $grocery_ecommerce_product_sale_left != false || $grocery_ecommerce_product_sale_right != false){
		$grocery_ecommerce_custom_css .='.woocommerce span.onsale {';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_product_sale_top).'px; padding-bottom: '.esc_attr($grocery_ecommerce_product_sale_bottom).'px; padding-left: '.esc_attr($grocery_ecommerce_product_sale_left).'px; padding-right: '.esc_attr($grocery_ecommerce_product_sale_right).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_sale_border_radius = get_theme_mod('grocery_ecommerce_product_sale_border_radius',0);
	if($grocery_ecommerce_product_sale_border_radius != false){
		$grocery_ecommerce_custom_css .='.woocommerce span.onsale {';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_product_sale_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_menu_case = get_theme_mod('grocery_ecommerce_product_sale_position', 'Right');
	if($grocery_ecommerce_menu_case == 'Right' ){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .onsale{';
			$grocery_ecommerce_custom_css .=' left:auto; right:0;';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_menu_case == 'Left' ){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .onsale{';
			$grocery_ecommerce_custom_css .=' left:-10px; right:auto;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_sale_font_size = get_theme_mod('grocery_ecommerce_product_sale_font_size',13);
	$grocery_ecommerce_custom_css .='.woocommerce span.onsale {';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_product_sale_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';


	/*---- Comment form ----*/
	$grocery_ecommerce_comment_width = get_theme_mod('grocery_ecommerce_comment_width', '100');
	$grocery_ecommerce_custom_css .='#comments textarea{';
		$grocery_ecommerce_custom_css .=' width:'.esc_attr($grocery_ecommerce_comment_width).'%;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_comment_submit_text = get_theme_mod('grocery_ecommerce_comment_submit_text', 'Post Comment');
	if($grocery_ecommerce_comment_submit_text == ''){
		$grocery_ecommerce_custom_css .='#comments p.form-submit {';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_comment_title = get_theme_mod('grocery_ecommerce_comment_title', 'Leave a Reply');
	if($grocery_ecommerce_comment_title == ''){
		$grocery_ecommerce_custom_css .='#comments h2#reply-title {';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$grocery_ecommerce_footer_bg_color = get_theme_mod('grocery_ecommerce_footer_bg_color');
	if($grocery_ecommerce_footer_bg_color != false){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_footer_bg_color).';';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_footer_bg_image = get_theme_mod('grocery_ecommerce_footer_bg_image');
	if($grocery_ecommerce_footer_bg_image != false){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background: url('.esc_attr($grocery_ecommerce_footer_bg_image).');';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- Featured image css -----*/
	$grocery_ecommerce_feature_image_border_radius = get_theme_mod('grocery_ecommerce_feature_image_border_radius');
	if($grocery_ecommerce_feature_image_border_radius != false){
		$grocery_ecommerce_custom_css .='.blog-sec img{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_feature_image_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_feature_image_shadow = get_theme_mod('grocery_ecommerce_feature_image_shadow');
	if($grocery_ecommerce_feature_image_shadow != false){
		$grocery_ecommerce_custom_css .='.blog-sec img{';
			$grocery_ecommerce_custom_css .='box-shadow: '.esc_attr($grocery_ecommerce_feature_image_shadow).'px '.esc_attr($grocery_ecommerce_feature_image_shadow).'px '.esc_attr($grocery_ecommerce_feature_image_shadow).'px #aaa;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*------ Sticky header padding ------------*/
	$grocery_ecommerce_top_sticky_header_padding = get_theme_mod('grocery_ecommerce_top_sticky_header_padding');
	$grocery_ecommerce_bottom_sticky_header_padding = get_theme_mod('grocery_ecommerce_bottom_sticky_header_padding');
	$grocery_ecommerce_custom_css .=' .fixed-header{';
		$grocery_ecommerce_custom_css .=' padding-top: '.esc_attr($grocery_ecommerce_top_sticky_header_padding).'px; padding-bottom: '.esc_attr($grocery_ecommerce_bottom_sticky_header_padding).'px';
	$grocery_ecommerce_custom_css .='}';

	/*------ Related products ---------*/
	$grocery_ecommerce_related_products = get_theme_mod('grocery_ecommerce_single_related_products',true);
	if($grocery_ecommerce_related_products == false){
		$grocery_ecommerce_custom_css .=' .related.products{';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*-------- Menu Font Size --------*/
	$grocery_ecommerce_menu_font_size = get_theme_mod('grocery_ecommerce_menu_font_size',13);
	if($grocery_ecommerce_menu_font_size != false){
		$grocery_ecommerce_custom_css .='.nav-menu li a{';
			$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_menu_font_size).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_menu_font_weight = get_theme_mod('grocery_ecommerce_menu_font_weight');
	$grocery_ecommerce_custom_css .='.nav-menu li a{';
		$grocery_ecommerce_custom_css .='font-weight: '.esc_attr($grocery_ecommerce_menu_font_weight).';';
	$grocery_ecommerce_custom_css .='}';

	// Featured image header
	$header_image_url = grocery_ecommerce_banner_image( $image_url = '' );
	$grocery_ecommerce_custom_css .='#page-site-header{';
		$grocery_ecommerce_custom_css .='background-image: url('. esc_url( $header_image_url ).'); background-size: cover;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_post_featured_image = get_theme_mod('grocery_ecommerce_post_featured_image', 'in-content');
	if($grocery_ecommerce_post_featured_image == 'banner' ){
		$grocery_ecommerce_custom_css .='.single #wrapper h1, .page #wrapper h1, .page #wrapper img{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.page-template-custom-front-page #page-site-header{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Woocommerce Shop page pagination
	$grocery_ecommerce_shop_page_navigation = get_theme_mod('grocery_ecommerce_shop_page_navigation',true);
	if ($grocery_ecommerce_shop_page_navigation == false) {
		$grocery_ecommerce_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- Blog Post display type css ------*/
	$grocery_ecommerce_blog_post_display_type = get_theme_mod('grocery_ecommerce_blog_post_display_type', 'blocks');
	if($grocery_ecommerce_blog_post_display_type == 'without blocks' ){
		$grocery_ecommerce_custom_css .='.blog .blog-sec, .blog #sidebar .widget{';
			$grocery_ecommerce_custom_css .='border: 0;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*---------- Responsive style ---------*/
	if (get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == true && get_theme_mod('grocery_ecommerce_top_header',false) == false) {
		$grocery_ecommerce_custom_css .='.top-bar{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} ';
	}

	if (get_theme_mod('grocery_ecommerce_sticky_header_responsive') == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.sticky{';
			$grocery_ecommerce_custom_css .=' position: static;';
		$grocery_ecommerce_custom_css .='} }';
	}

	if (get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} }';
	} else if(get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == true){
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$grocery_ecommerce_custom_css .=' display: block;';
		$grocery_ecommerce_custom_css .='} }';
	}

	// Site title Font Size
	$grocery_ecommerce_site_title_font_size = get_theme_mod('grocery_ecommerce_site_title_font_size', '25');
	$grocery_ecommerce_custom_css .='.logo h1, .logo p.site-title{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_site_title_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	// Site tagline Font Size
	$grocery_ecommerce_site_tagline_font_size = get_theme_mod('grocery_ecommerce_site_tagline_font_size', '14');
	$grocery_ecommerce_custom_css .='.logo p.site-description{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_site_tagline_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	/*---- Slider Content Position -----*/
	$grocery_ecommerce_top_position = get_theme_mod('grocery_ecommerce_slider_top_position');
	$grocery_ecommerce_bottom_position = get_theme_mod('grocery_ecommerce_slider_bottom_position');
	$grocery_ecommerce_left_position = get_theme_mod('grocery_ecommerce_slider_left_position');
	$grocery_ecommerce_right_position = get_theme_mod('grocery_ecommerce_slider_right_position');
	if($grocery_ecommerce_top_position != false || $grocery_ecommerce_bottom_position != false || $grocery_ecommerce_left_position != false || $grocery_ecommerce_right_position != false){
		$grocery_ecommerce_custom_css .='#slider .carousel-caption{';
			$grocery_ecommerce_custom_css .='top: '.esc_attr($grocery_ecommerce_top_position).'%; bottom: '.esc_attr($grocery_ecommerce_bottom_position).'%; left: '.esc_attr($grocery_ecommerce_left_position).'%; right: '.esc_attr($grocery_ecommerce_right_position).'%;';
		$grocery_ecommerce_custom_css .='}';
	}

	// responsive settings
	if (get_theme_mod('grocery_ecommerce_preloader_responsive',false) == true && get_theme_mod('grocery_ecommerce_preloader',false) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (min-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$grocery_ecommerce_custom_css .=' visibility: hidden;';
		$grocery_ecommerce_custom_css .='} }';
	}
	if (get_theme_mod('grocery_ecommerce_preloader_responsive',false) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$grocery_ecommerce_custom_css .=' visibility: hidden;';
		$grocery_ecommerce_custom_css .='} }';
	}

	// scroll to top
	$grocery_ecommerce_scroll = get_theme_mod( 'grocery_ecommerce_backtotop_responsive',true);
	if (get_theme_mod('grocery_ecommerce_backtotop_responsive',true) == true && get_theme_mod('grocery_ecommerce_hide_scroll',true) == false) {
    	$grocery_ecommerce_custom_css .='.show-back-to-top{';
			$grocery_ecommerce_custom_css .='visibility: hidden !important;';
		$grocery_ecommerce_custom_css .='} ';
	}
    if($grocery_ecommerce_scroll == true){
    	$grocery_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$grocery_ecommerce_custom_css .='.show-back-to-top{';
			$grocery_ecommerce_custom_css .='visibility: visible !important;';
		$grocery_ecommerce_custom_css .='} }';
	}else if($grocery_ecommerce_scroll == false){
		$grocery_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$grocery_ecommerce_custom_css .='.show-back-to-top{';
			$grocery_ecommerce_custom_css .='visibility: hidden !important;';
		$grocery_ecommerce_custom_css .='} }';
	}

	/*------ Footer background css -------*/
	$grocery_ecommerce_copyright_bg_color = get_theme_mod('grocery_ecommerce_copyright_bg_color');
	if($grocery_ecommerce_copyright_bg_color != false){
		$grocery_ecommerce_custom_css .='.inner{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_copyright_bg_color).';';
		$grocery_ecommerce_custom_css .='}';
	}