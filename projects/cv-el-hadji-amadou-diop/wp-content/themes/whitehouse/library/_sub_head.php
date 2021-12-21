<?php if(is_page_template('page-highlight.php')):?>
	<?php if(!pagelines('hidesearch')) {
		global $sidesearch; $sidesearch = true;
	}?>
	<div id="sub_head" class="fix">
		<?php require(THEME_LIB.'/_sub_nav.php');?>
	</div>
<?php elseif(!pagelines('hide_sub_header')):?>
	<?php if($post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0")) $children = true;?>
	<?php if($children):?>
		<div id="sub_head" class="fix">
			<?php require(THEME_LIB.'/_sub_nav.php');?>
		</div>
	<?php elseif((is_home() || is_category()) && pagelines('subnav_categories') && wp_list_categories('include='.pagelines('subnav_categories').'&title_li=&echo=0') != "<li>No categories</li>"):?>
			<div id="sub_head" class="fix">
					<ul id="subnav" class="fix">
						<?php wp_list_categories('include='.pagelines('subnav_categories').'&title_li='); ?>
		
						<?php if(!is_page_template('page-highlight.php') && !pagelines('hidesearch')) include (THEME_LIB . '/_searchform.php'); ?>
					</ul>
			</div>
	<?php elseif(!pagelines('hidesearch')):?>

		<?php 
			global $sidesearch;
		 	$sidesearch = true;
		?>
	<?php endif;?>
<?php elseif(!pagelines('hidesearch')):?>
	<?php 
		global $sidesearch;
	 	$sidesearch = true;
	?>
<?php endif;?>