<?php
/**
 * The Header for our theme.
 * @package Grocery Ecommerce
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	
	<?php if(get_theme_mod('grocery_ecommerce_preloader',false) || get_theme_mod('grocery_ecommerce_preloader_responsive',false)){ ?>
    <?php if(get_theme_mod( 'grocery_ecommerce_preloader_type','Square') == 'Square'){ ?>
      <div id="overlayer"></div>
      <span class="tg-loader">
      	<span class="tg-loader-inner"></span>
      </span>
    <?php }else if(get_theme_mod( 'grocery_ecommerce_preloader_type') == 'Circle') {?>    
      <div class="preloader text-center">
        <div class="preloader-container">
          <span class="animated-preloader"></span>
        </div>
      </div>
    <?php }?>
	<?php }?>
	<header role="banner" class="position-relative">
		<a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'grocery-ecommerce' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'grocery-ecommerce' ); ?></span></a>
		<?php if (has_nav_menu('primary')){ ?>
			<div class="toggle-menu responsive-menu">
        <button role="tab" class="mobiletoggle"><i class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_menu_open_icon','fas fa-bars')); ?> me-2"></i><?php echo esc_html( get_theme_mod('grocery_ecommerce_mobile_menu_label', __('Menu','grocery-ecommerce'))); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('grocery_ecommerce_mobile_menu_label', __('Menu','grocery-ecommerce'))); ?></span></button>
      </div>
    <?php }?>	

		<div id="header">	
			<?php if(get_theme_mod('grocery_ecommerce_top_header',false) == true || get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == true){ ?>
				<div class="top-bar py-2 text-center text-lg-start">
					<div class="container">
		    		<div class="row">
			      	<div class="col-lg-7 col-md-12 col-sm-8 align-self-center">
			      		<?php if ( get_theme_mod('grocery_ecommerce_order_text','') != "" ) {?>
									<p class="order-text mb-lg-0"><?php echo esc_html(get_theme_mod('grocery_ecommerce_order_text')); ?></p>
								<?php }?>
			      	</div>
			      	<div class="col-lg-5 col-md-12 col-sm-4 align-self-center text-lg-end text-center">
		          	<?php if ( get_theme_mod('grocery_ecommerce_cashback_text','') != "" ) {?>
									<p class="cashback-text mb-0"><?php echo esc_html(get_theme_mod('grocery_ecommerce_cashback_text')); ?></p>
								<?php }?>
			      	</div>
				    </div>
				  </div>
				</div>
			<?php }?>
			<div class="next-topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5">
							<?php if ( get_theme_mod('grocery_ecommerce_call','') != "" ) {?>
								<p class="call-info mb-0 text-lg-start text-center"><?php esc_html_e('Need Help? Call Us:', 'grocery-ecommerce') ?> <a href="tel:<?php echo esc_attr(get_theme_mod('grocery_ecommerce_call','')); ?>"><?php echo esc_html(get_theme_mod('grocery_ecommerce_call','')); ?><span class="screen-reader-text"><?php esc_html_e('Phone Number', 'grocery-ecommerce') ?></span></a></p>
							<?php }?>
						</div>
						<div class="col-lg-6 col-md-7 align-self-center text-lg-end text-center">
							<div class="d-md-inline-block d-block">
								<?php if(class_exists('woocommerce')){ ?>
	                <div class="order-track position-relative d-md-inline-block">
	                  <span><?php esc_html_e('Order Tracking','grocery-ecommerce'); ?></span>
	                  <div class="order-track-hover text-start">
	                    <?php echo do_shortcode('[woocommerce_order_tracking]','grocery-ecommerce'); ?>
	                  </div>
	                </div>
	              <?php }?>
	              <?php if( class_exists( 'GTranslate' ) ) { ?>
		              <div class="translate-lang position-relative d-md-inline-block">
		                <?php echo do_shortcode( '[gtranslate]' );?>
		              </div>
		            <?php }?>
	              <?php if(class_exists('woocommerce')){ ?>
	                <div class="currency-box d-md-inline-block">
	                  <?php echo do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' );?>
	                </div>
	              <?php } ?>
	            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="middle-header py-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-4 align-self-center">
							<div class="logo text-md-start text-center">
		          	<?php if ( has_custom_logo() ) : ?>
		            	<div class="site-logo"><?php the_custom_logo(); ?></div>
		            <?php endif; ?>
		              <?php $blog_info = get_bloginfo( 'name' ); ?>
		              <?php if ( ! empty( $blog_info ) ) : ?>
		              	<?php if( get_theme_mod('grocery_ecommerce_show_site_title',true) != ''){ ?>
			                <?php if ( is_front_page() && is_home() ) : ?>
			                	<h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                <?php else : ?>
			                  <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			                <?php endif; ?>
			            <?php }?>
		            <?php endif; ?>
		            <?php if( get_theme_mod('grocery_ecommerce_show_tagline',true) != ''){ ?>
	                <?php
	                $description = get_bloginfo( 'description', 'display' );
	                if ( $description || is_customize_preview() ) :
	                ?>
	                	<p class="site-description m-0">
	                    <?php echo esc_html($description); ?>
	                	</p>
	                <?php endif; ?>
		            <?php }?>
			        </div>
						</div>
						<div class="col-lg-6 col-md-4 align-self-center">
							<?php if(class_exists('woocommerce')){?>
								<div class="header-search mb-md-0 mb-3">
									<?php get_product_search_form(); ?>
								</div>
							<?php }?>
						</div>
						<div class="col-lg-3 col-md-4 align-self-center woo-icons text-md-end text-center">
							<?php if ( class_exists('woocommerce') ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="me-3"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','grocery-ecommerce' );?></span></a>
                <?php if(defined('YITH_WCWL')){ ?>
                  <a class="wishlist_view position-relative me-3" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><i class="fas fa-heart"></i><span class="screen-reader-text"><?php esc_html_e( 'Wishlist','grocery-ecommerce' );?></span></a>
                <?php }?>
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" class="cart-icon"><i class="fas fa-shopping-cart me-2"></i><?php esc_html_e( 'My Cart','grocery-ecommerce' );?><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','grocery-ecommerce' );?></span></a>
              <?php }?>
						</div>
					</div>
				</div>
			</div>
			<div class="menu-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<?php if(class_exists('woocommerce')){ ?>   
			          <div class="product-cat-box position-relative">
			            <button class="product-btn"><i class="fas fa-bars me-3"></i><?php esc_html_e('ALL CATEGORIES','grocery-ecommerce'); ?><i class="fas fa-chevron-down ms-3"></i></button>
			            <div class="product-cat">
			              <?php
			                $args = array(
			                  'orderby'    => 'title',
			                  'order'      => 'ASC',
			                  'hide_empty' => 0,
			                  'parent'  => 0
			                );
			                $product_categories = get_terms( 'product_cat', $args );
			                $count = count($product_categories);
			                if ( $count > 0 ){
			                    foreach ( $product_categories as $product_category ) {
			                      $product_cat_id   = $product_category->term_id;
			                      $cat_link = get_category_link( $product_cat_id );
			                      if ($product_category->category_parent == 0) { ?>
			                    <li class="drp_dwn_menu p-2"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
			                    <?php
			                  }
			                  echo esc_html( $product_category->name ); ?></a></li>
			              <?php } } ?>
			            </div>
			          </div>
			        <?php }?>
						</div>
						<div class="col-lg-9 col-md-9 align-self-center">
							<div class="<?php if( get_theme_mod( 'grocery_ecommerce_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
		            <div id="sidelong-menu" class="nav side-nav">
		              <nav id="primary-site-navigation" class="nav-menu text-lg-end" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'grocery-ecommerce' ); ?>">
		              	<?php if (has_nav_menu('primary')){
		                  wp_nav_menu( array( 
		                    'theme_location' => 'primary',
		                    'container_class' => 'main-menu-navigation clearfix' ,
		                    'menu_class' => 'clearfix',
		                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
		                    'fallback_cb' => 'wp_page_menu',
		                  ) ); 
		              	}?>
		                <a href="javascript:void(0)" class="closebtn responsive-menu"><?php echo esc_html( get_theme_mod('grocery_ecommerce_close_menu_label', __('Close Menu','grocery-ecommerce'))); ?><i class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_menu_close_icon','fas fa-times-circle')); ?> m-3"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('grocery_ecommerce_close_menu_label', __('Close Menu','grocery-ecommerce'))); ?></span></a>
		              </nav>
		            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if(get_theme_mod('grocery_ecommerce_post_featured_image') == 'banner' ){
    if( is_singular() ) {?>
    	<div id="page-site-header">
        <div class='page-header'> 
        	<?php the_title( '<h1>', '</h1>' ); ?>
        </div>
    	</div>
    <?php }
	}?>