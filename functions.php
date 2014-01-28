<?php
/**
 * Home Word functions and definitions
 *
 * @package Home Word
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'homeword_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function homeword_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Home Word, use a find and replace
	 * to change 'homeword' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'homeword', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'footer' => __( 'Footer Links', 'homeword' ),
		'families' => __( 'Familiy Menu', 'homeword' ),
		'church' => __( 'Church Leader Menu', 'homeword' ),
		'about' => __( 'About Us Menu', 'homeword' ),
	) );
	//Get variable at end of menu
	add_filter( 'wp_nav_menu_objects', 'add_var', 10, 2 );

function add_var( $items, $args ) {
    $out = array();
    if( $args->theme_location == 'families' ) {
    	foreach ( $items as $item ) {
	        if ( isset ( $item->url ) ) {
	        	$item->url .= '?cat=families';
	        }
			$out[] = $item;
	    }
    } elseif ( $args->theme_location == 'church' ) {
    	foreach ( $items as $item ) {
	        if ( isset ( $item->url ) ) {
	        	$item->url .= '?cat=church';
	        }
			$out[] = $item;
	    }

	} else {
    	$out = $items;
    }


    return $out;
}

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	add_theme_support( 'post-thumbnails' );

	// Setup the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'homeword_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif; // homeword_setup
add_action( 'after_setup_theme', 'homeword_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function homeword_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'homeword' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'homeword_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function homeword_scripts() {
	wp_enqueue_style( 'homeword-style', get_stylesheet_uri() );

	wp_enqueue_script( 'homeword-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'homeword-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'homeword_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/*Custom Taxonomy*/
add_action( 'init', 'create_tax' );
function create_tax() {
	register_taxonomy(
		'area',
		array('post', 'articles', 'devotionals'),
		array(
			'label' => __( 'Area' ),
			'rewrite' => array( 'slug' => 'area' ),
			'hierarchical' => true,
		)
	);
}
/*Custom Post Types*/
function create_post_type() {
	$articleArgs = array(
		'label'  => 'Articles',
		'labels' => array(
			'singular_name' => 'Article'
			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'taxonomies' => array('category', 'area'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author')
	);
	register_post_type( 'articles', $articleArgs );
	$devotionArgs = array(
		'label'  => 'Devotionals',
		'labels' => array(
			'singular_name' => 'Devotion'
			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'taxonomies' => array('category', 'area'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author')
	);
	register_post_type( 'devotionals', $devotionArgs );
	$sliderArgs = array(
		'label'  => 'Sliders',
		'labels' => array(
			'singular_name' => 'Slider'
			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'revisions', 'author')
	);
	register_post_type( 'sliders', $sliderArgs );
}
add_action( 'init', 'create_post_type' );
/*Rename Posts*/
function change_post_menu_label() {
    global $menu;
    $menu[5][0] = 'Culture Blog';
}
add_action( 'admin_menu', 'change_post_menu_label' );
/*Remove Tags*/
function remove_tags() {
	remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );
	remove_meta_box( 'postcustom', 'post', 'normal' );
	remove_meta_box( 'formatdiv', 'post', 'normal' );
}
add_action( 'admin_menu', 'remove_tags' );
/*Excerpt*/
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
remove_filter( 'the_excerpt', 'wpautop' );
function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}
/*WooCommerce*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="content-section">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}
add_theme_support( 'woocommerce' );
function change_product_layout() {

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count' );


	add_action( 'woocommerce_single_product_cart', 'woocommerce_template_single_price', 20 );
	add_action( 'woocommerce_single_product_cart', 'woocommerce_template_single_add_to_cart', 25 );

}
add_action ('init', 'change_product_layout');
function woocommerce_quantity_input() {
    global $product;

	$defaults = array(
		'input_name'  	=> 'quantity',
		'input_value'  	=> '1',
		'max_value'  	=> apply_filters( 'woocommerce_quantity_input_max', '', $product ),
		'min_value'  	=> apply_filters( 'woocommerce_quantity_input_min', '', $product ),
		'step' 		=> apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
		'style'		=> apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
	);
	if ( ! empty( $defaults['min_value'] ) )
		$min = $defaults['min_value'];
	else $min = 1;

	if ( ! empty( $defaults['max_value'] ) )
		$max = $defaults['max_value'];
	else $max = 20;

	if ( ! empty( $defaults['step'] ) )
		$step = $defaults['step'];
	else $step = 1;

	$options = '';
	for ( $count = $min; $count <= $max; $count = $count+$step ) {
		$options .= '<option value="' . $count . '">' . $count . '</option>';
	}
	echo '<div class="quantity_select"><label>Qty:</label><span class="select-qty"><select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty">' . $options . '</select></span></div>';
}
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return 'http://homeword.com/shop';
}
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
	$defaults['home'] = 'Store';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' > ';
	return $defaults;
}
/***Author Fields***/
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {
	global $woocommerce, $post;
	echo '<div class="options_group">';
	// Author Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_author_field',
			'label'       => __( 'Author', 'woocommerce' ),
			'placeholder' => 'Name',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the name of the author or leave blank if there is none.', 'woocommerce' )
		)
	);
	// Publisher Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_publisher_field',
			'label'       => __( 'Publisher', 'woocommerce' ),
			'placeholder' => 'Name',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the name of the Publisher or leave blank if there is none.', 'woocommerce' )
		)
	);
	// Year Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_year_field',
			'label'       => __( 'Year Published', 'woocommerce' ),
			'placeholder' => 'YYYY',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the year it was published or leave blank if there is none.', 'woocommerce' )
		)
	);
	// Format Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_format_field',
			'label'       => __( 'Format', 'woocommerce' ),
			'placeholder' => 'Ex: Softcover',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the format the book is in or leave blank if there is none.', 'woocommerce' )
		)
	);
	// Pages Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_pages_field',
			'label'       => __( 'No. Pages', 'woocommerce' ),
			'placeholder' => '###',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the number of pages or leave blank if there is none.', 'woocommerce' )
		)
	);
	echo '</div>';
}
function woo_add_custom_general_fields_save( $post_id ){
	// Author Field
	$woocommerce_text_field = $_POST['_author_field'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, '_author_field', esc_attr( $woocommerce_text_field ) );
	// Publisher Field
	$woocommerce_publisher_field = $_POST['_publisher_field'];
	if( !empty( $woocommerce_publisher_field ) )
		update_post_meta( $post_id, '_publisher_field', esc_attr( $woocommerce_publisher_field ) );
	// Year Field
	$woocommerce_year_field = $_POST['_year_field'];
	if( !empty( $woocommerce_year_field ) )
		update_post_meta( $post_id, '_year_field', esc_attr( $woocommerce_year_field ) );
	// Format Field
	$woocommerce_format_field = $_POST['_format_field'];
	if( !empty( $woocommerce_format_field ) )
		update_post_meta( $post_id, '_format_field', esc_attr( $woocommerce_format_field ) );
	// Pages Field
	$woocommerce_pages_field = $_POST['_pages_field'];
	if( !empty( $woocommerce_pages_field ) )
		update_post_meta( $post_id, '_pages_field', esc_attr( $woocommerce_pages_field ) );
}
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );

// Our hooked in function - $address_fields is passed via the filter!
function custom_override_default_address_fields( $address_fields ) {
     $address_fields['address_2']['label'] = 'Address 2';

     return $address_fields;
}
/*Custom Post Type Archive*/
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'articles', 'devotionals'
		));
	  return $query;
	}
}
//add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
