<?php
/**
 * Register New Post Type
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

if (!function_exists('BA_post_type')) {
    function BA_post_type() {
        if(BA_option('post_type') != '' ) {
            
            foreach (BA_option('post_type') as $value) { 
        
                $pt_name            = (isset($value['pt_name'])         && !empty($value['pt_name']))           ? $value['pt_name'] : '';  
                $pt_english_name    = (isset($value['pt_english_name']) && !empty($value['pt_english_name']))   ? $value['pt_english_name'] : '';  
                $pt_arabic_name     = (isset($value['pt_arabic_name'])  && !empty($value['pt_arabic_name']))    ? $value['pt_arabic_name'] : '';
                $pt_supports        = (isset($value['pt_supports'])     && !empty($value['pt_supports']))       ? $value['pt_supports'] : '';
                $pt_icon            = (isset($value['pt_icon']['url'])  && !empty($value['pt_icon']['url']))    ? $value['pt_icon']['url']: '';
                $name               = (is_rtl()) ? $pt_arabic_name : $pt_english_name ;
                
                $pt_name        = str_replace(' ', '_', $pt_name);
                $pt_name        = strtolower($pt_name);
                
                $category_slug  = $pt_name.'s';
                $tag_slug  = $pt_name.'t';
                
                $category_name  = $category_slug.' Categories';
                $tags_name  = $tag_slug.' Tags';
                
                $labels = array( 
                    'name' => $name, 
                    'parent_item_colon' => '' 
                );   

                $args = array( 
                    'labels' => $labels, 
                    'public' => true, 
                    'menu_icon' => $pt_icon,
                    'publicly_queryable' => true, 
                    'show_ui' => true, 
                    'query_var' => true, 
                    'rewrite' => array( 
                        'slug' => $pt_name,
                        'with_front'=> false
                    ), 
                    'capability_type' => 'post', 
                    'hierarchical' => true,
                    'has_archive' => true,  
                    'menu_position' => null, 
                    'supports' => $pt_supports 
                );   

                register_post_type( $pt_name , $args ); 

                register_taxonomy( $category_slug, array($pt_name), array(
                    'hierarchical' => true, 
                    'show_admin_column' => true, 
                    'default_term'       => 'Uncategorized',
                    'label' => $category_name, 
                    'rewrite' => array( 
                        'slug' => $category_slug,
                        'with_front'=> false )
                    )
                );
                
                register_taxonomy_for_object_type( $category_slug, $pt_name );
                
                register_taxonomy( $tag_slug, array($pt_name), array(
                    'hierarchical' => false, 
                    'show_admin_column' => true, 
                    'label' => $tags_name, 
                    'rewrite' => array( 
                        'slug' => $tag_slug,
                        'with_front'=> false )
                    )
                );

                register_taxonomy_for_object_type( $tag_slug, $pt_name );
                
                flush_rewrite_rules(); 
            }
        }
    }
}

add_action( 'init', 'BA_post_type' );


// Post type loop
if (!function_exists('BA_pt_loop')) {
    function BA_pt_loop($type ,$num, $temp) {
        $args = array( 'post_type' => $type, 'posts_per_page' => $num,);
        
        $pt_loop = new WP_Query($args);
        
        if ($pt_loop->have_posts()) {
        
            while ($pt_loop->have_posts()) {
                $pt_loop->the_post();
        
                get_template_part( $temp );
        
            }
        
        } else {
            echo '<div class="alert alert-warning">';
            echo (!is_rtl()) ? 'Sorry, no posts were found': 'عذرا ، لم يتم العثور على مواضيع جديدة';
            echo '</div>';
        }
        
        wp_reset_postdata();
    }
}
