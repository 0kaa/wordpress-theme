<?php

/**
 * The template for displaying Toggle Menu
 */

defined('ABSPATH') || exit; // Exit if accessed directly 
?>

<?php if (wp_is_mobile()) : ?>

    <div id="menu-toggle" class="sbt sbt-dark" tabindex="-1">
        <div class="sbt-warp">
            <div class="sbt-inner">
                <?php
                    $logo_white     = '<img class="logo img-fluid" src="' . ba_option('logo_white', 'url') . '" alt="' . ba_option('logo_white', 'alt') . '" width="' . ba_option('logo_white', 'width') . '" height="' . ba_option('logo_white', 'height') . '"/>';

                    $logo_white_rtl = '<img class="logo img-fluid" src="' . ba_option('logo_white_rtl', 'url') . '" alt="' . ba_option('logo_white_rtl', 'alt') . '" width="' . ba_option('logo_white_rtl', 'width') . '" height="' . ba_option('logo_white_rtl', 'height') . '"/>'; ?>

                <?php if (!empty(ba_option('logo_white', 'url'))) : ?>
                    <div class="toggle-logo text-center mb-4">
                        <?php echo (is_rtl()) ? $logo_white : $logo_white; ?>
                        <?php BA_social_icons(); ?>
                    </div>
                <?php endif; ?>

                <div class="sbt-close"><button type="button" class="p-action-click mob-click"><i class="fas fa-times"></i></button></div>

                <?php BA_nav_menu('secondary', 'toggle_nav', 'toggle-nav'); ?>

            </div>
        </div>
    </div>
<?php endif; ?>