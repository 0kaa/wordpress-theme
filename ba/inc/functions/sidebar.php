<?php
/**
 * Register Sidebar
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


/**
 * Default Sidebars
 */
if (!function_exists('BA_sidebar')) {
	function BA_sidebar() {

		register_sidebar(array(
            'name'          => (!is_rtl()) ? 'Blog' : 'الخدمات',
            'id'            => 'blog_sidebar',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>' 
        ));
        
		register_sidebar(array(
            'name'          => (!is_rtl()) ? 'WooCommerce' : 'المتجر',
            'id'            => 'wocomerce_sidebar',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>' 
        )); 
        
        if(!empty(ba_option('services_pt'))) { 
            register_sidebar(array(
                'name'          => (!is_rtl()) ? 'Services' : 'الخدمات',
                'id'            => 'services_sidebar',
                'class'         => '',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>' 
            ));
        }
        
        if(!empty(ba_option('projects_pt'))) { 
            register_sidebar(array(
                'name'          => (!is_rtl()) ? 'Projects' : 'المشاريع',
                'id'            => 'projects_pt_sidebar',
                'class'         => '',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>' 
            ));
        }
	}
}
add_action('widgets_init', 'BA_sidebar');

/**
 * Generate New Sidebar -[ Theme Option ]
 */
if (!function_exists('BA_new_sidebar')) {
    function BA_new_sidebar() {
        if(BA_option('generate_sidebar') != '' ) {
            
            foreach (BA_option('generate_sidebar') as $value) { 
        
                $ns_name = (isset($value['ns_name']) && !empty($value['ns_name'])) ? $value['ns_name'] : '';

                register_sidebar(array(
                    'name'  => $ns_name,
                    'id'    => str_replace(' ', '_', $ns_name),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => "</div>",
                    'before_title'  => '<div class="widget-title-wrap"><h4 class="widget-title"><span>',
                    'after_title'   => '</span></h4></div><div class="widget-warp">',
                ));
            }
        }
    }
}
add_action( 'init', 'BA_new_sidebar', 0 );

/**
 * Sidebar Usage
 *  echo BA_sidebar_select( $id );
 */
if (!function_exists('BA_sidebar_select')) {
  function BA_sidebar_select($index = 1) {
     $sidebar_contents = "";
     ob_start();
     dynamic_sidebar($index);
     $sidebar_contents = ob_get_clean();

     return $sidebar_contents;
  }
}
