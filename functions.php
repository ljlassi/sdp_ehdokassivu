<?php

/**
 * Functions.php contains all of the themes functions.
 */


/**
 * Load WP_Bootstrap_Navwalker
 */


if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

/**
 * Add support for the title tag, after which it can be used by e.g. plugins also.
 */

function sdp_ehdokassivu_wp_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'sdp_ehdokassivu_wp_setup' );

/**
 * Add ability fo the user to change the banner image, load default if none specified.
 */

function sdp_ehdokassivu_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . '/img/banner.jpg',
        'default-text-color' => '000',
        'width'              => 1920,
        'height'             => 505,
        'flex-width'         => false,
        'flex-height'        => false,
        // Enable upload of image file in admin
        'uploads'       => true,
        // function to be called in theme head section
        //'wp-head-callback'      => 'wphead_cb',
        //  function to be called in preview page head section
        //'admin-head-callback'       => 'adminhead_cb',
        // function to produce preview markup in the admin screen
        //'admin-preview-callback'    => 'adminpreview_cb'
    );

    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'sdp_ehdokassivu_custom_header_setup' );

/**
 * Switch the obsolete WP default jquery version to the newest (which is required by boostrap),
 * only applies to theme itself, does not affect the dashboard.
 */

function sdp_ehdokassivu_switch_jquery() {
    wp_deregister_script( 'jquery' );
    $dependencies = array();
    wp_register_script('jquery', get_template_directory_uri().'/node_modules/jquery/dist/jquery.min.js', $dependencies, '3.4.1');
}

add_action( 'wp_enqueue_scripts', 'sdp_ehdokassivu_switch_jquery', 3 );

/**
 * Load the js scripts needed in <head>.
 */

function sdp_ehdokassivu_enqueue_scripts() {
    $dependencies = array();
    //wp_enqueue_script('jquery-4', get_template_directory_uri().'/node_modules/jquery/dist/jquery.min.js', $dependencies, '3.4.1', true );
    wp_enqueue_script('popper.js', get_template_directory_uri().'/node_modules/popper.js/dist/umd/popper.min.js', $dependencies, '1.15.0', true );
    $dependencies = array('jquery', 'popper.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', $dependencies, '4.3.1', true );
    /*$dependencies = array('jquery', 'popper.js', 'bootstrap');
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', $dependencies, '4.3.1', false );*/
    $dependencies = null;
}

add_action( 'wp_enqueue_scripts', 'sdp_ehdokassivu_enqueue_scripts', 5 );

/**
 * Load CSS files in head.
 */

function sdp_ehdokassivu_enqueue_styles() {
    $dependencies = array();
    wp_enqueue_style('bootstrap-cs', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', true );
    wp_enqueue_style( 'sdp_ehdokassivu-style', get_stylesheet_uri(), $dependencies, rand(1, 1000));

}

add_action( 'wp_enqueue_scripts', 'sdp_ehdokassivu_enqueue_styles', 10 );

/**
 * Register primary menu
 */

function register_my_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'sdp_ehdokassivu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

/**
 * Specify and load right sidebar, allow widgets.
 */

function right_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Right', 'sdp_ehdokassivu' ),
            'id' => 'right-side-bar',
            'description' => __( 'Right sidebar', 'sdp_ehdokassivu' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'right_sidebar' );

/**
 * Specify and load left footer widget area.
 */

function footer_left_widget_area() {
    register_sidebar(
        array (
            'name' => __( 'Footer-Left', 'sdp_ehdokassivu' ),
            'id' => 'footer-left-widget-area',
            'description' => __( 'Left footer widget area', 'sdp_ehdokassivu' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'footer_left_widget_area' );

/**
 * Specify and load middle footer widget area.
 */

function footer_middle_widget_area() {
    register_sidebar(
        array (
            'name' => __( 'Footer-Middle', 'sdp_ehdokassivu' ),
            'id' => 'footer-middle-widget-area',
            'description' => __( 'Middle footer widget area', 'sdp_ehdokassivu' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'footer_middle_widget_area' );

/**
 * Specify and load right footer widget area.
 */

function footer_right_widget_area() {
    register_sidebar(
        array (
            'name' => __( 'Footer-Right', 'sdp_ehdokassivu' ),
            'id' => 'footer-right-widget-area',
            'description' => __( 'Right footer widget area', 'sdp_ehdokassivu' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'footer_right_widget_area' );

/**
 * Allow the user to decide between blog and static homepage.
 */

function sdp_ehdokassivu_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'sdp_ehdokassivu_front_page_template' );

/**
 *  Only show pagination if posts do not fit into one page (if there are less than 10 posts.
 */

function show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 35);
}

function sdp_ehdokassivu_add_excerpt_support_for_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'sdp_ehdokassivu_add_excerpt_support_for_pages' );

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 700, 270, true ); // default Featured Image dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 700, 9999 ); // 300 pixels wide (and unlimited height)
}


?>