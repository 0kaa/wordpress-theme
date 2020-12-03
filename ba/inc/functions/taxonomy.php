<?php
/**
 * The template for displaying the Custom taxonomies
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


/*
 * Services
 */
if(!empty(ba_option('services_pt'))) {
    function BA_service_post_type() {
        register_post_type( 'my_services',
            array(
                'labels' => array(
                    'name'              => (!is_rtl()) ? 'Services' : 'الخدمات',
                ),
                'rewrite'             => array( 'slug' => 'services'),
                'supports'            => array('title','thumbnail','editor','excerpt','revisions','page-attributes'),   
                'capability_type'     => 'post',
                'public'              => true,
                'hierarchical'        => true,
                'menu_icon'           => 'dashicons-admin-generic',    
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'exclude_from_search' => false,
                'has_archive'         => true,
                'menu_position'       => 5,
            )
        );
        flush_rewrite_rules();
    }
    add_action( 'init', 'BA_service_post_type', 0 );


    // Service Categories
    function BA_service_post_type_categories() {
        register_taxonomy(
            'services_category',
            'my_services', // post type name

            array(
                'label'        => (!is_rtl()) ? 'Service categories' : 'تصنيفات الخدمات',
                'sort'         => true,
                'hierarchical' => true,
                'has_archive' => true,
                'default_term'       => 'Uncategorized',
                'show_admin_column' => true,
                'args'         => array('orderby' => 'term_order'),
                'rewrite'      => array(
                    'slug' => 'service', // Link
                    'hierarchical' => true,
                    'with_front' => true
                ),
            )
        );
        flush_rewrite_rules();
    }
    add_action('init', 'BA_service_post_type_categories', 0);

    // Service Tags
    function BA_service_post_type_tags() {
      $labels = array(
        'name' => (!is_rtl()) ? 'Service tags' : 'وسوم الخدمات',
      ); 

      register_taxonomy(
          'services_tags',
          'my_services', // post type name

          array(
              'hierarchical' => false,
              'labels' => $labels,
              'show_ui' => true,
              'show_admin_column' => true,
              'update_count_callback' => '_update_post_term_count',
              'query_var' => true,
              'rewrite' => true,
          ));
    }
    add_action( 'init', 'BA_service_post_type_tags', 0 );
    
    /* Set Post Per Page Numbers */
    function set_posts_per_page_for_services_cpt( $query ) {
        $post_per_page  = (!empty(ba_option('serv_post_per_page'))) ? ba_option('serv_post_per_page') : '';
        if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'my_services' ) ) {
            $query->set( 'posts_per_page', $post_per_page );
        }
    }
    add_action( 'pre_get_posts', 'set_posts_per_page_for_services_cpt' );
}


/*
 * Projects
 */
if(!empty(ba_option('projects_pt'))) { 
    function BA_project_post_type() {
        register_post_type( 'my_projects',
            array(
                'labels' => array(
                    'name'              => (!is_rtl()) ? 'Projects' : 'المشاريع',
                ),
                'rewrite'             => array( 'slug' => 'projects'),
                'supports'            => array('title','thumbnail','editor','excerpt','revisions','page-attributes'),  
                'capability_type'     => 'post',
                'public'              => true,
                'hierarchical'        => true,
                'menu_icon'           => 'dashicons-format-gallery',    
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'exclude_from_search' => false,
                'has_archive'         => true,
                'menu_position'       => 5,
            )
        );
        flush_rewrite_rules();
    }
    add_action( 'init', 'BA_project_post_type', 0 );


    // Projects Categories
    function BA_project_post_type_categories() {
        register_taxonomy(
            'projects_category',
            'my_projects', // post type name

            array(
                'label'        => (!is_rtl()) ? 'Projects categories' : 'تصنيفات المشاريع',
                'sort'         => true,
                'hierarchical' => true,
                'has_archive' => true,
                'default_term'       => 'Uncategorized',
                'show_admin_column' => true,
                'args'         => array('orderby' => 'term_order'),
                'rewrite'      => array(
                    'slug' => 'project', // Link
                    'hierarchical' => true,
                    'with_front' => true),
            )
        );
        flush_rewrite_rules();
    }
    add_action('init', 'BA_project_post_type_categories', 0);

    // Projects Tags
    function BA_project_post_type_tags() {
      $labels = array(
        'name' => (!is_rtl()) ? 'Projects tags' : 'وسوم المشاريع',
      ); 

      register_taxonomy(
          'projects_tags',
          'my_projects', // post type name

          array(
              'hierarchical' => false,
              'labels' => $labels,
              'show_ui' => true,
              'update_count_callback' => '_update_post_term_count',
              'query_var' => true,
              'rewrite' => true,
          ));
    }
    add_action( 'init', 'BA_project_post_type_tags', 0 );
    
    function set_posts_per_page_for_projects_cpt( $query ) {
        $post_per_page  = (!empty(ba_option('proj_post_per_page'))) ? ba_option('proj_post_per_page') : '';
        if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'my_projects' ) ) {
            $query->set( 'posts_per_page', $post_per_page );
        }
    }
    add_action( 'pre_get_posts', 'set_posts_per_page_for_projects_cpt' );
    
}