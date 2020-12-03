<?php
/**
 * The template for displaying pages
 * Template Name: Contact us
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
$heading        = (!empty(ba_option('contact_heading')) && !is_rtl() )    ? ba_option('contact_heading')  :   ba_option('contact_heading_ar');
$form_heading   = (!empty(ba_option('contact_form')) && !is_rtl() )       ? ba_option('contact_form')     :   ba_option('contact_form_ar');
get_header(); ?>

<div class="contact-page mb-5">
    <div class="container">
        
        <h2 class="contact-page-title">
            <?php echo $heading; ?></h2>

        <iframe class="mb-5" src="<?php echo ( ba_option('map_link') != '' ) ? ba_option('map_link') : ''; ?>" width="100%" height="<?php echo ( ba_option('map_height') != '' ) ? ba_option('map_height') : ''; ?>" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        <div class="row">

            <div class="col-md-4">
                <div class="contact-left">
                    <h4 class="contact-title"><?php echo (!is_rtl()) ? 'Contact us': 'روابط سريعة'; ?></h4>
                    <?php BA_contact_info(); ?>
                    <h4 class="contact-title"><?php echo (!is_rtl()) ? 'Follow us': 'تابعنا على'; ?></h4>
                    <?php BA_social_icons(); ?>
                </div>
            </div>


            <div class="col-md-8">
                <div class="contact-right">
                    <h4 class="contact-title"><?php echo $form_heading; ?></h4>
                    <?php 
                    $contact_ID = ( ba_option('form_id') != '' ) ? ba_option('form_id') : '';
                    echo do_shortcode($contact_ID); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
get_footer();
