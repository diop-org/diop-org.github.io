<!-- begin colRight -->
		<div id="colRight">
			<div id="inner">
<?php if(is_category() && !is_page()){
	$current = get_the_category(); 
	$current_id= $current[0] ->cat_ID; 
	$categs_list = get_category_parents($current_id);
	if(count($categs_list) > 1){
	$pieces = explode("/", $categs_list);
	$category_name = strtolower($pieces[0]);
	$categs = get_cat_id($category_name);?>

<?php if(in_category($current_id) || post_is_in_descendant_category($current_id)){?>
		<h2><?php echo $category_name; ?> Categories</h2>
		<ul>
			<?php	
					$categories = get_categories('hide_empty=1&child_of='.$categs);
					foreach ($categories as $cat) {
					echo ('<li><a href="')?><?php echo (get_category_link($cat->cat_ID).'">'.$cat->cat_name.' ('.$cat->category_count.')</a></li>');
					}
				?>
		</ul>

	<?php } }
	}?>
		

<?php 
	/* Widgetized sidebar */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
							
<?php endif; ?>
			</div>
		</div>
<!-- end colRight -->

			  