<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/*
 * Set Content Width
 */
if (!isset($content_width)) {
	$content_width = 715;
}

/*
 * Theme Setup
 */
if (!function_exists('BA_setup')) {
	function BA_setup() {

        load_theme_textdomain('ba', get_template_directory() . '/languages');

        add_theme_support('html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption'));

		add_theme_support('woocommerce');
		add_theme_support('custom-header');
		add_theme_support('automatic-feed-links');
        add_theme_support( 'post-formats', array(
            'video',
            'audio' ));
        add_theme_support('align-wide');
        add_theme_support('align-full');
		add_theme_support('title-tag');
		add_theme_support('custom-logo');
		add_theme_support('editor-style');
		add_theme_support('responsive-embeds');
        add_theme_support( 'custom-background' );
        add_editor_style( 'custom-editor-style.css' );

		/*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support('post-thumbnails');
        add_image_size( 'post-small', 450, 350, true );
        add_image_size( 'post-thumb', 450, 9999, false );
        add_image_size( 'post-large', 1240, 9999, false );
        add_image_size( 'post-single', 1240, 640, true );


		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(array(
			'primary'        => 'Primary',
			'secondary'      => 'Secondary',
            'footer'         => 'Footer',
            'wc_menu'        => 'Woocommerce Bar',
		));
	}
}
add_action('after_setup_theme', 'BA_setup');


