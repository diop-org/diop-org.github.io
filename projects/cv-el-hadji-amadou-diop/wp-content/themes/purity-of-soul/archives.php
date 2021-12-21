<?php 
/*
Template Name: Archives
*/

get_header(); 

?>

<div id="main-content">
	<ul class="xoxo">
				
		<li id="monthly-archives">
			<h3 class="entry-title">Archives by Category</h3>
			<ul class="entry-content">
				<?php wp_get_archives('type=monthly&show_post_count=1') ?>
			</ul>						
		</li>
					
		<li id="category-archives">
			<h3 class="entry-title">Archives by Month</h3>
			<ul class="entry-content">
				<?php wp_list_categories('optioncount=1&title_li=&show_count=1&hierarchical=0') ?> 
			</ul>
		</li>
					
	</ul>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
