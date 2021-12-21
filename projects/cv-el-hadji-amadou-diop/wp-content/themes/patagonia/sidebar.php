<?php
	$options = get_option('patagonia_options');

	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>
<!-- begin sidebar -->
<div id="sidebar">
<div id="subscribe">
  <div align="center"><a id="feedrss" title="<?php _e('Subscribe to our RSS Feed!', 'patagonia'); ?>" href="<?php echo clean_url($feed); ?>"><?php _e('<abbr title="RSS"></abbr>', 'patagonia'); ?></a>
			<?php if($options['twitter_icon'] && $options['twitter_nick']) : ?>
				<a id="twitterid" title="<?php _e('Follow us on Twitter!', 'patagonia'); ?>" href="http://twitter.com/<?php echo sanitize_user($options['twitter_nick']); ?>"><?php _e('', 'patagonia'); ?></a>
			<?php endif; if($options['facebook_icon'] && $options['facebook_url']) : ?>
				<a id="facebookid" title="<?php _e('Connect with us on Facebook!', 'patagonia'); ?>" href="<?php echo clean_url($options['facebook_url']); ?>/"><?php _e('', 'patagonia'); ?></a>
			<?php endif; ?>
  </div>
</div>
<div class="menu">
<ul>
<?php /* WordPress Widget Support */ if (function_exists('dynamic_sidebar') and dynamic_sidebar(1)) { } else { ?>
	<li class="widget" id="pages"> 
	<h3><?php _e('Pages'); ?></h3>
		<ul>
			<?php wp_list_pages('title_li='); ?>
		</ul>
	</li>

   <li class="widget" id="categories">
   <h3><?php _e('Categories'); ?></h3>
	  <ul>
	      <?php wp_list_categories('title_li='); ?>
	  </ul>
   </li>
 
 	<li class="widget" id="links">
		<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=&category_after='); ?>
	</li>
 
        <li class="widget" id="search">
 		<h3><?php _e('Search'); ?></h3>
 		<ul>
  	          <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		      <input type="text" name="s" id="s" style="width:100px" /><input type="submit" value="<?php _e('Search'); ?>" />
	          </form>
 		</ul>
        </li>
		
 <li class="widget" id="tags"><h3><?php _e('Tagcloud'); ?></h3>
	<?php wp_tag_cloud(''); ?>
 </li>
	 <li class="widget" id="archives"><h3><?php _e('Archives'); ?></h3>
 	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
 	</ul>
 </li>
 <li class="widget" id="meta"><h3><?php _e('Meta'); ?></h3>
 	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('RSS'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments RSS'); ?></a></li>
		<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
		<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>"><abbr title="WordPress">WP</abbr></a></li>
		<?php wp_meta(); ?>
	</ul>
 </li> 
 <li class="widget" id="calendar"> 
	<h3><?php _e('Calendar'); ?></h3>
	 <?php get_calendar(); ?> 
	</li>
<?php } ?>

</ul>
</div>
</div><!-- end sidebar -->
