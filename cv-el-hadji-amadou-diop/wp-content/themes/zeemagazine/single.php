<?php get_header(); ?>

	<div id="wrap">
		
		<div id="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2 class="post-title"><?php the_title(); ?></h2>
					
				<div class="postmeta">
					<span class="date"><?php the_time(get_option('date_format')); ?> </span>
					<span class="author"><?php the_author(); ?> </span>
					<span class="folder"><?php the_category(', ') ?> </span>
				</div>
				
				<div class="entry">
					<?php the_post_thumbnail('medium', array('class' => 'alignleft')); ?>
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
					<!-- <?php trackback_rdf(); ?> -->	
				</div>
				
				<div class="postinfo">
					<span class="comment"><a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a></span>
					<?php if (get_the_tags()) echo'<span class="tag">'; the_tags('', ', '); echo '</span>'; ?>
					<?php edit_post_link(__( 'Edit', 'themezee_lang' ), ' | '); ?>
				</div>
				
			</div>

		<?php endwhile; ?>

		<?php endif; ?>
			
		<?php comments_template(); ?>
		
		</div>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	