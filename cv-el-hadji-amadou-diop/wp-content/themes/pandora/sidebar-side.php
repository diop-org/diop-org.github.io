<div id="primary" class="sidebar">
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
			
			<li id="meta" class="widget">
				<h3><?php _e( 'Meta', 'pandora' ) ?></h3>
				<ul>
					<?php wp_register() ?>

					<li><?php wp_loginout() ?></li>
					<?php wp_meta() ?>

				</ul>
			</li>
			
			<li id="pages" class="widget">
				<h3><?php _e( 'Pages', 'pandora' ) ?></h3>
				<ul>
					<?php wp_list_pages('title_li=&sort_column=menu_order' ) ?>
				</ul>
			</li>

		<?php endif; // end primary sidebar widgets  ?>
	</ul>
</div><!-- #primary .sidebar -->

<div id="secondary" class="sidebar">
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : // begin secondary sidebar widgets ?>
			
			<li id="calendar" class="widget widget_calendar">
				<h3><?php _e( 'Archives', 'pandora' ) ?></h3>
				<?php get_calendar(); ?> 
			</li>
			
			<li id="categories" class="widget">
				<h3><?php _e( 'Categories', 'pandora' ) ?></h3>
				<ul>
					<?php wp_list_categories('title_li=&show_count=0&hierarchical=1') ?> 
				</ul>
			</li>
			
		<?php endif; // end secondary sidebar widgets  ?>
	</ul>
</div><!-- #secondary .sidebar -->
	
	
