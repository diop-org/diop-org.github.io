<?php
/*
Template Name: Portfolio 2 Column
*/
?>
<?php get_header(); ?>

	<div id="content" class="portfolio-two-column">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<h2 class="page-title"><?php the_title(); ?></h2>
				<?php edit_post_link(__( 'Edit', 'themezee_lang' )); ?>

				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>

			</div>

		<?php endwhile; ?>

		<?php endif; ?>
		
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			 $query_arguments = array(
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'posts_per_page' => 4,
				'paged' => $paged,
				'orderby' => 'date'
				);
				
			$temp = $wp_query;  // assign orginal query to temp variable for later use
			$wp_query = new WP_Query($query_arguments);
		?>
		 
		<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="portfolio-item">
					<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail(array(240, 180)); ?></a>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<div class="entry">
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink() ?>" class="more-link"><span class="moretext"><?php _e('Read more', 'themezee_lang'); ?></span></a>
					</div>
				</div>
				
			</div>

		<?php endwhile; ?>
		<div class="clear"></div>
			
			<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
				<div class="more_posts">
					<?php wp_pagenavi(); ?>
				</div>
			<?php } else { // Otherwise, use traditional Navigation ?>
				<div class="more_posts">
					<span class="post_links"><?php next_posts_link(__('&laquo; Older Entries', 'themezee_lang')) ?> &nbsp; <?php previous_posts_link (__('Recent Entries &raquo;', 'themezee_lang')) ?></span>
				</div>
			<?php }?>

		<?php endif; ?>
			
	</div>
	
	<?php $wp_query = $temp; wp_reset_query(); ?>
	
	<?php get_footer(); ?>	
<?php get_sidebar(); ?>	