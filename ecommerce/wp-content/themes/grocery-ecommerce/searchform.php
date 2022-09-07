<?php
/**
 * The template for displaying search forms in Grocery Ecommerce
 * @package Grocery Ecommerce
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'grocery-ecommerce' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod('grocery_ecommerce_search_placeholder', __('Search', 'grocery-ecommerce')) ); ?>" value="<?php the_search_query(); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'grocery-ecommerce' ); ?>">
</form>