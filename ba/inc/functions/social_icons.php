<?php
/**
 * Contact Information
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

if (!function_exists('BA_social_icons')) {
	function BA_social_icons() {
        if(BA_option('social_media') != '' ) { 
            
            echo '<div id="social_icons" class="social-icons">';
            
            foreach (BA_option('social_media') as $value) { 
                
                $sm_image_url           = (isset($value['sm_image_icon']['url'])       && !empty($value['sm_image_icon']['url']))      ? $value['sm_image_icon']['url'] : '';
                $sm_image_width         = (isset($value['sm_dimensions']['width'])     && !empty($value['sm_dimensions']['width']))    ? $value['sm_dimensions']['width'] : '';
                $sm_image_height        = (isset($value['sm_dimensions']['height'])    && !empty($value['sm_dimensions']['height']))   ? $value['sm_dimensions']['height'] : '';
                $sm_icon_type           = (isset($value['sm_icon_type'])               && !empty($value['sm_icon_type']))              ? $value['sm_icon_type'] : '';
                $sm_font_icon           = (isset($value['sm_font_icon'])               && !empty($value['sm_font_icon']))              ? $value['sm_font_icon'] : '';
                $sm_link                = (isset($value['sm_link'])                    && !empty($value['sm_link']))                   ? $value['sm_link'] : '';
                $sm_name                = (isset($value['sm_name'])                    && !empty($value['sm_name']))                   ? $value['sm_name'] : '';
                
                $output = '<div class="'.$sm_name.'">';
                $output .= '<a class="sm-link p-action-click" href="'.$sm_link.'" target="_blank">';
                
                // Select is icon image or font icon
                if( $sm_icon_type == 'image' ){
                    $output .= '<img src="'.$sm_image_url.'"  alt="'.$sm_name.'" width="'.$sm_image_width.'" height="'.$sm_image_height.'" />';
                } else {
                    $output .= '<i class="'.$sm_font_icon.'"></i>';
                }

                $output .= '</a>';
                $output .= '</div>';
                
                echo $output;
            } 
            
            echo '</div>';
            
        } else { 
            echo (!is_rtl()) ? 'Add social media links': 'أضف روابط الشبكات الأجتماعية';
        }
    }
}
add_shortcode('social-icons', 'BA_social_icons'); 


/*
 * Social Share
 */
if (!function_exists('BA_social_share')) {
	function BA_social_share() {
        
        $facebook = (!is_rtl()) ? 'Share this post on Facebook' : 'شارك هذا المقال على فيس بوك';
        $twitter = (!is_rtl()) ? 'Share this post on Twitter' : 'شارك هذا المقال على تويتر';
        $whatsapp = (!is_rtl()) ? 'Share via Whatsapp' : 'شارك عبر واتساب';
        $pinterest = (!is_rtl()) ? 'Share this post on Pinterest' : 'شارك هذا المنشور على موقع Pinterest';
        $tumbr = (!is_rtl()) ? 'Share this post on Tumbr' : 'انشر هذا المقال على Tumbr';
        
		$output = '<div class="post-share">';
        
		$output .= '<a target="_blank" title="' . $facebook . '" class="facebook" href="http://www.facebook.com/sharer.php?u=' . esc_url(get_the_permalink()) . '" onclick="javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660");return false;">
                <i class="fa fa-facebook"></i>
            </a>';

		$output .= '<a target="_blank" title="' . $twitter . '" class="twitter" href="https://twitter.com/share?url=' . esc_url(get_the_permalink()) . '" onclick="javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660");return false;">
                <i class="fa fa-twitter"></i>
            </a>';
        
        if(wp_is_mobile()){
            $output .= '<a target="_blank" title="' . $whatsapp . '" class="whatsapp" href="whatsapp://send?text=' . esc_url(get_the_permalink()) . '" data-action="share/whatsapp/share");return false;">
            <i class="fa fa-whatsapp"></i>
            </a>';
        }
        
		if (get_the_post_thumbnail_url(get_the_ID(), 'full')) {
			$output .= '<a target="_blank" title="' . $pinterest . '" class="pinterest" href="//pinterest.com/pin/create/button/?url=' . esc_url(get_the_permalink()) . '>&media=' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) .
                '&description=' . get_the_title() . '" onclick="javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;">
                <i class="fa fa-pinterest"></i>
            </a>';
            
			$output .= '<a target="_blank" title="' . $tumbr . '" class="tumblr"
                            data-content="' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) . '"
                            href="//tumblr.com/widgets/share/tool?canonicalUrl=' . esc_url(get_the_permalink()) . '"
                            onclick="javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=540");return false;">
                <i class="fa fa-tumblr"></i>
            </a>';
		}
		$output .= '</div>';
		return $output;
	}
}