<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
					<div class="post">
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
								<h2><?php the_title(); ?></h2>

								<span class="post-meta"><?php the_author() ?> </span>
								<span class="date">Posted on <?php the_time('F n, Y') ?></span>
							</div>
							
							<?php the_content('<p class="serif">' . 'Read the rest of this page &raquo;'. '</p>'); ?>
							
							<div class="clear"></div>
							<?php the_tags( '<p>' . __('Tags:', 'kubrick') . ' ', ', ', '</p>'); ?>
							<p>Categories: <?php echo get_the_category_list(', '); ?></p>
							<p><?php edit_post_link('Edit this entry','',''); ?></p>
							
							<?php wp_link_pages('before=<p>Pages:&after=</p>&next_or_number=number&pagelink=page %'); ?>
							
							<hr/>
							<?php comments_template(); ?> 
							
						</div>
					</div>
					
		<?php endwhile; ?> 
		
					<div id="pagination">
						<ul>
							<li class="default"><div class="fr"><?php next_post_link('%link', 'Next post &raquo;', TRUE); ?></div> <?php previous_post_link('%link', '&laquo; Previous post', TRUE); ?></li>
						</ul>
						<div class="clear"></div>
					</div>
		
		<?php else: ?>
		
		
		<?php endif; ?>

<?php get_footer(); ?>
