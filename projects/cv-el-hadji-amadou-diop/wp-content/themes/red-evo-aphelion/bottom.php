  <div class="clear"></div>
	  </div><!--content-->
  
  <div id="bottom"><div class="bottombg">
	     <div id="user1"><div class="padding">
           <ul> 
         <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(4) ) : ?>
        <li class="archives">
   		 <h3>Archives</h3> 
        <ul> 
        <?php wp_get_archives('type=monthly'); ?> 
        </ul> 
        </li>
        <?php endif; ?> 
        </ul>
   </div></div>
   <div id="user2"><div class="padding">  <ul> 
     <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(5) ) : ?>
          <li class="recentarticles">
          <h3 class="widgettitle"><?php _e('Recent Articles'); ?></h3>
          	<ul><?php wp_get_archives('title_li=&type=postbypost&limit=10'); ?></ul>
         
          </li>
          <?php endif; ?>  </ul>
   </div></div>
		 <div class="clear"></div>
	  </div></div><!--bottom-->