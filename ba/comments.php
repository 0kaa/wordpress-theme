<?php
/**
 * The template for displaying comments
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ){
	return;
}

if ( have_comments() || comments_open() ) : ?>

<div id="comments" class="comments-area">

		<h2 class="comments-title h-m mb-4">
            <?php echo (!is_rtl()) ? 'Comments' : 'التعليقات'; ?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
                'avatar_size' => 48,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php echo (!is_rtl()) ? 'Comments are closed.' : 'التعليقات مغلقه'; ?></p>
			<?php
		endif;

	comment_form();
    ?>

</div><!-- #comments -->
<?php endif; // Check for have_comments() || comments_open() ?>