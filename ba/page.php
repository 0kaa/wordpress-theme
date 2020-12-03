<?php
/**
 * The template for displaying pages
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    the_content();
    endwhile;
    endif;
    ?>
</div>

<?php
get_footer();