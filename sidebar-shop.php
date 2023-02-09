<?php
/**
 * sidebar-shop.php
 * Shop sidebar - filters
 * CHANGE PLACEHOLDER ATTRIBUTES TO PRODUCT ATTRIBUTE NAMES
 */
if(! is_shop() && !is_archive()){
   return;
}
?>
<aside id="secondary" class="widget-area">
   <div class="widget-area-inside">
       <div class="entry-content <?php entry_content_class(); ?>">
           <?php the_widget( 'WC_Widget_Product_Categories', array('title' => esc_html('Categories'),'count' => 1, 'hide_empty' => 1) ); ?>
       </div>
   </div>
   <div class="widget-area-inside">
       <div class="entry-content <?php entry_content_class(); ?>">
       <hr>
       <?php the_widget( 'WC_Widget_Price_Filter', array('title' => esc_html('Price')) ); ?>
       <div class="widget--size widget">
           <?php the_widget( 'WC_Widget_Layered_Nav', array('title' => esc_html( 'Attribute I' ), 'attribute'=>'goodness','display_type'=>'list', 'query_type' => 'or') ); ?>
       </div>
       <?php the_widget('WC_Widget_Layered_Nav', array('title' => esc_html( 'Attribute II' ), 'attribute'=>'kangaroos','display_type'=>'dropdown', 'query_type' => 'and') ); ?>
       <?php the_widget( 'WC_Widget_Layered_Nav', array( 'title' => esc_html( 'Attribute III' ), 'attribute'=>'title','display_type'=>'dropdown', 'query_type' => 'or') ); ?>
       <?php the_widget( 'WC_Widget_Rating_Filter', array() ); ?>
       <hr>
       <?php the_widget( 'WC_Widget_Product_Tag_Cloud', array('title' => esc_html( 'Tags' )) ); ?>
       </div>
   </div> <!-- / widget-area -->
</aside><!-- #secondary -->
<div class="clearfix"></div>