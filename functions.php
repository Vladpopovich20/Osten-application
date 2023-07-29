<?php
/**
 * osten functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package osten
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
function osten_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on osten, use a find and replace
		* to change 'osten' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'osten', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'osten' ),
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
			'osten_custom_background_args',
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
add_action( 'after_setup_theme', 'osten_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function osten_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'osten_content_width', 640 );
}
add_action( 'after_setup_theme', 'osten_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function osten_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'osten' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'osten' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'osten_widgets_init' );

/**
 * Enqueue scripts and styles. 
 */

function osten_scripts() {


	wp_enqueue_style( 'osten-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'osten-style', 'rtl', 'replace' );

//====================== Підключення стилів =============================== // 
wp_enqueue_style('osten-bootstrap-min', get_template_directory_uri().'/assets/css/open-iconic-bootstrap.min.css',array(), _S_VERSION);

wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), _S_VERSION);

wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css', array(), _S_VERSION);

wp_enqueue_style('icomoon', get_template_directory_uri() . '/assets/css/icomoon.css', array(), _S_VERSION);

wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), _S_VERSION);

 /*=============================ГОЛОВНІ СТИЛІ в  general.css==========================*/
wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/styles.css', array(), _S_VERSION);

wp_enqueue_style('fonts-1', 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900');

wp_enqueue_style('fonts-2', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700');
//====================== Підключення стилів =============================== // 



//====================== Підключення скриптів =============================== // 
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-3.0.1.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'js-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );


	//====================== Підключення скриптів =============================== // 
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'osten_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */

if ( class_exists( 'WooCommerce' ) ) {
//====== Підключення WooCommerce функцій ====== //
require get_template_directory() . '/inc/woocommerce-settings.php';
}


/*завантаження svg*/
add_filter( 'upload_mimes', 'svg_upload_allow' );

 // Добавляє SVG у список дозволених для завантаження файлів.
function svg_upload_allow( $mimes ) {
  $mimes['svg']  = 'image/svg+xml';

  return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Виправлення типу MIME для файлів SVG.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

  // WP 5.1 +
  if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
    $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
  else
    $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип був обнулений, поправим його
  // а також перевіряємо право користувача
  if( $dosvg ){

    // дозвіл
    if( current_user_can('manage_options') ){

      $data['ext']  = 'svg';
      $data['type'] = 'image/svg+xml';
    }
    // заборона
    else {
      $data['ext'] = $type_and_ext['type'] = false;
    }

  }
  return $data;
}

/*завантаження svg*/

/*меню*/
add_action('after_setup_theme','OstenMenu');
	function OstenMenu(){
 		register_nav_menu('top','Menu in header');
		register_nav_menu('bottom', 'Menu in footer');
		register_nav_menu('bottom_two', 'Menu in footer next');
}


// Для створення налаштувань для футера щоб виводилося на всіх сторінках
if( function_exists('acf_add_options_page') ) {

	// Add parent.
acf_add_options_page(array(
		'page_title'  => __('Theme General Settings'),
		'menu_title'  => __('Theme Settings'),
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
	));

	// Add sub page.
 acf_add_options_page(array(
		'page_title'  => __('Settings footer'),
		'menu_title'  => __('footer'),
		'parent_slug' => 'theme-general-settings',
	));
}

