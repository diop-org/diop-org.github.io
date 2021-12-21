<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>


<h2 class="pagetitle">Search Results for &#8216;<?php the_search_query(); ?>&#8217;</h2>

	<?php while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-title">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
 				<div class="post-meta">
					<span>Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?> | <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), 'commentslink', __('Comments off')); ?> <?php edit_post_link('| Edit'); ?></span>
				</div><!-- .post-meta -->
				</div><!-- .post-title -->

				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		
	<?php else : ?>
    	<div id="content">
			<h2 class="title"><?php _e('Not Found', 'wp-perfect'); ?></h2>
            	<div class="entry">
                	<p><?php _e('Sorry, no posts found with your search criteria. Please try again with different keywords.', 'wp-perfect'); ?></p>
                    
                    <?php get_search_form(); ?>
                    
                </div><!-- end of .entry -->
         </div><!-- end of #content -->

	<?php endif; ?>

</div><!-- end of #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
