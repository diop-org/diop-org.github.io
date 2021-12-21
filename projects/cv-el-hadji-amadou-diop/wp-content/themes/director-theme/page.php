<?php get_header(); ?>

	<div class="middle_single"><!-- Single Blog Page Starts -->

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
            <div class="posttop"></div>
			<div class="post_blog"><!-- Single Post -->
				<h1><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1><br/><div style="clear:both"></div>
		
				<div class="post_date"><!-- Metadata -->
				
					<?php the_time('M') ?> - <?php the_time('d') ?> | By: <?php the_author_posts_link(); ?> | <a href="<?php comments_link(); ?>" /><?php comments_number('no comments','one comment','% comments'); ?>. <?php edit_post_link('Edit',' ',''); ?></a>
					
				</div><br/>
		
					<div class="filed">
					
						Filed under : <?php the_category(', ') ?></div><div style="clear:both">
					
					</div><!-- Metadata Ends -->
				
									 		<div class="entry_blog">
				 		
							<?php the_content('<span class="readmore"><strong>&nbsp;Read More &raquo;</strong></span>'); ?>
							 
						</div>
	     	<div style="clear:both;"></div>
	  				<?php endwhile; ?>	
					<?php endif; ?>		

			</div><!-- Single Post Ends -->		
					<div class="comment"><!-- Comments -->
				
					<?php comments_template(); ?>
					
				    </div>
	<div class="postbot"></div>
	
</div><!-- Single Blog Page Ends -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>