<?php

/**
 * Store the theme's directory path and uri in constants
 */
define('THEME_DIR_PATH', get_template_directory());
define('THEME_DIR_URI', get_template_directory_uri());

/**
 * Load custom WordPress nav walker.
 */
if (!class_exists('wp_bootstrap_navwalker')) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}
/**
 * Setup theme
 */
if (!function_exists('_custom_setup')) :

    function _custom_setup()
    {


        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'top-menu' => esc_html__('Top Menu', '_simpletheme'),
            'bottom-menu' => esc_html__('Bottom Menu', '_simpletheme'),
        ));


        /**
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support('post-thumbnails');

        /**
         * Enable supports for Custom Logo
         */
        add_theme_support('custom-logo');

    }
endif; // _custom_setup
add_action('after_setup_theme', '_custom_setup');

/**
 * Add scripts & css
 */
function custom_theme_scripts()
{
    // Load css
    wp_enqueue_style('style-css', get_stylesheet_uri());
    wp_enqueue_style('_main-styles', THEME_DIR_URI . '/dist/css/main.min.css', false, time());

    // Load js
    /*if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }*/
    wp_enqueue_script('_main-js', THEME_DIR_URI . '/dist/main.min.js', array('jquery'), time());
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');



