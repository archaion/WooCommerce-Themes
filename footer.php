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
      printf(esc_html__('%s', 'junkshop'), '<a href="http://bezanty.co/refund_returns">Return Policy</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://bezanty.co/privacy-policy">Privacy Policy</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://bezanty.co/terms">Terms of Service</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://bezanty.co/contact">Contact</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://bezanty.co/about-us">About Us</a>');
      ?>
      <span class="sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%s', 'junkshop'), '<a href="http://bezanty.co/FAQs">FAQs</a>');
      ?>
   </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<script>
   <?php if (is_search()) : ?>
      document.querySelector('.page-title').innerHTML = 'Search'
   <?php endif; ?>
   const searchbar = document.getElementById('searchbar')
   const search = document.getElementById('search-toggle')
   const filters = document.getElementById('filters')

   /*search.addEventListener('click', function() {
      searchbar.style.marginLeft == '0px' ?
         searchbar.style.setProperty('margin-left', '-400px', 'important') :
         searchbar.style.setProperty('margin-left', '0', 'important')
   })*/

   filters.addEventListener('click', function() {
      searchbar.style.setProperty('margin-left', '-400px', 'important')
   })

   document.addEventListener('click', function(e) {
      if (!search.contains(e.target) && !searchbar.contains(e.target) && searchbar.style.marginLeft == '0px') {
         searchbar.style.setProperty('margin-left', '-400px', 'important');
      } else if (search.contains(e.target)) {
         searchbar.style.marginLeft == '0px' ?
            searchbar.style.setProperty('margin-left', '-400px', 'important') :
            searchbar.style.setProperty('margin-left', '0', 'important')
      }
   });
</script>

<?php wp_footer(); ?>

</body>

</html>