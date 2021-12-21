<?php get_template_part('library/widget_welcome');?>

<?php if(VPRO && function_exists('wp125_write_ads')):?>
<div id="ads" class="wp125_write_ads_widget widget">
	<div class="winner clear">
		<?php wp125_write_ads(); ?>
		<div class="clear"></div>
	</div>
</div>
<?php endif;?>

<?php if(function_exists('get_flickrRSS') && VPRO):?>
<!--sidebox start -->
  <div id="dflickr" class="widget_flickrRSS widget">
	<div class="winner fix">
          <ul>
           <?php get_template_part('library/_flickr');?> 
          </ul>
    </div>
  </div>
  <!--sidebox end -->
<?php endif; ?>

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
  <div id="dtags" class="widget_tag_cloud widget">
	<div class="winner">
 	   <h3 class="wtitle"><?php _e('Tags',TDOMAIN); ?></h3>
         <div>
			<?php wp_tag_cloud('smallest=8&largest=17&number=30'); ?>
   		 </div>
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
          <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)',TDOMAIN);?></a></li>
		</ul>
    </div>
  </div>
  <!--sidebox end -->