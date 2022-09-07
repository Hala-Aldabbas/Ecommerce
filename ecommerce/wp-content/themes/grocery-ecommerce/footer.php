<?php
/**
 * The template for displaying the footer.
 * @package Grocery Ecommerce
 */
?>
<?php if( get_theme_mod( 'grocery_ecommerce_hide_scroll',true) != '' || get_theme_mod( 'grocery_ecommerce_backtotop_responsive',true) != '') { ?>
  <?php $grocery_ecommerce_scroll_align = get_theme_mod( 'grocery_ecommerce_back_to_top','Right');
  if($grocery_ecommerce_scroll_align == 'Left'){ ?>
    <a href="#content" class="back-to-top scroll-left text-center"><?php esc_html_e('Top', 'grocery-ecommerce'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'grocery-ecommerce'); ?></span></a>
  <?php }else if($grocery_ecommerce_scroll_align == 'Center'){ ?>
    <a href="#content" class="back-to-top scroll-center text-center"><?php esc_html_e('Top', 'grocery-ecommerce'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'grocery-ecommerce'); ?></span></a>
  <?php }else{ ?>
    <a href="#content" class="back-to-top scroll-right text-center"><?php esc_html_e('Top', 'grocery-ecommerce'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'grocery-ecommerce'); ?></span></a>
  <?php }?>
<?php }?>
<footer role="contentinfo" id="footer">
  <?php //Set widget areas classes based on user choice
    $grocery_ecommerce_footer_columns = get_theme_mod('grocery_ecommerce_footer_widget', '4');
    if ($grocery_ecommerce_footer_columns == '3') {
      $cols = 'col-lg-4 col-md-4';
    } elseif ($grocery_ecommerce_footer_columns == '4') {
      $cols = 'col-lg-3 col-md-3';
    } elseif ($grocery_ecommerce_footer_columns == '2') {
      $cols = 'col-lg-6 col-md-6';
    } else {
      $cols = 'col-lg-12 col-md-12';
    }
  ?>
  <?php
  if ( is_active_sidebar( 'footer-1' ) ||
    is_active_sidebar( 'footer-2' ) ||
    is_active_sidebar( 'footer-3' ) ||
    is_active_sidebar( 'footer-4' ) ) :
  ?>
  <div class="footerinner py-4">
    <div class="container">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-1'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-2'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-3'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="inner">
    <div class="container">
      <div class="copyright">
        <p class="m-0"><?php grocery_ecommerce_credit_link(); ?> <?php echo esc_html(get_theme_mod('grocery_ecommerce_text',__('By Themesglance','grocery-ecommerce'))); ?></p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>