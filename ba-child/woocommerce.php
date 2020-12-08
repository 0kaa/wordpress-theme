<?php

/**
 * The template for displaying the Woocommerce
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly

get_header();

// Query the posts:
$testimonials = new WP_Query(
    array(
        'post_type' => 'testimonials',
        'posts_per_page' => 3
        // Several more arguments could go here. Last one without a comma.
    )
);

$sliders_args = array(
    'post_type' => 'sliders',
    'posts_per_page' => 3
    // Several more arguments could go here. Last one without a comma.
);

// Query the posts:
$sliders = new WP_Query($sliders_args);

$all_products = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 10,

));
$symbol = get_woocommerce_currency_symbol();

// All Categories Query
$all_categories_args = array(
    'taxonomy'     => 'product_cat',
    'orderby'      => 'name',
    'show_count'   => 0,
    'pad_counts'   => 0,
    'hierarchical' => 1,
    'title_li'     => '',
    'hide_empty'   => 0
);
$all_categories = get_categories($all_categories_args);


// Best Selling Section Query
$best_selling = array(
    'post_type'      => 'product',
    'meta_query'     => array(
        'relation' => 'OR',
        array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
    )
);
$best_selling_loop = new WP_Query($best_selling);


?>

<div id="BA_woocommerce" class="content-area">
    <?php if (is_front_page()) : ?>

        <div class="home-page mb-5">
            <div class="slider-area">
                <div class="slider-active owl-dot-style owl-carousel">
                    <?php while ($sliders->have_posts()) : $sliders->the_post(); ?>
                        <div class="single-slider pt-175 pb-258 bg-img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
                            <div class="container">
                                <div class="slider-content slider-animated-1">
                                    <h3 class="animated"><?php echo get_field('slider_subtitle') ?></h3>
                                    <h1 class="animated"><?php the_title(); ?></h1>
                                    <h5 class="animated"><?php the_excerpt(); ?></h5>
                                    <div class="slider-btn mt-45">
                                        <a class="animated" href="<?php echo wc_get_page_permalink('shop'); ?>">shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="banner-area">
                <div class="container">
                    <div class="banner-wrap">
                        <div class="row">
                            <?php for ($i = 0; $i <= 3; $i++) : ?>
                                <?php $thumbnail_id = get_woocommerce_term_meta($all_categories[$i]->term_taxonomy_id, 'thumbnail_id', true);
                                        $image = wp_get_attachment_url($thumbnail_id);
                                        if ($image) :
                                            ?>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single-banner img-zoom mb-30">
                                            <a href="<?php echo wc_get_page_permalink('shop'); ?>">
                                                <img src=" <?php echo $image ?>" alt="">
                                            </a>
                                            <div class="banner-content">
                                                <h4><?php echo $all_categories[$i]->name ?></h4>
                                                <a href="<?php echo wc_get_page_permalink('shop'); ?>">shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php endif;
                                endfor; ?>
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
                            <?php for ($i = 0; $i <= 4; $i++) :
                                    if ($all_categories[$i]->count !== 0) :
                                        echo '
                        <a data-toggle="tab" href="#' . $all_categories[$i]->slug . '">
                            <h4>' . $all_categories[$i]->name . '</h4>
                        </a>
                        ';

                                    endif;
                                endfor; ?>
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
                                                <?php $image4 = wp_get_attachment_image_src(get_post_thumbnail_id($all_products->post->ID), ''); ?>
                                                <img src="<?php echo $image4[0]; ?>" data-id="<?php echo $all_products->post->ID; ?>">
                                            </a>
                                            <?php if ($percentage) :
                                                        echo '<span>-' . $percentage . '%</span>';
                                                    endif; ?>
                                            <div class="product-action product-buttons">
                                                <a role="button" aria-label="Add to Wishlist" class="action-wishlist tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after" data-tinv-wl-list="[]" data-tinv-wl-product="<?php echo get_the_ID(); ?>" data-tinv-wl-productvariation="" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span class="tinvwl_add_to_wishlist-text"> <i class="icon-heart"></i></span></a>


                                                <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr($product->get_id()); ?>" class="button action-cart ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart"> <i class="icon-handbag"></i></a>
                                                <?php echo do_shortcode('[woosq id="' . $product->id . '"]') ?>
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
                        <?php


                            ?>
                        <?php for ($i = 0; $i <= 4; $i++) :
                                $products = new WP_Query(array(
                                    'post_type'      => 'product',
                                    'posts_per_page' => 10,
                                    'product_cat'    => $all_categories[$i]->slug

                                ));
                                if ($all_categories[$i]->count !== 0) :
                                    ?>

                                <div id="<?php echo $all_categories[$i]->slug ?>" class="tab-pane">
                                    <div class="featured-product-active owl-carousel product-nav">
                                        <?php
                                                    while ($products->have_posts()) : $products->the_post();
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
                                                        <?php $image4 = wp_get_attachment_image_src(get_post_thumbnail_id($products->post->ID), ''); ?>
                                                        <img src="<?php echo $image4[0]; ?>" data-id="<?php echo $products->post->ID; ?>">
                                                    </a>

                                                    <?php if ($percentage) :
                                                                        echo '<span>-' . $percentage . '%</span>';
                                                                    endif; ?>
                                                    <div class="product-action product-buttons">
                                                        <a role="button" aria-label="Add to Wishlist" class="action-wishlist tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after" data-tinv-wl-list="[]" data-tinv-wl-product="<?php echo get_the_ID(); ?>" data-tinv-wl-productvariation="" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span class="tinvwl_add_to_wishlist-text"> <i class="icon-heart"></i></span></a>


                                                        <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr($product->get_id()); ?>" class="button action-cart ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart"> <i class="icon-handbag"></i></a>
                                                        <?php echo do_shortcode('[woosq id="' . $product->id . '"]') ?>
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
                        <?php endif;
                            endfor; ?>
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
                            <?php while ($best_selling_loop->have_posts()) : $best_selling_loop->the_post();
                                    global $product;

                                    if ($product->sale_price) :
                                        $percentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                                    else :
                                        $percentage = '';
                                    endif;
                                    ?>

                                <div class="single-best-selling">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-5 col-md-6">
                                            <div class="single-best-img">
                                                <?php $image4 = wp_get_attachment_image_src(get_post_thumbnail_id($best_selling_loop->post->ID), ''); ?>
                                                <img class="tilter" src="<?php echo $image4[0]; ?>" data-id="<?php echo $best_selling_loop->post->ID; ?>">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-7 col-md-6 align-self-center">
                                            <div class="deals-content text-center deal-mrg">
                                                <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/icon-img/deals-2.png' ?>">
                                                <h2>Hot Deal ! Sale Up To <span><?php echo $percentage; ?>% Off</span></h2>
                                                <?php the_excerpt(); ?>

                                                <div class="timer timer-style">
                                                    <div data-countdown="<?php echo date("Y-m-d", strtotime($product->get_date_on_sale_to())) ?>"></div>
                                                </div>
                                                <div class="deals-btn">

                                                    <a href="<?php the_permalink(); ?>">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
                $hot_flowers = new WP_Query(array(
                    'post_type'      => 'product',
                    'posts_per_page' => 10,
                    'product_cat'    => 'hot-flowers'

                )); ?>
            <div class="product-area pt-70 pb-70">
                <div class="container">
                    <div class="product-top-bar section-border mb-35">
                        <div class="section-title-wrap">
                            <h3 class="section-title section-bg-white">Hot Flower</h3>
                        </div>
                    </div>
                    <div class="featured-product-active hot-flower owl-carousel product-nav">
                        <?php
                            while ($hot_flowers->have_posts()) : $hot_flowers->the_post();
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
                                        <?php $image4 = wp_get_attachment_image_src(get_post_thumbnail_id($hot_flowers->post->ID), ''); ?>
                                        <img src="<?php echo $image4[0]; ?>" data-id="<?php echo $hot_flowers->post->ID; ?>">
                                    </a>
                                    <?php if ($percentage) :
                                                echo '<span>-' . $percentage . '%</span>';
                                            endif; ?>
                                    <div class="product-action product-buttons">
                                        <a role="button" aria-label="Add to Wishlist" class="action-wishlist tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after" data-tinv-wl-list="[]" data-tinv-wl-product="<?php echo get_the_ID(); ?>" data-tinv-wl-productvariation="" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span class="tinvwl_add_to_wishlist-text"> <i class="icon-heart"></i></span></a>


                                        <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr($product->get_id()); ?>" class="button action-cart ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart"> <i class="icon-handbag"></i></a>
                                        <?php echo do_shortcode('[woosq id="' . $product->id . '"]') ?>
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
