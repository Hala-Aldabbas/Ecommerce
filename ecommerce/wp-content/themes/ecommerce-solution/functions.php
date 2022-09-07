<?php
/**
 * Ecommerce Solution functions and definitions
 * @package Ecommerce Solution
 */

/* Theme Setup */
if ( ! function_exists( 'ecommerce_solution_setup' ) ) :

function ecommerce_solution_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ecommerce_solution_content_width', 640 );

	load_theme_textdomain( 'ecommerce-solution', get_template_directory() . '/languages' );	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('ecommerce-solution-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ecommerce-solution' ),
		'topmenus' => __( 'Top Menu', 'ecommerce-solution' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', ecommerce_solution_font_url() ) );
}
endif; // ecommerce_solution_setup
add_action( 'after_setup_theme', 'ecommerce_solution_setup' );

/* Theme Widgets Setup */
function ecommerce_solution_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$ecommerce_solution_widget_areas = get_theme_mod('footer_widget_areas', '4');
	for ($i=1; $i<=$ecommerce_solution_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'ecommerce-solution' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'ecommerce_solution_widgets_init' );

/* Theme Font URL */
function ecommerce_solution_font_url() {
	$font_url      = '';
	$font_family   = array();
	$font_family[] = 'Fjalla One';
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Alex Brush';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	$font_family[] = 'Dancing Script:400,700';
	
	$query_args = array(
		'family' => rawurlencode(implode('|', $font_family)),
	);
	$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
	return $font_url;
}


