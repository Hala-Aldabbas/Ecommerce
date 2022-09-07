<?php
/**
 * The template for displaying all pages.
 * @package Grocery Ecommerce
 */
get_header(); ?>

<?php do_action('grocery_ecommerce_page_header'); ?>

<main id="maincontent" role="main" class="main-wrap-box py-4">
    <div class="container">
        <?php $grocery_ecommerce_page_layout = get_theme_mod( 'grocery_ecommerce_single_page_layout','One Column');
        if($grocery_ecommerce_page_layout == 'One Column'){ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div id="wrapper">
                    <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
                        <div class="bradcrumbs">
                            <?php grocery_ecommerce_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <div class="feature-box">
                        <h1><?php the_title(); ?></h1>
                        <?php the_post_thumbnail(); ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'grocery-ecommerce' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number py-2 px-3">',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'grocery-ecommerce' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) ); ?>       
                    <div class="clear"></div>   
                    <div class="feature-box">
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>
                    </div> 
                </div>
            <?php endwhile; // end of the loop. 
            wp_reset_postdata();?>
        <?php }else if($grocery_ecommerce_page_layout == 'Left Sidebar'){ ?>
            <div class="row">
                <div  id="sidebar" class="col-lg-3 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="col-lg-9 col-md-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div id="wrapper">
                            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
                                <div class="bradcrumbs">
                                    <?php grocery_ecommerce_the_breadcrumb(); ?>
                                </div>
                            <?php }?>
                            <div class="feature-box">
                                <h1><?php the_title(); ?></h1>
                                <?php the_post_thumbnail(); ?>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'grocery-ecommerce' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span class="page-number py-2 px-3">',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'grocery-ecommerce' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) ); ?>       
                            <div class="clear"></div>   
                            <div class="feature-box">
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div> 
                        </div>
                    <?php endwhile; // end of the loop. 
                    wp_reset_postdata();?>
                </div>
            </div>
        <?php }else if($grocery_ecommerce_page_layout == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div id="wrapper">
                            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
                                <div class="bradcrumbs">
                                    <?php grocery_ecommerce_the_breadcrumb(); ?>
                                </div>
                            <?php }?>
                            <div class="feature-box">
                                <h1><?php the_title(); ?></h1>
                                <?php the_post_thumbnail(); ?>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'grocery-ecommerce' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span class="page-number py-2 px-3">',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'grocery-ecommerce' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) ); ?>       
                            <div class="clear"></div>   
                            <div class="feature-box">
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div> 
                        </div>
                    <?php endwhile; // end of the loop. 
                    wp_reset_postdata();?>
                </div>
                <div  id="sidebar" class="col-lg-3 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        <?php }?>
    </div>
</main>

<?php do_action('grocery_ecommerce_page_footer'); ?>

<?php get_footer(); ?>