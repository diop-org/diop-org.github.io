<?php get_header(); ?>

	<div id="wrap">
		<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="postmeta">
					<div class="postmeta_links">
						<?php the_author(); ?> |
						<a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a>
						<?php edit_post_link(__( 'Edit', 'themezee_lang' ), ' | '); ?>
					</div>
					<div class="postcomments">
						<a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a>
					</div>
					<div class="clear"></div>
				</div>
				
				<h2><?php the_title(); ?></h2>
				
				<div class="entry">
					<?php the_post_thumbnail('medium', array('class' => 'alignleft')); ?>
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
					<!-- <?php trackback_rdf(); ?> -->			
				</div>
				
				<div class="postinfo">
					<?php _e('Category: ', 'themezee_lang'); the_category(', ') ?> | 
					<?php if (get_the_tags()) the_tags(__('Tags: ', 'themezee_lang'), ', '); ?>
				</div>

			</div>

		<?php endwhile; ?>

		<?php endif; ?>
			
		<?php comments_template(); ?>
		
	</div>
		
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>