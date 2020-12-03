<?php
/**
* The template for displaying the TopSales
*
*/

defined( 'ABSPATH' ) || exit;
// Exit if accessed directly

$home = home_url();

$view_more = ( !is_rtl() ) ? 'View More' : 'عرض المزيد';

// Nav Tabs
echo '<div class="top-sales pro-cat">';

echo '<div class="container">';
echo '<div class="pro-cat-container">';

echo '<div class="cat-heading">';
echo '<h2>TopSales <span>Add bestselling products to weekly line up</span>';
echo '</h2>';


echo '</div>';


$all   = array(
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 10,
);

$all_posts   = new WP_Query( $all );

if ( $all_posts->have_posts() ) {
    echo '<div class="">';
    echo '<div class="products">';
    echo '<div class="owl-carousel catgories-loop">';

    while ( $all_posts->have_posts() ) {

        $all_posts->the_post();
        wc_get_template_part( 'content', 'product' );
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

echo '</div>';
echo '</div>';
echo '</div>';