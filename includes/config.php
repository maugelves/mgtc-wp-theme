<?php

/** Disable the Admin Bar in the frontend **/
add_filter('show_admin_bar', '__return_false');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function mgtc_after_setup_theme(){

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mgtc-theme, use a find and replace
	 * to change 'mgtc-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mgtc', get_template_directory() . '/languages' );


    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Enable support for Logo
     *
     * @link https://developer.wordpress.org/themes/functionality/custom-logo/
     */
    add_theme_support( 'custom-logo' );


    // This theme uses wp_nav_menu() in many locations.
    register_nav_menus( array(
	    'main-menu'             => esc_html__( 'Primary', 'mgtc' ),
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


    // 3. (Opcional) Ocultar el menú de ACF en el administrador de WordPress
    if( !defined( 'WP_DEVELOPMENTMODE' ) || false == WP_DEVELOPMENTMODE )
	    add_filter('acf/settings/show_admin', '__return_false');


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mgtc_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


	// Create Sidebars zones
	$args = array(
		'name'          => __( 'Sidebar', 'mgtc' ),
		'id'            => 'mgtc-sidebar',
		'description'   => 'Sidebar for internal pages',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);
	register_sidebar( $args );

	$args = array(
		'name'          => __( 'Footer Column 1', 'mgtc' ),
		'id'            => 'mgtc-footer-column-1',
		'description'   => 'Zone for the first column in the footer',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);
	register_sidebar( $args );

	$args = array(
		'name'          => __( 'Footer Column 2', 'mgtc' ),
		'id'            => 'mgtc-footer-column-2',
		'description'   => 'Zone for the first column in the footer',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);
	register_sidebar( $args );

	$args = array(
		'name'          => __( 'Footer Column 3', 'mgtc' ),
		'id'            => 'mgtc-footer-column-3',
		'description'   => 'Zone for the first column in the footer',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);
	register_sidebar( $args );

}
add_action( 'after_setup_theme', 'mgtc_after_setup_theme' );




function mgtc_custom_upload_mimes( $existing_mimes = array() ) {
	// Add the file extension to the array
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}
add_filter( 'upload_mimes', 'mgtc_custom_upload_mimes' );