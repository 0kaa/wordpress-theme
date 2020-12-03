<?php
/**
 * The template part for displaying services posts
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

get_header();

$thumbnail = (wp_is_mobile()) ? 'post-large':'post-single'; ?>

<div id="primary" class="content-area mt-4">
    <div class="container">
        <div class="row">


            <div id="main" class="site-main single-article col">

                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                the_post(); ?>

                <div class="entry-title">
                    <h1 class="h-l"><?php the_title();?></h1>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail-single place_holder mb-4">
                    <?php the_post_thumbnail($thumbnail, array('class' => 'img-fluid') ); ?>
                </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php $terms = get_the_term_list( $post->ID, 'services_tags', '', ', ', '' );
                if ( !empty( $terms ) ) : ?>
                <div class="entry-tags">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <?php echo $terms; ?>
                </div>
                <?php endif; ?>

                <?php endwhile; ?>
                
                <div class="serv-form mt-5 mb-5">
                    <?php 
                    $contact_ID = ( ba_option('serv_form_id') != '' ) ? ba_option('serv_form_id') : '';
                    echo do_shortcode($contact_ID); ?>
                </div>

                <?php 
                // Other Services
                $args = array( 
                    'post_type'         => 'my_services',
                    'orderby'           => 'rand',
                    'posts_per_page'    => 3,
                    'post__not_in'      => array(get_the_ID()) );
    
                $the_query = new WP_Query( $args );
                
                if( $the_query->have_posts() ) : ?>
                <div class="related-posts mb-4 mt-5">
                    <h2 class="mb-4"><?php echo (!is_rtl()) ? 'Other Services': 'خدمات أخرى'; ?> </h2>

                    <div class="grid">

                        <?php
                        while( $the_query->have_posts() ){
                            $the_query->the_post();
                            get_template_part( 'template-parts/content');
                        }
                        ?>

                    </div>
                </div>
                <?php endif; ?>

            </div>

            <?php if(!wp_is_mobile()) : ?>
            <?php if (is_active_sidebar('services_sidebar') ) : ?>
            <div class="col-md-3">
                <div id="blog_sidebar" class="services-sidebar">
                    <?php dynamic_sidebar('services_sidebar');?>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php
get_footer();