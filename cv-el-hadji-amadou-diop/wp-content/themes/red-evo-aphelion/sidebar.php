</div>
		   </div></div>
		</div>
        
		<div class="leftcol sidebar" id="left"><div class="bgbottom">
        
         <ul> 
    <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>
		<?php wp_list_pages('title_li=<h3 class="collapse-head">Pages</h3>'); ?> 
        <?php wp_list_categories('title_li=<h3 class="collapse-head">Categories</h3>'); ?> 
        
    <?php endif; ?> 
    </ul>
   
   	</div></div>