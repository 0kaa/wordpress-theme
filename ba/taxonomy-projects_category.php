<?php
/**
 * The template for displaying projects categories pages
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
get_header(); ?>

<div id="primary" class="projects content-area mt50 mb50">
    <div class="container">
        
        <div class="tax-head mb-4">
            <h1 class="tax-title"><?php single_cat_title(); ?></h1>
            <?php if(!empty(term_description())): ?>
            <p class="tax-desc"><?php echo term_description(); ?></p>
            <?php endif; ?>
        </div>
        
        <div class="proj-tax">
            <div class="row">
                <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        get_template_part( 'template-parts/content-project' );
                    }
                } else {
                    echo '<div class="alert alert-warning">';
                    echo (!is_rtl()) ? 'Sorry, no projects were found': 'عذرا ، لم يتم العثور على مشاريع جديدة';
                    echo '</div>';
                }
                ?>
            </div>
            
            <?php ba_pagination(); ?>
        </div>
        
    </div>
</div>

<?php
get_footer();