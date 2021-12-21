<?php get_header(); ?>
<div id="content">
	<div id="content-inner">
<div id="main">
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
	<div class="entry">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content('Continue Reading &raquo;'); ?>
		</div>
		<div class="fixed"></div>
		<div class="postmetadata2">
			<p>By <?php the_author_posts_link(); ?> <?php the_date(); ?> <?php edit_post_link('Edit',' ',''); ?></p>
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
