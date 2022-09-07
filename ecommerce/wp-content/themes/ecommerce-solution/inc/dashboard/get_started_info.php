<?php
add_action( 'admin_menu', 'ecommerce_solution_gettingstarted' );
function ecommerce_solution_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'ecommerce-solution'), esc_html__('About Theme', 'ecommerce-solution'), 'edit_theme_options', 'ecommerce-solution-guide-page', 'ecommerce_solution_guide');   
}

function ecommerce_solution_admin_theme_style() {
   wp_enqueue_style('ecommerce-solution-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'ecommerce_solution_admin_theme_style');

function ecommerce_solution_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Ecommerce Solution, you rock!', 'ecommerce-solution' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional Ecommerce Solution website. Please Click on the link below to know the theme setup information.', 'ecommerce-solution' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=ecommerce-solution-guide-page' ) ); ?>" class="button button-primary mt-3 mx-0 mb-0 py-2 px-3"><?php esc_html_e( 'Getting Started', 'ecommerce-solution' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'ecommerce_solution_notice');

/**
 * Theme Info Page
 */
function ecommerce_solution_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'ecommerce-solution' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Ecommerce Solution', 'ecommerce-solution' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'ecommerce-solution' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'ecommerce-solution' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( ECOMMERCE_SOLUTION_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'ecommerce-solution'); ?></a>
						<a href="<?php echo esc_url( ECOMMERCE_SOLUTION_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'ecommerce-solution'); ?></a>
						<a href="<?php echo esc_url( ECOMMERCE_SOLUTION_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'ecommerce-solution'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Ecommerce Solution Theme', 'ecommerce-solution' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Ecommerce Solution is a multipurpose, clean and polished WordPress eCommerce theme for establishing an impactful online presence on the internet whether you have an online apparel and fashion accessories store, sports equipment shop, cosmetics shop, mobile and gadgets store, jewellery shop, furniture shop, supermarket, grocery store or online food delivering website. The theme is designed with banners and sliders to create more space for showing products or promoting different brands in your collection. This eCommerce theme is essentially responsive, cross-browser compatible and translation ready. Creating an online store is a matter of minutes with this super-efficient WordPress theme that will give a good rank to your site in search engines, thanks to its SEO. Customization is a powerful tool that lets you design site easily without involving in the coding part. It has social media icons included so that customers can share products on various networking sites. It is tested to work with third party plugins. WooCommerce plugin which is a necessity in an eCommerce website is seamlessly compatible with this theme. The gallery comes with some great designs of layouts. Call to Action buttons are provided to generate leads. The very base of the site is made strong with Bootstrap framework.', 'ecommerce-solution' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','ecommerce-solution'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','ecommerce-solution'); ?></a> <?php esc_html_e( 'your website.','ecommerce-solution'); ?> </li>
							<li><?php esc_html_e( 'Ecommerce Solution','ecommerce-solution'); ?> <a target="_blank" href="<?php echo esc_url( ECOMMERCE_SOLUTION_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','ecommerce-solution'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
				<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','ecommerce-solution'); ?></h2>
				<div class="row">
					<div class="col-md-7">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','ecommerce-solution'); ?></h3>
                    		<p class="pad-box-p"><?php esc_html_e( 'Ecommerce WordPress theme is creative, stylish, dynamic and stunning. It is made to serve all range of businesses from a small local grocery shop to a giant multipurpose retail chain. It is backed by multiple page and blog layouts, unlimited colours and numerous Google fonts to craft out a website of your desired look and feel within minutes of installing it. It keeps you away from the stress of coding as it is extremely easy to use and manage for webmasters and novice both. It is strengthened by WooCommerce plugin which sets up a beautiful platform to sell anything. This plugin is the soul of any eCommerce website and gives immense power to you to sell both physical as well as digital goods in many shop layouts. With so many tools and features working on your behalf, this eCommerce WordPress theme will take care of everything and will free you from tons of responsibilities that come with a website. It provides a vast additional space in the form of banner and sliders to show your uniqueness in decorating it impressively. Get priority fixing of errors with the premium membership provided with the theme.', 'ecommerce-solution' ); ?><p>
                    	</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">	
							<h3><?php esc_html_e( 'Pro Theme Features','ecommerce-solution'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Theme options using customizer API','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Responsive design','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Advanced Color options and color pallets','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( '100+ Font Family Options','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Pagination option','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Fade Slider With different Tabs','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Unlimited Slides','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'About the Company section','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Services Listing','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Form to get a Free quote using Contact Form 7','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Pricing Plans section','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Seperate section to defind the flow of work','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Testimonial Section with shortcode','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'FAQ Section on Home with its shortcode','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Brand/Partner Listing Section','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Social Icon Widget, tagline, logo.','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Social Sharing On post','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Responsive layout for all devices','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Fully integrated with Font Awesome Icon','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Background Image Option','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Custom page templates','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Allow to set site title, tagline, logo','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Left and Right Sidebar','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Sticky post & Comment threads','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Customizable Home Page','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Multiple inner page templates','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Contact Page Template','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Blog Full width and right and left sidebar','ecommerce-solution'); ?></li>
									<li><?php esc_html_e( 'Recent post widget with images, Related post','ecommerce-solution'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','ecommerce-solution'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( ECOMMERCE_SOLUTION_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','ecommerce-solution'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( ECOMMERCE_SOLUTION_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','ecommerce-solution'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','ecommerce-solution'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','ecommerce-solution'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','ecommerce-solution'); ?></a> <?php esc_html_e( 'your website.','ecommerce-solution'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','ecommerce-solution'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( ECOMMERCE_SOLUTION_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','ecommerce-solution'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( ECOMMERCE_SOLUTION_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','ecommerce-solution'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','ecommerce-solution'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( ECOMMERCE_SOLUTION_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'ecommerce-solution'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>
<?php }?>