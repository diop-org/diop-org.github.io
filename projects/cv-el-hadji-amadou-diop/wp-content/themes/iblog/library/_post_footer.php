
<div class="hl"></div>
	<div class="post-footer">
		<?php if(is_single() || pagelines('post_footer_link')=='always_social'):?>
			<div class="left">
				<?php edit_post_link(__('Edit Post', TDOMAIN), '', ' | ');?>
				<?php e_pagelines('post_footer_social_text', '');?>	
			</div>
			<div class="right">
					<?php if(pagelines('share_facebook')):?><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php the_title();?>" title="<?php _e('Share on',TDOMAIN);?> Facebook" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-facebook.png" alt="Facebook" /></a><?php endif;?> 
					<?php if(pagelines('share_twitter')):?><a href="http://twitter.com/home/?status=<?php the_title();?>%20<?php echo get_permalink(); ?>" title="<?php _e('Share on',TDOMAIN);?> Twitter" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-twitter.png" alt="Twitter" /></a><?php endif;?> 
					<?php if(pagelines('share_delicious')):?><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="<?php _e('Share on',TDOMAIN);?> Delicious" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-del.png" alt="Delicious" /></a><?php endif;?>
					<?php if(pagelines('share_mixx')):?><a href="http://www.mixx.com/submit?page_url=<?php the_permalink() ?>" title="<?php _e('Share on',TDOMAIN);?> Mixx" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-mixx.png" alt="Mixx" /></a> <?php endif;?>
					<?php if(pagelines('share_stumbleupon')):?><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="<?php _e('Share on',TDOMAIN);?> StumbleUpon" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-stumble.png" alt="StumbleUpon" /></a> <?php endif;?>
					<?php if(pagelines('share_digg')):?><a href="http://digg.com/submit?phase=2&url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="<?php _e('Share on',TDOMAIN);?> Digg" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-digg.png" alt="Digg" /></a><?php endif;?>
				
			</div>
		<?php else:?>
			<div class="left">
				<span><?php comments_number(0, 1, '%'); ?></span>
				<a href="<?php the_permalink(); ?>#comments" title="<?php _e('View Comments', TDOMAIN);?>"><?php _e('Comments',TDOMAIN)?></a>
			</div>
			<div class="right">
				<?php edit_post_link(__('Edit Post', TDOMAIN), '', ' | ');?>
				<?php if(pagelines('post_footer_link') != 'hide'):?>
					<span>
					<?php if(pagelines('post_footer_link')=='post_link'):?>
						<a href="<?php the_permalink(); ?>">
							<?php e_pagelines('post_footer_text', __('View Full Post &raquo;',TDOMAIN));?>
						</a>
					<?php else:?>
						<a href="<?php the_permalink(); ?>#respond">
							<?php e_pagelines('post_footer_text',__('Leave A Response', TDOMAIN));?>
						</a>
						
					<?php endif;?>
					</span>
				<?php endif;?>
			</div>
		<?php endif; ?>
		<br class="fix" />
		
	</div>