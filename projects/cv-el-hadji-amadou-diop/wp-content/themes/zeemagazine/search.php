<?php get_header(); ?>

	<div id="wrap">
		
		<div id="content">
		
		<?php if (have_posts()) : ?>
		<h2 class="arh"><?php _e('Search results for ', 'themezee_lang'); echo get_search_query(); ?></h2>
		
		<?php while (have_posts()) : the_post(); ?>
		
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
				</div>
				<div class="clear"></div>

				<div class="postinfo">
					<span class="comment"><a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a></span>
					<?php if (get_the_tags()) echo'<span class="tag">'; the_tags('', ', '); echo '</span>'; ?>
					<?php edit_post_link(__( 'Edit', 'themezee_lang' ), ' | '); ?>
				</div>
			</div>
				
			<?php endwhile; ?>
			
			<div class="more_posts">
			<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
				<?php wp_pagenavi(); // Use PageNavi ?>
			<?php } else { // Otherwise, use traditional Navigation ?>
			
				<span class="post_links"><?php next_posts_link(__('&laquo; Older Entries', 'themezee_lang')) ?> &nbsp; <?php previous_posts_link (__('Recent Entries &raquo;', 'themezee_lang')) ?></span>
			<?php }?>
			</div>
			
			
			<?php else : ?>

			<h2 class="arh"><?php _e('Search results for ', 'themezee_lang'); echo get_search_query(); ?></h2>
			
			<div class="post">
				
				<div class="entry">
					<p><?php _e('No matches. Please try again, or use the navigation menus to find what you search for.', 'themezee_lang'); ?></p>
				</div>
				
			</div>

			<?php endif; ?>
			
		</div>

		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	