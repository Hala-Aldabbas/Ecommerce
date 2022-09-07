<?php

	$ecommerce_solution_first_color = get_theme_mod('ecommerce_solution_first_color');

	$ecommerce_solution_custom_css ='';
	
	/*------------ Global First Color -----------*/
	$ecommerce_solution_custom_css .='input[type="submit"], .topbar p, .login-box i, .menu-header, span.cart-value, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .blog-section h2:after, #comments input[type="submit"].submit, #comments a.comment-reply-link:hover, #comments a.comment-reply-link, #sidebar h3:after, #sidebar input[type="submit"]:hover, #sidebar .tagcloud a:hover, .footer-wp .tagcloud a:hover, .widget_calendar tbody a, .page-content .read-moresec a.button, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"] , .pagination a:hover, .pagination .current, .more-btn a:hover, #scrollbutton i, .footer-wp input[type="submit"], .footer-wp button, #sidebar button, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .topbar a.call1, .topbar span, .woocommerce nav.woocommerce-pagination ul li a, .tags a:hover, .nav-next a:hover, .nav-previous a:hover, .metabox .fa-calendar-alt:before, .metabox .fa-user:before, .metabox .fa-comments:before, .metabox .fa-clock:before, #sidebar ul li:before{';
		$ecommerce_solution_custom_css .='background-color: '.esc_attr($ecommerce_solution_first_color).';';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_custom_css .='td.product-name a:hover, a.shipping-calculator-button:hover, .postbtn a:hover, .blog-section h2 a:hover, nav.navigation.post-navigation a:hover, #sidebar ul li a:hover, .footer-wp h3, .footer-wp li a:hover, #sidebar .textwidget p a:hover, .nav-previous a:hover ,.nav-next a:hover, .footer-wp .textwidget p a, .footer-wp a.rsswidget, #blog_sec a:hover i, #sidebar .wp-block-latest-comments li a:hover, .postbtn:hover i, p.logged-in-as a:hover{';
		$ecommerce_solution_custom_css .='color: '.esc_attr($ecommerce_solution_first_color).';';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_custom_css .='.entry-date:hover i, .entry-date:hover a, .entry-author:hover i, .entry-author:hover a{';
		$ecommerce_solution_custom_css .='color: '.esc_attr($ecommerce_solution_first_color).' !important;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_custom_css .='.page-content .read-moresec a.button, #slider .carousel-content, #scrollbutton i{';
			$ecommerce_solution_custom_css .='border-color: '.esc_attr($ecommerce_solution_first_color).';';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_custom_css .='.copyright-wrapper{';
			$ecommerce_solution_custom_css .='border-top-color: '.esc_attr($ecommerce_solution_first_color).';';
	$ecommerce_solution_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_width_layout_options','Default');
    if($ecommerce_solution_theme_lay == 'Default'){
		$ecommerce_solution_custom_css .='body{';
			$ecommerce_solution_custom_css .='max-width: 100%;';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Container Layout'){
		$ecommerce_solution_custom_css .='body{';
			$ecommerce_solution_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Box Layout'){
		$ecommerce_solution_custom_css .='body{';
			$ecommerce_solution_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$ecommerce_solution_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_slider_content_layout','Left');
    if($ecommerce_solution_theme_lay == 'Left'){
		$ecommerce_solution_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$ecommerce_solution_custom_css .='text-align:left; left:15%; right:40%;';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Center'){
		$ecommerce_solution_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$ecommerce_solution_custom_css .='text-align:center; left:30%; right:30%;';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Right'){
		$ecommerce_solution_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$ecommerce_solution_custom_css .='text-align:right; left:40%; right:15%;';
		$ecommerce_solution_custom_css .='}';
	}

	/*------------ Slider Opacity -------------------*/
	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_slider_opacity','0.7');
	if($ecommerce_solution_theme_lay == '0'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.1'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.1';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.2'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.2';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.3'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.3';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.4'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.4';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.5'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.5';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.6'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.6';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.7'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.7';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.8'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.8';
	$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == '0.9'){
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='opacity:0.9';
	$ecommerce_solution_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$ecommerce_solution_footer_text_align = get_theme_mod('ecommerce_solution_footer_text_align');
	$ecommerce_solution_custom_css .='.copyright-wrapper{';
		$ecommerce_solution_custom_css .='text-align: '.esc_attr($ecommerce_solution_footer_text_align).';';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_footer_text_padding = get_theme_mod('ecommerce_solution_footer_text_padding');
	$ecommerce_solution_custom_css .='.copyright-wrapper{';
		$ecommerce_solution_custom_css .='padding-top: '.esc_attr($ecommerce_solution_footer_text_padding).'px !important; padding-bottom: '.esc_attr($ecommerce_solution_footer_text_padding).'px !important;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_footer_bg_color = get_theme_mod('ecommerce_solution_footer_bg_color');
	$ecommerce_solution_custom_css .='.footer-wp{';
		$ecommerce_solution_custom_css .='background-color: '.esc_attr($ecommerce_solution_footer_bg_color).';';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_footer_bg_image = get_theme_mod('ecommerce_solution_footer_bg_image');
	if($ecommerce_solution_footer_bg_image != false){
		$ecommerce_solution_custom_css .='.footer-wp{';
			$ecommerce_solution_custom_css .='background: url('.esc_attr($ecommerce_solution_footer_bg_image).');';
		$ecommerce_solution_custom_css .='}';
	}

	$ecommerce_solution_copyright_text_font_size = get_theme_mod('ecommerce_solution_copyright_text_font_size', 15);
	$ecommerce_solution_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$ecommerce_solution_custom_css .='font-size: '.esc_attr($ecommerce_solution_copyright_text_font_size).'px;';
	$ecommerce_solution_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$ecommerce_solution_back_to_top_border_radius = get_theme_mod('ecommerce_solution_back_to_top_border_radius');
	$ecommerce_solution_custom_css .='#scrollbutton i{';
		$ecommerce_solution_custom_css .='border-radius: '.esc_attr($ecommerce_solution_back_to_top_border_radius).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_scroll_icon_font_size = get_theme_mod('ecommerce_solution_scroll_icon_font_size', 22);
	$ecommerce_solution_custom_css .='#scrollbutton i{';
		$ecommerce_solution_custom_css .='font-size: '.esc_attr($ecommerce_solution_scroll_icon_font_size).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_top_bottom_scroll_padding = get_theme_mod('ecommerce_solution_top_bottom_scroll_padding', 12);
	$ecommerce_solution_custom_css .='#scrollbutton i{';
		$ecommerce_solution_custom_css .='padding-top: '.esc_attr($ecommerce_solution_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($ecommerce_solution_top_bottom_scroll_padding).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_left_right_scroll_padding = get_theme_mod('ecommerce_solution_left_right_scroll_padding', 17);
	$ecommerce_solution_custom_css .='#scrollbutton i{';
		$ecommerce_solution_custom_css .='padding-left: '.esc_attr($ecommerce_solution_left_right_scroll_padding).'px; padding-right: '.esc_attr($ecommerce_solution_left_right_scroll_padding).'px;';
	$ecommerce_solution_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$ecommerce_solution_post_button_padding_top = get_theme_mod('ecommerce_solution_post_button_padding_top');
	$ecommerce_solution_custom_css .='.more-btn a, .postbtn a, #comments input[type="submit"].submit{';
		$ecommerce_solution_custom_css .='padding-top: '.esc_attr($ecommerce_solution_post_button_padding_top).'px !important; padding-bottom: '.esc_attr($ecommerce_solution_post_button_padding_top).'px !important;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_post_button_padding_right = get_theme_mod('ecommerce_solution_post_button_padding_right');
	$ecommerce_solution_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$ecommerce_solution_custom_css .='padding-left: '.esc_attr($ecommerce_solution_post_button_padding_right).'px !important; padding-right: '.esc_attr($ecommerce_solution_post_button_padding_right).'px !important;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_post_button_border_radius = get_theme_mod('ecommerce_solution_post_button_border_radius');
	$ecommerce_solution_custom_css .='.more-btn a, .postbtn a, #comments input[type="submit"].submit{';
		$ecommerce_solution_custom_css .='border-radius: '.esc_attr($ecommerce_solution_post_button_border_radius).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_post_comment_enable = get_theme_mod('ecommerce_solution_post_comment_enable',true);
	if($ecommerce_solution_post_comment_enable == false){
		$ecommerce_solution_custom_css .='#comments{';
			$ecommerce_solution_custom_css .='display: none;';
		$ecommerce_solution_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$ecommerce_solution_preloader_bg_color_option = get_theme_mod('ecommerce_solution_preloader_bg_color_option');
	$ecommerce_solution_preloader_icon_color_option = get_theme_mod('ecommerce_solution_preloader_icon_color_option');
	$ecommerce_solution_custom_css .='.frame{';
		$ecommerce_solution_custom_css .='background-color: '.esc_attr($ecommerce_solution_preloader_bg_color_option).';';
	$ecommerce_solution_custom_css .='}';
	$ecommerce_solution_custom_css .='.dot-1,.dot-2,.dot-3{';
		$ecommerce_solution_custom_css .='background-color: '.esc_attr($ecommerce_solution_preloader_icon_color_option).';';
	$ecommerce_solution_custom_css .='}';

	// preloader type
	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_preloader_type','First Preloader Type');
    if($ecommerce_solution_theme_lay == 'First Preloader Type'){
		$ecommerce_solution_custom_css .='.dot-1, .dot-2, .dot-3{';
			$ecommerce_solution_custom_css .='';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Second Preloader Type'){
		$ecommerce_solution_custom_css .='.dot-1, .dot-2, .dot-3{';
			$ecommerce_solution_custom_css .='border-radius:0;';
		$ecommerce_solution_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_background_skin','Without Background');
    if($ecommerce_solution_theme_lay == 'With Background'){
		$ecommerce_solution_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.search-cat-box,.front-page-content,.background-img-skin{';
			$ecommerce_solution_custom_css .='background-color: #fff; padding:20px;';
		$ecommerce_solution_custom_css .='}';
		$ecommerce_solution_custom_css .='.login-box a{';
			$ecommerce_solution_custom_css .='background-color: #fff;';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Without Background'){
		$ecommerce_solution_custom_css .='{';
			$ecommerce_solution_custom_css .='background-color: transparent;';
		$ecommerce_solution_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$ecommerce_solution_woocommerce_button_padding_top = get_theme_mod('ecommerce_solution_woocommerce_button_padding_top',15);
	$ecommerce_solution_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$ecommerce_solution_custom_css .='padding-top: '.esc_attr($ecommerce_solution_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($ecommerce_solution_woocommerce_button_padding_top).'px;';
	$ecommerce_solution_custom_css .='}';
	

	$ecommerce_solution_woocommerce_button_padding_right = get_theme_mod('ecommerce_solution_woocommerce_button_padding_right',15);
	$ecommerce_solution_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$ecommerce_solution_custom_css .='padding-left: '.esc_attr($ecommerce_solution_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($ecommerce_solution_woocommerce_button_padding_right).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woocommerce_button_border_radius = get_theme_mod('ecommerce_solution_woocommerce_button_border_radius',30);
	$ecommerce_solution_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$ecommerce_solution_custom_css .='border-radius: '.esc_attr($ecommerce_solution_woocommerce_button_border_radius).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_related_product_enable = get_theme_mod('ecommerce_solution_related_product_enable',true);
	if($ecommerce_solution_related_product_enable == false){
		$ecommerce_solution_custom_css .='.related.products{';
			$ecommerce_solution_custom_css .='display: none;';
		$ecommerce_solution_custom_css .='}';
	}

	$ecommerce_solution_woocommerce_product_border_enable = get_theme_mod('ecommerce_solution_woocommerce_product_border_enable',true);
	if($ecommerce_solution_woocommerce_product_border_enable == false){
		$ecommerce_solution_custom_css .='.products li{';
			$ecommerce_solution_custom_css .='border: none;';
		$ecommerce_solution_custom_css .='}';
	}

	$ecommerce_solution_woocommerce_product_padding_top = get_theme_mod('ecommerce_solution_woocommerce_product_padding_top',10);
	$ecommerce_solution_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$ecommerce_solution_custom_css .='padding-top: '.esc_attr($ecommerce_solution_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($ecommerce_solution_woocommerce_product_padding_top).'px !important;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woocommerce_product_padding_right = get_theme_mod('ecommerce_solution_woocommerce_product_padding_right',10);
	$ecommerce_solution_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$ecommerce_solution_custom_css .='padding-left: '.esc_attr($ecommerce_solution_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($ecommerce_solution_woocommerce_product_padding_right).'px !important;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woocommerce_product_border_radius = get_theme_mod('ecommerce_solution_woocommerce_product_border_radius',3);
	$ecommerce_solution_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$ecommerce_solution_custom_css .='border-radius: '.esc_attr($ecommerce_solution_woocommerce_product_border_radius).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woocommerce_product_box_shadow = get_theme_mod('ecommerce_solution_woocommerce_product_box_shadow', 5);
	$ecommerce_solution_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$ecommerce_solution_custom_css .='box-shadow: '.esc_attr($ecommerce_solution_woocommerce_product_box_shadow).'px '.esc_attr($ecommerce_solution_woocommerce_product_box_shadow).'px '.esc_attr($ecommerce_solution_woocommerce_product_box_shadow).'px #eee;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woo_product_sale_top_bottom_padding = get_theme_mod('ecommerce_solution_woo_product_sale_top_bottom_padding', 0);
	$ecommerce_solution_woo_product_sale_left_right_padding = get_theme_mod('ecommerce_solution_woo_product_sale_left_right_padding', 0);
	$ecommerce_solution_custom_css .='.woocommerce span.onsale{';
		$ecommerce_solution_custom_css .='padding-top: '.esc_attr($ecommerce_solution_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($ecommerce_solution_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($ecommerce_solution_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($ecommerce_solution_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woo_product_sale_border_radius = get_theme_mod('ecommerce_solution_woo_product_sale_border_radius',0);
	$ecommerce_solution_custom_css .='.woocommerce span.onsale {';
		$ecommerce_solution_custom_css .='border-radius: '.esc_attr($ecommerce_solution_woo_product_sale_border_radius).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_woo_product_sale_position = get_theme_mod('ecommerce_solution_woo_product_sale_position', 'Right');
	if($ecommerce_solution_woo_product_sale_position == 'Right' ){
		$ecommerce_solution_custom_css .='.woocommerce ul.products li.product .onsale{';
			$ecommerce_solution_custom_css .=' left:auto; right:0;';
		$ecommerce_solution_custom_css .='}';
	}elseif($ecommerce_solution_woo_product_sale_position == 'Left' ){
		$ecommerce_solution_custom_css .='.woocommerce ul.products li.product .onsale{';
			$ecommerce_solution_custom_css .=' left:0; right:auto;';
		$ecommerce_solution_custom_css .='}';
	}

	$ecommerce_solution_wooproduct_sale_font_size = get_theme_mod('ecommerce_solution_wooproduct_sale_font_size',14);
	$ecommerce_solution_custom_css .='.woocommerce span.onsale{';
		$ecommerce_solution_custom_css .='font-size: '.esc_attr($ecommerce_solution_wooproduct_sale_font_size).'px;';
	$ecommerce_solution_custom_css .='}';

	// Responsive Media
	$ecommerce_solution_post_date = get_theme_mod( 'ecommerce_solution_display_post_date',true);
	if($ecommerce_solution_post_date == true && get_theme_mod( 'ecommerce_solution_metafields_date',true) != true){
    	$ecommerce_solution_custom_css .='.metabox .entry-date{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_post_date == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.metabox .entry-date{';
			$ecommerce_solution_custom_css .='display:inline-block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_post_date == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.metabox .entry-date{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_post_author = get_theme_mod( 'ecommerce_solution_display_post_author',true);
	if($ecommerce_solution_post_author == true && get_theme_mod( 'ecommerce_solution_metafields_author',true) != true){
    	$ecommerce_solution_custom_css .='.metabox .entry-author{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_post_author == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.metabox .entry-author{';
			$ecommerce_solution_custom_css .='display:inline-block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_post_author == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.metabox .entry-author{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_post_comment = get_theme_mod( 'ecommerce_solution_display_post_comment',true);
	if($ecommerce_solution_post_comment == true && get_theme_mod( 'ecommerce_solution_metafields_comment',true) != true){
    	$ecommerce_solution_custom_css .='.metabox .entry-comments{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_post_comment == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.metabox .entry-comments{';
			$ecommerce_solution_custom_css .='display:inline-block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_post_comment == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.metabox .entry-comments{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_post_time = get_theme_mod( 'ecommerce_solution_display_post_time',false);
	if($ecommerce_solution_post_time == true && get_theme_mod( 'ecommerce_solution_metafields_time',false) != true){
    	$ecommerce_solution_custom_css .='.metabox .entry-time{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_post_time == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.metabox .entry-time{';
			$ecommerce_solution_custom_css .='display:inline-block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_post_time == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.metabox .entry-time{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	if($ecommerce_solution_post_date == false && $ecommerce_solution_post_author == false && $ecommerce_solution_post_comment == false && $ecommerce_solution_post_time == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
    	$ecommerce_solution_custom_css .='.metabox {';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_metafields_date = get_theme_mod( 'ecommerce_solution_metafields_date',true);
	$ecommerce_solution_metafields_author = get_theme_mod( 'ecommerce_solution_metafields_author',true);
	$ecommerce_solution_metafields_comment = get_theme_mod( 'ecommerce_solution_metafields_comment',true);
	$ecommerce_solution_metafields_time = get_theme_mod( 'ecommerce_solution_metafields_time',false);
	if($ecommerce_solution_metafields_date == false && $ecommerce_solution_metafields_author == false && $ecommerce_solution_metafields_comment == false && $ecommerce_solution_metafields_time == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width: 1440px) and (min-width:576px) {';
    	$ecommerce_solution_custom_css .='.metabox {';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_slider = get_theme_mod( 'ecommerce_solution_display_slider',false);
	if($ecommerce_solution_slider == true && get_theme_mod( 'ecommerce_solution_slider_hide', false) == false){
    	$ecommerce_solution_custom_css .='#slider{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_slider == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='#slider{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_slider == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='#slider{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_sliderbutton = get_theme_mod( 'ecommerce_solution_display_slider_button',true);
	if($ecommerce_solution_sliderbutton == true && get_theme_mod( 'ecommerce_solution_show_slider_button',true) != true){
    	$ecommerce_solution_custom_css .='.more-btn{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_sliderbutton == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.more-btn{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_sliderbutton == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.more-btn{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_sidebar = get_theme_mod( 'ecommerce_solution_display_sidebar',true);
    if($ecommerce_solution_sidebar == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='#sidebar{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_sidebar == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='#sidebar{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_scroll = get_theme_mod( 'ecommerce_solution_display_scrolltop',true);
	if($ecommerce_solution_scroll == true && get_theme_mod( 'ecommerce_solution_hide_show_scroll',true) != true){
    	$ecommerce_solution_custom_css .='#scrollbutton i{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_scroll == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='#scrollbutton i{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_scroll == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='#scrollbutton i{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_preloader = get_theme_mod( 'ecommerce_solution_display_preloader',false);
	if($ecommerce_solution_preloader == true && get_theme_mod( 'ecommerce_solution_preloader',false) != true){
    	$ecommerce_solution_custom_css .='.frame{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_preloader == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.frame{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_preloader == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.frame{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_fixed_header = get_theme_mod( 'ecommerce_solution_display_fixed_header',false);
	if($ecommerce_solution_fixed_header == true && get_theme_mod( 'ecommerce_solution_sticky_header',false) != true){
    	$ecommerce_solution_custom_css .='.fixed-header{';
			$ecommerce_solution_custom_css .='position:static;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_fixed_header == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.fixed-header{';
			$ecommerce_solution_custom_css .='position:fixed;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_fixed_header == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.fixed-header{';
			$ecommerce_solution_custom_css .='position:static;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_search = get_theme_mod( 'ecommerce_solution_display_search_category',true);
	if($ecommerce_solution_search == true && get_theme_mod( 'ecommerce_solution_search_enable_disable',true) != true){
    	$ecommerce_solution_custom_css .='.search-cat-box{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_search == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.search-cat-box{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_search == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.search-cat-box{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_myaccount = get_theme_mod( 'ecommerce_solution_display_myaccount',true);
	if($ecommerce_solution_myaccount == true && get_theme_mod( 'ecommerce_solution_myaccount_enable_disable',true) != true){
    	$ecommerce_solution_custom_css .='.login-box{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} ';
	}
    if($ecommerce_solution_myaccount == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='.login-box{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_myaccount == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_solution_custom_css .='.login-box{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	$ecommerce_solution_display_woocart = get_theme_mod( 'ecommerce_solution_display_woocart',true);
    if($ecommerce_solution_display_woocart == true){
    	$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='#navbar-header .cart_no{';
			$ecommerce_solution_custom_css .='display:block;';
		$ecommerce_solution_custom_css .='} }';
	}else if($ecommerce_solution_display_woocart == false){
		$ecommerce_solution_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_solution_custom_css .='#navbar-header .cart_no{';
			$ecommerce_solution_custom_css .='display:none;';
		$ecommerce_solution_custom_css .='} }';
	}

	// menu settings
	$ecommerce_solution_menu_font_size_option = get_theme_mod('ecommerce_solution_menu_font_size_option');
	$ecommerce_solution_custom_css .='.primary-navigation a{';
		$ecommerce_solution_custom_css .='font-size: '.esc_attr($ecommerce_solution_menu_font_size_option).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_menu_padding = get_theme_mod('ecommerce_solution_menu_padding');
	$ecommerce_solution_custom_css .='.primary-navigation a, .topbar .primary-navigation a{';
		$ecommerce_solution_custom_css .='padding: '.esc_attr($ecommerce_solution_menu_padding).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_text_tranform_menu','Uppercase');
    if($ecommerce_solution_theme_lay == 'Uppercase'){
		$ecommerce_solution_custom_css .='.primary-navigation a{';
			$ecommerce_solution_custom_css .='';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Lowercase'){
		$ecommerce_solution_custom_css .='.primary-navigation a{';
			$ecommerce_solution_custom_css .='text-transform: lowercase;';
		$ecommerce_solution_custom_css .='}';
	}
	else if($ecommerce_solution_theme_lay == 'Capitalize'){
		$ecommerce_solution_custom_css .='.primary-navigation a{';
			$ecommerce_solution_custom_css .='text-transform: Capitalize;';
		$ecommerce_solution_custom_css .='}';
	}

	$ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_font_weight_option_menu','Bold');
    if($ecommerce_solution_theme_lay == 'Bold'){
		$ecommerce_solution_custom_css .='.primary-navigation a, .topbar .primary-navigation a{';
			$ecommerce_solution_custom_css .='font-weight:bold;';
		$ecommerce_solution_custom_css .='}';
	}else if($ecommerce_solution_theme_lay == 'Normal'){
		$ecommerce_solution_custom_css .='.primary-navigation a, .topbar .primary-navigation a{';
			$ecommerce_solution_custom_css .='font-weight: normal;';
		$ecommerce_solution_custom_css .='}';
	}

	// slider height
	$ecommerce_solution_option_slider_height = get_theme_mod('ecommerce_solution_option_slider_height');
	$ecommerce_solution_custom_css .='#slider img{';
		$ecommerce_solution_custom_css .='height: '.esc_attr($ecommerce_solution_option_slider_height).'px;';
	$ecommerce_solution_custom_css .='}';

	// slider content spacing
	$ecommerce_solution_slider_content_top_padding = get_theme_mod('ecommerce_solution_slider_content_top_padding');
	$ecommerce_solution_slider_content_left_padding = get_theme_mod('ecommerce_solution_slider_content_left_padding');
	$ecommerce_solution_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$ecommerce_solution_custom_css .='top: '.esc_attr($ecommerce_solution_slider_content_top_padding).'%; bottom: '.esc_attr($ecommerce_solution_slider_content_top_padding).'%;left: '.esc_attr($ecommerce_solution_slider_content_left_padding).'%;right: '.esc_attr($ecommerce_solution_slider_content_left_padding).'%;';
	$ecommerce_solution_custom_css .='}';

	// slider overlay
	$ecommerce_solution_enable_slider_overlay = get_theme_mod('ecommerce_solution_enable_slider_overlay', true);
	if($ecommerce_solution_enable_slider_overlay == false){
		$ecommerce_solution_custom_css .='#slider image{';
			$ecommerce_solution_custom_css .='opacity:1;';
		$ecommerce_solution_custom_css .='}';
	} 
	$ecommerce_solution_slider_overlay_color = get_theme_mod('ecommerce_solution_slider_overlay_color', true);
	if($ecommerce_solution_enable_slider_overlay != false){
		$ecommerce_solution_custom_css .='#slider{';
			$ecommerce_solution_custom_css .='background-color: '.esc_attr($ecommerce_solution_slider_overlay_color).';';
		$ecommerce_solution_custom_css .='}';
	}

	//  comment form width
	$ecommerce_solution_comment_form_width = get_theme_mod( 'ecommerce_solution_comment_form_width');
	$ecommerce_solution_custom_css .='#comments textarea{';
		$ecommerce_solution_custom_css .='width: '.esc_attr($ecommerce_solution_comment_form_width).'%;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_title_comment_form = get_theme_mod('ecommerce_solution_title_comment_form', 'Leave a Reply');
	if($ecommerce_solution_title_comment_form == ''){
		$ecommerce_solution_custom_css .='#comments h2#reply-title {';
			$ecommerce_solution_custom_css .='display: none;';
		$ecommerce_solution_custom_css .='}';
	}

	$ecommerce_solution_comment_form_button_content = get_theme_mod('ecommerce_solution_comment_form_button_content', 'Post Comment');
	if($ecommerce_solution_comment_form_button_content == ''){
		$ecommerce_solution_custom_css .='#comments p.form-submit {';
			$ecommerce_solution_custom_css .='display: none;';
		$ecommerce_solution_custom_css .='}';
	}

	// featured image setting
	$ecommerce_solution_image_border_radius = get_theme_mod('ecommerce_solution_image_border_radius', 0);
	$ecommerce_solution_custom_css .='.box-image img, .content_box img{';
		$ecommerce_solution_custom_css .='border-radius: '.esc_attr($ecommerce_solution_image_border_radius).'px;';
	$ecommerce_solution_custom_css .='}';

	$ecommerce_solution_image_box_shadow = get_theme_mod('ecommerce_solution_image_box_shadow',0);
	$ecommerce_solution_custom_css .='.box-image img, .content_box img{';
		$ecommerce_solution_custom_css .='box-shadow: '.esc_attr($ecommerce_solution_image_box_shadow).'px '.esc_attr($ecommerce_solution_image_box_shadow).'px '.esc_attr($ecommerce_solution_image_box_shadow).'px #ddd;';
	$ecommerce_solution_custom_css .='}';

	// fixed header padding option
	$ecommerce_solution_sticky_header_padding = get_theme_mod('ecommerce_solution_sticky_header_padding', 0);
		$ecommerce_solution_custom_css .='.fixed-header{';
			$ecommerce_solution_custom_css .='padding: '.esc_attr($ecommerce_solution_sticky_header_padding).'px !important;';
		$ecommerce_solution_custom_css .='}';

	// Post Block
	$ecommerce_solution_post_block_option = get_theme_mod( 'ecommerce_solution_post_block_option','By Block');
    if($ecommerce_solution_post_block_option == 'By Without Block'){
		$ecommerce_solution_custom_css .='#blog_sec .inner-service, #blog_sec .sticky{';
			$ecommerce_solution_custom_css .='border:none; margin:30px 0; box-shadow:none;';
		$ecommerce_solution_custom_css .='}';
	}

	// post image 
	$ecommerce_solution_post_featured_color = get_theme_mod('ecommerce_solution_post_featured_color', '#ffca04');
	$ecommerce_solution_post_featured_image = get_theme_mod('ecommerce_solution_post_featured_image','Image');
	if($ecommerce_solution_post_featured_image == 'Color'){
		$ecommerce_solution_custom_css .='.post-color{';
			$ecommerce_solution_custom_css .='background-color: '.esc_attr($ecommerce_solution_post_featured_color).';';
		$ecommerce_solution_custom_css .='}';
	}

	// featured image dimention
	$ecommerce_solution_post_featured_image_dimention = get_theme_mod('ecommerce_solution_post_featured_image_dimention', 'Default');
	$ecommerce_solution_post_featured_image_custom_width = get_theme_mod('ecommerce_solution_post_featured_image_custom_width');
	$ecommerce_solution_post_featured_image_custom_height = get_theme_mod('ecommerce_solution_post_featured_image_custom_height');
	if($ecommerce_solution_post_featured_image_dimention == 'Custom'){
		$ecommerce_solution_custom_css .='.box-image img{';
			$ecommerce_solution_custom_css .='width: '.esc_attr($ecommerce_solution_post_featured_image_custom_width).'px; height: '.esc_attr($ecommerce_solution_post_featured_image_custom_height).'px;';
		$ecommerce_solution_custom_css .='}';
	}

	// featured image dimention
	$ecommerce_solution_custom_post_color_width = get_theme_mod('ecommerce_solution_custom_post_color_width');
	$ecommerce_solution_custom_post_color_height = get_theme_mod('ecommerce_solution_custom_post_color_height');
	if($ecommerce_solution_post_featured_image == 'Color'){
		$ecommerce_solution_custom_css .='.post-color{';
			$ecommerce_solution_custom_css .='width: '.esc_attr($ecommerce_solution_custom_post_color_width).'px; height: '.esc_attr($ecommerce_solution_custom_post_color_height).'px;';
		$ecommerce_solution_custom_css .='}';
	}

	// site title font size
	$ecommerce_solution_site_title_font_size = get_theme_mod('ecommerce_solution_site_title_font_size', 30);
	$ecommerce_solution_custom_css .='.logo h1, .site-title a, .logo .site-title a{';
	$ecommerce_solution_custom_css .='font-size: '.esc_attr($ecommerce_solution_site_title_font_size).'px;';
	$ecommerce_solution_custom_css .='}';

	// site tagline font size
	$ecommerce_solution_site_tagline_font_size = get_theme_mod('ecommerce_solution_site_tagline_font_size', 12);
	$ecommerce_solution_custom_css .='p.site-description{';
	$ecommerce_solution_custom_css .='font-size: '.esc_attr($ecommerce_solution_site_tagline_font_size).'px;';
	$ecommerce_solution_custom_css .='}';

	// woocommerce Product Navigation
	$ecommerce_solution_wooproducts_nav = get_theme_mod('ecommerce_solution_wooproducts_nav', 'Yes');
	if($ecommerce_solution_wooproducts_nav == 'No'){
		$ecommerce_solution_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$ecommerce_solution_custom_css .='display: none;';
		$ecommerce_solution_custom_css .='}';
	}
	



