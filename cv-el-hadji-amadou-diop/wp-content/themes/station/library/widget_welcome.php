<?php if(pagelines('greeting') || pagelines('welcomemessage')):?>
	<div id="welcome" class="fix">
		<div class="welcometext">
			<?php if(pagelines('greeting')):?><h3 class="greeting"><?php echo pagelines('greeting');?></h3><?php endif;?>
			<?php if(pagelines('welcomemessage')):?><div class="welcomemessage"><?php echo pagelines('welcomemessage');?></div><?php endif;?>
			<?php get_template_part ('library/_twittermessages'); ?>
			<div class="clear"></div>
		</div>
	</div>
<?php endif;?>			
