<!-- Code for subnav if pages have parents.. -->
<?php if(isset($post) && ( ($post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0")) && !$bbpress_forum && !is_search() && !pagelines('hide_sub_header') ) ):?>
<div id="subnav" class="fix">
	<ul>
		<?php 
			if(count($post->ancestors)>=2){
				$reverse_ancestors = array_reverse($post->ancestors);
				$children = wp_list_pages("title_li=&depth=1&child_of=".$reverse_ancestors[0]."&echo=0&sort_column=menu_order");	
			}elseif($post->post_parent){ $children = wp_list_pages("title_li=&depth=1&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
			}else{	$children = wp_list_pages("title_li=&depth=1&child_of=".$post->ID."&echo=0&sort_column=menu_order");}

			if ($children) { echo $children;}
		?>
	</ul>
</div><!-- /sub nav -->
<?php elseif((is_home()|| is_category()) && pagelines('subnav_categories')):?>
	<div id="subnav" class="fix">
		<ul>
			<?php wp_list_categories('include='.pagelines('subnav_categories').'&title_li='); ?>
		</ul>
	</div>
<?php elseif(is_search()):?>
	<h4><?php _e('Search Results For',TDOMAIN);?> "<?php the_search_query(); ?>"</h4>
<?php endif;?>

