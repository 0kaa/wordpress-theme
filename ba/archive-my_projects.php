<?php
/**
 * The template for displaying projects pages
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly
wp_enqueue_script('mix', BA_TEMPLATE_URL . '/dist/js/mix.js', array('jquery'), '1.0.0', false);
$proj_desc  = (!empty(ba_option('proj_desc')) && !is_rtl() ) ? ba_option('proj_desc') : ba_option('proj_desc_ar');
get_header(); ?>

<div id="primary" class="projects content-area">
    <div class="container">

        <div class="tax-head mb-4">
            <h1 class="tax-title"><?php post_type_archive_title(); ?></h1>
            <p class="tax-desc"><?php echo $proj_desc; ?></p>
        </div>

        <div class="controls mb-4">
            <?php if(!wp_is_mobile()) : ?>
            <button type="button" class="control all" data-mixitup-control="" data-filter="all" data-cat="all"><?php echo (is_rtl()) ? 'كل المشاريع':'All Projects'; ?> </button>

            <?php $terms = get_terms( array( 'taxonomy' => 'projects_category', 'hide_empty' => true, 'order' => 'DESC', ));
            foreach($terms as $term){ ?>
            <button type="button" class="control" data-mixitup-control="" data-cat="<?php echo esc_html( $term->slug ); ?>" data-filter=".<?php echo esc_html( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></button>
            <?php } ?>

            <?php else: ?>

            <div class="proj-select">
                <button class="p-action-click sbt-click" data-toggle="sbt" data-target="#proj_filter" data-classes="sbt-active"><?php echo (!is_rtl()) ? 'Select projects category':'أختر تصنيف المشاريع'; ?></button>
            </div>
            
            <div id="proj_filter" class="proj-mob-filter sbt sbt-light" tabindex="-1">

                <div class="sbt-warp">
                    <div class="sbt-inner">

                        <div class="sbt-close"><button type="button" class="p-action-click mob-click"><i class="fas fa-times"></i></button></div>

                        <button type="button" class="control all" data-mixitup-control="" data-filter="all" data-cat="all"><?php echo (is_rtl()) ? 'كل المشاريع':'All Projects'; ?> </button>

                        <?php $terms = get_terms( array( 'taxonomy' => 'projects_category', 'hide_empty' => true, ));
                        foreach($terms as $term){ ?>
                        <button type="button" class="control" data-mixitup-control="" data-cat="<?php echo esc_html( $term->slug ); ?>" data-filter=".<?php echo esc_html( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></button>
                        <?php } ?>

                    </div>
                </div>

            </div>


            <?php endif; ?>
        </div>

        <div class="filter-items">

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