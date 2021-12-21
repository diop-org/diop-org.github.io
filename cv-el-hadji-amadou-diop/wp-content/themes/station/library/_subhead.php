<?php if(!pagelines('hide_sub_header') && !is_search() && !is_404()):?>

	<?php if($post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0")) $children = true;
	else $children = false;?>
	<?php if($children == true):?>
		<div id="subhead" class="content fix">
				<?php get_template_part('library/_subnav');?>
		</div>
	<?php elseif((is_home() || is_category()) && pagelines('subnav_categories') && wp_list_categories('include='.pagelines('subnav_categories').'&title_li=&echo=0') != "<li>No categories</li>"): ?>
	<div id="subhead" class="content fix">
			<div id="subnav" class="fix">
				<ul>
				<?php wp_list_categories('include='.pagelines('subnav_categories').'&title_li='); ?>
				</ul>
			</div>
	</div>

	<?php endif;?>

<?php endif;?>
