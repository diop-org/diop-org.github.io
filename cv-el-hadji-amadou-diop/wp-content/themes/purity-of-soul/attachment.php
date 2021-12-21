<?php get_header(); ?>

<div id="main-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php 
		$attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); 
		$_post = &get_post($post->ID); 
		$classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; 
	?>

	<h2 class="entry-title">
		<?php if ($post->post_parent != 0) : ?>
			<a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; 
		<?php endif; ?>
			<a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
	</h2>


	<div class="entry-content">
		<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?></p><p><?php echo basename($post->guid); ?></p>
		<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>


<?php if ( comments_open() ) comments_template(); ?>

<?php endwhile; else: ?>

	
		<div id="c404">
			<h2 class="entry-title">No attachments matched your criteria.</h2>
			<div class="entry-content">
				<p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform-404">this form</a>...</p>
				<form id="searchform-404" class="blog-search clearfix" method="get" action="<?php bloginfo('home') ?>">
					<p><input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" /><input class="submit" type="submit" value="Search" /></p>
				</form>
			</div>
		</div>


<?php endif; ?>

</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
