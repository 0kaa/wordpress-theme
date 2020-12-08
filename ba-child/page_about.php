<?php

/**
 * The template for displaying pages
 * Template Name: About
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly

$heading = (!is_rtl()) ? get_field('about_heading') : get_field('about_heading_ar');
$description = (!is_rtl()) ? get_field('about_description') : get_field('about_description_ar');
$page_opt           = get_post_meta(get_queried_object_id(), 'page_opt', true);
$testimonials = new WP_Query(
    array(
        'post_type' => 'testimonials',
        'posts_per_page' => 3
        // Several more arguments could go here. Last one without a comma.
    )
);
get_header(); ?>
<?php echo (isset($page_opt['breadcrumb_switch']) && (!empty($page_opt['breadcrumb_switch']))) ? '' : ba_breadcrumbs(); ?>
<div class="about-us-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 d-flex align-items-center">
                <div class="overview-content-2">
                    <h2><?php echo $heading; ?></h2>
                    <?php echo $description; ?>
                    <div class="overview-btn mt-45">
                        <a class="btn-style-2" href="<?php echo wc_get_page_permalink('shop'); ?>"><?php echo (!is_rtl() ? 'Shop now!' : 'اشتري الان');  ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="overview-img text-center">
                    <a href="#">
                        <img src="<?php echo get_field('about_image')['url']; ?>" alt="about image">
                    </a>
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
<?php
get_footer();
