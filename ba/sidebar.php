<?php
/**
 * The template for the sidebar containing the main widget area
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<?php if (!empty(ba_option('sidebar')) && !wp_is_mobile() ) : ?>

<div id="secondary" class="widget-area col-md-3" aria-label="Blog Sidebar">
    <?php dynamic_sidebar('blog_sidebar');?>
</div>

<?php endif; ?>