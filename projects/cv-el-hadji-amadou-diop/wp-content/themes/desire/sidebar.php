<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
<div id="sidebar-1" class="sidebar widget-area">
    <?php if($options['show_search']): ?>
    <div id="widget-search" class="widget">
        <?php get_search_form(); ?>
    </div>
    <?php endif; ?>
    <?php if(!dynamic_sidebar('sidebar-1')) : ?>
    <?php endif; ?>
</div>