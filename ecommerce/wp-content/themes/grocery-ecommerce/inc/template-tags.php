<?php
/**
 * Custom template tags for this theme.
 * @package Grocery Ecommerce
 */

if ( ! function_exists( 'grocery_ecommerce_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function grocery_ecommerce_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'grocery_ecommerce_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
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

if ( ! function_exists( 'grocery_ecommerce_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function grocery_ecommerce_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf('<span class="posted-on">Published %1$s</span><span class="byline"> by %2$s</span>',
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			esc_html($time_string)
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function grocery_ecommerce_categorized_blog() {
	if ( false === ( $grocery_ecommerce_all_the_cool_cats = get_transient( 'grocery_ecommerce_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$grocery_ecommerce_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$grocery_ecommerce_all_the_cool_cats = count( $grocery_ecommerce_all_the_cool_cats );

		set_transient( 'grocery_ecommerce_all_the_cool_cats', $grocery_ecommerce_all_the_cool_cats );
	}

	if ( '1' != $grocery_ecommerce_all_the_cool_cats ) {
		// This blog has more than 1 category so grocery_ecommerce_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so grocery_ecommerce_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'grocery_ecommerce_the_custom_logo' ) ) :

function grocery_ecommerce_the_custom_logo() {
	if( has_custom_logo() ){
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in
grocery_ecommerce_categorized_blog
 */
function grocery_ecommerce_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'grocery_ecommerce_all_the_cool_cats' );
}
add_action( 'edit_category', 'grocery_ecommerce_category_transient_flusher' );
add_action( 'save_post','grocery_ecommerce_category_transient_flusher' );

/**
 * Posts pagination.
 */
if ( ! function_exists( 'grocery_ecommerce_posts_pagination' ) ) {
	function grocery_ecommerce_posts_pagination() {
		$pagination_type = get_theme_mod( 'grocery_ecommerce_pagination_type', 'page-numbers' );
		if ( $pagination_type == 'page-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}

function grocery_ecommerce_banner_image( $image_url ){
    global $post;

    if( is_singular() ){
        $image_url      = get_the_post_thumbnail_url( $post->ID, 'full' );
        $header_image = get_header_image();
        $fallback_image = ! empty( $header_image ) ?  $header_image : esc_url(get_template_directory_uri()) . '/images/default.png';
        $image_url      = ( ! empty( $image_url) ) ? $image_url : $fallback_image;
    }
    return $image_url;
}