<?php
/**
* // template-parts/content-page.php
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
   </header><!-- .entry-header -->
   <div class="entry-content <?php entry_content_class(); ?>">
      <?php
      the_content();
      wp_link_pages(
         array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'test123' ),
            'after'  => '</div>',
         )
      );
      ?>
   </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->