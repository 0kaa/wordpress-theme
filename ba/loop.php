<?php
/**
 * The template for displaying loop
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<div id="main" class="site-main col">

    <?php if( !is_search() && is_category() ) : ?>
    <div class="cat-head mb-4">
        <h1 class="cat-title"><?php single_cat_title(); ?></h1>
        <?php if(!empty(term_description())): ?>
        <p class="cat-desc"><?php echo term_description(); ?></p>
        <?php endif; ?>
    </div>
    
    <?php elseif( is_search() ) : ?>
    <div class="page-header">
        <div class="alert <?php echo ((is_search() && 0 === $wp_query->found_posts))  ? 'alert-danger' : 'alert-success';  ?> p-4" role="alert">
            <h4 class="page-title">
                <?php 
                if((is_search() && 0 === $wp_query->found_posts)){
                printf( (!is_rtl()) ? 'Sorry no Results found': 'عذراً لايوجد نتائج لبحثك', '<span class="search-results">' . get_search_query() . '</span>' );
                } else {
                    printf( (!is_rtl()) ? 'Search Results for - %s': 'نتائج البحث ل %s', '<span class="search-results">' . get_search_query() . '</span>' );
                }
                ?>
            </h4>
            <div class="page-subtitle mb-3">
                <?php echo (!is_rtl()) ? 'If you\'re not happy with the results, please do another search': 'إذا لم تكن راضيًا عن النتائج ، فيرجى إجراء بحث آخر'; ?>
            </div>
            <?php get_search_form(); ?>
        </div>
    </div>
    
    <?php endif; ?>

    <div id="blog-layout" class="<?php echo (!is_search()) ? 'grid' : ''; ?> ">

        <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                
                if( is_search() ) {
                    
                    get_template_part( 'template-parts/content-search' );
                    
                } else {
                    
                    get_template_part( 'template-parts/content', get_post_format() );
                }
            }
        
        } else {
            echo '<div class="alert alert-warning">';
            echo (!is_rtl()) ? 'Sorry, no posts were found': 'عذرا ، لم يتم العثور على مواضيع جديدة';
            echo '</div>';
        }
        ?>

    </div>
    <?php ba_pagination(); ?>
    
</div>
