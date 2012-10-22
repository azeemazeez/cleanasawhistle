<?php
/**
 * Clean as a whistle functions and definitions
 *
 * @package Clean as a whistle
 * @since Clean as a whistle 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Clean as a whistle 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'clean_as_a_whistle_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Clean as a whistle, use a find and replace
	 * to change 'clean_as_a_whistle' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'clean_as_a_whistle', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'clean_as_a_whistle' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // clean_as_a_whistle_setup
add_action( 'after_setup_theme', 'clean_as_a_whistle_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Clean as a whistle 1.0
 */
function clean_as_a_whistle_sidebar_1() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'clean_as_a_whistle' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'clean_as_a_whistle_sidebar_1' );

function clean_as_a_whistle_sidebar_2() {
	register_sidebar( array(
		'name' => __( 'Sidebar2', 'clean_as_a_whistle' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'clean_as_a_whistle_sidebar_2' );

/**
 * Enqueue scripts and styles
 */
function clean_as_a_whistle_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'clean_as_a_whistle_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
