<?php

/**
 * The template for displaying the WooCommerce
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly

add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

function AE_add_woocommerce_support()
{
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 450,
        'single_image_width'    => 450,
    ));
}
add_action('after_setup_theme', 'AE_add_woocommerce_support');

/**
 * Unload WooCommerce assets on non WooCommerce pages.
 */
function AE_conditionally_remove_wc_assets()
{

    // if WooCommerce is not active, abort.
    if (!class_exists('WooCommerce')) {
        return;
    }

    // if this is a WooCommerce related page, abort.
    if (is_woocommerce() || is_cart() || is_checkout()) {
        return;
    }

    remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
    remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
    remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
}
add_action('get_header', 'AE_conditionally_remove_wc_assets');


/*
 * Change number of related products output
 */
add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);
function jk_related_products_args($args)
{
    global $product;
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}

/**
 * Change number of upsells output
 */
add_filter('woocommerce_upsell_display_args', 'wc_change_number_related_products', 20);

function wc_change_number_related_products($args)
{

    $args['posts_per_page'] = 4;
    $args['columns'] = 4; //change number of upsells here
    return $args;
}

/*
* Add a custom currency symbol - QR - to woocommerce
* ******************************************************************* */
add_filter('woocommerce_currencies', 'add_my_currency');
function add_my_currency($currencies)
{
    $currencies['QAR'] = __('Qatari riyal', 'woocommerce');
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'QAR':
            $currency_symbol = 'QR';
            break;
    }
    return $currency_symbol;
}

/*
 * Add warp div to thumbnail
* ******************************************************************* */

function after_li_started()
{
    echo "<div class='product-inner'>";
}
add_action("woocommerce_before_shop_loop_item", "after_li_started", 9);

function before_li_started()
{
    echo "</div>";
    echo "</div>";
}
add_action("woocommerce_after_shop_loop_item", "before_li_started", 13);

function add_div_for_loop_thumbnail()
{
    echo '<div class="product-thumb place_holder">';
}
add_action('woocommerce_before_shop_loop_item_title', 'add_div_for_loop_thumbnail', 5, 2);

function close_div_for_thumbnail()
{
    echo "</div>";
}
add_action('woocommerce_before_shop_loop_item_title', 'close_div_for_thumbnail', 12, 2);


function add_div_for_loop_buttons()
{
    echo '<div class="product-buttons">';
}
add_action('woocommerce_after_shop_loop_item_title', 'add_div_for_loop_buttons', 12, 2);


/*
 * Shop Mini Cart on Header
 */
