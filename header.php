<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package junkshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>
   <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'junkshop'); ?></a>
      <header id='banner'>
         <div id='banner1'></div>
      </header>
      <?php if (is_shop() || is_archive() || is_search()) : ?>
         <header id="vidwrap">
            <video id="vid" autoplay="true" muted="true" loop="true">
               <source src="https://bezanty.co/wp-content/themes/NEW/Slideshow.mp4" type="video/mp4">
            </video>
         </header>
      <?php endif; ?>
      <header id="masthead" class="site-header">
         <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
            ?>
               <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            else :
            ?>
               <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;
            $junkshop_description = get_bloginfo('description', 'display');
            if ($junkshop_description || is_customize_preview()) :
            ?>
               <p class="site-description"><?php echo $junkshop_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                             ?></p>
            <?php endif; ?>
         </div><!-- .site-branding -->

         <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Page', 'junkshop'); ?></button>
            <button id="search-toggle"><?php esc_html_e('Find', 'junkshop'); ?></button>
            <section id="searchbar" class="widget widget_block widget_search">
               <form role="search" method="get" action="https://bezanty.co/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
                  <label for="wp-block-search__input-1" class="wp-block-search__label">Search</label>
                  <div class="wp-block-search__inside-wrapper " style="width: 777px">
                     <input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Search products…" required="">
                     <input type="hidden" name="post_type" value="product">
                     <button type="submit" class="wp-block-search__button wp-element-button">Search</button>
                     <?php if (is_shop() || is_archive() || is_search()) : ?>
                        <a id="filters" href="#secondary">Filters</a>
                     <?php else : ?>
                        <a id="filters" href="<?php echo esc_url('https://bezanty.co/shop#secondary'); ?>">Filters</a>
                     <?php endif; ?>
                  </div>
               </form>
            </section>
            <?php
            wp_nav_menu(
               array(
                  'theme_location' => 'menu-1',
                  'menu_id'        => 'primary-menu',
               )
            ); ?>
         </nav><!-- #site-navigation -->
      </header><!-- #masthead -->