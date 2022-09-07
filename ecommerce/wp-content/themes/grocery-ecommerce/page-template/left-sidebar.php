<?php
/**
 * Template Name: Page with Left Sidebar
 */
get_header(); ?>

<?php do_action('grocery_ecommerce_page_left_header'); ?>

<div class="container">
    <main id="maincontent" role="main" class="main-wrap-box py-4"> 
        <div class="row"> 
        	<div id="sidebar" class="col-lg-3 col-md-3">
        		<?php dynamic_sidebar('sidebar-2'); ?>
        	</div>		 
        	<div class="col-lg-9 col-md-9" id="wrapper" >
        		<?php while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_post_thumbnail(); ?>
                    <div class="entry-content"><p><?php the_content(); ?></p></div>

                    <?php wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'grocery-ecommerce' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'grocery-ecommerce' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) ); 
                    
                    //If comments are open or we have at least one comment, load up the comment template
                	if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; wp_reset_postdata();?>
            </div>
            <div class="clearfix"></div> 
        </div>   
    </main>
</div>

<?php do_action('grocery_ecommerce_page_left_footer'); ?>

<?php get_footer(); ?>