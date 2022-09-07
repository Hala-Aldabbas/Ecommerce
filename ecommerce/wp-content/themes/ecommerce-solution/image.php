<?php
/**
 * The template for displaying image attachments.
 * @package Ecommerce Solution
 */
get_header(); ?>

<main role="main" id="skip_content">
    <div class="container">
        <div class="main-wrapper py-4 px-0">
            <?php
            $ecommerce_solution_layout_option = get_theme_mod( 'ecommerce_solution_layout_options','Right Sidebar');
            if($ecommerce_solution_layout_option == 'Left Sidebar'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div class="col-lg-8 col-md-8">
            			<?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php the_title();?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php ecommerce_solution_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            <?php }else if($ecommerce_solution_layout_option == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php the_title(); ?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php ecommerce_solution_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($ecommerce_solution_layout_option == 'One Column'){ ?>
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h1><?php the_title(); ?></h1>    
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php ecommerce_solution_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
            <?php }else if($ecommerce_solution_layout_option == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="col-lg-6 col-md-6">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php the_title();?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php ecommerce_solution_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($ecommerce_solution_layout_option == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-md-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="col-lg-3 col-md-3">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php the_title();?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php ecommerce_solution_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($ecommerce_solution_layout_option == 'Grid Layout'){ ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php the_title();?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php ecommerce_solution_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer role="contentinfo"  class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php } else {?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php the_title();?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php ecommerce_solution_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-solution' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'ecommerce-solution' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }?>
            <div class="clear"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>