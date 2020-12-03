<?php
/**
 * The main template file
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly
get_header(); ?>

<div id="primary" class="content-area">
    <div class="container">
        <div class="row">
            <?php
            get_template_part('loop');
            get_sidebar();
            ?>
        </div>
    </div>
</div>

<?php
get_footer();