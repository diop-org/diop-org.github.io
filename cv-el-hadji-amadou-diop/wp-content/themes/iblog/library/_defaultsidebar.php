<?php if(VPRO) get_template_part('pro/widget_ads');?>
<?php if(VPRO) get_template_part('pro/widget_flickr');?>

<!--sidebox start -->
  <div id="dcategories" class="widget_categories widget">
	<div class="winner">
 	   <h3 class="wtitle"><?php _e('Categories',TDOMAIN); ?></h3>
          <ul>
            <?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&title_li='); ?>
          </ul>

    </div>
  </div>
  <!--sidebox end -->

  <!--sidebox start -->
  <div id="darchive" class="widget_archive widget">
	<div class="winner">
 	   <h3 class="wtitle"><?php _e('Articles',TDOMAIN); ?></h3>
          <ul>
        <?php wp_get_archives('type=monthly'); ?>
  		</ul>
    </div>
  </div>
  <!--sidebox end -->

<!--sidebox start -->
  <div id="dtags" class="widget_tags widget">
	<div class="winner">
 	   <h3 class="wtitle"><?php _e('Tags', TDOMAIN);?></h3>

          <ul>
			<?php wp_tag_cloud('smallest=8&largest=17&number=30'); ?>
   		 </ul>
    </div>
  </div>
  <!--sidebox end -->

<!--sidebox start -->
   <div id="dlinks" class="widget_links widget">
	<div class="winner">
  	   <h3 class="wtitle"><?php _e('Links',TDOMAIN); ?></h3>
          <ul>
			<?php wp_list_bookmarks('title_li=&categorize=0'); ?>       
		</ul>
     </div>
   </div>
   <!--sidebox end -->


  <!--sidebox start -->
  <div id="dmeta" class="widget_meta widget">
	<div class="winner">
 	   <h3 class="wtitle"><?php _e('Meta',TDOMAIN); ?></h3>
      	<ul>
			<?php wp_register(); ?>
			<li class="login"><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
          <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
		</ul>
    </div>
  </div>
  <!--sidebox end -->