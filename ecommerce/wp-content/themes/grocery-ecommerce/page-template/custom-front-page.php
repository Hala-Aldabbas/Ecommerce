<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action('grocery_ecommerce_above_slider_section'); ?>
  
  <?php if(get_theme_mod('grocery_ecommerce_show_slider') != ''){ ?>
    <section id="slider" class="mt-5">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"> 
        <?php $grocery_ecommerce_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'grocery_ecommerce_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $grocery_ecommerce_content_pages[] = $mod;
            }
          }
          if( !empty($grocery_ecommerce_content_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $grocery_ecommerce_content_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <div class="container">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/block-patterns/images/slider.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if ( get_theme_mod('grocery_ecommerce_slider_title',true) != '' ) {?>
                      <h1><?php the_title(); ?></h1> 
                    <?php }?>
                    <?php if ( get_theme_mod('grocery_ecommerce_slider_content',true) != '' ) {?>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( grocery_ecommerce_string_limit_words( $excerpt,15) ); ?></p>
                    <?php }?>
                    <?php if ( get_theme_mod('grocery_ecommerce_slider_button_label','READ MORE') != '' && get_theme_mod('grocery_ecommerce_slider_button',true) != '') {?>
                      <div class ="read-more mt-md-4 mt-0">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod('grocery_ecommerce_slider_button_label',__('READ MORE','grocery-ecommerce')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('grocery_ecommerce_slider_button_label',__('READ MORE','grocery-ecommerce')) ); ?></span></a>
                      </div>
                    <?php }?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Previous','grocery-ecommerce'); ?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Next','grocery-ecommerce'); ?></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action('grocery_ecommerce_below_banner_section'); ?>

  <?php if( get_theme_mod('grocery_ecommerce_small_title') != '' || get_theme_mod('grocery_ecommerce_section_title') != '' || get_theme_mod('grocery_ecommerce_sale_product_category') != '') {?>
    <section id="product-section" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('grocery_ecommerce_small_title') != ''){ ?>
          <strong class="d-block text-center"><?php echo esc_html(get_theme_mod('grocery_ecommerce_small_title')); ?></strong>
        <?php }?>
        <?php if( get_theme_mod('grocery_ecommerce_section_title') != ''){ ?>
          <h2 class="mb-4 pt-0 text-center"><?php echo esc_html(get_theme_mod('grocery_ecommerce_section_title')); ?></h2>
        <?php }?>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <?php if ( class_exists( 'WooCommerce' ) && get_theme_mod('grocery_ecommerce_sale_product_category') != '' ) {?>
              <div class="sale-products">
                <?php $args = array( 
                  'post_type' => 'product',
                  'product_cat' => get_theme_mod('grocery_ecommerce_sale_product_category'),
                  'order' => 'ASC'
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                  <div class="product-box position-relative">
                    <span class="product-sale-tag">
                      <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                    </span>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
                        <div class="product-image">
                          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12">
                        <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
                        <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                        <div class="countdowntimer mt-2">
                          <?php if(get_theme_mod('grocery_ecommerce_product_timer_text') != ''){?>
                            <p class="timer-text mb-2"><?php echo esc_html(get_theme_mod('grocery_ecommerce_product_timer_text')); ?></p>
                          <?php }?>
                          <p id="timer" class="countdown">
                            <?php 
                            $dateday = get_theme_mod('grocery_ecommerce_product_clock_timer_end'); ?>
                            <input type="hidden" class="date" value="<?php echo esc_html($dateday); ?>"></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; wp_reset_query(); ?>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-6 col-md-6">
            <?php if ( class_exists( 'WooCommerce' ) && get_theme_mod('grocery_ecommerce_product_category') != '' ) {?>
              <div class="products-category">
                <div class="row">
                  <?php $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('grocery_ecommerce_product_category'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="col-lg-6 col-md-12">
                      <div class="product-box position-relative">
                        <div class="product-image">
                          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                        </div>
                        <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
                        <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></p>
                        <div class="cart-button">
                          <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; wp_reset_query(); ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action('grocery_ecommerce_after_service_section'); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>