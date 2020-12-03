<?php
/**
 * The template for displaying the search form
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
    <div class="input-group">
        <input type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" class="form-control search-field" placeholder="<?php echo (!is_rtl()) ? 'Search for...': 'البحث عن...'; ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" value="Search"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>