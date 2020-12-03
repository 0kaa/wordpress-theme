<?php
/**
 * The template for displaying the post content
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<article id="post-<?php the_ID();?>" class="search-article mb-4 shadow-sm">
    <div class="row align-items-center">

        <div class="col">
            <div class="post-thumbnail place_holder position-relative">
                <?php
                if ( has_post_thumbnail() ) :
                the_post_thumbnail('post-small', array('class' => 'img-fluid') );
                endif;
                ?>
                <a class="p-action-click stretched-link" href="<?php the_permalink(); ?>"> </a>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="post-meta position-relative">
                <?php the_title('<h3 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');?>
                <div class="search-excerpt gray" itemprop="description"><?php echo excerpt(15); ?></div>
                <a class="p-action-click stretched-link" href="<?php the_permalink(); ?>"> </a>
            </div>
        </div>

    </div>
</article>
