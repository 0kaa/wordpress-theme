<?php

/**
 * Logo
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly

if (!function_exists('BA_logo')) {
    function BA_logo()
    {

        if (!empty(ba_option('logo', 'url'))) {

            $home_url       = home_url();
            $logo           = '<img class="logo img-fluid" src="' . ba_option('logo', 'url') . '" alt="' . ba_option('logo', 'alt') . '" width="' . ba_option('logo', 'width') . '" height="' . ba_option('logo', 'height') . '"/>';
            $logo_sticky           = '<img class="img-fluid" src="' . ba_option('logo_sticky', 'url') . '" alt="' . ba_option('logo_sticky', 'alt') . '" width="' . ba_option('logo', 'width') . '" height="' . ba_option('logo', 'height') . '"/>';
            $logo_rtl       = '<img class="logo img-fluid" src="' . ba_option('logo_rtl', 'url') . '" alt="' . ba_option('logo_rtl', 'alt') . '" width="' . ba_option('logo_rtl', 'width') . '" height="' . ba_option('logo_rtl', 'height') . '"/>';
            $logo_sticky_rtl       = '<img class="img-fluid" src="' . ba_option('logo_sticky_rtl', 'url') . '" alt="' . ba_option('logo_sticky_rtl', 'alt') . '" width="' . ba_option('logo_rtl', 'width') . '" height="' . ba_option('logo_rtl', 'height') . '"/>';
            $logo_white     = '<img class="logo img-fluid" src="' . ba_option('logo_white', 'url') . '" alt="' . ba_option('logo_white', 'alt') . '" width="' . ba_option('logo_white', 'width') . '" height="' . ba_option('logo_white', 'height') . '"/>';
            $logo_white_rtl = '<img class="logo img-fluid" src="' . ba_option('logo_white_rtl', 'url') . '" alt="' . ba_option('logo_white_rtl', 'alt') . '" width="' . ba_option('logo_white_rtl', 'width') . '" height="' . ba_option('logo_white_rtl', 'height') . '"/>';

            $logo_width     = (wp_is_mobile()) ? ba_option('logo_mobile_width', 'width') : ba_option('logo_width', 'width');

            $logo_sticky_width    = ba_option('logo_sticky_width', 'width');

            $page_opt       = get_post_meta(get_queried_object_id(), 'page_opt', true);

            $header_type    = ((!empty($page_opt['header_type']))) ? $page_opt['header_type'] : '';

            $output  = '';

            $output .= '<div id="logo" class="image-logo d-flex align-items-center h-100" style="width:' . $logo_width . 'px">';

            $output .= '<a class="d-block" title="' . get_bloginfo('name') . '" href="' . $home_url . '">';

            // Desktop Logo
            if ($header_type == 'header-transparent' || $header_type == 'header-dark') {
                if (is_rtl()) {
                    $output .= $logo_white_rtl;
                } else {
                    $output .= $logo_white;
                }
            } else {
                if (is_rtl()) {
                    $output .= $logo_rtl;
                } else {
                    $output .= $logo;
                }
            }

            // // Sticky logo
            // if(is_rtl()) {
            //     $output .= '<div class="logo-sticky" style="width:'.$logo_sticky_width.'px">';
            //     $output .= $logo_sticky_rtl;
            //     $output .= '</div>';
            // } else {
            //     $output .= '<div class="logo-sticky" style="width:'.$logo_sticky_width.'px">';
            //     $output .= $logo_sticky;
            //     $output .= '</div>';
            // }

            if (is_home() && is_front_page()) {
                $output .= '<h1 class="h1-off">';
                $output .= get_bloginfo('name');
                $output .= '</h1>';
            }

            $output .= '</a>';
            $output .= '</div>';
        } else {
            $output = '<a title="' . get_bloginfo('name') . '" href="' . home_url() . '"><img class="default-logo" src="' . get_template_directory_uri() . '/dist/svg/logo.svg' . '" alt="logo"/></a>';
        }
        echo $output;
    }
}
