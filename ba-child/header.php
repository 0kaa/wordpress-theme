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
                                <p>Default welcome msg! </p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="account-curr-lang-wrap f-right">
                                <ul>
                                    <li class="top-hover"><a href="#">My Account <i class="ion-chevron-down"></i></a>
                                        <ul>

                                            <?php if (!empty(ba_option('wc_bar_wishlist'))) : ?>
                                                <li>
                                                    <a href="<?php echo (ba_option('wc_bar_wishlist_link') != '') ? ba_option('wc_bar_wishlist_link') : ''; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo (!is_rtl()) ? 'Wishlist' : 'قائمة الأمنيات'; ?>">
                                                        <?php echo (!is_rtl()) ? 'Wishlist' : 'قائمة الأمنيات'; ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if (is_user_logged_in()) : ?>
                                                <li class="wc-myaccount">
                                                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php echo (!is_rtl()) ? 'My Account' : 'حسابى'; ?>">
                                                        <?php echo (!is_rtl()) ? 'My Account' : 'حسابى'; ?>
                                                    </a>
                                                </li>
                                                <li><a href="<?php echo wc_logout_url(); ?>"><?php echo (!is_rtl()) ? 'Logout' : 'تسجيل الخروج'; ?></a></li>


                                            <?php else : ?>
                                                <li class="wc-myaccount"><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php echo (!is_rtl()) ? 'Login' : 'دخول'; ?>">
                                                        <?php echo (!is_rtl()) ? 'Login' : 'دخول'; ?></a>
                                                </li>
                                                <li class="wc-myaccount"><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php echo (!is_rtl()) ? 'Register' : 'تسجيل دخول'; ?>">
                                                        <?php echo (!is_rtl()) ? 'Register' : 'تسجيل دخول'; ?></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <li class="top-hover"><a href="#">$Doller (US) <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Taka (BDT)</a></li>
                                            <li><a href="#">Riyal (SAR)</a></li>
                                            <li><a href="#">Rupee (INR)</a></li>
                                            <li><a href="#">Dirham (AED)</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><img alt="flag" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/icon-img/en.jpg' ?>"> English <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#"><img alt="flag" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/icon-img/ar.jpg' ?>">Arabic</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom transparent-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="logo">
                            <?php BA_logo(); ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-6">
                        <div class="header-bottom-right">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="top-hover"><a href="index.html">home</a>
                                            <ul class="submenu">
                                                <li><a href="index.html">home version 1</a></li>
                                                <li><a href="index-2.html">home version 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">about</a></li>
                                        <li class="mega-menu-position top-hover">
                                            <a href="<?php echo wc_get_page_permalink('shop'); ?>"><?php echo (!is_rtl()) ? 'Shop' : 'المتجر'; ?></a>
                                            <ul class="mega-menu">
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Categories 01</li>
                                                        <li><a href="shop.html">Aconite</a></li>
                                                        <li><a href="shop.html">Ageratum</a></li>
                                                        <li><a href="shop.html">Allium</a></li>
                                                        <li><a href="shop.html">Anemone</a></li>
                                                        <li><a href="shop.html">Angelica</a></li>
                                                        <li><a href="shop.html">Angelonia</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Categories 02</li>
                                                        <li><a href="shop.html">Balsam</a></li>
                                                        <li><a href="shop.html">Baneberry</a></li>
                                                        <li><a href="shop.html">Bee Balm</a></li>
                                                        <li><a href="shop.html">Begonia</a></li>
                                                        <li><a href="shop.html">Bellflower</a></li>
                                                        <li><a href="shop.html">Bergenia</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Categories 03</li>
                                                        <li><a href="shop.html">Caladium</a></li>
                                                        <li><a href="shop.html">Calendula</a></li>
                                                        <li><a href="shop.html">Carnation</a></li>
                                                        <li><a href="shop.html">Catmint</a></li>
                                                        <li><a href="shop.html">Celosia</a></li>
                                                        <li><a href="shop.html">Chives</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Categories 04</li>
                                                        <li><a href="shop.html">Daffodil</a></li>
                                                        <li><a href="shop.html">Dahlia</a></li>
                                                        <li><a href="shop.html">Daisy</a></li>
                                                        <li><a href="shop.html">Diascia</a></li>
                                                        <li><a href="shop.html">Dusty Miller</a></li>
                                                        <li><a href="shop.html">Dame’s Rocket</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="top-hover"><a href="blog-left-sidebar.html">blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                                <li><a href="#">Blog Standard <span><i class="ion-ios-arrow-right"></i></span></a>
                                                    <ul class="lavel-menu">
                                                        <li><a href="blog-left-sidebar.html">left sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">right sidebar</a></li>
                                                        <li><a href="blog-no-sidebar.html">no sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Post Types <span><i class="ion-ios-arrow-right"></i></span> </a>
                                                    <ul class="lavel-menu">
                                                        <li><a href="blog-details-standerd.html">Standard post</a></li>
                                                        <li><a href="blog-details-audio.html">audio post</a></li>
                                                        <li><a href="blog-details-video.html">video post</a></li>
                                                        <li><a href="blog-details-gallery.html">gallery post</a></li>
                                                        <li><a href="blog-details-link.html">link post</a></li>
                                                        <li><a href="blog-details-quote.html">quote post</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="top-hover"><a href="#">pages</a>
                                            <ul class="submenu">
                                                <li><a href="about-us.html">about us </a></li>
                                                <li><a href="shop.html">shop Grid</a></li>
                                                <li><a href="shop-list.html">shop list</a></li>
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="cart-page.html">cart page</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="my-account.html">my account</a></li>
                                                <li><a href="login-register.html">login / register</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="testimonial.html">Testimonials</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-cart">
                                <a href="#">
                                    <div class="cart-icon">
                                        <i class="ion-bag"></i>
                                        <span class="count-style">02</span>
                                    </div>
                                    <div class="cart-text">
                                        <span class="digit">My Cart</span>
                                        <span>$0.00</span>
                                    </div>
                                </a>
                                <div class="shopping-cart-content">
                                    <ul>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="/dist/img/cart/cart-1.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Phantom Remote </a></h4>
                                                <h6>Qty: 02</h6>
                                                <span>$260.00</span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="ion ion-close"></i></a>
                                            </div>
                                        </li>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="/dist/img/cart/cart-2.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Phantom Remote</a></h4>
                                                <h6>Qty: 02</h6>
                                                <span>$260.00</span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="ion ion-close"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <h4>Shipping : <span>$20.00</span></h4>
                                        <h4>Total : <span class="shop-total">$260.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-btn">
                                        <a href="<?php echo wc_get_cart_url(); ?>"><?php echo (!is_rtl()) ? 'Cart' : 'سلة الشراء'; ?></a>
                                        <a href="<?php echo wc_get_checkout_url(); ?>"><?php echo (!is_rtl()) ? 'Checkout' : 'الدفع'; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="#">HOME</a>
                                    <ul>
                                        <li><a href="index.html">home version 1</a></li>
                                        <li><a href="index-2.html">home version 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li><a href="about-us.html">about us </a></li>
                                        <li><a href="shop.html">shop Grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                        <li><a href="product-details.html">product details</a></li>
                                        <li><a href="cart-page.html">cart page</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="my-account.html">my account</a></li>
                                        <li><a href="login-register.html">login / register</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="testimonial.html">Testimonials</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html"> Shop </a>
                                    <ul>
                                        <li><a href="#">Categories 01</a>
                                            <ul>
                                                <li><a href="shop.html">Aconite</a></li>
                                                <li><a href="shop.html">Ageratum</a></li>
                                                <li><a href="shop.html">Allium</a></li>
                                                <li><a href="shop.html">Anemone</a></li>
                                                <li><a href="shop.html">Angelica</a></li>
                                                <li><a href="shop.html">Angelonia</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Categories 02</a>
                                            <ul>
                                                <li><a href="shop.html">Balsam</a></li>
                                                <li><a href="shop.html">Baneberry</a></li>
                                                <li><a href="shop.html">Bee Balm</a></li>
                                                <li><a href="shop.html">Begonia</a></li>
                                                <li><a href="shop.html">Bellflower</a></li>
                                                <li><a href="shop.html">Bergenia</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Categories 03</a>
                                            <ul>
                                                <li><a href="shop.html">Caladium</a></li>
                                                <li><a href="shop.html">Calendula</a></li>
                                                <li><a href="shop.html">Carnation</a></li>
                                                <li><a href="shop.html">Catmint</a></li>
                                                <li><a href="shop.html">Celosia</a></li>
                                                <li><a href="shop.html">Chives</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Categories 04</a>
                                            <ul>
                                                <li><a href="shop.html">Daffodil</a></li>
                                                <li><a href="shop.html">Dahlia</a></li>
                                                <li><a href="shop.html">Daisy</a></li>
                                                <li><a href="shop.html">Diascia</a></li>
                                                <li><a href="shop.html">Dusty Miller</a></li>
                                                <li><a href="shop.html">Dame’s Rocket</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">BLOG</a>
                                    <ul>
                                        <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                        <li><a href="#">Blog Standard</a>
                                            <ul>
                                                <li><a href="blog-left-sidebar.html">left sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">right sidebar</a></li>
                                                <li><a href="blog-no-sidebar.html">no sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Post Types</a>
                                            <ul>
                                                <li><a href="blog-details-standerd.html">Standard post</a></li>
                                                <li><a href="blog-details-audio.html">audio post</a></li>
                                                <li><a href="blog-details-video.html">video post</a></li>
                                                <li><a href="blog-details-gallery.html">gallery post</a></li>
                                                <li><a href="blog-details-link.html">link post</a></li>
                                                <li><a href="blog-details-quote.html">quote post</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"> Contact us </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="wrapper-inner">
            <div id="content" class="site-content">