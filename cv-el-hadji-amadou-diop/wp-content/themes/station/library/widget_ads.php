	<?php if(VPRO && function_exists('wp125_write_ads') && !get_post_meta($post->ID, 'hide_ads', true)):?>
	<div id="ads" class="wp125_write_ads_widget widget fix">
		<div class="winner clear">
			<?php wp125_write_ads(); ?>
			<div class="clear"></div>
		</div>
	</div>
	<?php endif;?>