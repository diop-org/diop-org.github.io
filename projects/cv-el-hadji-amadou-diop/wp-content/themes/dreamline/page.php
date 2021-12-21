<?php get_header(); ?>
<div id="site_content">
	<div id="content" class="narrowcolumn"> 

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<p style="float:right;"> <?php edit_post_link('Edit', '<span class="edit_link">', '</span>'); ?> </p>
		<h2><?php the_title(); ?></h2>
		
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>