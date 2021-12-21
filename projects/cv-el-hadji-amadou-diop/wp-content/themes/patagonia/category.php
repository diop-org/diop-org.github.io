<?php get_header(); ?>
<div id="content">
	<div id="content-inner">
<div id="main">
	<h2 id="sectiontitle"><?php single_cat_title('Category: '); ?></h2>
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
	<div class="tags-font">
			<div class="entry">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt();?>
				<div class="descr"><?php the_time('l F jS, Y') ?> in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>

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
	<?php endif; ?>
	</div> <!-- eof main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
