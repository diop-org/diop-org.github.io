
		</div>
	</div> 
</div>

<!--full width bottom widget -->
<?php if(m_pagelines('full_width_widget', $post->ID) && VPRO):?>
<div class="contentshadow">
	<div class="content">
		<div id="fullwidth_bottom_widgets" class="">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Full-Width Bottom Sidebar')) : ?>
			<div class="widget pad_big">
			<p class="subtle"><?php _e('Full width widgets selected but no widgets have been added.',TDOMAIN);?></p>
			</div>
		<?php endif;?>
		</div>

	</div>
</div>
<div class="clear"></div>
<?php endif;?>
<!--END full width bottom widget -->



		<div class="clear"></div>
		<?php 
		
			global $bbpress_forum;
			if(($bbpress_forum && pagelinesforum('hide_bottom_sidebars')) || !pagelines('bottom_sidebars') || !VPRO) $hide_footer = true;
			else $hide_footer = false;		
		?>
		<?php if(!$hide_footer):?>
	
			<div class="contentshadow">
				<div class="content">
				
			<?php include (THEME_LIB . '/_morefoot.php'); ?>
				
			</div><!-- end container -->
			</div><!-- end contentshadow -->

		<?php endif; ?>

<div  id="footer">
	<div class="effect">
		<div class="content">
			<?php if(pagelines('twitfooter') && pagelines('twittername')):?>
				<div id="footer_topline"><?php include (THEME_LIB . '/_twittermessages.php'); ?></div>
			<?php endif;?>
			<div id="fcolumns_container" class="fix">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Columns') ) : ?>
					<div class="fcol">
						<div class="fcol_pad">
							<?php if(pagelines('footer_logo') && VPRO):?>
								<a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>">
									<img src="<?php echo pagelines('footer_logo');?>" alt="<?php bloginfo('name');?>" />
								</a>
							<?php else:?>
								<h3 class="footer-site-title"><a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php bloginfo('name');?></a></h3>
							<?php endif;?>
						</div>
					</div>
					<div class="fcol">
						<div class="fcol_pad">
							<h3><?php _e('Pages',TDOMAIN);?></h3>
							<?php include(THEME_LIB."/_footer_nav.php");?>
						</div>
					</div>
					<div class="fcol">
						<div class="fcol_pad">
							<h3><?php _e('Stay In Touch',TDOMAIN);?></h3>
								<ul>

									<li><a href="<?php echo RSSURL;?>" class="rsslink"><?php _e('Site RSS Feed', TDOMAIN);?></a></li>
								<?php if(VPRO):?>
									<?php if(pagelines('twitterlink')):?>
										<li><a href="<?php echo pagelines('twitterlink');?>" class="twitterlink">Twitter</a></li>
									<?php endif;?>
									<?php if(pagelines('facebooklink')):?>
										<li><a href="<?php echo pagelines('facebooklink');?>" class="facebooklink">Facebook</a></li>
									<?php endif;?>
									<?php if(pagelines('linkedinlink')):?>
										<li><a href="<?php echo pagelines('linkedinlink');?>" class="linkedinlink">LinkedIn</a></li>
									<?php endif;?>
								<?php endif;?>
								</ul>

						</div>
					</div>
					<div class="fcol">
						<div class="fcol_pad">
							<h3><?php _e('More',TDOMAIN);?></h3>
							<?php if(pagelines('welcomemessage')):?><div class="welcomemessage"><?php echo pagelines('welcomemessage');?></div><?php endif;?>
						</div>
					</div>
					<div class="fcol">
						<div class="fcol_pad">
							<span class="terms">
								<?php e_pagelines('terms');?>
							</span>
						</div>
					</div>
				<?php endif; ?>
			</div>
	
		
			<div class="clear"></div>
		</div>		
	</div>


</div>
	<div class="clear"></div>
	
	<div id="subfoot">
	
		<?php if(pagelines('no_credit') || !VDEV):?>
			<div id="cred" class="pagelines">
				<a class="plimage" target="_blank" href="<?php e_pagelines('partner_link', pagelines('credlink'));?>">
					<img src="<?php echo THEME_IMAGES.'/pagelines.png';?>" alt="<?php echo THEMENAME;?> by PageLines" />
				</a>
			</div>
		<?php endif;?>
	 	<hr class="hidden" />
	</div><!--/subfoot -->

  </div><!--/wrapper -->
</div> <!-- end #site -->

<!-- Footer Scripts Go Here -->
	<?php if (pagelines('footerscripts')) echo pagelines('footerscripts');?>
<!-- End Footer scripts -->
<?php wp_footer(); ?>
</body>
</html>