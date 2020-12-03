<?php
/**
 * Theme functions and definitions
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/*
 * Theme Call Options
 */
if (!function_exists('ba_option')) {
	function ba_option($option = '', $params = null, $default = null) {
		// Attention: Its your unique id of the framework
		$options = get_option('ba');
		if ($params != null) {
			return (isset($options[$option][$params])) ? $options[$option][$params] : $default;
		}
		return (isset($options[$option])) ? $options[$option] : $default;
	}
}

/*
 * Define Constants
 */
define( 'BA_DB_VERSION',    '1.0.0' );
define( 'BA_THEME_SLUG',    'ba' );
define( 'BA_TEXTDOMAIN',    'ba' );
define( 'BA_TEMPLATE_PATH', get_template_directory() );
define( 'BA_TEMPLATE_URL',  get_template_directory_uri() );

locate_template( 'inc/enqueue.php',                    true, true );
locate_template( 'inc/setup.php',                      true, true );
locate_template( 'inc/metabox.php',                    true, true );
locate_template( 'inc/functions/contact_info.php',     true, true );
locate_template( 'inc/functions/social_icons.php',     true, true );
locate_template( 'inc/functions/post_type.php',        true, true );
locate_template( 'inc/functions/logo.php',             true, true );
locate_template( 'inc/functions/pagination.php',       true, true );
locate_template( 'inc/functions/sidebar.php',          true, true );
locate_template( 'inc/functions/breadcrumbs.php',      true, true );
locate_template( 'inc/functions/menu.php',             true, true );
locate_template( 'inc/functions/catgories_loop.php',   true, true );
locate_template( 'inc/functions/taxonomy.php',         true, true );
locate_template( 'inc/css.php',                        true, true );
locate_template( 'inc/int.php',                        true, true );
locate_template( 'inc/option.php',                     true, true );
locate_template( 'inc/megamenu/index.php',             true, true );
locate_template( 'inc/tmg/options.php',                true, true );

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    locate_template( 'inc/functions/woocommerce.php',  true, true );
}

if (!function_exists('content_style')) {
	function content_style() {
        if(!empty(ba_option('grid_number') == 3 ) && !is_single()) {
            echo 'grid--3';
        } elseif(!empty(ba_option('grid_number') == 4 ) && !is_single() ) {
            echo 'grid--4';
        } else {
            echo '';
        }
    }
}