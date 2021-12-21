<div id="sidebar">
	<h2 class="hide">Sidebar</h2>
	<div class="search">
		<h3 class="widgettitle">Search</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="text" name="s" class="input-text" size="26"/>
			<input type="submit" name="submit" class="btn-search" value="Go" />
		</form>
	</div>
	<p class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Subscribed via RSS</a></p>
	<div id="widget-about" class="widget">
		<h3 class="widgettitle">About</h3>
		<div class="widgetcontent">
			<p><?php //iz_get_about_widget(); ?>A little something about you, the author. Nothing lengthy, just an overview.</p>
		</div>
	</div>
	<div id="main-sidebar">
	<ul class="xoxo">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
			<li id="widget-categories" class="widget">
				<h3 class="widgettitle">Categories</h3>
				<ul>
<?php wp_list_categories('title_li=&show_count=0&hierarchical=0') ?> 
				</ul>
			</li>

			<li id="widget-archives" class="widget">
				<h3 class="widgettitle">Archives</h3>
				<ul>
<?php wp_get_archives('type=monthly') ?>
				</ul>
			</li>
			
<?php wp_list_bookmarks('title_before=<h3 class="widgettitle">&title_after=</h3>&show_images=1&category_before=<li id="%id" class="widget %class">') ?>

<?php endif; ?>			

			<li id="widget-meta" class="widget">
				<h3 class="widgettitle">Meta</h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
	

		</ul>
	
	</div>
</div>
</div> <!-- #middle-inner -->
</div> <!-- #middle -->
		