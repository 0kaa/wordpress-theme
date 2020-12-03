<?php

/**
 * The template for displaying Toggle Menu
 */

defined('ABSPATH') || exit; // Exit if accessed directly 
?>

<?php if (!empty(ba_option('wc_categories_menu'))) : ?>
    <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) : ?>
        <div class="wc-categories-bar">
            <div class="container">
                <div class="row align-items-center">

                    <?php if (!wp_is_mobile()) : ?>
                        <div class="col-lg-3">
                            <div class="wc-categories-warp">
                                <button class="wc-categories-btn mob-click">
                                    <i class="fas fa-store-alt"></i> <?php echo (is_rtl()) ? 'عرض التصنيفات' : 'Browse Categories'; ?>
                                </button>
                                <?php BA_nav_menu('wc_menu', 'wc-categories-menu', 'wc-categories-menu'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!wp_is_mobile()) : ?>
                        <div class="d-flex align-items-center">
                            <nav id="AE_primary_nav" class="d-flex primary-nav align-items-center" aria-label="Primary Navigation">
                                <?php BA_nav_menu('primary', 'primary_menu', 'primary-menu MOB_NONE'); ?>
                            </nav>
                        </div>
                    <?php endif; ?>

                    <?php if (!wp_is_mobile()) : ?>
                        <div class="col">
                            <?php echo BA_social_icons(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (wp_is_mobile()) : ?>
                        <div class="col text-center m-first wc-search">
                            <div id="wc-search">
                                <?php
                                            $wc_center = (ba_option('wc_center') != '') ? ba_option('wc_center') : '';
                                            echo do_shortcode($wc_center); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>