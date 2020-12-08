<?php

defined('ABSPATH') || exit; // Exit if accessed directly

$main_color = '#1e272e';
$sec_color = '#e74c3c';

// Check core class for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'ba';

    // Create options
    CSF::createOptions($prefix, array(
        'menu_title'      => 'Options',
        'menu_slug'       => 'ba',
        'show_reset_all'  => true,
        'ajax_save'       => true,
        'theme'           => 'dark',
        //'menu_icon'       => BA_TEMPLATE_URL . '/dist/svg/admin-icon.svg',
    ));

    // General Options
    CSF::createSection($prefix, array(
        'title'  => 'General Options',
        'icon'      => 'fas fa-cogs',
        'fields' => array(

            array(
                'type'    => 'subheading',
                'content' => 'Logo Width',
            ),

            array(
                'id'       => 'logo_width',
                'type'     => 'dimensions',
                'height'     => false,
                'title'    => 'Logo Width',
                'default'  => array(
                    'width'  => '120',
                    'unit'   => 'px',
                ),
            ),

            array(
                'id'       => 'logo_sticky_width',
                'type'     => 'dimensions',
                'height'     => false,
                'title'    => 'Logo Sticky Width',
                'default'  => array(
                    'width'  => '100',
                    'unit'   => 'px',
                ),
            ),

            array(
                'id'       => 'logo_mobile_width',
                'type'     => 'dimensions',
                'height'     => false,
                'title'    => 'Logo Mobile Width',
                'default'  => array(
                    'width'  => '100',
                    'unit'   => 'px',
                ),
            ),

            array(
                'id'        => 'logo',
                'type'      => 'media',
                'library'      => 'image',
                'title'     => 'Logo',
            ),

            array(
                'id'        => 'logo_rtl',
                'type'      => 'media',
                'library'      => 'image',
                'title'     => 'Logo RTL',
            ),

            array(
                'type'    => 'subheading',
                'content' => 'Logo Sticky',
            ),

            array(
                'id'        => 'logo_sticky',
                'type'      => 'media',
                'library'      => 'image',
                'title'     => 'Logo Sticky',
            ),

            array(
                'id'        => 'logo_sticky_rtl',
                'type'      => 'media',
                'library'      => 'image',
                'title'     => 'Logo Sticky RTL',
            ),

            array(
                'type'    => 'subheading',
                'content' => 'Logo White',
            ),

            array(
                'id'        => 'logo_white',
                'type'      => 'media',
                'library'      => 'image',
                'title'     => 'Logo White',
            ),

            array(
                'id'        => 'logo_white_rtl',
                'type'      => 'media',
                'library'      => 'image',
                'title'     => 'Logo White Rtl',
            ),

            array(
                'type'    => 'subheading',
                'content' => 'Favicon',
            ),

            array(
                'id'        => 'favicon',
                'type'      => 'media',
                'library'   => 'image',
                'title'     => 'Favicon',
            ),

        )
    ));

    // Register Header
    CSF::createSection($prefix, array(
        'title'  => 'Header',
        'icon'      => 'fas fa-bars',
        'fields' => array(
            array(
                'id'          => 'welcome_message',
                'type'        => 'text',
                'title'       => 'Welcome Message',
                'default' => 'Default welcome msg!'
            ),
        )
    ));

    // Register New Sidebar
    CSF::createSection($prefix, array(
        'title'  => 'Blog',
        'icon'      => 'far fa-clipboard',
        'fields' => array(

            array(
                'id'          => 'grid_number',
                'type'        => 'select',
                'title'       => 'Grid Col number',
                'placeholder' => 'Select Grid Number',
                'options'     => array(
                    '2'     => '2',
                    '3'     => '3',
                    '4'     => '4',
                ),
                'default'     => '2'
            ),

            array(
                'id'          => 'sidebar',
                'type'        => 'switcher',
                'title'       => 'Sidebar',
                'default' => true
            ),

            array(
                'id'          => 'post_thumbnail',
                'type'        => 'switcher',
                'title'       => 'Post Single Thumbnail',
                'default' => false
            ),

            array(
                'id'          => 'share_buttons',
                'type'        => 'switcher',
                'title'       => 'Sahre Buttons',
                'default' => true
            ),
        )
    ));

    // Woocommerce
    CSF::createSection($prefix, array(
        'title'  => 'WooCommerce',
        'icon'      => 'fas fa-shopping-basket',
        'fields' => array(

            array(
                'id'          => 'wc_categories_menu',
                'type'        => 'switcher',
                'title'       => 'Menu Bar',
                'default' => false
            ),

            array(
                'id'          => 'wc_center',
                'type'        => 'text',
                'title'       => 'Shortcode in Menu Bar center',
                'dependency' => array('wc_categories_menu', '==', 'true'),
                'default' => '[apsw_search_bar_preview]'
            ),

            array(
                'id'          => 'wc_bar_wishlist',
                'type'        => 'switcher',
                'title'       => 'Wishlist',
                'dependency' => array('wc_categories_menu', '==', 'true'),
                'default' => true
            ),

            array(
                'id'          => 'wc_bar_wishlist_link',
                'type'        => 'text',
                'title'       => 'Wishlist page',
                'dependency' => array('wc_categories_menu', '==', 'true'),
                'default' => '/wishlist/'
            ),

            array(
                'id'          => 'prodcut_col',
                'type'        => 'select',
                'title'       => 'Product Col',
                'placeholder' => 'Select product number',
                'options'     => array(
                    '3'     => '3',
                    '4'     => '4',
                ),
                'default'     => '4'
            ),

            array(
                'id'          => 'WooCommerce_sidebar',
                'type'        => 'switcher',
                'title'       => 'Sidebar Single',
                'default' => true
            ),

            array(
                'id'          => 'wc_cat_options',
                'type'        => 'switcher',
                'title'       => 'Home categories',
                'default' => false
            ),

            array(
                'id'     => 'products',
                'type'   => 'repeater',
                'title'  => 'Categories types',
                'dependency' => array('wc_cat_options', '==', 'true'),
                'fields' => array(

                    array(
                        'id'          => 'secion_type',
                        'type'        => 'Radio',
                        'title'       => 'Section type',
                        'options'     => array(
                            'category'      => 'Category',
                            'banner'        => 'Banner',
                            'shortcodeid'   => 'Shortcode',
                            'html'          => 'Html',
                        ),
                        'default'           => ''
                    ),

                    // Categories
                    array(
                        'type'    => 'submessage',
                        'style'   => 'danger',
                        'content' => 'Add new category',
                        'dependency' => array('secion_type', '==', 'category'),
                    ),

                    array(
                        'id'    => 'heading',
                        'type'  => 'text',
                        'title' => 'Name - EN',
                        'dependency' => array('secion_type', '==', 'category'),
                    ),

                    array(
                        'id'    => 'heading_ar',
                        'type'  => 'text',
                        'title' => 'Name - AR',
                        'dependency' => array('secion_type', '==', 'category'),
                    ),

                    array(
                        'id'    => 'num',
                        'type'  => 'number',
                        'title' => 'Number of posts',
                        'dependency' => array('secion_type', '==', 'category'),
                    ),

                    array(
                        'id'          => 'slug',
                        'type'        => 'select',
                        'title'       => 'Category',
                        'placeholder' => 'Select a category',
                        'options'     => 'categories',
                        'dependency' => array('secion_type', '==', 'category'),
                        'query_args'  => array(
                            'taxonomy'  => 'product_cat',
                            'field'    => 'name',
                            'value_field' => 'slug',
                        ),
                    ),

                    // Banners
                    array(
                        'type'    => 'submessage',
                        'style'   => 'success',
                        'content' => 'Banner',
                        'dependency' => array('secion_type', '==', 'banner'),
                    ),

                    array(
                        'id'     => 'banner_repater',
                        'type'   => 'repeater',
                        'title'  => 'Add new banner',
                        'dependency' => array('secion_type', '==', 'banner'),
                        'fields' => array(

                            array(
                                'id'        => 'banner_img',
                                'type'      => 'media',
                                'library'      => 'image',
                                'title'     => 'Desktop image',
                            ),

                            array(
                                'id'        => 'banner_img_mobile',
                                'type'      => 'media',
                                'library'      => 'image',
                                'title'     => 'Mobile, Tablets image',
                            ),

                            array(
                                'id'    => 'banner_link',
                                'type'  => 'text',
                                'title' => 'Link',
                            ),

                        ),
                    ),

                    // Shortcode
                    array(
                        'type'    => 'submessage',
                        'style'   => 'info',
                        'content' => 'Shortcode',
                        'dependency' => array('secion_type', '==', 'shortcodeid'),
                    ),

                    array(
                        'id'    => 'wc_shortcode',
                        'type'  => 'text',
                        'title' => 'Shortcode',
                        'dependency' => array('secion_type', '==', 'shortcodeid'),
                    ),

                    // Html
                    array(
                        'type'    => 'submessage',
                        'style'   => 'danger',
                        'content' => 'Html',
                        'dependency' => array('secion_type', '==', 'html'),
                    ),

                    array(
                        'id'    => 'wc_html',
                        'type'  => 'wp_editor',
                        'title' => 'Html',
                        'dependency' => array('secion_type', '==', 'html'),
                    ),

                ),
            ),

        )
    ));


    // Contact Info
    CSF::createSection($prefix, array(
        'title'  => 'Contact info',
        'icon'      => 'fas fa-phone',
        'fields' => array(

            array(
                'type'    => 'heading',
                'content' => 'Map',
            ),

            array(
                'id'    => 'map_link',
                'type'  => 'text',
                'title' => 'Map Link',
            ),

            array(
                'id'    => 'map_height',
                'type'  => 'text',
                'title' => 'Map Height',
            ),

            array(
                'type'    => 'heading',
                'content' => 'Contact Form',
            ),

            array(
                'id'    => 'contact_heading',
                'type'  => 'text',
                'title' => 'Heading',
                'default' => 'How can we help you out? </br> Reach out to us now.'
            ),

            array(
                'id'    => 'contact_heading_ar',
                'type'  => 'text',
                'title' => 'Heading Arabic',
                'default' => 'كيف يمكننا مساعدتك؟ تواصل معنا الآن.'
            ),

            array(
                'id'    => 'contact_form',
                'type'  => 'text',
                'title' => 'Form Heading',
                'default' => 'Leave us a little info, and we’ll be in touch.'
            ),

            array(
                'id'    => 'contact_form_ar',
                'type'  => 'text',
                'title' => 'Form Heading Arabic',
                'default' => 'اترك لنا القليل من المعلومات ، وسنكون على اتصال.'
            ),

            array(
                'id'    => 'form_id',
                'type'  => 'text',
                'title' => 'Contact form 7 - ID',
            ),

            array(
                'type'    => 'heading',
                'content' => 'Contact information',
            ),

            array(
                'id'        => 'contact_info',
                'type'      => 'repeater',
                'title'     => 'Contact info',
                'subtitle'  => 'Shortcode - [contact-information]',
                'fields'    => array(

                    array(
                        'id'    => 'ci_icon_type',
                        'type'  => 'radio',
                        'title' => 'Icon Type',
                        'options'    => array(
                            'font' => 'Font',
                            'image' => 'Image',
                        ),
                        'default'    => 'font'
                    ),

                    array(
                        'id'    => 'ci_font_icon',
                        'type'  => 'icon',
                        'title' => 'Font',
                        'dependency' => array('ci_icon_type', '==', 'font'),
                    ),

                    array(
                        'id'    => 'ci_image_icon',
                        'type'  => 'media',
                        'title' => 'Image',
                        'dependency' => array('ci_icon_type', '==', 'image'),
                    ),

                    array(
                        'id'    => 'ci_dimensions',
                        'type'  => 'dimensions',
                        'title' => 'Image Dimensions',
                        'dependency' => array('ci_icon_type', '==', 'image'),
                        'default'  => array(
                            'width'  => '64',
                            'height' => '64',
                            'unit'   => 'px',
                        ),
                    ),

                    array(
                        'id'    => 'ci_heading',
                        'type'  => 'text',
                        'title' => 'Heading',
                    ),

                    array(
                        'id'    => 'ci_heading_rtl',
                        'type'  => 'text',
                        'title' => 'Heading (Arabic)',
                    ),

                    array(
                        'id'    => 'ci_description',
                        'type'  => 'text',
                        'title' => 'Description',
                    ),

                    array(
                        'id'    => 'ci_description_rtl',
                        'type'  => 'text',
                        'title' => 'Description (Arabic)',
                    ),

                    array(
                        'id'    => 'ci_link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ),

                    array(
                        'id'    => 'ci_css_class',
                        'type'  => 'text',
                        'title' => 'Css Class',
                        'desc'  => 'Only If you need to add Css Class',
                    ),

                ),
            ),

            array(
                'type'    => 'heading',
                'content' => 'Social Media',
            ),

            array(
                'id'        => 'social_media',
                'type'      => 'repeater',
                'title'     => 'Social Media',
                'subtitle'  => 'Shortcode - [social-icons]',
                'fields'    => array(

                    array(
                        'id'    => 'sm_icon_type',
                        'type'  => 'radio',
                        'title' => 'Icon Type',
                        'options'    => array(
                            'font' => 'Font',
                            'image' => 'Image',
                        ),
                        'default'    => 'font'
                    ),

                    array(
                        'id'    => 'sm_font_icon',
                        'type'  => 'icon',
                        'title' => 'Font',
                        'dependency' => array('sm_icon_type', '==', 'font'),
                    ),

                    array(
                        'id'    => 'sm_image_icon',
                        'type'  => 'media',
                        'title' => 'Image',
                        'dependency' => array('sm_icon_type', '==', 'image'),
                    ),

                    array(
                        'id'    => 'sm_dimensions',
                        'type'  => 'dimensions',
                        'title' => 'Image Dimensions',
                        'dependency' => array('sm_icon_type', '==', 'image'),
                        'default'  => array(
                            'width'  => '24',
                            'height' => '24',
                            'unit'   => 'px',
                        ),
                    ),

                    array(
                        'id'    => 'sm_name',
                        'type'  => 'text',
                        'title' => 'Name',
                    ),

                    array(
                        'id'    => 'sm_link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ),

                ),

            ),
        )
    ));

    // Register New Post Type
    CSF::createSection($prefix, array(
        'title'  => 'Post Type',
        'icon'      => 'fas fa-cog',
        'fields' => array(

            array(
                'type'    => 'heading',
                'content' => 'Services',
            ),

            array(
                'id'          => 'services_pt',
                'type'        => 'switcher',
                'title'       => 'Services',
                'default' => false
            ),

            array(
                'id'    => 'serv_desc',
                'type'  => 'textarea',
                'dependency' => array('services_pt', '==', 'true'),
                'title' => 'Description',
                'default' => 'Type services description here..'
            ),

            array(
                'id'    => 'serv_desc_ar',
                'type'  => 'textarea',
                'dependency' => array('services_pt', '==', 'true'),
                'title' => 'Description Arabic',
                'default' => 'اكتب وصف الخدمات هنا ..'
            ),

            array(
                'id'    => 'serv_post_per_page',
                'type'  => 'text',
                'dependency' => array('services_pt', '==', 'true'),
                'title' => 'Post per page',
                'default' => 6
            ),

            array(
                'id'    => 'serv_form_id',
                'type'  => 'text',
                'dependency' => array('services_pt', '==', 'true'),
                'title' => 'Contact form 7 - ID',
            ),

            array(
                'type'    => 'heading',
                'content' => 'Projects',
            ),

            array(
                'id'          => 'projects_pt',
                'type'        => 'switcher',
                'title'       => 'Projects',
                'default' => false
            ),

            array(
                'id'    => 'proj_desc',
                'type'  => 'textarea',
                'dependency' => array('projects_pt', '==', 'true'),
                'title' => 'Description',
                'default' => 'Type projects description here..'
            ),

            array(
                'id'    => 'proj_desc_ar',
                'type'  => 'textarea',
                'dependency' => array('projects_pt', '==', 'true'),
                'title' => 'Description Arabic',
                'default' => 'اكتب وصف المشاريع هنا ..'
            ),

            array(
                'id'    => 'proj_post_per_page',
                'type'  => 'text',
                'dependency' => array('projects_pt', '==', 'true'),
                'title' => 'Post per page',
                'default' => 20
            ),

            array(
                'type'    => 'heading',
                'content' => 'Add new post type',
            ),

            array(
                'id'        => 'post_type',
                'type'      => 'repeater',
                'title'     => 'Post type',
                'fields'    => array(

                    array(
                        'id'    => 'pt_name',
                        'type'  => 'text',
                        'title' => 'Post type',
                    ),

                    array(
                        'id'    => 'pt_english_name',
                        'type'  => 'text',
                        'title' => 'English Name',
                    ),

                    array(
                        'id'    => 'pt_arabic_name',
                        'type'  => 'text',
                        'title' => 'Arabic Name',
                    ),

                    array(
                        'id'    => 'pt_icon',
                        'type'  => 'media',
                        'title' => 'Icon',
                    ),

                    array(
                        'id'    => 'pt_supports',
                        'type'  => 'checkbox',
                        'title' => 'Supports',
                        'options'    => array(
                            'title'           => 'Title',
                            'editor'          => 'Editor',
                            'thumbnail'       => 'Thumbnail',
                            'comments'        => 'Comments',
                            'revisions'       => 'Tevisions',
                            'trackbacks'      => 'Trackbacks',
                            'author'          => 'Author',
                            'excerpt'         => 'Excerpt',
                            'page-attributes' => 'Page Attributes',
                            'post-formats'    => 'Post Formats',
                        ),
                        'default'    => array('title', 'editor', 'thumbnail')
                    ),
                ),
            ),

        )
    ));


    // Register New Sidebar
    CSF::createSection($prefix, array(
        'title'  => 'Sidebar',
        'icon'      => 'fas fa-align-left',
        'fields' => array(

            array(
                'id'        => 'generate_sidebar',
                'type'      => 'repeater',
                'title'     => 'Generate Sidebar',
                'fields'    => array(

                    array(
                        'id'    => 'ns_name',
                        'type'  => 'text',
                        'title' => 'Sidebar Name',
                    ),
                ),
            ),
        )
    ));


    CSF::createSection($prefix, array(
        'title'  => 'Libraries',
        'icon'      => 'fab fa-js',
        'fields' => array(

            array(
                'id'          => 'lightcase',
                'type'        => 'switcher',
                'title'       => 'Lightcase',
                'default' => false
            ),

            array(
                'id'          => 'wow_js',
                'type'        => 'switcher',
                'title'       => 'Wow JS',
                'default' => false
            ),
        )
    ));

    // Colors
    CSF::createSection($prefix, array(
        'title'  => 'Colors',
        'icon'      => 'fas fa-paint-brush',
        'fields' => array(

            array(
                'id'        => 'body',
                'type'      => 'color',
                'title'     => 'Body Background',
                'output'    => 'body',
                'output_mode' => 'background-color',
                'default'   => '#ffffff'
            ),

            array(
                'id'        => 'main_color',
                'type'      => 'color',
                'title'     => 'Main Color',
                'default'   => $main_color
            ),

            array(
                'id'        => 'sec_color',
                'type'      => 'color',
                'title'     => 'Second Color',
                'default'   => $sec_color
            ),

            // Light Header
            array(
                'type'    => 'subheading',
                'content' => 'Header Light',

            ),

            array(
                'id'        => 'header_light',
                'type'      => 'color',
                'title'     => 'Background',
                'output'    => '.header-light',
                'output_mode' => 'background-color',

                'default'   => '#fff'
            ),

            array(
                'id'        => 'header_light_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output'    => '
            .header-light .primary-menu > li > a, 
            .header-light .social-icons a, 
            .header-light .menu-toggle-btn, 
            .header-light .cart-open, 
            .wc-categories-bar .wc-right-menu li a, 
            .header-light .primary-menu > li .arrow',
                'output_mode' => 'color',

                'default'   => '#222'
            ),

            array(
                'id'        => 'header_light_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output'    => '
            .header-light .primary-menu > li > a:hover, 
            .header-light .social-icons a:hover, 
            .header-light .menu-toggle-btn:hover, 
            .wc-categories-bar .wc-right-menu li a:hover, 
            .header-light .primary-menu .current-menu-item .arrow,
            .header-light .primary-menu > li:hover .arrow, 
            .header-light .primary-menu .current-menu-item > a',
                'output_mode' => 'color',

                'default'   => $sec_color
            ),

            array(
                'id'          => 'breadcrumb_light_border',
                'type'        => 'color',
                'title'       => 'Breadcrumb Border Color',
                'output' => array('.header-light .cart-icon'),
                'output_mode' => 'border-color',
                'default'   => 'rgba(0,0,0,0.1)',
            ),

            // Dark Header
            array(
                'type'    => 'subheading',
                'content' => 'Header Dark',

            ),

            array(
                'id'        => 'header_dark',
                'type'      => 'color',
                'title'     => 'Header Dark Background',
                'output'    => '.header-dark',
                'output_mode' => 'background-color',

                'default'   => $main_color
            ),

            array(
                'id'        => 'header_dark_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output'    => '
            .header-dark .primary-menu > li > a,
            .header-dark .social-icons a,
            .header-dark .menu-toggle-btn,
            .header-dark .cart-open,
            .header-dark .primary-menu > li .arrow',
                'output_mode' => 'color',

                'default'   => '#fff'
            ),

            array(
                'id'        => 'header_dark_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output'    => '
            .header-dark .primary-menu > li > a:hover,
            .header-dark .social-icons a:hover,
            .header-dark .menu-toggle-btn:hover,
            .header-dark .primary-menu > li:hover .arrow,
            .header-dark .primary-menu .current-menu-item .arrow,
            .header-dark .primary-menu .current-menu-item > a',
                'output_mode' => 'color',

                'default'   => $sec_color
            ),

            array(
                'id'          => 'breadcrumb_dark_border',
                'type'        => 'color',
                'title'       => 'Breadcrumb Border Color',
                'output' => array('.header-dark .cart-icon'),
                'output_mode' => 'border-color',
                'default'   => 'rgba(255,255,255,0.3)',
            ),


            // Transparent Header
            array(
                'type'    => 'subheading',
                'content' => 'Header Transparent',

            ),

            array(
                'id'        => 'header_transparent',
                'type'      => 'color',
                'title'     => 'Header Transparent Background',

                'output'    => '.header-transparent',
                'output_mode' => 'background-color',
                'default'   => 'transparent'
            ),

            array(
                'id'        => 'header_transparet_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output'    => '
            .header-transparent .primary-menu > li > a,
            .header-transparent .social-icons a,
            .header-transparent .menu-toggle-btn,
            .header-transparent .cart-open,
            .header-transparent .primary-menu > li .arrow',
                'output_mode' => 'color',

                'default'   => '#fff'
            ),

            array(
                'id'        => 'header_transparet_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output'    => '
            .header-transparent .primary-menu > li > a:hover,
            .header-transparent .social-icons a:hover,
            .header-transparent .menu-toggle-btn:hover,
            .header-transparent .primary-menu > li:hover .arrow,
            .header-transparent .primary-menu .current-menu-item .arrow,
            .header-transparent .primary-menu .current-menu-item > a',
                'output_mode' => 'color',

                'default'   => $sec_color
            ),

            array(
                'id'          => 'breadcrumb_border',
                'type'        => 'color',
                'title'       => 'Breadcrumb Border Color',
                'output' => array('.header-transparent .header-wrapper', '.header-transparent .cart-icon'),
                'output_mode' => 'border-color',
                'default'   => 'rgba(0,0,0,0.1)',
            ),

            // Stick Header
            array(
                'type'    => 'subheading',
                'content' => 'Header Sticky',
            ),

            array(
                'id'        => 'header_sticky',
                'type'      => 'color',
                'title'     => 'Header Sticky Background',
                'output'    => '.header-show',
                'output_important'  => true,
                'output_mode' => 'background-color',
                'default'   => $main_color
            ),

            array(
                'id'        => 'header_sticky_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output_important' => 'true',
                'output'    => '
            .header-show .primary-menu > li > a,
            .header-show .social-icons a,
            .header-show .menu-toggle-btn,
            .header-show .cart-open,
            .header-show .primary-menu > li .arrow',
                'output_mode' => 'color',
                'default'   => '#fff'
            ),

            array(
                'id'        => 'header_sticky_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output_important' => 'true',
                'output'    => '
            .header-show .primary-menu > li > a:hover,
            .header-show .social-icons a:hover,
            .header-show .menu-toggle-btn:hover,
            .header-show .primary-menu > li .arrow:hover,
            .header-show .primary-menu .current-menu-item .arrow,
            .header-show .primary-menu .current-menu-item > a',
                'output_mode' => 'color',
                'default'   => $sec_color
            ),

            array(
                'id'          => 'breadcrumb_sticky_border',
                'type'        => 'color',
                'title'       => 'Breadcrumb Border Color',
                'output' => array('.header-show .header-wrapper', '.header-show .cart-icon'),
                'output_mode' => 'border-color',
                'default'   => 'rgba(255,255,255,0.1)',
            ),

            // Sub Menu
            array(
                'type'    => 'subheading',
                'content' => 'Sub Menu',
            ),

            array(
                'id'        => 'sub_menu_background',
                'type'      => 'color',
                'title'     => 'Background',
                'output' => array(
                    '.primary-menu > .nomega-menu-item .sub-menu',
                    '.wc-categories-bar .wc-right-menu li ul',
                    '.wc-categories-warp .wc-categories-menu',
                    '.wc-categories-warp .wc-categories-menu > .nomega-menu-item .sub-menu',
                ),
                'output_mode' => 'background-color',
                'default'   => '#fff'
            ),

            array(
                'id'        => 'sub_menu_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output' => array(
                    '.primary-menu > .nomega-menu-item .sub-menu .menu-item a',
                    '.wc-categories-bar .wc-right-menu li ul li a',
                    '.wc-categories-warp .wc-categories-menu li a',
                    '.wc-categories-warp .wc-categories-menu > .nomega-menu-item .sub-menu a',
                ),
                'output_mode' => 'color',
                'default'   => '#222'
            ),

            array(
                'id'        => 'sub_menu_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output' => array(
                    '.primary-menu > .nomega-menu-item .sub-menu .menu-item a:hover',
                    '.wc-categories-bar .wc-right-menu li ul li a:hover',
                    '.wc-categories-warp .wc-categories-menu li a:hover',
                    '.wc-categories-warp .wc-categories-menu > .nomega-menu-item .sub-menu a:hover',
                ),
                'output_mode' => 'color',
                'default'   => $sec_color
            ),

            array(
                'id'        => 'sub_menu_border_color',
                'type'      => 'color',
                'title'     => 'Border Color',
                'output' => array(
                    '.primary-menu > .nomega-menu-item .sub-menu .menu-item a',
                    '.wc-categories-bar .wc-right-menu li ul li a',
                    '.wc-categories-warp .wc-categories-menu li a',
                    '.wc-categories-warp .wc-categories-menu > .nomega-menu-item .sub-menu a',
                ),
                'output_mode' => 'border-color',
                'default'   => 'rgba(0,0,0,0.030)'
            ),


            // Mega Menu
            array(
                'type'    => 'subheading',
                'content' => 'Mega Menu',
            ),

            array(
                'id'        => 'mega_menu_background',
                'type'      => 'color',
                'title'     => 'Background',
                'output'    => '
            .primary-menu .mega-menu-item .depth0',
                'output_mode' => 'background-color',
                'default'   => $main_color
            ),

            array(
                'id'        => 'mega_menu_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output'    => '
            .primary-menu .mega-menu-item .depth0 a',
                'output_mode' => 'color',
                'default'   => '#fff'
            ),

            array(
                'id'        => 'mega_menu_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output'    => '
            .primary-menu .mega-menu-item .depth0 a:hover',
                'output_mode' => 'color',
                'default'   => $sec_color
            ),

            array(
                'id'        => 'mega_menu_border_color',
                'type'      => 'color',
                'title'     => 'Border Color',
                'output'    => '
            .primary-menu .mega-menu-item .depth0 .menu-item-has-children > a,
            .primary-menu .mega-menu-item .depth0 .depth1 li a, .primary-menu .mega-menu-item .depth0 .depth2 li a',
                'output_mode' => 'border-color',
                'default'   => 'rgba(255,255,255,0.10)'
            ),


            // WC Menu
            array(
                'type'    => 'subheading',
                'content' => 'WC Menu Bar',
            ),
            array(
                'id'        => 'wc_bar_menu_background',
                'type'      => 'color',
                'title'     => 'Background',
                'output' => array('.wc-categories-bar'),
                'output_mode' => 'background-color',
                'default'   => '#f6f6f6'
            ),


            array(
                'id'        => 'wc_bar_button_background',
                'type'      => 'color',
                'title'     => 'Button Color',
                'output' => array('.wc-categories-btn'),
                'output_mode' => 'background-color',
                'default'   => $sec_color
            ),

            array(
                'id'        => 'wc_bar_menu_font',
                'type'      => 'color',
                'title'     => 'Button Font Color',
                'output' => array('.wc-categories-btn'),
                'output_mode' => 'color',
                'default'   => '#fff'
            ),

            array(
                'id'        => 'wc_bar_menu_font_active',
                'type'      => 'color',
                'title'     => 'Button Menu Active',
                'output' => array('.wc-btn-on'),
                'output_mode' => 'background-color',
                'default'   => $main_color
            ),

            // Mobile Menu
            array(
                'type'    => 'subheading',
                'content' => 'Mobile Menu',
            ),

            array(
                'id'        => 'mobile_menu_background',
                'type'      => 'color',
                'title'     => 'Background',
                'output' => array('#menu-toggle .sbt-warp'),
                'output_mode' => 'background-color',
                'default'   => $main_color
            ),

            array(
                'id'        => 'mobile_menu_font',
                'type'      => 'color',
                'title'     => 'Font Color',
                'output' => array('#menu-toggle .toggle-nav > li > a', '#menu-toggle .toggle-nav .sub-menu .menu-item a', '.toggle-nav .menu-item-has-children > a:after', '#menu-toggle .social-icons a'),
                'output_mode' => 'color',
                'default'   => '#fff'
            ),

            array(
                'id'        => 'mobile_menu_font_hover',
                'type'      => 'color',
                'title'     => 'Font Color Hover',
                'output' => array('#menu-toggle .toggle-nav > li > a:hover', '#menu-toggle .toggle-nav .sub-menu .menu-item a:hover', '#menu-toggle .social-icons a:hover', '#menu-toggle .toggle-nav .current-menu-item > a'),
                'output_mode' => 'color',
                'default'   => $sec_color
            ),

        )
    ));

    // Typography
    CSF::createSection($prefix, array(
        'title'  => 'Typography',
        'icon'  => 'fa fa-font',
        'fields' => array(

            array(
                'type'    => 'heading',
                'content' => 'Typography Options',
            ),

            array(
                'id'      => 'body_opt',
                'type'    => 'typography',
                'title'   =>  'Body',
                'output'  => 'body',
                'line_height'    => false,
                'letter_spacing'    => false,
                'text_align'    => false,
                'text_transform'    => false,
                'backup_font_family'    => true,
                'subset'    => false,
                'color'    => false,

                'default' => array(
                    'font-family'           => 'Roboto',
                    'backup-font-family'    => 'Arial, Helvetica, sans-serif',
                    'font-size'             => '14',
                    'type'                  => 'google',
                    'font-weight'           => '400',
                    'unit'                  => 'px',
                ),
            ),

            array(
                'id'                 => 'menu_opt',
                'type'               => 'typography',
                'title'              => 'Menu',
                'output'             => '.mm-main-nav .mm-primary-menu > li > a',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,
                'color'              => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Helvetica, sans-serif',
                    'font-size'          => '14',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

            array(
                'id'                 => 'h1_opt',
                'type'               => 'typography',
                'title'              => 'H1',
                'output'             => 'h1',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Tahoma, sans-serif',
                    'font-size'          => '42',
                    'letter-spacing'     => '0',
                    'text-transform'     => '',
                    'color'              => '#333',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

            array(
                'id'                 => 'h2_opt',
                'type'               => 'typography',
                'title'              => 'H2',
                'output'             => 'h2',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Tahoma, sans-serif',
                    'font-size'          => '32',
                    'letter-spacing'     => '0',
                    'text-transform'     => '',
                    'color'              => '#333',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

            array(
                'id'                 => 'h3_opt',
                'type'               => 'typography',
                'title'              => 'H3',
                'output'             => 'h3',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Tahoma, sans-serif',
                    'font-size'          => '21',
                    'letter-spacing'     => '0',
                    'text-transform'     => '',
                    'color'              => '#333',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

            array(
                'id'                 => 'h4_opt',
                'type'               => 'typography',
                'title'              => 'H4',
                'output'             => 'h4',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Tahoma, sans-serif',
                    'font-size'          => '18',
                    'letter-spacing'     => '0',
                    'text-transform'     => '',
                    'color'              => '#333',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

            array(
                'id'                 => 'h5_opt',
                'type'               => 'typography',
                'title'              => 'H5',
                'output'             => 'h5, .wp-block-cover-text',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Tahoma, sans-serif',
                    'font-size'          => '16',
                    'letter-spacing'     => '0',
                    'text-transform'     => '',
                    'color'              => '#333',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

            array(
                'id'                 => 'h6_opt',
                'type'               => 'typography',
                'title'              => 'H6',
                'output'             => 'h6',
                'line_height'        => false,
                'text_align'         => false,
                'backup_font_family' => true,
                'subset'             => false,

                'default'            => array(
                    'font-family'        => 'Roboto',
                    'backup-font-family' => 'Arial, Tahoma, sans-serif',
                    'font-size'          => '14',
                    'letter-spacing'     => '0',
                    'text-transform'     => '',
                    'color'              => '#333',
                    'type'               => 'google',
                    'font-weight'        => '700',
                    'unit'               => 'px',
                ),
            ),

        )
    ));

    // Footer
    CSF::createSection($prefix, array(
        'title'  => 'Footer',
        'icon'      => 'fas fa-window-minimize',
        'fields' => array(

            array(
                'id'        => 'about_en',
                'type'      => 'wp_editor',
                'title'     => 'About us - English',
                'default'   => ''
            ),


            array(
                'id'        => 'about_ar',
                'type'      => 'wp_editor',
                'title'     => 'About us - Arabic',
                'default'   => ''
            ),
        )
    ));
    // Custom CSS & JS
    CSF::createSection($prefix, array(
        'title'  => 'Custom CSS & JS',
        'icon'      => 'fa fa-code',
        'fields' => array(

            array(
                'type'    => 'subheading',
                'content' => 'CSS Editor',
            ),

            array(
                'id'       => 'CSS_editor',
                'type'     => 'code_editor',
                'settings' => array(
                    'theme'  => 'mbo',
                    'mode'   => 'css',
                ),
                'default'  => '',
            ),

            array(
                'type'    => 'subheading',
                'content' => 'Media CSS Editor',
            ),

            array(
                'id'       => 'media_CSS_editor',
                'type'     => 'code_editor',
                'settings' => array(
                    'theme'  => 'mbo',
                    'mode'   => 'css',
                ),
                'default'  => '',
            ),

        )
    ));
}
