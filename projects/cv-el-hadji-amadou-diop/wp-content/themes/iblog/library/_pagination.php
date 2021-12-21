<?php if(VPRO && function_exists('wp_pagenavi')):?> 
	<?php wp_pagenavi(); ?>  
<?php elseif (show_posts_nav()) : ?>
	<div class="page-nav fix">
		<span class="previous-entries"><?php next_posts_link(__('Previous Entries', TDOMAIN)) ?></span>
		<span class="next-entries"><?php previous_posts_link(__('Next Entries', TDOMAIN)) ?></span>
	</div><!-- page nav -->
<?php endif;?>