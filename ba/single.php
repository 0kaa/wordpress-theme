<?php
/**
 * The template part for displaying single posts
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
get_header();
$next_post      = (!is_rtl()) ? 'Next Post':'المقال التالى';
$previous_post  = (!is_rtl()) ? 'Previous Post':'المقال السابق';
?>

<div id="primary" class="content-area mt-4">
    <div class="container">
        <div class="row">

            <?php if(!wp_is_mobile() && !empty(ba_option('share_buttons')) ) : ?>
            <div class="col-md-1">
                <div id="social">
                    <?php echo BA_social_share(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div id="main" class="site-main single-post col">

                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'single' );
        
                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation(
                        array(
                            /* translators: %s: parent post link */
                            'prev_text' => sprintf( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', '%title' ),
                        )
                    );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation(
                        array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . $next_post . '</span> ' .
                            '<span class="screen-reader-text">' . $next_post . '</span> <br/>' .
                            '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . $previous_post . '</span> ' .
                            '<span class="screen-reader-text">' . $previous_post . '</span> <br/>' .
                            '<span class="post-title">%title</span>',
                        )
                    );
            
                } endwhile; // End of the loop.
        
                get_template_part( 'template-parts/content', 'comments' );
                
                get_template_part( 'template-parts/content', 'related' );
        
                ?>

            </div>

            <?php if(!wp_is_mobile()) : ?>
            <?php if (is_active_sidebar('blog_sidebar') ) : ?>
            <div class="col-md-3">
                <div id="blog_sidebar">
                    <?php dynamic_sidebar('blog_sidebar');?>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<?php
get_footer();