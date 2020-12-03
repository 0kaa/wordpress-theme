<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
get_header();
$home_url   = home_url();
$blog_name   = get_bloginfo('name');
?>

<div id="primary" class="content-area container container-700">

    <div class="return-to-home mt-5 mb-5">
        <div class="error404 text-center">

            <h2 class="error404-title"><?php echo (!is_rtl()) ? 'That page can&rsquo;t be found':'لا يمكن العثور على هذه الصفحة'; ?></h2>
            <strong class="d-block">
                <?php echo (!is_rtl()) ? 'It looks like nothing was found at this location. Maybe try one of the links below or a search?':'يبدو أنه لم يتم العثور على أي شيء في هذا الموقع. ربما جرب أحد الروابط أدناه أو ابحث؟'; ?>
            </strong>

            <a class="btn btn-secondary btn-sm p-action-click mt-4 mb-5" href="<?php echo $home_url; ?>">
                <?php echo (!is_rtl()) ? 'Go to':'الذهاب الى '; ?> 
                <?php echo $blog_name; ?></a>

            <?php get_search_form(); ?>

        </div>
    </div>

</div>

<?php
get_footer();
