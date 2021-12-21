<?php get_header(); ?>
  
<div id="content">
	<div class="spacer"></div>
	<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		    <div class="post-title">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="post-meta">
					<span>Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?> | <?php comments_popup_link(__('No Comments '), __('1 Comment '), __('% Comments '), 'commentslink', __('Comments off ')); ?> <?php edit_post_link('| Edit ');?></span>
			</div> <!-- end of .post-meta -->
				<div class="clear"></div>
                    </div> <!-- end of .post-title -->

		<div class="entry">
			<?php the_content('more...'); ?><div class="clear"></div>
			<?php wp_link_pages(array('before' => '<div><strong><center>Pages: ', 'after' => '</center></strong></div>', 'next_or_number' => 'number')); ?>
			<?php the_tags('<div class="post-tags">Tags: ', ', ', '</div>'); ?>
		</div> <!-- end of .entry -->
				<div class="clear"></div>

	<?php $td_check_author = get_option('td_check_author'); if($td_check_author): ?>
		<div class="author_box">
			<?php
			$author_email = get_the_author_email();
			echo get_avatar($author_email, '60', 'avatar');
			?>
			<h4>Article by <a href="<?php the_author_meta( 'user_url' ); ?>"><?php the_author_meta( 'user_firstname' ); ?></h4></a>
			<p><?php the_author_description(); ?></p>
			<p><?php $td_author_text = get_option('td_author_text'); echo stripslashes($td_author_text); ?></p>
		</div> <!-- end of .author_box -->
	<?php endif; ?>
		<div class="clear"></div>
	</div>
		
	<?php
		if (function_exists('wp_list_comments')) {//wordpress 2.7
			comments_template('/comments.php', true);
		} else {
			comments_template('/comments.legacy.php');
		}
	?>
	<?php endwhile;
	?>
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div> <!-- end of .navigation -->
<?php
	else: ?>
		<h3 class="archivetitle">Not found</h3>
		<p class="sorry">"Sorry, but you are looking for something that isn't here. Try something else.</p>
	<?php endif; ?>
</div> <!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?> 
