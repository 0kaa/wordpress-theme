<?php

/**
 * The template for displaying the Woocommerce
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly

get_header(); ?>

<div id="BA_woocommerce" class="content-area">

    <?php
    if (is_shop()) {
        locate_template('topsales.php', true, true);
    }
    ?>

    <?php if (!empty(ba_option('wc_cat_options')) && is_shop()) : ?>

        <?php BA_catgories_loop(); ?>

    <?php else : ?>
        <div class="container">
            <?php
                if (have_posts()) {

                    get_template_part('template-parts/content', 'woocommerce');
                } else {
                    echo '<div class="alert alert-warning">';
                    echo (!is_rtl()) ? 'Sorry, there are no products' : 'عذرا، لا توجد منتجات';
                    echo '</div>';
                }
                ?>
        </div>
    <?php endif; ?>

</div>

<?php
get_footer();
