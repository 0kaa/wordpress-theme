<?php
/*
 * The template for displaying the post Comments
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

?>

<div class="comment-warp">

    <div class="text-center">
        <div class="reacted mb-4">
            
            <div class="comment-number">
                <span><?php echo get_comments_number($post->ID); ?></span>
            </div>
            
            <h3 class="h-m"><?php echo (!is_rtl()) ? 'People reacted to this post.' : 'رد الناس على هذا المقال.'; ?></h3>
        </div>
        <button id="comment_button" type="button" class="btn btn-primary">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            <?php echo (!is_rtl()) ? 'Show Comments' : 'إظهار التعليقات'; ?>
        </button>
    </div>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
    ?>
</div>
