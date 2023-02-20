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
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://vampyre.tk/refund_returns">Return Policy</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://vampyre.tk/privacy-policy">Privacy Policy</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://vampyre.tk/terms">Terms of Service</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://vampyre.tk/contact">Contact</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://vampyre.tk/about-us">About Us</a>');
      ?>
   </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>