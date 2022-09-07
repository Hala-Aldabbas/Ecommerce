<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main role="main" id="skip_content">
  <?php do_action( 'ecommerce_solution_above_slider' ); ?>
  <?php if( get_theme_mod('ecommerce_solution_slider_hide', false) != '' || get_theme_mod( 'ecommerce_solution_display_slider',false) != ''){ ?>
    <section id="slider" class="m-auto p-0 mw-100">
      <?php $ecommerce_solution_slider_speed = get_theme_mod('ecommerce_solution_slider_speed', 3000); ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod('ecommerce_solution_slider_speed', 3000)); ?>"> 
        <?php $ecommerce_solution_slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'ecommerce_solution_slider_setting' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $ecommerce_solution_slider_page[] = $mod;
            }
          }
          if( !empty($ecommerce_solution_slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $ecommerce_solution_slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" />
              <?php } ?>
              <?php if( get_theme_mod('ecommerce_solution_slider_heading',true) != '' || get_theme_mod('ecommerce_solution_slider_text',true) != '' || get_theme_mod('ecommerce_solution_show_slider_button',true) != ''){ ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <div class="carousel-content p-3">
                      <?php if( get_theme_mod('ecommerce_solution_slider_heading',true) != ''){ ?>
                        <h1 class="mt-3 mb-0"><?php the_title(); ?></h1>
                      <?php } ?>
                      <?php if( get_theme_mod('ecommerce_solution_slider_text',true) != ''){ ?>
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( ecommerce_solution_string_limit_words( $excerpt, esc_attr(get_theme_mod('ecommerce_solution_slider_excerpt_number','15')))); ?></p>
                      <?php } ?>
                      <?php if (get_theme_mod( 'ecommerce_solution_show_slider_button',true) != '' || get_theme_mod( 'ecommerce_solution_display_slider_button',true) != ''){ ?>
                        <?php if( get_theme_mod('ecommerce_solution_slider_button_text','SHOP NOW') != ''){ ?>
                          <div class="more-btn my-md-4 text-start">
                            <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html( get_theme_mod('ecommerce_solution_slider_button_text',__('SHOP NOW','ecommerce-solution'))); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('ecommerce_solution_slider_button_text',__('SHOP NOW','ecommerce-solution'))); ?></span></a>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon rounded-circle" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','ecommerce-solution' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon rounded-circle" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','ecommerce-solution' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'ecommerce_solution_below_slider' ); ?>

  <section id="new-collection" class="py-5 px-0"> 
    <div class="container">    
      <?php $ecommerce_solution_collection_page = array();
        $mod = absint( get_theme_mod( 'ecommerce_solution_product_settings','ecommerce-solution'));
        if ( 'page-none-selected' != $mod ) {
          $ecommerce_solution_collection_page[] = $mod;
        }
        if( !empty($ecommerce_solution_collection_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $ecommerce_solution_collection_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <strong class="text-center mb-4"><?php the_title(); ?></strong>
              <?php the_content(); ?>
            <?php $count++; endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata()
      ?>
    </div>
  </section>

  <?php do_action( 'ecommerce_solution_below_new_collection' ); ?>

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>