<?php get_header(); ?>
<?php if (is_category(get_option('webfolio_portfolio_id')) || post_is_in_descendant_category( get_option('webfolio_portfolio_id'))){?>
<?php include (TEMPLATEPATH . '/portfolio.php'); ?>
<?php } else {?>
<!-- begin colLeft -->
	<div id="colLeft">
	<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						Browsing all articles from <strong><?php the_time('F, Y') ?></strong>
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						Browsing all articles in <strong><?php $current_category = single_cat_title("", true); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						Browsing all articles tagged with <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						Browsing all articles by <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
					<!-- /archive-title -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- begin post -->
		<div class="blogPost clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<img src="<?php bloginfo('template_directory'); ?>/images/ico_file.png" alt="Posted" /> Posted by <?php the_author(); ?> in <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_comments.png" alt="Comments" /> <?php comments_popup_link('No comments', '1 comment', '% comments'); ?>
				<div class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong></div>
			</div>
			<?php the_content(__('read more')); ?> 
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
<?php }?>


<?php get_footer(); ?>