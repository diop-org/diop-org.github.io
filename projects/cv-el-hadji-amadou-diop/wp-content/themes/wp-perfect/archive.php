<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time(get_option('date_format')); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div <?php post_class(); ?>>
			<div class="post-title">
				<h1 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="post-meta">
				<span>Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?> | <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), 'commentslink', __('Comments off')); ?> <?php edit_post_link('| Edit'); ?> </span>
				</div><!-- end of .post-meta -->
				<div class="clear"></div>
			</div><!-- end of .post-title -->
			<div class="entry">
				<?php the_excerpt(); ?>
			</div><!-- end of .entry -->
		</div>
	</div>
	<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div><!-- end of .navigation -->
	<?php else : ?>
	<h2 class="center">Not Found</div>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
</div><!-- end of #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>