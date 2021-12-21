<!--Start Sidebar wrapper-->
<div class="grid_9 sidebar_wrapper omega">
<!--Start Sidebar-->
<div class="sidebar">
<?php
if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
<div class="wrap_sidebar">
<?php get_search_form(); ?>
</div>
<div class="wrap_sidebar">
<h2>
<?php _e( 'Archives', 'themia' ); ?>
</h2>
<ul>
<?php wp_get_archives( 'type=monthly' ); ?>
</ul>
</div>
<div class="wrap_sidebar">
<h2>
<?php _e( 'Categories', 'themia' ); ?>
</h2>
<ul>
<?php wp_list_categories('title_li'); ?>
</ul>
</div>
<?php endif; // end primary widget area ?>
<?php
// A second sidebar for widgets, just because.
if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
<?php endif; ?>
</div>
<!--End sidebar-->
</div>
<!--End Sidebar wrapper-->
