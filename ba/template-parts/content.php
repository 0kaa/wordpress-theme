<?php
/**
 * The template for displaying the post content
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
$thumbnail = (is_single()) ? 'post-small':'post-thumb'; ?>

<article id="post-<?php the_ID();?>" class="post-article grid-item <?php content_style(); ?> ">
    <div class="grid-sizer">
        <div class="post-inner">

            <div class="post-thumbnail place_holder">
                
                <?php echo (has_post_format('video')) ? '<div class="play-button video-button"> <div class="play-inner"> <i class="fas fa-play"></i> </div> </div>' : ''; ?>
                <?php echo (has_post_format('audio')) ? '<div class="play-button audio-button"> <div class="play-inner"> <i class="fas fa-headphones"></i> </div> </div>' : ''; ?>

                <?php
                if ( has_post_thumbnail() ) :
                the_post_thumbnail($thumbnail, array('class' => 'img-fluid') );
                endif;
                ?>

                <div class="post-meta">
                    <?php the_title('<h3 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');?>
                </div>

                <div class="post-more"><?php echo (is_rtl()) ? '<i class="fas fa-chevron-left"></i>':'<i class="fas fa-chevron-right"></i>'; ?></div>

                <a class="p-action-click stretched-link" href="<?php the_permalink(); ?>"> </a>
            </div>

        </div>
    </div>
</article>