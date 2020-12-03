<?php
/**
* Functions which enhance the theme Pagination
*
*/

defined( 'ABSPATH' ) || exit;
// Exit if accessed directly

/*
*  Pagination
* ******************************************************************* */
function ba_pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
    if ( null === $wp_query ) {
        global $wp_query;
    }

    $add_args = [];

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

    $pages = paginate_links( array_merge( [
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => (is_rtl()) ? '<i class="fas fa-chevron-right"></i>' : '<i class="fas fa-chevron-left"></i>',
            'next_text'    => (is_rtl()) ? '<i class="fas fa-chevron-left"></i>' : '<i class="fas fa-chevron-right"></i>',
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );

    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div id="pagination"><ul class="pagination d-flex justify-content-center">';

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item p-action-click' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}