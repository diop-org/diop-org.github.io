<div id="third" class="footer-bar sidebar">
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : // begin secondary sidebar widgets ?>
			<li id="calendar" class="widget">
					<h3><?php _e( 'About site', 'pandora' ) ?></h3>
					<ul>
						<?php echo get_bloginfo ( 'description' ); ?>
					</ul>
			</li>
			
			<li id="rss-links" class="widget">
				<h3><?php _e( 'RSS Feeds', 'pandora' ) ?></h3>
				<ul>
					<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'pandora' ), esc_html( get_bloginfo('name') ) ) ?>" rel="alternate" type="application/rss+xml"><?php _e( 'All posts', 'pandora' ) ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'pandora' ), esc_html( get_bloginfo('name') ) ) ?>" rel="alternate" type="application/rss+xml"><?php _e( 'All comments', 'pandora' ) ?></a></li>
				</ul>
			</li>
			
			<li id="calendar" class="widget">
				<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&title_lu=&category_before=&category_after='); ?>
			</li>
			
			
		<?php endif; // end 3 sidebar widgets  ?>
	</ul>
</div><!-- #3 .sidebar -->
