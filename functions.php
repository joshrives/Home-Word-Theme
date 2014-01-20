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
	add_theme_support( 'custom-background', apply_filters( 'homeword_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
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
  echo '<div class="general-content">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}
add_theme_support( 'woocommerce' );
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