<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Ecommerce Solution
 */
get_header(); ?>

<main role="main" id="skip_content" class="content_box">
    <div class="container">
        <div class="page-content text-center">
            <h1><?php echo esc_html(get_theme_mod('ecommerce_solution_page_not_found_heading',__('404 Not Found','ecommerce-solution')));?></h1>
            <p class="text-404"><?php echo esc_html(get_theme_mod('ecommerce_solution_page_not_found_text',__('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','ecommerce-solution')));?></p>
            <?php if( get_theme_mod('ecommerce_solution_page_not_found_button','Back to Home Page') != ''){ ?>
                <div class="read-moresec my-5 mx-0 my-5 mx-0">
                    <a href="<?php echo esc_url( home_url() ); ?>" class="button mt-3 mx-0 mb-0 py-2 px-3 text-uppercase"><?php echo esc_html(get_theme_mod('ecommerce_solution_page_not_found_button',__('Back to Home Page','ecommerce-solution')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('ecommerce_solution_page_not_found_button',__('Back to Home Page','ecommerce-solution')));?></span></a>
                </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
</main>

<?php get_footer(); ?>