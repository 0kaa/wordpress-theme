<?php

/**
 * Functions which enhance the theme Menu
 *
 */

defined('ABSPATH') || exit;
// Exit if accessed directly

/*
* Navigation
*/
if (!function_exists('BA_nav_menu')) {
    function BA_nav_menu($navigation, $id, $class)
    {
        if (has_nav_menu($navigation)) {
            wp_nav_menu(array(
                'theme_location' => $navigation,
                'container' => '',
                'container_class' => '',
                'menu_id' => $id,
                'menu_class' => $class,
            ));
        } else {
            echo '<a class="d-block" href="' . admin_url('nav-menus.php') . '" target="_blank">Make New Menu</a>';
        }
    }
}

add_filter('nav_menu_css_class', 'BA_nav_menu_class', 10, 2);
function BA_nav_menu_class($classes, $item)
{
    $classes[] = 'p-action-click';
    return $classes;
}

/*
* Add arrow icon to menu has childern.
*/
add_filter('walker_nav_menu_start_el', 'BA_primary_nav_add_arrow', 10, 4);

function BA_primary_nav_add_arrow($output, $item, $depth, $args)
{

    if ('primary' == $args->theme_location && $depth === 0) {
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '<span class="arrow"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>';
        }
    }
    return $output;
}

/*
* Add arrow icon to menu has childern.
*/

add_filter('wp_nav_menu_items', 'add_loginout_link', 10, 2);
function add_loginout_link($items, $args)
{
    if ($args->theme_location == 'topbar') {
        if (is_user_logged_in()) {
            $items .= '<li><a href="' . wp_logout_url(home_url()) . '">Logout</a></li>';
        } else {
            $reg = (!is_rtl()) ? 'Register' : 'تسجيل دخول' . '';
            $log = (!is_rtl()) ? 'Login' : 'دخول';
            $items .= '<li class="wc-myaccount">';
            $items .= '<a title="' . $reg . '" href="' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '">' . $reg . '</a>';
            $items .= '</li>';

            $items .= '<li class="wc-myaccount">';
            $items .= '<a href="' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '" title="' . $log . '">' . $log . '</a>';
            $items .= '</li>';
        }
    }
    return $items;
}
// Language switcher
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 9, 2);
function new_nav_menu_items($items, $args)
{
    $languages = apply_filters('wpml_active_languages', NULL, 'skip_missing=1');
    if ($languages && $args->theme_location == 'primary' || $args->theme_location == 'secondary') {

        if (!empty($languages)) {

            foreach ($languages as $l) {
                if (!$l['active']) {
                    // flag with native name
                    $items = $items . '<li class="menu-item lang-switch"><a href="' . $l['url'] . '">' . $l['native_name'] . '</a></li>';
                }
            }
        }
    }

    return $items;
}
