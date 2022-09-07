<?php
//about theme info
add_action( 'admin_menu', 'grocery_ecommerce_gettingstarted' );
function grocery_ecommerce_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'grocery-ecommerce'), esc_html__('Get Started', 'grocery-ecommerce'), 'edit_theme_options', 'grocery_ecommerce_guide', 'grocery_ecommerce_mostrar_guide');   
}
// Add a Custom CSS file to WP Admin Area
function grocery_ecommerce_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'grocery_ecommerce_admin_theme_style');

//guidline for about theme
function grocery_ecommerce_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'grocery-ecommerce' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Grocery Ecommerce WordPress Theme', 'grocery-ecommerce' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'grocery-ecommerce' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By Themesglance', 'grocery-ecommerce' ); ?></h4>
				</div>
			<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'grocery-ecommerce' ); ?> <span><?php esc_html_e( '20% off', 'grocery-ecommerce' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'grocery-ecommerce' ); ?> <span><?php esc_html_e( '" Get20 "', 'grocery-ecommerce' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'grocery-ecommerce' ); ?></h3>
			<p><?php esc_html_e( 'Grocery Ecommerce will impress you with its elegant and clean design for grocery stores, multivendor eCommerce shops, organic fruits and vegetable stores, supermarkets, vegetable sellers, food market, food market, grocery markets, for selling online vegetables, agriculture products, and starting any eCommerce websites for selling multiple products such as grocery and essentials, home decor material, clothing, and apparel, and more. This beautiful theme comes with a responsive design, a wonderful Banner as well as a testimonial section, and other sections included. With a user-friendly theme interface, using this theme becomes a lot easier. It is free to use and comes with a professional design along with SEO-friendly HTML codes. The overall design of this theme is optimized making the design lightweight and made to deliver faster page load time. Call to Action Buttons (CTA) are included at several places for making your conversions better and its interactive design will impress the target audience and keep them engaged for longer. Social media options will let you make effective promotions on various social media platforms. You will also find a responsive slider and plenty of display options in the theme. This theme is designed using a powerful bootstrap framework and makes use of stunning animations to make the overall design look perfect.', 'grocery-ecommerce')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'grocery-ecommerce' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'Grocery Ecommerce', 'grocery-ecommerce' ); ?> <a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'grocery-ecommerce' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Grocery Ecommerce Theme', 'grocery-ecommerce' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/free-screenshot.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'grocery-ecommerce' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'grocery-ecommerce' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'grocery-ecommerce' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'grocery-ecommerce' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'grocery-ecommerce' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'grocery-ecommerce'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'grocery-ecommerce'); ?></a>
			<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'grocery-ecommerce'); ?></a>
			<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'grocery-ecommerce'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'grocery-ecommerce'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Slider with unlimited slides', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Cause" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Events" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Donation form with contact form 7', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Gallery Plugin with shortcode', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Volunteers" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Social Icon widget', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Testimonials" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Contact widget for footer', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Donators" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Contact page Template', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Partner listing with slider', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Recent Post Widget with thumbnails', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Blog full width, With Left and Right sidebar Template', 'grocery-ecommerce'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'grocery-ecommerce'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'grocery-ecommerce'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'grocery-ecommerce'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'grocery-ecommerce'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'grocery-ecommerce'); ?></a> <?php esc_html_e('your website.', 'grocery-ecommerce'); ?></li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'grocery-ecommerce'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'grocery-ecommerce'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'grocery-ecommerce' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Grocery Ecommerce Lite', 'grocery-ecommerce' ); ?> <a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'grocery-ecommerce' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>