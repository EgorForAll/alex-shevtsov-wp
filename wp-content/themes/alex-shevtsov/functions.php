<?php
/**
 * alex-shevtsov functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alex-shevtsov
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alex_shevtsov_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on alex-shevtsov, use a find and replace
		* to change 'alex-shevtsov' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'alex-shevtsov', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'alex-shevtsov' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'alex_shevtsov_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'alex_shevtsov_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alex_shevtsov_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alex_shevtsov_content_width', 640 );
}
add_action( 'after_setup_theme', 'alex_shevtsov_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alex_shevtsov_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'alex-shevtsov' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'alex-shevtsov' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'alex_shevtsov_widgets_init' );

add_action('wp_enqueue_scripts', 'adc_theme_scripts');
function adc_theme_scripts() {
		wp_enqueue_script('bootsrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', NULL, NULL, true);
	wp_enqueue_style('main-css', get_template_directory_uri().'/css/main.8bdb8b7817b4e977dfb2.css', array(), null);

}


function js_includer() {   
  wp_register_script('your_js_id',  get_template_directory_uri().'/js/main.dae31120cdd248bbf403.bundle.js'); 
		wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', NULL, NULL, true);
	wp_enqueue_script('dom_js', get_template_directory_uri().'/js/dom.js', NULL, NULL, true);
	wp_enqueue_script('validation_js', get_template_directory_uri().'/js/validation.js', NULL, NULL, true);
	wp_enqueue_script('server_js', get_template_directory_uri().'/js/server.js', NULL, NULL, true);
  wp_enqueue_script('your_js_id');    
}

add_action( 'admin_enqueue_scripts', 'js_includer' ); 
add_action( 'wp_enqueue_scripts', 'js_includer' ); 

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_textarea*', 'custom_textarea_validation_filter', 20, 2 );
  
function custom_text_validation_filter( $result, $tag ) {
  if ( 'client' == $tag->name ) {
	if (isset( $_POST['client']) && (str_contains( $_POST['client'], '<') || str_contains( $_POST['client'], '"'))) {
		 $result->invalidate( $tag, "Некорректное имя пользователя" );
    }
  }
	if ( 'client-phone' == $tag->name ) {
	if (isset( $_POST['client-phone']) && (str_contains( $_POST['client-phone'], '<') || str_contains( $_POST['client-phone'], '"') || !preg_match('/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/', $_POST['client-phone']))) {
		 $result->invalidate( $tag, "Некорректный телефон" );
    } 

  }
	  return $result;
}

/**
 * Enqueue scripts and styles.
 */
function alex_shevtsov_scripts() {
	wp_enqueue_style( 'alex-shevtsov-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'alex-shevtsov-style', 'rtl', 'replace' );

	wp_enqueue_script( 'alex-shevtsov-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alex_shevtsov_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

