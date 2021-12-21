<?php get_header(); ?>

<div id="content">
			
			<?php if(have_posts()) : ?>
			
			<?php /* category archive */
			if (is_category())
			{ ?>
		  <h1 class="archive_title"><?php _e('Archive for the "', 'bluedesign'); ?><?php single_cat_title(); ?><?php _e('" category', 'bluedesign'); ?></h1>
 	  	<?php 
 	  	}
 	  	elseif( is_tag() )
 	  	{ /* tag archive */
 	  	?>
		  <h1 class="archive_title"><?php _e('Posts Tagged "', 'bluedesign'); ?><?php single_tag_title(); ?><?php echo "\""; ?></h1>
 	  	<?php
 	  	}
 	  	elseif (is_day())
 	  	{ /* daily archive */ 
 	  	?>
		  <h1 class="archive_title"><?php _e('Archive for ', 'bluedesign'); ?> <?php the_time(__('F jS, Y','default')); ?></h1>
 	  	<?php
 	  	}
 	  	elseif (is_month())
 	  	{ /* monthly archive */
 	  	?>
		  <h1 class="archive_title"><?php _e('Archive for ', 'bluedesign'); ?> <?php the_time(__('F, Y','default')); ?></h1>
 	  	<?php
 	  	}
 	  	elseif (is_year())
 	  	{ /* yearly archive */
 	  	?>
		  <h1 class="archive_title"><?php _e('Archive for ', 'bluedesign'); ?> <?php the_time(__('Y','default')); ?></h1>
	  	<?php
	  	}
	  	elseif (is_author())
	  	{ /* author archive */
	  	?>
		  <h1 class="archive_title"><?php _e('Author Archive', 'bluedesign'); ?></h1>
 	  	<?php
 	  	}
 	  	elseif (isset($_GET['paged']) && !empty($_GET['paged']))
 	  	{ /* paged archive */
 	  	?>
		  <h1 class="archive_title"><?php _e('Blog Archives', 'bluedesign'); ?></h1>
 	  	<?php } ?>
			
			<?php while(have_posts()) : the_post(); ?>
			
			<div class="post">
					<div class="post_title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
								<?php the_title(); ?>
						</a>
					</div>
					<div class="post_date">
						<span class="cal_ico"><?php the_time('j F Y'); ?></span>
						<span class="author_ico"><?php the_author() ?></span>
						<?php edit_post_link('<span class=\'edit_ico\'>'.__('Edit').'</span>', '', ''); ?>
						<span class="comment_ico"><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?></span>
						<div class="fix"></div>
					</div>
					<div class="post_text">
						<?php the_excerpt(); ?>
					</div>
					<div class="post_info">
						<span class="category_ico"><?php the_category(', ') ?></span>
						<?php the_tags('<br /><span class=\'tag_ico\'>', ', ', '</span>'); ?>
						<br>					
					</div>
				</div>

<?php endwhile; ?>

<?php if (function_exists('browse')) browse(); ?>

<?php else : ?>

			<div class="post">

				<div class="post_title">
						<?php _e('Not Found', 'bluedesign'); ?>
				</div>

				<div class="post_text">
						<p><?php _e('Sorry, but you are looking for something that isn&#39;t here.', 'bluedesign'); ?></p>
				</div>

			</div>

		<?php endif; ?>
		
</div> <!-- end content -->


<?php get_footer(); ?>