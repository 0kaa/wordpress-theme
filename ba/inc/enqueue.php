<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly

/*
 * Include CSS & JS
 */
if (!function_exists('BA_styles')) {
    function BA_styles()
    {

        if (is_singular()) {
            wp_enqueue_script('comment-reply');
        }

        if (is_rtl()) {
            wp_enqueue_style('BA_bootstrap_rtl_css',   BA_TEMPLATE_URL . '/dist/css/bootstrap-rtl.min.css');
        } else {
            wp_enqueue_style('BA_bootstrap_css',       BA_TEMPLATE_URL . '/dist/css/bootstrap.min.css');
        }

        // wp_enqueue_script('BA_popper',      BA_TEMPLATE_URL . '/dist/js/popper.min.js',     array('jquery'), '1.0.0', true);
        // wp_enqueue_script('BA_bootstrap',   BA_TEMPLATE_URL . '/dist/js/bootstrap.min.js',  array('jquery'), '4.5.2', true);

        if (!empty(ba_option('lightcase'))) {
            wp_enqueue_script('lightcase_js',   BA_TEMPLATE_URL . '/dist/js/lightcase.min.js',      array('jquery'), '1.0.1', true);
        }

        if (!empty(ba_option('wow_js'))) {
            wp_enqueue_script('wow_js',         BA_TEMPLATE_URL . '/dist/js/wow.min.js',        array('jquery'), '1.0.1', true);
            // wp_enqueue_style('wow_CSs',        BA_TEMPLATE_URL . '/dist/css/animate.min.css');
        }

        wp_enqueue_script('masonry');
        // wp_enqueue_script('BA_sticky',      BA_TEMPLATE_URL . '/dist/js/sticky.min.js',     array('jquery'), '1.0.0', true);
        // wp_enqueue_script('BA_owl',         BA_TEMPLATE_URL . '/dist/js/owl.min.js',        array('jquery'), '1.0.0', true);
        wp_enqueue_script('BA_init',        BA_TEMPLATE_URL . '/dist/js/init.min.js',       array('jquery'), '1.0.0', true);
    }
}

add_action('wp_enqueue_scripts', 'BA_styles');


add_filter('style_loader_tag', 'BA_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'BA_remove_type_attr', 10, 2);

function BA_remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

if (!function_exists('your_prefix_enqueue_fa5')) {
    function your_prefix_enqueue_fa5()
    {
        wp_enqueue_style('fa5',          '//use.fontawesome.com/releases/v5.13.0/css/all.css',         array(), '5.13.0', 'all');
        wp_enqueue_style('fa5-v4-shims', '//use.fontawesome.com/releases/v5.13.0/css/v4-shims.css',    array(), '5.13.0', 'all');
    }
    add_action('wp_enqueue_scripts', 'your_prefix_enqueue_fa5');
}
