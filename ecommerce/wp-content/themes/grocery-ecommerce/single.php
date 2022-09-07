<?php
/**
 * The Template for displaying all single posts.
 * @package Grocery Ecommerce
 */
get_header(); ?>

<div class="container">
    <main id="maincontent" role="main" class="main-wrap-box py-4">
    	<?php
	    $grocery_ecommerce_left_right = get_theme_mod( 'grocery_ecommerce_single_post_layout','Right Sidebar');
	    if($grocery_ecommerce_left_right == 'Right Sidebar'){ ?>
		    <div class="row">
				<div class="col-lg-9 col-md-9" id="wrapper">
		            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
			            <div class="bradcrumbs">
			                <?php grocery_ecommerce_the_breadcrumb(); ?>
			            </div>
					<?php }?>
					<?php while ( have_posts() ) : the_post(); 

						get_template_part( 'template-parts/single-post');

		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>
				<div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
			</div>
		<?php }else if($grocery_ecommerce_left_right == 'Left Sidebar'){ ?>
			<div class="row">
				<div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
				<div class="col-lg-9 col-md-9" id="wrapper">
		            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
			            <div class="bradcrumbs">
			                <?php grocery_ecommerce_the_breadcrumb(); ?>
			            </div>
					<?php }?>
					<?php while ( have_posts() ) : the_post(); 
						
						get_template_part( 'template-parts/single-post');

		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>	     
		    </div>  	
		<?php }else if($grocery_ecommerce_left_right == 'One Column'){ ?>
			<div id="wrapper">
	            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
		            <div class="bradcrumbs">
		                <?php grocery_ecommerce_the_breadcrumb(); ?>
		            </div>
				<?php }?>
				<?php while ( have_posts() ) : the_post(); 
						
					get_template_part( 'template-parts/single-post');

	            endwhile; // end of the loop. 
	            wp_reset_postdata();?>
	       	</div>
	    <?php } ?>
        <div class="clearfix"></div>
    </main>
</div>

<?php get_footer(); ?>