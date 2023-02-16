<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package junkshop
 */

?>

<footer id="colophon" class="site-footer">
   <div class="site-info">
      <!--<span class="sep"> | </span>-->
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('Theme by %s', 'junkshop'), '<a href="http://github.com/archaion/">Archaion</a>');
      ?>
   </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>