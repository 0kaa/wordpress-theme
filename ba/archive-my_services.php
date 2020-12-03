<?php
/**
 * The template for displaying services pages
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly
$serv_desc  = (!empty(ba_option('serv_desc')) && !is_rtl() ) ? ba_option('serv_desc') : ba_option('serv_desc_ar') ;
get_header(); ?>

<div id="primary" class="services content-area">
    <div class="container">

        <div class="tax-head mb-4">
            <h1 class="tax-title"><?php post_type_archive_title(); ?></h1>
            <p class="tax-desc"><?php echo $serv_desc; ?></p>
        </div>
        
        <div class="row">
            <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
                    get_template_part( 'template-parts/content-service' );
                }
            } else {
                echo '<div class="alert alert-warning">';
                echo (!is_rtl()) ? 'Sorry, no new service were found': 'عذرا ، لم يتم العثور على أى خدمة جديدة';
                echo '</div>';
            }
            ?>
        </div>

        <?php ba_pagination(); ?>

    </div>
</div>

<?php
get_footer();