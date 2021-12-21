<?php get_header(); ?>

		<div id="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2><?php the_title(); ?></h2>
					
				<div class="postmeta">
					<span class="date"><?php the_time(get_option('date_format')); ?> </span>
					<span class="author"> / <?php the_author(); ?> </span>
					<span class="comment"> / <a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a></span>
					<?php edit_post_link(__( 'Edit', 'themezee_lang' ), ' / '); ?>
				</div>
				
				<div class="entry">
					<?php the_post_thumbnail('medium', array('class' => 'alignleft')); ?>
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
					<!-- <?php trackback_rdf(); ?> -->	
				</div>
				
				<div class="postmeta">
					<span class="folder"><?php _e('Categories: ', 'themezee_lang'); ?> <?php the_category(', ') ?> </span>
					<span class="tag"> / <?php if (get_the_tags()) the_tags(__('Tags: ', 'themezee_lang'), ', '); ?></a></span>
				</div>
				
			</div>

		<?php endwhile; ?>

		<?php endif; ?>
			
		<?php comments_template(); ?>
		
		</div>
		
	<div class="clear"></div>
</div>
		
	<?php get_sidebar(); ?>
<?php get_footer(); ?>