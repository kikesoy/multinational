<?php
/**
 * WordPress Theme with Webpack and HMR functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

if ( ! function_exists( 'basic_bootstrap_theme_with_webpack_and_hmr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function basic_bootstrap_theme_with_webpack_and_hmr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WordPress Theme with Webpack and HMR, use a find and replace
		 * to change 'basic-bootstrap-theme-with-webpack-and-hmr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'basic-bootstrap-theme-with-webpack-and-hmr', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'medium', 800, 450, true );
		add_image_size( 'large', 1200, 675, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
			'menu-2' => esc_html__( 'Secondary', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
			'menu-footer' => esc_html__( 'Footer', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
			'menu-legal' => esc_html__( 'Footer Legal', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'basic_bootstrap_theme_with_webpack_and_hmr_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'basic_bootstrap_theme_with_webpack_and_hmr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function basic_bootstrap_theme_with_webpack_and_hmr_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'basic_bootstrap_theme_with_webpack_and_hmr_content_width', 640 );
}
add_action( 'after_setup_theme', 'basic_bootstrap_theme_with_webpack_and_hmr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function basic_bootstrap_theme_with_webpack_and_hmr_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Home Slider', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'id'            => 'home_slider',
		'description'   => esc_html__( 'Add widgets here.', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'before_widget' => '<article id="%1$s" class="carousel-item %2$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Banner', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'id'            => 'home_banner',
		'description'   => esc_html__( 'Add widgets here.', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'before_widget' => '<section id="%1$s" class="home-banner %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Auxiliar', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'id'            => 'footer_auxiliar',
		'description'   => esc_html__( 'Add widgets here.', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Social', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'id'            => 'footer_social',
		'description'   => esc_html__( 'Add widgets here.', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Ratings', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'id'            => 'footer_ratings',
		'description'   => esc_html__( 'Add widgets here.', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'basic_bootstrap_theme_with_webpack_and_hmr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function basic_bootstrap_theme_with_webpack_and_hmr_scripts() {
	//wp_enqueue_style( 'basic-bootsrap-theme-with-webpack-and-hmr-style', get_stylesheet_uri() );
	wp_deregister_script( 'jquery' );
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '20151215');
		wp_enqueue_script('jquery'); 
		wp_enqueue_script( 'basic-bootsrap-theme-with-webpack-and-hmr-fontawesome', 'https://kit.fontawesome.com/29a3dbe18e.js', array(), '20190709', true );
		wp_enqueue_script( 'basic-bootsrap-theme-with-webpack-and-hmr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
		wp_enqueue_script( 'basic-bootsrap-theme-with-webpack-and-hmr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
		if ( is_front_page()){
			wp_enqueue_script( 'basic-bootsrap-theme-with-webpack-and-hmr-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20190803', true );		
		}
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
    
    if (!defined('WP_ENVIRONMENT') || WP_ENVIRONMENT == "production")
    {
    	wp_enqueue_style( 'basic-bootsrap-theme-with-webpack-and-hmr-custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '20151215', 'screen');
        wp_register_script('basic-bootsrap-theme-with-webpack-and-hmr-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20151215', true);
        wp_enqueue_script('basic-bootsrap-theme-with-webpack-and-hmr-script');
    }
    else
    {
        wp_register_script('basic-bootsrap-theme-with-webpack-and-hmr-script', 'http://localhost:8080/assets/js/script.js', array(), '20151215', true);
        wp_enqueue_script('basic-bootsrap-theme-with-webpack-and-hmr-script');
    }
}
add_action( 'wp_enqueue_scripts', 'basic_bootstrap_theme_with_webpack_and_hmr_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/****************************************
* Add custom taxonomy for Products *
****************************************/

add_action('init', 'products_categories_register');

function products_categories_register() {
$labels = array(
	 'name'                          => 'Products Categories',
	 'singular_name'                 => 'Products Category',
	 'search_items'                  => 'Search Products Categories',
	 'popular_items'                 => 'Popular Products Categories',
	 'all_items'                     => 'All Products Categories',
	 'parent_item'                   => 'Parent Product Category',
	 'edit_item'                     => 'Edit Product Category',
	 'update_item'                   => 'Update Product Category',
	 'add_new_item'                  => 'Add New Product Category',
	 'new_item_name'                 => 'New Product Category',
	 'separate_items_with_commas'    => 'Separate Products categories with commas',
	 'add_or_remove_items'           => 'Add or remove Products categories',
	 'choose_from_most_used'         => 'Choose from most used Products categories'
	 );

$args = array(
	 'label'                         => 'Products Categories',
	 'labels'                        => $labels,
	 'public'                        => true,
	 'hierarchical'                  => true,
	 'show_ui'                       => true,
	 'show_in_nav_menus'             => true,
	 'show_in_rest' 								 => true,
	 'args'                          => array( 
		 'orderby' => 'term_order' 
		),
	 'rewrite'                       => array( 
		 'slug' => 'products', 
			'with_front' => true, 
			'hierarchical' => true 
		),
	 'query_var'                     => true
);

register_taxonomy( 'products_categories', array ('products'), $args );
}

/*****************************************
* Add custom post type for Products *
*****************************************/

add_action('init', 'products_register');

function products_register() {

	 $labels = array(
			 'name' => 'Products',
			 'singular_name' => 'Product',
			 'add_new' => 'Add New',
			 'add_new_item' => 'Add New Product',
			 'edit_item' => 'Edit Product',
			 'new_item' => 'New Product',
			 'view_item' => 'View Product',
			 'search_items' => 'Search Products',
			 'not_found' =>  'Nothing found',
			 'not_found_in_trash' => 'Nothing found in Trash',
			 'parent_item_colon' => ''
	 );

	 $args = array(
			 'labels' => $labels,
			 'public' => true,
			 'publicly_queryable' => true,
			 'show_ui' => true,
			 'query_var' => true,
			 'has_archive' => true,
			 'rewrite' => array( 'slug' => 'products', 'with_front' => true ),
			 'capability_type' => 'post',
			 'menu_position' => 6,
			 'show_in_rest' => true,
			 'supports' => array('title', 'description','author','excerpt', 'editor','thumbnail','custom-fields'),
			 'taxonomies' => array('products_categories','products'),
		 );

	 register_post_type( 'products' , $args );
}
add_action( 'init', 'products_register' );

/*
 * custom pagination with bootstrap .pagination class
 * source: http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/
 */
function bootstrap_pagination( $echo = true ) {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'   => true,
			'prev_text'    => __('« Prev'),
			'next_text'    => __('Next »'),
		)
	);

	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination = '<ul class="pagination">';

		foreach ( $pages as $page ) {
			$pagination .= '<li class="page-item">'.$page.'</li>';
		}

		$pagination .= '</ul>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
}
