<?php
/**
 * The template for displaying Archive pages.
 * @package Ecommerce Solution
 */
get_header(); ?>

<main role="main" id="skip_content">
    <div class="container">
        <?php
        $ecommerce_solution_layout_option = get_theme_mod( 'ecommerce_solution_layout_options','Right Sidebar');
        if($ecommerce_solution_layout_option == 'One Column'){ ?>
            <div class="blog-section">
                <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                    <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php ecommerce_solution_pagination_type(); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>   
                <?php ecommerce_solution_blog_post_content(); ?>
                <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                    <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php ecommerce_solution_pagination_type(); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php }else if($ecommerce_solution_layout_option == 'Three Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
                <div class="blog-section col-lg-6 col-md-6">
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php ecommerce_solution_blog_post_content(); ?>
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            </div>
        <?php }else if($ecommerce_solution_layout_option == 'Four Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
                <div class="blog-section col-lg-3 col-md-3">
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php ecommerce_solution_blog_post_content(); ?>
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
            </div>
        <?php }else if($ecommerce_solution_layout_option == 'Grid Layout'){ ?>
            <div class="row">
                <div class="blog-section <?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?> 
                    <div class="row">
                        <?php if ( have_posts() ) :
                            /* Start the Loop */          
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' );
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                    </div>
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($ecommerce_solution_layout_option == 'Left Sidebar'){ ?>
            <div class="row">
                <div class="<?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
                <div class="blog-section <?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php ecommerce_solution_blog_post_content(); ?>
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php }else if($ecommerce_solution_layout_option == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="blog-section <?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php ecommerce_solution_blog_post_content(); ?>
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php } else {?>
            <div class="row">
                <div class="blog-section <?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php ecommerce_solution_blog_post_content(); ?>
                    <?php if(get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('ecommerce_solution_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'ecommerce_solution_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php ecommerce_solution_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php }?>
    </div>
</main>

<div class="clearfix"></div>
<?php get_footer(); ?>