if (!function_exists('AE_shopping_cart')) {

    function AE_shopping_cart()
    {
        if (class_exists('WooCommerce')) {

            $count = WC()->cart->cart_contents_count;
            $total_a = WC()->cart->get_total();
            $cart_text = (!is_rtl()) ? 'My Cart' : 'سلة الشراء';
            ?>
                <div class="header-cart">
                    <a href="#">
                        <div class="cart-icon">
                            <i class="ion-bag"></i>
                            <span class="count-style"><?php echo esc_html($count) ?></span>
                        </div>
                        <div class="cart-text">
                            <span class="digit"><?php echo $cart_text ?></span>
                            <span><?php echo $total_a ?></span>
                        </div>
                    </a>
                    <div class="shopping-cart-content">
                        <?php echo woocommerce_mini_cart(); ?>

                    </div>
                </div>
        <?php


                }
            }
        }

        /*
 * Update Cart Count & Mini Cart
 */
        add_filter('add_to_cart_fragments', 'AE_pdate_ajax_woocomemrce', 10, 1);

        function AE_pdate_ajax_woocomemrce($fragments)
        {

            ob_start();

            echo '<span class="woocommerce-Price-amount amount">';
            echo WC()->cart->get_total();
            echo '</span>';

            $fragments['.cart-text .woocommerce-Price-amount'] = ob_get_clean();

            ob_start();

            echo '<span class="count-style">';
            echo WC()->cart->get_cart_contents_count();
            echo '</span>';

            $fragments['span.count-style'] = ob_get_clean();

            ob_start();

            echo '<div class="shopping-cart-content">';
            woocommerce_mini_cart();
            echo "</div>";

            $fragments['.shopping-cart-content'] = ob_get_clean();

            return $fragments;
        }


        /*
 * Sale Badge to Percentage
 */
        add_filter('woocommerce_sale_flash', 'AE_add_percentage_to_sale_badge', 20, 3);
        function AE_add_percentage_to_sale_badge($html, $post, $product)
        {
            if ($product->is_type('variable')) {
                $percentages = array();

                // Get all variation prices
                $prices = $product->get_variation_prices();

                // Loop through variation prices
                foreach ($prices['price'] as $key => $price) {
                    // Only on sale variations
                    if ($prices['regular_price'][$key] !== $price) {
                        // Calculate and set in the array the percentage for each variation on sale
                        $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
                    }
                }
                // We keep the highest value
                $percentage = max($percentages) . '%';
            } else {
                $regular_price = (float) $product->get_regular_price();
                $sale_price    = (float) $product->get_sale_price();

                $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
            }
            return '<span class="onsale">' . $percentage . '</span>';
        }

        // Quantity Fields
        function mm_quantity_fields_script()
        {

            // if WooCommerce is not active, abort.
            if (!class_exists('WooCommerce')) {
                return;
            }

            ?>
        <script type='text/javascript'>
            jQuery(function($) {
                if (!String.prototype.getDecimals) {
                    String.prototype.getDecimals = function() {
                        var num = this,
                            match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                        if (!match) {
                            return 0;
                        }
                        return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
                    }
                }
                // Quantity "plus" and "minus" buttons
                $(document.body).on('click', '.plus, .minus', function() {
                    var $qty = $(this).closest('.quantity').find('.qty'),
                        currentVal = parseFloat($qty.val()),
                        max = parseFloat($qty.attr('max')),
                        min = parseFloat($qty.attr('min')),
                        step = $qty.attr('step');

                    // Format values
                    if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
                    if (max === '' || max === 'NaN') max = '';
                    if (min === '' || min === 'NaN') min = 0;
                    if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

                    // Change the value
                    if ($(this).is('.plus')) {
                        if (max && (currentVal >= max)) {
                            $qty.val(max);
                        } else {
                            $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
                        }
                    } else {
                        if (min && (currentVal <= min)) {
                            $qty.val(min);
                        } else if (currentVal > 0) {
                            $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
                        }
                    }

                    // Trigger change event
                    $qty.trigger('change');
                });
            });
        </script>
    <?php
    }
    add_action('wp_footer', 'mm_quantity_fields_script');

    /*
 * Add Bootstrap form styling to WooCommerce fields
 */
    function iap_wc_bootstrap_form_field_args($args, $key, $value)
    {

        $args['input_class'][] = 'form-control';
        return $args;
    }
    add_filter('woocommerce_form_field_args', 'iap_wc_bootstrap_form_field_args', 10, 3);


    add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_stock', 10);
    function woocommerce_template_loop_stock()
    {
        global $product;
        $text = (!is_rtl()) ? 'Out of Stock' : 'إنتهى من المخزن';
        if (!$product->managing_stock() && !$product->is_in_stock())
            echo '<span class="stock out-of-stock">' . $text . '</span>';
    }

    /*
 * WooCommerce Loop Descrpition
 */
    function woocommerce_after_shop_loop_item_title_short_description()
    {
        global $product;
        if (!$product->get_short_description()) return;
        ?>
        <div class="pro-desc" itemprop="description">
            <?php echo wp_trim_words(apply_filters('woocommerce_short_description', $product->get_short_description()), 20); ?>
        </div>
    <?php
    }
    add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);
