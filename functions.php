<?php
/**
 * csu functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package csu
 */

if ( ! function_exists( 'csu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function csu_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on csu, use a find and replace
	 * to change 'csu' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'csu', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary', 'csu' ),
		'global_1' => esc_html__( 'Global Nav 1', 'csu' ),
		'global_2' => esc_html__( 'Global Nav 2', 'csu' ),
		'global_3' => esc_html__( 'Global Nav 3', 'csu' ),
		'footer'   => esc_html__( 'Footer', 'csu' )
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
	add_theme_support( 'custom-background', apply_filters( 'csu_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'csu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function csu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'csu_content_width', 640 );
}
add_action( 'after_setup_theme', 'csu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function csu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'csu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'csu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'csu_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/functions/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/functions/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/functions/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/functions/extras.php';

/**
 * Custom functions.
 */
require get_template_directory() . '/inc/functions/custom.php';

/**
 * Custom post types.
 */
require get_template_directory() . '/inc/functions/post-types.php';

/**
 * Custom taxonomies.
 */
require get_template_directory() . '/inc/functions/taxonomies.php';

/**
 * Custom blocks.
 */
require get_template_directory() . '/inc/functions/blocks.php';

/**
 * Custom widget areas.
 */
require get_template_directory() . '/inc/functions/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/functions/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/functions/jetpack.php';

/**
 * Custom admin functions.
 */
require get_template_directory() . '/inc/functions/admin.php';
