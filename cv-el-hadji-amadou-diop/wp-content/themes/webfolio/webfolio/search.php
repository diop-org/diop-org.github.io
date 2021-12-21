<?php get_header(); ?>

<!-- begin colLeft -->
	<div id="colLeft" class="clearfix">
			<div class="searchQuery">Search results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?></div>
			
			
	<?php if (have_posts()) : while (have_posts()) : the_post();
		  ?>
		<!-- begin post -->
		<div class="blogPost clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<img src="<?php bloginfo('template_directory'); ?>/images/ico_file.png" alt="Posted" /> Posted by <?php the_author(); ?> in <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_comments.png" alt="Comments" /> <?php comments_popup_link('No comments', '1 comment', '% comments'); ?>
				<div class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong></div>
			</div>
			<?php the_excerpt(); ?> 
		</div>
		<!-- end post -->
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('Older') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer') ?></div>
		</div>

	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

			
</div>
<!-- end colLeft -->
<?php get_sidebar(); ?>	


<?php get_footer(); ?>
