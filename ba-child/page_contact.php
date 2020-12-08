<?php

/**
 * The template for displaying pages
 * Template Name: Contact us
 *
 */

defined('ABSPATH') || exit; // Exit if accessed directly
$heading        = (!empty(ba_option('contact_heading')) && !is_rtl())    ? ba_option('contact_heading')  : ba_option('contact_heading_ar');
$form_heading   = (!empty(ba_option('contact_form')) && !is_rtl())       ? ba_option('contact_form')     : ba_option('contact_form_ar');
get_header(); ?>
<div class="contact-us ptb-68">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-page-title mb-40">
                    <h1>
                        <?php echo $heading; ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <ul class="contact-tab-list nav">
                    <li><a class="active" href="#contact-address" data-toggle="tab">Contact us</a></li>
                    <li><a href="#contact-form-tab" data-toggle="tab">Leave us a message</a></li>
                    <li><a href="#store-location" data-toggle="tab">Our location</a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="tab-content tab-content-contact">
                    <div id="contact-address" class="tab-pane fade d-flex active show">
                        <?php BA_contact_info(); ?>
                    </div>
                    <div id="contact-form-tab" class="tab-pane fade row d-flex">
                        <?php
                        $contact_ID = (ba_option('form_id') != '') ? ba_option('form_id') : '';
                        echo do_shortcode($contact_ID); ?>
                    </div>
                    <div id="store-location" class="tab-pane fade row d-flex">
                        <div class="col-12">
                            <div class="contact-map">
                                <iframe class="mb-5" src="<?php echo (ba_option('map_link') != '') ? ba_option('map_link') : ''; ?>" width="100%" height="<?php echo (ba_option('map_height') != '') ? ba_option('map_height') : ''; ?>" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
