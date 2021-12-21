	<div class="rightcol sidebar" id="right"><div class="bgbottom">
			 <ul>
    <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(3) ) : ?> 
      
        <li id="rss-links"><h3 class="collapse-head">RSS Feeds</h3> 
            <ul> 
                <li><a href="<?php bloginfo('rss2_url') ?>">Posts RSS</a></li> 
                <li><a href="<?php bloginfo('comments_rss2_url') ?>">Comments RSS</a></li> 
            </ul> 
        </li> 
        <li id="meta"><h3 class="collapse-head">Meta</h3> 
            <ul> 
				<?php wp_register() ?> 
                <li><?php wp_loginout() ?></li> 
                <?php wp_meta() ?> 
            </ul> 
        </li> 
       <?php endif; ?>
    </ul> 
		</div></div>
