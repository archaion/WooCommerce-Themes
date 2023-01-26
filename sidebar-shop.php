<?php
/**
 * sidebar-shop.php
 * Shop sidebar - filters
 */
if(! is_shop() && !is_archive()){
    return;
}
?>
<aside id="secondary" class="widget-area">
    <div class="widget-area-inside">
        <div class="entry-content <?php entry_content_class(); ?>">
            <?php the_widget( 'WC_Widget_Product_Categories', array('count' => 1, 'hide_empty' => 1) ); ?>
        </div>
    </div>
    <div class="widget-area-inside">
        <div class="entry-content <?php entry_content_class(); ?>">
        <h2 class="widgettitle"><?php echo esc_html( 'Filters') ?></h2>
        <hr>
        <?php the_widget( 'WC_Widget_Price_Filter', array() ); ?>
        <div class="widget--size widget">
            <?php the_widget( 'WC_Widget_Layered_Nav', array('title' => esc_html( 'Filter by size' ),'attribute'=>'size','display_type'=>'list', 'query_type' => 'or') ); ?>
        </div>
        <?php the_widget( 'WC_Widget_Layered_Nav', array('title' => esc_html( 'Filter by color' ), 'attribute'=>'color','display_type'=>'dropdown', 'query_type' => 'and') ); ?>
        <?php the_widget( 'WC_Widget_Layered_Nav', array('title' => esc_html( 'Filter by size' ), 'attribute'=>'size','display_type'=>'dropdown', 'query_type' => 'or') ); ?>
        <?php the_widget( 'WC_Widget_Rating_Filter', array() ); ?>
        <?php the_widget( 'WC_Widget_Product_Tag_Cloud', array() ); ?>
        </div>
    </div> <!-- / widget-area -->
</aside><!-- #secondary -->
<div class="clearfix"></div>