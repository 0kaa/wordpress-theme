<?php
/**
 * Contact Information
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

if (!function_exists('BA_contact_info')) {
	function BA_contact_info() {
        if(ba_option('contact_info') != '' ) { 
            echo '<div id="contact_info" class="contact-info">';
            
            foreach (ba_option('contact_info') as $value) { 
                
                $ci_image_url           = (isset($value['ci_image_icon']['url'])       && !empty($value['ci_image_icon']['url']))      ? $value['ci_image_icon']['url'] : '';
                $ci_image_width         = (isset($value['ci_dimensions']['width'])     && !empty($value['ci_dimensions']['width']))    ? $value['ci_dimensions']['width'] : '';
                $ci_image_height        = (isset($value['ci_dimensions']['height'])    && !empty($value['ci_dimensions']['height']))   ? $value['ci_dimensions']['height'] : '';
                $ci_icon_type           = (isset($value['ci_icon_type'])               && !empty($value['ci_icon_type']))              ? $value['ci_icon_type'] : '';
                $ci_css_class           = (isset($value['ci_css_class'])               && !empty($value['ci_css_class']))              ? $value['ci_css_class'] : '';
                $ci_font_icon           = (isset($value['ci_font_icon'])               && !empty($value['ci_font_icon']))              ? $value['ci_font_icon'] : '';
                $ci_heading             = (isset($value['ci_heading'])                 && !empty($value['ci_heading']))                ? $value['ci_heading'] : '';
                $ci_heading_rtl         = (isset($value['ci_heading_rtl'])             && !empty($value['ci_heading_rtl']))            ? $value['ci_heading_rtl'] : '';
                $ci_link                = (isset($value['ci_link'])                    && !empty($value['ci_link']))                   ? $value['ci_link'] : '';
                $ci_description         = (isset($value['ci_description'])             && !empty($value['ci_description']))            ? $value['ci_description'] : '';
                $ci_description_rtl     = (isset($value['ci_description_rtl'])         && !empty($value['ci_description_rtl']))        ? $value['ci_description_rtl'] : '';
                
                // Change text on diffrent lang
                $ci_heading_output      = (is_rtl()) ? $ci_heading_rtl      : $ci_heading;
                $ci_description_output  = (is_rtl()) ? $ci_description_rtl  : $ci_description;
                
                $output = '<div class="'.$ci_css_class.'">';
                $output .= '<div class="ci-left">';
                
                // Select is icon image or font icon
                if( $ci_icon_type == 'image' ){
                    $output .= '<div class="ci-img"><img src="'.$ci_image_url.'"  alt="'.$ci_heading.'" width="'.$ci_image_width.'" height="'.$ci_image_height.'" /></div>';
                } else {
                    $output .= '<i class="'.$ci_font_icon.'"></i>';
                }
                
                $output .= '</div>';
                $output .= '<div class="ci-right">';
                $output .= '<h4 class="ci-heading">'.$ci_heading_output.'</h4>';
                
                // Check if there link or no
                if( !empty($ci_link) ){
                    $output .= '<a class="ci-link" href="'.$ci_link.'" target="_blank">'.$ci_description_output.'</a>';
                } else {
                    $output .= '<p class="ci-description">'.$ci_description_output.'</p>';
                }
                
                $output .= '</div>';
                $output .= '</div>';
                
                echo $output;
            } 
            
            echo '</div>';
            
        } else { 
            echo (!is_rtl()) ? 'Add contact information': 'لم يتم اضافة اى بيانات اتصال';
        }
    }
}
add_shortcode('contact-information', 'BA_contact_info'); 


