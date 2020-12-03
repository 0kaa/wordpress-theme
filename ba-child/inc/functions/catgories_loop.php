<?php

/**
 * Contact Information
 *
 */

defined('ABSPATH') || exit;
// Exit if accessed directly


if (!function_exists('products')) {
    function BA_catgories_loop()
    {
        if (is_shop()) {
            if (ba_option('products') != '') {

                $i = 0;
                foreach (ba_option('products') as $value) {

                    $slug               = (!empty($value['slug'])) ? $value['slug'] : '';
                    $num                = (!empty($value['num']))  ? $value['num'] : '';
                    $link                = (!empty($value['link']))  ? $value['link'] : '';
                    $desc                = (!empty($value['desc']))  ? $value['desc'] : '';


                    $secion_type        = (!empty($value['secion_type']))      ? $value['secion_type'] : '';
                    $banner_repater     = (!empty($value['banner_repater']))   ? $value['banner_repater'] : '';
                    $wc_shortcode       = (!empty($value['wc_shortcode']))     ? $value['wc_shortcode'] : '';
                    $html               = (!empty($value['wc_html']))          ? $value['wc_html'] : '';

                    $category_heading   = (!is_rtl())   ? $value['heading'] : $value['heading_ar'];
                    $view_more          = (!is_rtl())   ? 'View More <i class="fa fa-angle-right" aria-hidden="true"></i>' : '<i class="fa fa-angle-left" aria-hidden="true"></i> عرض المزيد';
                    $no_products        = (!is_rtl())   ? 'Sorry, there are no products in this collection.' : 'عذرا ، لا توجد منتجات في هذه المجموعة';

                    if ($secion_type == 'category') {

                        $home = home_url();

                        $view_more = (!is_rtl()) ? 'View More' : 'عرض المزيد';

                        // Nav Tabs
                        echo '<div class="pro-cat ' . $category_heading . '">';

                        echo '<div class="container">';
                        echo '<div class="pro-cat-container">';

                        echo '<div class="d-flex justify-content-between align-items-end cat-heading">';

                        echo '<h2>' . $category_heading . '<span>' . $desc . '</span>';
                        echo '</h2>';

                        if (!wp_is_mobile()) {
                            echo '<a href="' . $home . '/product-category/' . $link . '" class="view-more">' . $view_more . '</a>';
                        }
                        echo '</div>';


                        /*
                        * Main loop for Main Category shown first
                        * ******************************************************************* */

                        $all   = array(
                            'post_type' => 'product',
                            'posts_per_page' => $num,
                            'orderby' => 'publish_date',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'terms' => $slug,
                                    'operator' => 'IN',
                                )
                            ),
                        );

                        $all_posts   = new WP_Query($all);

                        if ($all_posts->have_posts()) {
                            echo '<div class="">';
                            echo '<div class="products">';
                            echo '<div class="owl-carousel catgories-loop">';

                            while ($all_posts->have_posts()) {

                                $all_posts->the_post();
                                wc_get_template_part('content', 'product');
                            }

                            wp_reset_postdata();

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-warning">';
                            echo $no_products;
                            echo '</div>';
                        }



                        if (wp_is_mobile()) {
                            echo '<div class="text-center mt-4">';
                            echo '<a href="' . $home . '/product-category/' . $link . '" class="view-more">' . $view_more . '</a>';
                            echo '</div>';
                        }

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($secion_type == 'banner') {

                        echo '<div class="banners banners-' . $i . ' mt-5 mb-5">';
                        echo '<div class="container">';
                        echo '<div class="row">';

                        foreach ($banner_repater as $repater_value) {

                            $banner_img          = (!empty($repater_value['banner_img']['url']))           ? $repater_value['banner_img']['url'] : '';
                            $banner_img_mobile   = (!empty($repater_value['banner_img_mobile']['url']))    ? $repater_value['banner_img_mobile']['url'] : '';
                            $banner_link         = (!empty($repater_value['banner_link']))                 ? $repater_value['banner_link'] : '';

                            if (wp_is_mobile()) {
                                echo '<div class="col-md-6">';
                                echo '<a href="' . $banner_link . '"><img class="img-fluid" src="' . $banner_img_mobile . '" alt=""></a>';
                                echo '</div>';
                            } else {
                                echo '<div class="col">';
                                echo '<a href="' . $banner_link . '"><img class="img-fluid" src="' . $banner_img . '" alt=""></a>';
                                echo '</div>';
                            }
                        }

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($secion_type == 'shortcodeid') {
                        echo '<div class="wc-shortcode wc-shordcode-' . $i . ' mt-5 mb-5">';
                        echo '<div class="container">';
                        echo do_shortcode($wc_shortcode);
                        echo '</div>';
                        echo '</div>';
                    } elseif ($secion_type == 'html') {
                        echo $html;
                    }

                    $i++;
                }
                // foreach

                // No products categories added yet, Press here to add.
            } else {
                $no_products = (!is_rtl()) ? 'No products categories added yet.' : 'لا يوجد تصنيفات للمنتجات مضافة حالياً';

                echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show mb-4"><a class="" href="' . admin_url('?page=ba#tab=woocommerce') . '" target="_blank">
                ' . $no_products . '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div></div>';
            }
        }
    }
}
add_shortcode('BA-catgories-loop', 'BA_catgories_loop');
