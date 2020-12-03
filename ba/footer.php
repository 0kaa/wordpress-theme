<?php
/**
 * The template for displaying the footer
 *
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly ?>

</div><!-- #content -->

<button id="top" class="shadow-lg"><i class="fas fa-chevron-up"></i></button>

<?php locate_template( 'template-parts/footer.php', true, true ); ?>

</div><!-- .wrapper-inner -->

</div><!-- .wrapper -->

<?php locate_template( 'template-parts/menu-toggle.php', true, true ); ?>
<?php wp_footer();?>
</body>
</html>