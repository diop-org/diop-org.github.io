<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2 class="post-title"><?php the_title(); ?></h2>
					
				<div class="postmeta">
					<span class="meta-date"><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a></span>
					<span class="meta-category"><?php the_category(', '); ?></span>
					<span class="meta-comments"><a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a></span>
				</div>
				
				<div class="entry">
					<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
					<?php the_content('<span class="moretext">' . __('Read more', 'themezee_lang') . '</span>'); ?>
					<?php wp_link_pages(); ?>
					<div class="clear"></div>
				</div>
				
				<div class="meta-tags"><?php the_tags('<ul><li><strong>'.__('Tags: ', 'themezee_lang').'</strong></li><li>','</li><li>','</li></ul>'); ?></div>
				<div class="clear"></div>
			</div>

		<?php endwhile; ?>

		<?php endif; ?>
			
		<?php comments_template(); ?>
		
	</div>
	
	<?php get_footer(); ?>
<?php get_sidebar(); ?>	