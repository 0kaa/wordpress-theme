<?php
/**
 * The template for displaying Toggle Menu
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<?php if(!empty(ba_option('wc_categories_menu'))) : ?>
<?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) : ?>
<div class="wc-categories-bar">
    <div class="container">
        <div class="row align-items-center">

            <?php if(!wp_is_mobile()) : ?>
            <div class="col-lg-3">
                <div class="wc-categories-warp">
                    <button class="wc-categories-btn mob-click">
                        <i class="fas fa-store-alt"></i> <?php echo (is_rtl()) ? 'عرض التصنيفات' : 'Browse Categories' ; ?>
                    </button>
                    <?php BA_nav_menu('wc_menu','wc-categories-menu','wc-categories-menu'); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-lg-5 text-center m-first wc-search">
                <div id="wc-search">
                    <?php 
                    $wc_center = ( ba_option('wc_center') != '' ) ? ba_option('wc_center') : '';
                    echo do_shortcode($wc_center); ?>
                </div>
            </div>

            <?php if(!wp_is_mobile()) : ?>
            <div class="col">

                <ul class="wc-right-menu">
                    <?php if ( is_user_logged_in() ) : ?>
                    <li class="wc-myaccount">
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php echo (!is_rtl()) ? 'My Account' : 'حسابى' ; ?>">
                            <i class="fas fa-user"></i> <?php echo (!is_rtl()) ? 'My Account' : 'حسابى' ; ?>
                        </a>
                        <ul class="wc-submenu">
                            <li><a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><?php echo (!is_rtl()) ? 'Shop' : 'المتجر' ; ?></a></li>
                            <li><a href="<?php echo wc_get_cart_url(); ?>"><?php echo (!is_rtl()) ? 'Cart' : 'سلة الشراء' ; ?></a></li>
                            <li><a href="<?php echo wc_get_checkout_url(); ?>"><?php echo (!is_rtl()) ? 'Checkout' : 'الدفع' ; ?></a></li>
                            <li><a href="<?php echo wc_get_account_endpoint_url( 'orders' ); ?>"><?php echo (!is_rtl()) ? 'Orders' : 'الطلبات' ; ?></a></li>
                            <li><a href="<?php echo wc_logout_url(); ?>"><?php echo (!is_rtl()) ? 'Logout' : 'تسجيل الخروج' ; ?></a></li>
                        </ul>
                    </li>
                    
                    <?php if(!empty(ba_option('wc_bar_wishlist'))) : ?>
                    <li class="wc-wishlist">
                        <a href="<?php echo ( ba_option('wc_bar_wishlist_link') != '' ) ? ba_option('wc_bar_wishlist_link') : ''; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo (!is_rtl()) ? 'Wishlist' : 'قائمة الأمنيات' ; ?>">
                            <i class="far fa-heart"></i></a>
                    </li>
                    <?php endif; ?>
                    
                    <?php else: ?>
                    <li class="wc-myaccount"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php echo (!is_rtl()) ? 'Login / Register' : 'دخول / تسجيل دخول' ; ?>">
                            <i class="fas fa-user"></i> <?php echo (!is_rtl()) ? 'Login / Register' : 'دخول / تسجيل دخول' ; ?></a>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
