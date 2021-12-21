<?php if(get_post_meta($post->ID, 'content_sidebar', true)):?>
	<div id="content_sidebar" class="fix">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Content Sidebar') ) : ?>
			<div class="widget copy">
				<div class="winner">
					<?php _e('The content sidebar has been activated on this page/post but doesn\'t have any widgets added to it. Add some widgets to this sidebar in appearance &gt; widgets in the admin.',TDOMAIN);?>
				</div>
			</div>
		<?php endif; ?>
	
	</div>
<?php endif;?>