<div id="sidebar"><!-- Single Page Sidebar -->

	    <ul>

			<?php /* WordPress Widget Support */ if (function_exists('dynamic_sidebar') and dynamic_sidebar(1)) { } else { ?>
			
			<div class="pages"><h2><?php _e('Pages'); ?></h2>
		    <ul>
			<?php wp_list_pages('title_li='); ?>
		    </ul>
			</div>

			<div class="archives"><h2>Archives</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
			
			 <div class="meta"><h2><?php _e('Meta'); ?></h2>
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
            
		<?php } ?>
        </ul>
	

</div>