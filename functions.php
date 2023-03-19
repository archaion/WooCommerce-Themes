<?php

/**
 * junkshop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package junkshop
 */

if (!defined('_S_VERSION')) {
   // Replace the version number of the theme on each release.
   define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function junkshop_setup() {
   /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on junkshop, use a find and replace
		* to change 'junkshop' to the name of your theme in all the template files.
		*/
   load_theme_textdomain('junkshop', get_template_directory() . '/languages');

   // Add default posts and comments RSS feed links to head.
   add_theme_support('automatic-feed-links');

   /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
   add_theme_support('title-tag');

   /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
   add_theme_support('post-thumbnails');

   // This theme uses wp_nav_menu() in one location.
   register_nav_menus(
      array(
         'menu-1' => esc_html__('Primary', 'junkshop'),
      )
   );

   /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
   add_theme_support(
      'html5',
      array(
         'search-form',
         'comment-form',
         'comment-list',
         'gallery',
         'caption',
         'style',
         'script',
      )
   );

   // Set up the WordPress core custom background feature.
   add_theme_support(
      'custom-background',
      apply_filters(
         'junkshop_custom_background_args',
         array(
            'default-color' => 'ffffff',
            'default-image' => '',
         )
      )
   );

   // Add theme support for selective refresh for widgets.
   add_theme_support('customize-selective-refresh-widgets');

   /**
    * Add support for core custom logo.
    *
    * @link https://codex.wordpress.org/Theme_Logo
    */
   add_theme_support(
      'custom-logo',
      array(
         'height'      => 250,
         'width'       => 250,
         'flex-width'  => true,
         'flex-height' => true,
      )
   );
}
add_action('after_setup_theme', 'junkshop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function junkshop_content_width() {
   $GLOBALS['content_width'] = apply_filters('junkshop_content_width', 640);
}
add_action('after_setup_theme', 'junkshop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function junkshop_widgets_init() {
   register_sidebar(
      array(
         'name'          => esc_html__('Sidebar', 'junkshop'),
         'id'            => 'sidebar-1',
         'description'   => esc_html__('Add widgets here.', 'junkshop'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
}
add_action('widgets_init', 'junkshop_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function junkshop_scripts() {
   wp_enqueue_style('junkshop-style', get_stylesheet_uri(), array(), _S_VERSION);
   wp_style_add_data('junkshop-style', 'rtl', 'replace');

   wp_enqueue_script('junkshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

   if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
   }
}
add_action('wp_enqueue_scripts', 'junkshop_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
   require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Define WooCommerce support
 */
add_theme_support('woocommerce');
add_theme_support(
   'woocommerce',
   array(
      'single_image_width'    => 1500,
      'thumbnail_image_width' => 1500,
      'product_grid'          => array(
         'default_columns' => 3,
         'default_rows'    => 4,
         'min_columns'     => 1,
         'max_columns'     => 3,
         'min_rows'        => 1,
      ),
   )
);
/**
 * Single product view
 */
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');
/**
 * Move title before main wrapper
 */
add_filter('woocommerce_show_page_title', 'ct_woocommerce_show_page_title');
function ct_woocommerce_show_page_title() {
   return false;
}
add_action('ct_before_main_wrapper', 'ct_woocommerce_before_main_content', 9);
function ct_woocommerce_before_main_content() {
?>
   <header class="woocommerce-products-header mb-4">
      <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
   </header>
   <?php
}
function entry_content_class() {
   if (is_front_page()) {
      return '';
   }
   if (is_woocommerce() || is_cart() || is_checkout()) :
      echo 'entry-content--white';
   endif;
   if (!is_user_logged_in() && is_page('my-account')) :
      echo 'entry-content--white';
   endif;
}
/*function show_stock() {
   global $product;
   echo wc_get_stock_html($product);
}
add_action('woocommerce_after_shop_loop_item', 'show_stock', 10);*/

add_filter('gettext', 'change_readmore_text', 20, 3);
function change_readmore_text($translated_text, $text, $domain) {
   if (!is_admin() && $domain === 'woocommerce' && $text === 'Read more') {
      $text = 'View product';
   }
   return $text;
}

add_filter('woocommerce_catalog_orderby', 'custom_sorting');
function custom_sorting($sorting_options) {
   $sorting_options = array(
      'menu_order' => __('Unsorted', 'woocommerce'),
      'date'       => __('Latest', 'woocommerce'),
      'price'      => __('Price: low to high', 'woocommerce'),
      'price-desc' => __('Price: high to low', 'woocommerce'),
      'rating'     => __('Average rating', 'woocommerce'),
      'popularity' => __('Popularity', 'woocommerce'),
   );
   return $sorting_options;
}
function shop_title() {
   if (is_shop()) { ?>
      <title>Bezanty</title>
<?php }
}
add_action('wp_head', 'shop_title', 0);
