<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features
 * @package Ecommerce Solution
 */

if ( ! function_exists( 'ecommerce_solution_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function ecommerce_solution_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'ecommerce_solution_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
	wp_reset_postdata();
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function ecommerce_solution_categorized_blog() {
	if ( false === ( $ecommerce_solution_all_the_cool_cats = get_transient( 'ecommerce_solution_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$ecommerce_solution_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$ecommerce_solution_all_the_cool_cats = count( $ecommerce_solution_all_the_cool_cats );

		set_transient( 'ecommerce_solution_all_the_cool_cats', $ecommerce_solution_all_the_cool_cats );
	}

	if ( '1' != $ecommerce_solution_all_the_cool_cats ) {
		// This blog has more than 1 category so ecommerce_solution_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so ecommerce_solution_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'ecommerce_solution_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Ecommerce Solution
 */
function ecommerce_solution_the_custom_logo() {
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in ecommerce_solution_categorized_blog
 */
function ecommerce_solution_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'ecommerce_solution_all_the_cool_cats' );
}
add_action( 'edit_category', 'ecommerce_solution_category_transient_flusher' );
add_action( 'save_post',     'ecommerce_solution_category_transient_flusher' );

/**
 * Posts pagination.
 */
if ( ! function_exists( 'ecommerce_solution_pagination_settings' ) ) {
	function ecommerce_solution_pagination_type() {
		$ecommerce_solution_pagination_type = get_theme_mod( 'ecommerce_solution_pagination_settings', 'Numeric Pagination' );
		if ( $ecommerce_solution_pagination_type == 'Numeric Pagination' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}

if ( ! function_exists( 'ecommerce_solution_pagination_position' ) ) {
	function ecommerce_solution_blog_post_content() {
		$ecommerce_solution_blog_post_content = get_theme_mod( 'ecommerce_solution_blog_post_content');
		if ( have_posts() ) :
        /* Start the Loop */          
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content',get_post_format() );           
        endwhile;
        else :
          get_template_part( 'no-results' ); 
        endif; 
	}
}
