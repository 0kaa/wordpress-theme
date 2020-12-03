<?php
/**
 * The template for displaying the Metabox functions
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


// Projects
if( class_exists( 'CSF' ) ) {

    $proj_prefix = 'pro_opt';
    
    
    CSF::createMetabox( $proj_prefix, array(
        'title'     => 'Projects Options',
        'post_type' => 'my_projects',
    ));


    CSF::createSection( $proj_prefix, array(
        'title'  => 'Gallery',
        'fields' => array(
        
        array(
          'id'          => 'proj_gallery',
          'type'        => 'gallery',
          'title'       => 'Gallery',
          'add_title'   => 'Add Images',
          'edit_title'  => 'Edit Images',
          'clear_title' => 'Remove Images',
        ),
  
)));

}


// Other Post type
if( class_exists( 'CSF' ) ) {

    $prefix = 'page_opt';
    $main_color = '#1e272e';
    $sec_color = '#e74c3c';
    
    $post_types = array('post','page','product','my_services','my_projects');

    if(BA_option('post_type') != '' ) {
        foreach (BA_option('post_type') as $value) { 
            $pt_name    = (isset($value['pt_name']) && !empty($value['pt_name'])) ? $value['pt_name'] : '';
            $pt_name    = strtolower($pt_name);
            array_push($post_types,$pt_name);
        }
    }
    
    CSF::createMetabox( $prefix, array(
        'title'     => 'Page Options',
        'post_type' => $post_types,
    ));

    CSF::createSection( $prefix, array(
        'title'  => 'Breadcrumbs',
        'fields' => array(
        
            array(
                'id'          => 'remove_m_p',
                'type'        => 'switcher',
                'title'       => 'Remove Padding & Margin',
                'default' => false
            ),

            array(
                'id'          => 'header_type',
                'type'        => 'select',
                'title'       => 'Header Type',
                'placeholder' => 'Select an Header Type',
                'options'     => array(
                    'header-transparent'    => 'Transparent',
                    'header-light'          => 'Light',
                    'header-dark'           => 'Dark',
                ),
                'default'     => 'Light'
            ),
        

            array(
                'type'    => 'subheading',
                'content' => 'Breadcrumbs Options',
            ),

            array(
                'id'          => 'breadcrumb_switch',
                'type'        => 'switcher',
                'title'       => 'Remove Breadcrumbs',
                'default' => false
            ),
        
            array(
                'id'        => 'subheader',
                'type'      => 'background',
                'output'    => '.ba_breadcrumb',
                'output_mode' => 'background-image',
                'background_color' => false,
                'dependency' => array( 'header_type', '==', 'header-transparent' ),
                'title'     => 'Breadcrumb Background',
            ),
        
            array(
                'id'          => 'breadcrumb_bg',
                'type'        => 'color',
                'title'       => 'Breadcrumb Background Color',
                'output'      => '.breadcrumbs-transparent-on:before',
                'output_mode' => 'background-color',
                'dependency' => array( 'header_type', '==', 'header-transparent' ),
                'default'   => 'rgba(0,0,0,0.4)',
            ),
        
            array(
                'id'          => 'breadcrumb_text',
                'type'        => 'color',
                'title'       => 'Breadcrumb Text',
                'output' => array( '.breadcrumbs-transparent-on h1', '.breadcrumbs-transparent-on .breadcrumb li', '.breadcrumbs-transparent-on .breadcrumb li a' ),
                'dependency' => array( 'header_type', '==', 'header-transparent' ),
                'default'   => '#fff',
            ),
         
)));

}
