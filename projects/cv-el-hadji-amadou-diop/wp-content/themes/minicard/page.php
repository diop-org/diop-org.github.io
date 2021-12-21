<?php get_header(); ?>

<div id="mainContent">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			
			<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
				        	        	        
		</div>
		<?php comments_template(); ?>
		
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'minicard'); ?></p>
	<?php endif; ?>

</div>

<?php get_footer(); ?>