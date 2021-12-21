<div id="sidebar" role="complementary">
	
	<?php
	global $sidesearch;
	if($sidesearch):?>
		<div id="sidesearch" class="fix">
				<?php include (THEME_LIB . '/_searchform.php'); ?>	
		</div>
	<?php endif;?>
	
	<div id="widgets">
		<?php if(VPRO) include(THEME_LIB.'/_grandchildnav_pro.php');?>
	
		<?php if(pagelines('the_sidebar', $post->ID) == 'secondary'):?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar') ) : ?>
				<?php _e('The secondary sidebar has been selected but doesn\'t have any widgets. Add some widgets to your secondary sidebar in the admin under appearance > widgets.',TDOMAIN);?>
			<?php endif; ?>
		<?php elseif(pagelines('the_sidebar', $post->ID) == 'short'):?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Short Sidebar') ) : ?>
				<?php _e('The short sidebar has been selected but doesn\'t have any widgets. Add some widgets to your short sidebar in the admin under appearance > widgets.',TDOMAIN);?>
			<?php endif; ?>
		<?php else:?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
				<?php if(!pagelines('sidebar_no_default')) include(THEME_LIB.'/_defaultsidebar.php');?>
			<?php endif; ?>
		<?php endif;?>
		
	</div>
</div>
