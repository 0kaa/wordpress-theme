<?php
/**
 * The template for displaying the header
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly 
$page_opt           = get_post_meta( get_queried_object_id(), 'page_opt', true );
$header_type        = ( !empty($page_opt['header_type'])    && !is_archive() && !is_search() ) ? $page_opt['header_type'] : '';
$remove_m_p         = ( !empty($page_opt['remove_m_p'])     && !is_archive() && !is_search() ) ? 'mb-0' : '';
$wc_categories_menu = ( !empty(ba_option('wc_categories_menu')) ) ? 'mb-0' : 'shadow-sm';
$fix_trans          = ( !empty(ba_option('wc_categories_menu')) && isset($page_opt['header_type']) && $page_opt['header_type'] == 'header-transparent' ) ? 'fix-trans' : '';

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo ((ba_option('favicon','url') != '')) ? '<link id="favicon" rel="shortcut icon" href="'.ba_option('favicon','url').'" type="image/png" />' : ''; ?>

    <?php echo ((ba_option('sec_color') != '')) ? '<meta name="theme-color" content="'.ba_option('sec_color').'" />' : ''; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <div class="wrapper-inner">

            <header id="AE_header" class="ae-header header-light  <?php echo $wc_categories_menu.' '.$header_type.' '.$remove_m_p.' '.$fix_trans ; ?>">
                <div class="container">
                    <div class="header-wrapper">
                        <div class="d-flex justify-content-between">

                            <div class="d-flex align-items-center">
                                <?php BA_logo(); ?>
                            </div>

                            <?php if(!wp_is_mobile()) : ?>
                            <div class="d-flex align-items-center">
                                <nav id="AE_primary_nav" class="d-flex primary-nav align-items-center" aria-label="Primary Navigation">
                                    <?php BA_nav_menu('primary','primary_menu','primary-menu MOB_NONE'); ?>
                                </nav>
                            </div>
                            <?php endif; ?>

                            <div class="d-flex align-items-center">
                                
                                <?php echo (!wp_is_mobile()) ? BA_social_icons() : '' ?>
                                
                                <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) :
                                AE_shopping_cart();
                                endif; ?>
                                <?php echo (wp_is_mobile()) ? '<button class="menu-toggle-btn p-action-click sbt-click" data-toggle="sbt" data-target="#menu-toggle" data-classes="sbt-active"><i class="fas fa-bars"></i></button>' : '' ?>
                            </div>

                        </div>
                    </div>
                </div>
                
            </header>

            <?php locate_template( 'template-parts/wc-categories-menu.php', true, true ); ?>
            
            <?php echo ( isset($page_opt['breadcrumb_switch']) && (!empty($page_opt['breadcrumb_switch'])) ) ? '' : ba_breadcrumbs(); ?>

            <div id="content" class="site-content">
