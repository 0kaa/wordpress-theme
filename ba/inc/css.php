<?php
/*
 * The template for displaying freamwork CSS options
 * @package ae
 */

defined('ABSPATH') || exit; // Exit if accessed directly

function BA_style() {
    wp_enqueue_style ('style', BA_TEMPLATE_URL .'/style.css');
    wp_enqueue_style ('BA_style_css', BA_TEMPLATE_URL .'/dist/css/style.css');

    $main_color=ba_option('main_color');
    $sec_color=ba_option('sec_color');
    $CSS_editor=ba_option('CSS_editor');
    $media_CSS_editor=ba_option('media_CSS_editor');

    $custom_css="

    .owl-carousel .owl-nav .owl-prev:hover,
    .owl-carousel .owl-nav .owl-next:hover,
    .owl-carousel .owl-dot:hover,
    ul.apsw_data_container li.apsw_empty:hover,
    ul.apsw_data_container li.apsw_empty a:hover,
    .apsw_result_on_sale,
    .comments-area .comment-list li.comment .comment-edit-link:hover,
    .comments-area .comment-list li.comment .reply a:hover,
    .comment-form .submit:hover,
    .mixitup-control-active,
    .shop-head .btn:not(:disabled):not(.disabled):active,
    .shop-head .btn:focus,
    .shop-head .btn:hover,
    .widget_product_categories .current-cat > span .post-count,
    .widget_archive .current-cat > span .post-count,
    .widget_categories .current-cat > span .post-count,
    .btn-secondary,
    .btn-primary:hover,
    #top,
    .video-button,
    .wc-pagination ul li .current,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
    .cart-list .cart-box .woocommerce-mini-cart__buttons a.checkout,
    .woocommerce .buttons a.checkout,
    .video-button .play-inner:before,
    .post-article .post-inner .post-thumbnail:hover .post-more,
    #pagination .pagination .active .page-link,
    #BA_tabs .wc-tabs .active:before,
    .sidebar-toggle-btn button,
    #BA_woocommerce .onsale,
    #colophon .footer-inner .contact-info > div .ci-left,
    .sbt .sbt-warp .sbt-inner .sbt-close button,
    .contact-page .contact-info > div .ci-left,
    .cart-icon .cart-count {
        background-color: {$sec_color} !important;
    }


    .owl-carousel .owl-nav .owl-prev,
    .owl-carousel .owl-nav .owl-next,
    .owl-carousel .owl-dot,
    .woocommerce a.button,
    .comment-form .submit,
    .btn-primary,
    #BA_summary .single_add_to_cart_button,
    ul.apsw_data_container li.apsw_empty,
    ul.apsw_data_container li.apsw_empty a,
    .comment-form .submit,
    .wc-pagination ul li a:hover,
    .wc-pagination ul li span:hover,
    .btn-primary,
    .btn-secondary:hover,
    #top:hover,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
    .cart-list .cart-box .woocommerce-mini-cart__buttons a.checkout:hover,
    .woocommerce .buttons a.checkout:hover,
    .sbt .sbt-warp .sbt-inner .sbt-close button:hover {
        background-color: {$main_color} !important;
    }


    .woocommerce div.product p.price,
    .woocommerce div.product span.price,
    #BA_summary .ba-price .price,
    .search-article:hover a,
    .widget_product_categories .current-cat > a,
    .widget_archive .current-cat > a,
    .widget_categories .current-cat > a,
    .ba-quantity .qty_button:hover,
    .breadcrumb-item a:hover,
    .entry-tags a:hover,
    .social-icons a:hover,
    #colophon .footer-inner a:hover,
    .widget ul li a:hover,
    #BA_summary .woocommerce-variation-price .price,
    #BA_summary a:hover,
    #BA_summary .ba-price .price,
    #woosq-popup .price,
    #BA_tabs .wc-tabs .active,
    #cart-box .woocommerce-mini-cart__total .amount,
    #colophon #social_icons a:hover {
        color: {$sec_color} !important;
    }


    .owl-carousel .owl-nav .owl-prev:hover,
    .owl-carousel .owl-nav .owl-next:hover,
    .owl-carousel .owl-dot:hover,
    .woocommerce a.button:hover,
    .comment-form .submit:hover,
    .mixitup-control-active,
    .shop-head .btn:not(:disabled):not(.disabled):active,
    .shop-head .btn:focus,
    .shop-head .btn:hover,
    select:focus,
    .woocommerce form .form-row input:focus,
    .woocommerce form .form-row textarea:focus,
    .login-wc .login-title:before,
    .btn-primary:hover,
    .woocommerce #respond input#submit.alt.disabled,
    .woocommerce #respond input#submit.alt.disabled:hover,
    .woocommerce #respond input#submit.alt:disabled,
    .woocommerce #respond input#submit.alt:disabled:hover,
    .woocommerce #respond input#submit.alt:disabled[disabled],
    .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
    .woocommerce a.button.alt.disabled,
    .woocommerce a.button.alt.disabled:hover,
    .woocommerce a.button.alt:disabled,
    .woocommerce a.button.alt:disabled:hover,
    .woocommerce a.button.alt:disabled[disabled],
    .woocommerce a.button.alt:disabled[disabled]:hover,
    .woocommerce button.button.alt.disabled,
    .woocommerce button.button.alt.disabled:hover,
    .woocommerce button.button.alt:disabled,
    .woocommerce button.button.alt:disabled:hover,
    .woocommerce button.button.alt:disabled[disabled],
    .woocommerce button.button.alt:disabled[disabled]:hover,
    .woocommerce input.button.alt.disabled,
    .woocommerce input.button.alt.disabled:hover,
    .woocommerce input.button.alt:disabled,
    .woocommerce input.button.alt:disabled:hover,
    .woocommerce input.button.alt:disabled[disabled],
    .woocommerce input.button.alt:disabled[disabled]:hover,
    .btn-secondary,
    .form-control:focus,
    .btn-primary:not(:disabled):not(.disabled):active,
    #BA_summary .single_add_to_cart_button:not(:disabled):not(.disabled):active,
    .btn-primary:focus,
    #BA_summary .single_add_to_cart_button:focus,
    .btn-primary:hover,
    #BA_summary .single_add_to_cart_button:hover,
    .post-article .post-inner .post-thumbnail:hover .post-more,
    #pagination .pagination .active .page-link,
    .widget .widget-title:after {
        border-color: {$sec_color}!important;
    }


    .owl-carousel .owl-nav .owl-prev,
    .owl-carousel .owl-nav .owl-next,
    .owl-carousel .owl-dot,
    .woocommerce a.button,
    .comment-form .submit,
    .btn-primary,
    #BA_summary .single_add_to_cart_button,
    .comment-form .submit,
    .wc-pagination ul li a:hover,
    .wc-pagination ul li span:hover,
    .btn-primary,
    .btn-secondary:hover {
        border-color: {$main_color} !important;
    }


    #BA_summary .tinvwl-product-in-list,
    .btn-primary:not(:disabled):not(.disabled):active,
    #BA_summary .single_add_to_cart_button:not(:disabled):not(.disabled):active,
    .btn-primary:focus,
    #BA_summary .single_add_to_cart_button:focus,
    .btn-primary:hover,
    #BA_summary .single_add_to_cart_button:hover,
    .woocommerce button.button:not(:disabled):not(.disabled):active,
    .woocommerce button.button:focus,
    .cart-list .cart-box .woocommerce-mini-cart__buttons .button:not(:disabled):not(.disabled):active,
    .cart-list .cart-box .woocommerce-mini-cart__buttons .button:focus,
    .cart-list .cart-box .woocommerce-mini-cart__buttons .button:hover,
    .woocommerce #respond input#submit.alt.disabled,
    .woocommerce #respond input#submit.alt.disabled:hover,
    .woocommerce #respond input#submit.alt:disabled,
    .woocommerce #respond input#submit.alt:disabled:hover,
    .woocommerce #respond input#submit.alt:disabled[disabled],
    .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
    .woocommerce a.button.alt.disabled,
    .woocommerce a.button.alt.disabled:hover,
    .woocommerce a.button.alt:disabled,
    .woocommerce a.button.alt:disabled:hover,
    .woocommerce a.button.alt:disabled[disabled],
    .woocommerce a.button.alt:disabled[disabled]:hover,
    .woocommerce button.button.alt.disabled,
    .woocommerce button.button.alt.disabled:hover,
    .woocommerce button.button.alt:disabled,
    .woocommerce button.button.alt:disabled:hover,
    .woocommerce button.button.alt:disabled[disabled],
    .woocommerce button.button.alt:disabled[disabled]:hover,
    .woocommerce input.button.alt.disabled,
    .woocommerce input.button.alt.disabled:hover,
    .woocommerce input.button.alt:disabled,
    .woocommerce input.button.alt:disabled:hover,
    .woocommerce input.button.alt:disabled[disabled],
    .woocommerce input.button.alt:disabled[disabled]:hover,
    .woocommerce button.button.alt:not(:disabled):not(.disabled):active,
    .woocommerce button.button.alt:focus,
    .woocommerce button.button.alt:hover,
    .woocommerce a.button:not(:disabled):not(.disabled):active,
    .woocommerce a.button:focus,
    .woocommerce a.button:hover,
    .woocommerce #respond input#submit:not(:disabled):not(.disabled):active,
    .woocommerce #respond input#submit:focus,
    .woocommerce #respond input#submit:hover {
        background-color: {$sec_color} !important;
    }

    ::-moz-selection {
        background-color: {$sec_color} !important;
        color: #fff;
    }

    ::selection {
        background-color: {$sec_color} !important;
        color: #fff;
    }

    .current-cat .post-count .post-count,
    .current-cat .count .post-count {
        color: #fff !important;
    }


    {$CSS_editor}

    @media(max-width:992px) {
    
    {$media_CSS_editor}
    
    }
    
    ";
    
    wp_add_inline_style('style', $custom_css);
}

add_action('wp_enqueue_scripts', 'BA_style');
