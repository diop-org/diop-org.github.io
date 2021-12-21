<!-- begin colLeft -->
		<div id="colFull">
		<?php 
	$current = get_the_category(); 
	$current_id= $current[0] ->cat_ID; 
	$categs_list = get_category_parents($current_id);
	$pieces = explode("/", $categs_list);
	$category_name = strtolower($pieces[0]);
	$categs = get_cat_id($category_name);?>

<?php if(is_category() && in_category($current_id) || post_is_in_descendant_category($current_id)){?>
		<h1><?php single_cat_title(); ?>
		<ul>
			<li><a href="<?php echo get_category_link(get_option('webfolio_portfolio_ID'))?>">All projects</a></li>
			<?php	
					$categories = get_categories('hide_empty=1&child_of='.$categs);
					foreach ($categories as $cat) {
					echo ('<li><a href="');
					
					echo (get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a></li>');
					}
				?>
		</ul>
	</h1>
	<?php } ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="boxgrid captionfull">
				<a href="<?php echo get_first_image() ?>" class="lightbox" title="Click to zoom"><?php the_post_thumbnail(); ?></a>
				<div class="cover boxcaption">
					<p><a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a></p>
					<p>Posted in <?php the_category(' '); ?>. Click the title to read more or click the image to zoom.</p>
					
				</div>		
			</div>
		<?php endwhile; ?>
	<div class="navigation">
			<div class="alignleft"><?php next_posts_link('Older') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer') ?></div>
		</div>

	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
		</div>
<!-- end colLeft -->
