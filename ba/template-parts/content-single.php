<?php
/**
 * The template for displaying the post content SINGLE
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
$page_opt       = get_post_meta( get_the_ID(), 'page_opt', true );
$header_type    = (isset($page_opt['header_type']) && !empty($page_opt['header_type'])) ? $page_opt['header_type'] : '';
$thumbnail      = (wp_is_mobile()) ? 'post-large':'post-single';
?>

<article id="post-<?php the_ID();?>" <?php post_class(array('single-article'));?>>


    <div class="entry-title">
        <h1 class="h-l"><?php the_title();?></h1>
    </div>

    <?php if(!empty(ba_option('post_thumbnail'))) :
    if ( has_post_thumbnail() ) : ?>
    <div class="thumbnail-single place_holder">
        <?php the_post_thumbnail($thumbnail, array('class' => 'img-fluid') ); ?>
    </div>
    <?php 
    endif;
    endif;
    ?>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php echo (!empty(ba_option('share_buttons')) && wp_is_mobile() ) ? BA_social_share() : ''; ?>
    </div>

    <?php if(has_tag()) : ?>
    <div class="entry-tags ">
        <i class="fa fa-tags" aria-hidden="true"></i>
        <?php the_tags('', ''); ?>
    </div>
    <?php endif; ?>


</article><!-- #post-<?php the_ID();?> -->