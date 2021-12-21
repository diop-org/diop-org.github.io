<?php get_header(); ?>

<?php get_sidebar(); ?>



<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" <?php post_class(); ?>>

<h2><span class="post-title"><?php the_title(); ?></span>
<br /><span class="author">by <?php the_author() ?></span></h2>
<div class="text">

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
<div class="clear"> </div><!--clear-->

<h6><?php the_tags( '<p>Tags: ', ', ', '</p>'); ?></h6>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>



	<?php comments_template(); ?>

</div><!--text-->





	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_template_part('info'); ?>

<div class="clear"> </div><!--clear-->


</div><!--post-->

</div><!--content ends-->

<?php get_footer(); ?>
