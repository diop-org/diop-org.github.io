<div class="hl"></div>
<div class="author-info lowlight2">
	<div class="copy fix">
		<div class="thumb left"><?php echo get_avatar(get_the_author_meta('email'), $size = '80', $default = CORE_IMAGES. '/avatar_default.gif' ); ?></div>
		<div class="post-author">
			<div class="author-descr">
				<small><?php _e('About the author', TDOMAIN);?></small>
				<h3><?php the_author(); ?></h3>
				<p><?php the_author_meta('description'); ?></p>
				<div class="author-details"><a href="<?php the_author_meta('url'); ?>" target="_blank"><?php _e('Visit Authors Website', TDOMAIN);?></a></div>
			</div>
			<!--/author-descr -->
			<br class="fix" />
		</div>
		<!--/post-author -->
	</div>
</div>