<div id="footer">
<p class="quiet">
		Powered by <a href="http://wordpress.org/">WordPress</a> using the <a href="http://graphpaperpress.com">F8 Lite Theme</a><br /><a href="<?php bloginfo('rss2_url'); ?>" class="feed">subscribe to posts</a> or <a href="<?php bloginfo('comments_rss2_url'); ?>" class="feed">subscribe to comments</a><br />All content &copy; <?php echo date("Y"); ?> by <?php bloginfo('name'); ?><br /><?php wp_loginout(); ?>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>
</div>
	<?php wp_footer(); ?>
</body>
</html>
