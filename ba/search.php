<?php
/**
 * The template for displaying search results pages
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
get_header(); ?>

<div id="primary" class="content-area container">

    <div class="row">
        <?php
        get_template_part('loop');
        get_sidebar();
        ?>
    </div>

</div>

<?php
get_footer();