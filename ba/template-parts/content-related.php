<?php
/*
 * The template for displaying the post content RELATED
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

$args = array( 
    'post_type'         => 'post',
    'orderby'           => 'rand',
    'posts_per_page'    => 3,
    'post__not_in'      => array(get_the_ID()) );
    
    $the_query = new WP_Query( $args );
                
    if( $the_query->have_posts() ) : ?>
    <div class="related-posts mb-4 mt-5">
        <h2 class="mb-4"><?php echo (!is_rtl()) ? 'Related Posts': 'أخبار قد تهمك'; ?> </h2>

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