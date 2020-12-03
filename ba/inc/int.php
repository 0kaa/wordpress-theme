<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/*
* Remove P 
*/
add_filter('wpcf7_autop_or_not', '__return_false');

/*
 * Excerpt Length
 */
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*
 * Filter the categories archive widget to add a span around post count.
 */
function BA_cat_count_span( $links ) {
	$links = str_replace( '</a>', '</a><span class="post-count">', $links );
	$links = str_replace( '', '</span>', $links );
	return $links;
}
add_filter( 'wp_list_categories', 'BA_cat_count_span' );

/*
 * Filter the archives widget to add a span around post count.
 */
function BA_archive_count_span( $links ) {
	$links = str_replace( '</a>', '</a><span class="post-count">', $links );
	$links = str_replace( '', '</span>', $links );
	return $links;
}
add_filter( 'get_archives_link', 'BA_archive_count_span' );

function categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post-count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','categories_postcount_filter');


/*
* Remove P 
*/
add_filter('wpcf7_autop_or_not', '__return_false');
