<?php 
	global $pagelines_ID;
	global $bbpress_forum;
	if(($bbpress_forum && pagelinesforum('hide_bottom_sidebars')) || !pagelines('bottom_sidebars') || pagelines('hide_bottom_sidebars', $pagelines_ID)) $hide_footer = true;
	else $hide_footer = false;		
?>
<?php if(!$hide_footer):?>
	<div id="morefoot" class="fix">
		<div id="morefootbg" class="fix">
		
			<div class="wcontain fix">	
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
					<?php if(!pagelines('sidebar_no_default')):?>
						<div class="widget">
							<h3><?php _e('Looking for something?',TDOMAIN);?></h3>
							<p><?php _e('Use the form below to search the site:',TDOMAIN);?></p>
							<?php get_template_part ('library/_searchform'); ?>
							<p class="clear"><?php _e('Still not finding what you\'re looking for? Drop a comment on a post or contact us so we can take care of it!',TDOMAIN);?></p>
						</div>
					<?php endif;?>
				<?php endif; ?>
			</div>

			<div class="wcontain">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Middle') ) : ?>
					<?php if(!pagelines('sidebar_no_default')):?>
						<div class="widget">
							<h3><?php _e('Archives', TDOMAIN);?></h3><p><?php _e('All entries, chronologically...',TDOMAIN);?></p><ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>

						</div>
					<?php endif;?>
			
				<?php endif; ?>
			</div>

			<div class="wcontain">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
					<?php if(!pagelines('sidebar_no_default')):?>
						<div class="widget">
						<h3><?php _e('Visit our friends!',TDOMAIN);?></h3><p><?php _e('A few highly recommended friends...',TDOMAIN);?></p><ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
						</div>
					<?php endif;?>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- Closes morefoot -->
<?php endif; ?>
