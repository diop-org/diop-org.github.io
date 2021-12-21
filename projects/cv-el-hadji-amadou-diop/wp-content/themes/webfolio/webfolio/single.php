<?php
get_header();
?>

<!-- begin col left -->
	<div id="colLeft">		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- begin post -->
		<div class="blogPost clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<img src="<?php bloginfo('template_directory'); ?>/images/ico_file.png" alt="Posted" /> Posted by <?php the_author(); ?> in <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_comments.png" alt="Comments" /> <?php comments_popup_link('No comments', '1 comment', '% comments'); ?>
				<div class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong></div>
			</div>
				<?php the_content(); ?> 
		</div>
		<!-- end post -->
		<!-- Social Sharing Icons -->
		<div class="social">
			 If you enjoyed this article please consider<strong> sharing it!</strong>
				<a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>" title="Tweet this!">
				<img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Tweet this!" />
				</a>
				
				<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="StumbleUpon.">
				<img src="<?php bloginfo('template_directory'); ?>/images/stumbleupon.png" alt="StumbleUpon" />
				</a>
				
				<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Vote on Reddit.">
				<img src="<?php bloginfo('template_directory'); ?>/images/reddit.png" alt="Reddit" />
				</a>
				<a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Digg this!">
				<img src="<?php bloginfo('template_directory'); ?>/images/digg.png" alt="Digg This!" />
				</a>
				
				<a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Bookmark on Delicious.">
				<img src="<?php bloginfo('template_directory'); ?>/images/delicious.png" alt="Bookmark on Delicious" />
				</a>
				
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>" title="Share on Facebook.">
				<img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Share on Facebook" id="sharethis-last" />
				</a>
				
			</div>
		
		<!-- end Social Sharing Icons -->
		
		
		
		
        <?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
			
			</div>
			<!-- end col left -->
	
	<?php get_sidebar(); ?>	



<?php get_footer(); ?>