/* Theme enqueue scripts */
function ecommerce_solution_scripts() {
	wp_enqueue_style( 'ecommerce-solution-font', ecommerce_solution_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'ecommerce-solution-block-style', get_theme_file_uri('/css/blocks.css') );
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/css/bootstrap.css');
	wp_enqueue_style( 'ecommerce-solution-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'ecommerce-solution-style', 'rtl', 'replace' );	
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );

	// Paragraph
	$ecommerce_solution_paragraph_color       = get_theme_mod('ecommerce_solution_paragraph_color', '');
	$ecommerce_solution_paragraph_font_family = get_theme_mod('ecommerce_solution_paragraph_font_family', '');
	$ecommerce_solution_paragraph_font_size   = get_theme_mod('ecommerce_solution_paragraph_font_size', '');
	// "a" tag
	$ecommerce_solution_atag_color       = get_theme_mod('ecommerce_solution_atag_color', '');
	$ecommerce_solution_atag_font_family = get_theme_mod('ecommerce_solution_atag_font_family', '');
	// "li" tag
	$ecommerce_solution_li_color       = get_theme_mod('ecommerce_solution_li_color', '');
	$ecommerce_solution_li_font_family = get_theme_mod('ecommerce_solution_li_font_family', '');
	
	// H1
	$ecommerce_solution_h1_color       = get_theme_mod('ecommerce_solution_h1_color', '');
	$ecommerce_solution_h1_font_family = get_theme_mod('ecommerce_solution_h1_font_family', '');
	$ecommerce_solution_h1_font_size   = get_theme_mod('ecommerce_solution_h1_font_size', '');

	// H2
	$ecommerce_solution_h2_color       = get_theme_mod('ecommerce_solution_h2_color', '');
	$ecommerce_solution_h2_font_family = get_theme_mod('ecommerce_solution_h2_font_family', '');
	$ecommerce_solution_h2_font_size   = get_theme_mod('ecommerce_solution_h2_font_size', '');
	// H3
	$ecommerce_solution_h3_color       = get_theme_mod('ecommerce_solution_h3_color', '');
	$ecommerce_solution_h3_font_family = get_theme_mod('ecommerce_solution_h3_font_family', '');
	$ecommerce_solution_h3_font_size   = get_theme_mod('ecommerce_solution_h3_font_size', '');
	// H4
	$ecommerce_solution_h4_color       = get_theme_mod('ecommerce_solution_h4_color', '');
	$ecommerce_solution_h4_font_family = get_theme_mod('ecommerce_solution_h4_font_family', '');
	$ecommerce_solution_h4_font_size   = get_theme_mod('ecommerce_solution_h4_font_size', '');
	// H5
	$ecommerce_solution_h5_color       = get_theme_mod('ecommerce_solution_h5_color', '');
	$ecommerce_solution_h5_font_family = get_theme_mod('ecommerce_solution_h5_font_family', '');
	$ecommerce_solution_h5_font_size   = get_theme_mod('ecommerce_solution_h5_font_size', '');
	// H6
	$ecommerce_solution_h6_color       = get_theme_mod('ecommerce_solution_h6_color', '');
	$ecommerce_solution_h6_font_family = get_theme_mod('ecommerce_solution_h6_font_family', '');
	$ecommerce_solution_h6_font_size   = get_theme_mod('ecommerce_solution_h6_font_size', '');


	$ecommerce_solution_custom_css = '
		p,span{
		    color:'.esc_html($ecommerce_solution_paragraph_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_paragraph_font_family).';
		    font-size: '.esc_html($ecommerce_solution_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($ecommerce_solution_atag_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_atag_font_family).';
		}
		li{
		    color:'.esc_html($ecommerce_solution_li_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_li_font_family).';
		}
		h1{
		    color:'.esc_html($ecommerce_solution_h1_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h1_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($ecommerce_solution_h2_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h2_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($ecommerce_solution_h3_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h3_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($ecommerce_solution_h4_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h4_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($ecommerce_solution_h5_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h5_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($ecommerce_solution_h6_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h6_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h6_font_size).'!important;
		}
	';
	wp_add_inline_style('ecommerce-solution-basic-style', $ecommerce_solution_custom_css);

	/* Theme Color sheet */
	require get_parent_theme_file_path( '/theme-color-option.php' );
	wp_add_inline_style( 'ecommerce-solution-basic-style',$ecommerce_solution_custom_css );
	wp_enqueue_script( 'tether-js', esc_url(get_template_directory_uri()) . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'ecommerce-solution-custom-scripts-jquery', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecommerce_solution_scripts' );

define('ECOMMERCE_SOLUTION_LIVE_DEMO',__('https://buywptemplates.com/bwt-ecommerce-solution-pro/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_BUY_PRO',__('https://www.buywptemplates.com/themes/ecommerce-wordpress-template/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_PRO_DOC',__('https://www.buywptemplates.com/demo/docs/bwt-ecommerce-solution-pro/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_FREE_DOC',__('https://buywptemplates.com/demo/docs/free-bwt-ecommerce-solution/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_PRO_SUPPORT',__('https://www.buywptemplates.com/support/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_FREE_SUPPORT',__('https://wordpress.org/support/theme/ecommerce-solution/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_CREDIT',__('https://www.buywptemplates.com/themes/free-ecommerce-wordpress-template/', 'ecommerce-solution'));

if ( ! function_exists( 'ecommerce_solution_credit' ) ) {
	function ecommerce_solution_credit(){
		echo "<a href=".esc_url(ECOMMERCE_SOLUTION_CREDIT).">".esc_html__('Ecommerce WordPress Theme','ecommerce-solution')."</a>";
	}
}

function ecommerce_solution_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function ecommerce_solution_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
function ecommerce_solution_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function ecommerce_solution_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function ecommerce_solution_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function ecommerce_solution_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
* Switch sanitization
*/
if ( ! function_exists( 'ecommerce_solution_switch_sanitization' ) ) {
	function ecommerce_solution_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 * Integer sanitization
 */
if ( ! function_exists( 'ecommerce_solution_sanitize_integer' ) ) {
	function ecommerce_solution_sanitize_integer( $input ) {
		return (int) $input;
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ecommerce_solution_loop_columns');
if (!function_exists('ecommerce_solution_loop_columns')) {
	function ecommerce_solution_loop_columns() {
		$columns = get_theme_mod( 'ecommerce_solution_per_columns', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'ecommerce_solution_shop_per_page', 20 );
function ecommerce_solution_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'ecommerce_solution_product_per_page', 9 );
	return $cols;
}

//Display the related posts
if ( ! function_exists( 'ecommerce_solution_related_posts' ) ) {
	function ecommerce_solution_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => absint( get_theme_mod( 'ecommerce_solution_related_posts_count_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'ecommerce_solution_related_posts_taxanomies', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'ecommerce_solution_related_posts_taxanomies', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

function ecommerce_solution_enable_post_featured_image(){
	if(get_theme_mod('ecommerce_solution_post_featured_image') == 'Image' ) {
		return true;
	}
	return false;
}

function ecommerce_solution_post_color_enabled(){
	if(get_theme_mod('ecommerce_solution_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

function ecommerce_solution_enable_post_image_custom_dimention(){
	if(get_theme_mod('ecommerce_solution_post_featured_image_dimention') == 'Custom' ) {
		return true;
	}
	return false;
}

function ecommerce_solution_show_post_color(){
	if(get_theme_mod('ecommerce_solution_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Customizer file. */
require get_template_directory() . '/inc/customizer.php';

/* Get Started */
require get_template_directory() . '/inc/dashboard/get_started_info.php';

/* About Widget */
require get_template_directory() . '/inc/about.php';

/* Contact Widget */
require get_template_directory() . '/inc/contact.php';