<?php
/**
 * The template for displaying the project content
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<article id="post-<?php the_ID();?>" class="col-lg-3 col-md-6 mix <?php $terms = get_the_terms( get_the_ID(), 'projects_category' ); foreach ( $terms as $term ) { echo $term->slug.' ';} ?>">
    <div class="proj-inner mb-4 position-relative">
        
        <div class="proj-thumbnail place_holder">
            <?php

            if ( has_post_thumbnail() ) :
            the_post_thumbnail('post-small', array('class' => 'img-fluid') );
            endif;

            echo '<div class="proj-cat">';
            $terms = get_the_terms( get_the_ID(), 'projects_category' );
            foreach ( $terms as $term ) {
                echo '<span>'.$term->name.' </span>';
            }
            echo '</div>';

            ?>
        </div>


        <div class="proj-meta p-3 shadow-sm">
            <?php the_title('<h4 class="proj-title mb-2"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');?>
            <div class="proj-excerpt gray" itemprop="description"><?php echo excerpt(10); ?></div>
        </div>

        <a class="p-action-click stretched-link" href="<?php the_permalink(); ?>"> </a>

    </div>
</article>