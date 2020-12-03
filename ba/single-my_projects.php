<?php
/**
 * The template part for displaying projects posts
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
get_header();
$proj_opt       = get_post_meta( get_queried_object_id(), 'pro_opt', true );
$proj_gallery   = ( !empty($proj_opt['proj_gallery']) ) ? $proj_opt['proj_gallery'] : '';
$thumbnail_size = (wp_is_mobile()) ? 'post-large' : 'post-single';
$thumbnail      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "post-large" );
?>

<div id="primary" class="content-area mt-4">
        <div class="container">
            <div class="row">


                <div id="main" class="site-main single-article <?php echo (wp_is_mobile()) ? 'col' : 'col-md-9'; ?>">

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                    the_post(); ?>


                    <div class="entry-title">
                        <h1 class="h-l"><?php the_title();?></h1>
                    </div>

                    <div class="proj-gallery mb-5">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <div class="thumbnail-single place_holder mb-2">
                            <a href="<?php echo $thumbnail[0]; ?>" data-rel="lightcase:myCollection" data-lc-categories="post-<?php the_ID();?>">
                            <?php the_post_thumbnail($thumbnail_size, array('class' => 'img-fluid') ); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div id="projects_single" class="owl-carousel">
                            <?php
                            $gallery_ids = explode( ',', $proj_gallery );

                            if ( ! empty( $gallery_ids ) ) :
                            foreach ( $gallery_ids as $gallery_item_id ) : ?>

                                <a href="<?php echo wp_get_attachment_url( $gallery_item_id ); ?>" data-rel="lightcase:myCollection" data-lc-categories="post-<?php the_ID();?>">
                                    <?php echo wp_get_attachment_image( $gallery_item_id, 'post-small', '', array( "class" => "img-fluid" ) ); ?>
                            </a>

                            <?php
                            endforeach;
                            endif;                
                            ?>
                        </div>
                    </div>


                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php $terms = get_the_term_list( $post->ID, 'projects_tags', '', ', ', '' );
                    if ( !empty( $terms ) ) : ?>
                    <div class="entry-tags">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <?php echo $terms; ?>
                    </div>
                    <?php endif; ?>

                    <?php endwhile; ?>

                    <?php 
                    // Other Projects
                    $args = array( 
                        'post_type'         => 'my_projects',
                        'orderby'           => 'rand',
                        'posts_per_page'    => 3,
                        'post__not_in'      => array(get_the_ID()) );

                    $the_query = new WP_Query( $args );

                    if( $the_query->have_posts() ) : ?>
                    <div class="related-posts mb-4 mt-5">
                        <h2 class="mb-4"><?php echo (!is_rtl()) ? 'Other Projects': 'مشاريع أخرى'; ?> </h2>

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
                <?php if (is_active_sidebar('projects_pt_sidebar') ) : ?>
                <div class="col-md-3">
                    <div id="blog_sidebar" class="projects-sidebar">
                        <?php dynamic_sidebar('projects_pt_sidebar');?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php
get_footer();