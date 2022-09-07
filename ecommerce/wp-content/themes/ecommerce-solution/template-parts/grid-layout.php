<?php
/**
 * The template part for displaying grid layout
 * @package Ecommerce Solution
 * @subpackage ecommerce_solution
 * @since 1.0
 */
?>

<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="box-image">
      <?php if( get_theme_mod( 'ecommerce_solution_post_featured_image',true) != '') { ?>
        <div class="box-image">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php }?>
    </div>
    <div class="mainbox p-4">
      <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2> 
      <div class="new-text">
      <?php $excerpt = get_the_excerpt(); echo esc_html( ecommerce_solution_string_limit_words( $excerpt, esc_attr(get_theme_mod('ecommerce_solution_post_excerpt_number','30')))); ?>  <?php echo esc_html( get_theme_mod('ecommerce_solution_post_discription_suffix','[...]') ); ?>
      </div> 
      <?php if( get_theme_mod('ecommerce_solution_button_text','View More') != ''){ ?>
        <div class="postbtn my-4 text-start">
          <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html(get_theme_mod('ecommerce_solution_button_text','View More'));?><i class="<?php echo esc_attr(get_theme_mod('ecommerce_solution_button_icon','fas fa-long-arrow-alt-right')); ?> me-0 py-0 px-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('ecommerce_solution_button_text','View More'));?></span></a>
        </div>
      <?php }?>
    </div>
  </article>
</div>