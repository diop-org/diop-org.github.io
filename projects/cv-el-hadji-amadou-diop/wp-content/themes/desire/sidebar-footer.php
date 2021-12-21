<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php
    global $options;
    if (!is_active_sidebar('sidebar-2') && !is_active_sidebar('sidebar-3') && !is_active_sidebar('sidebar-4')) return;
?>
<div id="footer-widget-area" <?php desire_footer_sidebar_class(); ?>>
    <?php if (is_active_sidebar('sidebar-2')) : ?>
    <div id="footer-widget-area-1" class="footer-widget-area">
        <?php dynamic_sidebar('sidebar-2'); ?>
    </div>
    <?php endif; ?>

    <?php if (is_active_sidebar('sidebar-3')) : ?>
    <div id="footer-widget-area-2" class="footer-widget-area">
        <?php dynamic_sidebar('sidebar-3'); ?>
    </div>
    <?php endif; ?>

    <?php if (is_active_sidebar('sidebar-4')) : ?>
    <div id="footer-widget-area-3" class="footer-widget-area">
        <?php dynamic_sidebar('sidebar-4'); ?>
    </div>
    <?php endif; ?>
</div>