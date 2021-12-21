<?php get_header(); ?>
<?php
	$options = get_option('patagonia_options');
?>
<div id="content">
<div id="content-inner">
<div id="main">
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="sticky-box">
	                <?php if(is_sticky()) : ?>
	    				<div class="sticky-post"><img src="<?php bloginfo('template_url'); ?>/images/sticky.png" alt="sticky" width="70" height="70"/></div>
	    			<?php endif; ?>
	</div>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
  <div class="date"><div class="month"><?php the_time('M') ?></div><div class="nr"><?php the_time('j') ?></div><div class="year"><?php the_time('Y') ?></div></div>
	<div class="entry">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="postmetadata3">
		<img style="vertical-align:-5px;" alt="categories" src="<?php bloginfo('template_directory'); ?>/images/category.gif" height="16" width="16" /> <?php the_category(', ') ?>
	    </div>
		<?php comments_template(); ?>
	</div>
				<?php the_content('Continue Reading &raquo;'); ?>
				<div class="fixed"></div>
	<div class="postmetadata2">
		 <?php if (get_the_tags()){?> Tags: <?php the_tags('') ?>  <?php } ?> | <img style="vertical-align:-5px;" alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comment.gif" height="15" width="20" />
		 <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> <?php edit_post_link('Edit',' ',''); ?>
	</div>
</div>
	<?php endwhile; ?>
	 <div id="navigation">
			<div class="fleft"><?php next_posts_link('&laquo; Older') ?></div>
			<div class="fright"> <?php previous_posts_link('Newer &raquo;') ?></div>
	 </div>
	<?php else : ?>
	 <div class="post">
	   <div class="entry">
		 <h2>Not Found</h2>
		 <p>Sorry, you are looking for something that isn't here.</p>
       </div>
</div>
</div>
</div>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
