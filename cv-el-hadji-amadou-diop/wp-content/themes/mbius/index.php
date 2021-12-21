<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

					<div <?php post_class(); ?>>
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
							
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

								<span class="post-meta"><?php the_author() ?> &nbsp; |  &nbsp; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;', '', 'Comments Closed' ); ?></span>
								<span class="date">Posted on <?php the_time('F d, Y') ?></span>
							</div>
							
							<?php the_content('Read the rest of this entry &raquo;'); ?>

							<div class="clear"></div>
							<div class="post-footer">
								Written by <?php the_author() ?> <?php the_category(', ') ?> &nbsp; | &nbsp; <?php the_tags('Tags:' . ' ', ', ', '<br />'); ?>

							</div>
						</div>
					</div>
							

		<?php endwhile; ?>
					<div id="pagination">
						<ul>
							<li class="default"><div class="fr"><?php previous_posts_link('Newer Entries &raquo;') ?></div> <?php next_posts_link('&laquo; Older Entries') ?></li>
						</ul>
						<div class="clear"></div>
					</div>

	<?php else : ?>
					<div class="post">
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
								<h2>Not Found</h2>
								<p>Sorry, but you are looking for something that isn&#8217;t here.</p>
							</div>
						</div>
					</div>

	<?php endif; ?>

<?php get_footer(); ?>
