<?php

	global $pagelines_ID;

?>
<div id="sidebar" class="fix">
		<?php get_template_part('library/widget_welcome');?>
		<?php if(VPRO) get_template_part('library/_grandchildnav');?>
		
		<?php if(VPRO && pagelines('the_sidebar', $pagelines_ID) == 'accordion'):?>
			<div id="accordion">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Accordion Sidebar') ) : ?>
				<h3 id="" class=" accordion_sidebar drawer-handle"><?php _e("Add Widgets", TDOMAIN);?></h3>
				<div class="drawer-content">
					<div class="pad_small">
						<?php _e('The accordion sidebar has been selected but doesn\'t have any widgets. Add some widgets to your secondary sidebar in the admin under appearance > widgets.',TDOMAIN);?>
					</div>
				</div>
			<?php endif; ?>
			</div>
		<?php elseif(VPRO && pagelines('the_sidebar', $pagelines_ID) == 'dragdrop'):?>
			<div id="drag_drop_sidebar">				
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Drag and Drop Sidebar') ) : ?>
				<div class="widget">
				<h3 id="" class="accordion_sidebar drawer-handle"><?php _e("Add Widgets", TDOMAIN);?></h3>
				<div class="drawer-content">
					<div class="pad_small">
						<?php _e('The drag and drop sidebar has been selected but doesn\'t have any widgets. Add some widgets to your short sidebar in the admin under appearance > widgets.',TDOMAIN);?>
					</div>
				</div>
				</div>
			<?php endif; ?>
			</div>
		<?php else:?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
				<?php if(!pagelines('sidebar_no_default')) get_template_part('library/_defaultsidebar');?>
			<?php endif; ?>
		<?php endif;?>
		
		<?php if(VPRO && pagelines('lower_sidebar', $pagelines_ID)):?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Lower Sidebar') ) : ?>
			<?php endif; ?>
		<?php endif;?>
</div><!--/sidebar -->