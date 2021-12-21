<!--Start Sidebar wrapper-->
<div class="sidebar">
  <?php
		if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
  <h2 class="sidebar_title">
    <?php _e( 'Categories', 'dzonia' ); ?>
  </h2>
  <ul>
    <?php wp_list_categories('title_li'); ?>
  </ul>
  <h2 class="sidebar_title">
    <?php _e( 'Archives', 'dzonia' ); ?>
  </h2>
  <ul>
    <?php wp_get_archives( 'type=monthly' ); ?>
  </ul>
  <h2 class="sidebar_title"><?php _e( 'Search', 'dzonia' ); ?></h2>
  <?php get_search_form(); ?>
  <?php endif; // end primary widget area ?>
  <?php
			// A second sidebar for widgets, just because.
			if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
  <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
  <?php endif; ?>
</div>
<!--End Sidebar wrapper-->
