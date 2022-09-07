<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<?php do_action( 'ecommerce_solution_pageright_top' ); ?>

<div class="container">
    <main role="main" id="skip_content" class="main-wrapper py-4 px-0 row">
		<div class="<?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box background-img-skin"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
            <h1><?php the_title(); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_post_thumbnail(); ?>
                <div class="new-text"><?php the_content(); ?></div>
            <?php endwhile; // end of the loop. ?>
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || '0' != get_comments_number() ) {
                    comments_template();
                }
            ?>
        </div>
        <div id="sidebar" class="<?php if( get_theme_mod( 'ecommerce_solution_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
        <div class="clear"></div>
    </main>
</div>

<?php do_action( 'ecommerce_solution_pageright_bottom' ); ?>

<?php get_footer(); ?>