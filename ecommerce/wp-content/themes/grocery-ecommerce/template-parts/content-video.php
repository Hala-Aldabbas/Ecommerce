<?php
/**
 * The template part for displaying post
 * @package Grocery Ecommerce
 * @subpackage grocery_ecommerce
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$video = false;

	// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}
?>
<article class="blog-sec text-center animated fadeInDown p-2 mb-4">
  	<?php
		if ( ! is_single() ) {
			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) {
				foreach ( $video as $video_html ) {
					echo '<div class="entry-video">';
						echo $video_html;
					echo '</div>';
				}
			}
		};
	?>
	<h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	<?php if( get_theme_mod( 'grocery_ecommerce_metafields_date',true) != '' || get_theme_mod( 'grocery_ecommerce_metafields_author',true) != '' || get_theme_mod( 'grocery_ecommerce_metafields_comment',true) != '' || get_theme_mod( 'grocery_ecommerce_metafields_time',true) != '') { ?>
    <div class="post-info p-2 mb-2">
    	<?php if( get_theme_mod( 'grocery_ecommerce_metafields_date',true) != '') { ?>
      	<i class="fa fa-calendar pe-2" aria-hidden="true"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date pe-3"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
    	<?php }?>
    	<?php if( get_theme_mod( 'grocery_ecommerce_metafields_author',true) != '') { ?>
      	<i class="fa fa-user pe-2" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author pe-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
    	<?php }?>
    	<?php if( get_theme_mod( 'grocery_ecommerce_metafields_comment',true) != '') { ?>
      	<i class="fa fa-comments pe-2" aria-hidden="true"></i><span class="entry-comments pe-3"> <?php comments_number( __('0 Comments','grocery-ecommerce'), __('0 Comments','grocery-ecommerce'), __('% Comments','grocery-ecommerce') ); ?></span> 
    	<?php }?>
      <?php if( get_theme_mod( 'grocery_ecommerce_metafields_time',true) != '') { ?>
        <i class="far fa-clock pe-2" aria-hidden="true"></i> <span class="entry-comments pe-3"> <?php echo esc_html( get_the_time() ); ?></span>
      <?php }?>
    </div>
	<?php }?>
	<?php if(get_theme_mod('grocery_ecommerce_blog_post_content') == 'Full Content'){ ?>
    <?php the_content(); ?>
	<?php }
	if(get_theme_mod('grocery_ecommerce_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
	    <?php if(get_the_excerpt()) { ?>
	    	<div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( grocery_ecommerce_string_limit_words( $excerpt, esc_attr(get_theme_mod('grocery_ecommerce_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('grocery_ecommerce_button_excerpt_suffix','...') ); ?></p></div>
	    <?php }?>
	<?php }?>
	<?php if ( get_theme_mod('grocery_ecommerce_blog_button_text','Read Full') != '' ) {?>
	    <div class="blogbtn my-3">
	    	<a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html( get_theme_mod('grocery_ecommerce_blog_button_text',__('Read Full', 'grocery-ecommerce')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('grocery_ecommerce_blog_button_text',__('Read Full', 'grocery-ecommerce')) ); ?></span></a>
	    </div>
	<?php }?>
</article>