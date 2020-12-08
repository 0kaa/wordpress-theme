<?php
defined('ABSPATH') || exit; // Exit if accessed directly

add_action('wp_enqueue_scripts', 'ba_theme_child_styles_scripts', 80);
function ba_theme_child_styles_scripts()
{

	/* This style of theme */
	wp_enqueue_style('animate_style', get_stylesheet_directory_uri() . '/dist/sass/css/animate.css', '');
	wp_enqueue_style('chosen_min', get_stylesheet_directory_uri() . '/dist/sass/css/chosen.min.css', '');
	wp_enqueue_style('fontAwesome', get_stylesheet_directory_uri() . '/dist/sass/css/font-awesome.min.css', '');
	wp_enqueue_style('jquery_ui', get_stylesheet_directory_uri() . '/dist/sass/css/jquery-ui.css', '');
	wp_enqueue_style('meanmenu', get_stylesheet_directory_uri() . '/dist/sass/css/meanmenu.min.css', '');
	wp_enqueue_style('owlCarousel', get_stylesheet_directory_uri() . '/dist/sass/css/owl.carousel.min.css', '');
	wp_enqueue_style('simple-line-icons', get_stylesheet_directory_uri() . '/dist/sass/css/simple-line-icons.css', '');
	wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/dist/sass/css/slick.css', '');
	wp_enqueue_style('ionicons_css', get_stylesheet_directory_uri() . '/dist/sass/css/ionicons.min.css', '');
	wp_enqueue_style('ba_style', get_stylesheet_directory_uri() . '/dist/sass/css/style.css', '');
	wp_enqueue_style('responsive_css', get_stylesheet_directory_uri() . '/dist/sass/css/responsive.css', '');

	/* THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css */
	wp_enqueue_style('child_style', get_stylesheet_directory_uri() . '/style.css', '');

	/* Load the RTL.css file of the parent theme */
	if (is_rtl()) {
		wp_enqueue_style('child_rtl', get_template_directory_uri() . '/rtl.css', '');
	}
	/* Uncomment this line if you want to add custom javascript */
	wp_enqueue_script('modernizr_js', get_stylesheet_directory_uri() . '/dist/js/vendor/modernizr-2.8.3.min.js', '', false, true);
	wp_enqueue_script('jquery_js', get_stylesheet_directory_uri() . '/dist/js/vendor/jquery-1.12.0.min.js', '', false, true);
	wp_enqueue_script('popper_js', get_stylesheet_directory_uri() . '/dist/js/popper.js', '', false, true);
	wp_enqueue_script('bootstrap_js', get_stylesheet_directory_uri() . '/dist/js/bootstrap.min.js', '', false, true);
	wp_enqueue_script('isotope_js', get_stylesheet_directory_uri() . '/dist/js/isotope.pkgd.min.js', '', false, true);
	wp_enqueue_script('ajax_mail', get_stylesheet_directory_uri() . '/dist/js/ajax-mail.js', '', false, true);
	wp_enqueue_script('owl_carousel_js', get_stylesheet_directory_uri() . '/dist/js/owl.carousel.min.js', '', false, true);
	wp_enqueue_script('plugins_js', get_stylesheet_directory_uri() . '/dist/js/plugins.js', '', false, true);
	wp_enqueue_script('scripts_js', get_stylesheet_directory_uri() . '/dist/js/scripts.js', '', false, true);
	wp_enqueue_script('images_loaded_js', get_stylesheet_directory_uri() . '/dist/js/imagesloaded.pkgd.min.js', '', false, true);
	wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/dist/js/main.js', '', false, true);
}
