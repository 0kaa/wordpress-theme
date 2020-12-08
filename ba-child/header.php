<?php

/**
 * The template for displaying the header
 *
 */
defined('ABSPATH') || exit; // Exit if accessed directly 
$page_opt           = get_post_meta(get_queried_object_id(), 'page_opt', true);
$header_type        = (!empty($page_opt['header_type'])    && !is_archive() && !is_search()) ? $page_opt['header_type'] : '';
$remove_m_p         = (!empty($page_opt['remove_m_p'])     && !is_archive() && !is_search()) ? 'mb-0' : '';
$wc_categories_menu = (!empty(ba_option('wc_categories_menu'))) ? 'mb-0' : 'shadow-sm';
$fix_trans          = (!empty(ba_option('wc_categories_menu')) && isset($page_opt['header_type']) && $page_opt['header_type'] == 'header-transparent') ? 'fix-trans' : '';

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo ((ba_option('favicon', 'url') != '')) ? '<link id="favicon" rel="shortcut icon" href="' . ba_option('favicon', 'url') . '" type="image/png" />' : ''; ?>

    <?php echo ((ba_option('sec_color') != '')) ? '<meta name="theme-color" content="' . ba_option('sec_color') . '" />' : ''; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- header start -->
    <header class="header-area clearfix">
        <div class="header-top">

            <div class="container">
                <div class="border-bottom-1">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="welcome-area">
                                <p><?php echo ba_option('welcome_message'); ?> </p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <?php BA_nav_menu('topbar', 'top-bar', 'primary-menu MOB_NONE f-right'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom transparent-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-6">
                        <?php BA_logo(); ?>
                    </div>
                    <div class="col-lg-9 col-md-8 col-6">

                        <div class="header-bottom-right">
                            <nav id="AE_primary_nav" class="d-flex primary-nav align-items-center" aria-label="Primary Navigation">
                                <?php BA_nav_menu('primary', 'primary_menu', 'primary-menu MOB_NONE '); ?>
                            </nav>
                            <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) :
                                AE_shopping_cart();
                            endif; ?>
                            <?php echo (wp_is_mobile()) ? '<button class="menu-toggle-btn p-action-click sbt-click" data-toggle="sbt" data-target="#menu-toggle" data-classes="sbt-active"><i class="fas fa-bars"></i></button>' : '' ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="wrapper-inner">
            <div id="content" class="site-content">