<?php get_header(); ?>

	<div id="wrap">
		
		<div id="content">
		
		<?php 
		$options = get_option('themezee_options');
		if(is_home() and isset($options['themeZee_show_slider']) and $options['themeZee_show_slider'] == 'true') {
				locate_template('/slide.php', true);
			}
		?>
		 
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
				<div class="postmeta">
					<span class="date"><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a> </span>
					<span class="author"><?php the_author(); ?> </span>
					<span class="folder"><?php the_category(', ') ?> </span>
				</div>
				
				<div class="entry">
					<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
					<?php the_content(__('&raquo; Read more..', 'themezee_lang')); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
				</div>
				
				<div class="postinfo">
					<span class="comment"><a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a></span>
					<?php if (get_the_tags()) echo'<span class="tag">'; the_tags('', ', '); echo '</span>'; ?>
					<?php edit_post_link(__( 'Edit', 'themezee_lang' ), ' | '); ?>
				</div>

			</div>

		<?php endwhile; ?>
			
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
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	