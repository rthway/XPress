<?php
/**
 * XPress Theme Functions
 *
 * @package XPress
 */

// Theme Setup
function xpress_theme_setup() {
    // Add support for dynamic title tag
    add_theme_support('title-tag');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary'     => __('Primary Menu', 'XPress'),
        'social-menu' => __('Social Menu', 'XPress'),
        'footer'      => __('Footer Menu', 'XPress'),
    ));

    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => '#ffffff',
    ));
}
add_action('after_setup_theme', 'xpress_theme_setup');

// Enqueue Styles and Scripts
function xpress_enqueue_assets() {
    // Enqueue theme stylesheet
    wp_enqueue_style('xpress-style', get_stylesheet_uri());

    // Enqueue Google Fonts
    wp_enqueue_style('xpress-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null);

    // Enqueue Bootstrap CSS (optional)
    wp_enqueue_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css', array(), '5.3.0');

    // Enqueue Bootstrap JS (optional)
    wp_enqueue_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'xpress_enqueue_assets');

// Register Widget Areas
function xpress_register_sidebars() {
    register_sidebar(array(
        'name'          => __('Header Ad', 'XPress'),
        'id'            => 'header-ad',
        'description'   => __('Add widgets here for the header advertisement.', 'XPress'),
        'before_widget' => '<div class="header-widget">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 1', 'XPress'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here for Footer Column 1.', 'XPress'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'XPress'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here for Footer Column 2.', 'XPress'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 3', 'XPress'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here for Footer Column 3.', 'XPress'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 4', 'XPress'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here for Footer Column 4.', 'XPress'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ));
}
add_action('widgets_init', 'xpress_register_sidebars');

// Include Customizer Settings (Optional)
// require get_template_directory() . '/inc/customizer.php';
