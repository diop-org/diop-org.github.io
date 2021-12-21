<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2 class="post-title"><?php the_title(); ?></h2>

				<div class="entry">
					<?php the_post_thumbnail(array(525,400), array('class' => 'alignnone')); ?>
					<?php the_content('<span class="moretext">' . __('Read more', 'themezee_lang') . '</span>'); ?>
					<?php wp_link_pages(); ?>
				</div>
				<div class="clear"></div>
				
			</div>

		<?php endwhile; ?>

		<?php endif; ?>
		
	</div>
	
	<?php get_footer(); ?>
<?php get_sidebar(); ?>	