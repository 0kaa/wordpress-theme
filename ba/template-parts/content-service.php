<?php
/**
 * The template for displaying the service content
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<article id="post-<?php the_ID();?>" class="col-lg-3 col-md-6">
    <div class="serv-inner mb-4 position-relative">

        <div class="serv-thumbnail place_holder">

            <?php
            if ( has_post_thumbnail() ) :
            the_post_thumbnail('post-small', array('class' => 'img-fluid') );
            endif;
            ?>
        </div>

        <div class="serv-meta p-3 shadow-sm">
            <?php the_title('<h4 class="serv-title mb-2"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');?>
            <div class="proj-excerpt gray" itemprop="description"><?php echo excerpt(10); ?></div>
        </div>

        <a class="p-action-click stretched-link" href="<?php the_permalink(); ?>"> </a>

    </div>

</article>
