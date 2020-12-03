<?php
/**
 * The template for displaying Footer
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
$page_opt = get_post_meta( get_queried_object_id(), 'page_opt', true );
?>

<footer id="colophon" class="site-footer <?php echo ( !empty($page_opt['remove_m_p'])  && !is_archive() && !is_search() ) ? ' mt-0' : ''; ?>">
    <div class="container">
        <div class="footer-inner">
            <div class="row">

                <!-- Widget 1 -->
                <div class="col-md-4"><?php
                    $logo_white     = '<img class="logo img-fluid" src="'.ba_option('logo_white','url').'" alt="'.ba_option('logo_white','alt').'" width="'.ba_option('logo_white','width').'" height="'.ba_option('logo_white','height').'"/>';
        
                    $logo_white_rtl = '<img class="logo img-fluid" src="'.ba_option('logo_white_rtl','url').'" alt="'.ba_option('logo_white_rtl','alt').'" width="'.ba_option('logo_white_rtl','width').'" height="'.ba_option('logo_white_rtl','height').'"/>'; ?>

                    <?php if(!empty(ba_option('logo_white','url'))): ?>
                    <div class="footer-logo">
                        <?php echo $logo_white; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="footer-about">
                        <?php echo (!is_rtl()) ? ba_option('about_en') : ba_option('about_ar') ; ?>
                    </div>
                    
                </div>
                
                <!-- Widget 2 -->
                <div class="col-md-4">
                    <h4 class="footer-title"><?php echo (!is_rtl()) ? 'Quick Links': 'روابط سريعة'; ?></h4>
                    <?php BA_nav_menu('footer','footer_menu','footer-menu'); ?>
                </div>
                
                <!-- Widget 3 -->
                <div class="col-md-4">
                    <div class="footer-info">
                        <?php BA_contact_info(); ?>
                    </div>
                </div>
                
            </div>

        </div>
        
        <!-- Copyrights -->
        <div class="copyrights">
            <div class="row">
                <div class="col-md-6">©<?php echo date('Y'); ?>, <?php echo get_bloginfo( 'name' ); echo (!is_rtl()) ? ' All right reserved.' : ' جميع الحقوق محفوظة.'; ?></div>
                <div class="col-md-6 copyrights-right"><?php BA_social_icons(); ?></div>
            </div>
        </div>
        
    </div>
</footer>
