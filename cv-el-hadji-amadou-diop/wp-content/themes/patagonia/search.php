<?php get_header(); ?>
<div id="content">
	<div id="content-inner">
<div id="main">
<h2 id="sectiontitle">Search: <?php the_search_query(); ?></h2>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
	<div class="entry">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content('Read more &raquo;'); ?>
		</div>
		<div class="postmetadata">
		 <?php if (get_the_tags()){?>
		 		  	<p>Tags: <?php the_tags('') ?></p>
		<?php } ?>				
			<p><img style="vertical-align:-5px;" alt="categories" src="<?php bloginfo('template_directory'); ?>/images/category.gif" height="16" width="16" /> <?php the_category(', ') ?> | <?php the_author_posts_link(); ?>  <?php the_date(); ?>   |  <img style="vertical-align:-5px;" alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comment.gif" height="15" width="20" /> 
			<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> <?php edit_post_link('Edit',' ',''); ?></p>
			</div>
		<?php comments_template(); ?>
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
	<?php endif; ?>

	</div> <!-- eof main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
