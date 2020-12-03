<?php

/**
 * The template for displaying the woocommerce Product content
 */

defined('ABSPATH') || exit; // Exit if accessed directly 
?>

<div class="row">

    <?php if (!empty(ba_option('WooCommerce_sidebar')) || !is_product()) : ?>
        <?php if (!wp_is_mobile()) : ?>
            <div class="col-md-3">
                <?php dynamic_sidebar('wocomerce_sidebar'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="col">
        <div class="products-right">
            <?php woocommerce_content(); ?>
        </div>
    </div>

</div>