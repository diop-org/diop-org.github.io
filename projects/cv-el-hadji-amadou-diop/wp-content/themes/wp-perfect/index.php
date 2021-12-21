<?php get_header(); ?>

<div id="content">
	<?php if ( is_home() ) { ?>
		<div class="spacer"></div>
	<?php }

	if (have_posts()) :

	while (have_posts()) : the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
		<div <?php post_class(); ?>>
			<div class="post-title">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                <div class="post-meta">
					<span>Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?> | <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), 'commentslink', __('Comments off')); ?> <?php edit_post_link('| Edit'); ?> </span>
				</div><!-- .post-meta -->
                                <div class="clear"></div>
			</div><!-- .post-title -->

			<div class="entry">
				<?php the_content('Continue reading this post...'); ?>
			</div><!-- .entry -->
		</div>
	</div>
                   
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div><!-- .navigation -->

	<?php else : ?>
		<h3 class="archivetitle">Not found</h3>
		<p class="sorry">"Sorry, but you are looking for something that isn't here. Try something else.</p>
	<?php endif; ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer();?>