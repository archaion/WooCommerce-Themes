<?php
// woocommerce.php
/**
 * Main WooCommerce template
 */
get_header();
?>
<?php woocommerce_breadcrumb(); ?>
<?php do_action("ct_before_main_wrapper"); ?>
    <main id="primary" class="site-main">
        <div class="entry-content <?php entry_content_class(); ?>">
            <?php woocommerce_content(); ?>
        </div>
    </main><!-- #main -->
<?php
get_sidebar('shop');
get_footer();