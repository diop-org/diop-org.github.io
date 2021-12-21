<?php get_header(); ?>

<div class="middle_single"><!-- Single Archive Page Starts -->

	<?php if (have_posts()) : ?>
	<?php $post = $posts[0];?>
	<?php  if (is_month())  ?>
	<div class="posttop"></div>
	  	<h2 class="month_metadata">Search Results for: <?php the_search_query(); ?></h2>
		<div class="postbot"></div>
  	    <?php while (have_posts()) : the_post(); ?>
		<div class="posttop"></div>
		<div class="post_blog"><!-- Single Post -->
			<a class="titles" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><br/><br/>
            <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark">			<a href="<?php the_permalink() ?>" class="left_posts_link" rel="bookmark"> <?php
            $files = get_children("post_parent=$id&post_type=attachment&post_mime_type=image");?></a></a>

			<div class="entry">
			<?php the_excerpt(); ?>
			</div>
			</div>
            <div class="postbot"></div>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

		<?php else : ?>

	<div class="posttop"></div>
	<div class="page"><!-- Search Page Results Form -->	
		
		<h2 class="notfound">Nothing was found, please try a new search.</h2>

	</div><!-- Search Page Results Form Ends -->	
    <div class="postbot"></div>
		

		<?php endif; ?>

</div><!-- Single Archive Page Ends -->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>