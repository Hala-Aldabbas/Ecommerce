<?php
/**
 * The template part for displaying content
 * @package Ecommerce Solution
 * @subpackage ecommerce_solution
 * @since 1.0
 */
?>

<?php $ecommerce_solution_theme_lay = get_theme_mod( 'ecommerce_solution_post_layouts','Layout 2');
if($ecommerce_solution_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($ecommerce_solution_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($ecommerce_solution_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}