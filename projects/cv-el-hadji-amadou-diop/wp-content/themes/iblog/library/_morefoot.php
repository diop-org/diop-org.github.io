<?php 
global $pagelines_ID;

if(m_pagelines('full_width_widget', $pagelines_ID) && VPRO):?>
	<div id="fullwidth_bottom_widgets" class="widget">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Full-Width Bottom Sidebar')) : ?>
		<div class="widget">
		<p class="subtle"><?php _e('Full width widgets selected but no widgets have been added.',TDOMAIN);?></p>
		</div>
	<?php endif;?>
	</div>
<?php endif;?>
<div class="clear"></div>


<?php 

	global $bbpress_forum;
	if(($bbpress_forum && pagelinesforum('hide_bottom_sidebars')) || !pagelines('bottom_sidebars') || pagelines('hide_bottom_sidebars', $pagelines_ID)) $hide_footer = true;
	else $hide_footer = false;		
?>
<?php if(!$hide_footer && VPRO):?>
	<div id="morefoot" class="fboxes fix">
		<div class="fboxdividers fix">
			<div class="fbox">
				<div class="fboxcopy">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
					<?php if(!pagelines('sidebar_no_default')):?>
						<h3><?php _e('Looking for something?', TDOMAIN);?></h3>
						<p><?php _e('Use the form below to search the site:', TDOMAIN);?></p>
						<div class="left p"><?php get_template_part ('library/_searchform'); ?></div>
						<div class="clear"></div>
						<p><?php _e('Still not finding what you\'re looking for? Drop a comment on a post or contact us so we can take care of it!', TDOMAIN);?></p>
					<?php endif;?>
				<?php endif; ?>
				</div>
			</div>

			<div class="fbox">
				<div class="fboxcopy">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Middle') ) : ?>
					<?php if(!pagelines('sidebar_no_default')):?>
						<h3><?php _e('Visit our friends!', TDOMAIN);?></h3><p><?php _e('A few highly recommended friends...', TDOMAIN);?></p><ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
					<?php endif;?>
				<?php endif; ?>
				</div>
			</div>

			<div class="fbox">
				<div class="fboxcopy">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
					<?php if(!pagelines('sidebar_no_default')):?>
					<h3><?php _e('Archives', TDOMAIN);?></h3><p><?php _e('All entries, chronologically...', TDOMAIN);?></p><ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
					<?php endif;?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!-- Closes morefoot -->
<?php endif; ?>

