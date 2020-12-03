<?php

/**
 * The template for displaying pages
 * Template Name: Home
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly
get_header();


$args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => 3
    // Several more arguments could go here. Last one without a comma.
);

// Query the posts:
$testimonials = new WP_Query($args);

$category_mens = get_terms(array(
    'taxonomy'   => "product_cat",
    'slug'      => 'mens-wear'
));
$category_womens = get_terms(array(
    'taxonomy'   => "product_cat",
    'slug'      => 'womens-wear'
));
$category_bags = get_terms(array(
    'taxonomy'   => "product_cat",
    'slug'      => 'bags'
));
$category_shoes = get_terms(array(
    'taxonomy'   => "product_cat",
    'slug'      => 'shoes'
));


$all_products = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 10,

));
$mens_wear_products = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    'product_cat'    => 'mens-wear'

));
$womens_wear_products = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    'product_cat'    => 'womens-wear'

));
$bags_products = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    'product_cat'    => 'bags'

));
$shoes_products = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    'product_cat'    => 'shoes'

));
$symbol = get_woocommerce_currency_symbol()
?>
<div class="home-page mb-5">
    <div class="slider-area">
        <div class="single-slider pt-175 pb-258 bg-img" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/dist/img/slider/slider-1.jpg' ?>);">
            <div class="container">
                <div class="slider-content slider-animated-1">
                    <h3 class="animated">New Arrivals</h3>
                    <h1 class="animated">For Mother’s Day!</h1>
                    <h5 class="animated">Exclusive Offer -10% Off This Week</h5>
                    <div class="slider-btn mt-45">
                        <a class="animated" href="<?php echo wc_get_page_permalink('shop'); ?>">shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area">
        <div class="container">
            <div class="banner-wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner img-zoom mb-30">
                            <a href="#">

                                <img src=" <?php echo get_stylesheet_directory_uri() . '/dist/img/banner/banner-1.png' ?>" alt="">
                            </a>
                            <div class="banner-content">
                                <h4>Camellias</h4>
                                <a href="#">shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner img-zoom mb-30">
                            <a href="#">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/dist/img/banner/banner-2.png' ?>" alt="">
                            </a>
                            <div class="banner-content">
                                <h4>Bergamot</h4>
                                <a href="#">shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner mb-xs-banner img-zoom mb-30">
                            <a href="#">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/dist/img/banner/banner-3.png' ?>" alt="">
                            </a>
                            <div class="banner-content">
                                <h4>Bottlebrush</h4>
                                <a href="#">shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-area pt-40 pb-70">
        <div class="container">
            <div class="product-top-bar section-border mb-35">
                <div class="section-title-wrap">
                    <h3 class="section-title section-bg-white">Featured Products</h3>
                </div>
                <div class="product-tab-list nav section-bg-white">

                    <a class="active" data-toggle="tab" href="#all">
                        <h4>All </h4>
                    </a>
                    <?php foreach ($category_mens as $cat) :
                        echo '
                        <a data-toggle="tab" href="#' . $cat->slug . '">
                            <h4>' . $cat->name . '</h4>
                        </a>
                        ';
                    endforeach; ?>

                    <?php foreach ($category_womens as $cat) :
                        echo '
                        <a data-toggle="tab" href="#' . $cat->slug . '">
                            <h4>' . $cat->name . '</h4>
                        </a>
                        ';
                    endforeach; ?>
                    <?php foreach ($category_bags as $cat) :
                        echo '
                        <a data-toggle="tab" href="#' . $cat->slug . '">
                            <h4>' . $cat->name . '</h4>
                        </a>
                        ';
                    endforeach; ?>
                    <?php foreach ($category_shoes as $cat) :
                        echo '
                        <a data-toggle="tab" href="#' . $cat->slug . '">
                            <h4>' . $cat->name . '</h4>
                        </a>
                        ';
                    endforeach; ?>
                </div>
            </div>
            <div class="tab-content jump">
                <div id="all" class="tab-pane active">
                    <div class="featured-product-active owl-carousel product-nav">
                        <?php
                        while ($all_products->have_posts()) : $all_products->the_post();
                            global $product;

                            if ($product->sale_price) :
                                $percentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                            else :
                                $percentage = '';
                            endif;
                            ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="<?php echo get_permalink() ?>">
                                        <?php echo woocommerce_get_product_thumbnail() ?>
                                    </a>
                                    <?php if ($percentage) :
                                            echo '<span>-' . $percentage . '%</span>';
                                        endif; ?>
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="icon-handbag"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal" data-id="<?php echo $product->id ?>" data-toggle="modal" title="Quick View">
                                            <i class="icon-magnifier-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4>
                                        <a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <?php if ($product->sale_price) : ?>
                                            <span><?php echo $symbol . ' ' . $product->sale_price ?></span>
                                            <span class="product-price-old"><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php else :
                                                ?>
                                            <span><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;

                        wp_reset_query();
                        ?>


                    </div>
                </div>
                <div id="mens-wear" class="tab-pane">
                    <div class="featured-product-active owl-carousel product-nav">
                        <?php
                        while ($mens_wear_products->have_posts()) : $mens_wear_products->the_post();
                            global $product;

                            if ($product->sale_price) :
                                $percentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                            else :
                                $percentage = '';
                            endif;
                            ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="<?php echo get_permalink() ?>">
                                        <?php echo woocommerce_get_product_thumbnail() ?>
                                    </a>
                                    <?php if ($percentage) :
                                            echo '<span>-' . $percentage . '%</span>';
                                        endif; ?>
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="icon-handbag"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal" data-id="<?php echo $product->id ?>" data-toggle="modal" title="Quick View">
                                            <i class="icon-magnifier-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4>
                                        <a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <?php if ($product->sale_price) : ?>
                                            <span><?php echo $symbol . ' ' . $product->sale_price ?></span>
                                            <span class="product-price-old"><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php else :
                                                ?>
                                            <span><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;

                        wp_reset_query();
                        ?>


                    </div>
                </div>
                <div id="womens-wear" class="tab-pane">
                    <div class="featured-product-active owl-carousel product-nav">
                        <?php
                        while ($womens_wear_products->have_posts()) : $womens_wear_products->the_post();
                            global $product;

                            if ($product->sale_price) :
                                $percentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                            else :
                                $percentage = '';
                            endif;
                            ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="<?php echo get_permalink() ?>">
                                        <?php echo woocommerce_get_product_thumbnail() ?>
                                    </a>
                                    <?php if ($percentage) :
                                            echo '<span>-' . $percentage . '%</span>';
                                        endif; ?>
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="icon-handbag"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal" data-id="<?php echo $product->id ?>" data-toggle="modal" title="Quick View">
                                            <i class="icon-magnifier-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4>
                                        <a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <?php if ($product->sale_price) : ?>
                                            <span><?php echo $symbol . ' ' . $product->sale_price ?></span>
                                            <span class="product-price-old"><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php else :
                                                ?>
                                            <span><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;

                        wp_reset_query();
                        ?>


                    </div>
                </div>
                <div id="bags" class="tab-pane">
                    <div class="featured-product-active owl-carousel product-nav">
                        <?php
                        while ($bags_products->have_posts()) : $bags_products->the_post();
                            global $product;

                            if ($product->sale_price) :
                                $percentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                            else :
                                $percentage = '';
                            endif;
                            ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="<?php echo get_permalink() ?>">
                                        <?php echo woocommerce_get_product_thumbnail() ?>
                                    </a>
                                    <?php if ($percentage) :
                                            echo '<span>-' . $percentage . '%</span>';
                                        endif; ?>
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="icon-handbag"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal" data-id="<?php echo $product->id ?>" data-toggle="modal" title="Quick View">
                                            <i class="icon-magnifier-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4>
                                        <a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <?php if ($product->sale_price) : ?>
                                            <span><?php echo $symbol . ' ' . $product->sale_price ?></span>
                                            <span class="product-price-old"><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php else :
                                                ?>
                                            <span><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;

                        wp_reset_query();
                        ?>


                    </div>
                </div>
                <div id="shoes" class="tab-pane">
                    <div class="featured-product-active owl-carousel product-nav">
                        <?php
                        while ($shoes_products->have_posts()) : $shoes_products->the_post();
                            global $product;

                            if ($product->sale_price) :
                                $percentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                            else :
                                $percentage = '';
                            endif;
                            ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="<?php echo get_permalink() ?>">
                                        <?php echo woocommerce_get_product_thumbnail() ?>
                                    </a>
                                    <?php if ($percentage) :
                                            echo '<span>-' . $percentage . '%</span>';
                                        endif; ?>
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="icon-handbag"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal" data-id="<?php echo $product->id ?>" data-toggle="modal" title="Quick View">
                                            <i class="icon-magnifier-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4>
                                        <a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <?php if ($product->sale_price) : ?>
                                            <span><?php echo $symbol . ' ' . $product->sale_price ?></span>
                                            <span class="product-price-old"><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php else :
                                                ?>
                                            <span><?php echo $symbol . ' ' . $product->regular_price ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;

                        wp_reset_query();
                        ?>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="testimonials-area bg-img pt-120 pb-115" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/dist/img/bg/bg-1.jpg' ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto col-12">

                    <div class="testimonial-active owl-carousel">

                        <?php

                        while ($testimonials->have_posts()) : $testimonials->the_post();
                            ?>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/icon-img/testi.png' ?>">
                                </div>
                                <p><?php the_content() ?></p>
                                <h4><?php the_title() ?></h4>
                            </div>
                        <?php endwhile;

                        // Reset Post Data
                        wp_reset_postdata();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="best-selling-product pt-70 pb-75 gray-bg">
        <div class="container">
            <div class="product-top-bar section-border mb-35">
                <div class="section-title-wrap">
                    <h3 class="section-title section-bg-gray">Best Selling Products</h3>
                </div>
            </div>
            <div class="best-selling-wrap">
                <div class="best-selling-active owl-carousel product-nav">
                    <div class="single-best-selling">
                        <div class="row">
                            <div class="col-lg-6 col-xl-5 col-md-6">
                                <div class="single-best-img">
                                    <img class="tilter" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/banner/deal-1.png' ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-7 col-md-6">
                                <div class="deals-content text-center deal-mrg">
                                    <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/icon-img/deals-2.png' ?>">
                                    <h2>Hot Deal ! Sale Up To <span>20% Off</span></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                    <div class="timer timer-style">
                                        <div data-countdown="2018/09/01"></div>
                                    </div>
                                    <div class="deals-btn">
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-best-selling">
                        <div class="row">
                            <div class="col-lg-6 col-xl-5 col-md-6">
                                <div class="single-best-img">
                                    <img class="tilter" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/banner/deal-1.png' ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-7 col-md-6">
                                <div class="deals-content text-center deal-mrg">
                                    <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/icon-img/deals-2.png' ?>">
                                    <h2>Hot Deal ! Sale Up To <span>20% Off</span></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                    <div class="timer timer-style">
                                        <div data-countdown="2018/09/01"></div>
                                    </div>
                                    <div class="deals-btn">
                                        <a href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-70 pb-70">
        <div class="container">
            <div class="product-top-bar section-border mb-35">
                <div class="section-title-wrap">
                    <h3 class="section-title section-bg-white">Hot Flower</h3>
                </div>
            </div>
            <div class="featured-product-active hot-flower owl-carousel product-nav">
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/product/product-5.jpg' ?>">
                        </a>
                        <span>-30%</span>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="icon-handbag"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="icon-magnifier-add"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a href="product-details.html">Pearly Everlasting</a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>$100.00</span>
                            <span class="product-price-old">$120.00 </span>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/product/product-6.jpg' ?>">
                        </a>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="icon-handbag"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="icon-magnifier-add"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a href="product-details.html">Polka Dot Plant</a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>$100.00</span>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/product/product-7.jpg' ?>">
                        </a>
                        <span>-30%</span>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="icon-handbag"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="icon-magnifier-add"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a href="product-details.html">Glory of the Snow</a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>$100.00</span>
                            <span class="product-price-old">$120.00 </span>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/product/product-8.jpg' ?>">
                        </a>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="icon-handbag"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="icon-magnifier-add"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a href="product-details.html">Jack in the Pulpit</a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>$100.00</span>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/product/product-6.jpg' ?>">
                        </a>
                        <span>-30%</span>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="icon-handbag"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="icon-magnifier-add"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a href="product-details.html">Flowers Bouquet Pink </a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>$100.00</span>
                            <span class="product-price-old">$120.00 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="new-year-offer-area pb-75">
        <div class="container">
            <div class="new-year-offer-wrap pt-70 pb-75 bg-img" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/dist/img/banner/banner-4.jpg' ?>);">
                <div class="new-year-offer-content text-center">
                    <h4>New Year Offer</h4>
                    <h3>Fresh flowers for any special occasion</h3>
                    <a href="#">Discover now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/img/product-details/product-detalis-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l4.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="product-thumbnail">
                            <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- Thumbnail image end -->
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3>Dutchman's Breeches </h3>
                            <div class="product-price-wrapper">
                                <span class="product-price-old">£162.00 </span>
                                <span>£120.00</span>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                                <div class="quickview-color-wrap">
                                    <label>Color*</label>
                                    <div class="quickview-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="red">r</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                </div>
                                <button>Add to cart</button>
                            </div>
                            <span><i class="fa fa-check"></i> In stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
